@extends("employee.layout.master")
@section('page_name', '- Cập nhật hình ảnh dự án ' . $project['name_vi'] ?? '')
@section('css')
    <link rel="stylesheet" href="{{ asset('css/jquery.fancybox.css') }}">
    <link rel="stylesheet" href="{{ asset('css/jquery.magnify.css') }}">
    <link rel="stylesheet" href="{{ asset('css/image_upload.css') }}">
    <link rel="stylesheet" href="{{ asset('css/template.css') }}">
@endsection
@section("content")
    <div class="row mb-3">
        <div class="col-12">
            <ol class="breadcrumb" aria-label="breadcrumbs">
                <li class="breadcrumb-item"><a href="">Dashboard</a></li>
                <li class="breadcrumb-item" aria-current="page"><a href="{{route('project.list')}}"
                                                                   class="text-success">Danh sách dự án</a>
                </li>
                <li class="breadcrumb-item" aria-current="page"><a href=""
                                                                   class="text-info">Cập nhật hình ảnh dự án</a>
                </li>
            </ol>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row mb-3">
                        <div class="col-12">
                            <h1 class="d-inline-block">Dự án : {{$project['name_vi']}}</h1>
                            {{-- Search --}}
                            <div class="float-right d-inline-block">
                                <a class="btn btn-info" href="">
                                    <i class="fas fa-info"></i>&nbsp;
                                    Chi tiết
                                </a>
                                <a class="btn btn-primary btn_update_image_project" href="#"
                                   data-id="{{$project['id']}}">
                                    <i class="fas fa-save"></i>&nbsp;
                                    Cập nhật
                                </a>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                </div>
                <div class="card mb-5">
                    <div class="card-header">
                        Ảnh đại diện dự án
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-3 mb-3">
                                <div class="img_anh_dai_dien">
                                    <span class="loading_img_anh_dai_dien" style="display: none">
							            <i class="fa fa-cog  fa-spin fa-3x fa-fw"></i>
								    </span>
                                    <label for="input_img_per">
                                        <img id="img_anh_dai_dien"
                                             src="{{ !empty($project['image']) ? $project['image'] : asset('frontend/images/default.png') }}"
                                             style="width: 500px;height: 225px" alt="">
                                        <input type="file" id="input_img_per" data-preview="imgInp001"
                                               style="visibility: hidden;" name="anh_dai_dien"
                                               value="{{$project['image']}}">
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                        Ảnh dự án
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12">
                                <div id="SomeThing" class="simpleUploader">
                                    <div class="uploads" id="img_project">
                                        @if(!empty($project->imageProjects) && count($project->imageProjects) > 0)
                                            @foreach($project->imageProjects as $key => $value)
                                                <div class="block">
                                                    <!--//Image-->
                                                    @if($value->type == 'image/png' || $value->type == 'image/jpg' || $value->type == 'image/jpeg')
                                                        <a href="{{$value->path}}" class="magnifyitem"
                                                           data-magnify="gallery"
                                                           data-src="" data-group="thegallery" data-toggle="lightbox"
                                                           data-gallery="img_project" data-max-width="992"
                                                           data-type="image_project"
                                                           data-title="Ảnh dự án">
                                                            <img data-key="{{$key}}" name="img_project"
                                                                 data-fileName="{{$value->name}}"
                                                                 data-fileType="{{$value->type}}"
                                                                 data-type='image_project'
                                                                 class="w-100" src="{{$value->path}}" alt="">
                                                        </a>
                                                    @endif
                                                    <button type="button" onclick="deleteImage(this)"
                                                            data-id=""
                                                            data-type="image_project" data-key='' class="cancelButton ">
                                                        <i
                                                            class="fa fa-times-circle"></i></button>
                                                </div>
                                            @endforeach
                                        @endif
                                    </div>
                                    <label for="upload_project">
                                        <div class="uploader btn btn-primary">
                                            <span>+</span>
                                        </div>
                                        <input id="upload_project"
                                               multiple
                                               type="file"
                                               name="file"
                                               data-contain="img_project"
                                               data-title="Ảnh dự án"
                                               data-type="image_project"
                                               class="focus hidden">
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <style>
        .img_anh_dai_dien {
            position: relative;
        }

        .img_anh_dai_dien .loading_img_anh_dai_dien {
            position: absolute;
            z-index: 10;
            background-color: rgba(0, 0, 0, 0.5);
            display: flex;
            justify-content: center;
            align-items: center;
            color: white;
            width: 100%;
            height: 100%;
        }

        .img_anh_dai_dien .loading_img_anh_dai_dien i.fa {
            width: 38px;
            height: 38px;
            text-align: center;
        }
    </style>
@endsection
@section('js')
    <script src="{{asset('js/project/upload.js')}}"></script>
    <script src="{{asset('js/jquery.magnify.js')}}"></script>
    <script src="{{asset('js/simpleUpload.js')}}"></script>
    <script src="{{asset('js/style.js')}}"></script>
    <script src="{{asset('js/extras.js')}}"></script>
@endsection

