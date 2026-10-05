@extends('layouts.app')

@section('title', 'Students')

@section('content')

<div class="container-fluid py-4">

    {{-- ============================= --}}
    {{-- Success Message --}}
    {{-- ============================= --}}

    @if(session('success'))

        <div class="alert alert-success alert-dismissible fade show" role="alert">

            <i class="bi bi-check-circle me-2"></i>

            {{ session('success') }}

            <button
                type="button"
                class="btn-close"
                data-bs-dismiss="alert">
            </button>

        </div>

    @endif


    {{-- ============================= --}}
    {{-- Page Header --}}
    {{-- ============================= --}}

    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>

            <h3 class="fw-bold mb-1">
                Student Management
            </h3>

            <p class="text-muted mb-0">
                Manage all student information from here.
            </p>

        </div>


        <a
            href="{{ route('students.create') }}"
            class="btn btn-primary"
        >

            <i class="bi bi-person-plus-fill me-1"></i>

            Add New Student

        </a>

    </div>


    {{-- ============================= --}}
    {{-- Statistics --}}
    {{-- ============================= --}}

    <div class="row g-3 mb-4">

        {{-- Total --}}
        <div class="col-md-3">

            <div class="card border-0 shadow-sm">

                <div class="card-body">

                    <div class="d-flex justify-content-between">

                        <div>

                            <p class="text-muted mb-1">
                                Total Students
                            </p>

                            <h3 class="fw-bold mb-0">
                                {{ $totalStudents }}
                            </h3>

                        </div>

                        <div class="text-primary fs-1">

                            <i class="bi bi-people-fill"></i>

                        </div>

                    </div>

                </div>

            </div>

        </div>


        {{-- Active --}}
        <div class="col-md-3">

            <div class="card border-0 shadow-sm">

                <div class="card-body">

                    <div class="d-flex justify-content-between">

                        <div>

                            <p class="text-muted mb-1">
                                Active
                            </p>

                            <h3 class="fw-bold mb-0 text-success">
                                {{ $activeStudents }}
                            </h3>

                        </div>

                        <div class="text-success fs-1">

                            <i class="bi bi-person-check-fill"></i>

                        </div>

                    </div>

                </div>

            </div>

        </div>


        {{-- Inactive --}}
        <div class="col-md-3">

            <div class="card border-0 shadow-sm">

                <div class="card-body">

                    <div class="d-flex justify-content-between">

                        <div>

                            <p class="text-muted mb-1">
                                Inactive
                            </p>

                            <h3 class="fw-bold mb-0 text-warning">
                                {{ $inactiveStudents }}
                            </h3>

                        </div>

                        <div class="text-warning fs-1">

                            <i class="bi bi-person-dash-fill"></i>

                        </div>

                    </div>

                </div>

            </div>

        </div>


        {{-- Graduated --}}
        <div class="col-md-3">

            <div class="card border-0 shadow-sm">

                <div class="card-body">

                    <div class="d-flex justify-content-between">

                        <div>

                            <p class="text-muted mb-1">
                                Graduated
                            </p>

                            <h3 class="fw-bold mb-0 text-info">
                                {{ $graduatedStudents }}
                            </h3>

                        </div>

                        <div class="text-info fs-1">

                            <i class="bi bi-mortarboard-fill"></i>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>


    {{-- ============================= --}}
    {{-- Student Table Card --}}
    {{-- ============================= --}}

    <div class="card border-0 shadow-sm">

        {{-- Card Header --}}
        <div class="card-header bg-white py-3">

            <div class="row align-items-center">

                <div class="col-md-6">

                    <h5 class="fw-bold mb-0">
                        Student List
                    </h5>

                </div>


                <div class="col-md-6">

                    <div class="d-flex justify-content-end gap-2">

                        {{-- Search --}}
                        <div
                            class="input-group"
                            style="max-width: 280px;"
                        >

                            <span class="input-group-text">

                                <i class="bi bi-search"></i>

                            </span>

                            <input
                                type="text"
                                id="studentSearch"
                                class="form-control"
                                placeholder="Search student..."
                            >

                        </div>


                        {{-- Status Filter --}}
                        <select
                            id="statusFilter"
                            class="form-select"
                            style="max-width: 150px;"
                        >

                            <option value="">
                                All Status
                            </option>

                            <option value="Active">
                                Active
                            </option>

                            <option value="Inactive">
                                Inactive
                            </option>

                            <option value="Graduated">
                                Graduated
                            </option>

                        </select>

                    </div>

                </div>

            </div>

        </div>


        {{-- ============================= --}}
        {{-- Table --}}
        {{-- ============================= --}}

        <div class="card-body p-0">

            <div class="table-responsive">

                <table
                    class="table table-hover align-middle mb-0"
                    id="studentTable"
                >

                    <thead class="table-light">

                        <tr>

                            <th class="px-4">
                                #
                            </th>

                            <th>
                                Student
                            </th>

                            <th>
                                Student ID
                            </th>

                            <th>
                                Contact
                            </th>

                            <th>
                                Department
                            </th>

                            <th>
                                Status
                            </th>

                            <th class="text-center">
                                Action
                            </th>

                        </tr>

                    </thead>


                    <tbody>

                        @forelse($students as $student)

                            <tr>

                                {{-- Serial --}}
                                <td class="px-4">

                                    {{ $students->firstItem() + $loop->index }}

                                </td>


                                {{-- Student --}}
                                <td>

                                    <div class="d-flex align-items-center">

                                        {{-- Image --}}
                                        @if($student->student_image)

                                            <img
                                                src="{{ asset('storage/' . $student->student_image) }}"
                                                alt="{{ $student->student_name }}"
                                                width="45"
                                                height="45"
                                                class="rounded-circle me-2"
                                                style="object-fit: cover;"
                                            >

                                        @else

                                            <div
                                                class="rounded-circle bg-light d-flex align-items-center justify-content-center me-2"
                                                style="width:45px; height:45px;"
                                            >

                                                <i
                                                    class="bi bi-person text-secondary"
                                                    style="font-size:22px;"
                                                ></i>

                                            </div>

                                        @endif


                                        <div>

                                            <div class="fw-semibold">

                                                {{ $student->student_name }}

                                            </div>

                                            <small class="text-muted">

                                                {{ $student->email ?? 'No email' }}

                                            </small>

                                        </div>

                                    </div>

                                </td>


                                {{-- Student ID --}}
                                <td>

                                    <span class="fw-semibold">

                                        {{ $student->student_id }}

                                    </span>

                                </td>


                                {{-- Contact --}}
                                <td>

                                    <div>

                                        {{ $student->phone ?? 'N/A' }}

                                    </div>

                                    <small class="text-muted">

                                        {{ $student->email ?? '' }}

                                    </small>

                                </td>


                                {{-- Department --}}
                                <td>

                                    {{ $student->department ?? 'N/A' }}

                                </td>


                                {{-- Status --}}
                                <td>

                                    @if($student->status === 'Active')

                                        <span class="badge bg-success">
                                            Active
                                        </span>

                                    @elseif($student->status === 'Inactive')

                                        <span class="badge bg-warning text-dark">
                                            Inactive
                                        </span>

                                    @elseif($student->status === 'Graduated')

                                        <span class="badge bg-info">
                                            Graduated
                                        </span>

                                    @else

                                        <span class="badge bg-secondary">
                                            {{ $student->status }}
                                        </span>

                                    @endif

                                </td>


                                {{-- Action --}}
                                <td class="text-center">

                                    <div class="d-flex justify-content-center gap-1">

                                        {{-- View --}}
                                        <a
                                            href="{{ route('students.show', $student->id) }}"
                                            class="btn btn-sm btn-info"
                                            title="View Student"
                                        >

                                            <i class="bi bi-eye"></i>

                                        </a>


                                        {{-- Edit --}}
                                        <a
                                            href="{{ route('students.edit', $student->id) }}"
                                            class="btn btn-sm btn-warning"
                                            title="Edit Student"
                                        >

                                            <i class="bi bi-pencil"></i>

                                        </a>


                                        {{-- Delete --}}
                                        <button
                                            type="button"
                                            class="btn btn-sm btn-danger"
                                            title="Delete Student"
                                            onclick="deleteStudent(
                                                {{ $student->id }},
                                                '{{ addslashes($student->student_name) }}'
                                            )"
                                        >

                                            <i class="bi bi-trash"></i>

                                        </button>

                                    </div>

                                </td>

                            </tr>


                        @empty

                            <tr>

                                <td
                                    colspan="7"
                                    class="text-center py-5"
                                >

                                    <div class="text-muted">

                                        <i
                                            class="bi bi-people"
                                            style="font-size:50px;"
                                        ></i>

                                        <h5 class="mt-3">
                                            No Students Found
                                        </h5>

                                        <p class="mb-0">
                                            There are no student records available.
                                        </p>

                                    </div>

                                </td>

                            </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>

        </div>


        {{-- ============================= --}}
        {{-- Pagination --}}
        {{-- ============================= --}}

        @if($students->count() > 0)

            <div class="card-footer bg-white">

                <div class="d-flex justify-content-between align-items-center flex-wrap gap-2">

                    {{-- Showing Information --}}
                    <small class="text-muted">

                        Showing
                        <strong>{{ $students->firstItem() }}</strong>
                        to
                        <strong>{{ $students->lastItem() }}</strong>
                        of
                        <strong>{{ $students->total() }}</strong>
                        students

                    </small>


                    {{-- Laravel Pagination --}}
                    <div>

                        {{ $students->links() }}

                    </div>

                </div>

            </div>

        @endif

    </div>

</div>


{{-- ============================= --}}
{{-- Delete Confirmation Modal --}}
{{-- ============================= --}}

<div
    class="modal fade"
    id="deleteModal"
    tabindex="-1"
    aria-hidden="true"
>

    <div class="modal-dialog modal-dialog-centered">

        <div class="modal-content">

            {{-- Modal Header --}}
            <div class="modal-header">

                <h5 class="modal-title">

                    <i class="bi bi-trash text-danger me-2"></i>

                    Confirm Delete

                </h5>

                <button
                    type="button"
                    class="btn-close"
                    data-bs-dismiss="modal"
                ></button>

            </div>


            {{-- Modal Body --}}
            <div class="modal-body">

                <div class="text-center">

                    <i
                        class="bi bi-exclamation-triangle-fill text-danger"
                        style="font-size:50px;"
                    ></i>

                    <h5 class="mt-3">
                        Are you sure?
                    </h5>

                    <p class="text-muted mb-1">
                        You are about to delete:
                    </p>

                    <h6
                        id="deleteStudentName"
                        class="fw-bold"
                    ></h6>

                    <p class="text-danger mt-3 mb-0">

                        This action cannot be undone.

                    </p>

                </div>

            </div>


            {{-- Modal Footer --}}
            <div class="modal-footer">

                <button
                    type="button"
                    class="btn btn-secondary"
                    data-bs-dismiss="modal"
                >

                    Cancel

                </button>


                {{-- Delete Form --}}
                <form
                    id="deleteStudentForm"
                    method="POST"
                    style="display:inline;"
                >

                    @csrf

                    @method('DELETE')

                    <button
                        type="submit"
                        class="btn btn-danger"
                    >

                        <i class="bi bi-trash me-1"></i>

                        Delete

                    </button>

                </form>

            </div>

        </div>

    </div>

</div>


{{-- ============================= --}}
{{-- JavaScript --}}
{{-- ============================= --}}

<script>

document.addEventListener('DOMContentLoaded', function () {


    // ========================================
    // Search Student
    // ========================================

    const searchInput =
        document.getElementById('studentSearch');

    const statusFilter =
        document.getElementById('statusFilter');

    const table =
        document.getElementById('studentTable');


    function filterStudents() {

        const searchValue =
            searchInput.value.toLowerCase().trim();

        const statusValue =
            statusFilter.value.toLowerCase();

        const rows =
            table.querySelectorAll('tbody tr');


        rows.forEach(function (row) {

            // Ignore empty state row
            if (row.querySelector('td[colspan="7"]')) {
                return;
            }


            const rowText =
                row.innerText.toLowerCase();


            let matchesSearch =
                rowText.includes(searchValue);


            let matchesStatus = true;


            if (statusValue !== '') {

                matchesStatus =
                    rowText.includes(statusValue);

            }


            if (matchesSearch && matchesStatus) {

                row.style.display = '';

            } else {

                row.style.display = 'none';

            }

        });

    }


    // Search
    searchInput.addEventListener(
        'keyup',
        filterStudents
    );


    // Status Filter
    statusFilter.addEventListener(
        'change',
        filterStudents
    );

});


// ========================================
// Delete Student
// ========================================

function deleteStudent(id, studentName) {

    // Student name
    document.getElementById(
        'deleteStudentName'
    ).innerText = studentName;


    // Delete form action
    document.getElementById(
        'deleteStudentForm'
    ).action = "{{ url('/students') }}/" + id;


    // Show modal
    const modal =
        new bootstrap.Modal(
            document.getElementById('deleteModal')
        );


    modal.show();

}

</script>

@endsection