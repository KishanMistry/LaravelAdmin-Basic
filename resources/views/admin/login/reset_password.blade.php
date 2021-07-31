@extends('admin.layouts.login')
@section('content')
<link rel="stylesheet" type="text/css" href="{{ asset('assets/admin/css/pages/forgot.min.css') }}">
<div class="row">
    <div class="col s12">
        <div class="container"><div id="forgot-password" class="row">
                <div class="col s12 m6 l4 z-depth-4 offset-m4 card-panel border-radius-6 forgot-card bg-opacity-8">
                    <form id="frm-reset-password" class="login-form" method="post" action="{{ route('admin.password.reset') }}">
                        <div class="row">
                            <div class="input-field col s12">
                                <h5 class="ml-4">Reset Password</h5>
                                <p class="ml-4">You can reset your password</p>
                            </div>
                        </div>
                        <input id="email" name="email" type="hidden" value="<?php echo!empty(Request()->email) ? Request()->email : '' ?>">
                        <input id="token" name="token" type="hidden" value="<?php echo!empty(Request()->token) ? Request()->token : '' ?>">
                        <div class="row">
                            <div class="input-field col s12">
                                <i class="material-icons prefix pt-2">lock_outline</i>
                                <input id="password" name="password" type="password" data-error=".password">
                                <label for="password">Password</label>
                                <small class="password"></small>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s12">
                                <i class="material-icons prefix pt-2">lock_outline</i>
                                <label for="email">Confirm Password*</label>
                                <input id="confirm-password" type="password" name="confirm_password" data-error=".confirm_password">
                                <small class="confirm_password"></small>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s12">
                                <button type="submit" class="btn waves-effect waves-light border-round gradient-45deg-purple-deep-orange col s12 mb-1">Reset Password</button>
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