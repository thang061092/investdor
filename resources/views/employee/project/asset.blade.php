@extends('employee.layout.master')
@section('page_name', '- Cập nhật thông tin tài sản dự án - ' . $project['name_vi'] ?? '')
@section('content')
    <div class="row mb-3">
        <div class="col-12">
            <ol class="breadcrumb" aria-label="breadcrumbs">
                <li class="breadcrumb-item">
                    <a href="">Dashboard</a>
                </li>
                <li class="breadcrumb-item" aria-current="page">
                    <a href="{{route('project.list')}}"
                       class="text-success">{{__('page_name.project_list')}}
                    </a>
                </li>
                <li class="breadcrumb-item" aria-current="page">
                    <a href=""
                       class="text-info">Cập nhật thông tin tài sản dự án
                    </a>
                </li>
            </ol>
        </div>
    </div>
    <div class="row mt-3">
        <div class="col-12">
            <div class="card" style="border-radius: 10px;">
                <div class="card-body">
                    <div class="col-md-12 col-sm-12">
                        <div class="card" style="border-radius: 10px;">
                            <div class="card-header">
                                Thông tin tài sản dự án &nbsp; <strong
                                    class="text-danger">{{$project['name_vi'] ?? ''}}</strong>
                            </div>
                            <div class="card-body ">
                                <form method="post" action="{{route('project.update_asset')}}">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-4 col-sm-12">
                                            <div class="form-group mb-3">
                                                <label for="">Năm xây dựng<span
                                                        class="text-danger">*</span></label>
                                                <input type="number"
                                                       class="form-control @if($errors->has('year_built'))is-invalid @endif"
                                                       name="year_built"
                                                       id="year_built" placeholder="Nhập năm xây dựng"
                                                       value="{{$project->assetProject->year_built ?? old('year_built')}}">
                                                @if($errors->has('year_built'))
                                                    <p class="text-danger">{{ $errors->first('year_built') }}</p>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-sm-12">
                                            <div class="form-group mb-3">
                                                <label for="">Tổng diện tích xây dựng(m2)<span
                                                        class="text-danger">*</span></label>
                                                <input type="text"
                                                       class="form-control @if($errors->has('total_building_area'))is-invalid @endif"
                                                       name="total_building_area"
                                                       id="total_building_area" placeholder="Nhập diện tích xây dựng"
                                                       value="{{!empty($project->assetProject->total_building_area) ? number_format($project->assetProject->total_building_area) : old('total_building_area')}}">
                                                @if($errors->has('total_building_area'))
                                                    <p class="text-danger">{{ $errors->first('total_building_area') }}</p>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-sm-12">
                                            <div class="form-group mb-3">
                                                <label for="">NRSF<span
                                                        class="text-danger">*</span></label>
                                                <input type="text"
                                                       class="form-control @if($errors->has('nrsf'))is-invalid @endif"
                                                       name="nrsf"
                                                       id="nrsf" placeholder="nrsf"
                                                       value="{{!empty($project->assetProject->nrsf) ? number_format($project->assetProject->nrsf) : old('nrsf')}}">
                                                @if($errors->has('nrsf'))
                                                    <p class="text-danger">{{ $errors->first('nrsf') }}</p>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-sm-12">
                                            <div class="form-group mb-3">
                                                <label for="">Công suất dự kiến<span
                                                        class="text-danger">*</span></label>
                                                <input type="text"
                                                       class="form-control @if($errors->has('expected_capacity'))is-invalid @endif"
                                                       name="expected_capacity"
                                                       id="expected_capacity" placeholder="Nhập công suất dự kiến"
                                                       value="{{!empty($project->assetProject->expected_capacity) ? number_format($project->assetProject->expected_capacity) : old('expected_capacity')}}">
                                                @if($errors->has('expected_capacity'))
                                                    <p class="text-danger">{{ $errors->first('expected_capacity') }}</p>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-sm-12">
                                            <div class="form-group mb-3">
                                                <label for="">Mục tiêu Lợi tức ổn định trên Chi phí<span
                                                        class="text-danger">*</span></label>
                                                <input type="text"
                                                       class="form-control @if($errors->has('target_table'))is-invalid @endif"
                                                       name="target_table"
                                                       id="target_table" placeholder="Nhập mục tiêu"
                                                       value="{{!empty($project->assetProject->target_table) ? number_format($project->assetProject->target_table) : old('target_table')}}">
                                                @if($errors->has('target_table'))
                                                    <p class="text-danger">{{ $errors->first('target_table') }}</p>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-sm-12">
                                            <div class="form-group mb-3">
                                                <label for="">Giá, Chi phí cho đến nay<span
                                                        class="text-danger">*</span></label>
                                                <input type="text"
                                                       class="form-control @if($errors->has('current_price'))is-invalid @endif"
                                                       name="current_price"
                                                       id="current_price" placeholder="Nhập giá chi phí"
                                                       value="{{!empty($project->assetProject->current_price) ? number_format($project->assetProject->current_price) : old('current_price')}}">
                                                @if($errors->has('current_price'))
                                                    <p class="text-danger">{{ $errors->first('current_price') }}</p>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-sm-12">
                                            <div class="form-group mb-3">
                                                <label for="">Kinh độ (longitude)<span
                                                        class="text-danger">*</span></label>
                                                <input type="text"
                                                       class="form-control @if($errors->has('longitude'))is-invalid @endif"
                                                       name="longitude"
                                                       id="longitude" placeholder="Kinh độ"
                                                       value="{{$project->assetProject->longitude ?? old('longitude')}}">
                                                @if($errors->has('current_price'))
                                                    <p class="text-danger">{{ $errors->first('longitude') }}</p>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-sm-12">
                                            <div class="form-group mb-3">
                                                <label for="">Vĩ độ (latitude)<span
                                                        class="text-danger">*</span></label>
                                                <input type="text"
                                                       class="form-control @if($errors->has('latitude'))is-invalid @endif"
                                                       name="latitude"
                                                       id="latitude" placeholder="Vĩ độ"
                                                       value="{{$project->assetProject->latitude ?? old('latitude')}}">
                                                @if($errors->has('current_price'))
                                                    <p class="text-danger">{{ $errors->first('latitude') }}</p>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-12">
                                            <div class="form-group mb-3">
                                                <label for="">Đặc điểm nổi bật dự án<span
                                                        class="text-danger">(VI)*</span></label>
                                                <textarea type="text"
                                                          class="form-control @if($errors->has('project_highlights_vi'))is-invalid @endif"
                                                          name="project_highlights_vi"
                                                          id="project_highlights_vi">{{$project->assetProject->project_highlights_vi ?? old('project_highlights_vi')}}</textarea>
                                                @if($errors->has('project_highlights_vi'))
                                                    <p class="text-danger">{{ $errors->first('project_highlights_vi') }}</p>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-12">
                                            <div class="form-group mb-3">
                                                <label for="">Đặc điểm nổi bật dự án<span
                                                        class="text-danger">(EN)*</span></label>
                                                <textarea type="text"
                                                          class="form-control @if($errors->has('project_highlights_en'))is-invalid @endif"
                                                          name="project_highlights_en"
                                                          id="project_highlights_en">{{$project->assetProject->project_highlights_en ?? old('project_highlights_en')}}</textarea>
                                                @if($errors->has('project_highlights_en'))
                                                    <p class="text-danger">{{ $errors->first('project_highlights_en') }}</p>
                                                @endif
                                            </div>
                                        </div>
                                        <input name="id" type="hidden" value="{{$project['id']}}">
                                        <div class="text-center" style="text-align: right !important;">
                                            <div class="btnadmin">
                                                <a class="btn btn-secondary" href="{{route('project.list')}}">
                                                    Trở về &nbsp;
                                                    <i class="fa fa-backspace" aria-hidden="true"></i>
                                                </a>
                                                <button type="submit" class="btn btn-success action">
                                                    Cập nhật &nbsp;
                                                    <i class="fa fa-edit" aria-hidden="true"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="{{asset('js/address/select.js')}}"></script>
@endsection
@section('js')
    <script>
        CKEDITOR.replace('project_highlights_vi', {
            filebrowserBrowseUrl: '{{ asset('ckfinder/ckfinder.html') }}',
            filebrowserImageBrowseUrl: '{{ asset('ckfinder/ckfinder.html?type=Images') }}',
            filebrowserFlashBrowseUrl: '{{ asset('ckfinder/ckfinder.html?type=Flash') }}',
            filebrowserUploadUrl: '{{ asset('ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files') }}',
            filebrowserImageUploadUrl: '{{ asset('ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images') }}',
            filebrowserFlashUploadUrl: '{{ asset('ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash') }}'
        });
        CKEDITOR.replace('project_highlights_en', {
            filebrowserBrowseUrl: '{{ asset('ckfinder/ckfinder.html') }}',
            filebrowserImageBrowseUrl: '{{ asset('ckfinder/ckfinder.html?type=Images') }}',
            filebrowserFlashBrowseUrl: '{{ asset('ckfinder/ckfinder.html?type=Flash') }}',
            filebrowserUploadUrl: '{{ asset('ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files') }}',
            filebrowserImageUploadUrl: '{{ asset('ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images') }}',
            filebrowserFlashUploadUrl: '{{ asset('ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash') }}'
        });
    </script>
@endsection
