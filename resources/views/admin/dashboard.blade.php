@extends('admin.layouts.master')

@section('content')

    {{ trans('quickadmin::admin.dashboard-title') }}
    <script>
        var timerId2 = setTimeout(function () {
            $.ajax({
                method: 'POST',
                url: urlTimer2,
                data: {
                    _token: token
                }
            })
                .done(function (s) {

                    if (s.length == 0) {
                    }
                    else {
                        alert('Клиент по которому истекает срок: '+s);
                    }
                })
        }, 1000);

    </script>


@endsection