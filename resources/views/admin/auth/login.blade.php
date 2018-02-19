@extends('admin.layout.auth')

@section('content')

 <form class="form-auth-small" role="form" method="POST" action="{{ url('/admin/login') }}">
                        {{ csrf_field() }}
    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
        <label for="signin-email" class="control-label sr-only">Email</label>
        <input type="text" name="email" id="email" class="form-control"  placeholder="Email">
        @if ($errors->has('email'))
          <span class="help-block">
              <strong>{{ $errors->first('email') }}</strong>
          </span>
        @endif
    </div>
    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
        <label for="signin-password" class="control-label sr-only">Password</label>
        <input type="password" name="password" class="form-control" id="password" placeholder="Password">
        @if ($errors->has('password'))
          <span class="help-block">
              <strong>{{ $errors->first('password') }}</strong>
          </span>
        @endif
    </div>
    
    <!-- <div class="form-group clearfix">
        <label class="fancy-checkbox element-left">
            <input type="checkbox">
            <span>Remember me</span>
        </label>
    </div> -->
    <button type="submit" class="btn btn-primary btn-lg btn-block" name="S1" value="Login">LOGIN</button>
    <div class="bottom">
        @if(Session::has('message'))
        <div class="row">
           <div class="col-lg-12">
                 <div class="alert {{ Session::get('alert-class', 'alert-info') }}">
                       <button type="button" class="close" data-dismiss="alert">×</button>
                       {!! Session::get('message') !!}
                 </div>
              </div>
        </div>
        @endif

        @if (count($errors) > 0)
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    </div>
</form>
@endsection
