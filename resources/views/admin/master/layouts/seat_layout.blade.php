@extends('layouts.admin.main')

@section('content')
<div class="panel panel-headline">
    <div class="panel-heading">
        <h3 class="panel-title">Add New JSON Layout</h3>
    </div>
    
    <div class="panel">
        <div class="panel-heading">
            <h3 class="panel-title">Inputs</h3>
        </div>
        <div class="panel-body">
            <form class="form-horizontal" role="form" method="POST" action="{{ url('/admin/seat-layout/save') }}">
                        {{ csrf_field() }}

                <input type="text" name="name" class="form-control" placeholder="Layout Name" required="required">
                
                <br>

                <input type="text" name="total_seats" class="form-control" placeholder="Total Seats" required="required">
                
                <br>
                <textarea class="form-control" name="layout" placeholder="Put JSON Layout Here" rows="4" required="required"></textarea>
                <br>
                <button type="submit" class="btn btn-success">SUBMIT</button>
            </form>
        </div>
    </div>
</div>
@endsection
