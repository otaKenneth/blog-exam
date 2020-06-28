@extends('layouts.app')

@section('content')
<div class="container">
    <profile @can('update', $user->profile) iscan="true" @endcan :user="{{$user}}" :posts="{{$posts}}"></profile>
</div>
@endsection
