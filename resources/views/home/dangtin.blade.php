@extends('welcome')
@section('content')
<div class="session-bar">
    <a href="">Trang chủ</a>
    <p>>></p>
    <span>Đăng tin</span>
</div>
    <div class="contact-user">
        <div class="box">
            <div class="contact form">
                <h3>Đăng tin mới</h3>
                <form action="{{URL::to('/them-tin')}}" method="post" enctype="multipart/form-data">
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
                                <span>Tình trạng</span>
                                <input type="text"name="tinhtrang"  placeholder="VD:Phòng trống....">
                            </div>
                        </div>
                        <div class="row10">
                            <div class="input-info">
                                <span>Giá</span>
                                <input type="text" name="gia" placeholder="VD:096868....">
                            </div>
                            <div class="input-info">
                                <span>Diện tích</span>
                                <input type="text" name="dientich" placeholder="VD:Có việc cần giúp....">
                            </div>
                        </div>
                        <div class="row100">
                            <div class="input-info">
                                <span>địa chỉ</span>
                                <input type="text" name="diachi" placeholder="VD:457 Điện Biên Phủ....">
                            </div>
                        </div>
                        <div class="row100">
                            <div class="input-info">
                                <span>Tên Bài viết</span>
                                <input type="text" name="tenbaiviet" placeholder="VD:457 Điện Biên Phủ....">
                            </div>
                        </div>
                        <div class="row100">
                            <div class="input-info">
                                <span>Tiêu đề</span>
                                <input type="text" name="tieude" placeholder="VD:457 Điện Biên Phủ....">
                            </div>
                        </div>
                        <div class="row100">
                            <div class="">
                                <span>Mô tả</span>
                                <textarea  id="editor3" name="mota" placeholder="Nhập nội dung...."></textarea>
                            </div>
                        </div>
                        <div class="info-box">
                            <div style="margin:10px 0;">
                                <input type='file' name="image" class="file"/>
                            </div>
                            <div>
                                <div class="select">
                                    <select name="loaiphong_use" id="">
                                        @foreach($loaiphong as $key => $loai)
                                        <option value="{{$loai->loaiphong_id}}">{{$loai->tenloai}}</option>
                                        @endforeach
                                    </select>
                                    
                                </div>
                            </div>
                            <div>
                                <div class="select">
                                    <select name="vitri_use" id="">
                                        @foreach($vitri as $key => $vitri)
                                        <option value="{{$vitri->vitri_id}}">{{$vitri->tenvitri}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="input-time">
                                <label> Ngày cập nhật: </label>
                                <input type="date" name="ngaycapnhat" class="time" >
                            </div>
                        </div>
                        <div class="row100">
                            <div class="input-info">
                                <button >Gửi</button>
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
                <div class="contact map">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3919.1264536544318!2d106.71226751483661!3d10.801625761681633!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x317528a5a7e26497%3A0xd6b32389e19641de!2zNDc1IMSQaeG7h24gQmnDqm4gUGjhu6csIFBoxrDhu51uZyAyNSwgQsOsbmggVGjhuqFuaCwgVGjDoG5oIHBo4buRIEjhu5MgQ2jDrSBNaW5oLCBWaeG7h3QgTmFt!5e0!3m2!1svi!2s!4v1668878172488!5m2!1svi!2s"
                width="250" height="300" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
            </div>
        </div>
    </div>


@endsection