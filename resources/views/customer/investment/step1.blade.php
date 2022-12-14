@extends("customer.layout.master")
@section('page_name', __('page_name.investment'))
@section("content")
    @include('customer.investment.header')
    @inject('user','App\Http\Services\UserService')
    @php( $user = $user->find(session()->get('customer')['id']) )
    <section class="invest mt-lg-3 pt-2">
        <div class="container">
            <div class="frm-set-invest invest-step-1 wow fadeInUp">
                <div class="wrapper-set-invest mx-auto">
                    <p class="title_lg">{{__('profile.personal_information')}}</p>
                    <label for="" class="d-block mb-2"> {{__('profile.full_name')}} </label>
                    <input type="text" name="full_name" placeholder="" class="form-control mb-3"
                           value="{{session()->get('customer')['full_name'] ?? ''}}" {{in_array($user['accuracy'], [1,2]) ? 'disabled' : ''}}/>
                    <label for="" class="d-block mb-2"> {{__('profile.date_of_birth')}} </label>
                    <input type="date" name="birthday" placeholder="Chọn ngày" class="form-control mb-3"
                           {{in_array($user['accuracy'], [1,2]) ? 'disabled' : ''}}
                           value="{{session()->get('customer')['birthday'] ?? ''}}"/>
                    <label for="" class="d-block mb-2"> {{__('profile.gender')}} </label>
                    <div class="radios mb-3">
                        <label class="gender-choose" for="male">
                            <input type="radio"
                                   {{session()->get('customer')['gender'] == '1' ? 'checked' : ''}} value="1"
                                   name="gender" {{in_array($user['accuracy'], [1,2]) ? 'disabled' : ''}}/>
                            {{__('profile.male')}}
                        </label>
                        <label class="gender-choose" for="female">
                            <input type="radio" value="2"
                                   name="gender"
                                   {{session()->get('customer')['gender'] == '2' ? 'checked' : ''}} value="2"
                                   name="gender" {{in_array($user['accuracy'], [1,2]) ? 'disabled' : ''}}/>
                            {{__('profile.female')}}
                        </label>
                    </div>
                    <label for="" class="d-block mb-2">
                        {{__('profile.phone_number')}}
                    </label>
                    <input type="text" name="phone_number" placeholder=" {{__('profile.phone_number')}}"
                           class="form-control mb-3"
                           {{in_array($user['accuracy'], [1,2]) ? 'disabled' : ''}}
                           value="{{!empty(session()->get('customer')['phone']) ? (session()->get('customer')['phone']): ''}}"/>
                    <label for="" class="d-block mb-2"> {{__('profile.email')}} </label>
                    <input disabled type="text" name="" placeholder=""
                           class="form-control mb-3" value="{{session()->get('customer')['email'] ?? ''}}"/>
                    <p class="title_lg">{{__('profile.bank_account')}}</p>
                    <label for="" class="d-block mb-2">
                        {{__('profile.bank_name')}}
                    </label>
                    <select name="bank_code"
                            class="form-control mb-3" {{in_array($user['accuracy'], [1,2]) ? 'disabled' : ''}}>
                        <option value="">Chọn ngân hàng</option>
                        @foreach($banks as $bank)
                            <option
                                value="{{$bank->code}}" {{$bank->code == session()->get('customer')['bank_name'] ? 'selected' : ''}}>{{$bank->name}}
                                &nbsp;-
                                &nbsp;{{$bank->shortName}}</option>
                        @endforeach
                    </select>
                    <label for="" class="d-block mb-2">
                        {{__('profile.account_number')}}
                    </label>
                    <input type="text" name="account_number" placeholder="" class="form-control mb-3"
                           value="{{session()->get('customer')['account_number'] ?? ""}}" {{in_array($user['accuracy'], [1,2]) ? 'disabled' : ''}}/>
                    <label for="" class="d-block mb-2">
                        {{__('profile.account_holder')}}
                    </label>
                    <input type="text" name="account_name" placeholder="" class="form-control mb-3"
                           value="{{session()->get('customer')['account_name'] ?? ""}}" {{in_array($user['accuracy'], [1,2]) ? 'disabled' : ''}}/>
                    <div class="ping-alert-note">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                  d="M12 3C7.02944 3 3 7.02944 3 12C3 16.9706 7.02944 21 12 21C16.9706 21 21 16.9706 21 12C21 7.02944 16.9706 3 12 3ZM1 12C1 5.92487 5.92487 1 12 1C18.0751 1 23 5.92487 23 12C23 18.0751 18.0751 23 12 23C5.92487 23 1 18.0751 1 12Z"
                                  fill="#C70404"/>
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                  d="M12 7C12.5523 7 13 7.44772 13 8V12C13 12.5523 12.5523 13 12 13C11.4477 13 11 12.5523 11 12V8C11 7.44772 11.4477 7 12 7Z"
                                  fill="#C70404"/>
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                  d="M11 16C11 15.4477 11.4477 15 12 15H12.01C12.5623 15 13.01 15.4477 13.01 16C13.01 16.5523 12.5623 17 12.01 17H12C11.4477 17 11 16.5523 11 16Z"
                                  fill="#C70404"/>
                        </svg>
                        {{__('profile.warning_account')}}
                    </div>
                    <input type="hidden" name="project_id" value="{{$project->id}}">
                </div>
                <button type="button" class="btn_all mt-xl-5 mt-lg-4 mt-3 step1" style="text-align: center">
                    {{__('button.continue')}}
                </button>
            </div>
        </div>
    </section>
@endsection
@section('js')
    <script src="{{asset('js/investment/step1.js')}}"></script>
@endsection
