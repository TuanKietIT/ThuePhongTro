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
                <div class="postup">
                    <table>
                        <thead>
                          <tr>
                            <th scope="col" width="50px">ID</th>
                            <th scope="col" width="80px">Name</th>
                            <th class="none" scope="col" width="150px">Address</th>
                            <th scope="col" width="80px">Date</th>
                            <th class="none" scope="col" width="120px">Price</th>
                            <th class="none" scope="col" width="90px">Status</th>
                            <th scope="col" width="120px">Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td  data-label="Account">#3412</td>
                            <td data-label="Due Date"><img src="/images/n1.jpg" class="tab-img"></td>
                            <td class="none"data-label="Amount">Lorem ispum dummy text industry.</td>
                            <td data-label="Period">03/01/2022</td>
                            <td class="none" data-label="Due Date">$64.00</td>
                            <td class="none"data-label="Amount" style="position: relative;">
                                <span class="pe"></span>
                                <span class="be"></span>
                            </td>
                            <td class="">
                                <button class="btn-edit" type="button" data-id="2" data-address="Sample Address" data-name="Men Apparel"  data-contact="65524556">Edit</button>
                                <button class="btn-delete" type="button" data-id="2">Delete</button>
                            </td>
                          </tr>
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