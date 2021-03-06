@extends('includes.layout')
@section('content')
    <div class="container" style="width: auto;margin-top: 20px">
        @include('messages.message')
        <div class="text-center">
            <h2 class="display-5 text-center" style="font-size:4vw;">
                <strong>Enter The Stationery Items Details</strong>
            </h2>
        </div>
        <div class="container" style="width: 50%">
            {!! Form::open(['action' => 'Stationarycontroller@store','method' => 'POST', 'class'=> 'form-signin']) !!}
            {{csrf_field()}}

            <div class="form-group form-row">
                {!! Form::Label('name', 'Item Name :-',['class'=>'text1']) !!}
                {{Form::text('name', '',['class'=>'form-control text1','id'=>'name','placeholder'=>'Items Name','required'])}}
            </div>
            <div class="form-group form-row">
                {!! Form::Label('item', 'Product ID :-',['class'=>'text1']) !!}
                {{Form::number('productID','',['class'=>'form-control text1','placeholder'=>'Product ID (100< >200)','required'])}}
            </div>
            <div class="form-group form-row">
                {!! Form::Label('item', 'Quantity :-',['class'=>'text1']) !!}
                {{Form::number('quantity','',['class'=>'form-control text1','placeholder'=>'Amount in stock','required'])}}
            </div>
            <div class="form-group form-row">
                <div>
                    {!! Form::Label('item', 'Supplier :-',['class'=>'text1']) !!}
                    <select class="form-control text1" style="color: black" name="supplier">
                        @foreach($suppliers as $supplier)
                            <option>{{$supplier->supplierID}}</option>
                        @endforeach

                    </select>
                </div>
            </div>
            {{Form::submit('Submit',['class'=>'btn btn-primary'])}}
            {!! Form::close() !!}

            <div style="margin-top: 30px" class="text-center">
                <a href="/index" class="btn btn-primary text1">Admin Dashboard</a>
                <a href="/stationary" class="btn btn-primary text1">Stationary Items</a>

            </div>
        </div>
    </div>
@endsection