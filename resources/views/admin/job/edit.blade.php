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

{!! Form::model($job, array('files' => true, 'class' => 'form-horizontal', 'id' => 'form-with-validation', 'method' => 'PATCH', 'route' => array(config('quickadmin.route').'.job.update', $job->id))) !!}

<div class="form-group">
    {!! Form::label('title', 'Вакансия', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-10">
        {!! Form::text('title', old('title',$job->title), array('class'=>'form-control')) !!}
        
    </div>
</div><div class="form-group">
    {!! Form::label('money', 'Зарплата', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-10">
        {!! Form::text('money', old('money',$job->money), array('class'=>'form-control')) !!}
        
    </div>
</div><div class="form-group">
    {!! Form::label('image', 'Картинка', array('class'=>'col-sm-2 control-label')) !!}

    <div class="col-sm-10">
        @if($job->way != '')
            <img src="/{{$job->way}}" alt="">
        @endif
        {!! Form::file('image') !!}
        {!! Form::hidden('image_w', 4096) !!}
        {!! Form::hidden('image_h', 4096) !!}
        
    </div>
</div><div class="form-group">
    {!! Form::label('description', 'Описание', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-10">
        {!! Form::text('description', old('description',$job->description), array('class'=>'form-control')) !!}
        
    </div>
</div>

<div class="form-group">
    <div class="col-sm-10 col-sm-offset-2">
      {!! Form::submit(trans('quickadmin::templates.templates-view_edit-update'), array('class' => 'btn btn-primary')) !!}
      {!! link_to_route(config('quickadmin.route').'.job.index', trans('quickadmin::templates.templates-view_edit-cancel'), null, array('class' => 'btn btn-default')) !!}
    </div>
</div>

{!! Form::close() !!}

@endsection