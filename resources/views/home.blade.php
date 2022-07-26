@extends('layouts.main')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}

                    @auth
                        <form id="logout-form" action="/logout" method="POST">
                            @csrf
                            <a class="-item" href="/logout"
                                onclick="event.preventDefault();
                                this.closest('form').submit();">
                                Logout
                            </a>
                        </form>
                    @endauth
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
