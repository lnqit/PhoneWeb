<!DOCTYPE html>
<html>
<head>
	<title>History Order</title>
	@include('client.shared.link')
</head>
<body>

	<div class="container">
        @include('client.shared.headerShowProduct')
        @include('client.shared.logoMenuChiTiet')

      <table class="table ">
		<thead class="table table-bordered " id="dataTable" width="100%" cellspacing="0">
			<th style="text-align:center;">STT</th>
			<th style="text-align:center;">User Name</th>
			<th style="text-align:center;">Order Post Code</th>
			<th style="text-align:center;">Status </th>
			<th >Action</th>
		</thead>
		<tbody>
			
			@foreach( $orders as $key => $orders )

			<tr>
				<td style="text-align:center;">{{ ++$key }}</td>
				<td style="text-align:center;"> {{ $orders->users->name }} </td>
				<!-- <td style="text-align:center;">{{ date('d-m-Y', strtotime($orders->order_number))}}</td>	 -->
				<td style="text-align:center;">{{$orders->order_number}}</td>
				<td style="text-align:center;">{{ $orders->total_amount}}</td>
				@if($orders->status == 0)
				<td style="text-align:center;">Delivering</td>
				@endif
				@if($orders->status == 1)
				<td style="text-align:center;">Finish</td>
				@endif
				
	
				@if($orders->status == 0)
				
				@endif
				
				
			</tr>
			</tr>

			@endforeach
			
		</tbody>
	</table>
        
    </div>
    @include('client.shared.footer')

</body>
</html>