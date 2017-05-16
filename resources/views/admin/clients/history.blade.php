@extends('admin.layouts.master')

@section('content')

   {{-- {{dump($client)}}
    {{dump($current_order)}}
    {{dump($orders)}}
    --}}

    <h1>{{$client->name}}</h1>
    <h1>{{$client->user->name}}</h1>
<div class="row">
    <div class="col-md-5">
        <details>
            <summary style="font-size: 24px">Current order</summary>

            @if (count($histories)!=null)

                <table class="table table-striped table-hover table-responsive datatable" id="datatable">
                    <thead>
                    <tr>
                        <th>Номер заявки</th>
                        <th>Текущий статус</th>
                        <th>Предыдущий статус</th>
                        <th>Время изменения</th>
                        <th>Кто измененил</th>

                    </tr>
                    </thead>

                    <tbody>
                    @foreach ($histories as $row)
                        <tr>

                            <td>{{ $row->order_id }}</td>
                            <td style="color: {{\App\Statuses::where('name',$row->status_current)->first()->color}}">{{ $row->status_current }}</td>
                            <td style="color: {{\App\Statuses::where('name',$row->status_old)->first()->color}}">{{ $row->status_old }}</td>
                            <td>{{ $row->created_at }}</td>
                            <td>{{ $row->user_name }}</td>

                        </tr>
                    @endforeach
                    </tbody>
                </table>
            @endif

        </details>
    </div>


    <div class="col-md-1"></div>

    <div class="col-md-5">
        <details>
            <summary style="font-size: 24px">Archive</summary>
            @if ($orders->count())
                <table class="table table-striped table-hover table-responsive datatable" id="datatable">
                    <thead>
                    <tr>
                        <th>Номер заявки</th>
                        <th>Текущий статус</th>
                        <th>Причина</th>
                        <th>Время завершения</th>

                    </tr>
                    </thead>

                    <tbody>
                    @foreach ($orders as $row)
                        <tr>

                            <td>{{ $row->id }}</td>
                            <td style="color:{{ $row->status->color }}">{{ $row->status->name }}</td>
                            <td>{{ \App\Reason::where('order_id',$row->id)->first()->text }}</td>
                            <td>{{ \App\Reason::where('order_id',$row->id)->first()->created_at }}</td>

                        </tr>
                    @endforeach
                    </tbody>
                </table>
                @endif
        </details>
    </div>

</div>
   {{-- @if ($histories->count())
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
                        <th>Текущий статус</th>
                        <th>Предыдущий статус</th>
                        <th>Время изменения</th>


                    </tr>
                    </thead>

                    <tbody>
                    @foreach ($histories as $row)
                        <tr>
                            <td>
                                {!! Form::checkbox('del-'.$row->id,1,false,['class' => 'single','data-id'=> $row->id]) !!}
                            </td>
                            <td>{{ $row->status_current }}</td>
                            <td>{{ $row->status_old }}</td>
                            <td>{{ $row->created_at }}</td>

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
    @endif--}}


@endsection