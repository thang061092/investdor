@extends("employee.layout.master")
@section('page_name', '- Chi tiết dự án')
@section("content")
    <div class="row mb-3">
        <div class="col-12">
            <ol class="breadcrumb" aria-label="breadcrumbs">
                <li class="breadcrumb-item"><a href="">Dashboard</a></li>
                <li class="breadcrumb-item" aria-current="page"><a href="{{route('project.list')}}"
                                                                   class="text-success">Danh sách dự án</a>
                </li>
                <li class="breadcrumb-item" aria-current="page"><a href=""
                                                                   class="text-info">Chi tiết dự án</a>
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
                                Thông tin &nbsp;<strong>{{$project->name_vi}}</strong>
                            </div>
                            <div class="card-body ">
                                <div class="row">
                                    <div class="col-md-6 col-sm-12 mb-3">
                                        <div class="card">
                                            <div class="card-header text-danger">
                                                Thông tin cơ bản
                                            </div>
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-md-6 col-sm-12">
                                                        <div class="form-group mb-3">
                                                            <label for="">Tổng giá trị dự án (VND)<span
                                                                    class="text-danger">*</span></label>
                                                            <input type="text"
                                                                   class="form-control"
                                                                   name="total_value_project"
                                                                   placeholder="Nhập giá trị dự án"
                                                                   id="total_value_project"
                                                                   value="{{number_format($project['total_value'])}}"
                                                                   disabled>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 col-sm-12">
                                                        <div class="form-group mb-3">
                                                            <label for="">Tổng số phần<span class="text-danger">*</span></label>
                                                            <input type="text"
                                                                   class="form-control"
                                                                   placeholder="Nhập số phần" name="total_part_project"
                                                                   id="total_part_project"
                                                                   value="{{number_format($project['part'])}}" disabled>
                                                        </div>

                                                    </div>
                                                    <div class="col-md-6 col-sm-12">
                                                        <div class="form-group mb-3">
                                                            <label for="">Giá trị một phần (VND)<span
                                                                    class="text-danger">*</span></label>
                                                            <input type="text"
                                                                   class="form-control"
                                                                   placeholder="Nhập giá trị" name="value_part_project"
                                                                   id="value_part_project"
                                                                   value="{{number_format($project['value_part'])}}"
                                                                   disabled>
                                                        </div>

                                                    </div>
                                                    <div class="col-md-6 col-sm-12">
                                                        <div class="form-group mb-3">
                                                            <label for="">Loại dự án<span
                                                                    class="text-danger">*</span></label>
                                                            <select type="text"
                                                                    class="form-control"
                                                                    disabled>
                                                                <option value="">Chọn Loại dự án</option>
                                                                @foreach(type_project() as $k =>$v)
                                                                    <option
                                                                        value="{{$k}}" {{$k == $project['type'] ? 'selected' : ''}}>{{$v}}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 col-sm-12">
                                                        <div class="form-group mb-3">
                                                            <label for="">Thời gian đầu tư (Tháng)<span
                                                                    class="text-danger">*</span></label>
                                                            <input type="number"
                                                                   class="form-control"
                                                                   placeholder="Nhập số tháng"
                                                                   value="{{$project->interests()->where('status', 'active')->first()['period']}}"
                                                                   disabled>
                                                        </div>

                                                    </div>
                                                    <div class="col-md-6 col-sm-12">
                                                        <div class="form-group mb-3">
                                                            <label for="">Lãi suất (%/năm)<span
                                                                    class="text-danger">*</span></label>
                                                            <input type="text"
                                                                   class="form-control"
                                                                   placeholder="Nhập lãi suất"
                                                                   value="{{$project->interests()->where('status', 'active')->first()['interest']}}"
                                                                   disabled>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 col-sm-12">
                                                        <div class="form-group mb-3">
                                                            <label for="">Tỉnh/Thành phố<span
                                                                    class="text-danger">*</span></label>
                                                            <select
                                                                class="form-control city_project" disabled
                                                                name="city_project">
                                                                <option value="">Chọn Tỉnh/Thành phố</option>
                                                                @foreach($cities as $key => $value)
                                                                    <option
                                                                        value="{{$value['id']}}" {{$value['id'] == $project['city_id'] ? 'selected' : ''}}>{{$value['name']}}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 col-sm-12">
                                                        <div class="form-group mb-3">
                                                            <label for="">Quận/Huyện<span
                                                                    class="text-danger">*</span></label>
                                                            <select
                                                                class="form-control district_project" disabled
                                                                name="district_project">
                                                                <option value="">Quận/Huyện</option>
                                                                @foreach($districts as $key => $value)
                                                                    <option
                                                                        value="{{$value['id']}}" {{$value['id'] == $project['district_id'] ? 'selected' : ''}}>{{$value['name']}}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 col-sm-12">
                                                        <div class="form-group mb-3">
                                                            <label for="">Xã/Phường<span
                                                                    class="text-danger">*</span></label>
                                                            <select
                                                                class="form-control ward_project" disabled
                                                                name="ward_project">
                                                                <option value="">Chọn Xã/Phường</option>
                                                                @foreach($wards as $key => $value)
                                                                    <option
                                                                        value="{{$value['id']}}" {{$value['id'] == $project['ward_id'] ? 'selected' : ''}}>{{$value['name']}}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 col-sm-12">
                                                        <div class="form-group mb-3">
                                                            <label for="">Địa chỉ<span class="text-danger">*</span></label>
                                                            <input
                                                                class="form-control"
                                                                placeholder="Nhập địa chỉ" disabled
                                                                name="address_project" value="{{$project['address_vi']}}">
                                                        </div>

                                                    </div>
                                                    <div class="col-md-12 col-sm-12">
                                                        <div class="form-group mb-3">
                                                            <label for="">Mô tả dự án<span
                                                                    class="text-danger">*</span></label>
                                                            <textarea type="text"
                                                                      class="form-control"
                                                                      placeholder="Mô tả dự án"
                                                                      rows="6" disabled
                                                            >{{ show_html($project['description_vi']) }}</textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-12 mb-3">
                                        <div class="card">
                                            <div class="card-header text-danger">
                                                Thông tin mở rộng
                                            </div>
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-md-12 col-sm-12">
                                                        <div class="form-group mb-3">
                                                            <label for="">Giới thiệu dự án<span
                                                                    class="text-danger">*</span></label>
                                                            <textarea type="text"
                                                                      class="form-control"
                                                                      name="description_project_vi" rows="4" disabled
                                                                      id="description_project_vi">{{!empty($project->overviewProject->overview_vi) ? show_html($project->overviewProject->overview_vi) : ''}}</textarea>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12 col-sm-12">
                                                        <div class="form-group mb-3">
                                                            <label for="">Thông tin địa điểm<span
                                                                    class="text-danger">*</span></label>
                                                            <textarea type="text"
                                                                      class="form-control "
                                                                      name="address_project_vi" rows="4" disabled
                                                                      id="address_project_vi">{{ !empty($project->overviewProject->address_vi) ? show_html($project->overviewProject->address_vi) : ''}}</textarea>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12 col-sm-12">
                                                        <div class="form-group mb-3">
                                                            <label for="">Thông tin thị trường<span
                                                                    class="text-danger">*</span></label>
                                                            <textarea type="text"
                                                                      class="form-control"
                                                                      name="market_project_vi" rows="4" disabled
                                                                      id="market_project_vi">{{!empty($project->overviewProject->market_vi) ? show_html($project->overviewProject->market_vi) : ''}}</textarea>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12 col-sm-12">
                                                        <div class="form-group mb-3">
                                                            <label for="">Thông tin nền tảng<span
                                                                    class="text-danger">*</span></label>
                                                            <textarea type="text"
                                                                      class="form-control"
                                                                      name="background_project_vi" rows="4" disabled
                                                                      id="background_project_vi">{{!empty($project->overviewProject->basis_vi) ? show_html( $project->overviewProject->basis_vi) : ''}}</textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-12 mb-3">
                                        <div class="card">
                                            <div class="card-header text-danger">
                                                Thông tin tài sản
                                            </div>
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-md-6 col-sm-12">
                                                        <div class="form-group mb-3">
                                                            <label for="">Năm xây dựng<span
                                                                    class="text-danger">*</span></label>
                                                            <input type="number"
                                                                   class="form-control" disabled
                                                                   name="year_built"
                                                                   id="year_built"
                                                                   value="{{!empty($project->assetProject->year_built) ? $project->assetProject->year_built : ''}}">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 col-sm-12">
                                                        <div class="form-group mb-3">
                                                            <label for="">Tổng diện tích xây dựng<span
                                                                    class="text-danger">*</span></label>
                                                            <input type="text"
                                                                   class="form-control"
                                                                   name="total_building_area"
                                                                   id="total_building_area" disabled
                                                                   value="{{!empty($project->assetProject->total_building_area) ? number_format($project->assetProject->total_building_area) : ''}}">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 col-sm-12">
                                                        <div class="form-group mb-3">
                                                            <label for="">NRSF<span
                                                                    class="text-danger">*</span></label>
                                                            <input type="text"
                                                                   class="form-control"
                                                                   name="nrsf" disabled
                                                                   id="nrsf"
                                                                   value="{{!empty($project->assetProject->nrsf) ? number_format($project->assetProject->nrsf) : ''}}">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 col-sm-12">
                                                        <div class="form-group mb-3">
                                                            <label for="">Công suất dự kiến<span
                                                                    class="text-danger">*</span></label>
                                                            <input type="text"
                                                                   class="form-control"
                                                                   name="expected_capacity" disabled
                                                                   id="expected_capacity"
                                                                   value="{{!empty($project->assetProject->expected_capacity) ? number_format($project->assetProject->expected_capacity) : ''}}">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 col-sm-12">
                                                        <div class="form-group mb-3">
                                                            <label for="">Mục tiêu Lợi tức ổn định trên Chi phí<span
                                                                    class="text-danger">*</span></label>
                                                            <input type="text"
                                                                   class="form-control"
                                                                   name="target_table"
                                                                   id="target_table" disabled
                                                                   value="{{!empty($project->assetProject->target_table) ? number_format($project->assetProject->target_table) : ''}}">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 col-sm-12">
                                                        <div class="form-group mb-3">
                                                            <label for="">Giá, Chi phí cho đến nay<span
                                                                    class="text-danger">*</span></label>
                                                            <input type="text"
                                                                   class="form-control"
                                                                   name="current_price" disabled
                                                                   id="current_price"
                                                                   value="{{!empty($project->assetProject->current_price) ? number_format($project->assetProject->current_price) : ''}}">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12 col-sm-12">
                                                        <div class="form-group mb-3">
                                                            <label for="">Đặc điểm nổi bật dự án<span
                                                                    class="text-danger">*</span></label>
                                                            <textarea type="text"
                                                                      class="form-control " rows="5"
                                                                      name="project_highlights_vi" disabled
                                                                      id="project_highlights_vi">{{!empty($project->assetProject->project_highlights_vi) ? show_html($project->assetProject->project_highlights_vi) : ''}}</textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-12 mb-3">
                                        <div class="card">
                                            <div class="card-header text-danger">
                                                Thông tin chủ đầu tư
                                            </div>
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-md-12 col-sm-12">
                                                        <div class="form-group mb-3">
                                                            <label for="">Tên công ty<span
                                                                    class="text-danger">*</span></label>
                                                            <input type="text"
                                                                   class="form-control"
                                                                   name="name_company_vi"
                                                                   id="name_company_vi" disabled
                                                                   value="{{ !empty($project->investorProject->name_company_vi) ? $project->investorProject->name_company_vi : '' }}"
                                                                   placeholder="Nhập tên công ty">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12 col-sm-12">
                                                        <div class="form-group mb-3">
                                                            <label for="">Địa chỉ công ty<span
                                                                    class="text-danger">*</span></label>
                                                            <input type="text"
                                                                   class="form-control"
                                                                   name="address_vi"
                                                                   id="address_vi" disabled
                                                                   value="{{!empty($project->investorProject->address_vi) ? $project->investorProject->address_vi : ''}}"
                                                                   placeholder="Nhập Địa chỉ công ty">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12 col-sm-12">
                                                        <div class="form-group mb-3">
                                                            <label for="">Giới thiệu công ty<span
                                                                    class="text-danger">*</span></label>
                                                            <textarea type="text"
                                                                      class="form-control" disabled
                                                                      name="description_vi" rows="8"
                                                                      id="description_vi">{{ !empty($project->investorProject->description_vi) ? show_html($project->investorProject->description_vi) : ''}}</textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="text-center mt-3" style="text-align: right !important;">
                                        <div class="btnadmin">
                                            <a class="btn btn-secondary"
                                               href="{{route('project.list')}}">
                                                Trở về &nbsp;
                                                <i class="fa fa-backspace" aria-hidden="true"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
