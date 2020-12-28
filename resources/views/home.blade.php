

@extends('layouts.app')

@section('content')
<div class="container">
<div class="pl-3 pt-3 ">  <h2>All Ads</h2> </div>
    <div class="row ">    
    @foreach($products as $row)
        
        
        <div class="col-4 pt-4">
        <div class="box-image" >
        <img src="{{ URL::to('/') }}/images/{{ $row->image }}"  class="img-thumbnail products" width="350"  />
        </div>
        <br>
               
        <div >
        <strong>Title :</strong> {{ $row->Title }}
        </div>
        
        <div>   
        <strong>Description :</strong> {{ $row->Description }}
        </div>
        
        <div >
        <strong>Category :</strong> {{ $row->Category }}
        </div>

       <div>
       <strong>Price :</strong> {{ $row->Price }}
       </div>

       <div>   
       <strong>Location :</strong> {{ $row->Location }}
       </div>

    
        </div>
        @endforeach
        </div>
    </div>
</div>
@endsection
