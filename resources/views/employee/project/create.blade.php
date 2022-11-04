@extends("employee.layout.master")
@section('page_name', '- Tạo mới dự án')
@section("content")
    <div class="row mb-3">
        <div class="col-12">
            <ol class="breadcrumb" aria-label="breadcrumbs">
                <li class="breadcrumb-item"><a href="">Dashboard</a></li>
                <li class="breadcrumb-item" aria-current="page"><a href=""
                                                                   class="text-info">Tạo mới dự án</a>
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
                                Thông tin cơ bản dự án
                            </div>
                            <div class="card-body ">
                                <form method="post" action="{{route('project.create_post')}}">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-6 col-sm-12">
                                            <div class="form-group mb-3">
                                                <label for="">Tên dự án<span class="text-danger">(VI)*</span></label>
                                                <input type="text" class="form-control" name="project_name_vi"
                                                       placeholder="Nhập tên dự án">
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-12">
                                            <div class="form-group mb-3">
                                                <label for="">Tên dự án<span class="text-danger">(EN)*</span></label>
                                                <input type="text" class="form-control" name="project_name_en"
                                                       placeholder="Nhập tên dự án">
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-12">
                                            <div class="form-group mb-3">
                                                <label for="">Tổng giá trị dự án<span
                                                        class="text-danger">*</span></label>
                                                <input type="text" class="form-control" name="total_value_project"
                                                       placeholder="Nhập giá trị dự án">
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-12">
                                            <div class="form-group mb-3">
                                                <label for="">Tỉnh/Thành phố<span class="text-danger">*</span></label>
                                                <select class="form-control city_project" name="city_project">
                                                    <option value="">Chọn Tỉnh/Thành phố</option>
                                                    @foreach($cities as $key => $value)
                                                        <option value="{{$value['code']}}">{{$value['name']}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-12">
                                            <div class="form-group mb-3">
                                                <label for="">Quận/Huyện<span class="text-danger">*</span></label>
                                                <select class="form-control district_project" name="district_project">
                                                    <option>Quận/Huyện</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-12">
                                            <div class="form-group mb-3">
                                                <label for="">Xã/Phường<span class="text-danger">*</span></label>
                                                <select class="form-control ward_project" name="ward_project">
                                                    <option>Chọn Xã/Phường</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-12">
                                            <div class="form-group mb-3">
                                                <label for="">Địa chỉ<span class="text-danger">*</span></label>
                                                <input class="form-control" placeholder="Nhập địa chỉ"
                                                       name="address_project">
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-12">
                                            <div class="form-group mb-3">
                                                <label for="">Tổng số phần<span class="text-danger">*</span></label>
                                                <input type="text" class="form-control"
                                                       placeholder="Nhập số phần" name="total_part_project">
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-12">
                                            <div class="form-group mb-3">
                                                <label for="">Giá trị một phần<span class="text-danger">*</span></label>
                                                <input type="text" class="form-control"
                                                       placeholder="Nhập giá trị" name="value_part_project">
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-12">
                                            <div class="form-group mb-3">
                                                <label for="">Loại dự án<span
                                                        class="text-danger">*</span></label>
                                                <select type="text" class="form-control" name="type_project">
                                                    <option value="">Chọn Loại dự án</option>
                                                    @foreach(type_project() as $k =>$v)
                                                        <option value="{{$k}}">{{$v}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-12">
                                            <div class="form-group mb-3">
                                                <label for="">Mô tả dự án<span class="text-danger">(VI)*</span></label>
                                                <textarea type="text" class="form-control"
                                                          placeholder="Mô tả dự án"
                                                          name="description_project_vi"
                                                          id="description_project_vi"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-12">
                                            <div class="form-group mb-3">
                                                <label for="">Mô tả dự án<span class="text-danger">(EN)*</span></label>
                                                <textarea type="text" class="form-control"
                                                          placeholder="Mô tả dự án"
                                                          name="description_project_en"
                                                          id="description_project_en"></textarea>
                                            </div>
                                        </div>
                                        <div class="text-center" style="text-align: right !important;">
                                            <div class="btnadmin">
                                                <button type="submit" class="btn btn-success action">
                                                    Thêm mới &nbsp;
                                                    <i class="fa fa-plus" aria-hidden="true"></i>
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

