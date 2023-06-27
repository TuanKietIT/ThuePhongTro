@extends('welcome')
@section('content')
<div class="session-bar">
    <a href="">Trang chủ</a>
    <p>>></p>
    <span>Liên hệ</span>
</div>
<div class="content-left">
    <div class="contact-user">
        <div class="box">
            <div class="contact form">
                <h3>Liên hệ với chúng tôi</h3>
                <form action="{{URL::to('/save-lienhe')}}" method="post" id="manage-supplier">
                {{csrf_field()}}  
                    <div class="form-box">
                        <div class="row10">
                            <div class="input-info">
                                <span>Họ tên</span>
                                <input type="text" name="hoten" placeholder="VD:Nguyễn Văn A....">
                            </div>
                            <div class="input-info">
                                <span>Email</span>
                                <input type="text" name="email" placeholder="VD:a@gmail.com....">
                            </div>
                        </div>
                        <div class="row10">
                            <div class="input-info">
                                <span>Điện thoại</span>
                                <input type="text" name="dienthoai" placeholder="VD:096868....">
                            </div>
                            <div class="input-info">
                                <span>Tiêu đề</span>
                                <input type="text" name="tieude" placeholder="VD:Có việc cần giúp....">
                            </div>
                        </div>
                        <div class="row100">
                            <div class="input-info">
                                <span>Nội dung</span>
                                <textarea rows="5" name="noidung" placeholder="Nhập nội dung...."></textarea>
                            </div>
                        </div>
                        <div class="row100">
                            <div class="input-info">
                                <input type="submit" onclick="return confirm('Cảm ơn bạn đã quan tâm đến chúng tôi sẽ sớm phản hồi lại?')" value="gửi">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="contact info">
                <h3>Thông tin liên hệ</h3>
                <div class="info-box">
                    <div>
                        <span><i class="fa-solid fa-location-dot"></i></span>
                        <p>475 Điện Biên Phủ, phường 25, quận Bình Thạnh, Tp Hồ Chí Minh</p>
                    </div>
                    <div>
                        <span><i class="fa-solid fa-envelope"></i></span>
                        <a href="mailto:tuankietity@gmail.com">tuankietity@gmail.com</a>
                    </div>
                    <div>
                        <span><i class="fa-solid fa-phone"></i></span>
                        <a href="tel:0768173369">+076 8173369</a>
                    </div>
                    <div class="social-icons">
                        <a href=""><i class="fav fa-brands fa-facebook-f"></i></a>
                        <a href=""><i class="fav fa-brands fa-instagram"></i></a>
                        <a href=""><i class="fav fa-regular fa-envelope"></i></a>
                        <a href=""><i class="fav fa-brands fa-twitter"></i></a>
                    </div>
                </div>
            </div>
            <div class="contact map">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3919.1264536544318!2d106.71226751483661!3d10.801625761681633!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x317528a5a7e26497%3A0xd6b32389e19641de!2zNDc1IMSQaeG7h24gQmnDqm4gUGjhu6csIFBoxrDhu51uZyAyNSwgQsOsbmggVGjhuqFuaCwgVGjDoG5oIHBo4buRIEjhu5MgQ2jDrSBNaW5oLCBWaeG7h3QgTmFt!5e0!3m2!1svi!2s!4v1668878172488!5m2!1svi!2s"
                width="350" height="300" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
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