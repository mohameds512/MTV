@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center"  style="text-align: right;">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    أضافة طلب
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
                    <form action="{{ route('store_order') }}" method="post">
                        @csrf
                        <input type="hidden" name="user_id" value="{{Auth::id()}}">
                        <div class="form-group">
                            <label for="name"> الاسم</label>
                            <input type="text" style="text-align: right;" class="form-control" id="name" name="name"  placeholder="أسم الطلب" required>
                        </div>
                        <div class="form-group">
                            <label for="quantity">الكمية</label>
                            <input type="number" style="text-align: right;" class="form-control" id="quantity" name="quantity" placeholder="الكمية" required>
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
