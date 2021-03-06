@extends('admin.layouts.master')

@section('content')


<div class="row">
    <div class="col-sm-10 col-sm-offset-2">
        <h1>Редактировать</h1>

        @if ($errors->any())
        	<div class="alert alert-danger">
        	    <ul>
                    {!! implode('', $errors->all('<li class="error">:message</li>')) !!}
                </ul>
        	</div>
        @endif
    </div>
</div>

{!! Form::model($clients, array('class' => 'form-horizontal', 'id' => 'form-with-validation', 'method' => 'PATCH', 'route' => array(config('quickadmin.route').'.clients.update', $clients->id), ' enctype'=>"multipart/form-data")) !!}

<div class="form-group">
    {!! Form::label('name', 'Имя', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-10">
        {!! Form::text('name', old('name',$clients->name), array('class'=>'form-control', 'id'=>'name')) !!}
        
    </div>
</div>




<div class="form-group">
    {!! Form::label('passport', 'Номер паспорта', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-10">
        {!! Form::text('passport', old('passport',$clients->passport), array('class'=>'form-control')) !!}

    </div>
</div>



<div class="form-group">
    {!! Form::label('data_of_birthday', 'Дата рождения', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-10">
        {!! Form::date('data_of_birthday', old('data_of_birthday',$clients->data_of_birthday), array('class'=>'form-control')) !!}

    </div>
</div>

<div class="form-group">
    {!! Form::label('phone', 'Номер', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-10">
        {!! Form::text('phone', old('phone',$clients->phone), array('class'=>'form-control')) !!}

    </div>
</div>

<div class="form-group">
    {!! Form::label('email', 'E-mail', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-10">
        {!! Form::text('email', old('email',$clients->email), array('class'=>'form-control')) !!}

    </div>
</div>

<div class="address-area" style="display: none;">
<div class="form-group">
    {!! Form::label('regions_id', 'Область', ['class'=>'col-sm-2 control-label']) !!}
    <div class="col-sm-10">
        {!! Form::select('regions_id', $regions, old('regions_id'), ['class'=>'regions form-control']) !!}
    </div>
</div>
<div class="form-group">
    {!! Form::label('districts_id', 'Район', ['class'=>'col-sm-2 control-label']) !!}
    <div class="col-sm-10" >
        <input id="tagsD" class="ui-autocomplete-input form-control" autocomplete="off" role="textbox" aria-autocomplete="list" aria-haspopup="true">
    </div>
</div>


<div class="form-group">
    {!! Form::label('city_id', 'Город', ['class'=>'col-sm-2 control-label']) !!}
    <div class="col-sm-10" >
        <input id="tagsC" class="ui-autocomplete-input form-control" autocomplete="off" role="textbox" aria-autocomplete="list" aria-haspopup="true">
    </div>
</div>

    <div class="form-group">
        {!! Form::label('address_id', 'Адресс', ['class'=>'col-sm-2 control-label']) !!}
        <div class="col-sm-10" >
            <input id="tagsA" class="ui-autocomplete-input form-control" autocomplete="off" role="textbox" aria-autocomplete="list" aria-haspopup="true">
            <input type="hidden" name="address_id" id="address_id">
        </div>

    </div>

</div>
<div class="form-group" id="old-address">
    {!! Form::label('address_id', 'Адрес', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-10">

        {!! Form::text('address_id', old('address_id',$region->name .','.$district->name .','.$city->name.','.$clients->address->address), array('class'=>'form-control','id'=>'address_id', 'readonly')) !!}

        <i id="pen" class="edit-icon fa fa-pencil fa-3x"  aria-hidden="true"></i>
    </div>
</div>
<div class="form-group">
    <div class="col-sm-10 col-sm-offset-2">
      {!! Form::submit(trans('quickadmin::templates.templates-view_edit-update'), array('class' => 'btn btn-primary')) !!}
      {!! link_to_route(config('quickadmin.route').'.clients.index', trans('quickadmin::templates.templates-view_edit-cancel'), null, array('class' => 'btn btn-default')) !!}
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


</script>

@if(!$flag)
    <script>

        document.getElementsByName('name')[0].readOnly = true;
        document.getElementsByName('passport')[0].readOnly = true;
        document.getElementsByName('data_of_birthday')[0].readOnly = true;
        document.getElementsByName('phone')[0].readOnly = true;
        document.getElementsByName('email')[0].readOnly = true;
        document.getElementById('pen').style.display = 'none';

        //  var x = document.getElementsById('name').readOnly = true;

    </script>
@endif

@endsection