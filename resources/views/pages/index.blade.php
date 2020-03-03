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

 <div class="row">
      <div class="col-lg-8 col-md-10 mx-auto">
        @foreach($posts as $row)
        <div class="post-preview">
          <a href="post.html">
            <h2 class="post-title">  
             {{ $row->title }}
            </h2>
            <h3 class="post-image">
             <img src="{{ URL::to ($row->image)}}" alt="" style="height: 300px;">
            </h3>
            <p style="font-style: italic;">Date :{{ $row->created_at}}</p>
          </a>
          <p>{{ $row->details}}</p>
        </div>
        <hr>  
        @endforeach

       <h5>View More Post</h5> {{ $posts->links() }}
       
        <!-- Pager -->
        <div class="clearfix">
          
        </div>
      </div>
    </div>

@endsection