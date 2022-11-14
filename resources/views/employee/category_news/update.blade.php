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
                            <form action='{{route("customer.employee.update_category",["id" => $detail->id])}}' method="post" accept-charset="utf-8" enctype='multipart/form-data'>
                                @csrf 
                                <div class="card-body ">
                                    <div class="row">
                                        <div class="col-md-7 col-sm-12">
                                            <div class="form-group mb-3">
                                                <label for="title">{{__('profile.name_category')}}<span class="text-danger">*</span></label>
                                                <input type="text" class="form-control" name="name_category" id="name_category"
                                                    value="{{$detail->name}}" >
                                                        
                                            </div>
                                            @if($errors->has('name_category'))
                                                <p class="text-danger" style="padding-bottom: 10px;">{{ $errors->first('name_category') }}</p>
                                            @endif
                                        </div>
                                        <div class="col-md-7 col-sm-12 desc_category">
                                            <div class="form-group mb-3">
                                                <label for="desc_category">{{__('profile.desc_category')}}<span
                                                        class="text-danger">*</span></label>
                                                <textarea type="text" class="form-control" name="desc_category" id="desc_category"
                                                    rows="4" cols="50">{{$detail->description}}</textarea>
                                            </div>
                                            @if($errors->has('desc_category'))
                                                <p class="text-danger" style="padding-bottom: 10px;">{{ $errors->first('desc_category') }}</p>
                                            @endif
                                        </div>

                                        <div class="col-md-7 col-sm-12 email">
                                            <div class="form-group mb-3">
                                                <label for="img_category">{{__('profile.img_category')}}<span class="text-danger">*</span></label>
                                                <input type="file" name="file" class="form-control" id="file" placeholder="{{__('profile.img_category')}}">
                                                <img src='{{asset("$detail->image")}}'>
                                            </div>
                                            @if($errors->has('img_category'))
                                                <p class="text-danger" style="padding-bottom: 10px;">{{ $errors->first('img_category') }}</p>
                                            @endif
                                        </div>
  
                                        <div class="text-center" style="text-align: right !important;">
                                            <div class="btnadmin">
                                                <button type="submit" id="create" class="btn btn-success action">
                                                {{__('button.update')}} &nbsp;
                                                    <i class="fa fa-plus" aria-hidden="true"></i>
                                                </button>
                                                <a type="button" href="{{route('customer.employee.list_category')}}" class="btn btn-danger action">
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
