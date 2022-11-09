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
                <main id="view-panel" >
            
                    <div class="container-fluid">
                        
                        <div class="col-lg-12">
                            <div class="row">
                                <!-- FORM Panel -->
                                <div class="col-md-4">
                                @foreach($editadmin as $key => $admin)
                                <form class="form" action="{{URL::to('/update-admin/'.$admin->admin_id)}}" method="post" id="manage-supplier" enctype="multipart/form-data">
                                {{csrf_field()}}  
                                    <div class="card">
                                        <div class="card-header">
                                                Thêm admin
                                        </div>
                                        <div class="card-body">
                                                <input type="hidden" name="id">
                                                <div class="form-group">
                                                    <label class="control-label">Tên admin</label>
                                                    <input type="text" class="form-note" name="admin_name" value="{{$admin->admin_name}}" >
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label">Email</label>
                                                    <input type="text" class="form-note" name="admin_email" value="{{$admin->admin_email}}" >
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label">password</label>
                                                    <input type="password" class="form-note" name="admin_password" value="{{$admin->admin_password}}" >
                                                </div>
                                                <div class="user-input-box">
                                                    <div class="form-group">
                                                        <label for="exampleInputFile">Hình ảnh</label>
                                                        <input name="admin_image" type="file" id="choose">
                                                        <img src="{{URL::to('./public/upload/'.$admin->admin_image)}}" width="80" height="50" >
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
                                @endforeach
                                </div>
                                <!-- FORM Panel -->
                    
                            </div>
                        </div>  
                    
                    </div>
                </main>
            </div>

@endsection