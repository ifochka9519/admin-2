@extends('admin.layouts.master')

@section('content')

{{--
    <p>{!! link_to_route(config('quickadmin.route').'.cities.create', trans('quickadmin::templates.templates-view_index-add_new') , null, array('class' => 'btn btn-success')) !!}</p>
--}}

    @if ($call->count())
        <div class="portlet box green">
            <div class="portlet-title">
                <div class="caption">Список</div>
            </div>
            <div class="portlet-body">
                <table class="table table-striped table-hover table-responsive datatable" id="datatable">
                    <thead>
                    <tr>

                        <th>Имя</th>
                        <th>Номер телефона</th>
                        <th>Дата</th>

                    </tr>
                    </thead>

                    <tbody>
                    @foreach ($call as $row)
                        <tr>

                            <td>{{ $row->name }}</td>
                            <td>{{ $row->telephone }}</td>
                            <td>{{ $row->created_at }}</td>

                         {{--   <td>
                                {!! Form::open(array('style' => 'display: inline-block;', 'method' => 'DELETE', 'onsubmit' => "return confirm('".trans("quickadmin::templates.templates-view_index-are_you_sure")."');",  'route' => array(config('quickadmin.route').'.cities.destroy', $row->id))) !!}
                                {!! Form::submit('Удалить', array('class' => 'btn btn-xs btn-danger')) !!}
                                {!! Form::close() !!}
                            </td>--}}
                        </tr>
                    @endforeach
                    </tbody>
                </table>

                {!! Form::open(['route' => config('quickadmin.route').'.cities.massDelete', 'method' => 'post', 'id' => 'massDelete']) !!}
                <input type="hidden" id="send" name="toDelete">
                {!! Form::close() !!}
            </div>
        </div>
    @else
        {{ trans('quickadmin::templates.templates-view_index-no_entries_found') }}
    @endif

@endsection