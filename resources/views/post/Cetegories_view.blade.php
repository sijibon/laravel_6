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
      <div class="col-lg-8 col-md-10 mx-auto">
        
        	<a href="{{ route ('add.Cetegory')}}"><button class="btn btn-primary">Add Cetegory</button></a>
        	<a href="{{ route('all.cetegories')}}"><button class="btn btn-danger">All Cetegories</button></a>
          <hr>

        <div> 
            <ol>
              <li>Cetegories Name: {{ $cat->name }}</li>
              <li>Cetegories Slug:{{ $cat->slug }}</li>
              <li>Created at: {{ $cat->created_at}}</li>
            </ol>
        </div>
      </div>
    </div>
  </div>

@endsection
