@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                @if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
                <div class="card-header">user update
                    <a href="{{ route('password_show') }}"><button class="btn btn-primary">password change</button></a>
                </div>

                <div
                 class="card-body">
                 <form action="{{ route('update') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                      <label for="exampleInputEmail1">Email address</label>
                      <input type="email" name="email"  class="form-control" value="{{ Auth::user()->email }}" >
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1">name</label>
                      <input type="text" name="name" class="form-control" value="{{ Auth::user()->name }}" >
                    </div>
                    <div class="form-check">
                        <label for="exampleInputPassword1">image</label>
                        <input type="file" name="image" class="form-control"
                     onchange="document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])"
                        >
                    </div>
                     <div class="images">
                        <img id="blah" width="100px" src="{{ asset('images/' . Auth::user()->image) }}" alt="">
                     </div>

                    <button type="submit" class="btn btn-primary">Submit</button>
                  </form>


                </div>
            </div>
        </div>
    </div>
</div>
@endsection
