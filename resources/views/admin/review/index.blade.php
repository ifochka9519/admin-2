@extends('admin.layouts.master')

@section('content')

    <p>{!! link_to_route(config('quickadmin.route').'.review.create', 'Добавить новый' , null, array('class' => 'btn btn-success')) !!}</p>

    @if ($review->count())
        <div class="portlet box green">
            <div class="portlet-title">
                <div class="caption">Список</div>
            </div>
            <div class="portlet-body">
                <table class="table table-striped table-hover table-responsive datatable" id="datatable">
                    <thead>
                    <tr>

                        <th>Автор</th>
                        <th>Фото</th>
                        <th>Описание</th>

                        <th>&nbsp;</th>
                    </tr>
                    </thead>

                    <tbody>
                    @foreach ($review as $row)
                        <tr>

                            <td>{{ $row->author }}</td>
                            <td>@if($row->photo != '')<img src="{{ asset('uploads/thumb') . '/'.  $row->photo }}">@endif
                            </td>
                            <td>{{ $row->alt_photo }}</td>

                            <td>
                                {!! link_to_route(config('quickadmin.route').'.review.edit', trans('quickadmin::templates.templates-view_index-edit'), array($row->id), array('class' => 'btn btn-xs btn-info')) !!}
                                {!! Form::open(array('style' => 'display: inline-block;', 'method' => 'DELETE', 'onsubmit' => "return confirm('".trans("quickadmin::templates.templates-view_index-are_you_sure")."');",  'route' => array(config('quickadmin.route').'.review.destroy', $row->id))) !!}
                                {!! Form::submit(trans('language.orders.delete'), array('class' => 'btn btn-xs btn-danger')) !!}
                                {!! Form::close() !!}
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>

                {!! Form::open(['route' => config('quickadmin.route').'.review.massDelete', 'method' => 'post', 'id' => 'massDelete']) !!}
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