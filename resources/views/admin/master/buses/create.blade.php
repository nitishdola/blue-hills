@extends('layouts.admin.main')


@section('pageCss')
<style>
.seat-no {
    padding-top:7px;
}
</style>
@stop


@section('pageJs')
<script>
$('#select-bus-routes').selectize({
    maxItems: 3
});
</script>
@stop

@section('content')
<div class="panel panel-headline">
    <div class="panel-heading">
        <h3 class="panel-title">Add New Bus</h3>
    </div>
    
    <div class="panel">
        <div class="panel-heading">
            <h3 class="panel-title">Inputs</h3>
        </div>
        <div class="panel-body">
            <form class="form-horizontal" role="form" method="POST" action="{{ url('/admin/bus/save') }}">
                        {{ csrf_field() }}

                @include('admin.master.buses._create')
                <br>
                <button type="submit" class="btn btn-success">SUBMIT</button>
            </form>
        </div>
    </div>
</div>
@endsection
