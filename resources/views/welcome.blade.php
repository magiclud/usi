@extends('layouts.doctor')

@section('title')
  Welcome!
@endsection

@section('content')
  this is a content 
  <div class="row">
      <div class="col-nd-6">
          <h3>Sign Up</h3>
          <form action="#" method="post">
              <div class="form-group">
                  <label for="emial"> Your E-mail</label>
                  <input class="form-control" type="text" name="emial" id="email">
              </div>
              <div class="form-group">
                  <label for="first_name"> Your First Name</label>
                  <input class="form-control" type="text" name="first_name" id="first_name">
              </div>
               <div class="form-group">
                  <label for="password"> Your Password</label>
                  <input class="form-control" type="password" name="password" id="email">
              </div>
              <button type="submit" class="btn-primary">Submit</button>
          </form>
      </div>
       <div class="col-nd-6">
          <h3>Sign In</h3>
           <form action="#" method="post">
              <div class="form-group">
                  <label for="emial"> Your E-mail</label>
                  <input class="form-control" type="text" name="emial" id="email">
              </div>
               <div class="form-group">
                  <label for="password"> Your Password</label>
                  <input class="form-control" type="password" name="password" id="email">
              </div>
              <button type="submit" class="btn-primary">Submit</button>
          </form>
      </div>
      
  </div>
@endsection