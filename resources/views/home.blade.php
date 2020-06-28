@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <home @guest isguest="true" @endguest :posts="{{$posts}}"></home>
</div>
@endsection
