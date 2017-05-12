<div class="page-header navbar navbar-fixed-top">
    <div class="page-header-inner">
        <div class="page-header-inner">
            <div class="navbar-header">
                <a href="{{ url(config('quickadmin.homeRoute')) }}" class="navbar-brand">
                    {{ trans('quickadmin::admin.partials-topbar-title') }}
                </a>
            </div>
            <a href="javascript:;"
               class="menu-toggler responsive-toggler"
               data-toggle="collapse"
               data-target=".navbar-collapse">
            </a>

                <div  style="font-size: 120%; float: right; margin-right: 5%; width: 30%">
                <a style="float: right; margin-top: 3%; margin-left: 5%;" href="{{route('en')}}"> en </a>
                <a style="float: right; margin-top: 3%;  margin-left: 5%;" href="{{route('pl')}}"> pl </a>
                <a style="float: right; margin-top: 3%;  margin-left: 5%;" href="{{route('ru')}}"> ru </a>
                </div>
            //</div>
        </div>
    </div>
</div>