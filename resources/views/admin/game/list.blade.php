@extends('admin.layouts.app')
@section('title')
    Game List
@endsection
@section('style')
    <style>
        /* custom css here */
    </style>
@endsection
@section('content')
    <main id="main" class="main">

        <div class="pagetitle">
            <h5 class="fw-bold">Game List Page</h5>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item "><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('admin.game.list') }}">Game List</a></li>
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
                                    <h5 class="card-title">All Games</h5>
                                </div>
                                <div class="col-lg-6">
                                    @if (!empty($PermissionAdd))
                                        <a href="{{ route('admin.game.add') }}"  class="bn float-end mt-3">Add New
                                            Game 
                                        </a>
                                    @endif
                                   
                                </div>
                            </div>
                            <!-- Table with stripped rows -->
                            <table class="table datatable">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Image</th>
                                        <th>Video</th>
                                        <th>Name</th>
                                        <th>Slug</th>
                                        <th>Status</th>
                                        {{-- <th>Created At </th> --}}
                                        @if (!empty($PermissionEdit) || !empty($PermissionDelete))
                                        <th>Action</th>
                                        @endif
                                    </tr>
                                </thead>
                                <tbody>
                                    @if ($games->isNotEmpty())
                                        @foreach ($games as $game)
                                        @php
                                            $gameImage = $game->game_images->first();
                                        @endphp
                                        @php
                                               $gameVideo = $game->game_videos->first();
                                        @endphp
                                            <tr> 
                                                <td>{{ $game->id }}</td>
                                                <td>
                                                   @if (!empty($gameImage->image))
                                                   <img src="{{ asset('images/'.$gameImage->image) }}" alt="" width="100" height="100">
                                                   @endif
                                                </td>
                                                <td>
                                                   @if (!empty($gameVideo->video))
                                                    <video width="200" height="100" controls>
                                                        <source src="{{ asset('videos/'.$gameVideo->video) }}" type="video/mp4">
                                                        Your browser does not support the video tag.
                                                    </video>
                                                   @endif
                                                </td>
                                                <td>{{ $game->name }}</td>
                                                <td>{{ $game->slug }}</td>
                                                <td>
                                                    @if ($game->status == 1)
                                                        <a href=" " class="badge text-bg-success">Active</a>
                                                    @else
                                                        <a href=" " class="badge text-bg-primary">Block</a>
                                                    @endif
                                                </td>
                                                {{-- <td>{{ $value->created_at->format('Y-m-d') }}</td> --}}
                                                <td>
                                                    @if (!empty($PermissionEdit))
                                                    <a href="{{ route('admin.game.edit',$game->id) }}"
                                                        data-bs-toggle="tooltip" data-bs-placement="top"
                                                        data-bs-custom-class="custom-tooltip" data-bs-title="Edit Game">
                                                        <i class="bi bi-pencil-square text-success fw-bolder m-2" ></i></a>
                                                    @endif
                                                    @if (!empty($PermissionDelete))
                                                    <span data-bs-toggle="tooltip" data-bs-placement="top"
                                                    data-bs-custom-class="custom-tooltip"
                                                    data-bs-title="Delete Game">
                                                    <a href="" data-bs-toggle="modal"
                                                        data-bs-target="#deleteModal"
                                                        data-id="{{ $game->id }}">
                                                        <i class="bi bi-trash-fill text-danger fw-bolder m-2"></i>
                                                    </a>
                                                </span>                                                    @endif
                                                </td>
                                            </tr>
                                        @endforeach
                                    @else
                                        <tr>
                                            <td colspan="7" class="text-danger">Records Not Found!</td>
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
                    Are you sure you want to delete this Game ?
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
        form.action = 'game/delete/' + userId  
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
