@extends('welcome')
@section('content')
<div class="session-bar">
    <a href="">Trang chủ</a>
    <p>>></p>
    <span>Đăng tin</span>
</div>
<div class="content-left">
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
            </div>
            <div class="contact info">
                
            </form>
        </div>
    </div>
</div>
<div class="content-right">
    <div class="details">
        <div class="search-price">
            <h2>Lọc theo khoảng Giá</h2>
            <hr/>
            <h3>1 - 3 triệu</h3>
            <h3>1 - 3 triệu</h3>
            <h3>1 - 3 triệu</h3>
            <h3>1 - 3 triệu</h3>
            <h3>1 - 3 triệu</h3>
            <h3>1 - 3 triệu</h3>
            <h3>1 - 3 triệu</h3>
            <h3>1 - 3 triệu</h3>
            <h3>1 - 3 triệu</h3>
            <h3>1 - 3 triệu</h3>
            <h3>1 - 3 triệu</h3>
            <h3>1 - 3 triệu</h3>
        </div>
    </div>
    <div class="details">
        <div class="search-catagory">
            <h2>Lọc khu vực Bình Thanh</h2>
            <hr/>
            <h3>phường</h3>
            <h3>phường</h3>
            <h3>phường</h3>
            <h3>phường</h3>
            <h3>1 - 3 triệu</h3>
            <h3>1 - 3 triệu</h3>
            <h3>1 - 3 triệu</h3>
            <h3>1 - 3 triệu</h3>
            <h3>1 - 3 triệu</h3>
            <h3>1 - 3 triệu</h3>
            <h3>1 - 3 triệu</h3>
            <h3>1 - 3 triệu</h3>
        </div>
    </div>
</div>

@endsection