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
                        <a href="{{URL::to('/add-dangtin')}}">
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
                            <th scope="col" width="20px">ID</th>
                            <th scope="col" width="80px">Hinh ảnh</th>
                            <th class="none" scope="col" width="110px">Tiêu đề</th>
                            <th scope="col" width="90px">HoTen</th>
                            <th class="none" scope="col" width="120px">Email</th>
                            <th class="none" scope="col" width="80px">Ngày cập nhật</th>
                            <th class="none" scope="col" width="40px">Price</th>
                            <th class="none" scope="col" width="90px">Status</th>
                            <th scope="col" width="90px">Action</th>
                          </tr>
                        </thead>
                        <tbody>
                         @foreach($dangtins as $key => $dangtin)
                          <tr>
                            <td  data-label="Account">{{$dangtin->id}}</td>
                            <td data-label="Due Date"><img src="./public/upload/dangtin/{{$dangtin->image}}" class="tab-img"></td>
                            <td class="none"data-label="Amount" > {{$dangtin->tenbaiviet}}</td>
                            <td data-label="Period">{{$dangtin->hoten}}</td>
                            <td class="none" data-label="Period">{{$dangtin->email}}</td>
                            <td class="none" data-label="Period">{{$dangtin->ngaycapnhat}}</td>
                            <td class="none" data-label="Due Date">{{$dangtin->gia}}</td>
                            <td class="none"data-label="Amount" style="position: relative;">
                            <?php
                              if($dangtin->hienthi==0){
                                ?>
                                <a href="{{URL::to('/unactive-product/'.$dangtin->id)}}"><span class="fa-solid fa-up fa-thumbs-up"></span></a>
                                <?php
                                }else{
                                ?>  
                                <a href="{{URL::to('/active-product/'.$dangtin->id)}}"><span class="fa-solid fa-down fa-thumbs-down"></span></a>
                                <?php
                              }
                              ?>
                            </td>
                            <style>
                                .fa-up{
                                   font-size:2rem;
                                   padding:20px;
                                   color:red;
                                }
                                .fa-down{
                                   font-size:2rem;
                                   padding:20px;
                                   color:#00FF00;
                                }
                            </style>
                            <td class="">
                                <a  href="{{URL::to('/edit-dangtin/'.$dangtin->id)}}" class="btn-edit" href="">Sửa</a>
                                <a class="btn-delete " onclick="return confirm('Bạn có chắc là muốn xóa danh mục này?')" href="{{URL::to('/delete-dangtin/'.$dangtin->id)}}"  >
                                 Xóa
                                 </a>
                            </td>
                          </tr>
                          @endforeach 
                        </tbody>
                      </table>
                      <div class="container-pagination">
                            <div class="pagination">
                              <span>{{$dangtins->links()}}</span>
                            </div>
                      </div>
                      <style>
                        .pagination{
                            height:30px;
                            width: 100%;
                            margin-top:5px;
                            padding:3px 10px;
                        }
                        .inline-flex,.text-gray-700{
                          display:none;
                        }
                      </style>
                  </div>
            </div>

@endsection