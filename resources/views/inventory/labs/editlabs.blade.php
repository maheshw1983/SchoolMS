@extends('includes.layout')
@section('content')
<div class="container" style="width: auto;margin-top: 20px">
    @include('messages.message')
    <div class="text-center">
        <h2 class="display-5 text-center" style="font-size:4vw;">
            <strong>Enter The Items Details</strong>
        </h2>
    </div>
    <div class="container" style="width: 50%">
        {!! Form::open(['action' => ['labscontroller@update' ,$labs->productID ] ,'method' => 'POST', 'class'=> 'form-signin text-center']) !!}
        <input name="_method" type="hidden" value="PATCH">

        <div class="form-group">
            {{Form::text('name', $labs->name,['class'=>'form-control text1','placeholder'=>'Item Name','required'])}}
        </div>
        <div class="form-group">
            {{Form::number('productID',$labs->productID,['class'=>'form-control text1','placeholder'=>'Product ID (200< >400)','required'])}}
        </div>
        <div class="form-group">
            {{Form::number('amount',$labs->amount,['class'=>'form-control text1','placeholder'=>'Amount in Stock','required'])}}
        </div>
        <div class="form-group">
            {!! Form::Label('lab_type', 'Laboratory Type:',['class'=>'text1']) !!}
            <select class="form-control text1" style="color: black" name="type">
                <option>Chemistry Laboratory</option>
                <option>Physics Laboratory</option>
                <option>Computer Laboratory</option>
            </select>
        </div>
        <div class="form-group form-row">
            {{Form::number('supplierID',$labs->supplierID,['class'=>'form-control text1','required'])}}
        </div>
        {{Form::submit('Submit',['class'=>'btn btn-primary'])}}
        {!! Form::close() !!}
        <div class="text-center" style="margin-top: 30px ;">
            <a href="/index" class="btn btn-primary text1">Admin Dashboard</a>
            <a href="/labs" class="btn btn-primary text1">Laboratory Equipments</a>
        </div>
    </div>

</div>
@endsection