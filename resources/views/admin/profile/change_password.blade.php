@extends('admin.layouts.default')
@section('content')
<div class="content-wrapper-before gradient-45deg-indigo-purple cls-dashboard"></div>
@include('admin.includes.breadcrumbs')
<div class="row">
    <div class="col s12">
        <div class="container">
            <div class="section">
                <div class="card card-tabs">
                    <div class="card-content">
                        <div id="view-validations">
                            <form class="formValidate" id="frm-update-password" method="post" action="{{ route('admin.update.password') }}">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                                <div class="row">
                                    <div class="input-field col s12">
                                        <label for="first_name">Current Password*</label>
                                        <input id="current-password" name="current_password" type="password" data-error=".current_password">
                                        <small class="current_password"></small>
                                    </div>
                                    <div class="input-field col s12">
                                        <label for="last_name">New Password*</label>
                                        <input id="new-password" name="new_password" type="password" data-error=".new_password">
                                        <small class="new_password"></small>
                                    </div>
                                    <div class="input-field col s12">
                                        <label for="email">Confirm Password*</label>
                                        <input id="confirm-password" type="password" name="confirm_password" data-error=".confirm_password">
                                        <small class="confirm_password"></small>
                                    </div>
                                    <div class="input-field col s12">
                                        <button class="btn waves-effect waves-light right submit" type="submit" name="action">Save
                                            <i class="material-icons right">send</i>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="{{ asset('assets/admin/vendors/jquery-validation/jquery.validate.min.js') }}"></script>
<script src="{{ asset('js/profile.js') }}"></script>
@stop