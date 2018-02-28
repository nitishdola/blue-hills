@extends('layouts.admin.main')


@section('pageCss')
<style>
.seat-no {
    padding-top:7px;
}
</style>
@stop

@section('content')
<div class="panel panel-headline">
    <div class="panel-heading">
        <h3 class="panel-title">Add New bus Schedule</h3>
    </div>
    
    <div class="panel">
        <div class="panel-heading">
            <h3 class="panel-title">Inputs</h3>
        </div>
        <div class="panel-body">
            @if ($errors->any())
                {!! implode('', $errors->all('<div class="alert alert-danger">:message</div>')) !!}
            @endif

            <form class="form-horizontal" role="form" method="POST" action="{{ url('/admin/bus/routes/schedule/save') }}">
                {{ csrf_field() }}
                @include('admin.master.buses.routes._route_schedule')
                <br>
                <button type="submit" class="btn btn-success">SUBMIT</button>
            </form>
        </div>
    </div>
</div>
@endsection

@section('pageJs')
<script>
    $('.select-beast').selectize({
        create: false,
        sortField: 'text'
    });
</script>
@stop
