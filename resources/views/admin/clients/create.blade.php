@extends('admin.layouts.master')

@section('content')
<script src="https://code.jquery.com/jquery-3.2.1.js"></script>
<script type="text/javascript" src="/js/script.js"></script>

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

{!! Form::open(array('route' => config('quickadmin.route').'.clients.store', 'id' => 'form-with-validation', 'class' => 'form-horizontal', 'enctype' => "multipart/form-data")) !!}

<div class="form-group">
    {!! Form::label('name', 'Имя', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-10 {{ $errors->has('name') ? ' has-error' : '' }}">
        {!! Form::text('name', old('name'), array('class'=>'form-control')) !!}
        <span class="input-error-msg"></span>
    </div>
</div>

<div class="form-group">
    {!! Form::label('payment', 'Оплата', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-10 {{ $errors->has('payment') ? ' has-error' : '' }}">
        {!! Form::text('payment', '0', array('class'=>'form-control')) !!}

    </div>
</div>

<div class="form-group">
    {!! Form::label('prepayment', 'Предоплата', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-10 {{ $errors->has('prepayment') ? ' has-error' : '' }}">
        {!! Form::text('prepayment', '0', array('class'=>'form-control')) !!}

    </div>
</div>

<div class="form-group">
    {!! Form::label('passport', 'Номер паспорта', array('class'=>'col-sm-2 control-label', ' enctype'=>"multipart/form-data")) !!}
    <div class="col-sm-10 {{ $errors->has('passport') ? ' has-error' : '' }}">
        {!! Form::text('passport', old('passport'), array('class'=>'form-control')) !!}

    </div>
</div>

<div class="form-group">
    {!! Form::label('scan_passport_path', 'Скан паспорта', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-10">
        {!! Form::file('scan_passport_path') !!}

    </div>
</div>

<div class="form-group">
    {!! Form::label('data_of_birthday', 'Дата рождения', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-10 ">
        {!! Form::date('data_of_birthday', old('data_of_birthday'), array('class'=>'form-control')) !!}

    </div>

</div>


<div class="form-group">
    {!! Form::label('phone', 'Номер', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-10 {{ $errors->has('phone') ? ' has-error' : '' }}">
        {!! Form::text('phone', old('phone'), array('class'=>'form-control')) !!}
        <span class="input-error-msg"></span>
    </div>
</div>

<div class="form-group">
    {!! Form::label('email', 'E-mail', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-10 {{ $errors->has('email') ? ' has-error' : '' }}">
        {!! Form::text('email', old('email'), array('class'=>'form-control')) !!}

    </div>
</div>

<div class="form-group">
    {!! Form::label('customer_id', 'Заказчик', ['class'=>'col-sm-2 control-label']) !!}
    <div class="col-sm-10 ">
        {!! Form::select('customer_id', $customers, old('customer_id'), ['class'=>'form-control']) !!}
    </div>
</div>


<div class="form-group">
    {!! Form::label('user_id', 'Менеджер', ['class'=>'col-sm-2 control-label']) !!}
    <div class="col-sm-10">
        {!! Form::select('user_id', $managers, old('user_id'), ['class'=>'form-control']) !!}
    </div>
</div>





<div class="form-group">
    {!! Form::label('regions_id', 'Область', ['class'=>'col-sm-2 control-label']) !!}
    <div class="col-sm-10">
        {!! Form::select('regions_id',  $regions, old('regions_id'), ['class'=>'regions form-control','placeholder' => 'Виберите область']) !!}
    </div>
</div>
<div class="form-group">
    {!! Form::label('districts_id', 'Район', ['class'=>'col-sm-2 control-label']) !!}
    <div class="col-sm-10" >
        <input id="tagsD" class="ui-autocomplete-input form-control" autocomplete="off" role="textbox" aria-autocomplete="list" aria-haspopup="true">
        <span class="input-error-msg"></span>
    </div>
</div>

<div class="form-group">
    {!! Form::label('city_id', 'Город', ['class'=>'col-sm-2 control-label']) !!}
    <div class="col-sm-10" >
        <input id="tagsC" class="ui-autocomplete-input form-control" autocomplete="off" role="textbox" aria-autocomplete="list" aria-haspopup="true">
        <span class="input-error-msg"></span>
    </div>
</div>

<div class="form-group">
    {!! Form::label('address_id', 'Адресс', ['class'=>'col-sm-2 control-label']) !!}
    <div class="col-sm-10" >
        <input id="tagsA" class="ui-autocomplete-input form-control" autocomplete="off" role="textbox" aria-autocomplete="list" aria-haspopup="true">
        <input type="hidden" name="address_id" id="address_id">
        <span class="input-error-msg"></span>
    </div>

</div>


<div class="form-group">
    <div class="col-sm-10 col-sm-offset-2">
      {!! Form::submit( trans('quickadmin::templates.templates-view_create-create') , array('class' => 'btn btn-primary')) !!}
    </div>
</div>


{!! Form::close() !!}

<script>
    var urlD = '{{route('makeListDistricts')}}';
    var urlDN = '{{route('addNewDistrict')}}';
    var urlC = '{{route('makeListCities')}}';
    var urlCN = '{{route('addNewCity')}}';
    var urlNA = '{{route('addNewAddress')}}';
    var token = '{{Session::token()}}';
    var availableTags = [];

    @foreach($regions as $key => $region)

    availableTags.push('{{$region}}');
        @endforeach

</script>



@endsection