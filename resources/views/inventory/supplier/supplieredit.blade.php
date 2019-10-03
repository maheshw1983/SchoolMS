@extends('layout')
@section('content')
    <div class="container" style="width: auto;margin-top: 20px">
        <div class="text-center">
            <h2 class="display-5 text-center ">
                <strong>Enter The Supplier Details</strong>
            </h2>
        </div>
        <div class="container" style="width:50%;">
            {!! Form::open(['action' => ['Suppliercontroller@update',$supplier->supplierID],'method' => 'POST', 'class'=> 'form-signin text-center']) !!}
            {{csrf_field()}}

            <div class="form-group form-row">
                {!! Form::Label('item', 'Supplier Name :-',['class'=>'text1']) !!}
                {{Form::text('name', $supplier->name,['class'=>'form-control text1','placeholder'=>'Supplier Name','required'])}}
            </div>
            <div class="form-group form-row">
                {!! Form::Label('item', 'Supplier ID :-',['class'=>'text1']) !!}
                {{Form::number('supplierid',$supplier->supplierID,['class'=>'form-control text1','placeholder'=>'Supplier ID','required'])}}
            </div>
            <div class="form-group form-row">
                {!! Form::Label('item', 'Email :-',['class'=>'text1']) !!}
                {{Form::email('email',$supplier->email,['class'=>'form-control text1','placeholder'=>'Email','required'])}}
            </div>
            <div class="form-group form-row">
                {!! Form::Label('item', 'Contact Details :-',['class'=>'text1']) !!}
                {{Form::number('contact',$supplier->contact_details,['class'=>'form-control text1','max'=>'0799999999','placeholder'=>'Contact Details'])}}
            </div>
            <div class="form-group form-row">
                <div>
                    {!! Form::Label('item', 'Item:',['class'=>'text1']) !!}
                    <select class="form-control text1" style="color: black" name="type">
                        <option>S</option>
                        <option>L</option>
                        <option>R</option>
                        <option>SP</option>
                    </select>
                </div>
            </div>
            {{Form::hidden('_method','PUT')}}
            <div class="form-row form-group">
                {{Form::submit('Submit',['class'=>'btn btn-primary'])}}
            </div>
            {!! Form::close() !!}
            <div style="margin-top: 3px">
                <a href="/index" class="btn btn-primary text1">Admin Dashboard</a>
                <a href="/supplier" class="btn btn-primary text1">Suppliers</a>
            </div>
        </div>

    </div>
@endsection