@extends('admin.layouts.app')

@section('title')
    Add Video for Cricket Match
@endsection

@section('style')
    <style>
        /* Custom CSS here */
        .form-group {
            margin-bottom: 15px;
        }
        .video-list-item {
            border-bottom: 1px solid #ddd;
            padding: 10px 0;
        }
        .video-list-item:last-child {
            border-bottom: none;
        }
    </style>
@endsection

@section('content')
    <main id="main" class="main">

        <div class="pagetitle">
            <h5 class="fw-bold">Add Video for Match: {{ $match->team1 }} v/s {{ $match->team2 }}</h5>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('admin.cricket.matches.list') }}">Matches List</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('admin.cricket.matches.list', $match->id) }}">Match Videos</a></li>
                    <li class="breadcrumb-item active">Add Video</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-6">
                                <h5 class="card-title">Add New Video</h5>
                            </div>
                            <div class="col-lg-6">
                                <a href="{{ route('admin.cricket.matches.list', $match->id) }}" class="bn float-end mt-3">Back to Video List</a>
                            </div>
                        </div>
                        @include('admin.message')

                        <form action="{{ route('admin.cricket.matches.video.store', $match->id) }}" method="POST" enctype="multipart/form-data" class="row g-3">
                            @csrf

                            <div class="col-md-6">
                                <label for="team" class="form-label">Select Team</label>
                                <select name="team" id="team" class="form-select" required>
                                    <option value="" disabled selected>-- Select Team --</option>
                                    <option value="team1">{{$match->team1}}</option>
                                    <option value="team2">{{$match->team2}}</option>
                                </select>
                                @error('team')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6">
                                <label for="video" class="form-label">Upload Video</label>
                                <input type="file" name="video" id="video" class="form-control" required>
                                @error('video')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6">
                                <label for="result" class="form-label">Result</label>
                                <input type="text" name="result" id="result" class="form-control" placeholder="Enter result (optional)">
                                @error('result')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-12">
                                <button type="submit" class="bn">Upload Video</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Video List Card -->
            <div class="col-lg-12 mt-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Videos List</h5>

                        <!-- Team One Videos -->
                        <h6 class="card-subtitle mb-2 text-muted">{{$match->team1}}</h6>
                        @if($match->videos->where('team', 'team1')->count() > 0)
                            @foreach($match->videos->where('team', 'team1') as $video)
                                <div class="video-list-item">
                                    <p><strong>Result:</strong> {{ $video->result }}</p>
                                    <a href="{{ asset('storage/' . $video->video_path) }}" target="_blank">View Video</a>
                                </div>
                            @endforeach
                        @else
                            <p>No videos available for {{$match->team1}}.</p>
                        @endif

                        <!-- Team Two Videos -->
                        <h6 class="card-subtitle mb-2 text-muted">{{$match->team2}}</h6>
                        @if($match->videos->where('team', 'team2')->count() > 0)
                            @foreach($match->videos->where('team', 'team2') as $video)
                                <div class="video-list-item">
                                    <p><strong>Result:</strong> {{ $video->result }}</p>
                                    <a href="{{ asset('storage/' . $video->video_path) }}" target="_blank">View Video</a>
                                </div>
                            @endforeach
                        @else
                            <p>No videos available for {{$match->team2}}.</p>
                        @endif

                    </div>
                </div>
            </div>

        </section>

    </main><!-- End #main -->
@endsection

@section('script')
    <!-- Include any additional scripts if needed -->
@endsection
