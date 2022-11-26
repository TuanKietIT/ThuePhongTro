@extends('welcome')
@section('content')
<div class="session-bar">
    <a href="">Trang chủ</a>
    <p>></p>
    <span>Tin tức</span>
</div>
<div class="content-left">
    <div class="details">
		@foreach($tintuc as $key => $tintucs)
		<a href="{{URL::to('/chitiet-tintuc/'.$tintucs->id)}}">
			<div class="news">
				<div class="image-box">
				<img src="./public/upload/tintuc/{{$tintucs->image}}" class="tab-img">
				</div>
				<h3 class="title">
					{{$tintucs->tenbaiviet}}
				</h3>
				<h4 class="content-detail">
					{{$tintucs->tieude}}
				</h4>
				<span class="time">{{$tintucs->thoigian}}</span>
				<button>
					<a class="btn-see" href="">Xem thêm</a>
				</button>
			</div>
		</a>
		@endforeach
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
		    <h2>Lọc khu vực Bình Thanh</h2>
		    <hr/>
			@foreach($vitri as $key => $vt)
			 <h3>{{$vt->tenvitri}}</h3>
			 @endforeach
		</div>
	</div>
</div>

@endsection