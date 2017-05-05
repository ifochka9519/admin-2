@extends('admin.layouts.master')

@section('content')

<div class="row">
    <div class="col-sm-10 col-sm-offset-2">
        <h1>{{ trans('quickadmin::templates.templates-view_create-add_new') }}</h1>

        @if ($errors->any())
        	<div class="alert alert-danger">
        	    <ul>
                    {!! implode('', $errors->all('<li class="error">:message</li>')) !!}
                </ul>
        	</div>
        @endif
    </div>
</div>

{!! Form::open(array('route' => config('quickadmin.route').'.clients.store', 'id' => 'form-with-validation', 'class' => 'form-horizontal')) !!}

<div class="form-group">
    {!! Form::label('name', 'Имя', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-10">
        {!! Form::text('name', old('name'), array('class'=>'form-control')) !!}
        
    </div>
</div>

<div class="form-group">
    {!! Form::label('payment', 'Оплата', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-10">
        {!! Form::text('payment', old('payment'), array('class'=>'form-control')) !!}

    </div>
</div>

<div class="form-group">
    {!! Form::label('prepayment', 'Предоплата', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-10">
        {!! Form::text('prepayment', old('prepayment'), array('class'=>'form-control')) !!}

    </div>
</div>

<div class="form-group">
    {!! Form::label('passport', 'Номер паспорта', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-10">
        {!! Form::text('passport', old('passport'), array('class'=>'form-control')) !!}

    </div>
</div>

<div class="form-group">
    {!! Form::label('scan_passport_path', 'Скан паспорта', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-10">
        {!! Form::file('scan_passport_path', old('scan_passport_path'), array('class'=>'form-control')) !!}

    </div>
</div>

<div class="form-group">
    {!! Form::label('data_of_birthday', 'Дата рождения', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-10">
        {!! Form::date('data_of_birthday', old('data_of_birthday'), array('class'=>'form-control')) !!}

    </div>
</div>

<div class="form-group">
    {!! Form::label('phone', 'Номер', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-10">
        {!! Form::text('phone', old('phone'), array('class'=>'form-control')) !!}

    </div>
</div>

<div class="form-group">
    {!! Form::label('email', 'E-mail', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-10">
        {!! Form::text('email', old('email'), array('class'=>'form-control')) !!}

    </div>
</div>

<div class="form-group">
    {!! Form::label('customer_id', 'Заказчик', ['class'=>'col-sm-2 control-label']) !!}
    <div class="col-sm-10">
        {!! Form::select('customer_id', $customers, old('customer_id'), ['class'=>'form-control']) !!}
    </div>
</div>


<div class="form-group">
    {!! Form::label('manager_id', 'Менеджер', ['class'=>'col-sm-2 control-label']) !!}
    <div class="col-sm-10">
        {!! Form::select('manager_id', $managers, old('manager_id'), ['class'=>'form-control']) !!}
    </div>
</div>


<div class="form-group">
    <div class="col-sm-10 col-sm-offset-2">
      {!! Form::submit( trans('quickadmin::templates.templates-view_create-create') , array('class' => 'btn btn-primary')) !!}
    </div>
</div>

{!! Form::close() !!}

@endsection