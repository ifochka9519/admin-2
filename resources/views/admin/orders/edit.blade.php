@extends('admin.layouts.master')

@section('content')

<div class="row">
    <div class="col-sm-10 col-sm-offset-2">
        <h1>{{ trans('language.orders_edit.edit') }}</h1>

        @if ($errors->any())
        	<div class="alert alert-danger">
        	    <ul>
                    {!! implode('', $errors->all('<li class="error">:message</li>')) !!}
                </ul>
        	</div>
        @endif
    </div>
</div>

{!! Form::model($orders, array('class' => 'form-horizontal', 'id' => 'form-with-validation', 'method' => 'PATCH', 'route' => array(config('quickadmin.route').'.orders.update', $orders->id), 'enctype' => "multipart/form-data")) !!}

<div class="form-group">
    <lable for="type_visa_id" class="col-sm-2 control-label">{{ trans("language.orders_edit.type_visa") }}</lable>
    <div class="col-sm-10">
        {!! Form::select('type_visa_id', $typeofvisas ,old('type_visa_id'), array('class'=>'form-control')) !!}

    </div>
</div>

<div class="form-group">
    <lable for="status_id" class="col-sm-2 control-label">{{ trans("language.orders_edit.status") }}</lable>
    <div class="col-sm-10">
        {!! Form::select('status_id', $statuses, old('status_id'), array('class'=>'form-control statuses_finish', 'order'=>$orders->id)) !!}

    </div>
</div>

<div class="form-group">
    <lable for="user_id" class="col-sm-2 control-label">{{ trans("language.orders_edit.pole") }}</lable>
    <div class="col-sm-10">
        {!! Form::select('user_id', $users, old('user_id'), array('class'=>'form-control')) !!}

    </div>
</div>

<div class="form-group">
    <lable for="client_id" class="col-sm-2 control-label">{{ trans("language.orders_edit.client") }}</lable>
    <div class="col-sm-10">
        {!! Form::select('client_id', $clients, old('client_id'), array('class'=>'form-control')) !!}

    </div>
</div>

{{--
<div class="form-group">
    <lable for="payment" class="col-sm-2 control-label">{{ trans("language.orders_edit.payment") }}</lable>
    <div class="col-sm-10">
        {!! Form::text('payment', old('payment',$orders->payment), array('class'=>'form-control')) !!}

    </div>
</div>

<div class="form-group">
    <lable for="prepayment" class="col-sm-2 control-label">{{ trans("language.orders_edit.prepayment") }}</lable>
    <div class="col-sm-10">
        {!! Form::text('payment', old('prepayment',$orders->prepayment), array('class'=>'form-control')) !!}

    </div>
</div>
--}}

<div class="form-group">
    <lable for="scan_order_path" class="col-sm-2 control-label">{{ trans("language.orders_edit.scan") }}</lable>
    <div class="col-sm-10">
        <img src="{{$orders->scan_order_path}}" width="100px" alt="">
        {!! Form::file('scan_order_path', old('scan_order_path',$orders->scan_order_path), array('class'=>'form-control')) !!}

    </div>
</div>
<input type="hidden" name="manager_id" value="{{$orders->client->user_id}}">
<div class="form-group">
    <div class="col-sm-10 col-sm-offset-2">
      {!! Form::submit(trans('language.orders_edit.update'), array('class' => 'btn btn-primary')) !!}
      {!! link_to_route(config('quickadmin.route').'.orders.index', trans('language.orders_edit.cancel'), null, array('class' => 'btn btn-default')) !!}
    </div>
</div>

{!! Form::close() !!}
<script>
    var urlReason = '{{route('addNewReason')}}';
    var token = '{{Session::token()}}';
</script>

@endsection