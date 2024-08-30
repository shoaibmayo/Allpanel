@extends('admin.layouts.app')
@section('title') Add User @endsection
@section('style')
    <style>
        /* custom css here */
    </style>    
@endsection
@section('content')
<main id="main" class="main">

    <div class="pagetitle">
      <h5 class="fw-bold">User Add Page</h5> 
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
          <li class="breadcrumb-item"><a href="{{ route('admin.user.list') }}">User List</a></li>
          <li class="breadcrumb-item"><a href="{{ route('admin.user.add') }}">User Add</a></li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-body">
             <div class="row">
                    <div class="col-lg-6">
                        <h5 class="card-title">Add User</h5>
                    </div>
                    <div class="col-lg-6">
                         <a href="{{ route('admin.user.list') }}"  class="bn float-end mt-3">Back to User List</a>
                    </div>
             </div>
                <!-- Custom Styled Validation -->

             <form  action="{{ route('admin.user.create') }}" method="post" class="row g-3">
                @csrf
                  <div class="col-md-6">
                     <label for="name" class="form-label">Name</label>
                     <input type="text" class="form-control" value="{{ old('name') }}"  name="name" id="name" placeholder="Name" >
                     @error('name')
                        <div class="text-danger">{{ $message }}</div>
                     @enderror
                  </div>
                  <div class="col-md-6">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" value="{{ old('email') }}" name="email" id="email" placeholder="email" >
                     @error('email')
                        <div class="text-danger">{{ $message }}</div>
                     @enderror
                 </div>
                 <div class="col-md-6">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" name="password" id="password" placeholder="Password" >
                     @error('password')
                        <div class="text-danger">{{ $message }}</div>
                     @enderror
                 </div>
                 <div class="col-md-6">
                    <label for="role" class="form-label">Role</label>
                    <select class="form-select" name="role_id" id="role_id"  >
                        <option selected disabled value="">--select--</option>
                        @foreach ($getRole as $value )
                            <option {{ (old('role_id') == $value->id ) ? 'selected' : '' }}  value="{{ $value->id }}">{{ $value->name }}</option>
                        @endforeach
                    </select>
                    @error('role_id')
                        <div class="text-danger">{{ $message }}</div>
                     @enderror
                 </div>
                  <div class="col-12">
                     <button class="bn"  type="submit">Create</button>
                  </div>
             </form>
             <!-- End Custom Styled Validation -->
            </div>
          </div>
      </div>

    </section>

  </main><!-- End #main -->
@endsection
@section('script')
    {{-- custom javascript here --}}
@endsection
