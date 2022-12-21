@extends("employee.layout.master")
@section('page_name', '- Cập nhật tài khoản mới')
@section('css')
<style>
            /* Style the Image Used to Trigger the Modal */
            .img {
          border-radius: 5px;
          cursor: pointer;
          transition: 0.3s;
        }

        .modal-backdrop {
            display: none !important;
        }

        .img:hover {opacity: 0.7;}

        /* The Modal (background) */
        .modal {
          display: none; /* Hidden by default */
          position: fixed; /* Stay in place */
          z-index: 1; /* Sit on top */
          padding-top: 100px; /* Location of the box */
          left: 0;
          top: 0;
          width: 100%; /* Full width */
          height: 100%; /* Full height */
          overflow: auto; /* Enable scroll if needed */
          background-color: rgb(0,0,0); /* Fallback color */
          background-color: rgba(0,0,0,0.9); /* Black w/ opacity */
        }

        /* Modal Content (Image) */
        .modal-content {
          margin: auto;
          display: block;
          width: 80%;
          max-width: 700px;
        }

    .close {
        position: absolute;
        top: 60px;
        right: 35px;
        color: #f1f1f1;
        font-size: 40px;
        font-weight: bold;
        transition: 0.3s;
    }

    .close:hover,
    .close:focus {
        color: #bbb;
        text-decoration: none;
        cursor: pointer;
    }
    #caption {
        margin: auto;
        display: block;
        width: 80%;
        max-width: 700px;
        text-align: center;
        color: #ccc;
        padding: 10px 0;
        height: 150px;
    }

    /* Add Animation - Zoom in the Modal */
    .modal-content, #caption {
        animation-name: zoom;
        animation-duration: 0.6s;
    }
    .modal-content {
        margin: auto;
        display: block;
        width: 80%;
        max-width: 700px;
    }
    
    @keyframes zoom {
          from {transform:scale(0)}
          to {transform:scale(1)}
        }
        @media only screen and (max-width: 700px){
          .modal-content {
            width: 100%;
          }
        }
</style>
@endsection
@section("content")
    <div class="row mb-3">
        <div class="col-12">
            <ol class="breadcrumb" aria-label="breadcrumbs">
                <li class="breadcrumb-item"><a href="">Dashboard</a></li>
                <li class="breadcrumb-item" aria-current="page"><a href="{{route('customer.customer.get_all')}}"
                                                                   class="text-info">{{__('page_name.list_customer_account')}}</a>
                <li class="breadcrumb-item" aria-current="page"><a href="{{route('customer.customer.edit_customer', ['id' => $customer->id])}}"
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
                                @csrf
                                <input type="hidden" class="form-control" name="_token" value="{{ csrf_token() }}">
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
                                                    <img onclick="clickImg(this)" style="width:200px; height:200px" class="form-control" src='{{asset("$customer->front_facing_card")}}' id="img_before" alt=""/>
                                                    @else
                                                    <p class="text-danger">{{__('table.no_data')}}</p>
                                                    @endif
                                                </div>
                                            </div>

                                            <div class="col-md-6 col-sm-12">
                                                <div class="form-group mb-3">
                                                    <label for="img_after">{{__('profile.backside')}}<span class="text-danger">*</span></label>
                                                    @if ($customer->card_back)
                                                    <img onclick="clickImg(this)" style="width:200px; height:200px" class="form-control" src='{{asset("$customer->card_back")}}' id="img_after" alt=""/>
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
    <!-- The Modal -->
    <div id="imgModal" class="modal">
      <!-- The Close Button -->
      <span class="close" onclick="closeModal(this)">&times;</span>
      <!-- Modal Content (The Image) -->
      <img class="modal-content" id="img01">
      <!-- Modal Caption (Image Text) -->
    </div>
@endsection
@section('js')
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script type="text/javascript">
    $(document).ready(function () {
        $("#auth").on('click', function() {
            var form = new FormData();
            form.append('_token', $('[name="_token"]').val());
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
                    data: form,
                    processData: false,
                    contentType: false,
                    success: function(data)
                        {
                            if (data.status == 200) {
                                Swal.fire(
                                    "{{__('message.success')}}",
                                    "{{__('message.success')}}",
                                    'success'
                                )
                                setTimeout(function () {
                                window.location.reload()}, 2000);
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
            var form = new FormData();
            form.append('_token', $('[name="_token"]').val());
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
                    data: form,
                    processData: false,
                    contentType: false,
                    success: function(data)
                        {
                            if (data.status == 200) {
                                Swal.fire(
                                    "{{__('message.success')}}",
                                    "{{__('message.success')}}",
                                    'success'
                                )
                                setTimeout(function () {
                                window.location.reload()}, 2000);
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

<script type="text/javascript">
    function clickImg(el) {
        var modal = document.getElementById("imgModal");
        // Get the image and insert it inside the modal - use its "alt" text as a caption
        var modalImg = document.getElementById("img01");
        var captionText = document.getElementById("caption");
        modal.style.display = "block";
        modalImg.src = el.src;
    }    
    const closeModal = function(el) {
        console.log("close");
        $(el).closest('.modal').hide();
    }
</script>

@endsection
