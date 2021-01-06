<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use\App\Http\Requests\TagRequest;

use  App\Repositories\Interfaces\TagInterface;

use App\Models\Post;
use App\Models\Tag;

//gọi thư viện
use Session;
use Carbon\Carbon;
use Str;

class TagController extends Controller
{
    //khai bao repository cua no
    private $TagRepo;

    //goi ham khoi tao
    public function __construct(TagInterface $tagreponsitory)
    {
        $this->TagRepo = $tagreponsitory;
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
            $tag_info = Tag::where('id','like','%'.$request->seachname.'%')->get();
            return view('admin.Tags.index',compact('tag_info'));
        } 

        $tag_info = $this->TagRepo->getAll();
        // $tag = Tag::all();
        //$post_info = Post::latest()->get();
        return view('admin.Tags.index',compact('tag_info'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TagRequest $request)
    {        
        $request->validated();
        $tag = new Tag([
            'tag_name' => $request->tag_name,
            'slug'=> Str::slug($request->tag_name),
            'isdeleted'=> true
        ]);
        //dd($tag);
        $this->TagRepo->addNew($tag);
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tag = $this->TagRepo->getById($id);
        return view('admin.Tags.edit',compact('tag'));
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
        $tag = $request->all();

        $tag = $this->TagRepo->getById($id);
        if($tag){
            $tag_name = $request->tag_name;
            $slug = Str::slug($request->tag_name);
            $tag->updated_at = Carbon::now()->toDateTimeString();
            //cập nhật
            $this->TagRepo->update($tag);
            }else {
                return back()->with('thongbao','Can Not Create');
            }
            return back()->with('thongbao','Created Successfully');
        
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
        $Tag = Tag::findOrFail($request->id);
        if ($Tag){
            $Tag->isDeleted = 0;
            $Tag->update();
            //echo "string";
        }
        return back()->with('message','Xóa thành công !');
    }
}
