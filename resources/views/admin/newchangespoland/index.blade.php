@extends('admin.layouts.master')

@section('content')

    @if ($news->count())
        <div class="portlet box green">
            <div class="portlet-title">
                <div class="caption">{{$words['list']}}</div>
            </div>
            <div class="portlet-body">
                <table class="table table-striped table-hover table-responsive datatable" id="datatablepl">
                    <thead>
                    <tr>

                        <th>№ ЗАЯВКИ</th>
                        <th>Клиент</th>
                        <th>Изменение статуса</th>
                        <th>Время изменения</th>


                    </tr>
                    </thead>

                    <tbody>
                    @foreach ($news as $rows)
                        @if($rows->status_id !='8')
                        <tr>


                            <td>{{ $rows->order_id }}</td>
                            <td>{{ $rows->order->client->name }}</td>
                            <td><span style="color: {{\App\Statuses::where('name',$rows->status_old)->first()->color}};">{{ $rows->status_old }}</span><span style="color:red;"> -> </span> <span style="color: {{\App\Statuses::where('name',$rows->status_current)->first()->color}};">{{ $rows->status_current }}</span> </td>
                            {{--<td style="color: {{\App\Statuses::where('name',$rows->status_old)->first()->color}}">{{ $rows->status_old }}</td>--}}
                            <td>{{ $rows->created_at }}</td>

                        </tr>
                        @endif

                    @endforeach
                    </tbody>
                </table>
             {{-- <div class="row">
                    <div class="col-xs-12">
                        <form action="{{route('sees')}}" method="post">
                        <button type="submit" class="btn btn-danger" id="delete">
                            {{$words['see_it']}}
                        </button>

                            <input type="hidden" name="_token" value="">

                        </form>
                    </div>
                </div>--}}

            </div>
        </div>
    @else
        {{ trans('quickadmin::templates.templates-view_index-no_entries_found') }}
    @endif

@endsection