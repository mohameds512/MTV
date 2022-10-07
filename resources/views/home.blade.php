@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center" style="text-align: right">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">الرأيسية</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{-- {{ __('You are logged in!') }} --}}

                    <div class="row">
                        <div class="col"> <a href="{{ route('create_order') }}" class="btn btn-success"> أضافة طلب </a> </div>
                        @if (Auth::user()->role=='admin')
                            <div class="col"> <a href="{{ route('orders') }}" class="btn btn-info"> عرض الطلبات </a> </div>
                        @endif

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
