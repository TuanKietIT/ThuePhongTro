@extends('admin_layout')
@section('admin_content')
<div class="container-main">
                <div class="title">
                    <marquee>
                        <span >Chào mừng bạn đến với trang.chúc bạn có một ngày làm việc vui vẻ</span>
                    </marquee>
                </div>
                <div class="searchbox">
                   <form action="" method="post">
                       <select name="" id="">
                            <option>ten người dùng</option>
                            <option>Tên phòng </option>
                       </select>
                       <input type="text" name="">
                        <button class="btn-search">Tìm kiếm</button>
                   </form>
                </div>
                <?php
                    $message_thanhvien = Session::get('message_thanhvien');
                    if ($message_thanhvien) {
                        echo '<span style="padding-left:230px" class="message-text">'.$message_thanhvien.'</span>';
                        Session::get('message_thanhvien',null);
                    }
                ?>
                <div class="postup">
                    <form action="{{URL::to('/save-thanhvien')}}" method="post" enctype="multipart/form-data">
                    {{csrf_field()}} 
                       <div class="main-user-info">
                            <div class="user-input-box">
                                <label for="fullName">Họ và tên</label>
                                <input type="text" id="fullName" name="tenthanhvien" placeholder="VD:Nguyễn Văn A"/>
                            </div>
                            <div class="user-input-box">
                                <label for="fullName">Số điện thoại</label>
                                <input type="text" id="fullName" name="dienthoai" placeholder="VD: 09829991.."/>
                            </div>
                            <div class="user-input-box">
                                <label for="fullName">Email</label>
                                <input type="email" id="fullName" name="email" placeholder="VD: nguyenvana@gmail.com"/>
                            </div>
                            <div class="user-input-box">
                                <label for="fullName">password</label>
                                <input type="password" id="fullName password" name="password" placeholder="VD: 09829991.."/>
                            </div>
                            <div class="user-input-box">
                                <label for="fullName">Vị trí</label>
                                <input type="text" id="fullName" name="diachi" placeholder="VD: 245 Xô Viết Nghệ Tĩnh....."/>
                            </div>
                            
                            <div class="user-input-box">
                                <select name="loaithanhvien_use" id="">
                                   @foreach($loaithanhvien as $key => $tv)
                                     <option value="{{$tv->loaithanhvien_id}}">{{$tv->tenloai}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="user-input-box">
                                <label for="fullName">mô tả</label>
                                <textarea style="resize: none" rows="8"  placeholder="Mô tả danh mục" name="content"></textarea>
                            </div>
                            <div class="user-input-box">
                                <div class="form-group">
                                    <label for="exampleInputFile">Hình ảnh</label>
                                    <input name="image" type="file" id="choose">
                                    <p class="help-block"></p>
                                </div>
                            </div>
                            <div>
                                <button class="btn-postup">Thêm thành viên</button>
                                <a class="btn-cancel" href="{{URL::to('/list-thanhvien')}}" type="button" onclick="$('#manage-supplier').get(0).reset()"> Cancel</a>
                            </div>
                        </div>
                    </form>
                  </div>
            </div>

@endsection