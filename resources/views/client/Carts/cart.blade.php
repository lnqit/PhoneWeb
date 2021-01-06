<!DOCTYPE html>
<html>
<head>
  <title>chitiet</title>
  @include('client.shared.link')
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
</head>
<body>

  @include('client.shared.headerShowProduct')

  <div id="boxcontent">
    @include('client.shared.logoMenuChiTiet')
    @if(Cart::count() != 0)
     <div class="container">
      <table id="cart" class="table table-hover table-condensed ">
      <thead>
       <tr>
          <th >STT</th>
          <!-- <th >Image</th> -->
          <th >Product Name</th>
          <th >Price</th>
          <th>Number</th>
          <th  class="text-center">Total</th>
          <th >Action</th>
       </tr>
      </thead>
      <tbody>
        <?php $i = 1;?>
        @foreach($cart as $value)
        <tr class="rem1">
            <td>{{ $i }}</td>
            <!-- <td class="invert-image">
                <a href="#">
                  <img style="height: 60px;width: 60px" class="img-responsive" src="{{asset('images/')}}/{{$value->options->img}}"  alt="{{ $value->name }}">
                </a>
            </td> -->
             <td>{{ $value->name }}</td>
              <td data-th="Price">{{ number_format($value->price) }} đ</td>
              <td data-th="Quantity"> <input type="number" style="float: left;" name="qty" class="form-control col-3 qty" value="{{ $value->qty }}" min='1' data-id="{{ $value->rowId }}"></td>
              <td data-th="Subtotal" class="text-center">{{$value->price*$value->qty}} đ</td>
              <td class="actions" data-th="">

              {{Form::open(['route' => ['cart.destroy', $value->rowId ],'method' => 'Delete']) }}
                  {{form::submit('Delete',['class'=>'btn btn-danger','style'=>'float: left']) }}
              {{ Form::close() }}
          </td>
      <?php $i++; ?>
      </tr>
        @endforeach

      </tbody>
     <tfoot>
       <tr class="visible-xs">
        </td>
       </tr>
       <tr>
        <td><a href="{{route('home.index')}}" class="btn btn-warning"><i class="fa fa-angle-left"></i> back home</a>
        </td>
        <td colspan="2" class="hidden-xs"> </td>
        <td class="hidden-xs text-center"><strong></strong>
        </td>
        <td>
              {{ Form::open(['route' => 'cart.store', 'method' => 'post']) }}
          <br>

          <div class="checkout-right" style="display: none;">
            <h4 class="mb-sm-4 mb-3">Bạn có tổng cộng:
              <span>{{ Cart::count() }} sản phẩm</span>
            </h4>
            <div class="table-responsive">
              <table class="timetable_sub">
                <thead>
                  <tr>
                    <th>STT</th>
                    <th>Hình Ảnh</th>
                    <th>Số Lượng</th>
                    <th>Tên Sản Phẩm</th>
                    <th>Đơn Giá</th>
                    <th>Chỉnh Sửa</th>
                  </tr>
                </thead>

                  <?php $i = 1;?>
                  @foreach($cart as $value)
                    <tbody >
                    <tr class="rem1 ">
                      <td class="invert">{{ $i }}</td>
                      <td class="invert-image">
                          <a href="#">
                            <img style="height: 60px;width: 60px" class="img-responsive" src="{{asset('images/')}}/{{$value->options->img}}"  alt="{{ $value->name }}">
                          </a>
                      </td>
                      <td class="invert">
                        <div class="quantity">
                          <div class="form-group">
                            <input type="number" name="qty" class="form-control qty" value="{{ $value->qty }}" min='1' data-id="{{ $value->rowId }}">
                          </div>
                        </div>
                      </td>
                      <td class="invert">{{ $value->name }} </td>
                      <td class="invert">{{ number_format($value->price) }} VNĐ</td>
                      <td s class="invert">
                        <div class="rem" style="margin-right: 36px">
                          <div class="close1" data-id="{{ $value->rowId }}"></div>
                        </div>
                      </td>
                    </tr>
                    <?php $i++; ?>
                  @endforeach
                </tbody>
              </table>
              <h4 class="mb-sm-4 mb-3" style="margin-top: 15px;" align="right">Bạn cần thanh toán tổng cộng:
                <span>{{ Cart::total() }} VND</span>
              </h4>
            </div>
          </div>

      {{form::submit('Pay',['class'=>'btn btn-success btn-block']) }}
         <!--  <a href="" class="btn btn-success btn-block">Thanh toán <i class="fa fa-angle-right"></i></a> -->
        </td>
       </tr>
      </tfoot>
     </table>
    </div>


    @else
     <div class="row">
        <div class="content col-md-12 text-center" style="height: 300px;">
            <h2 class="text-danger">Cart is null !!!</h2>
            <a href="{{route('home.index')}}" class="btn btn-success">back home</a>
        </div>

     </div>




    @endif

  @include('client.shared.footer')
</div>
<style type="text/css">
  #cart{
    margin-top: 15%;
  }
  th{
    text-align: left;
  }
</style>
<style type="text/css">.table&amp;amp;gt;tbody&amp;amp;gt;tr&amp;amp;gt;td, .table&amp;amp;gt;tfoot&amp;amp;gt;tr&amp;amp;gt;td {
vertical-align: middle;
}

@media screen and (max-width: 600px) {
table#cart tbody td .form-control {
width:20%;
display: inline !important;
}

.actions .btn {
width:36%;
margin:1.5em 0;
}

.actions .btn-info {
float:left;
}

.actions .btn-danger {
float:right;
}

table#cart thead {
display: none;
}

table#cart tbody td {
display: block;
padding: .6rem;
min-width:320px;
}

table#cart tbody tr td:first-child {
background: #333;
color: #fff;
}

table#cart tbody td:before {
content: attr(data-th);
font-weight: bold;
display: inline-block;
width: 8rem;
}

table#cart tfoot td {
display:block;
}
table#cart tfoot td .btn {
display:block;
}
}</style>
</body>
</html>
