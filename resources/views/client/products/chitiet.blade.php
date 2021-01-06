<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
	<title>chitiet</title><link rel="stylesheet" type="text/css" href="{{asset('css/client/reset.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/client/chitiet.css')}}">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="{{asset('css/client/responsive.css')}}">
</head>
<body>
	@include('client.shared.headerShowProduct')

	<div id="boxcontent">
		@include('client.shared.logoMenuChiTiet')

		<div class="container">
			<div class="box-1">
				<h3>Detail Product</h3>
				<hr >
				<div class="chitiet">
					<img src="{{asset('images/')}}/{{$product->product_image}}">
					<div class="thongtin">
						<h4>Category :{{$product->category->name}} </h4>
                        <h5>Product :{{$product->product_name}}</h5>
						<p>{{$product->price}}đ</p>


						<div class="tin">
						  <ul>
						    <li><a href="#">{{$product->description}}</a></li>
						    <li><a href="#">{{$product->city->name}}</a></li>
						    <li><a href="#">{{$product->brand->name}}</a></li>
                            <li>
                                <a href="#">Color</a>
                                <div style="float: left; height: 30px;width: 30px;background: {{$product->Color->color}}"></div>


						  </ul>
						</div>
                        {{Form::open(['route'=>['cart.update',$product->id],'method'=>'put'])}}

                                    <input type="hidden" name="product_id" value="{{$product->id}}">

                                      <input type="hidden" name="product_name" value="{{$product->product_name}}">
                                      <input type="hidden" name="product_image" value="{{$product->product_image}}">
                                      <input type="hidden" name="price" value="{{$product->price}}">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <button type="submit" class="box-box add-to-cart">
                                        <i class="fa fa-shopping-cart"></i>
                                        Add To Card
                                    </button>
                            {{ Form::close()}}
					</div>
				</div>
			</div>

            {!! Form::open(['route'=>'comment.store', 'method'=>'post']) !!}
                {{Form::label('Comment','',['class'=>'control-label'])}}
                {{Form::hidden('product_id',$product->id)}}
                {{Form::textarea('comment','',['class'=>'form-control','row'=>'3'])}}
                
                {{Form::submit('Add comment',['class'=>'btn btn-primary'])}}
            {!! Form::close() !!}

			<div class="row">
				@foreach($product->comment as $key => $binhluan)
					<div class="col-md-12">
						<ul class="list-group">
    						<li class="list-group-item d-flex justify-content-between align-items-center">
    							{{ $binhluan->content }}
    							<span class="badge badge-primary badge-pill">{{ $binhluan->created_at->diffForHumans() }}</span>
    							{!!Form::hidden('comment_id',$binhluan->id,['class'=>'comment_id'])!!}
{{--    							<span class="float-right">--}}
{{--    								{!!Form::select('vote', ['1' => '1 Star'--}}
{{--    								, '2' => '2 Star'--}}
{{--    								, '3' => '3 Star'--}}
{{--    								, '4' => '4 Star'--}}
{{--    								, '5' => '5 Star'],null,['class'=>' vote'])!!}--}}
{{--    							</span>--}}
    						</li>
						</ul>
					</div>
				@endforeach()
			</div>

		</div>
	</div>

<script>
    $(function(){
        let listStart = $(".list_start .fa");

        listRatingText = {
            1 : 'Not like',
            2 : 'Fine',
            3 : 'Nomal',
            4 : 'Good',
            5 : 'Very good',
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
	@include('client.shared.footer')
</body>
</html>



<style>
    .list-start i:hover    {
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
