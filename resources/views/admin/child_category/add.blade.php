@extends('admin.layouts.app')
@section('title')Add Child Category  @endsection
@section('style')
    <style>
        /* custom css here */
    </style>
@endsection
@section('content')
    <main id="main" class="main">
        <div class="pagetitle">
            <h5 class="fw-bold">Add Child Category Page</h5>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('admin.childcategory.list') }}">Child Category List</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('admin.childcategory.add') }}">Child Category Add</a></li>
                </ol>
            </nav>
        </div><!-- End Page Title -->
        <section class="section">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-6">
                                <h5 class="card-title">Add Child Category</h5>
                            </div>
                            <div class="col-lg-6">
                                <a href="{{ route('admin.childcategory.list') }}"  class="bn float-end mt-3">Back to Child Category List</a>
                            </div>
                        </div>
                        <form action="{{ route('admin.childcategory.create') }}" method="post"   class="row g-3">
                            @csrf
                            <div class="col-md-6">
                                <label for="name" class="form-label" >Name:</label>
                                <input type="text" id="name" name="name" value="{{ old('name') }}" class="form-control " placeholder="Name" >
                                @error('name')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="slug" class="form-label">Slug</label>
                                <input type="text" class="form-control" name="slug" value="{{ old('slug') }}" id="slug" placeholder="Slug" readonly>
                                @error('slug')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="status" class="form-label">Status</label>
                                <select class="form-select" name="status" id="status" >
                                    <option selected disabled value="">--select--</option>
                                    <option value="1">Active</option>
                                    <option value="0">Block</option>
                                </select>
                                @error('status')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="status" class="form-label">Sub Category</label>
                                <select class="form-select" name="subcategory" id="subcategory" >
                                    <option selected disabled value="">--select--</option>
                                    @foreach ($subcategories as $value )
                                        <option {{ (old('subcategory') == $value->id ) ? 'selected' : '' }}  value="{{ $value->id }}">{{ $value->name }}</option>
                                    @endforeach
                                </select>
                                @error('subcategory')
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
    </script>
@endsection
