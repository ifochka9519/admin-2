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

                        <th>{{$words['number']}}</th>
                        <th>{{$words['status_current']}}</th>
                        <th>{{$words['status_old']}}</th>
                        <th>{{$words['time_changes']}}</th>


                    </tr>
                    </thead>

                    <tbody>
                    @foreach ($news as $rows)
                        @if($rows->status_id !='8')
                        <tr>

                            <td>{{ $rows->order_id }}</td>
                            <td>{{ $rows->status_current }}</td>
                            <td>{{ $rows->status_old }}</td>
                            <td>{{ $rows->created_at }}</td>

                        </tr>
                        @endif

                    @endforeach
                    </tbody>
                </table>
               <div class="row">
                    <div class="col-xs-12">
                        <form action="{{route('sees')}}" method="post">
                        <button type="submit" class="btn btn-danger" id="delete">
                            {{$words['see_it']}}
                        </button>

                            <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">

                        </form>
                    </div>
                </div>

            </div>
        </div>
    @else
        {{ trans('quickadmin::templates.templates-view_index-no_entries_found') }}
    @endif

@endsection