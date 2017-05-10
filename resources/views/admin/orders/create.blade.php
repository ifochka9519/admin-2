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

{!! Form::open(array('route' => config('quickadmin.route').'.orders.store', 'id' => 'form-with-validation', 'class' => 'form-horizontal', 'enctype' => "multipart/form-data")) !!}

<div class="form-group">
    {!! Form::label('type_visa_id', 'Тип визы', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-10">
        {!! Form::select('type_visa_id', $typeofvisas, old('type_visa_id'), array('class'=>'form-control')) !!}
        
    </div>
</div>

<div class="form-group">
    {!! Form::label('status_id', 'Статус', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-10">
        {!! Form::select('status_id', $statuses, old('status_id'), array('class'=>'form-control')) !!}

    </div>
</div>

<div class="form-group">
    {!! Form::label('user_id', 'Поляк', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-10">
        {!! Form::select('user_id', $users, old('user_id'), array('class'=>'form-control')) !!}

    </div>
</div>

<div class="form-group">
    {!! Form::label('client_id', 'Клиент', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-10">
        {!! Form::select('client_id', $clients, old('client_id'), array('class'=>'form-control')) !!}

    </div>
</div>

<div class="form-group">
    {!! Form::label('payment', 'Оплата', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-10 {{ $errors->has('payment') ? ' has-error' : '' }}">
        {!! Form::text('payment', old('payment'), array('class'=>'form-control')) !!}

    </div>
</div>

<div class="form-group">
    {!! Form::label('prepayment', 'Предоплата', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-10 {{ $errors->has('prepayment') ? ' has-error' : '' }}">
        {!! Form::text('prepayment', old('prepayment'), array('class'=>'form-control')) !!}

    </div>
</div>


<div class="form-group">
    {!! Form::label('scan_order_path', 'Скан заявки', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-10">
        {!! Form::file('scan_order_path') !!}

    </div>
</div>

<div class="form-group">
    <div class="col-sm-10 col-sm-offset-2">
      {!! Form::submit( trans('quickadmin::templates.templates-view_create-create') , array('class' => 'btn btn-primary')) !!}
    </div>
</div>

{!! Form::close() !!}

@endsection