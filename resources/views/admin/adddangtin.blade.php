@extends('admin_layout')
@section('admin_content')
<div class="container-main">
                <div class="title">
                    <marquee>
                        <span >Chào mừng bạn đến với trang.chúc bạn có một ngày làm việc vui vẻ</span>
                    </marquee>
                </div>
                <div class="postup">
                    <form action="{{URL::to('/save-dangtin')}}" method="post" enctype="multipart/form-data">
                    {{csrf_field()}}    
                       <div class="main-user-info">
                           <div class="user-input-box">
                                <label for="fullName">mô tả</label>
                                <textarea style="resize: none" rows="8" id="editor3"   placeholder="Mô tả danh mục" name="mota"></textarea>
                                <div class="seclect-box">
                                       <label>Ngày cập nhật</label>
                                        <input type="date" name="ngaycapnhat" class="input">
                                    <select name="loaiphong_use" id="">
                                        @foreach($loaiphong as $key => $loai)
                                        <option value="{{$loai->loaiphong_id}}">{{$loai->tenloai}}</option>
                                        @endforeach
                                    </select>
                                    <select name="vitri_use" id="">
                                        @foreach($vitri as $key => $vitri)
                                        <option value="{{$vitri->vitri_id}}">{{$vitri->tenvitri}}</option>
                                        @endforeach
                                    </select> 
                                </div>
                            </div>
                            <div class="user-input-box">
                                <label for="fullName">Họ và tên</label>
                                <input type="text" id="fullName" name="hoten" placeholder="VD:Nguyễn Văn A"/>
                                <label for="fullName">Tên bài viêt</label>
                                <input type="text" id="fullName" name="tenbaiviet" placeholder="VD:cho thuê nhà trọ....."/>
                                <label for="fullName">Tiêu đề</label>
                                <input type="text" id="fullName" name="tieude" placeholder="VD:cho thuê nhà trọ....."/>
                                <label for="fullName">Email</label>
                                <input type="email" id="fullName" name="email" placeholder="VD: nguyenvana@gmail.com"/>
                                <label for="fullName">Số điện thoại</label>
                                <input type="text" id="fullName" name="dienthoai" placeholder="VD: 09829991.."/>
                                <label for="fullName">Địa chỉ</label>
                                <input type="text" id="fullName" name="diachi" placeholder="VD: 245 Xô Viết Nghệ Tĩnh....."/>
                                <label for="fullName">Tình Trạng</label>
                                <input type="text" id="fullName" name="tinhtrang" placeholder="VD: Đang hoạt động....."/>
                                <label for="fullName">Giá</label>
                                <input type="text" id="fullName" name="gia" placeholder="VD: 1000000....."/>
                                <label for="fullName">Diện tích</label>
                                <input type="text" id="fullName" name="dientich" placeholder="VD: 20m2....."/>
                                <div class="seclect-box">
                                    <div class="inputfield">
                                        <div class="form-group">
                                            <label for="exampleInputFile">Hình ảnh</label>
                                            <input name="image" type="file" id="choose">
                                            <p class="help-block"></p>
                                            <div>
                                                <button class="btn-postup">Đăng tin</button>
                                                <a class="btn-cancel" href="{{URL::to('/list-thanhvien')}}" type="button" onclick="$('#manage-supplier').get(0).reset()"> Cancel</a>
                                            </div>
                                        </div>
                                    </div> 
                              </div>
                            </div>
                            
                        </div>
                    </form>
                  </div>
            </div>               
</div>
@endsection