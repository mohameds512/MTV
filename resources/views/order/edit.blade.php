@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center"  style="text-align: right;">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    تعديل طلب
                </div>

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors as $error)
                                <li>{{$error}}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <div class="card-body">
                    <form action="{{ route('update_order' , [$order->id]) }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="name"> الاسم</label>
                            <input type="text" style="text-align: right;" class="form-control" id="name" name="name" value="{{$order->name}}"  placeholder="أسم الطلب" required>
                        </div>
                        <div class="form-group">
                            <label for="quantity">الكمية</label>
                            <input type="number" style="text-align: right;" class="form-control" id="quantity" name="quantity" value="{{$order->quantity}}" placeholder="الكمية" required>
                        </div>
                        <div class="form-group">
                            <label for="status">المرحلة</label>
                            <select name="status" class="form-control" id="status">
                                <option selected value="{{$order->status}}">{{$order->status}}</option>
                                <option value="قيد الأنتظار">قيد الأنتظار</option>
                                <option value="تم التأكيد">تم التأكيد</option>
                                <option value="تم الشحن">تم الشحن</option>
                                <option value="في الطريق اليك">في الطريق اليك</option>
                                <option value="تم التوصيل">تم التوصيل</option>
                            </select>
                        </div>
                        <br>
                        <button type="submit" class="btn btn-primary">حفظ</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
