@extends('admin_layout')
@section('admin_content')
<div class="container-main">
                <div class="title">
                    <marquee>
                        <span >Chào mừng bạn đến với trang.chúc bạn có một ngày làm việc vui vẻ</span>
                    </marquee>
                </div>
                <div class="searchbox">
                   <form action="{{URL::to('/tim-admin')}}" method="post">
                    {{csrf_field()}}  
                       <input type="text" name="keywords" placeholder="Tim kiếm loại">
                        <button class="btn-search">Tìm kiếm</button>
                   </form>
                </div>
                <main id="view-panel" >
            
                    <div class="container-fluid">
                        
                        <div class="col-lg-12">
                            <div class="row">
                                <!-- FORM Panel -->
                                <div class="col-md-4">
                                <form action="{{URL::to('/save-admin')}}" method="post" id="manage-supplier">
                                {{csrf_field()}}  
                                    <div class="card">
                                        <div class="card-header">
                                                Thêm admin
                                        </div>
                                        <div class="card-body">
                                                <input type="hidden" name="id">
                                                <div class="form-group">
                                                    <label class="control-label">Tên admin</label>
                                                    <input type="text" class="form-note" name="admin_name">
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label">Email</label>
                                                    <input type="email" class="form-note" name="admin_email">
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label">password</label>
                                                    <input type="password" class="form-note" name="admin_password">
                                                </div>
                                                <div class="user-input-box">
                                                    <div class="form-group">
                                                        <label for="exampleInputFile">Hình ảnh</label>
                                                        <input name="admin_image" type="file" id="choose">
                                                        <p class="help-block"></p>
                                                    </div>
                                                </div>    
                                        </div>
                                                
                                        <div class="card-footer">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <button class="btn-save"> Save</button>
                                                    <button href="{{URL::to('/list-admin')}}" class="btn-cancel" type="button" onclick="$('#manage-supplier').get(0).reset()"> Cancel</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                                </div>
                                <!-- FORM Panel -->
                    
                                <!-- Table Panel -->
                                <div class="col-md-8">
                                    <div class="card">
                                        <div class="card-header">
                                            <b>Danh sách danh mục</b>
                                        </div>
                                        <div class="card-body">
                                            <table class="table table-bordered ">
                                            <thead>
                                            <tr>
                                                <th style="width:50px" class="text-center">Stt</th>
                                                <th class="text-center">Hinh ảnh</th>
                                                <th class="text-center">Email</th>
                                                <th class="text-center">Chức năng</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            
                                            @foreach($admin as $key => $admin)
                                            <tr>
                                                <td style= "color: #707070;"class="text-center">{{$admin->admin_id}}</td>
                                                <td data-label="Due Date"><img src="./public/upload/{{$admin->admin_image}}"  class="tab-img"></td>
                                                <td >
                                                    <p>Name: <b>{{$admin->admin_email}}</b></p>
                                                    <p ><small>Mô tả: <b class="p-small">{{$admin->admin_name}}</b></small></p>
                                                </td>
                                                <td class="text-center">
                                                    <a style="margin:10px" href="{{URL::to('/edit-admin/'.$admin->admin_id)}}" class="btn-edit " id="button" >Edit</button>
                                                    <a class="btn-delete " onclick="return confirm('Bạn có chắc là muốn xóa danh mục này?')" href="{{URL::to('/delete-admin/'.$admin->admin_id)}}"  >
                                                        Delete
                                                    </a>
                                               </tr>
                                            @endforeach
                                            
                                        </tbody>
                                            </table>
                                            <div class="container-pagination">
                                                <div class="pagination">
                                                    <a href="#">&laquo;</a>
                                                    <a href="#"></a>
                                                    <a href="#">2</a>
                                                    <a href="#">&raquo;</a>
                                                </div>
                                          </div>
                                        </div>
                                    </div>
                                </div>
                    
                                <!-- Table Panel -->
                            </div>
                        </div>  
                    
                    </div>
                </main>
            </div>

@endsection