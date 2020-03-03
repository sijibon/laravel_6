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

          <a href="{{ route('all.post')}}"><button class="btn btn-secondary">All Posts</button></a>
        
         @if ($errors->any())
              <div class="alert alert-danger">
                  <ul>
                      @foreach ($errors->all() as $error)
                          <li>{{ $error }}</li>
                      @endforeach
                  </ul>
              </div>
          @endif

        <form action="{{ url ('update/posts/'.$posts->id)}}" method="post" enctype="multipart/form-data">
          @csrf
          <div class="control-group">
            <div class="form-group floating-label-form-group controls">
              <label>Post Tittle</label>
              <input type="text" class="form-control" value="{{ $posts->title }}" id="tittle" required="" name="title">
            </div>
          </div>
          <div class="control-group">
            <div class="form-group">
              <label>New Image</label>
              <input type="file"  name="image" class="form-control">
              Old Image:<img src="{{ URL::to($posts->image )}}" alt="" style="height: 60px; width:70px;">
              <br>
              <input type="hidden" name="old_image" value="{{ $posts->image }}">
              <label>Cetegory</label>
              <select name="cetegories_id" class="form-control">

                @foreach($cetegory as $row)
              	<option value="{{ $row->id }}" <?php if ($row->id == $posts->cetegories_id){
                echo "selected";
                }?>>{{ $row->name}}</option>
              	@endforeach
              </select>
            </div>
          </div>
          <br>
          <div class="control-group">
            <div class="form-group col-xs-12 floating-label-form-group controls">
              <label>Post Details</label>
              <textarea name="details" id="" rows="5" class="form-control">{{ $posts->details }}</textarea>
            </div>
          </div>
          <br>
          <div id="success"></div>
          <div class="form-group">
            <button type="submit" class="btn btn-primary" id="submit">Update</button>
          </div>
        </form>
      </div>
    </div>
  </div>

@endsection
