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
                       <a href="{{URL::to('/add-tintuc')}}">
                            Thêm mới
                       </a>
                       <input type="text" name="">
                        <button class="btn-search">Tìm kiếm</button>
                   </form>
                </div>
                <div class="postup">
                    <table>
                        <thead>
                          <tr>
                            <th scope="col" width="50px">ID</th>
                            <th scope="col" width="80px">hình ảnh</th>
                            <th class="none" scope="col" width="150px">tiêu đề</th>
                            <th scope="col" width="80px">Ngày</th>
                            <th class="none" scope="col" width="90px">Status</th>
                            <th scope="col" width="120px">Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach($tintuc as $key => $tintuc)
                          <tr>
                            <td  data-label="Account">{{$tintuc->id}}</td>
                            <td data-label="Due Date"><img src="./public/upload/tintuc/{{$tintuc->image}}" class="tab-img"></td>
                            <td class="none"data-label="Amount">{{$tintuc->tenbaiviet}}</td>
                            <td data-label="Period">{{$tintuc->thoigian}}</td>
                            <td class="none"data-label="Amount" style="position: relative;"><span class="pe"></span></td>
                            <td class="">
                               <a  href="{{URL::to('/edit-tintuc/'.$tintuc->id)}}" class="btn-edit" href="">Sửa</a>
                                <a class="btn-delete " onclick="return confirm('Bạn có chắc là muốn xóa danh mục này?')" href="{{URL::to('/delete-tintuc/'.$tintuc->id)}}"  >
                                    Xóa
                                </a>
                            </td>
                          </tr>
                          @endforeach  
                        </tbody>
                      </table>
                      <div class="container-pagination">
                            <div class="pagination">
                                <a href="#">&laquo;</a>
                                <a href="#">1</a>
                                <a class="active" href="#">2</a>
                                <a href="#">3</a>
                                <a href="#">4</a>
                                <a href="#">5</a>
                                <a href="#">6</a>
                                <a href="#">7</a>
                                <a href="#">&raquo;</a>
                            </div>
                      </div>
                  </div>
            </div>
@endsection