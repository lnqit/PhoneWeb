<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use\App\Http\Requests\PostRequest;

use  App\Repositories\Interfaces\PostInterface;

//khai báo Model
use App\Models\Post;
use App\Models\Tag;
use App\Models\Vote;
use App\Models\Seoable;

class PostController extends Controller
{
    //khai bao repository cua no
    private $PostRepo;

    //goi ham khoi tao
    public function __construct(PostInterface $postreponsitory)
    {
        $this->PostRepo = $postreponsitory;
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->seachname != null) {
            $post_info = Post::where('id','like','%'.$request->seachname.'%')->get();
            return view('admin.Posts.index',compact('post_info'));
        } 
        $post_info = $this->PostRepo->getAll();
        //$post_info = Post::latest()->get();
        return view('admin.Posts.index',compact('post_info'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tag = Tag::pluck('tag_name','id')->toArray();
        return view('admin.Posts.create',compact('tag'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostRequest $request)
    {
        //$request->validated();
        $Post = new Post([
            'title'=>$request->title,
            'status' => $request->status,
            'content' => $request->content,
            'isdeleted'=> true
        ]);
        
        //lấy list trong tag được chọn
        $tag_list = $request->tag;
        //dd($tag_list);

        $seo_data = new Seoable([
            'title'=>$request->title,
            'keywords'=>$request->keywords,
            'desc'=>$request->desc,
            'isdeleted'=> true
        ]);
        //dd($seo_data);  
        $Post->save();
        //lưu dữ liệu vào bảng post tag quan hệ nhiều nhiều dùng attach
        $Post->tag()->attach($tag_list);
      
        $Post->seo()->save($seo_data);

        if ($Post) {
            $this->PostRepo->addNew($Post);
            return redirect('admin/posts')->with('thongbao','Created Successfully');
        } else {
            return back()->with('thongbao','Can Not Create');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     //lấy post có cùng tag_id
     public function postsInTag($tag_id)
     {
         //1. lấy dữ liệu where có nghĩa là nó sẽ xét neus tag_id tồn tại trong Tag thì xuất thông qua post
             $posts =  Tag::findOrFail($tag_id)->post()->get();
             //dd($posts);
         //2. đổ ra view
         return view('admin.products.show',compact('posts'));
     }

     //phương thức lưu vote
    public function storeVote(Request $request)
    {
        //xử lý
        //ajax là sử dụng var_dum không dùng dd
        var_dump($request->all());

        //trả về thông điệp khi thực hiện
        return responsive()->json(['thanhcong'=>'bạn đã vote']);
    }


    public function show($id)
    {
         //$post = Post::findOrFail($id);
         $post = Post::with('seo')->findOrFail($id);
         //dd($post);
         //2. show dữ liệu
         return view('admin.Posts.show',compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = $this->PostRepo->getById($id);
        
        $tag = Tag::pluck('tag_name','id')->toArray();
        return view('admin.Posts.edit',compact('post','tag'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $post = $this->PostRepo->getById($id);

        $post->title = $request->title;
        $post->content = $request->content;
        //lay cac du lieu trong tag
        $tag_list = $request->tag;

        //lay du lieu seoale
        $seo = Seoable::where('seoble_id',$id)->first();
        $seo->title = $request->title;
        $seo->desc = $request->desc;
        $seo->keywords = $request->keyword;
        $seo->update();
        //
        if ($post) {
            $this->PostRepo->update($post);
            $post->tag()->Sync($tag_list);
            return back()->with('thongbao','Edited Successfully');
        } else {
            return back()->with('thongbao','Can Not Edited');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
   public function destroy(Request $request)
    {
        //dd($request->id);
        $Post = Post::findOrFail($request->id);
        if ($Post){
            $Post->isDeleted = 0;
            $Post->update();
            //echo "string";
        }
        return back()->with('message','Xóa thành công !');
    }
}
