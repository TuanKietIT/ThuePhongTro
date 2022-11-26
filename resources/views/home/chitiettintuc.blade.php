@extends('welcome')
@section('content')
<div class="session-bar">
    <a href="">Trang chủ</a>
    <p>>></p>
    <span>Chi tiết Tin tức mới</span>
</div>
<div class="content-left">
    @foreach($chitiettintuc as $key => $cttt)
        <div class="image-postup">
           <img src="{{URL::to('/public/upload/tintuc/'.$cttt->image)}}" alt="" />
        </div>
       <div class="info-postup">
            <h1>{{$cttt->tenbaiviet}}</h1>
            <span class="local">Ngày cập nhật: {{$cttt->thoigian}}</span>
            <hr/>
            <div class="info-desc">
                <h5>Tiêu đề</h5>
                <span>
                    {{$cttt->tieude}}          
                </span>
            </div>
            <hr/>
            <div class="info-desc">
                <h5>Thông tin mô tả</h5>
                <span>
                   {!!$cttt->mota!!}  
                </span>
            </div>
            <hr/>
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
        </div>
    @endforeach
</div>
<div class="content-right">
	<div class="newsto">
        @foreach($tintuc as $key => $tt)
		<article>
            <img src="{{URL::to('/public/upload/tintuc/'.$tt->image)}}" alt="" />
		    <div>
		        <h2>{{$tt->tenbaiviet}}</h2>
		        <a  href="{{URL::to('/chitiet-tintuc/'.$tt->id)}}">Đọc thêm <span>>></span></a>
		    </div>                 
		  </article>
          @endforeach                 
    </div>
</div>
 @endsection