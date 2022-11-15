@extends("employee.layout.master")
@section('page_name', '- Cập nhật bài viết')
@section("content")
    <div class="row mb-3">
        <div class="col-12">
            <ol class="breadcrumb" aria-label="breadcrumbs">
                <li class="breadcrumb-item"><a href="">Dashboard</a></li>
                <li class="breadcrumb-item" aria-current="page"><a href=""
                                                                   class="text-info">{{__('page_name.update_news')}}</a>
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
                            <form action='{{route("customer.employee.update_news",["id" => $detail->id])}}' method="post" accept-charset="utf-8" enctype='multipart/form-data'> 
                                <div class="card-body ">
                                    <div class="row">
                                        <div class="col-md-7 col-sm-12">
                                            <div class="form-group mb-3">
                                                <label for="title">{{__('profile.title')}}<span class="text-danger">*</span></label>
                                                <input type="text" class="form-control" name="title" id="title"
                                                    disabled value="{{$detail->title}}" >
                                            </div>
                                            @if($errors->has('title'))
                                                <p class="text-danger" style="padding-bottom: 10px;">{{ $errors->first('title') }}</p>
                                            @endif
                                        </div>
                                        <div class="col-md-7 col-sm-12 email">
                                            <div class="form-group mb-3">
                                                <label for="category">{{__('profile.category')}}<span class="text-danger">*</span></label>
                                                <input type="text" class="form-control" name="category" id="category"
                                                    disabled value="{{$detail->category}}" >   
                                            </div>
                                            @if($errors->has('category'))
                                                <p class="text-danger" style="padding-bottom: 10px;">{{ $errors->first('category') }}</p>
                                            @endif
                                        </div>
                                        <div class="col-md-7 col-sm-12 content">
                                            <div class="form-group mb-3">
                                                <label for="content">{{__('profile.content')}}<span
                                                        class="text-danger">*</span></label>
                                                <textarea disabled type="text" class="form-control" name="content" id="content"
                                                    rows="4" cols="50"    placeholder="{{__('profile.content')}}">{{$detail->content}}</textarea>
                                            </div>
                                            @if($errors->has('content'))
                                                <p class="text-danger" style="padding-bottom: 10px;">{{ $errors->first('content') }}</p>
                                            @endif
                                        </div>
                                        <div class="col-md-7 col-sm-12">
                                            <div class="form-group mb-3">
                                                <label for="file">{{__('profile.img_news')}}<span class="text-danger">*</span></label>
                                                <input disabled type="file" class="form-control" name="img_news" id="img_news"
                                                        placeholder="{{__('profile.img_news')}}" >
                                                <img src='{{asset("$detail->image")}}'>
                                            </div>
                                        </div>
                                        <div class="text-center" style="text-align: right !important;">
                                            <div class="btnadmin">
                                                <button type="submit" id="create" class="btn btn-success action">
                                                {{__('button.update')}} &nbsp;
                                                    <i class="fa fa-plus" aria-hidden="true"></i>
                                                </button>
                                                <a type="button" href="{{route('customer.employee.list_news')}}" class="btn btn-danger action">
                                                {{__('button.back')}} &nbsp;
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

@endsection
