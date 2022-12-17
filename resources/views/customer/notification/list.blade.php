@extends("customer.layout.master")
@section('page_name', __('page_name.notification'))
@section("content")
    @include('customer.home.banner')
    <div class="page" style="padding-top: 50px">
        <div class="container">
            <div class="card">
                <div class="card-header">
                    <h1>{{__('page_name.notification')}}</h1>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead class="thead-light">
                            <tr>
                                <th style="text-align: center">Tiêu đề</th>
                                <th style="text-align: center">Nội dung</th>
                                <th style="text-align: center">Thời gian</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($notifications as $notification)
                                <tr style="text-align: center;height:100px">
                                    <td>{{$notification->title}}</td>
                                    <td>{!! $notification->content !!}</td>
                                    <td>{{date('d-m-Y H:i:s', strtotime($notification->created_at))}}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
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

