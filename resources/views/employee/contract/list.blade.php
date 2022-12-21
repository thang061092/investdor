@extends('employee.layout.master')
@section('page_name','- Danh sách hợp đồng đầu tư')
@section('content')
    <div class="row mb-3">
        <div class="col-12">
            <ol class="breadcrumb" aria-label="breadcrumbs">
                <li class="breadcrumb-item"><a href="">Dashboard</a></li>
                <li class="breadcrumb-item" aria-current="page"><a href="{{route('contract.index')}}"
                                                                   class="text-info">Danh sách hợp đồng đầu tư</a>
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
                            <h1 class="d-inline-block">Danh sách hợp đồng đầu tư<span
                                    style="color: red">({{count($contracts) > 0 ? $contracts->total() : 0}})</span></h1>
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
                                            <form method="get" action="{{route('contract.index')}}">
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
                                        <th style="text-align: center">Lãi suất</th>
                                        <th style="text-align: center">Thời gian</th>
                                        <th style="text-align: center">Ngày bắt đầu</th>
                                        <th style="text-align: center">Ngày kết thúc dự kiến</th>
                                        <th style="text-align: center">Ngày kết thúc thực tế</th>
                                        <th style="text-align: center">Trạng thái</th>
                                        <th style="text-align: center"></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @empty($contracts[0])
                                        <tr>
                                            <td colspan="20" class="text-danger" style="text-align: center">Không có dữ
                                                liệu
                                            </td>
                                        </tr>
                                    @else
                                        @foreach($contracts as $key => $contract)
                                            <tr style="text-align: center">
                                                <td>{{++$key}}</td>
                                                <td>{{$contract->user_full_name ?? ""}}</td>
                                                <td>{{$contract->project_name_vi ?? ""}}</td>
                                                <td class="text-danger">{{!empty($contract->amount) ? number_format_vn($contract->amount) : 0}}</td>
                                                <td>{{!empty($contract->part) ? number_format_vn($contract->part) : 0}}</td>
                                                <td>{{number_format_vn($contract->value_part)}}</td>
                                                <td>{{data_get(json_decode($contract->interest, true), 'interest').'%/ năm'}}</td>
                                                <td>{{($contract->month). ' tháng'}}</td>
                                                <td>{{!empty($contract->date_init) ? date('d-m-Y', $contract->date_init) : ''}}</td>
                                                <td>{{!empty($contract->due_date) ? date('d-m-Y', $contract->due_date) : ''}}</td>
                                                <td>{{!empty($contract->expire_date) ? date('d-m-Y', $contract->expire_date) : ''}}</td>
                                                <td>{{status_contract($contract->status)}}</td>
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
                                                               href="{{route('contract.detail', ['id'=> $contract->id])}}"
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
                                                    class=" col-12 col-md-2">  {{$contracts->appends(request()->query())}}
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


