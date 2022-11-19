@extends("employee.layout.master")
@section('page_name','- '.__('page_name.detail_question'))
@section("content")
    <div class="row mb-3">
        <div class="col-12">
            <ol class="breadcrumb" aria-label="breadcrumbs">
                <li class="breadcrumb-item"><a href="">Dashboard</a></li>
                <li class="breadcrumb-item" aria-current="page"><a href=""
                                                                   class="text-info">{{__('page_name.detail_question')}}</a>
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
                                Thông tin chi tiết:
                            </div>
                                <div class="card-body ">
                                    <div class="row">
                                        <div class="col-md-7 col-sm-12">
                                            <div class="form-group mb-3">
                                                <label for="name">{{__('profile.full_name')}}<span class="text-danger">*</span></label>
                                                <input type="text" class="form-control" name="name" id="name"
                                                    disabled    value="{{$detail->full_name}}">
                                            </div>
                                        </div>
                                        <div class="col-md-7 col-sm-12 ">
                                            <div class="form-group mb-3">
                                                <label for="email">{{__('profile.email')}}<span class="text-danger">*</span></label>
                                                <input type="text" class="form-control" name="email" id="email"
                                                    disabled value="{{$detail->email}}">
                                            </div>
                                        </div>
                                        <div class="col-md-7 col-sm-12 ">
                                            <div class="form-group mb-3">
                                                <label for="question">{{__('profile.question')}}<span class="text-danger">*</span></label>
                                                <input type="text" class="form-control" name="question" id="question" disabled 
                                                value="{{$detail->question}}">
                                            </div>
                                        </div>
                                        <div class="col-md-7 col-sm-12 ">
                                            <div class="form-group mb-3">
                                                <label for="question">{{__('profile.type_question')}}<span class="text-danger">*</span></label>
                                                <p class="form-control">
                                                    @if($detail->type == 1)
                                                        {{__('profile.yet_answer')}}
                                                    @elseif($detail->type == 2)
                                                        {{__('profile.answered')}}
                                                    @endif
                                                </p>
                                            </div>
                                        </div>
                                        <div class="text-center" style="text-align: right !important;">
                                            <div class="btnadmin">
                                                <a type="button" href="{{route('customer.employee.get_all')}}" class="btn btn-danger action">
                                                    Quay lại &nbsp;
                                                    <i class="fa fa-arrow-left" aria-hidden="true"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')

@endsection
