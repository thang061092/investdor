@extends('employee.layout.master')
@section('page_name','- Chi tiết hợp đồng')
@section('content')
    <div class="row mb-3">
        <div class="col-12">
            <ol class="breadcrumb" aria-label="breadcrumbs">
                <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                <li class="breadcrumb-item" aria-current="page"><a href="{{route('contract.index')}}"
                                                                   class="text-info">Danh sách hợp đồng đầu tư</a>
                </li>
                <li class="breadcrumb-item" aria-current="page"><a href="#" class="text-success">Chi tiết hợp đồng đầu
                        tư</a>
                </li>
            </ol>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    {{-- Head --}}
                    <div class="row mb-2">
                        <div class="col-12">
                            <h1 class="d-inline-block">Chi tiết</h1>
                            <div class="float-right d-inline-block" id="filter-data">
                                @if($contract->status == \App\Models\Contract::EFFECT)
                                    <a class="btn btn-success" data-bs-toggle="modal"
                                       data-bs-target="#payment_contract" data-id="{{$contract->id}}">
                                        <i class="fas fa-credit-card"></i>&nbsp;
                                        Thanh toán
                                    </a>
                                @endif
                            </div>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                    {{-- Table --}}
                    <div class="row mb-4">
                        <div class="col-md-12 col-sm-12">
                            <div class="table-responsive">
                                <table class="table table-vcenter table-nowrap table-striped table-bordered">
                                    <thead>
                                    <tr>
                                        <th>Khách hàng</th>
                                        <td>{{$contract->user->full_name}}</td>
                                        <th>Dự án</th>
                                        <td>{{$contract->realEstateProject->name_vi}}</td>
                                    </tr>
                                    <tr>
                                        <th>Số tiền/ Thời gian</th>
                                        <td><span
                                                class="text-danger">{{!empty($contract->amount) ? number_format_vn($contract->amount) : 0}} VND</span>
                                            - {{$contract->month}} tháng
                                        </td>
                                        <th>Lãi suất</th>
                                        <td>{{data_get(json_decode($contract->interest, true), 'interest').'%/ năm'}}</td>
                                    </tr>
                                    <tr>
                                        <th>Số phần</th>
                                        <td>{{!empty($contract->part) ? number_format_vn($contract->part) : 0}}</td>
                                        <th>Giá trị 1 phần</th>
                                        <td>{{!empty($contract->part) ? number_format_vn($contract->value_part) : 0}}</td>
                                    </tr>
                                    <tr>
                                        <th>Ngày bắt đầu</th>
                                        <td>{{!empty($contract->date_init) ? date('d-m-Y', $contract->date_init) : ''}}</td>
                                        <th>Ngày kết thúc dự kiến</th>
                                        <td>{{!empty($contract->due_date) ? date('d-m-Y', $contract->due_date) : ''}}</td>
                                    </tr>
                                    <tr>
                                        <th>Ngày kết thúc thực tế</th>
                                        <td>{{!empty($contract->expire_date) ? date('d-m-Y', $contract->expire_date) : ''}}</td>
                                        <th>Trạng thái</th>
                                        <td><span
                                                class="badge {{color_status_contract($contract->status)}}">{{status_contract($contract->status)}}</span>
                                        </td>
                                    </tr>
                                    </thead>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    {{-- Head --}}
                    <div class="row mb-2">
                        <div class="col-12">
                            <h1 class="d-inline-block">Lịch sử giao dịch</h1>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                    {{-- Table --}}
                    <div class="row mb-4">
                        <div class="col-md-12 col-sm-12">
                            <div class="table-responsive">
                                <table class="table table-vcenter table-nowrap table-striped table-bordered">
                                    <thead>
                                    <tr>
                                        <th style="text-align: center">Thời gian</th>
                                        <th style="text-align: center">Tổng tiền</th>
                                        <th style="text-align: center">Tiền gốc</th>
                                        <th style="text-align: center">Tiền lãi</th>
                                        <th style="text-align: center">Loại giao dịch</th>
                                        <th style="text-align: center">Trạng thái</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @if(!empty($contract->transactions))
                                        @foreach($contract->transactions as $transaction)
                                            <tr style="text-align: center">
                                                <td>{{!empty($transaction->date_pay) ? date('d/m/Y H:i:s', $transaction->date_pay)  : ''}}</td>
                                                <td class="text-danger">{{!empty($transaction->amount) ? number_format_vn($transaction->amount) : 0}}</td>
                                                <td>{{!empty($transaction->principal) ? number_format_vn($transaction->principal) : 0}}</td>
                                                <td>{{!empty($transaction->money_interest) ? number_format_vn($transaction->money_interest) : 0}}</td>
                                                <td>{{type_method($transaction->type_method)}}</td>
                                                <td><span
                                                        class="badge {{color_status_transaction($transaction->status)}}">{{status_transaction($transaction->status)}}</span>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @else
                                    @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal modal-blur" id="payment_contract" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content" style="border-radius: 10px">
                <div class="modal-header">
                    <h5 class="modal-title d-inline-block title-update-period">{{$contract->realEstateProject->name_vi}}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label text-bold">Tiền gốc thanh toán :<span
                                class="text-danger">*</span></label>
                        <input class="form-control tien_goc" type="text"
                               placeholder="Nhập số tiền"
                               name="tien_goc">
                    </div>
                    <div class="mb-3">
                        <label class="form-label text-bold">Tiền lãi thanh toán<span
                                class="text-danger">*</span></label>
                        <input class="form-control tien_lai" type="text"
                               placeholder="Nhập số tiền"
                               name="tien_lai">
                    </div>
                    <div class="mb-3">
                        <label class="form-label text-bold">Ngày thanh toán<span
                                class="text-danger">*</span></label>
                        <input class="form-control ngay_thanh_toan" type="date"
                               placeholder=""
                               name="ngay_thanh_toan">
                    </div>
                    <div class="mb-3">
                        <label for="avatar" class="img-ct">
                            <input type="file" name="chung_tu" accept="image/*" class="d-none"
                                   id="avatar"
                                   onchange="document.getElementById('img-avatar').src = window.URL.createObjectURL(this.files[0])"/>
                            <img id="img-avatar" src="{{asset('frontend/images/default.png')}}"
                                 class="img-fluid" alt="" width="250px" height="250px"/>
                        </label>
                        <label class="form-label"><strong>Chứng từ</strong><span
                                class="text-danger">*</span></label>
                    </div>
                    <input class="form-control interest_period_id" type="hidden"
                           name="contract_id" value="{{$contract->id ?? ''}}">

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary btn_payment_contract">
                        Xác
                        nhận
                    </button>
                </div>
            </div>
        </div>
    </div>
    <script src="{{asset('js/transaction/index.js')}}"></script>
@endsection
