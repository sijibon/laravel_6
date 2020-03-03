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

          <!-- arror message show -->

          @if ($errors->any())
              <div class="alert alert-danger">
                  <ul>
                      @foreach ($errors->all() as $error)
                          <li>{{ $error }}</li>
                      @endforeach
                  </ul>
              </div>
          @endif
                  
        <form action="{{ route ('store.cetegory')}}" method="post">
          @csrf
          <div class="control-group">
            <div class="form-group floating-label-form-group controls">
              <label>Cetegory Name</label>
              <input type="text" class="form-control" placeholder="Cetegory Name" name="name">
            </div>
          </div>
          <br>
          <div class="form-group floating-label-form-group controls">
              <label>Slug Name</label>
              <input type="text" class="form-control" placeholder="Slug Name" name="slug">
            </div>
          <br>
          <br>
          <div class="form-group">
            <button type="submit" class="btn btn-primary" id="submit">Submit</button>
          </div>
        </form>
      </div>
    </div>
  </div>

@endsection
