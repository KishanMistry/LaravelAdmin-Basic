@extends('admin.layouts.login')
@section('content')
<link rel="stylesheet" type="text/css" href="{{ asset('assets/admin/css/pages/forgot.min.css') }}">
<div class="row">
    <div class="col s12">
        <div class="container"><div id="forgot-password" class="row">
                <div class="col s12 m6 l4 z-depth-4 offset-m4 card-panel border-radius-6 forgot-card bg-opacity-8">
                    <form id="frm-forgot-password" class="login-form" method="post" action="{{ route('admin.reserpassword.sendmail') }}">
                        <div class="row">
                            <div class="input-field col s12">
                                <h5 class="ml-4">Forgot Password</h5>
                                <p class="ml-4">You can reset your password</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s12">
                                <i class="material-icons prefix pt-2">person_outline</i>
                                <input autocomplete="off" id="email" name="email" type="email" data-error=".email">
                                <label for="email" class="center-align">Email</label>
                                <small class="email"></small>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s12">
                                <button type="submit" class="btn waves-effect waves-light border-round gradient-45deg-purple-deep-orange col s12 mb-1">Send Email</button>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s12 m12 16">
                                <p class="margin center-align medium-small"><a href="{{ route('admin.login') }}">Login</a></p>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="content-overlay"></div>
    </div>
</div>
<script src="{{ asset('common-assets/js/jquery.validate.min.js') }}"></script>
<script src="{{ asset('js/login.js') }}"></script>
@stop