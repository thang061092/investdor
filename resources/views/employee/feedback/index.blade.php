@extends('employee.layout.master')
@section('page_name','- '.__('page_name.list_news'))
@section('content')
    <div class="row mb-3">
        <div class="col-12">
            <ol class="breadcrumb" aria-label="breadcrumbs">
                <li class="breadcrumb-item"><a href="">Dashboard</a></li>
                <li class="breadcrumb-item" aria-current="page"><a href="{{route('project.list')}}"
                                                                   class="text-info">{{__('page_name.list_news')}}</a>
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
                            <h1 class="d-inline-block">Danh sách ý kiến <span
                                    style="color: red"></span></h1>
                            {{-- Search --}}
                            <div class="float-right d-inline-block" id="filter-data">
                                <a class="btn btn-success"
                                   href="{{route('customer.employee.create_news')}}">
                                    <i class="fas fa-plus"></i>&nbsp;
                                    Thêm mới
                                </a>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                    {{-- Table --}}
                    <div class="row">
                    <input type="hidden" class="form-control" name="_token" value="{{ csrf_token() }}">
                    <p style="color: #047734"><strong>Tổng số ý kiến:</strong>&nbsp;<span id="total"></span></p>
                        <div class="col-12">
                            <div class="table-responsive">
                                <table class="table table-vcenter table-nowrap table-striped table-bordered">
                                    <thead>
                                    <tr>
                                        <th style="text-align: center">STT</th>
                                        <th style="text-align: center">Họ tên</th>
                                        <th style="text-align: center">Nghề nghiệp</th>
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
                                                <td>{{ ++$key}}</td>
                                                <td>{{$item->full_name}}</td>
                                                <td>{{$item->job_vi}}</td>
                                                <td>{{date('Y-m-d',strtotime($item->created_at))}}</td>
                                                <td>{{$item->created_by}}</td>
                                                <td>
                                                    <label class=" form-switch toggle-status" data-id="{{ $item['id'] }} ">
                                                        <input class="form-check-input"
                                                            style="margin-top: 6px"
                                                            type="checkbox" name="status"
                                                            id="status" {{ ($item['status'] == 'active') ? 'checked' : '' }}>
                                                    </label>
                                                </td>
                                                <td>
                                                    <div class="dropdown">
                                                        <div id="dropdownMenuButton1" data-bs-toggle="dropdown">
                                                        <button class="btn btn-info"><i class="fas fa-edit"></i>
                                                            </button>
                                                        </div>
                                                        <div class="dropdown-menu dropdown-menu-demo">
                                                            <a class="dropdown-item"
                                                                href='{{route("feedback.detail",["id" => $item->id])}}'>
                                                                <i class="fa fa-info-circle"></i>&nbsp;
                                                                Chi tiết 
                                                            </a>
                                                            <a class="dropdown-item"
                                                                href='{{route("feedback.edit",["id" => $item->id])}}'>
                                                                <i class="fa fa-info-circle"></i>&nbsp;
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
                            @if(!empty($list))
                                <nav aria-label="Page navigation" style="margin-top: 20px;">
                                
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
        var status = $(this).prop('checked') == 'active' ? 'active' : 'deactive';
         var formData = new FormData();
         formData.append('status', status);
         formData.append('id', id);
         formData.append('_token', $('[name="_token"]').val());
         if (confirm("Bạn chắc chắn muốn thay đổi?")) {
            $.ajax({
                url: "{{route('feedback.update_status')}}",
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
                        setTimeout(function () {
                            window.location.reload();
                        }, 1500)
                    }
                },
                error: function () {
                    $(".theloading").hide();
                    alert('error');

                }
            })
        }
    })
})
</script>
@endsection

