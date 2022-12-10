@extends("employee.layout.master")
@section('page_name','- '.__('page_name.detail_question'))
@section("content")
    <div class="row mb-3">
        <div class="col-12">
            <ol class="breadcrumb" aria-label="breadcrumbs">
                <li class="breadcrumb-item"><a href="">Dashboard</a></li>
                <li class="breadcrumb-item" aria-current="page"><a href="{{route('list_question')}}"
                                                                   class="text-info">{{__('page_name.list_question')}}</a>
                <li class="breadcrumb-item" aria-current="page"><a href="{{route('detail_question', ['id' => $detail->id])}}"
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
                            {{__('page_name.details')}}:
                            </div>
                            <form action='{{route("send_answer",["id" => $detail->id])}}' method="post" accept-charset="utf-8" enctype='multipart/form-data'>
                                <div class="card-body ">
                                    <div class="row">
                                        <div class="col-md-6 col-sm-12">
                                            <div class="form-group mb-3">
                                                <label for="name">{{__('profile.full_name')}}<span class="text-danger">*</span></label>
                                                <input type="text" class="form-control" name="name" id="name"
                                                    disabled value="{{$detail->name}}">
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-12 ">
                                            <div class="form-group mb-3">
                                                <label for="email">{{__('profile.email')}}<span class="text-danger">*</span></label>
                                                <input type="text" class="form-control" name="email" id="email"
                                                    disabled value="{{$detail->email}}">
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-12 ">
                                            <div class="form-group mb-3">
                                                <label for="question">{{__('profile.question')}}<span class="text-danger">*</span></label>
                                                <input type="text" class="form-control" name="question" id="question" disabled 
                                                value="{{$detail->question}}">
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-12 ">
                                            <div class="form-group mb-3">
                                                <label for="question">{{__('profile.type_question')}}<span class="text-danger">*</span></label>
                                                    @if($detail->type == 1)
                                                    <input type="text" class="form-control" name="type" id="type" disabled value="{{__('profile.yet_answer')}}">
                                                    @elseif($detail->type == 2)
                                                    <input type="text" class="form-control" name="type" id="type" disabled value="{{__('profile.answered')}}">
                                                    @endif
                                            </div>
                                        </div>
                                        <div class="col-md-12 col-sm-12 ">
                                            <div class="form-group mb-3">
                                                <label for="question">{{__('profile.answer_question')}}<span class="text-danger">*</span></label>
                                                <textarea id="answer" name="answer" class="form-control" placehodel="{{__('profile.answer_question')}}"></textarea>
                                            </div>
                                            @if($errors->has('answer'))
                                                <p class="text-danger" style="padding-bottom: 10px;">{{ $errors->first('answer') }}</p>
                                            @endif
                                        </div>
                                        <div class="text-center" style="text-align: right !important;">
                                            <div class="btnadmin">
                                                <button type="submit" class="btn btn-success">
                                                    {{__('profile.answer_question')}}
                                                </button>
                                                <a type="button" href="{{route('list_question')}}" class="btn btn-danger action">
                                                    Quay lại &nbsp;
                                                    <i class="fa fa-arrow-left" aria-hidden="true"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')

<script src='https://cdnjs.cloudflare.com/ajax/libs/tinymce/5.8.2/tinymce.min.js'></script>
<script>
tinymce.init({
    selector: '#answer',
});

</script>
@endsection

