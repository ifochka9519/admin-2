@extends('admin.layouts.master')

@section('content')
    @if(app()->getLocale() != 'pl')
<p>{!! link_to_route(config('quickadmin.route').'.orders.create', trans('language.orders.add_new') , null, array('class' => 'btn btn-success')) !!}</p>
@endif
@if ($orders->count())
    <div class="portlet box green">
        <div class="portlet-title">
            <div class="caption">{{ trans('language.orders.list') }}</div>
        </div>
        <div class="portlet-body">
            <table class="table table-striped table-hover table-responsive datatable" id="datatable">
                <thead>
                    <tr>
                        <th>
                            {!! Form::checkbox('delete_all',1,false,['class' => 'mass']) !!}
                        </th>
                        @if(app()->getLocale() != 'pl')
                        <th>{{$words['pole']}}</th>
                        @endif
                        <th>{{$words['client']}}</th>
                        <th>{{$words['type_visa']}}</th>
                        <th>{{$words['status']}}</th>


                        <th>&nbsp;</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($orders as $row)
                        <tr>
                            <td>
                                {!! Form::checkbox('del-'.$row->id,1,false,['class' => 'single','data-id'=> $row->id]) !!}
                            </td>
                            @if(app()->getLocale() != 'pl')
                            <td>{{ $row->user->name }}</td>
                            @endif
                            <td>{{ $row->client->name }}</td>
                            @if(app()->getLocale() == 'pl')
                                <td>{{ \App\TypeOfVisas::where('id',$row->type_visa_id)->first()->name_pl }}</td>
                                <td style="color: {{$row->status->color}}">{{ $row->status->name_pl }}</td>
                            @else
                                <td>{{ \App\TypeOfVisas::where('id',$row->type_visa_id)->first()->name }}</td>
                                <td style="color: {{$row->status->color}}">{{ $row->status->name }}</td>
                            @endif


                            <td>
                                {!! link_to_route(config('quickadmin.route').'.orders.edit', trans('language.orders.edit'), array($row->id), array('class' => 'btn btn-xs btn-info')) !!}

                                @if(app()->getLocale() != 'pl')
                                <a class="btn btn-xs btn-success" href="{{route('history', $row->id)}}">{{$words['history']}}</a>
                                @endif
                                {!! Form::open(array('style' => 'display: inline-block;', 'method' => 'DELETE', 'onsubmit' => "return confirm('".trans("quickadmin::templates.templates-view_index-are_you_sure")."');",  'route' => array(config('quickadmin.route').'.orders.destroy', $row->id))) !!}
                                {!! Form::submit(trans('language.orders.delete'), array('class' => 'btn btn-xs btn-danger')) !!}
                                {!! Form::close() !!}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="row">
                <div class="col-xs-12">
                    <button class="btn btn-danger" id="delete">
                        {{ trans('language.orders.delete_checked') }}
                    </button>
                </div>
            </div>
            {!! Form::open(['route' => config('quickadmin.route').'.orders.massDelete', 'method' => 'post', 'id' => 'massDelete']) !!}
                <input type="hidden" id="send" name="toDelete">
            {!! Form::close() !!}
        </div>
	</div>
@else
    {{ trans('quickadmin::templates.templates-view_index-no_entries_found') }}
@endif

@endsection

@section('javascript')
    <script>
        $(document).ready(function () {
            $('#delete').click(function () {
                if (window.confirm('{{ trans('quickadmin::templates.templates-view_index-are_you_sure') }}')) {
                    var send = $('#send');
                    var mass = $('.mass').is(":checked");
                    if (mass == true) {
                        send.val('mass');
                    } else {
                        var toDelete = [];
                        $('.single').each(function () {
                            if ($(this).is(":checked")) {
                                toDelete.push($(this).data('id'));
                            }
                        });
                        send.val(JSON.stringify(toDelete));
                    }
                    $('#massDelete').submit();
                }
            });
        });
    </script>
@stop