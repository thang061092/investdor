@extends("employee.layout.master")
@section('page_name', '- Thêm tài khoản mới')
@section("content")
    <div class="row mb-3">
        <div class="col-12">
            <ol class="breadcrumb" aria-label="breadcrumbs">
                <li class="breadcrumb-item"><a href="">Dashboard</a></li>
                <li class="breadcrumb-item" aria-current="page"><a href=""
                                                                   class="text-info">{{__('page_name.update_account')}}</a>
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
                            {{__('auth.personal_information')}}:
                            </div>
                            <form action='{{route("customer.customer.update_customer",["id" => $customer->id])}}' method="post" accept-charset="utf-8" enctype='multipart/form-data'>
                                <div class="card-body ">
                                    <div class="row">
                                        <div class="col-md-6 col-sm-12">
                                            <div class="form-group mb-3">
                                                <label for="accuracy">{{__('profile.status_auth')}}<span class="text-danger">*</span></label>
                                                @if ($customer->accuracy == 0)
                                                    <input type="text" class="form-control text-danger" name="" disabled
                                                            value="{{__('profile.yet_auth')}}">
                                                @elseif ($customer->accuracy == 1)
                                                    <input type="text" class="form-control text-success" name="" disabled
                                                            value="{{__('profile.success_auth')}}">
                                                @elseif ($customer->accuracy == 2)
                                                    <input type="text" class="form-control text-warning" name="" disabled
                                                         value="{{__('profile.wait_auth')}}">
                                                @else
                                                    <input type="text" class="form-control text-danger" name="" disabled
                                                         value="{{__('profile.fail_auth')}}">
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-12">
                                                <div class="form-group mb-3">
                                                    <label for="full_name">{{__('profile.full_name')}}<span class="text-danger">*</span></label>
                                                    <input type="text" class="form-control" name="full_name" id="full_name"
                                                    disabled  value="{{$customer->full_name}}">
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-sm-12 email">
                                                <div class="form-group mb-3">
                                                    <label for="email">{{__('profile.email')}}<span class="text-danger">*</span></label>
                                                    <input type="text" class="form-control" name="email" id="email" disabled
                                                         value="{{$customer->email}}">
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-sm-12">
                                                <div class="form-group mb-3">
                                                    <label for="phone_number">{{__('profile.phone_number')}}<span class="text-danger">*</span></label>
                                                    <input type="text" class="form-control" name="phone_number" id="phone_number" disabled
                                                         value="{{$customer->phone}}">
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-sm-12">
                                                <div class="form-group mb-3">
                                                    <label for="identity">{{__('profile.identity')}}<span class="text-danger">*</span></label>
                                                    <input type="text" class="form-control" name="identity" id="identity" disabled
                                                         value="{{$customer->identity}}">
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-sm-12">
                                                <div class="form-group mb-3">
                                                    <label for="date_identity">{{__('profile.date_identity')}}<span class="text-danger">*</span></label>
                                                    <input type="date" class="form-control" name="date_identity" id="date_identity" disabled
                                                         value="{{$customer->date_identity}}">
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-sm-12">
                                                <div class="form-group mb-3">
                                                    <label for="address_identity">{{__('profile.address_identity')}}<span class="text-danger">*</span></label>
                                                    <input type="text" class="form-control" name="address_identity" id="address_identity" disabled
                                                         value="{{$customer->address_identity}}">
                                                </div>
                                            </div>

                                            <div class="col-md-6 col-sm-12">
                                                <div class="form-group mb-3">
                                                    <label for="gender">{{__('profile.date_of_birth')}}<span class="text-danger">*</span></label>
                                                    <input type="text" class="form-control" name="gender" id="gender" disabled
                                                         value="{{$customer->birthday}}">
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-sm-12">
                                                <div class="form-group mb-3">
                                                    <label for="gender">{{__('profile.gender')}}<span class="text-danger">*</span></label>
                                                    @if($customer->gender == 1)
                                                    <input disabled class="form-control" type="text"  value="Nam">
                                                    @else
                                                    <input disabled class="form-control" type="text"  value="Nữ">
                                                    @endif
                                                </div>
                                            </div>

                                            <div class="col-md-6 col-sm-12">
                                                <div class="form-group mb-3">
                                                    <label for="bank_name">{{__('profile.bank_name')}}<span class="text-danger">*</span></label>
                                                    <input disabled type="text" class="form-control" name="bank_name" id="bank_name"
                                                        value="{{$bank_name}}">
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-sm-12">
                                                <div class="form-group mb-3">
                                                    <label for="account_number">{{__('profile.account_number')}}<span class="text-danger">*</span></label>
                                                    <input disabled type="text" class="form-control" name="account_number" id="account_number"
                                                         value="{{$customer->account_number}}">
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-sm-12">
                                                <div class="form-group mb-3">
                                                    <label for="account_name">{{__('profile.account_holder')}}<span class="text-danger">*</span></label>
                                                    <input disabled type="text" class="form-control" name="account_name" id="account_name"
                                                         value="{{$customer->account_name}}">
                                                </div>
                                            </div>

                                            <div class="col-md-6 col-sm-12">
                                                <div class="form-group mb-3">
                                                    <label for="img_before">{{__('profile.facede')}}<span class="text-danger">*</span></label>
                                                    @if ($customer->front_facing_card)
                                                    <img style="width:200px; height:200px" class="form-control" src='{{asset("$customer->front_facing_card")}}' id="img_before" alt=""/>
                                                    @else
                                                    <p class="text-danger">{{__('table.no_data')}}</p>
                                                    @endif
                                                </div>
                                            </div>

                                            <div class="col-md-6 col-sm-12">
                                                <div class="form-group mb-3">
                                                    <label for="img_after">{{__('profile.backside')}}<span class="text-danger">*</span></label>
                                                    @if ($customer->card_back)
                                                    <img style="width:200px; height:200px" class="form-control" src='{{asset("$customer->card_back")}}' id="img_after" alt=""/>
                                                    @else
                                                    <p class="text-danger">{{__('table.no_data')}}</p>
                                                    @endif
                                                </div>
                                            </div>

                                        <div class="text-center" style="text-align: right !important;">
                                            <div class="btnadmin">
                                                @if ($customer->accuracy == 2)
                                                <a type="button" id="auth" class="btn btn-success action">
                                                {{__('profile.auth')}}&nbsp;
                                                    <i class="fa fa-refresh" aria-hidden="true"></i>
                                                </a>
                                                <a type="button" id="not_auth" class="btn btn-warning action">
                                                {{__('profile.not_auth')}}&nbsp;
                                                    <i class="fa fa-refresh" aria-hidden="true"></i>
                                                </a>
                                                @endif
                                                @if ($customer->accuracy == 3)
                                                <a type="button" id="auth" class="btn btn-success action">
                                                {{__('profile.auth')}}&nbsp;
                                                    <i class="fa fa-refresh" aria-hidden="true"></i>
                                                </a>
                                                @endif
                                                <a type="button" href="{{route('customer.customer.get_all')}}" class="btn btn-danger action">
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
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script type="text/javascript">
    $(document).ready(function () {
        $("#auth").on('click', function() {
            Swal.fire({
                title: "{{__('auth.authentication')}}",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: "{{__('message.yes')}}",
                cancelButtonText: "{{__('message.no')}}",
                }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                    type: "POST",
                    url: "{{route('customer.customer.auth',['id' => $customer->id])}}",
                    datatype: "JSON",
                    success: function(data)
                        {
                            if (data.status == 200) {
                                Swal.fire(
                                    "{{__('message.success')}}",
                                    "{{__('message.success')}}",
                                    'success'
                                )
                            } else {
                                Swal.fire(
                                    "{{__('message.fail')}}",
                                    "{{__('message.fail')}}",
                                    'error'
                                )
                            }
                        }
                    });
                }
            })
        });

        $("#not_auth").on('click', function() {
            Swal.fire({
                title: "{{__('auth.not_authentication')}}",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: "{{__('message.yes')}}",
                cancelButtonText: "{{__('message.no')}}",
                }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                    type: "POST",
                    url: "{{route('customer.customer.not_auth',['id' => $customer->id])}}",
                    datatype: "JSON",
                    success: function(data)
                        {
                            if (data.status == 200) {
                                Swal.fire(
                                    "{{__('message.success')}}",
                                    "{{__('message.success')}}",
                                    'success'
                                )
                            } else {
                                Swal.fire(
                                    "{{__('message.fail')}}",
                                    "{{__('message.fail')}}",
                                    'error'
                                )
                            }
                        }
                    });
                }
            })
        });
    })
</script>
@endsection
