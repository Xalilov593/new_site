@extends('layout.help')
@section('title')
Register
@endsection
@section('content')
<div id="app">
    <section class="section">
      <div class="container mt-5">
      <div class="row">
          <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
            <div class="card card-primary">
              <div class="card-header">
                <h4>Register</h4>
              </div>
              <div class="card-body">
                <form  method="POST" action="{{ route('register')}}" class="needs-validation">
                    @csrf
                  <div class="form-group">
                      <label for="name">Name</label>
                      <input id="name" type="text" class="form-control" name="name">
                  </div>
                   <div class="form-group">
                          <label for="email">Email</label>
                          <input id="email" type="email" class="form-control" name="email">
                          <div class="invalid-feedback">
                          </div>
                    </div>
                  <div class="form-group">
                        <label for="password" class="d-block">Password</label>
                            <input id="password" type="password" class="form-control pwstrength" data-indicator="pwindicator"
                              name="password">
                            <div id="pwindicator" class="pwindicator">
                              <div class="bar"></div>
                              <div class="label"></div>
                            </div>
                  </div>
                  <div class="form-group">
                      <label for="password2" class="d-block">Password Confirmation</label>
                      <input id="password2" type="password" class="form-control" name="password_confirmation">
                    </div>
                  <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                      Register
                    </button>
                  </div>
                </form>
              </div>
            </div>
            <div class="mb-4 text-muted text-center">
                Already Registered? <a href="{{ route('login') }}">Login</a>
              </div>
          </div>
        </div>
      </div>
    </section>
  </div>
  @endsection
