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
                       <input type="text" name="">
                        <button class="btn-search">Tìm kiếm</button>
                   </form>
                </div>
                <div class="wrapper">
                   @foreach($editlienhe as $key => $lienhe)
                    <form class="form" action="{{URL::to('/update-lienhe/'.$lienhe->id)}}" method="post" enctype="multipart/form-data">
                    {{csrf_field()}} 
                        <div class="inputfield">
                          <label>Email</label>
                          <input type="text" rows="5" name="tentieude" value="{{$lienhe->email}}" class="input">
                       </div>   
                       <div class="inputfield">
                          <label>Ngày cập nhật</label>
                          <input type="date" name="thoigian" class="input" value="{{$lienhe->thoigian}}">
                       </div> 
                       <div class="">
                            <label for="fullName">Nội dung</label>
                            <textarea style="resize: none" rows="5"  id="exampleInputPassword1" placeholder="Mô tả danh" name="mota">{{$lienhe->noidung}}</textarea>
                        </div>
                        <div class="user-input-box">
                            <div class="form-group">
                                <label for="exampleInputFile">Hình ảnh</label>
                                <input name="image" type="file" id="choose">
                                <img src="{{URL::to('public/upload/'.$lienhe->image)}}" width="80" height="50" >
                                <p class="help-block"></p>
                            </div>
                        </div>    
                          <div class="inputfield">
                            <div>
                                <button class="btn-postup">Sửa</button>
                                <a class="btn-cancel" href="{{URL::to('/list-lienhe')}}" type="button" onclick="$('#manage-supplier').get(0).reset()"> Cancel</a>
                            </div>
                        </div>
                    </form> 
                    @endforeach
                </div>
            </div>

@endsection