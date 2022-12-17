@extends("customer.layout.master")
@section('page_name', session()->get('lang') == \App\Http\Controllers\BaseController::LANG_EN ? $knowledge['title_en'] : $knowledge['title'])
@section("content")
    @include('customer.home.banner')
    <div class="page" style="padding-top: 50px">
        <div class="container">
            <div class="card">
                @if($knowledge)
                    <div class="card-header">
                        <h1>{{session()->get('lang') == \App\Http\Controllers\BaseController::LANG_EN ? $knowledge['title_en'] : $knowledge['title']}}</h1>
                    </div>
                    <div class="card-body">
                        <div class="content">
                            <div class="col-12 text-justify" style="text-align: center">
                                {!! session()->get('lang') == \App\Http\Controllers\BaseController::LANG_EN ? $knowledge['content_en'] : $knowledge['content'] !!}

                            </div>
                        </div>
                    </div>
                @else
                    <div class="content">
                        <div class="col-12 wysiwyg text-justify">
                            No content
                        </div>
                    </div>
                @endif
            </div>

        </div>
    </div>
    <style>
        .page {
            background: #fff;
            margin: 0 auto;
            padding: 20px 0;
        }

        .page h1 {
            color: #03204c;
            border-bottom: 1px solid;
            padding-bottom: 10px;
            margin-bottom: 10px;
            font-size: 16px;
        }

        @media {
            .content img {
                display: block;
                margin-left: auto;
                margin-right: auto;
            }
        }
    </style>
@endsection

