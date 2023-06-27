@extends('admin_layout')
@section('admin_content')
<div class="container-main">
                <div class="title">
                    <marquee>
                        <span >Chào mừng bạn đến với trang.chúc bạn có một ngày làm việc vui vẻ</span>
                    </marquee>
                </div>
                <div class="searchbox">
                   <form action="{{URL::to('/tim-loaiphong')}}" method="post">
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
                                <form action="{{URL::to('/save-loaiphong')}}" method="post" id="manage-supplier">
                                {{csrf_field()}}  
                                    <div class="card">
                                        <div class="card-header">
                                                Thêm danh mục
                                        </div>
                                        <div class="card-body">
                                                <input type="hidden" name="id">
                                                <div class="form-group">
                                                    <label class="control-label">Tên Danh mục</label>
                                                    <input type="text" class="form-note" name="tenloai">
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label">Mô tả danh mục</label>
                                                    <textarea name="mota" id="address" cols="30" rows="4" class="form-note"></textarea>
                                                </div>
                                        </div>
                                                
                                        <div class="card-footer">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <button class="btn-save"> Save</button>
                                                    <button href="{{URL::to('/list-loaiphong')}}" class="btn-cancel" type="button" onclick="$('#manage-supplier').get(0).reset()"> Cancel</button>
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
                                                        <th class="text-center">Mô tả</th>
                                                        <th class="text-center">Chức năng</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    
                                                    @foreach($loai as $key => $loais)
                                                    <tr>
                                                        <td style= "color: #707070;"class="text-center">{{$loais->loaiphong_id}}</td>
                                                        <td >
                                                            <p>Name: <b>{{$loais->tenloai}}</b></p>
                                                        </td>
                                                        <td class="text-center">
                                                            <a style="margin:10px" href="{{URL::to('/edit-loaiphong/'.$loais->loaiphong_id)}}" class="btn-edit " id="button" >Edit</button>
                                                            <a class="btn-delete " onclick="return confirm('Bạn có chắc là muốn xóa danh mục này?')" href="{{URL::to('/delete-loaiphong/'.$loais->loaiphong_id)}}"  >
                                                                Delete
                                                            </a>
                                                    </tr>
                                                    @endforeach
                                                    
                                                </tbody>
                                            </table>
                                            <div class="container-pagination">
                                                <div class="pagination">
                                                    <span>{{$loai->links()}}</span>
                                                </div>
                                           </div>
                                           <style>
                                                 .pagination{
                                                    height:30px;
                                                    width: 100%;
                                                    margin-top:-7px;
                                                    padding:3px 10px;
                                                 }
                                                 .inline-flex,.text-gray-700{
                                                    display:none;
                                                 }
                                           </style>

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