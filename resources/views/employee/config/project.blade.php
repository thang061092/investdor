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
                    <div class="row">
                        <div class="col-md-6 col-sm-12">
                            <div class="card" style="border-radius: 10px;">
                                <div class="card-header text-primary">
                                    Cấu hình hiển thị:
                                </div>
                                <div class="card-body">
                                    <table class="table table-vcenter table-nowrap table-striped table-bordered">
                                        <thead>
                                        @foreach($config_view as $view)
                                            <tr>
                                                <th style="text-align: center">{{$view['name']}}</th>
                                                <td style="text-align: center"><label
                                                        class="form-check form-switch d-inline-block mb-0 toggle-status"
                                                        data-id="{{$view['id']}}">
                                                        <input class="form-check-input"
                                                               type="checkbox" {{ ($view['status'] == 'active') ? 'checked' : '' }}>
                                                    </label>
                                                </td>
                                            </tr>
                                        @endforeach
                                        </thead>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <div class="card" style="border-radius: 10px;">
                                <div class="card-header text-primary">
                                    Cấu hình vị trí:
                                </div>
                                <div class="card-body">
                                    <table class="table table-vcenter table-nowrap table-striped table-bordered">
                                        <thead>
                                        @foreach($config_index as $index)
                                            <tr>
                                                <th style="text-align: center">{{$index['name']}}</th>
                                                <td style="text-align: center">Vị trí {{$index['level']}} &nbsp;
                                                    <a class="btn btn-success btn-sm swap" data-bs-toggle="modal"
                                                       data-bs-target="#swap-block" data-id="{{$index['id']}}"
                                                       data-level="{{$index['level']}}"
                                                       data-name="{{$index['name']}}">Swap</a>
                                                </td>
                                            </tr>
                                        @endforeach
                                        </thead>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal modal-blur" id="swap-block" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content" style="border-radius: 10px">
                <div class="modal-header">
                    <h5 class="modal-title d-inline-block">Đổi vị trí</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="current_level" id="current_level">
                    <div class="mb-3">
                        <label class="form-label text-bold">Hiện tại :<span
                                class="text-danger">*</span></label>
                        <input class="form-control current_title" type="text" disabled id="current_title">
                    </div>
                    <div class="mb-3">
                        <label class="form-label text-bold">Vị trí muốn đổi :<span
                                class="text-danger">*</span></label>
                        <select class="form-control swap_level" type="text"
                                name="swap_level"></select>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary btn_swap_block" id="btn_swap_block"
                            data-bs-dismiss="modal">
                        Xác
                        nhận
                    </button>
                </div>
            </div>
        </div>
    </div>
    <script src="{{asset('js/config/index.js')}}"></script>
@endsection
