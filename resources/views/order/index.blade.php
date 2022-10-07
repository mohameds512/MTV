@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    جميع الطلبات
                </div>

                {{-- @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors as $error)
                                <li>{{$error}}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif --}}

                <div class="card-body" >
                    @if (count($orders) > 0)
                        <table class="table" >
                            <thead  style="">
                                <tr>
                                    <th class="col">#</th>
                                    <th class="col">الاسم</th>
                                    <th class="col">الكمية</th>
                                    <th class="col">التعديلات</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($orders as $order)
                                    <tr>
                                        <th scope=row>{{$loop->iteration}}</th>
                                        <th>{{$order->name}}</th>
                                        <th>{{$order->quantity}}</th>
                                        <th>
                                            <a href="{{ route('edit_order', [$order->id]) }}" class="btn btn-info">عرض</a>
                                        </th>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    @else
                        <div class="alert alert-danger">
                            لا توجد طلبات
                        </div>
                    @endif


                </div>
            </div>
        </div>
    </div>
</div>
@endsection
