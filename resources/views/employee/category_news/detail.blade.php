@extends("employee.layout.master")
@section('page_name', '- Chi tiết danh mục')
@section("content")
    <div class="row mb-3">
        <div class="col-12">
            <ol class="breadcrumb" aria-label="breadcrumbs">
                <li class="breadcrumb-item"><a href="">Dashboard</a></li>
                <li class="breadcrumb-item" aria-current="page"><a href="{{route('customer.employee.list_category')}}"
                                                                   class="text-info">{{__('page_name.list_category')}}</a>
                <li class="breadcrumb-item" aria-current="page"><a href="{{route('customer.employee.detail_category',['id' => $detail->id])}}"
                                                                   class="text-info">{{__('page_name.detail_category')}}</a>
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
                                    <div class="col-md-6 col-sm-12">
                                            <div class="form-group mb-3">
                                                <label for="name_category_vi">{{__('profile.name_category_vi')}}<span class="text-danger">*</span></label>
                                                <input type="text" class="form-control" name="name_category_vi" id="name_category_vi" disabled
                                                    value="{{$detail->name}}" >

                                            </div>
                                            @if($errors->has('name_category_vi'))
                                                <p class="text-danger" style="padding-bottom: 10px;">{{ $errors->first('name_category_vi') }}</p>
                                            @endif
                                        </div>
                                        <div class="col-md-6 col-sm-12">
                                            <div class="form-group mb-3">
                                                <label for="name_category_en">{{__('profile.name_category_en')}}<span class="text-danger">*</span></label>
                                                <input type="text" class="form-control" name="name_category_en" id="name_category_en" disabled
                                                    value="{{$detail->name_en}}" >

                                            </div>
                                            @if($errors->has('name_category_en'))
                                                <p class="text-danger" style="padding-bottom: 10px;">{{ $errors->first('name_category_en') }}</p>
                                            @endif
                                        </div>
                                        <div class="col-md-6 col-sm-12 desc_category">
                                            <div class="form-group mb-3">
                                                <label for="desc_category_vi">{{__('profile.desc_category_vi')}}<span
                                                        class="text-danger">*</span></label>
                                                <textarea type="text" class="form-control" name="desc_category_vi" id="desc_category_vi" disabled
                                                    rows="4" cols="50">{{$detail->description}}</textarea>
                                            </div>
                                            @if($errors->has('desc_category_vi'))
                                                <p class="text-danger" style="padding-bottom: 10px;">{{ $errors->first('desc_category_vi') }}</p>
                                            @endif
                                        </div>
                                        <div class="col-md-6 col-sm-12 desc_category">
                                            <div class="form-group mb-3">
                                                <label for="desc_category_en">{{__('profile.desc_category_en')}}<span
                                                        class="text-danger">*</span></label>
                                                <textarea type="text" class="form-control" name="desc_category_en" id="desc_category_en" disabled
                                                    rows="4" cols="50">{{$detail->description_en}}</textarea>
                                            </div>
                                            @if($errors->has('desc_category_en'))
                                                <p class="text-danger" style="padding-bottom: 10px;">{{ $errors->first('desc_category_en') }}</p>
                                            @endif
                                        </div>
                                        <div class="text-center" style="text-align: right !important;">
                                            <div class="btnadmin">
{{--                                                <button type="submit" id="create" class="btn btn-success action">--}}
{{--                                                {{__('button.update')}} &nbsp;--}}
{{--                                                    <i class="fa fa-plus" aria-hidden="true"></i>--}}
{{--                                                </button>--}}
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
    <script>
        CKEDITOR.replace('desc_category_vi', {
            filebrowserBrowseUrl: '{{ asset('ckfinder/ckfinder.html') }}',
            filebrowserImageBrowseUrl: '{{ asset('ckfinder/ckfinder.html?type=Images') }}',
            filebrowserFlashBrowseUrl: '{{ asset('ckfinder/ckfinder.html?type=Flash') }}',
            filebrowserUploadUrl: '{{ asset('ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files') }}',
            filebrowserImageUploadUrl: '{{ asset('ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images') }}',
            filebrowserFlashUploadUrl: '{{ asset('ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash') }}'
        });
        CKEDITOR.replace('desc_category_en', {
            filebrowserBrowseUrl: '{{ asset('ckfinder/ckfinder.html') }}',
            filebrowserImageBrowseUrl: '{{ asset('ckfinder/ckfinder.html?type=Images') }}',
            filebrowserFlashBrowseUrl: '{{ asset('ckfinder/ckfinder.html?type=Flash') }}',
            filebrowserUploadUrl: '{{ asset('ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files') }}',
            filebrowserImageUploadUrl: '{{ asset('ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images') }}',
            filebrowserFlashUploadUrl: '{{ asset('ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash') }}'
        });
    </script>
@endsection
