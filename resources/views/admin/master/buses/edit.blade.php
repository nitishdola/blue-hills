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
    sortField: 'text',
    create: false
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
            @if ($errors->any())
                {!! implode('', $errors->all('<div class="alert alert-danger">:message</div>')) !!}
            @endif

            {!! Form::model($bus, array('route' => ['admin.bus.update', Crypt::encrypt($bus->id)], 'id' => 'bus.update', 'class' => 'form-horizontal row-border')) !!}

                @include('admin.master.buses._create')
                <br>
                <button type="submit" class="btn btn-success">SUBMIT</button>
            </form>
        </div>
    </div>
</div>
@endsection
