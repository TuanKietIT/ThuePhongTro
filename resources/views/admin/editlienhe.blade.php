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
                          <label>Họ tên</label>
                          <input type="text" rows="5" name="tentieude" value="{{$lienhe->hoten}}" class="input">
                       </div>   
                       <div class="inputfield">
                          <label>Email</label>
                          <input type="text" name="thoigian" class="input" value="{{$lienhe->email}}">
                       </div> 
                       <div class="inputfield">
                          <label>Tiêu đề</label>
                          <input type="text" name="thoigian" class="input" value="{{$lienhe->tieude}}">
                       </div> 
                       <div class="inputfield">
                          <label>Điện thoai</label>
                          <input type="number" name="thoigian" class="input" value="0{{$lienhe->dienthoai}}">
                       </div> 
                       <div class="">
                            <label for="fullName">Nội dung</label>
                            <textarea style="resize: none" rows="5"  id="exampleInputPassword1" placeholder="Mô tả danh" name="mota">{{$lienhe->noidung}}</textarea>
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