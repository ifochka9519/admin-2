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
        {!! Form::select('type_visa_id', $typeofvisas, old('type_visa_id'), array('class'=>'visas form-control')) !!}
        
    </div>
</div>

<div class="form-group" id="status" style="display:none">
    {!! Form::label('status_id', 'Статус', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-10">
        {!! Form::select('status_id', $statuses, old('status_id'), array('class'=>'form-control statuses_finish')) !!}

    </div>
</div>

<div class="form-group" id="pole" style="display:none">
    {!! Form::label('user_id', 'Поляк', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-10">
        {!! Form::select('user_id', $users, old('user_id'), array('class'=>'form-control')) !!}

    </div>
</div>

<div class="form-group" id="client" style="display:none">
    {!! Form::label('client_id', 'Клиент', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-10">
        {!! Form::select('client_id', $clients, old('client_id'), array('class'=>'form-control')) !!}

    </div>
</div>

<div class="form-group" id="parent1" style="display:none">
    {!! Form::label('parent1', 'Мать', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-10">
        {!! Form::text('parent1', '',  array('class'=>'form-control' , 'id'=>'parent_m')) !!}
        <span class="input-error-msg"></span>

    </div>
</div>

<div class="form-group" id="parent2" style="display:none">
    {!! Form::label('parent2', 'Отец', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-10">
        {!! Form::text('parent2', '',  array('class'=>'form-control', 'id'=>'parent_f')) !!}
        <span class="input-error-msg"></span>

    </div>
</div>

<div class="form-group" id="home" style="display:none">
    {!! Form::label('home', 'Место рождения', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-10">
        {!! Form::text('home', '',  array('class'=>'form-control')) !!}

    </div>
</div>

<div class="form-group" id="data_start" style="display:none">
    {!! Form::label('data_start', 'Дата начала', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-10 ">
        {!! Form::date('data_start',  \Carbon\Carbon::now(), array('class'=>'form-control', 'id'=>'datastart')) !!}

    </div>

</div>

<div class="form-group" id="data_finish" style="display:none">
    {!! Form::label('data_finish', 'Дата завершения', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-10 ">
        {!! Form::date('data_finish',  \Carbon\Carbon::now(), array('class'=>'form-control', 'id'=>'datafinish')) !!}

    </div>

</div>

<div class="form-group" id="lenght" style="display:none">
    <div class="col-md-2"></div>
    <div class="col-sm-10 col-md-5">
        {!! Form::label('lenght1', '2 месяца', array('class'=>'col-sm-2 control-label')) !!}
        {!! Form::checkBox('lenght1','1', false, array('id'=>'ch1')) !!}

    </div>
    <div class="col-sm-10 col-md-5">
        {!! Form::label('lenght2', 'Весь период', array('class'=>'col-sm-2 control-label')) !!}
        {!! Form::checkBox('lenght2','1', false, array('id'=>'ch2')) !!}

    </div>


</div>

<div class="row">
<div class="col-md-2" id="w1" style="display:none"></div>
    <div class="col-md-4" id="date_1" style="display:none">


<div class="form-group" id="data_start1" >
    <div class=" ">
    {!! Form::label('data_start1', 'От', array('class'=>'col-sm-2 control-label')) !!}
        {!! Form::date('data_start1', \Carbon\Carbon::now(), array('class'=>'form-control', 'id'=>'datastart1')) !!}

    </div>

</div>

<div class="form-group" id="data_finish1" >
    <div class="">
    {!! Form::label('data_finish1', 'До', array('class'=>'col-sm-2 control-label')) !!}
        {!! Form::date('data_finish1', \Carbon\Carbon::now(), array('class'=>'form-control' , 'id'=>'datafinish1')) !!}

    </div>

</div>
    </div>
    <div class="col-md-1" id="w2" style="display:none"></div>
    <div class="col-md-4" id="date_2" style="display:none">

<div class="form-group" id="data_start2" >
    <div class=" ">
    {!! Form::label('data_start2', 'От', array('class'=>'col-sm-2 control-label')) !!}
        {!! Form::date('data_start2', \Carbon\Carbon::now(), array('class'=>'form-control', 'id'=>'datastart2')) !!}

    </div>

</div>


<div class="form-group" id="data_finish2" >
    <div class="">
    {!! Form::label('data_finish2', 'До', array('class'=>'col-sm-2 control-label')) !!}
    </div>
    {!! Form::date('data_finish2', \Carbon\Carbon::now(), array('class'=>'form-control', 'id'=>'datafinish2')) !!}


</div>
</div>
</div>
<div class="row">
    <div class="col-md-2" id="w3" style="display:none"></div>
    <div class="col-md-4" id="date_3" style="display:none">


        <div class="form-group" id="data_start3" >
            <div class=" ">
                {!! Form::label('data_start3', 'От', array('class'=>'col-sm-2 control-label')) !!}
                {!! Form::date('data_start3', \Carbon\Carbon::now(), array('class'=>'form-control', 'id'=>'datastart3')) !!}

            </div>

        </div>

        <div class="form-group" id="data_finish3" >
            <div class="">
                {!! Form::label('data_finish3', 'До', array('class'=>'col-sm-2 control-label')) !!}
                {!! Form::date('data_finish3', \Carbon\Carbon::now(), array('class'=>'form-control' , 'id'=>'datafinish3')) !!}

            </div>

        </div>
    </div>
    <div class="col-md-1" id="w4" style="display:none"></div>
    <div class="col-md-4" id="date_4" style="display:none">

        <div class="form-group" id="data_start4" >
            <div class=" ">
                {!! Form::label('data_start4', 'От', array('class'=>'col-sm-2 control-label')) !!}
                {!! Form::date('data_start4', \Carbon\Carbon::now(), array('class'=>'form-control', 'id'=>'datastart4')) !!}

            </div>

        </div>


        <div class="form-group" id="data_finish4" >
            <div class="">
                {!! Form::label('data_finish4', 'До', array('class'=>'col-sm-2 control-label')) !!}
            </div>
            {!! Form::date('data_finish4', \Carbon\Carbon::now(), array('class'=>'form-control', 'id'=>'datafinish4')) !!}


        </div>
    </div>
</div>


<div class="form-group" id="plus" style="display:none">
    {!! Form::label('plus', 'Добавить коридор', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-1 ">
        <i class="fa fa-plus-square-o fa-5x" id="plus-fa" aria-hidden="true"></i>
    </div>
</div>
    <div class="form-group" id="plus-btn" style="display:none">
        <div class="col-md-2"></div>
        <div class="col-md-5 ">
    <h3  id="text_day" style="border: 1px solid black" class="btn">Узнать количество дней</h3>
        </div>
</div>






<div class="form-group" id="data_output" style="display:none">
    {!! Form::label('data_output', 'Дата виезда', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-10 ">
        {!! Form::date('data_output', old('data_output'), array('class'=>'form-control')) !!}

    </div>

</div>


{{--
<div class="form-group" id="payment" style="display:none">
    {!! Form::label('payment', 'Оплата', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-10 {{ $errors->has('payment') ? ' has-error' : '' }}">
        {!! Form::text('payment', '0', array('class'=>'form-control')) !!}

    </div>
</div>

<div class="form-group" id="prepayment" style="display:none">
    {!! Form::label('prepayment', 'Предоплата', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-10 {{ $errors->has('prepayment') ? ' has-error' : '' }}">
        {!! Form::text('prepayment', '0', array('class'=>'form-control')) !!}

    </div>
</div>
--}}


<div class="form-group" id="scan" style="display:none">
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


<script>
    var urlReason = '{{route('addNewReason')}}';
    var token = '{{Session::token()}}';
</script>

@endsection