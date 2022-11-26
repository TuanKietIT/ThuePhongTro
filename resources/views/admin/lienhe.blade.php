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
                <div class="postup">
                    <table>
                        <thead>
                          <tr>
                            <th scope="col" width="50px">ID</th>
                            <th scope="col" width="80px">Họ tên</th>
                            <th class="none" scope="col" width="100px">email</th>
                            <th scope="col" width="80px">điện thoại</th>
                            <th scope="col" width="250px">Nội dung</th>
                            <th scope="col" width="120px">Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach($lienhe as $key => $lienhe)
                          <tr>
                            <td  data-label="Account">{{$lienhe->id}}</td>
                            <td  data-label="Account">{{$lienhe->hoten}}</td>
                            <td class="none"data-label="Amount">{{$lienhe->email}}</td>
                            <td class="none"data-label="Amount">0{{$lienhe->dienthoai}}</td>
                            <td data-label="Period">{{$lienhe->noidung}}</td>
                            <td class="">
                               <a  href="{{URL::to('/edit-lienhe/'.$lienhe->id)}}" class="btn-edit" href="">Xem</a>
                                <a class="btn-delete " onclick="return confirm('Bạn có chắc là muốn xóa danh mục này?')" href="{{URL::to('/delete-lienhe/'.$lienhe->id)}}"  >
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