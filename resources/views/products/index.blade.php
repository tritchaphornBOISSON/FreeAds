@extends('parent')

@section('main')

<div align="center">
<form action="{{ route('products.index') }}" method="GET" role="search" class="justify-content-center " style="width:600px;">  
  <input type="text" class="form-control" name="term" placeholder="Search category" id="term" >
  <div class="input-group-append">
    <button class="btn btn-outline-secondary" type="submit" title="Search category">Search</button>
    <a href="{{ route('products.index') }}" style="color:black;"><button class="btn btn-outline-secondary" type="button" >Refresh Page</button></a>  
  </div>
  </form>
</div>

<div align="left">
    <a href="{{ route('home') }}" class="btn btn-default">Home</a>  
</div>   
<div align="right">



    <a href="{{ route('products.create') }}" class="btn btn-success ">Add</a>
</div>

@if($message = Session::get('success'))
<div class="alert alert-success">
    <p>{{$message}}</p>
</div>
@endif

<table class="table table-bordered table-striped">
    <tr>
        <th width="10%">Image</th>
        <th width="15%">Title</th>
        <th width="30%">Description</th>
        <th width="10%">Category</th>
        <th width="10%">Price</th>
        <th width="15%">Location</th>
        <th width="10%">User ID</th>
        <th  width ="10%" colspan = 3>Action</th>
    </tr>
    @foreach($data as $row)
    <tr>
        <td><img src="{{ URL::to('/') }}/images/{{ $row->image }}" class="img-thumbnail" width="75" /></td>
        <td>{{ $row->Title }}</td>
        <td>{{ $row->Description }}</td>
        <td>{{ $row->Category }}</td>
        <td>{{ $row->Price }}</td>
        <td>{{ $row->Location }}</td>
        <td>{{ $row->user_id }}</td>


        <td>
        <a href="{{ route('products.show', $row->id)}}" class="btn btn-primary">Display</a>
        </td>
        <td>
        <a href="{{ route('products.edit', $row->id)}}" class="btn btn-warning">Edit</a>
        </td>
        <td>
        <form action="{{ route('products.destroy', $row->id)}}" method="post">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Delete</button>
        </form>
        </td>
    </tr>
    @endforeach
</table>
{!! $data->links() !!}
@endsection
