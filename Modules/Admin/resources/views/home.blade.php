@include('admin::layouts.header')
@include('admin::layouts.topbar')
@include('admin::layouts.sidebar')

<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">
            <h1>Arabia Fuck Boy Welcome :  {{ Auth::guard("admin")->user()->name  }}</h1>
        </div>
    </div>
</div>

@include('admin::layouts.scripts')

