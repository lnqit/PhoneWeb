@extends('admin.layouts.app')
@include('admin.shared.links')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header bg-primary text-white text-uppercase font-weight-bold">{{ __('Register') }}</div>

                <div class="card-body row">
                    <div class="cart-img col-md-4">
                        <img style="margin-top: 10px" src="{{ asset('/images/choo.jpg')}}">
                    </div>

                    <div class="cart-content col-md-8">
                        <form method="POST" action="{{ route('register') }}">
                            @csrf

                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    
                                    <label for="name" class="font-weight-bold col-form-label text-md-right">{{ __('Name') }}</label>
                                                                        
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}"  autocomplete="name" autofocus>

                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    
                                </div>
                                <div class="form-group col-md-6">
                                    
                                    <label for="name" class="col-form-label text-md-right font-weight-bold">{{ __('Phone') }}</label>
                                   
                                    <input id="phone" type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}"  autocomplete="phone" autofocus>

                                        @error('phone')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    
                                </div>
                            </div>

                            <div class="form-row ">
                                <div class="form-group col-md-6">
                                 <label for="birthday" class=" col-form-label text-md-right font-weight-bold">{{ __('Birthday ') }}</label>
                                                             
                                    <input id="birthday" type="date" class="form-control @error('birthday') is-invalid @enderror" name="birthday" value="{{ old('birthday') }}"  autocomplete="birthday" autofocus>

                                    @error('birthday')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-md-6 form-group ">
                                    <label for="sex" class=" col-form-label text-md-right font-weight-bold">{{ __('Sex') }}</label>

                                    <div class="col-md-6 row">
                                        <div class="col-md-6">
                                            <input id="sex" type="radio" class="form-control @error('sex') is-invalid @enderror" name="sex" value="1"  autocomplete="sex"  autofocus>
                                            <label for="male">Male</label>
                                        </div>

                                        <div class="col-md-6">
                                            <input id="sex" type="radio" class="form-control @error('sex') is-invalid @enderror" name="sex" value="0"  autocomplete="sex" autofocus>
                                            <label for="Female">Female</label>
                                         </div>

                                        @error('sex')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>                            

                            <div class="form-group">
                                <label for="address" class=" col-form-label text-md-right font-weight-bold">{{ __('Address ') }}</label>

                                
                                    <input id="address" type="text" class="form-control @error('address') is-invalid @enderror" name="address" value="{{ old('address') }}"  autocomplete="address" autofocus>

                                    @error('address')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                
                            </div>


                            <div class="form-group">
                                <label for="email" class=" col-form-label text-md-right font-weight-bold">{{ __('E-Mail ') }}</label>                                
                                 <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}"  autocomplete="email">

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                
                            </div>

                            <div class="form-row ">
                                <div class="col-md-6 form-group">
                                    <label for="password" class=" col-form-label text-md-right font-weight-bold">{{ __('Password') }}</label>
                                
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password"  autocomplete="new-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-md-6 form-group">
                                    <label for="password-confirm" class=" col-form-label text-md-right font-weight-bold">{{ __('Confirm Password') }}</label>
                                    
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                    
                                </div>
                            </div>

                            <div class="form-group ">
                                <div>
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Register') }}
                                    </button>
                                    <a href="{{ route('login') }}" >Do you already have an account?</a>
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