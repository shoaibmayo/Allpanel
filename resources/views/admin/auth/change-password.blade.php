@extends('admin.layouts.app')
@section('title') Chnage Password @endsection
@section('style')
    <style>
        /* custom css here */
    </style>    
@endsection
@section('content')
<main id="main" class="main mb-5">
    <div class="pagetitle">
      <h5 class="fw-bold">Change Password Page</h5>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
          <li class="breadcrumb-item"><a href="{{ route('admin.changePassword') }}">Change Password</a></li>  
        </ol>
      </nav>
    </div>
    <section class="section d-flex flex-column align-items-center justify-content-center mb-5">
        <div class="col-lg-6">
            @include('admin.message')
          <div class="card">
            <div class="card-body">
             <div class="row">
                <div class="col-lg-6">
                    <h5 class="card-title">Change Password</h5>
                </div>
             </div>
                <!-- Change Password Form -->
                <form action="{{ route('admin.updatePassword') }}" method="post">
                    @csrf
                    @method('PUT')
                    <div class="row mb-3">
                        <div class="col-md-12">
                            <input type="password" name="old_password" class="form-control @error('old_password') is-invalid @enderror " value="{{ old('old_password') }}"  id="old_password" placeholder="Old Password">
                            @error('old_password')
                                    <p class="invalid-feedback">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-12">
                            <input type="password" name="new_password" class="form-control @error('new_password') is-invalid @enderror " value="{{ old('new_password') }}"   id="new_password" placeholder="New Password">
                            @error('new_password')
                                    <p class="invalid-feedback">{{ $message }}</p>
                            @enderror
                         </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-12">
                            <input type="password" name="confirm_password" class="form-control  @error('confirm_password') is-invalid @enderror " id="confirm_password" placeholder="Confirm New Password">
                            @error('confirm_password')
                                    <p class="invalid-feedback">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="text-center">
                    <button type="submit" class="bn  float-end mt-2"  >Change Password</button>
                    </div>
                </form>
                <!-- End Change Password Form -->
            </div>
          </div>
      </div>
    </section>
  </main><!-- End #main -->
@endsection
@section('script')
    {{-- custom javascript here --}}
@endsection
