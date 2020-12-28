@extends('base')
@section('main')
<div class="row">
 <div class="col-sm-8 offset-sm-2">
    <h1 class="display-3">Create a profile</h1>
  <div>
    @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
        </ul>
      </div><br />
    @endif
      <form method="post" action="{{ route('users.store') }}">
          @csrf
          <div class="form-group">    
              <label for="name">Name:</label>
              <input type="text" class="form-control" name="name"/>
          </div>
          <div class="form-group">
              <label for="email">Email:</label>
              <input type="text" class="form-control" name="email"/>
          </div>
          <div class="form-group">
              <label for="username">Username:</label>
              <input type="text" class="form-control" name="username"/>
          </div>
          <div class="form-group">
              <label for="password">Password:</label>
              <input type="text" class="form-control" name="password"/>
          </div>
          <div class="form-group">
              <label for="phone_number">Phone Number:</label>
              <input type="text" class="form-control" name="phone_number"/>
          </div>
                                   
          <button type="submit" class="btn btn-primary">Create Profile</button>
      </form>
  </div>
</div>
</div>
@endsection