@extends('admin.layouts.app')
@section('title')
    Role List
@endsection
@section('style')
    <style>
        /* custom css here */
    </style>
@endsection
@section('content')
    <main id="main" class="main">

        <div class="pagetitle">
            <h5 class="fw-bold">Role List Page</h5>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item "><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('admin.role.list') }}">Role List</a></li>
                </ol>
            </nav>
        </div><!-- End Page Title -->
        @include('admin.message')
        <section class="section">
            <div class="row">
                <div class="col-lg-12">

                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <h5 class="card-title">All Roles</h5>
                                </div>
                                
                                <div class="col-lg-6">
                                    @if (!empty($PermissionAdd))
                                        <a href="{{ route('admin.role.add') }}"  class="bn float-end mt-3">
                                            Add New Role 
                                        </a>
                                    @endif
                                </div>
                            </div>
                            <!-- Table with stripped rows -->
                            <table class="table datatable">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Role</th>
                                        <th>Status</th>
                                        <th>Created At </th>
                                        <th>Updeted</th>
                                        @if (!empty($PermissionEdit) || !empty($PermissionDelete))
                                        <th>Action</th>
                                        @endif
                                    </tr>
                                </thead>
                                <tbody>
                                    @if ($getRecord->isNotEmpty())
                                        @foreach ($getRecord as $value)
                                            <tr>
                                                <td>{{ $value->id }}</td>
                                                <td>{{ $value->name }}</td>
                                                <td>
                                                    @if ($value->status == 1)
                                                        <a href=" " class="badge text-bg-success">Active</a>
                                                    @else
                                                        <a href=" " class="badge text-bg-primary">Block</a>
                                                    @endif
                                                </td>
                                                <td>{{ $value->created_at->format('Y-m-d') }}</td>
                                                <td>{{ $value->updated_at->format('Y-m-d') }}</td>
                                                <td>
                                                    @if (!empty($PermissionEdit))
                                                    <a href="{{ route('admin.role.edit',$value->id) }}"
                                                        data-bs-toggle="tooltip" data-bs-placement="top"
                                                            data-bs-custom-class="custom-tooltip" data-bs-title="Edit Role">
                                                    <i class="bi bi-pencil-square text-success fw-bolder m-2" ></i></a>
                                                    @endif
                                                    {{-- @if (!empty($PermissionDelete))
                                                    <a href="{{ route('admin.role.delete',$value->id) }}"><i class="bi bi-trash-fill text-danger fw-bolder"></i></a>
                                                    @endif --}}
                                                   
                                                </td>
                                            </tr>
                                        @endforeach
                                    @else
                                        <tr>
                                            <td colspan="6" class="text-danger">Records Not Found!</td>
                                        </tr>
                                    @endif

                                </tbody>
                            </table>
                            <!-- End Table with stripped rows -->

                        </div>
                    </div>

                </div>
            </div>
        </section>

    </main><!-- End #main -->
@endsection
@section('script')
    <script>
         // tooltip code here
         $(function() {
            var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
            var tooltipList = tooltipTriggerList.map(function(tooltipTriggerEl) {
                return new bootstrap.Tooltip(tooltipTriggerEl)
            })
        });
    </script>
@endsection
