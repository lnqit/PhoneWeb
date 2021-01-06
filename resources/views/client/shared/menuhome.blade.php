<div class="container">
	<div class="box-1">				
		<div class="list">
		  <ul>			   
		    <li><a href="#">PRODUCT CATEGORY</a>
		      <ul class="sub-menu">
			  @foreach($Category as $key => $Category)	        
			  	<li>
			  		<a href="{{route('indexCategory',[$Category->id])}}">{{$Category->name}}</a>
		        </li>
				@endforeach()
		      </ul>		
		    </li>
		  </ul>
		</div>
		<div class="banner">
			<img class="banner1" src="{{asset('images/banner1.jpg')}}" style="display: block;">
			<img class="banner1" src="{{asset('images/banner.jpg')}}">
			<img class="banner1" src="{{asset('images/banner1.jpg')}}">
			<img class="banner1" src="{{asset('images/banner.jpg')}}">
			<button class="prev" onclick="plusDivs(-1)"><img src="{{asset('images/iconprevious.png')}}"></button>
			<button class="next" onclick="plusDivs(1)"><img src="{{asset('images/iconnext.png')}}"></button>
		</div>
	</div>
</div>
