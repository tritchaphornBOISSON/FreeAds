@extends('parent')

@section('main')
            
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div align="right">
        <a href="{{ route('products.index') }}" class="btn btn-default">Back</a>
    </div>
    <br />
    <form method="post" action="{{ route('products.update', $data->id) }}" enctype="multipart/form-data">
    @csrf
    @method('PATCH')
    <div class="form-group">
        <label class="col-md-4 text-right">Enter Title</label>
            <div class="col-md-8">
                <input type="text" name="Title" value="{{ $data->Title }}" class="form-control input-lg" />
            </div>
    </div>
    <br />
    <br />
    <br />

    <div class="form-group">
        <label class="col-md-4 text-right">Enter Description</label>
            <div class="col-md-8">
                <input type="text" name="Description" value="{{ $data->Description }}" class="form-control input-lg" />
            </div>
    </div>
    <br />
    <br />
    <br />

    <div class="form-group">
        <label class="col-md-4 text-right">Enter Category</label>
            <div class="col-md-8">
                <input type="text" name="Category" value="{{ $data->Category }}" class="form-control input-lg" />
            </div>
    </div>
    <br />
    <br />
    <br />

    <div class="form-group">
        <label class="col-md-4 text-right">Enter Price</label>
            <div class="col-md-8">
                <input type="text" name="Price" value="{{ $data->Price }}" class="form-control input-lg" />
            </div>
    </div>
    <br />
    <br />
    <br />

    <div class="form-group">
        <label class="col-md-4 text-right">Enter Location</label>
            <div class="col-md-8">
                <input type="text" name="Location" value="{{ $data->Location }}" class="form-control input-lg" />
            </div>
    </div>
    <br />
    <br />
    <br />

    <div class="form-group">
        <label class="col-md-4 text-right">Enter User ID</label>
            <div class="col-md-8">
                <input type="text" name="User_id" value="{{ $data->user_id }}" class="form-control input-lg" />
            </div>
    </div>
    <br />
    <br />
    <br />

    <div class="form-group">
        <label class="col-md-4 text-right">Select Image</label>
            <div class="col-md-8">
                <input type="file" name="image" />
                <img src="{{ URL::to('/') }}/images/{{ $data->image }}" class="img-thumbnail" width="100" />
                <input type="hidden" name="hidden_image" value="{{ $data->image }}" />
            </div>
    </div>
    <br />
    <br />
    <br />

    <div class="form-group text-center">
        <input type="submit" name="edit" class="btn btn-primary" value="Edit" />
    </div>
    </form>

@endsection
