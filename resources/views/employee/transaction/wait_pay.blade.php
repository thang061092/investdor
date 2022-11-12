@extends('employee.layout.master')
@section('page_name','- Danh sách giao dịch chờ thanh toán')
@section('content')
    <div class="row mb-3">
        <div class="col-12">
            <ol class="breadcrumb" aria-label="breadcrumbs">
                <li class="breadcrumb-item"><a href="">Dashboard</a></li>
                <li class="breadcrumb-item" aria-current="page"><a href=""
                                                                   class="text-info">Danh sách giao dịch chờ thanh
                        toán</a>
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
                            <h1 class="d-inline-block">Danh sách giao dịch chờ thanh toán <span
                                    style="color: red">({{count($bills)}})</span></h1>
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
                                            <form method="get" action="">
                                                <div class="form-group mb-3">
                                                    <label class="form-label">Ngày bắt đầu</label>
                                                    <div>
                                                        <input type="date" name="start" class="form-control"
                                                               value="{{ request()->get('start') }}"
                                                               autocomplete="off">
                                                    </div>
                                                </div>
                                                <div class="form-group mb-3">
                                                    <label class="form-label">Ngày kết thúc</label>
                                                    <div>
                                                        <input type="date" name="end" class="form-control"
                                                               value="{{ request()->get('end') }}"
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
                                        <th style="text-align: center">Khách hàng</th>
                                        <th style="text-align: center">Tên dự án</th>
                                        <th style="text-align: center">Tổng tiền</th>
                                        <th style="text-align: center">Số phần đầu tư</th>
                                        <th style="text-align: center">Giá trị 1 phần</th>
                                        <th style="text-align: center">Nội dung CK</th>
                                        <th style="text-align: center">Trạng thái</th>
                                        <th style="text-align: center">Ngày tạo</th>
                                        <th style="text-align: center"></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @empty($bills[0])
                                        <tr>
                                            <td colspan="20" class="text-danger" style="text-align: center">Không có dữ
                                                liệu
                                            </td>
                                        </tr>
                                    @else
                                        @foreach($bills as $key => $bill)
                                            <tr style="text-align: center">
                                                <td>{{++$key}}</td>
                                                <td>{{$bill->user->full_name ?? ""}}</td>
                                                <td>{{$bill->realEstateProject->name_vi ?? ""}}</td>
                                                <td>{{number_format_vn($bill->amount_money) ?? ""}}</td>
                                                <td>{{number_format_vn($bill->part)}}</td>
                                                <td>{{number_format_vn($bill->value_part)}}</td>
                                                <td>{{($bill->order_code)}}</td>
                                                <td>{{status_bill($bill->status)}}</td>
                                                <td>{{$bill->created_at}}</td>
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
                                                            <button class="dropdown-item confirm-bill" data-bs-target="#confirm-bill"
                                                                    data-bs-toggle="modal"
                                                                    data-id="{{$bill->id}}">
                                                                <i class="fa fa-save"></i>&nbsp;
                                                                Cập nhật thanh toán
                                                            </button>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                        <div class="col-12 col-md-12">
                                            <div class="row">
                                                <div class="col-12 col-md-10"></div>
                                                <div
                                                    class=" col-12 col-md-2">  {{$bills->appends(request()->query())}}
                                                </div>
                                            </div>
                                        </div>
                                    @endempty
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
    @include('employee.transaction.modal-confirm-transaction')
    <script src="{{asset('js/transaction/index.js')}}"></script>
@endsection

