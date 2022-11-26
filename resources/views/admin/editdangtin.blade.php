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
                <div class="postup">
                   @foreach($editdangtin as $key => $dangtin)
                    <form action="{{URL::to('/update-dangtin/'.$dangtin->id)}}" method="post" enctype="multipart/form-data">
                    {{csrf_field()}}    
                       <div class="main-user-info">
                            <div class="user-input-box">
                                <label for="fullName">Họ và tên</label>
                                <input type="text" id="fullName" name="hoten" value="{{$dangtin->hoten}}" placeholder="VD:Nguyễn Văn A"/>
                            </div>
                            <div class="user-input-box">
                                <label for="fullName">Tiêu đề</label>
                                <input type="text" id="fullName" name="tieude" value="{{$dangtin->tieude}}" placeholder="VD:cho thuê nhà trọ....."/>
                            </div>
                            <div class="user-input-box">
                                <label for="fullName">Email</label>
                                <input type="email" id="fullName" name="email" value="{{$dangtin->email}}" placeholder="VD: nguyenvana@gmail.com"/>
                            </div>
                            <div class="user-input-box">
                                <label for="fullName">Số điện thoại</label>
                                <input type="text" id="fullName" name="dienthoai" value="{{$dangtin->dienthoai}}" placeholder="VD: 09829991.."/>
                            </div>
                            <div class="user-input-box">
                                <label for="fullName">Địa chỉ</label>
                                <input type="text" id="fullName" name="diachi" value="{{$dangtin->diachi}}" placeholder="VD: 245 Xô Viết Nghệ Tĩnh....."/>
                            </div>
                            <div class="user-input-box">
                                <label for="fullName">Tình Trạng</label>
                                <input type="text" id="fullName" name="tinhtrang" value="{{$dangtin->tinhtrang}}" placeholder="VD: Đang hoạt động....."/>
                            </div>
                            <div class="user-input-box">
                                <label for="fullName">Giá</label>
                                <input type="text" id="fullName" name="gia" value="{{$dangtin->gia}}" placeholder="VD: 1000000....."/>
                            </div>
                            <div class="user-input-box">
                                <label for="fullName">Diện tích</label>
                                <input type="text" id="fullName" name="dientich" value="{{$dangtin->dientich}}" placeholder="VD: 20m2....."/>
                            </div>
                            <div class="user-input-box">
                                <label for="fullName">mô tả</label>
                                <textarea style="resize: none" rows="8"  placeholder="Mô tả danh mục" name="mota">{{$dangtin->mota}}</textarea>
                            </div>
                            
                            <div class="seclect-box">
                                <select name="loaiphong_use" id="">
                                    @foreach($loaiphong as $key => $loaiphong)
                                        @if($loaiphong->loaiphong_id == $dangtin->id)
                                          <option selected value="{{$loaiphong->loaiphong_id}}">{{$loaiphong->tenloai}}</option>
                                        @else
                                        <option value="{{$loaiphong->loaiphong_id}}">{{$loaiphong->tenloai}}</option>
                                        @endif
                                    @endforeach
                                </select>
                                <select name="vitri_use" id="">
                                    @foreach($vitri as $key => $vitri)
                                        @if($vitri->vitri_id == $dangtin->id)
                                          <option selected value="{{$vitri->vitri_id}}">{{$vitri->tenvitri}}</option>
                                        @else
                                        <option value="{{$vitri->vitri_id}}">{{$vitri->tenvitri}}</option>
                                        @endif
                                    @endforeach
                                </select>
                                <div class="inputfield">
                                    <label>Ngày cập nhật</label>
                                    <input type="date" name="ngaycapnhat" value="{{$dangtin->ngaycapnhat}}" class="input">
                                </div> 
                                <div class="form-group">
                                    <label for="exampleInputFile">Hình ảnh</label>
                                    <input name="image" type="file" id="choose">
                                    <img src="{{URL::to('public/upload/dangtin/'.$dangtin->image)}}" width="60" height="60"  >
                                    <p class="help-block"></p>
                                </div>
                                <div>
                                    <button class="btn-postup">Đăng tin</button>
                                    <a class="btn-cancel" href="{{URL::to('/list-dangtin')}}" type="button" onclick="$('#manage-supplier').get(0).reset()"> Cancel</a>
                                </div>
                            </div>
                            
                        </div>
                    </form>
                    @endforeach
                  </div>
            </div>               
</div>
@endsection