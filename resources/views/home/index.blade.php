@extends('welcome')
@section('content')
<div class="session-bar">
    <a href="">Trang chủ</a>
    <p>>></p>
    <span>Bài viết mới</span>
</div>
<div class="content-left">
    @foreach($dangtin as $key => $dangtins)
    <a href="{{URL::to('/chi-tiet/'.$dangtins->id)}}">
        <div class="details">
            <div class="image-box">
			<img src="./public/upload/dangtin/{{$dangtins->image}}" class="tab-img">
            </div>
            <h3 class="title">
			    {{$dangtins->tieude}}
		    </h3>
            <span class="infor">
				<p >
					Giá: {{number_format($dangtins->gia,0,',','.').'VNĐ'}} VND/tháng
				</p>
				<p class="space">
					-
				</p>
				<p >
					Diện tích: {{$dangtins->dientich}}
				</p>
		    </span>
            <span class="local">
		        Địa chỉ:{{$dangtins->diachi}}
		    </span>
            <h4 class="content-detail">
		        Mô tả: {{$dangtins->mota}}.
		    </h4>
            <span class="time">
				Thời gian đăng: {{$dangtins->ngaycapnhat}}
			</span>
            <button>
                <a class="btn-see" href="{{URL::to('/chi-tiet/'.$dangtins->id)}}">Xem thêm</a>
            </button>
            <h4>Điện thoại: +0{{$dangtins->dienthoai}}</h4>
        </div>
    </a>
	@endforeach
	<div class="container-pagination">
        <div class="pagination">
		     <h2></h2>
            <a href="#">{{$dangtin->links()}}</a>
        </div>
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
		    <h2>Lọc Theo loai</h2>
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