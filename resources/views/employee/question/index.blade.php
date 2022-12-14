@extends('employee.layout.master')
@section('page_name','- '.__('page_name.list_question'))
@section('content')
    <div class="row mb-3">
        <div class="col-12">
            <ol class="breadcrumb" aria-label="breadcrumbs">
                <li class="breadcrumb-item"><a href="">Dashboard</a></li>
                <li class="breadcrumb-item" aria-current="page"><a href="{{route('list_question')}}"
                                                                   class="text-info">{{__('page_name.list_question')}}</a>
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
                            <h1 class="d-inline-block">Danh sách câu hỏi<span
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
                                        <form id="search-form" method="get" action="{{route('list_question')}}">
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
                                                    <label class="form-label"><strong>Trạng thái</strong></label>
                                                    <div>
                                                        <select class="form-control" name="status_search">
                                                            <option value="">--Chọn trạng thái--</option>
                                                            <option value="2">Đã trả lời</option>
                                                            <option value="1">Chưa trả lời</option>
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
                    <p style="color: #047734"><strong>Tổng số câu hỏi:</strong>&nbsp;<span id="total">{{$questions->total()}}</span></p>
                        <div class="col-12">
                            <div class="table-responsive">
                                <table class="table table-vcenter table-nowrap table-striped table-bordered">
                                    <thead>
                                    <tr>
                                        <th style="text-align: center">{{__('page_name.serial')}}</th>
                                        <th style="text-align: center">{{__('profile.full_name')}}</th>
                                        <th style="text-align: center">{{__('profile.email')}}</th>
                                        <th style="text-align: center">{{__('profile.status')}}</th>
                                        <th style="text-align: center">{{__('profile.created_at')}}</th>
                                        <th style="text-align: center">{{__('profile.function')}}</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        @if (@empty($questions))
                                            <tr>
                                                <td colspan="20" class="text-danger" style="text-align: center">Không có dữ
                                                    liệu
                                                </td>
                                            </tr>
                                        @endif
                                        @if (isset($questions))
                                            @foreach ($questions as $key => $question)
                                            <tr style="text-align: center">
                                                <td>{{$perPage + ++$key}}</td>
                                                <td>{{$question->name}}</td>
                                                <td>{{$question->email}}</td>
                                                <td>
                                                    @if($question->type == 1)
                                                        <p class="text-danger">{{__('profile.yet_answer')}}</p>
                                                    @elseif($question->type == 2)
                                                    <p class="text-success">{{__('profile.answered')}}</p>
                                                    @endif
                                                </td>
                                                <td>{{$question->created_at}}</td>
                                                <td>
                                                    <div class="dropdown">
                                                        <div id="dropdownMenuButton1" data-bs-toggle="dropdown">
                                                        <button class="btn btn-info"><i class="fas fa-edit"></i>
                                                            </button>
                                                        </div>
                                                        <div class="dropdown-menu dropdown-menu-demo">
                                                            <a class="dropdown-item" target="_blank"
                                                                href='{{route("detail_question",["id" => $question->id])}}'>
                                                                <i class="fa fa-info-circle"></i>&nbsp;
                                                                Chi tiết
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
                            @if(!empty($questions))
                                <nav aria-label="Page navigation" style="margin-top: 20px;">
                                {{$questions->withQueryString()->links()}}
                                </nav>
                            @endif
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
@endsection

