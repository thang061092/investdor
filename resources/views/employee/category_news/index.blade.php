@extends('employee.layout.master')
@section('page_name','- '.__('page_name.list_category'))
@section('content')
    <div class="row mb-3">
        <div class="col-12">
            <ol class="breadcrumb" aria-label="breadcrumbs">
                <li class="breadcrumb-item"><a href="">Dashboard</a></li>
                <li class="breadcrumb-item" aria-current="page"><a href="{{route('project.list')}}"
                                                                   class="text-info">{{__('page_name.list_category')}}</a>
                </li>
            </ol>
        </div>
    </div>
    <div class="row mt-3">
        <div class="col-12">
            <div class="card" style="border-radius: 10px;">
                <div class="card-body">
                    {{-- Head --}}
                    <div class="row mb-3">
                        <div class="col-12">
                            <h1 class="d-inline-block">Danh sách danh mục <span
                                    style="color: red"></span></h1>
                            {{-- Search --}}
                            <div class="float-right d-inline-block" id="filter-data">
                                <a class="btn btn-success"
                                   href="{{route('customer.employee.create_category')}}"
                                   target="_blank">
                                    <i class="fas fa-plus"></i>&nbsp;
                                    Thêm mới
                                </a>
                                <a class="btn btn-primary" href="#" data-bs-toggle="dropdown">
                                    <i class="fas fa-filter"></i>&nbsp;
                                    Lọc dữ liệu
                                </a>
                                <div class="dropdown-menu dropdown-menu-end dropdown-menu-card"
                                     style="width: 300px;">
                                    <div class="card d-flex flex-column">
                                        <div class="card-body d-flex flex-column">
                                            <form method="get" action="">
                                                <div class="form-group mb-3">
                                                    <label class="form-label">Ngày bắt đầu</label>
                                                    <div>
                                                        <input type="date" name="start" class="form-control"
                                                               value=""
                                                               autocomplete="off">
                                                    </div>
                                                </div>
                                                <div class="form-group mb-3">
                                                    <label class="form-label">Ngày kết thúc</label>
                                                    <div>
                                                        <input type="date" name="end" class="form-control"
                                                               value=""
                                                               autocomplete="off">
                                                    </div>
                                                </div>

                                                <div class="form-group text-right">
                                                    <button type="submit" class="btn btn-primary">
                                                        <i class="fas fa-search"></i>&nbsp; Tìm kiếm
                                                    </button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                    {{-- Table --}}
                    <div class="row">
                        <div class="col-12">
                            <div class="table-responsive">
                                <table class="table table-vcenter table-nowrap table-striped table-bordered">
                                    <thead>
                                    <tr>
                                        <th style="text-align: center">STT</th>
                                        <th style="text-align: center">Tên danh mục</th>
                                        <th style="text-align: center">Ngày tạo</th>
                                        <th style="text-align: center">Người tạo</th>
                                        <th style="text-align: center">Trạng thái</th>
                                        <th style="text-align: center">Chức năng</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        @if (@empty($list))
                                            <tr>
                                                <td colspan="20" class="text-danger" style="text-align: center">Không có dữ
                                                    liệu
                                                </td>
                                            </tr>
                                        @endif

                                        @if (isset($list))
                                            @foreach ($list as $key => $item)
                                            <tr style="text-align: center">
                                                <td>{{++$key}}</td>
                                                <td>{{$item->name}}</td>
                                                <td>{{$item->created_at}}</td>
                                                <td>{{$item->created_by}}</td>
                                                <td>
                                                    <label class=" form-switch toggle-status" data-id="{{ $item['id'] }} ">
                                                        <input class="form-check-input"
                                                            style="margin-top: 6px"
                                                            type="checkbox" name="status"
                                                            id="status" {{ ($item['status'] == 'active') ? 'checked' : '' }}>
                                                    </label>
                                                    @if($item['status'] == 'active')
                                                        <label></label>
                                                    @else
                                                        <label></label>
                                                    @endif
                                                </td>
                                                <td>
                                                    <div class="dropdown">
                                                        <div id="dropdownMenuButton1" data-bs-toggle="dropdown">
                                                            <svg xmlns="http://www.w3.org/2000/svg" class="icon"
                                                                    width="24"
                                                                    height="24" viewBox="0 0 24 24" stroke-width="2"
                                                                    stroke="currentColor" fill="none"
                                                                    stroke-linecap="round"
                                                                    stroke-linejoin="round">
                                                                <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                                                <circle cx="12" cy="12" r="1"/>
                                                                <circle cx="12" cy="19" r="1"/>
                                                                <circle cx="12" cy="5" r="1"/>
                                                            </svg>
                                                        </div>
                                                        <div class="dropdown-menu dropdown-menu-demo">
                                                            <a class="dropdown-item" target="_blank"
                                                                href='{{route("customer.employee.detail_category",["id" => $item->id])}}'>
                                                                <i class="fa fa-info-circle"></i>&nbsp;
                                                                Chi tiết
                                                            </a>
                                                            <a class="dropdown-item" target="_blank"
                                                                href='{{route("customer.employee.edit_category",["id" => $item->id])}}'>
                                                                <i class="fa fa-edit"></i>&nbsp;
                                                                Cập nhật
                                                            </a>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            @endforeach
                                        @endif
                                        <div class="col-12 col-md-12">
                                            <div class="row">
                                                <div class="col-12 col-md-10"></div>
                                                <div
                                                    class=" col-12 col-md-2">
                                                </div>
                                            </div>
                                        </div>
                                   
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="d-inline-block float-right">

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('js')
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    $(document).ready(function () {
    $('.toggle-status').click(function (event) {
        event.preventDefault();
        var id = $(this).attr('data-id');
        var status = $(this).prop('checked') == 'active' ? 'active' : 'block';
         var formData = new FormData();
         formData.append('status', status);
         formData.append('id', id);
         if (confirm("Bạn chắc chắn muốn thay đổi?")) {
            $.ajax({
                url: "{{route('customer.employee.update_status_category')}}",
                type: 'POST',
                dataType: 'json',
                data: formData,
                processData: false,
                contentType: false,
                success: function (data) {
                    console.log(data);
                    if (data.status == 200) {
                        $('#modal-success').modal('show');
                        setTimeout(function () {
                            window.location.reload();
                        }, 1500)
                    } else {
                        $('#modal-danger').modal('show');
                    }
                },
                error: function () {
                    $(".theloading").hide();
                    alert('error');
                    setTimeout(function () {
                        window.location.reload()
                    }, 1500);
                }
            })
        }
    })
})
</script>

@endsection

