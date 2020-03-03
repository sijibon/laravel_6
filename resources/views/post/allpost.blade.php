@extends('welcome')

@section('header')
  <header class="masthead" style="background-image: url({{ asset('frontend/img/home-bg.jpg')}})">
    <div class="overlay"></div>
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
          <div class="site-heading">
            <h1>FCI CST 2nd Shift  Blog Site</h1>
            <span class="subheading">A Blog Theme by Jibon Shohidul</span>
          </div>
        </div>
      </div>
    </div>
  </header>
@endsection

@section('content')

<!-- Main Content -->
  <div class="container">
    <div class="row">
      <div class="col-lg-12 col-md-10 mx-auto">
        
        	<a href="{{ route ('write.post')}}"><button class="btn btn-primary">Write Post</button></a>
        
          <hr>
          <table class="table table-responsive">
            <tr>
              <th>SL</th>
              <th>Cetegory</th>
              <th>Title</th>
              <th>Post Time</th>
              <th>Image</th>
              <th>Action</th>
            </tr>
          
          @foreach($posts as $row)
            <tr>
              <th>{{ $row->id }}</th>
              <th>{{ $row->name}}</th>
              <th>{{$row->title}}</th>
               <th>{{$row->created_at}}</th>
               <th><img src="{{ URL::to($row->image)}}" alt="posts image" style="height: 50px; width:70px;"></th>
              <th>
                <button class="btn  btn-info"><a href="{{ URL::to('edit/posts/'.$row->id)}}">Edit</a></button>
                <a href="{{ URL::to('delete/posts/'.$row->id)}}" class="btn btn-sm btn-danger">Delete</a>
                 <a href="{{ URL::to('view/posts/'.$row->id)}}" class="btn btn-sm btn-success">View</a>
              </th>
            </tr>

            @endforeach
          </table>
      </div>
    </div>
  </div>

@endsection
