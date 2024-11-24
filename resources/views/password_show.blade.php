@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Change Your password
                </div>

                <div
                 class="card-body">
                 <form action="{{ route('password_update') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                     <div class="form-group">
                        <label for="current_password">Current Password</label>
                        <input type="password" class="form-control" name="current_password" >
                        @error('current_password')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="new_password">New Password</label>
                        <input type="password" class="form-control" name="new_password" >
                        @error('new_password')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="new_password_confirmation">Confirm New Password</label>
                        <input type="password" class="form-control" name="new_password_confirmation">
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                  </form>


                </div>
            </div>
        </div>
    </div>
</div>
@endsection
