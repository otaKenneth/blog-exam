@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-3 p-5">
            <img src="{{ $user->profile->profileImage() }}" class="rounded-circle" style="width: 70%; border: solid 1px;">
        </div>
        <div class="col-9 pt-5">
            <div class="d-flex justify-content-between align-items-baseline">
                <h1>
                    @can ('update', $user->profile)
                        <a href="/profile/{{ $user->id }}/edit" style="text-decoration: none;">{{ $user->username }}</a>
                    @endcan
                    @cannot ('update', $user->profile)
                        {{ $user->username }}
                    @endcannot
                </h1>
                <div>
                    @can ('update', $user->profile)
                        <create-blog :posts="{{$posts}}"></create-blog>
                        {{-- <a href="/p/create"><button class="btn btn-primary">Add New Blog</button></a> --}}
                    @endcan
                </div>
            </div>
            <div class="d-flex">
                <div class="pr-5"><strong>{{ $posts->count() }}</strong> posts</div>
                {{-- <div class="pr-5"><strong>{{ $user->profile->followers->count() }}</strong> followers</div> --}}
                {{-- <div class="pr-5"><strong>{{ $user->following->count() }}</strong> following</div> --}}
            </div>
            <div class="pt-4 font-weight-bold">{{ $user->profile->title ?? 'N/A' }}</div>
            <div>{{ $user->profile->dscp ?? 'N/A' }}</div>
            <div><a href="">{{ $user->profile->url }}</a></div>
        </div>
    </div>

    <uploads :posts="{{$posts}}"></uploads>
</div>
@endsection
