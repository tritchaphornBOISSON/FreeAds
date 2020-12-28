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
    <h1 class="display-3">Profiles</h1>  
    
    <div>
    <a style="margin: 19px;" href="{{ route('profiles.create')}}" class="btn btn-primary">New profile</a>
    </div>  
  <table class="table table-striped">
    <thead>
        <tr>
          <td>ID</td>
          <td>Name</td>
          <td>Email</td>
          <td>Phone Number</td>
          <td>City</td>
          <td>Country</td>
          <td colspan = 2>Actions</td>
        </tr>
    </thead>
    <tbody>
        @foreach($profiles as $profile)
        <tr>
            <td>{{$profile->id}}</td>
            <td>{{$profile->first_name}} {{$profile->last_name}}</td>
            <td>{{$profile->email}}</td>
            <td>{{$profile->phone_number}}</td>
            <td>{{$profile->city}}</td>
            <td>{{$profile->country}}</td>
            <td>
                <a href="{{ route('profiles.edit',$profile->id)}}" class="btn btn-primary">Edit</a>
            </td>
            <td>
                <form action="{{ route('profiles.destroy', $profile->id)}}" method="post">
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