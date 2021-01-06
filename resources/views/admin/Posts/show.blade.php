@extends('layouts.main')
@section('title','Create Post')

<style>
    .list-start i:hover
    {
        cursor: pointer;
    }

    .list_text
    {
        display: inline-block;
        margin-left: 10px;
        position: relative;
        background: #52b858;
        color: #fff;
        padding: 2px 8px;
        box-sizing: border-box;
        font-size: 12px;
        border-radius: 2px;
        display: none;
    }

    .list_text::after
    {
        right: 100%;
        top: 50%;
        border: solid transparent;
        content: "";
        height: 0;
        width: 0;
        position: absolute;
        pointer-events: none;
        border-color: rgba(82,184, 88, 0);
        border-right-color: #52b858;
        border-width: 6px;
        border-top: -6px;
    }

    .list_start .rating_active {
        color: #ff9705;
    }
</style>

@section('seo')
  <!-- google -->
  <meta name="DC.title" content="{{ isset($post->title) ? $post->title : 'sẽ cập nhật sau' }}">
  <meta name="keywords" content="{{ isset($post->seo->first()->keywords) ? $post->seo->first()->keywords : 'sẽ cập nhật sau...' }}">
   <meta name="desc" content="{{ isset($post->seo->first()->desc) ? $post->seo->first()->desc : 'sẽ cập nhật sau'  }}">
   <!-- image -->

   <!-- url - slug -->
    <meta name="url" content="{{ url(Str::slug($post->title,'-')) }}">
   <!-- facebook -->

   <!-- linkedin -->
@endsection()

@section('content')
    <div class="container">
        <p>{{ $post->content}}</p>
    </div>
    <hr>
    <!-- hiển thị các tag -->+
    <div class="row">
        <p>Tag:</p>
        @foreach($post->tag as $key => $tag)
            <a href="{{route('show_post_in_tag',$tag->id)}}"> {{$tag->tag_name}}  </a>
        @endforeach
    </div>

    <!-- hiển thị comment đã có -->
    <div class="row">
        <h3>Bình luận:</h3>

        @foreach($post->comment as $key => $binhluan)
            <div class="col-md-12">

                <ul class="list-group">
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    {{ $binhluan->content }}
                    <span class="badge badge-primary badge-pill">{{ $binhluan->created_at->diffForHumans() }}</span>
                    {!!Form::hidden('comment_id',$binhluan->id,['class'=>'comment_id'])!!}
                    <span class="float-right">
                    {!!Form::select('vote', ['1' => '1 sao'
                    , '2' => '2 sao'
                    , '3' => '3 sao'
                    , '4' => '4 sao'
                    , '5' => '5 sao'],null,['class'=>' vote'])!!}
                    </span>
                </li>
                <!-- add select list vote (1-5) -->

                </ul>
            </div>
        @endforeach()
    </div>
    <hr>

    <!-- cho phép người dùng comment -->
    {!! Form::open(['url'=>'comment', 'method'=>'post']) !!}
    {{Form::label('Comment','',['class'=>'control-label'])}}
    <!-- đẩy thông qua id của post -->
    {{Form::hidden('post_id',$post->id)}}

    {{Form::textarea('comment','',['class'=>'form-control','row'=>'3'])}}
    {{Form::submit('Add comment',['class'=>'btn btn-primary'])}}
    {!! Form::close() !!}

<div class="col-md-12">
    <div class="single-product-tab">
        <ul class="details-tab">
            <li class="active"><a href="" data-toggle="tab">Chi Tiết Sản Phẩm</a></li>
            <li class=""><a href="#" data-toggle="tab">Đánh Giá</a></li>
        </ul>

        <div class="tab-content">
            <div class="component_rating" style="margin-bottom: 20px;">
                <h3>ĐÁNH GIÁ SẢN PHẨM</h3>
                <div class="component_rating_content" style="display: flex; align-items: center; boder-radius: 5px; border: 1px solid #dedede">
                        <div class="rating_item" style="width: 20 %; position: relative">
                            <div class="">
                                <span class="fas fa-star" style="font-size: 100px; display: block; color: #ff9705"; margin: 0 auto; text-align: center>
                                    <b style="top: 50%; left: 50%; transform: translateX(-50%) translateY(-50%); color: black; font-size: 20px">2.5</b>
                                </span>
                            </div>
                        </div>
                        <div class="list_rating" style="width: 60 %; padding: 20px">
                            @for($i = 1; $i <= 5; $i++)
                                <div class="item_rating" style="display: flex">
                                    <div style="width: 10%; font-size: 14px">
                                      {{ $i }}  <span class="fa fa-star"></span>
                                    </div>
                                    <div style="width: 70%; margin: 0 20px">
                                        <span style="width: 100%; height: 8px; display: block; border: 1px solid #dedede; boder-radius: 5px; background-color: #dedede">
                                            <b style="width: 30%; background-color: #f25800; display: block; boder-radius: 5px; height: 100%"></b>
                                        </span>
                                    </div>
                                    <div style="width: 20%">
                                        <a href="">290 đánh giá</a>
                                    </div>
                                </div>
                            @endfor
                    </div>

                    <div style="width: 20%">
                        <a href="#" class="js_rating_action" style="width: 200px; background: #288ad6; padding: 10px; color: white; border-radius: 5px;"> gửi đánh giá của bạn</a>
                    </div>
                </div>

                <?php
                    $listRatingText = [
                        1 => 'Không thích',
                        2 => 'Tạm Được',
                        3 => 'Bình Thường',
                        4 => 'Rất Tốt',
                        5 => 'Tuyệt Vời',
                    ];
                ?>

                <div class="form_rating hide">
                    <div style="display: flex; margin-top: 15px; font-size: 15px">
                        <p style="margin-bottom: 0">chọn đánh giá của bạn</p>
                        <span style="margin: 0 15px" class="List_start">
                            @for($i = 1; $i <= 5; $i++)
                                <i class="fa fa-star" data-key="{{ $i }}"></i>
                            @endfor
                        </span>
                        <span class="List_text"></span>
                    </div>
                    <div style="margin-top: 15px">
                        <textarea name="" class="form-control" id="" cols="30" rows="3"></textarea>
                    </div>
                    <div style="margin-top: 15px">
                       <a href="" style="width: 200px; background: #288ad6; padding: 5px 10px; color: white; border-radius: 5px">Gửi đánh giá</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<br><br><br><br>

<script>
    $(function(){
        let listStart = $(".list_start .fa");

        listRatingText = {
            1 : 'Không thích',
            2 : 'Tạm Được',
            3 : 'Bình Thường',
            4 : 'Rất Tốt',
            5 : 'Tuyệt Vời',
        }

        listStart.mouseover( function(){
            let $this =  $(this);
            let number = $this.attr('data-key');
            listStart.removeClass('rating_active')

            $.each(listStart, function(key, value){
                if(key +1 <= number)
                {
                    $(this).addClass('rating_active')
                }
            });
            $(".list_text").text('').text(listRatingText[number]).show();
        });

        $(".js_rating_action").click(function (event){
            event.preventDefault();
             $(".form_rating").hide('slow')
            if ( $(".form_rating").hasClass('hide'))
            {
                $(".form_rating").addClass('active').removeClass('hide')
            }else
            {
                $(".form_rating").addClass('hide').removeClass('active')
            }
        })
    });
</script>

@endsection






