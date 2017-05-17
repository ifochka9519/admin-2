@extends('admin.layouts.master')

@section('content')

    <h2>PROSPERIS</h2>
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
                        alert('Клиенты по которым скоро анулируется приглашение: '+s);
                    }
                })
        }, 1000);




        var timerId3 = setTimeout(function () {
            $.ajax({
                method: 'POST',
                url: urlTimer3,
                data: {
                    _token: token
                }
            })
                .done(function (s) {

                    if (s.length == 0) {
                    }
                    else {
                        alert('Клиенты которые скоро выежджают: '+s);
                    }
                })
        }, 1000);

    </script>


@endsection