@extends('admin.layouts.app')
@section('title')
    Result List
@endsection
@section('style')
    <style>
        /* custom css here */
    </style>
@endsection
@section('content')
    <main id="main" class="main">

        <div class="pagetitle">
            <h5 class="fw-bold">Result List Page</h5>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item "><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('admin.result.list') }}">Result List</a></li>
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
                                    <h5 class="card-title">All Result</h5>
                                </div>
                                <div class="col-lg-6">
                                   
                                        <a href="{{ route('admin.result.add') }}"  class="bn float-end mt-3">
                                            Add New
                                            Result 
                                        </a>
                                    
                                </div>
                            </div>
                            <!-- Table with stripped rows -->
                            <table class="table datatable">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Video</th>
                                        <th>Result</th>
                                        <th>Created At </th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if ($videos->isNotEmpty())
                                        @foreach ($videos as $video)
                                            @php
                                            $result = $video->results->first();
                                            @endphp 
                                            <tr> 
                                                <td>{{ $video->id }}</td>
                                                <td>
                                                   @if (!empty($video->url))
                                                    <video width="200" height="100" controls>
                                                        <source src="{{ asset('/results/'.$video->url ) }}" type="video/mp4">
                                                        Your browser does not support the video tag.
                                                    </video>
                                                   @endif
                                                </td>
                                                <td> 
                                                    {{ $result->result }}
                                                </td>
                                                <td>{{ $video->created_at->format('Y-m-d') }}</td>
                                                <td>
                                                    <a href="{{ route('admin.result.edit',$video->id) }}"
                                                        data-bs-toggle="tooltip" data-bs-placement="top"
                                                        data-bs-custom-class="custom-tooltip" data-bs-title="Edit Result">
                                                        <i class="bi bi-pencil-square text-success fw-bolder m-2" ></i>
                                                    </a>
                                                
                                                    <span data-bs-toggle="tooltip" data-bs-placement="top"
                                                        data-bs-custom-class="custom-tooltip"
                                                        data-bs-title="Delete Result">
                                                        <a href="" data-bs-toggle="modal"
                                                            data-bs-target="#deleteModal"
                                                            data-id="{{ $video->id }}">
                                                            <i class="bi bi-trash-fill text-danger fw-bolder m-2"></i>
                                                        </a>
                                                    </span>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @else
                                        <tr>
                                            <td colspan="5" class="text-danger">Records Not Found!</td>
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
                    Are you sure you want to delete this Result ?
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
        var userId = button.getAttribute('data-id')
        var form = document.getElementById('deleteForm')
        form.action = 'result/delete/' + userId  
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
