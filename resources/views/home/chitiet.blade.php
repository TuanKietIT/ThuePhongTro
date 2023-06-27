@extends('welcome')
@section('content')
<div class="session-bar">
    <a href="">Trang chủ</a>
    <p>>></p>
    <span>Chi tiết nhà trọ</span>
</div>
<div class="content-left">
   @foreach($chitiet as $key => $ct)
        <div class="image-postup">
        <img src="{{URL::to('/public/upload/dangtin/'.$ct->image)}}" alt="" />
        </div>
        <div class="info-postup">
        <h1>{{$ct->tieude}}</h1>
        <span class="local">Địa chỉ: {{$ct->diachi}}</span>
         <hr/>
        <div class="postup-card">
            <span>
                <p>Mức giá</p>
                <h3>{{number_format($ct->gia,0,',','.').'VNĐ'}}</h3>
            </span>
            <span>
                <p>Diện tích</p>
                <h3>{{$ct->dientich}}</h3>
            </span>
            <span>
                <p>Phòng</p>
                <h3>{{$ct->tenloai}}</h3>
            </span>
            <form action="{{URL::to('/save-yeuthich')}}" method="post">
            {{csrf_field()}} 
                <span>
                    <p>
                        <input name="qty" type="number" min="1"   value="1" />
                    </p>
                    <input type="hidden" name="dangtinid_hidden" value="{{$ct->id}}">
                    <button type="submit"> 
                        Thêm yêu thích
                        <i class="fa-solid fa-star"></i>
                    </button>
                </span>
            </form>
        </div>
        <hr/>
        <div class="info-desc">
            <h5>Thông tin mô tả</h5>
            <span>   
                {!!$ct->mota!!}                 
            </span>
        </div>
        <hr/>
        <div class="postup-card">
            <span>
                <p>Mức giá: {{number_format($ct->gia,0,',','.').'VNĐ'}}</p>
            </span>
            <span>
                <p>Diện tích: {{$ct->dientich}}</p>
           </span>
            <span>
                <p>Địa chỉ: {{$ct->tenvitri}}</p>
            </span>
            <span>
            <p>Tình trạng: {{$ct->tinhtrang}}</p>
             </span>
             </div>
            <hr/>
            <div class="postup-card">
                <span>
                    <p>Họ và tên: {{$ct->hoten}}</p>
                </span>
                <span>
                    <p>Điện thoai: {{$ct->dienthoai}}</p>
                </span>
                <span>
                    <p>Zalo : {{$ct->dienthoai}}</p>
                </span>
                <span>
                    <p>Email: {{$ct->email}}</p>
                </span>
            </div>
            <hr/>
        </div>
    @endforeach
            <div class="custombox clearfix">
                <h4 class="small-title">Bình luận</h4>
                <div class="contact-form">
                    <form class="form-wrapper">
                        <input type="text" class="form-control" placeholder="Họ tên">
                        <input type="text" class="form-control" placeholder="Email">
                        <input type="text" class="form-control" placeholder="tiêu đề">
                        <textarea rows="5" style="resize: none" class="form-control" placeholder="Nội dung"></textarea>
                        <div>
                            <button type="submit" class="btn btn-primary">Gửi</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="custombox clearfix">
                <h4 class="small-title">Tìm kiêm thêm</h4>
                <div class="contact-form">
                    @foreach($dangtin as $key => $dangtins)
                    <a href="{{URL::to('/chi-tiet/'.$dangtins->id)}}">
                        <div class="details">
                            <div class="image-box">
                            <img src="{{URL::to('public/upload/dangtin/'.$dangtins->image)}}" class="tab-img">
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
                                Mô tả:{{$dangtins->tieude}}.
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