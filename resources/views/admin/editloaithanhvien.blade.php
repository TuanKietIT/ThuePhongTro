@extends('admin_layout')
@section('admin_content')
<div class="container-main">
                <div class="title">
                    <marquee>
                        <span >Chào mừng bạn đến với trang.chúc bạn có một ngày làm việc vui vẻ</span>
                    </marquee>
                </div>
                <main id="view-panel" >
            
                    <div class="container-fluid">
                        
                        <div class="col-lg-12">
                            <div class="row">
                                <!-- FORM Panel -->
                                <div class="col-md-4">
                                @foreach($edit_loaithanhvien as $key => $loaithanhvien)
                                <form action="{{URL::to('/update-loaithanhvien/'.$loaithanhvien->loai_id)}}" method="post" id="manage-supplier">
                                {{csrf_field()}}  
                                    <div class="card">
                                        <div class="card-header">
                                                Sửa danh mục
                                        </div>
                                        <div class="card-body">
                                                <input type="hidden" name="id">
                                                <div class="form-group">
                                                    <label class="control-label">Tên Danh mục</label>
                                                    <input type="text" class="form-note" name="tenloai" value="{{$loaithanhvien->tenloai}}">
                                                </div>
                    
                                        </div>
                                                
                                        <div class="card-footer">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <button class="btn-save">update</button>
                                                    <a class="btn-cancel" href="{{URL::to('/list-loaithanhvien')}}" type="button" onclick="$('#manage-supplier').get(0).reset()"> Cancel</a>
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