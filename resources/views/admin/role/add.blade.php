@extends('admin.layouts.app')
@section('title') Add Role @endsection
@section('style')
    <style>
        /* custom css here */
    </style>    
@endsection
@section('content')
<main id="main" class="main">

    <div class="pagetitle">
      <h5 class="fw-bold">Role Add Page</h5>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
          <li class="breadcrumb-item"><a href="{{ route('admin.role.list') }}">Role List</a></li>
          <li class="breadcrumb-item"><a href="{{ route('admin.role.add') }}">Role Add</a></li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-body">
             <div class="row">
                    <div class="col-lg-6">
                        <h5 class="card-title">Add Role</h5>
                    </div>
                    <div class="col-lg-6">
                         <a href="{{ route('admin.role.list') }}"  class="bn float-end mt-3">Back to Role List</a>
                    </div>
             </div>
                <!-- Custom Styled Validation -->

             <form  action="{{ route('admin.role.create') }}" method="post" class="row g-3">
                @csrf
                  <div class="col-md-6">
                     <label for="name" class="form-label">Role</label>
                     <input type="text" class="form-control" name="name" id="name" placeholder="Name" required>
                     <p></p>
                  </div>
                  <div class="col-md-6">
                     <label for="status" class="form-label">Status</label>
                     <select class="form-select" name="status" id="status" required>
                         <option selected disabled value="">--select--</option>
                         <option value="1">Active</option> 
                         <option value="0">Block</option>
                     </select>
                     <p></p>
                  </div>
                  <div class="row mb-3"> 
                    <label style="display:block; margin-bottom:10px" for="name" class="form-label"><b>Permission</b></label>
                    <hr>
                    @foreach ($getPermission as $value )
                       <div class="row " style="margin-bottom: 10px">
                            <div class="col-md-2">
                                {{ $value['name'] }}
                            </div>
                            <div class="col-md-10">
                                <div class="row">
                                    @foreach ($value['group'] as $group )
                                    <div class="col-md-3">
                                        <label><input type="checkbox" value="{{ $group['id'] }}" name="permission_id[]">{{ $group['name'] }}</label>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                       </div>
                       <hr>
                    @endforeach
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
