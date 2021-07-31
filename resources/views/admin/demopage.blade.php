@extends('admin.layouts.default')
@section('content')
<form method="post" action="{{ route('admin.dologin') }}">
    <input type="hidden" name="_token" value="{{ csrf_token() }}" />
    <p>
        <label>Email</label>
        <input name="email" type="text"/>
    </p>
    <p>
        <label>Password</label>
        <input name="password" type="password"/>
    </p>
    <p>
        <button type="submit">Submit</button>
    </p>
</form>
@stop