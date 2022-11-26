@extends('welcome')
@section('content')
<div class="session-bar">
    <a href="">Trang chủ</a>
    <p>>></p>
    <span>Bài viết mới</span>
</div>
<div class="content-left">
    @foreach($category_by_id as $key => $value)
    <a href="">
        <div class="details">
            <div class="image-box">
			<img src="{{URL::to('/public/upload/dangtin/'.$value->image)}}" alt="" />
            </div>
            <h3 class="title">
			    {{$value->tieude}}
		    </h3>
            <span class="infor">
				<p >
					Giá: {{number_format($value->gia,0,',','.').'VNĐ'}} VND/tháng
				</p>
				<p class="space">
					-
				</p>
				<p >
					Diện tích: {{$value->dientich}}
				</p>
		    </span>
            <span class="local">
		        Địa chỉ:{{$value->diachi}}
		    </span>
            <h4 class="content-detail">
		        Mô tả: {{$value->mota}}.
		    </h4>
            <span class="time">
				Thời gian đăng: {{$value->ngaycapnhat}}
			</span>
            <button>
                <a class="btn-see" href="">Xem thêm</a>
            </button>
            <h4>Điện thoại: +0{{$value->dienthoai}}</h4>
        </div>
    </a>
	@endforeach
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
		    <h2>Lọc khu vực Bình Thanh</h2>
		    <hr/>
			@foreach($vitri as $key => $vt)
			 <h3>{{$vt->tenvitri}}</h3>
			 @endforeach
		</div>
	</div>
</div>
 @endsection