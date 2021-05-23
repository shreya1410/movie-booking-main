@extends('layouts.app')

@section('content')



    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Dashboard</div>
                    <div class="card-body">
                        You are User.
                    </div>
                </div>
            </div>
        </div>
        <div class="row">

            <div class="col-md-12" id="app">

                <div class="flex bg-gray-100 border-b border-gray-300 py-4">
                    <div class="container mx-auto">
                     <h1>   <router-link  class="mr-4" to='/showmovie'>All Movies</router-link></h1>
                    </div>
                </div>
                <div class="container mx-auto">
                    <router-view></router-view>
                </div>
            </div>
        </div>
    </div>




{{--<div class="container">--}}
{{--    <div class="row justify-content-center">--}}
{{--        <div class="col-md-8">--}}
{{--            <div class="card">--}}
{{--                <div class="card-header">{{ __('Dashboard') }}</div>--}}

{{--                <div class="card-body">--}}
{{--                    @if (session('status'))--}}
{{--                        <div class="alert alert-success" role="alert">--}}
{{--                            {{ session('status') }}--}}
{{--                        </div>--}}
{{--                    @endif--}}

{{--                    {{ __('You are logged in!') }}--}}

{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</div>--}}
@endsection
