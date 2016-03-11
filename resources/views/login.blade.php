@extends('layout.simple')
@section('title') Login @endsection
@section('body')
  <div class="container-fluid">
      <div class="row">
          <div class="col-md-4 col-md-offset-4">
              <img class="img-responsive center-block" src="{{ @url('img/logo.png') }}" />
              <div class="well loginBox">
                  @if (Session::has('error'))
                      <div class="alert alert-info">{{ Session::get('error')  }}</div>
                      @endif
                <form id="loginForm" method="POST" action="/login/process">
                    <div class="form-group">
                        <label class="center-block" for="email">Email:</label>
                        <input type="email" name="email" class="form-control no-edge" id="email" required/>
                    </div>
                    <div class="form-group">
                        <label class="center-block" for="password">Password:</label>
                        <input type="password" name="password" class="form-control no-edge" id="password"  required/>
                    </div>
                    {{ csrf_field() }}
                    <input type="submit" class="btn btn-md black no-edge center-block" value="Login" id="submit"/>
                </form>
                  <a class="white-text" href="/forgot">Forgot Password?</a>
              </div>
          </div>
      </div>
  </div>
   <div class="bottom-left">
          <h4>v1.0.0</h4>
      </div>
  <div class="bottom-right">
          <h4>©HSTech.</h4>
      </div>
@endsection
@section('scripts')
    <script src="{{ url('js/vl.js') }}"></script>
    <script>
        $("#loginForm").validate();
    </script>
@endsection