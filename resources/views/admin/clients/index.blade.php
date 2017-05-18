@extends('admin.layouts.master')

@section('content')

<p>{!! link_to_route(config('quickadmin.route').'.clients.create', 'Добавить нового', null, array('class' => 'btn btn-success')) !!}</p>

@if ($clients->count())
    <div class="portlet box green">
        <div class="portlet-title">
            <div class="caption">Список</div>
        </div>
        <div class="portlet-body">
            <table class="table table-striped table-hover table-responsive datatable" id="datatable">
                <thead>
                    <tr>

                        <th>Имя</th>
                        <th>Номер</th>
                        <th>E-mail</th>

                        <th>&nbsp;</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($clients as $row)
                        <tr>

                            <td>{{ $row->name }}</td>
                            <td>{{ $row->phone }}</td>
                            <td>{{ $row->email }}</td>

                            <td>
                                {!! link_to_route(config('quickadmin.route').'.clients.edit', 'Редактировать', array($row->id), array('class' => 'btn btn-xs btn-info')) !!}
                                @if(app()->getLocale() != 'pl')
                                    <a class="btn btn-xs btn-success" href="{{route('history_for_client', $row->id)}}">История</a>
                                @endif
                                {!! Form::open(array('style' => 'display: inline-block;', 'method' => 'DELETE', 'onsubmit' => "return confirm('".trans("quickadmin::templates.templates-view_index-are_you_sure")."');",  'route' => array(config('quickadmin.route').'.clients.destroy', $row->id))) !!}
                                {!! Form::submit('Удалить', array('class' => 'btn btn-xs btn-danger')) !!}
                                {!! Form::close() !!}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            {!! Form::open(['route' => config('quickadmin.route').'.clients.massDelete', 'method' => 'post', 'id' => 'massDelete']) !!}
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