@extends('admin.layouts.app')
@section('title')
    User List
@endsection
@section('style')
    <style>
        /* custom css here */
    </style>
@endsection
@section('content')
    <main id="main" class="main">
        <div class="row">
            <div class="pagetitle col-md-8">
                <h5 class="fw-bold">User List Page</h5>
                <nav>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item "><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('admin.user.list') }}">User List</a></li>
                    </ol>
                </nav>
            </div>
            <div class="col-md-2 ">
                <button type="button" class="bn float-end" data-bs-toggle="modal" data-bs-target="#calculatorModal">
                    <i class="bi bi-calculator"></i> Calculator
                </button>
            </div>
            <div class="col-md-2">
                <button type="button" class="bn float-end" data-bs-toggle="modal" data-bs-target="#calendarModal">
                    <i class="bi bi-calendar-event"></i> Calendar
                </button>
            </div>
        </div>

        @include('admin.message')
        <section class="section">
            <div class="row">
                <div class="col-lg-12">

                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-7">
                                    <h5 class="card-title">All Users</h5>
                                </div>
                                <div class="col-lg-3">

                                    <a href="{{ route('admin.user.export') }}" class="bn float-end mt-3 ">
                                        <i class="bi bi-download "></i>&nbsp;&nbsp; Download Excel File
                                    </a>

                                </div>
                                <div class="col-lg-2">
                                    @if (!empty($PermissionAdd))
                                        <a href="{{ route('admin.user.add') }}" class="bn float-end mt-3">Add New
                                            User
                                        </a>
                                    @endif
                                </div>
                            </div>
                            <!-- Table with stripped rows -->
                            <table class="table datatable">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Name</th>
                                        <th>Email</th>
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
                                                <td>{{ $value->email }}</td>
                                                <td>{{ $value->role_name }}</td>
                                                <td>
                                                    <a href="{{ route('admin.user.status', $value->id) }}"
                                                        class="badge  text-bg-{{ $value->status ? 'success' : 'danger' }}">
                                                        {{ $value->status ? 'Active' : 'Deactive' }}
                                                    </a>
                                                </td>
                                                <td>{{ $value->created_at->format('Y-m-d') }}</td>
                                                <td>{{ $value->updated_at->format('Y-m-d') }}</td>
                                                <td>
                                                    @if (!empty($PermissionEdit))
                                                        <a href="{{ route('admin.user.edit', $value->id) }}"
                                                            data-bs-toggle="tooltip" data-bs-placement="top"
                                                            data-bs-custom-class="custom-tooltip" data-bs-title="Edit User">
                                                            <i class="bi bi-pencil-square text-success fw-bolder m-2"></i>
                                                        </a>
                                                    @endif
                                                    @if (!empty($PermissionDelete))
                                                        <span data-bs-toggle="tooltip" data-bs-placement="top"
                                                            data-bs-custom-class="custom-tooltip"
                                                            data-bs-title="Delete User">
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
    <!-- Delete Confirmation Modal -->
    <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header " style="border: none">
                    {{-- <h5 class="modal-title" id="deleteModalLabel">Delete Post</h5> --}}
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Are you sure you want to delete this User ?
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
    <!-- Delete Confirmation Modal -->
    <!-- calculatorModal -->
    <div class="modal fade" id="calculatorModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="calculator">
                    <div class="display">
                        <input type="text" placeholder="0" id="input" disabled />
                    </div>
                    <div class="buttons">
                        <!-- Full Erase -->
                        <input type="button" value="AC" id="clear" />
                        <!-- Erase Single Value -->
                        <input type="button" value="DEL" id="erase" />
                        <input type="button" value="/" class="input-button" />
                        <input type="button" value="*" class="input-button" />
                        <input type="button" value="7" class="input-button" />
                        <input type="button" value="8" class="input-button" />
                        <input type="button" value="9" class="input-button" />
                        <input type="button" value="-" class="input-button" />
                        <input type="button" value="6" class="input-button" />
                        <input type="button" value="5" class="input-button" />
                        <input type="button" value="4" class="input-button" />
                        <input type="button" value="+" class="input-button" />
                        <input type="button" value="1" class="input-button" />
                        <input type="button" value="2" class="input-button" />
                        <input type="button" value="3" class="input-button" />
                        <input type="button" value="=" id="equal" />
                        <input type="button" value="0" class="input-button" />
                        <input type="button" value="." class="input-button" />
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- calculatorModal -->
    <!-- calendarModal -->
    <div class="modal fade" id="calendarModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog ">
            <div class="modal-content">
                <div class="container">
                    <div class="calendar">
                        <div class="header">
                            <div class="month">July 2021</div>
                            <div class="btns">
                                <!-- today -->
                                <div class="btn today">
                                    <i class="bi bi-calendar-event fs-3"></i>
                                </div>
                                <!-- previous month -->
                                <div class="btn prev">
                                    <i class="bi bi-arrow-left"></i>
                                </div>
                                <!-- next month -->
                                <div class="btn next">
                                    <i class="bi bi-arrow-right"></i>

                                </div>
                            </div>
                        </div>
                        <div class="weekdays">
                            <div class="day">Sun</div>
                            <div class="day">Mon</div>
                            <div class="day">Tue</div>
                            <div class="day">Wed</div>
                            <div class="day">Thu</div>
                            <div class="day">Fri</div>
                            <div class="day">Sat</div>
                        </div>
                        <div class="days">
                            <!-- render days with js -->
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- calendarModal -->
@endsection
@section('script')
    <script>
        // delete User
        $('#deleteModal').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget)
            var videoId = button.data('id')
            var action = '{{ route('admin.user.delete', '') }}/' + videoId
            $('#deleteForm').attr('action', action)
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
