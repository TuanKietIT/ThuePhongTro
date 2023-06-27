@extends('welcome')
@section('content')
<div class="session-bar">
    <a href="">Trang chủ</a>
    <p>>></p>
    <span>Yêu thích</span>
</div>
<div class="content-left">
    <?php
       $content = Cart::content();
    ?>
   <div class="small-container cart-page">
        <table>
            <tr>
                <th>Hình ảnh</th>
                <th>số Lượng</th>
                <th>Giá</th>
                <th>Chức năng</th>
            </tr>
            @foreach($content as $v_content)
            <tr>
                <td>
                    <div class="cart-info">
                        <img src="{{URL::to('/public/upload/dangtin/'.$v_content->options->image)}}" alt="" />
                        <div>
                            <p>{{$v_content->name}}</p>
                            <p>Giá: {{number_format($v_content->weight).' '.'vnđ'}}</p>
                            </br>
                         </div>
                    </div>
                </td>
                <td>
                    <form action="{{URL::to('/update-yeuthich')}}" method="POST">
					{{ csrf_field() }}
                         <input class="cart_quantity_input" type="submit" name="cart_quantity" value="{{$v_content->qty}}" >
                         <input type="hidden" value="{{$v_content->rowId}}" name="rowId_cart" class="form-control">
                         <input type="hidden"  name="update_qty"></i></input>
                    </form>
                </td>
                <td>{{number_format($v_content->price).' '.'vnđ'}}</td>
                <td>
                <div class="cart-info">
                        <div>
                            <p>
                               <a href="{{URL::to('/delete-to-cart/'.$v_content->rowId)}}"><i class="fa-solid fa-xmark"></i></a>
                            </p>
                         </div>
                    </div>
                </td>
            </tr>   
            @endforeach 		
        </table>
     </div>
</div>
<div class="content-right">
	<div class="details">
		<div class="search-catagory">
		    <h2>Lọc khu vực Bình Thanh</h2>
		    <hr/>
			@foreach($vitri as $key => $vt)
			 <a href="{{URL::to('/danhmuc-vitri/'.$vt->vitri_id)}}">
			    <h3>{{$vt->tenvitri}}</h3>
			 </a>
			 @endforeach
		</div>
	</div>
	<div class="details">
		<div class="search-catagory">
		    <h2>Lọc theo loai bất động sản</h2>
		    <hr/>
			@foreach($loaiphong as $key => $lp)
			<a href="{{URL::to('/danhmuc-vitri/'.$vt->vitri_id)}}">
			    <h3>{{$lp->tenloai}}</h3>
			 </a>
			 @endforeach
		</div>
	</div>
</div>
 @endsection