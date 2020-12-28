@extends('base')
@section('main')
<div class="row">
<div class="col-sm-12">
<div class="col-sm-12">
  @if(session()->get('success'))
    <div class="alert alert-success">
      {{ session()->get('success') }}  
    </div>
  @endif
</div>
    <h1 class="display-3 pt-3">Users</h1>  

    <div align="right">
    <a href="{{ route('home') }}" class="btn btn-default " style="border-color:grey;">Home</a>  
</div>   
<br>
<div align="right">
    <!--<div>
    <a style="margin: 19px;" href="{{ route('users.create')}}" class="btn btn-primary">New Profile</a>
    </div>  -->
  <table class="table table-striped">
    <thead>
        <tr>
          <td>ID</td>
          <td>Name</td>
          <td>Email</td>
          <td>Username</td>
          <td>Password</td>
          <td>Phone Number</td>
          <td colspan = 2>Actions</td>
        </tr>
    </thead>
    <tbody>
        @foreach($users as $user)
        <tr>
            <td>{{$user->id}}</td>
            <td>{{$user->name}} </td>
            <td>{{$user->email}}</td>
            <td>{{$user->username}}</td>
            <td>{{$user->password}}</td>
            <td>{{$user->phone_number}}</td>
            <td>
                <a href="{{ route('users.edit',$user->id)}}" class="btn btn-primary">Edit</a>
            </td>
            <td>
                <form action="{{ route('users.destroy', $user->id)}}" method="post">
                  @csrf
                  @method('DELETE')
                  <button class="btn btn-danger" type="submit">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
  </table>
<div>
</div>
@endsection