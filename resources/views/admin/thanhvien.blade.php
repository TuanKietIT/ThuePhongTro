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
                       <a href="{{URL::to('/add-thanhvien')}}">
                            Thêm mới
                       </a>
                       <input type="text" name="">
                        <button class="btn-search">Tìm kiếm</button>
                   </form>
                </div>
                <div class="container ">
                    <div class="gallery-sroll">
                        <div class="images">
                        @foreach($thanhvien as $key => $thanhvien)
                            <div class="image-box" data-name="spiderman">
                                <img  src="./public/upload/user/{{$thanhvien->image}}" alt="">
                                <div class="captn">
                                    <h4>{{$thanhvien->tenthanhvien}}</h4>
                                    <p>{{$thanhvien->email}}</p>
                                    <p>{{$thanhvien->dienthoai}}</p>
                                    <span>
                                        <a  href="{{URL::to('/edit-thanhvien/'.$thanhvien->id)}}" class="btn-exit" href="">Sửa</a>
                                        <a class="btn-delete " onclick="return confirm('Bạn có chắc là muốn xóa danh mục này?')" href="{{URL::to('/delete-thanhvien/'.$thanhvien->id)}}"  >
                                            Xóa
                                        </a>
                                    </span>
                                </div>
                            </div>
                            @endforeach   
                        </div>
                    </div>
                </div>
            </div>

@endsection