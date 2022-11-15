@extends('employee.layout.master')
@section('page_name','- Danh sách giao dịch')
@section('content')
    <div class="row mb-3">
        <div class="col-12">
            <ol class="breadcrumb" aria-label="breadcrumbs">
                <li class="breadcrumb-item"><a href="">Dashboard</a></li>
                <li class="breadcrumb-item" aria-current="page"><a href="{{route('contract.index')}}"
                                                                   class="text-info">Danh sách giao dịch</a>
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
                            <h1 class="d-inline-block">Danh sách giao dịch <span
                                    style="color: red">({{$transactions->total()}}) </span></h1>
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
                                        <th style="text-align: center">Thời gian</th>
                                        <th style="text-align: center">Khách hàng</th>
                                        <th style="text-align: center">Tên dự án</th>
                                        <th style="text-align: center">Tổng tiền</th>
                                        <th style="text-align: center">Tiền gốc</th>
                                        <th style="text-align: center">Tiền lãi</th>
                                        <th style="text-align: center">Loại giao dịch</th>
                                        <th style="text-align: center">Trạng thái</th>
                                        <th style="text-align: center"></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @empty($transactions[0])
                                        <tr>
                                            <td colspan="20" class="text-danger" style="text-align: center">Không có dữ
                                                liệu
                                            </td>
                                        </tr>
                                    @else
                                        @foreach($transactions as $key => $transaction)
                                            <tr style="text-align: center">
                                                <td>{{++$key}}</td>
                                                <td>{{!empty($transaction->date_pay) ? date('d/m/Y H:i:s', $transaction->date_pay)  : ''}}</td>
                                                <td>{{$transaction->user_full_name ?? ""}}</td>
                                                <td>{{$transaction->project_name_vi ?? ""}}</td>
                                                <td class="text-danger">{{!empty($transaction->amount) ? number_format_vn($transaction->amount) : 0}}</td>
                                                <td>{{!empty($transaction->principal) ? number_format_vn($transaction->principal) : 0}}</td>
                                                <td>{{!empty($transaction->money_interest) ? number_format_vn($transaction->money_interest) : 0}}</td>
                                                <td>{{type_method($transaction->type_method)}}</td>
                                                <td>{{status_transaction($transaction->status)}}</td>
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
                                                            <a class="dropdown-item"
                                                               href="{{route('contract.detail', ['id'=> $transaction->contract_id])}}"
                                                               target="_blank">
                                                                <i class="fa fa-info-circle"></i>&nbsp;
                                                                Chi tiết
                                                            </a>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                        <div class="col-12 col-md-12">
                                            <div class="row">
                                                <div class="col-12 col-md-10"></div>
                                                <div
                                                    class=" col-12 col-md-2">  {{$transactions->appends(request()->query())}}
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
@endsection


