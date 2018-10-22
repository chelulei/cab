@extends('layouts.main')
@section('content')
    <div class="container register mb-5">
        <div class="row">
            <div class="col-md-4 register-left">
                <img src="https://image.ibb.co/n7oTvU/logo_white.png" alt=""/>
                <h3>Welcome</h3>
                <p>loremm</p>
                <a class="btn btn-outline-light" href="{{ route('login') }}">{{ __('Login') }}</a>
                <br/>
            </div>
            <div class="col-md-8 register-right">


                <ul class="nav nav-tabs nav-justified" id="myTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab"
                           aria-controls="home" aria-selected="true">
                            Rider
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab"
                           aria-controls="profile" aria-selected="false">
                            Driver
                        </a>
                    </li>
                </ul>

                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                        <h4 class="register-heading">Register as a Rider</h4>
                        <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="user_type" value="passenger">
                            <div class="row register-form">

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input id="firstname" type="text"
                                               class="form-control{{ $errors->has('firstname') ? ' is-invalid' : '' }}"
                                               name="firstname" value="{{ old('firstname') }}" placeholder="FirstName *"
                                               required autofocus>

                                        @if ($errors->has('firstname'))
                                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('firstname') }}</strong>
                                        </span>
                                        @endif

                                    </div>
                                    <div class="form-group">
                                        <input id="middlename" type="text"
                                               class="form-control{{ $errors->has('middlename') ? ' is-invalid' : '' }}"
                                               name="middlename" value="{{ old('middlename') }}"
                                               placeholder="MiddleName" autofocus>

                                        @if ($errors->has('middlename'))
                                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('middlename') }}</strong>
                                        </span>
                                        @endif

                                    </div>
                                    <div class="form-group">
                                        <input id="lastname" type="text"
                                               class="form-control{{ $errors->has('lastname') ? ' is-invalid' : '' }}"
                                               name="lastname" value="{{ old('lastname') }}" placeholder="LastName *"
                                               required autofocus>

                                        @if ($errors->has('lastname'))
                                            <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('lastname') }}</strong>
                                    </span>
                                        @endif

                                    </div>
                                    <div class="form-group">
                                        <input id="date_birth" type="date"
                                               class="form-control{{ $errors->has('date_birth') ? ' is-invalid' : '' }}"
                                               name="date_birth" value="{{ old('date_birth') }}"
                                               data-placeholder="Date of birth" required aria-required="true">

                                        @if ($errors->has('date_birth'))
                                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('date_birth') }}</strong>
                                </span>
                                        @endif

                                    </div>
                                    <div class="form-group">
                                        <input id="email" type="email"
                                               class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
                                               name="email" value="{{ old('email') }}" placeholder="Email *" required>

                                        @if ($errors->has('email'))
                                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('email') }}</strong>
                                </span>
                                        @endif
                                    </div>

                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <label class="input-group-text" for="inputGroupSelect01">Gender</label>
                                        </div>
                                        <select name="gender" class="custom-select" id="gender" required>
                                            <option selected>Choose...</option>
                                            <option value="Male">Male</option>
                                            <option value="Female">Female</option>
                                        </select>
                                    </div>

                                </div>
                                <!-- /.col-md-6 -->

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input id="username" type="text"
                                               class="form-control{{ $errors->has('username') ? ' is-invalid' : '' }}"
                                               name="username" placeholder="Username *" required>

                                        @if ($errors->has('username'))
                                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('username') }}</strong>
                                </span>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <input id="password" type="password"
                                               class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"
                                               name="password" placeholder="Password *" required>

                                        @if ($errors->has('password'))
                                            <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                        @endif
                                    </div>

                                    <div class="form-group">

                                        <input id="password-confirm" type="password" class="form-control"
                                               name="password_confirmation"
                                               placeholder="Confirm Password *" required>

                                    </div>
                                    <div class="form-group">
                                        <select name="country" class="form-control custom-select select2" required>
                                            <option value="">---Choose Country---</option>
                                            @foreach ($countries as $country)
                                                <option value="{{ $country->country_name}}">{{ $country->country_name}}</option>
                                            @endforeach
                                        </select>
                                        @if ($errors->has('country'))
                                            <span class="help-block">
                                        <strong>{{ $errors->first('country') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                    <br>
                                    <div class="form-group input-group">
                                        <select class="custom-select select2" style="max-width:80px;" name="code">
                                            @foreach ($countries as $country)
                                                <option value="{{ $country->phone_prefix}}">{{$country->phone_prefix}}</option>
                                            @endforeach
                                        </select>
                                        <input name="phone_number" class="form-control" placeholder="Phone number" type="number">
                                    </div>
                                    {{--<div class="form-group">--}}
                                    {{--<label for="exampleFormControlFile1">Choose Profile image</label>--}}
                                    {{--<input type="file" name="profile_image" class="form-control-file" id="">--}}
                                    {{--</div>--}}
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary btn-block">
                                            {{ __('Register') }}
                                        </button>
                                    </div>
                                </div>
                                <!-- /.col-md-6 -->


                            </div>
                        </form>
                    </div>
                    <div class="tab-pane fade show" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                        <h3 class="register-heading">Register as a Driver</h3>
                        <div class="row register-form">
                            <form role="form" action="{{ route('register') }}" method="post" class="registration-form" enctype="multipart/form-data">

                                <fieldset>
                                    @csrf
                                    <legend><h5>Step 1 / 3 Account Details</h5></legend>
                                    <input type="hidden" name="user_type" value="passenger">
                                    <div class="form-row form-bottom">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <input id="firstname" type="text"
                                                       class="form-control{{ $errors->has('firstname') ? ' is-invalid' : '' }}"
                                                       name="firstname" value="{{ old('firstname') }}" placeholder="FirstName *"
                                                       required autofocus>

                                                @if ($errors->has('firstname'))
                                                    <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('firstname') }}</strong>
                                                </span>
                                                @endif

                                            </div>
                                            <div class="form-group">
                                                <input id="middlename" type="text"
                                                       class="form-control{{ $errors->has('middlename') ? ' is-invalid' : '' }}"
                                                       name="middlename" value="{{ old('middlename') }}"
                                                       placeholder="MiddleName *" required autofocus>

                                                @if ($errors->has('middlename'))
                                                    <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('middlename') }}</strong>
                                                </span>
                                                @endif

                                            </div>
                                            <div class="form-group">
                                                <input id="lastname" type="text"
                                                       class="form-control{{ $errors->has('lastname') ? ' is-invalid' : '' }}"
                                                       name="lastname" value="{{ old('lastname') }}" placeholder="LastName *"
                                                       required autofocus>

                                                @if ($errors->has('lastname'))
                                                    <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('lastname') }}</strong>
                                                </span>
                                                @endif

                                            </div>
                                            <div class="form-group">
                                                <input id="date_birth" type="date"
                                                       class="form-control{{ $errors->has('date_birth') ? ' is-invalid' : '' }}"
                                                       name="date_birth" value="{{ old('date_birth') }}"
                                                       data-placeholder="Date of birth" required aria-required="true">

                                                @if ($errors->has('date_birth'))
                                                    <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('date_birth') }}</strong>
                                                </span>
                                                @endif

                                            </div>
                                            <div class="form-group">
                                                <input id="email" type="email"
                                                       class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
                                                       name="email" value="{{ old('email') }}" placeholder="Email *" required>

                                                @if ($errors->has('email'))
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $errors->first('email') }}</strong>
                                                        </span>
                                                @endif
                                            </div>


                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <label class="input-group-text" for="inputGroupSelect01">Gender</label>
                                                </div>
                                                <select name="gender" class="custom-select" id="gender" required>
                                                    <option selected>Choose...</option>
                                                    <option value="Male">Male</option>
                                                    <option value="Female">Female</option>
                                                </select>
                                            </div>

                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <input id="username" type="text"
                                                       class="form-control{{ $errors->has('username') ? ' is-invalid' : '' }}"
                                                       name="username" placeholder="Username *" required>

                                                @if ($errors->has('username'))
                                                    <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('username') }}</strong>
                                </span>
                                                @endif
                                            </div>
                                            <div class="form-group">
                                                <input id="password" type="password"
                                                       class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"
                                                       name="password" placeholder="Password *" required>

                                                @if ($errors->has('password'))
                                                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                                @endif
                                            </div>

                                            <div class="form-group">

                                                <input id="password-confirm" type="password" class="form-control"
                                                       name="password_confirmation"
                                                       placeholder="Confirm Password *" required>

                                            </div>
                                            <div class="form-group">
                                                <select name="country" class="form-control custom-select select2" required>
                                                    <option value="">---Choose Country---</option>
                                                    @foreach ($countries as $country)
                                                        <option value="{{ $country->country_name}}">{{ $country->country_name}}</option>
                                                    @endforeach
                                                </select>
                                                @if ($errors->has('country'))
                                                    <span class="help-block">
                                        <strong>{{ $errors->first('country') }}</strong>
                                    </span>
                                                @endif
                                            </div>
                                            <br>
                                            <div class="form-group input-group">
                                                <select class="custom-select select2" style="max-width:80px;" name="code">
                                                    @foreach ($countries as $country)
                                                        <option value="{{ $country->phone_prefix}}">{{$country->phone_prefix}}</option>
                                                    @endforeach
                                                </select>
                                                <input name="phone_number" class="form-control" placeholder="Phone number" type="number">
                                            </div>

                                        </div>
                                        <!-- /.col-md-6 -->
                                        <button type="button" class="btn btn-next">Next</button>
                                    </div>

                                </fieldset>


                                <fieldset>
                                    <legend><h5>Step 2 / 3 ID Details</h5></legend>
                                    <div class="form-row form-bottom">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="sr-only" for="form-first-name">ID Type</label>
                                                <input type="text" name="id_type" placeholder="ID Type... *"
                                                       class="form-id-type form-control" id="type_id" required>
                                            </div>
                                            <div class="form-group">
                                                <input id="expiry_date" type="date"
                                                       class="form-control{{ $errors->has('expiry_date') ? ' is-invalid' : '' }}"
                                                       name="expiry_date" value="{{ old('expiry_date') }}"
                                                       data-placeholder="Date of Expiry" required aria-required="true">

                                                @if ($errors->has('expiry_date'))
                                                    <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('expiry_date') }}</strong>
                                                </span>
                                                @endif

                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="sr-only" for="">ID Number</label>
                                                <input type="number" name="id_number" placeholder="ID Number... *"
                                                       class="form-control" id="id_number" required>
                                            </div>
                                            <div class="form-group">
                                                <input type="hidden" name="user_type" value="driver">
                                            </div>
                                        </div>
                                        <div class="input-group mb-3">
                                            <div class="custom-file col-sm-12">
                                                <input type="file" name="id_image" class="custom-file-input" id="id_image" aria-describedby="inputGroupFileAddon01">
                                                <label class="custom-file-label" for="id_image">Upload back / front image Id</label>
                                            </div>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <input type="text" name="street" class="form-control" placeholder="House/Stret..">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <input type="text" name="barangay" class="form-control" placeholder="Barangay/Location..">
                                        </div>
                                        <div class="form-row">
                                            <div class="col-sm-4 form-group">
                                                <input type="text" name="city" placeholder="City.." class="form-control">
                                            </div>
                                            <div class="col-sm-4 form-group">
                                                <input type="text" name="province" placeholder="Province.." class="form-control">
                                            </div>
                                            <div class="col-sm-4 form-group">
                                                <input type="text" name="zipcode" placeholder="Zip Code.." class="form-control">
                                            </div>
                                        </div>
                                        <!-- /.col-md-6 -->
                                        <button type="button" class="btn btn-previous mr-2">Previous</button>
                                        <button type="button" class="btn btn-next">Next</button>
                                    </div>
                                </fieldset>
                                <fieldset>
                                    <legend><h5>Step 3 / 3 Car Details</h5></legend>
                                    <div class="form-bottom form-row ">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="sr-only" for="form-facebook">Car Type</label>
                                                <input type="text" name="car_type" placeholder="Car Type..." class="form-facebook form-control" required>
                                            </div>
                                            <div class="form-group">
                                                <label class="sr-only" for="form-twitter">Franchise Number</label>
                                                <input type="text" name="franchise_number" placeholder="Franchise Number..." class="form-control" required>
                                            </div>
                                            <div class="form-group">
                                                <label class="sr-only" for="">Plate Number</label>
                                                <input type="text" name="plate_number" placeholder="Plate Numbe..." class="form-control">
                                            </div>

                                        </div>
                                        <!-- /.col-md-6 -->
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="sr-only" for="form-twitter">CR Number</label>
                                                <input type="text" name="cr_number" placeholder="CR Number..." class="form-control" required>
                                            </div>
                                            <div class="form-group">
                                                <label class="sr-only" for="">OR Number</label>
                                                <input type="text" name="or_number" placeholder="OR Number..." class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label class="sr-only" for="">LTO Number</label>
                                                <input type="date" name="lto_expiry_date" placeholder="LTO Expiry..."  class="form-control">
                                            </div>
                                        </div>
                                        <!-- /.col-md-6 -->
                                        <button type="button" class="btn btn-previous mr-2">Previous</button>
                                        <button type="submit" class="btn">Sign me up!</button>
                                    </div>
                                </fieldset>
                            </form>
                            <!-- /.col-md-8 -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /.container -->
@endsection
@push('styles')
    <link href="{{ asset('/css/form-elements.css') }}" rel="stylesheet">
    <link href="{{ asset('/css/register.css') }}" rel="stylesheet">
@endpush