@extends('admin.layouts.login')
@section('content')

<div id="login-page" class="row">
    <div class="col s12 m6 l4 z-depth-4 card-panel border-radius-6 login-card bg-opacity-8">
        <form id="frm-login" class="login-form" method="post" action="{{ route('admin.dologin') }}">
            <input type="hidden" name="_token" value="{{ csrf_token() }}" />
            <div class="row">
                <div class="input-field col s12">
                    <h5 class="ml-4">Sign in</h5>
                </div>
            </div>
            <div class="row margin">
                <div class="input-field col s12">
                    <i class="material-icons prefix pt-2">person_outline</i>
                    <input autocomplete="off" id="email" name="email" type="text">
                    <label for="email" class="center-align">Email Address</label>
                </div>
                <div class="ErrorMessage"></div>
            </div>
            <div class="row margin">
                <div class="input-field col s12">
                    <i class="material-icons prefix pt-2">lock_outline</i>
                    <input id="password" name="password" type="password">
                    <label for="password">Password</label>
                </div>
                <div class="ErrorMessage"></div>
            </div>
            <div class="row">
                <div class="col s12 m12 l12 ml-2 mt-1">
                    <p>
                        <label>
                            <input type="checkbox" name="remember_me"/>
                            <span>Remember Me</span>
                        </label>
                    </p>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                    <button id="btn-submit" type="submit" class="btn waves-effect waves-light border-round gradient-45deg-purple-deep-orange col s12">Login</button>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12 m12 16">
                    <p class="margin center-align medium-small"><a href="{{ route('admin.forgot.password') }}">Forgot password ?</a></p>
                </div>
            </div>
        </form>
    </div>
</div>
<script src="{{ asset('common-assets/js/jquery.validate.min.js') }}"></script>
<script src="{{ asset('js/login.js') }}"></script>
@stop