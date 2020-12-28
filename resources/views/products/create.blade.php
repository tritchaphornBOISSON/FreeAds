@extends('parent')

@section('main')
@if($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
<div align="right">
    <a href="{{ route('products.index') }}" class="btn btn-default">Back</a>
</div>

<form method="post" action="{{ route('products.store') }}" enctype="multipart/form-data">

@csrf
<div class="form-group">
    <label class="col-md-2 text-right">Enter Title</label>
    <div class="col-md-10">
        <input type="text" name="Title" class="form-control input-lg" />
    </div>
</div>
<br />
<br />
<br />

<div class="form-group">
    <label class="col-md-2 text-right">Enter Description</label>
    <div class="col-md-10">
        <textarea  name="Description" class="form-control input-lg" ></textarea>
    </div>
</div>
<br />
<br />
<br />

<div class="form-group">
    <label class="col-md-2 text-right">Enter Category</label>
    <div class="col-md-10">
        <input type="text" name="Category" class="form-control input-lg" />
    </div>
</div>
<br />
<br />
<br />

<div class="form-group">
    <label class="col-md-2 text-right">Enter Price</label>
    <div class="col-md-10">
        <input type="text" name="Price" class="form-control input-lg" />
    </div>
</div>
<br />
<br />
<br />

<div class="form-group">
    <label class="col-md-2 text-right">Enter Location</label>
    <div class="col-md-10">
        <input type="text" name="Location" class="form-control input-lg" />
    </div>
</div>
<br />
<br />
<br />

<div class="form-group">
    <label class="col-md-2 text-right">Enter User ID</label>
    <div class="col-md-10">
        <input type="text" name="User_id" class="form-control input-lg" />
    </div>
</div>
<br />
<br />
<br />



<div class="form-group">
    <label class="col-md-2 text-right">Select Image</label>
    <div class="col-md-10">
        <input type="file" name="image" />
    </div>
</div>
<br />
<br />
<br />

<div class="form-group text-center">
    <input type="submit" name="add" class="btn btn-primary " value="Add" />
</div>

</form>

@endsection
