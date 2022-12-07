@extends('employee.layout.master')
@section('page_name','- '.__('page_name.list_customer_account'))
@section('content')
    <div class="row mb-3">
        <div class="col-12">
            <ol class="breadcrumb" aria-label="breadcrumbs">
                <li class="breadcrumb-item"><a href="">Dashboard</a></li>
                <li class="breadcrumb-item" aria-current="page"><a href="{{route('project.list')}}"
                                                                   class="text-info">{{__('page_name.list_customer_account')}}</a>
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
                            <h1 class="d-inline-block">Danh sách nhà đầu tư<span
                                    style="color: red"></span></h1>
                            {{-- Search --}}
                            <div class="float-right d-inline-block" id="filter-data">
                                <a class="btn btn-primary" href="#" data-bs-toggle="dropdown">
                                    <i class="fas fa-filter"></i>&nbsp;
                                    Lọc dữ liệu
                                </a>
                                <div class="dropdown-menu dropdown-menu-end dropdown-menu-card"
                                     style="width: 300px;">
                                    <div class="card d-flex flex-column">
                                        <div class="card-body d-flex flex-column">
                                            <form id="search-form" method="get" action="{{route('customer.customer.get_all')}}">
                                                <div class="form-group mb-3">
                                                    <label class="form-label"><strong>Ngày tạo</strong></label>
                                                        <div style="padding-left: 20px;">
                                                            <label>Từ ngày</label>
                                                            <input type="date" name="start_date" class="form-control"
                                                                value=""
                                                                autocomplete="off">
                                                            <label>Đến ngày</label>
                                                            <input type="date" name="end_date" class="form-control"
                                                                value=""
                                                                autocomplete="off">
                                                        </div>
                                                       
                                                </div>
                                                <div class="form-group mb-3">
                                                    <label class="form-label"><strong>Tên khách hàng</strong></label>
                                                    <div>
                                                        <input type="text" name="name_search" class="form-control"
                                                               value=""
                                                               autocomplete="off">
                                                    </div>
                                                </div>
                                                <div class="form-group mb-3">
                                                    <label class="form-label"><strong>Email khách hàng</strong></label>
                                                    <div>
                                                        <input type="text" name="email_search" class="form-control"
                                                               value=""
                                                               autocomplete="off">
                                                    </div>
                                                </div>
                                                
                                                <div class="form-group mb-3">
                                                    <label class="form-label"><strong>Trạng thái hoạt động</strong></label>
                                                    <div>
                                                        <select class="form-control" name="status_search">
                                                            <option value="">--Chọn trạng thái--</option>
                                                            <option value="active">Active</option>
                                                            <option value="block">Block</option>
                                                            <option value="new">New</option>
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="form-group mb-3">
                                                    <label class="form-label"><strong>Trạng thái xác thực</strong></label>
                                                    <div>
                                                        <select class="form-control" name="auth_search">
                                                            <option value="">--Chọn trạng thái xác thực--</option>
                                                            <option value="0">Chưa xác thực</option>
                                                            <option value="1">Đã xác thực</option>
                                                            <option value="2">Chờ xác thực</option>
                                                            <option value="3">Xác thực thất bại</option>
                                                        </select>
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
                                        <th style="text-align: center">Tên nhân viên</th>
                                        <th style="text-align: center">Email</th>
                                        <th style="text-align: center">Tài khoản</th>
                                        <th style="text-align: center">Ngày tạo</th>
                                        <th style="text-align: center">Người tạo</th>
                                        <th style="text-align: center">Trạng thái</th>
                                        <th style="text-align: center">Chức năng</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @if (empty($customer))
                                        <tr style="text-align: center">
                                            <td colspan="20" class="text-danger" style="text-align: center">Không có dữ
                                                liệu
                                            </td>
                                        </tr>
                                    @else
                                        @foreach ($customer as $key => $item)
                                            <tr style="text-align: center">
                                                <td>{{++$key}}</td>
                                                <td>{{$item->full_name}}</td>
                                                <td>{{$item->email}}</td>
                                                <td>
                                                    @if($item->type == 1)
                                                        {{__('profile.type_employee')}}
                                                    @elseif($item->type == 2)
                                                        {{__('profile.type_user')}}
                                                    @endif
                                                </td>
                                                <td>{{$item->created_at}}</td>
                                                <td>{{$item->created_by}}</td>
                                                <td>
                                                    <label class=" form-switch toggle-status"
                                                           data-id="{{ $item['id'] }} ">
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
                                                            <button class="btn btn-info"><i class="fas fa-edit"></i>
                                                            </button>
                                                        </div>
                                                        <div class="dropdown-menu dropdown-menu-demo">
                                                            <a class="dropdown-item" target="_blank"
                                                               href='{{route("customer.customer.detail_customer",["id" => $item->id])}}'>
                                                                <i class="fa fa-info-circle"></i>&nbsp;
                                                                Chi tiết tài khoản
                                                            </a>
                                                            <a class="dropdown-item" target="_blank"
                                                               href='{{route("customer.customer.edit_customer",["id" => $item->id])}}'>
                                                               <i class="fa fa-info-circle"></i>&nbsp;
                                                                Cập nhật tài khoản
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
                        url: "{{route('customer.employee.update_status')}}",
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
<script type="text/javascript">
    var dataSearch = JSON.parse('{!! json_encode($dataSearch) !!}');
    console.log(dataSearch);
    for (const property in dataSearch) {
      if (dataSearch[property] == null) {
        continue;
      }
      console.log(property, ' ', dataSearch[property]);
      $('#search-form').find("[name='" + property + "']").val(dataSearch[property]);
    }
</script>
@endsection

