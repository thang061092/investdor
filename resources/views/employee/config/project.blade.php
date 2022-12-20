@extends("employee.layout.master")
@section('page_name', '- Cấu hình hiển thị chi tiết dự án')
@section("content")
    <div class="row mb-3">
        <div class="col-12">
            <ol class="breadcrumb" aria-label="breadcrumbs">
                <li class="breadcrumb-item"><a href="">Dashboard</a></li>
                <li class="breadcrumb-item" aria-current="page"><a href="{{route('customer.employee.list_category')}}"
                                                                   class="text-info">{{__('page_name.list_category')}}</a>
                <li class="breadcrumb-item" aria-current="page"><a href=""
                                                                   class="text-success">Cấu hình hiển thị chi tiết dự
                        án</a>
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
                            <div class="card-header text-primary">
                                Cấu hình:
                            </div>
                            <div class="card-body ">
                                <div class="row">
                                    <div class="col-md-2 col-sm-12">
                                        <span style="padding-right: 10px;">Tổng quan:</span>
                                        <label class="form-check form-switch d-inline-block mb-0 toggle-extend"
                                               data-extend="{{$config['extend']}}">
                                            <input class="form-check-input"
                                                   type="checkbox" {{ ($config['extend'] == 'active') ? 'checked' : '' }}>
                                        </label>
                                    </div>
                                    <div class="col-md-2 col-sm-12">
                                        <span style="padding-right: 10px;">Tài sản</span>
                                        <label class="form-check form-switch d-inline-block mb-0 toggle-asset"
                                               data-asset="{{$config['asset']}}">
                                            <input class="form-check-input"
                                                   type="checkbox" {{ ($config['asset'] == 'active') ? 'checked' : '' }}>
                                        </label>
                                    </div>
                                    <div class="col-md-2 col-sm-12">
                                        <span style="padding-right: 10px;">Chủ đầu tư</span>
                                        <label class="form-check form-switch d-inline-block mb-0 toggle-investor"
                                               data-investor="{{$config['investor']}}">
                                            <input class="form-check-input"
                                                   type="checkbox" {{ ($config['investor'] == 'active') ? 'checked' : '' }}>
                                        </label>
                                    </div>
                                    <div class="col-md-2 col-sm-12">
                                        <span style="padding-right: 10px;">Tài chính</span>
                                        <label class="form-check form-switch d-inline-block mb-0 toggle-financial"
                                               data-financial="{{$config['financial']}}">
                                            <input class="form-check-input"
                                                   type="checkbox" {{ ($config['financial'] == 'active') ? 'checked' : '' }}>
                                        </label>
                                    </div>
                                    <div class="col-md-2 col-sm-12">
                                        <span style="padding-right: 10px;">Kế hoạch kinh doanh</span>
                                        <label class="form-check form-switch d-inline-block mb-0 toggle-plan"
                                               data-plan="{{$config['plan']}}">
                                            <input class="form-check-input"
                                                   type="checkbox" {{ ($config['plan'] == 'active') ? 'checked' : '' }}>
                                        </label>
                                    </div>
                                    <div class="col-md-2 col-sm-12">
                                        <span style="padding-right: 10px;">Tài liệu</span>
                                        <label class="form-check form-switch d-inline-block mb-0 toggle-document"
                                               data-document="{{$config['document']}}">
                                            <input class="form-check-input"
                                                   type="checkbox" {{ ($config['document'] == 'active') ? 'checked' : '' }}>
                                        </label>
                                    </div>
                                    <input type="hidden" value="{{$config['id']}}" name="id">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="{{asset('js/config/index.js')}}"></script>
@endsection
