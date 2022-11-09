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
                    @foreach($editthanhvien as $key => $thanhvien)
                    <form action="{{URL::to('/update-thanhvien/'.$thanhvien->id)}}" method="post" enctype="multipart/form-data">
                    {{csrf_field()}} 
                       <div class="main-user-info">
                            <div class="user-input-box">
                                <label for="fullName">Họ và tên</label>
                                <input type="text" id="fullName" name="tenthanhvien" value="{{$thanhvien->tenthanhvien}}"/>
                            </div>
                            <div class="user-input-box">
                                <label for="fullName">Số điện thoại</label>
                                <input type="text" id="fullName" name="dienthoai" value="{{$thanhvien->dienthoai}}"/>
                            </div>
                            <div class="user-input-box">
                                <label for="fullName">Email</label>
                                <input type="email" id="fullName" name="email" value="{{$thanhvien->email}}"/>
                            </div>
                            <div class="user-input-box">
                                <label for="fullName">password</label>
                                <input type="password" id="fullName password" name="password" value="{{$thanhvien->password}}"/>
                            </div>
                            <div class="user-input-box">
                                <label for="fullName">Vị trí</label>
                                <input type="text" id="fullName" name="diachi" value="{{$thanhvien->diachi}}"/>
                            </div>
                            
                            <div class="user-input-box">
                                <select name="loaithanhvien_use" id="">
                                @foreach($loaithanhvien as $key => $cate)
                                        @if($cate->loai_id == $thanhvien->id)
                                          <option selected value="{{$cate->loai_id}}">{{$cate->tenloai}}</option>
                                        @else
                                        <option value="{{$cate->loai_id}}">{{$cate->tenloai}}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                            <div class="user-input-box">
                                <label for="fullName">mô tả</label>
                                <textarea style="resize: none" rows="8"  name="content">{{$thanhvien->content}}</textarea>
                            </div>
                            <div class="user-input-box">
                                <div class="form-group">
                                    <label for="exampleInputFile">Hình ảnh</label>
                                    <input name="image" type="file" id="choose">
                                    <img src="{{URL::to('public/upload/'.$thanhvien->image)}}" width="100" height="100" >
                                    <p class="help-block"></p>
                                </div>
                            </div>
                            <div>
                                <button class="btn-postup">Thêm thành viên</button>
                                <a class="btn-cancel" href="{{URL::to('/list-thanhvien')}}" type="button" onclick="$('#manage-supplier').get(0).reset()"> Cancel</a>
                            </div>
                        </div>
                    </form>
                    @endforeach
                  </div>
            </div>

@endsection