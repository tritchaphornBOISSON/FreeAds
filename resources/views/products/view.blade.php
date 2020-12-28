@extends('parent')

@section('main')

<div class="jumbotron text-center">
    <div align="right">
        <a href="{{ route('products.index') }}" class="btn btn-default">Back</a>
    </div>
<br />
    <img src="{{ URL::to('/') }}/images/{{ $data->image }}" class="img-thumbnail" />
    <h3>Title : {{ $data->Title }} </h3>
    <h3>Description : {{ $data->Description }}</h3>
    <h3>Category : {{ $data->Category }}</h3>
    <h3>Price : {{ $data->Price }}</h3>
    <h3>Location : {{ $data->Location }}</h3>
    <h3>User ID : {{ $data->user_id }}</h3>
</div>
@endsection