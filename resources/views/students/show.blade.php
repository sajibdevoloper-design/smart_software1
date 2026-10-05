@extends('layouts.app')

@section('title', 'Student Details')
@section('page-title', 'Student Details')

@section('content')

<div class="container-fluid">

    <div class="row">

        <!-- Student Profile -->
        <div class="col-md-4">

            <div class="card shadow-sm">

                <div class="card-body text-center">

                    <!-- Student Image -->
                    @if($student->student_image)

                        <img
                            src="{{ asset('storage/' . $student->student_image) }}"
                            alt="{{ $student->student_name }}"
                            class="rounded-circle mb-3"
                            width="150"
                            height="150"
                            style="object-fit: cover;"
                        >

                    @else

                        <div
                            class="rounded-circle bg-light d-flex align-items-center justify-content-center mx-auto mb-3"
                            style="width:150px; height:150px;"
                        >
                            <i class="bi bi-person"
                               style="font-size:70px; color:#999;">
                            </i>
                        </div>

                    @endif


                    <h4 class="mb-1">
                        {{ $student->student_name }}
                    </h4>

                    <p class="text-muted mb-2">
                        {{ $student->student_id }}
                    </p>

                    <span class="badge
                        {{ $student->status === 'Active' ? 'bg-success' : 'bg-danger' }}">
                        {{ $student->status }}
                    </span>

                </div>

            </div>

        </div>


        <!-- Student Information -->
        <div class="col-md-8">

            <div class="card shadow-sm">

                <div class="card-header">
                    <h5 class="mb-0">
                        Student Information
                    </h5>
                </div>

                <div class="card-body">

                    <div class="row">

                        <div class="col-md-6 mb-3">
                            <label class="text-muted">
                                Student Name
                            </label>

                            <div class="fw-semibold">
                                {{ $student->student_name }}
                            </div>
                        </div>


                        <div class="col-md-6 mb-3">
                            <label class="text-muted">
                                Student ID
                            </label>

                            <div class="fw-semibold">
                                {{ $student->student_id }}
                            </div>
                        </div>


                        <div class="col-md-6 mb-3">
                            <label class="text-muted">
                                Email
                            </label>

                            <div class="fw-semibold">
                                {{ $student->email ?? 'N/A' }}
                            </div>
                        </div>


                        <div class="col-md-6 mb-3">
                            <label class="text-muted">
                                Phone
                            </label>

                            <div class="fw-semibold">
                                {{ $student->phone ?? 'N/A' }}
                            </div>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label class="text-muted">Father's Name</label>
                            <div class="fw-semibold">
                                {{ $student->father_name ?? 'N/A' }}
                            </div>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label class="text-muted">Mother's Name</label>
                            <div class="fw-semibold">
                                {{ $student->mother_name ?? 'N/A' }}
                            </div>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label class="text-muted">Parent's Mobile Number</label>
                            <div class="fw-semibold">
                                {{ $student->mobile_number ?? 'N/A' }}
                            </div>
                        </div>


                        <div class="col-md-6 mb-3">
                            <label class="text-muted">
                                Department
                            </label>

                            <div class="fw-semibold">
                                {{ $student->department ?? 'N/A' }}
                            </div>
                        </div>


                        <div class="col-md-6 mb-3">
                            <label class="text-muted">
                                Gender
                            </label>

                            <div class="fw-semibold">
                                {{ $student->gender ?? 'N/A' }}
                            </div>
                        </div>


                        <div class="col-md-6 mb-3">
                            <label class="text-muted">
                                Blood Group
                            </label>

                            <div class="fw-semibold">
                                {{ $student->blood_group ?? 'N/A' }}
                            </div>
                        </div>


                        <div class="col-md-6 mb-3">
                            <label class="text-muted">
                                Date of Birth
                            </label>

                            <div class="fw-semibold">
                                {{ $student->date_of_birth ?? 'N/A' }}
                            </div>
                        </div>


                        <div class="col-md-6 mb-3">
                            <label class="text-muted">
                                Admission Date
                            </label>

                            <div class="fw-semibold">
                                {{ $student->admission_date ?? 'N/A' }}
                            </div>
                        </div>


                        <div class="col-md-6 mb-3">
                            <label class="text-muted">
                                City
                            </label>

                            <div class="fw-semibold">
                                {{ $student->city ?? 'N/A' }}
                            </div>
                        </div>


                        <div class="col-md-6 mb-3">
                            <label class="text-muted">
                                Country
                            </label>

                            <div class="fw-semibold">
                                {{ $student->country ?? 'N/A' }}
                            </div>
                        </div>


                        <div class="col-md-12 mb-3">
                            <label class="text-muted">
                                Address
                            </label>

                            <div class="fw-semibold">
                                {{ $student->address ?? 'N/A' }}
                            </div>
                        </div>

                    </div>

                </div>

            </div>


            <!-- Buttons -->
            <div class="mt-3">

                <a href="{{ route('students.index') }}"
                   class="btn btn-secondary">

                    <i class="bi bi-arrow-left"></i>
                    Back

                </a>


                <a href="{{ route('students.edit', $student->id) }}"
                   class="btn btn-warning">

                    <i class="bi bi-pencil"></i>
                    Edit

                </a>

            </div>

        </div>

    </div>

</div>

@endsection