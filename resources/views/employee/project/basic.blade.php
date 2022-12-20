@extends("employee.layout.master")
@section('page_name', '- Cập nhật thông tin cơ bản')
@section("content")
    <div class="row mb-3">
        <div class="col-12">
            <ol class="breadcrumb" aria-label="breadcrumbs">
                <li class="breadcrumb-item"><a href="">Dashboard</a></li>
                <li class="breadcrumb-item" aria-current="page"><a href="{{route('project.list')}}"
                                                                   class="text-success">Danh sách dự án</a>
                </li>
                <li class="breadcrumb-item" aria-current="page"><a href=""
                                                                   class="text-info">Cập nhật thông tin cơ bản</a>
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
                                Thông tin cơ bản &nbsp;<strong>{{$project->name_vi}}</strong>
                            </div>
                            <div class="card-body ">
                                <form method="post" action="{{route('project.update_post', ['id'=> $project['id']])}}">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-6 col-sm-12">
                                            <div class="form-group mb-3">
                                                <label for="">Tên dự án<span class="text-danger">(VI)*</span></label>
                                                <input type="text"
                                                       class="form-control @if($errors->has('project_name_vi'))is-invalid @endif"
                                                       name="project_name_vi"
                                                       placeholder="Nhập tên dự án" value="{{$project['name_vi']}}">
                                                @if($errors->has('project_name_vi'))
                                                    <p class="text-danger">{{ $errors->first('project_name_vi') }}</p>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-12">
                                            <div class="form-group mb-3">
                                                <label for="">Tên dự án<span class="text-danger">(EN)*</span></label>
                                                <input type="text"
                                                       class="form-control @if($errors->has('project_name_en'))is-invalid @endif"
                                                       name="project_name_en"
                                                       placeholder="Nhập tên dự án" value="{{$project['name_en']}}">
                                                @if($errors->has('project_name_en'))
                                                    <p class="text-danger">{{ $errors->first('project_name_en') }}</p>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-12">
                                            <div class="form-group mb-3">
                                                <label for="">Tổng giá trị dự án (VND)<span
                                                        class="text-danger">*</span></label>
                                                <input type="text"
                                                       class="form-control @if($errors->has('total_value_project'))is-invalid @endif"
                                                       name="total_value_project"
                                                       placeholder="Nhập giá trị dự án"
                                                       id="total_value_project"
                                                       value="{{number_format($project['total_value'])}}">
                                                @if($errors->has('total_value_project'))
                                                    <p class="text-danger">{{ $errors->first('total_value_project') }}</p>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-12">
                                            <div class="form-group mb-3">
                                                <label for="">Tỉnh/Thành phố<span class="text-danger">*</span></label>
                                                <select
                                                    class="form-control city_project @if($errors->has('city_project'))is-invalid @endif"
                                                    name="city_project">
                                                    <option value="">Chọn Tỉnh/Thành phố</option>
                                                    @foreach($cities as $key => $value)
                                                        <option
                                                            value="{{$value['id']}}" {{$value['id'] == $project['city_id'] ? 'selected' : ''}}>{{$value['name']}}</option>
                                                    @endforeach
                                                </select>
                                                @if($errors->has('city_project'))
                                                    <p class="text-danger">{{ $errors->first('city_project') }}</p>
                                                @endif
                                            </div>

                                        </div>
                                        <div class="col-md-6 col-sm-12">
                                            <div class="form-group mb-3">
                                                <label for="">Quận/Huyện<span class="text-danger">*</span></label>
                                                <select
                                                    class="form-control district_project @if($errors->has('district_project'))is-invalid @endif"
                                                    name="district_project">
                                                    <option value="">Quận/Huyện</option>
                                                    @foreach($districts as $key => $value)
                                                        <option
                                                            value="{{$value['id']}}" {{$value['id'] == $project['district_id'] ? 'selected' : ''}}>{{$value['name']}}</option>
                                                    @endforeach
                                                </select>
                                                @if($errors->has('district_project'))
                                                    <p class="text-danger">{{ $errors->first('district_project') }}</p>
                                                @endif
                                            </div>

                                        </div>
                                        <div class="col-md-6 col-sm-12">
                                            <div class="form-group mb-3">
                                                <label for="">Xã/Phường<span class="text-danger">*</span></label>
                                                <select
                                                    class="form-control ward_project @if($errors->has('ward_project'))is-invalid @endif"
                                                    name="ward_project">
                                                    <option value="">Chọn Xã/Phường</option>
                                                    @foreach($wards as $key => $value)
                                                        <option
                                                            value="{{$value['id']}}" {{$value['id'] == $project['ward_id'] ? 'selected' : ''}}>{{$value['name']}}</option>
                                                    @endforeach
                                                </select>
                                                @if($errors->has('ward_project'))
                                                    <p class="text-danger">{{ $errors->first('ward_project') }}</p>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-12">
                                            <div class="form-group mb-3">
                                                <label for="">Địa chỉ<span class="text-danger">*</span></label>
                                                <input
                                                    class="form-control @if($errors->has('address_project'))is-invalid @endif"
                                                    placeholder="Nhập địa chỉ"
                                                    name="address_project" value="{{$project['address_vi']}}">
                                                @if($errors->has('address_project'))
                                                    <p class="text-danger">{{ $errors->first('address_project') }}</p>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-12">
                                            <div class="form-group mb-3">
                                                <label for="">Tổng số phần<span class="text-danger">*</span></label>
                                                <input type="text"
                                                       class="form-control @if($errors->has('total_part_project'))is-invalid @endif"
                                                       placeholder="Nhập số phần" name="total_part_project"
                                                       id="total_part_project"
                                                       value="{{number_format($project['part'])}}" {{in_array($project['status'], [2,3,4,5]) ? 'disabled' : ''}}>
                                                @if($errors->has('total_part_project'))
                                                    <p class="text-danger">{{ $errors->first('total_part_project') }}</p>
                                                @endif
                                            </div>

                                        </div>
                                        <div class="col-md-6 col-sm-12">
                                            <div class="form-group mb-3">
                                                <label for="">Giá trị một phần (VND)<span
                                                        class="text-danger">*</span></label>
                                                <input type="text"
                                                       class="form-control @if($errors->has('value_part_project'))is-invalid @endif"
                                                       placeholder="Nhập giá trị" name="value_part_project"
                                                       id="value_part_project"
                                                       value="{{number_format($project['value_part'])}}" {{in_array($project['status'], [2,3,4,5]) ? 'disabled' : ''}}>
                                                @if($errors->has('value_part_project'))
                                                    <p class="text-danger">{{ $errors->first('value_part_project') }}</p>
                                                @endif
                                            </div>

                                        </div>
                                        <div class="col-md-6 col-sm-12">
                                            <div class="form-group mb-3">
                                                <label for="">Loại dự án<span
                                                        class="text-danger">*</span></label>
                                                <select type="text"
                                                        class="form-control @if($errors->has('type_project'))is-invalid @endif"
                                                        disabled>
                                                    <option value="">Chọn Loại dự án</option>
                                                    @foreach(type_project() as $k =>$v)
                                                        <option
                                                            value="{{$k}}" {{$k == $project['type'] ? 'selected' : ''}}>{{$v}}</option>
                                                    @endforeach
                                                </select>
                                                @if($errors->has('type_project'))
                                                    <p class="text-danger">{{ $errors->first('type_project') }}</p>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-12">
                                            <div class="form-group mb-3">
                                                <label for="">Thời gian đầu tư (Tháng)<span class="text-danger">*</span></label>
                                                <input type="number"
                                                       class="form-control @if($errors->has('month_project'))is-invalid @endif"
                                                       placeholder="Nhập số tháng"
                                                       value="{{$project->interests()->where('status', 'active')->first()['period']}}"
                                                       disabled>
                                                @if($errors->has('month_project'))
                                                    <p class="text-danger">{{ $errors->first('month_project') }}</p>
                                                @endif
                                            </div>

                                        </div>
                                        <div class="col-md-6 col-sm-12">
                                            <div class="form-group mb-3">
                                                <label for="">Lãi suất (%/năm)<span class="text-danger">*</span></label>
                                                <input type="text"
                                                       class="form-control @if($errors->has('interest'))is-invalid @endif"
                                                       placeholder="Nhập lãi suất"
                                                       value="{{$project->interests()->where('status', 'active')->first()['interest']}}"
                                                       disabled>
                                                @if($errors->has('interest'))
                                                    <p class="text-danger">{{ $errors->first('interest') }}</p>
                                                @endif
                                            </div>

                                        </div>
                                        <div class="col-md-6 col-sm-12">
                                            <div class="form-group mb-3">
                                                <label for="">Mô tả dự án<span class="text-danger">(VI)*</span></label>
                                                <textarea type="text"
                                                          class="form-control @if($errors->has('description_project_vi'))is-invalid @endif"
                                                          placeholder="Mô tả dự án"
                                                          name="description_project_vi"
                                                          id="description_project_vi">{!! $project['description_vi'] !!}</textarea>
                                                @if($errors->has('description_project_vi'))
                                                    <p class="text-danger">{{ $errors->first('description_project_vi') }}</p>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-12">
                                            <div class="form-group mb-3">
                                                <label for="">Mô tả dự án<span class="text-danger">(EN)*</span></label>
                                                <textarea type="text"
                                                          class="form-control @if($errors->has('description_project_en'))is-invalid @endif"
                                                          placeholder="Mô tả dự án"
                                                          name="description_project_en"
                                                          id="description_project_en">{!! $project['description_en'] !!}</textarea>
                                                @if($errors->has('description_project_en'))
                                                    <p class="text-danger">{{ $errors->first('description_project_en') }}</p>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="text-center" style="text-align: right !important;">
                                            <div class="btnadmin">
                                                <a class="btn btn-secondary" href="{{route('project.list')}}">
                                                    Trở về &nbsp;
                                                    <i class="fa fa-backspace" aria-hidden="true"></i>
                                                </a>
                                                @if(!in_array($project->status, [3,5]))
                                                    <button type="submit" class="btn btn-success action">
                                                        Cập nhật &nbsp;
                                                        <i class="fa fa-edit" aria-hidden="true"></i>
                                                    </button>
                                                @endif
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
        CKEDITOR.replace('description_project_vi', {
            filebrowserBrowseUrl: '{{ asset('ckfinder/ckfinder.html') }}',
            filebrowserImageBrowseUrl: '{{ asset('ckfinder/ckfinder.html?type=Images') }}',
            filebrowserFlashBrowseUrl: '{{ asset('ckfinder/ckfinder.html?type=Flash') }}',
            filebrowserUploadUrl: '{{ asset('ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files') }}',
            filebrowserImageUploadUrl: '{{ asset('ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images') }}',
            filebrowserFlashUploadUrl: '{{ asset('ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash') }}'
        });
        CKEDITOR.replace('description_project_en', {
            filebrowserBrowseUrl: '{{ asset('ckfinder/ckfinder.html') }}',
            filebrowserImageBrowseUrl: '{{ asset('ckfinder/ckfinder.html?type=Images') }}',
            filebrowserFlashBrowseUrl: '{{ asset('ckfinder/ckfinder.html?type=Flash') }}',
            filebrowserUploadUrl: '{{ asset('ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files') }}',
            filebrowserImageUploadUrl: '{{ asset('ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images') }}',
            filebrowserFlashUploadUrl: '{{ asset('ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash') }}'
        });
    </script>
@endsection

