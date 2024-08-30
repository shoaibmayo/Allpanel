@extends('admin.layouts.app')
@section('title')
    Match List
@endsection
@section('style')
    <style>
        /* custom css here */
    </style>
@endsection
@section('content')
    <main id="main" class="main">

        <div class="pagetitle">
            <h5 class="fw-bold">Cricket Matches List Page</h5>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item "><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('admin.cricket.matches.list') }}">Matches List</a></li>
                </ol>
            </nav>
        </div><!-- End Page Title -->
        @include('admin.message')
        <section class="section mb-5">
            <div class="row">
                <div class="col-lg-12">

                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <h5 class="card-title">All Matches</h5>
                                </div>
                                <div class="col-lg-6">
                                    @if (!empty($PermissionAdd))
                                    <a href="{{ route('admin.cricket_add.matches.add') }}"  class="bn float-end mt-3">
                                        Add New Match 
                                    </a>
                                    @endif
                                </div>
                            </div>
                            <!-- Table with stripped rows -->
                            <table class="table datatable">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>TeamA</th>
                                        <th>TeamB</th>
                                        <th>Status</th>
                                        <th>Add Video</th>
                                        <th>Created At </th>
                                        <th>Updeted</th>
                                        @if (!empty($PermissionEdit) || !empty($PermissionDelete))
                                        <th>Action</th>
                                        @endif
                                    </tr>
                                </thead>
                                <tbody>
                                    @if ($cricketmatches->isNotEmpty())
                                        @foreach ($cricketmatches as $value)
                                            <tr>
                                                <td>{{ $value->id }}</td>
                                                <td>{{ $value->team1 }}</td>
                                                <td>{{ $value->team2 }}</td>
                                                <td>
                                                    @if ($value->status == 'active')
                                                        <a href=" " class="badge text-bg-success">Active</a>
                                                    @else
                                                        <a href=" " class="badge text-bg-primary">Block</a>
                                                    @endif
                                                </td>
                                                <td>
                                                <a href="{{ route('admin.cricket.matches.video.list',$value->id) }}">
                                                        <button class="btn btn-sm btn-primary">Add</button></i></a>
                                                </td>
                                                <td>{{ $value->created_at->format('F j, Y ') }}</td>
                                                <td>{{ $value->updated_at->format('F j, Y ') }}</td>
                                                <td>
                                                    @if (!empty($PermissionEdit))
                                                    <a href="{{ route('admin.cricket.matches.edit',$value->id) }}"
                                                        data-bs-toggle="tooltip" data-bs-placement="top"
                                                        data-bs-custom-class="custom-tooltip" data-bs-title="Edit Match">
                                                        <i class="bi bi-pencil-square text-success fw-bolder m-2" ></i></a>
                                                    @endif
                                                    @if (!empty($PermissionDelete))
                                                    <span data-bs-toggle="tooltip" data-bs-placement="top"
                                                            data-bs-custom-class="custom-tooltip"
                                                            data-bs-title="Delete Match">
                                                            <a href="" data-bs-toggle="modal"
                                                                data-bs-target="#deleteModal"
                                                                data-id="{{ $value->id }}">
                                                                <i class="bi bi-trash-fill text-danger fw-bolder m-2"></i>
                                                            </a>
                                                        </span>
                                                    @endif
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
     <!-- Delete Modal -->
     <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header " style="border: none">
                    {{-- <h5 class="modal-title" id="deleteModalLabel">Delete Post</h5> --}}
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Are you sure you want to delete this Match ?
                </div>
                <div class="modal-footer " style="border: none">
                    <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Cancel</button>
                    <form id="deleteForm" method="POST" action="">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
<script>
    var deleteModal = document.getElementById('deleteModal')
    deleteModal.addEventListener('show.bs.modal', function (event) {
        var button = event.relatedTarget
        var match_id = button.getAttribute('data-id')
        var form = document.getElementById('deleteForm')
        form.action = 'delete/' + match_id
    });
     // tooltip code here
     $(function() {
       var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
       var tooltipList = tooltipTriggerList.map(function(tooltipTriggerEl) {
           return new bootstrap.Tooltip(tooltipTriggerEl)
       })
   });
</script>
@endsection
