@extends('admin.layouts.master')

@section('content')

    @if ($news->count())
        <div class="portlet box green">
            <div class="portlet-title">
                <div class="caption">{{ trans('quickadmin::templates.templates-view_index-list') }}</div>
            </div>
            <div class="portlet-body">
                <table class="table table-striped table-hover table-responsive datatable" id="datatable">
                    <thead>
                    <tr>
                        <th>
                            {!! Form::checkbox('delete_all',1,false,['class' => 'mass']) !!}
                        </th>
                        <th>№ ЗАЯВКИ</th>
                        <th>Текущий статус</th>
                        <th>Предыдущий статус</th>
                        <th>Время изменения</th>


                    </tr>
                    </thead>

                    <tbody>
                    @foreach ($news as $rows)
                        <tr>

                            <td>
                                {!! Form::checkbox('del-'.$rows->id,1,false,['class' => 'single','data-id'=> $rows->id]) !!}
                            </td>
                            <td>{{ $rows->history->order_id }}</td>
                            <td>{{ $rows->history->status_current }}</td>
                            <td>{{ $rows->history->status_old }}</td>
                            <td>{{ $rows->created_at }}</td>

                        </tr>

                    @endforeach
                    </tbody>
                </table>
                <div class="row">
                    <div class="col-xs-12">
                        <button class="btn btn-danger" id="delete">
                            {{ trans('quickadmin::templates.templates-view_index-delete_checked') }}
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