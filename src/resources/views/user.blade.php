@extends('layouts.default')

@section('content')
<h1>User</h1>

{{$user->name}} <br>
{{$user->email}}
@endsection

