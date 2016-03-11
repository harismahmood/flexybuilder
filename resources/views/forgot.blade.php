@extends('layout.simple')
@section('title') Forgot Password @endsection
@section('body')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <img class="img-responsive center-block" src="{{ @url('img/logo.png') }}" />
                <div class="well loginBox">
                    <form id="forgotForm" method="POST" action="/login/forgot">
                        <div class="form-group">
                            <label class="center-block" for="email">Email:</label>
                            <input type="email" name="email" class="form-control no-edge" id="email" required/>
                        </div>
                        {{ csrf_field() }}
                        <input type="submit" class="btn btn-md black no-edge center-block" value="Reset Password" id="submit"/>
                    </form>
                    <a class="white-text" href="/login">Back to Login</a>
                </div>
            </div>
        </div>
    </div>
	<div class="bottom-right">
          <h4>©HSTech.</h4>
      </div>
	  <div class="bottom-left">
          <h4>v1.0.0</h4>
      </div>
@endsection
@section('scripts')
    <script src="{{ url('js/vl.js') }}"></script>
    <script>
        $("#loginForm").validate();
    </script>
@endsection