@extends('admin.layouts.app')
@section('title')
    Add Result
@endsection
@section('style')
    <style>
        /* custom css here */
    </style>
@endsection
@section('content')
    <main id="main" class="main">
        <div class="pagetitle">
            <h5 class="fw-bold">Add Result Page</h5>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('admin.result.list') }}">Result List</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('admin.result.add') }}">Result Add</a></li>
                </ol>
            </nav>
        </div><!-- End Page Title -->
        <section class="section">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-6">
                                <h5 class="card-title">Add Result</h5>
                            </div>
                            <div class="col-lg-6">
                                <a href="{{ route('admin.result.list') }}"  class="bn  float-end mt-3">Back to Result
                                    List
                                </a>
                            </div>
                        </div>
                        <form action="{{ route('admin.result.create') }}" method="post" enctype="multipart/form-data"  class="row g-3">
                            @csrf
                            <div class="col-md-6">
                                <label for="video" class="form-label">Video</label>
                                <input type="file" name="video" id="video" class="form-control" >
                                @error('video')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="result" class="form-label">Result</label>
                                <input type="text" id="result" name="result" value="{{ old('result') }}"
                                    class="form-control " placeholder="Result">
                                @error('result')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-12">
                                <button class="bn"  type="submit">Create</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </main><!-- End #main -->
@endsection
@section('script')
   
@endsection
