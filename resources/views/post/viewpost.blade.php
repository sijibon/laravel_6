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
          <hr>

        <div>            
              <h3>{{ $posts->title }}</h3>
              <img src="{{ URL::to($posts->image) }}" alt="" style="height: 300px;"><br><br>
              <h6>Author Name: {{ $posts->name }}</h6>
              <p>Data:{{ $posts->created_at}}</p>
             <div class="jumbotron">{{ $posts->details }}</div>   
             <input type="text" name="Comments" placeholder="Comments..." class="form-control">     
        </div>
      </div>
    </div>
  </div>

@endsection
