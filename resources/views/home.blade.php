@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <home :isGuest="@guest true @else false @endguest" :posts="{{$posts}}"></home>
</div>
@endsection
