@extends('admin.layouts.app')
@section('title')
    Edit Game
@endsection
@section('style')
    <style>
        /* custom css here */
    </style>
@endsection
@section('content')
    <main id="main" class="main">
        <div class="pagetitle">
            <h5 class="fw-bold">Edit Game Page</h5>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('admin.game.list') }}">Game List</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('admin.game.edit', $game->id) }}">Game Edit</a></li>
                </ol>
            </nav>
        </div><!-- End Page Title -->
        <section class="section">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-6">
                                <h5 class="card-title">Edit Game</h5>
                            </div>
                            <div class="col-lg-6">
                                <a href="{{ route('admin.game.list') }}"  class="bn float-end mt-3">Back to Game
                                    List</a>
                            </div>
                        </div>
                        <form action="{{ route('admin.game.update', $game->id) }}" method="post"
                            enctype="multipart/form-data" class="row g-3">
                            @csrf
                            <div class="col-md-4">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" id="name" name="name" value="{{ $game->name }}"
                                    class="form-control " placeholder="Name">
                                @error('name')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-4">
                                <label for="slug" class="form-label">Slug</label>
                                <input type="text" class="form-control" name="slug" value="{{ $game->slug }}"
                                    id="slug" placeholder="Slug" readonly>
                                @error('slug')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-4">
                                <label for="status" class="form-label">Status</label>
                                <select class="form-select" name="status" id="status">
                                    <option selected disabled value="">--select--</option>
                                    <option {{ $game->status == 1 ? 'selected' : '' }} value="1">Active</option>
                                    <option {{ $game->status == 0 ? 'selected' : '' }} value="0">Block</option>
                                </select>
                                @error('status')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-4">
                                <label for="category" class="form-label">Category</label>
                                <select class="form-select" name="category_id" id="category">
                                    <option selected disabled value="">--select--</option>
                                    @if ($category->isNotEmpty())
                                        @foreach ($category as $value)
                                            <option {{ $game->category_id == $value->id ? 'selected' : '' }}
                                                value="{{ $value->id }}">{{ $value->name }}</option>
                                        @endforeach
                                    @endif
                                </select>
                                @error('category_id')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-4">
                                <label for="subcategory" class="form-label">Sub Category</label>
                                <select class="form-select" name="sub_category_id" id="subcategory">
                                    <option selected disabled value="">Select Subcategory</option>
                                    @if ($subcategory->isNotEmpty())
                                        @foreach ($subcategory as $value)
                                            <option {{ $game->sub_category_id == $value->id ? 'selected' : '' }}
                                                value="{{ $value->id }}">{{ $value->name }}</option>
                                        @endforeach
                                    @endif
                                </select>
                                @error('subcategory')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-4">
                                <label for="child_category" class="form-label">Child Category</label>
                                <select class="form-select" name="child_category_id" id="child-category">
                                    <option selected disabled value="">Select Child Category</option>
                                    @if ($childcategory->isNotEmpty())
                                        @foreach ($childcategory as $value)
                                            <option {{ $game->child_category_id == $value->id ? 'selected' : '' }}
                                                value="{{ $value->id }}">{{ $value->name }}</option>
                                        @endforeach
                                    @endif
                                </select>
                                @error('child_category')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-4">
                                {{-- <input type="hidden" name="game_id" value="{{ $game->id }}"> --}}
                                <label for="image" class="form-label">Image</label>
                                <input type="file" name="image" id="image" class="form-control">
                                @error('image')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                                @if ($gameImage->isNotEmpty())
                                    @foreach ($gameImage as $image)
                                        <div class="mt-3">
                                            <img src="{{ asset('images/' . $image->image) }}" alt="" width="300"
                                                height="200">
                                        </div>
                                    @endforeach
                                @endif
                            </div>
                            <div class="col-md-4">
                                <label for="video" class="form-label">Video</label>
                                <input type="file" name="video" id="video" class="form-control">
                                @error('video')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                                @if ($gameVideo->isNotEmpty())
                                    @foreach ($gameVideo as $video)
                                        <div class="mt-3">
                                            <video width="300" height="200" controls>
                                                <source src="{{ asset('videos/' . $video->video) }}" type="video/mp4">
                                                Your browser does not support the video tag.
                                            </video>
                                        </div>
                                    @endforeach
                                @endif
                            </div>
                            <div class="col-md-4">
                                <label for="video_round" class="form-label">Video Round</label>
                                <input type="text" id="round_id" name="round_id" class="form-control "
                                    placeholder="Video Round" value="{{ $video->round_id }}">
                                @error('round_id')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-12">
                                <label for="video_description" class="form-label">Video Description</label>
                                <textarea class="form-control" id="video_description" rows="3" name="video_description"
                                    placeholder="Video Description">{{ $video->video_description }}</textarea>
                                @error('video_description')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-12">
                                <label for="Game_description" class="form-label">Game Description</label>
                                <textarea class="form-control" id="game_descriptionGame_description" rows="3" name="game_description"
                                    placeholder="Game Description">{{ $game->game_description }}</textarea>
                                @error('game_description')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-12">
                                <button class="bn"  type="submit">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </main><!-- End #main -->
@endsection
@section('script')
    <script>
        // Slug 
        $("#name").change(function() {
            var element = $(this);
            $("button[type='submit']").prop('disabled', true);
            $.ajax({
                type: "get",
                url: "{{ route('getSulg') }}",
                data: {
                    title: element.val()
                },
                dataType: "json",
                success: function(response) {
                    $("button[type='submit']").prop('disabled', false);
                    if (response['status'] == true) {
                        $("#slug").val(response['slug']);
                    }
                }
            });

        });
        $(document).ready(function() {
            $('#category').on('change', function() {
                var categoryId = this.value;
                $('#subcategory').html('<option value="">Select Subcategory</option>');
                $('#child-category').html('<option value="">Select Child Category</option>');
                if (categoryId) {
                    $.ajax({
                        url: '{{ route('game.fetchSubCategory') }}',
                        type: 'POST',
                        data: {
                            _token: '{{ csrf_token() }}',
                            category_id: categoryId
                        },
                        success: function(data) {
                            $('#subcategory').prop('disabled', false);
                            $.each(data, function(index, subcategory) {
                                $('#subcategory').append('<option value="' + subcategory
                                    .id + '">' + subcategory.name + '</option>');
                            });
                        }
                    });
                } else {
                    $('#subcategory').prop('disabled', true);
                    $('#child-category').prop('disabled', true);
                }
            });

            $('#subcategory').on('change', function() {
                var subcategoryId = this.value;
                $('#child-category').html('<option value="">Select Child Category</option>');
                if (subcategoryId) {
                    $.ajax({
                        url: '{{ route('game.fetchChildCategory') }}',
                        type: 'POST',
                        data: {
                            _token: '{{ csrf_token() }}',
                            subcategory_id: subcategoryId
                        },
                        success: function(data) {
                            $('#child-category').prop('disabled', false);
                            $.each(data, function(index, childCategory) {
                                $('#child-category').append('<option value="' +
                                    childCategory.id + '">' + childCategory.name +
                                    '</option>');
                            });
                        }
                    });
                } else {
                    $('#child-category').prop('disabled', true);
                }
            });
        });
    </script>
@endsection
