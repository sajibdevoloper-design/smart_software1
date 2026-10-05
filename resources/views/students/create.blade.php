@extends('layouts.app')

@section('title', 'Add Student')
@section('page-title', 'Add Student')

@section('content')

<div class="container-fluid">

    <!-- Page Header -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h4 class="fw-bold mb-1">Add New Student</h4>
            <p class="text-muted mb-0">
                Create a new student record.
            </p>
        </div>

        <a href="{{ url('/students') }}" class="btn btn-outline-secondary">
            <i class="bi bi-arrow-left me-1"></i>
            Back to Students
        </a>
    </div>

    <form action="{{ route('students.store') }}" method="POST" enctype="multipart/form-data">

        @csrf

        <div class="row">

            <!-- Left Column -->
            <div class="col-lg-8">

                <!-- Personal Information -->
                <div class="card border-0 shadow-sm mb-4">

                    <div class="card-header bg-white py-3">
                        <h6 class="mb-0 fw-bold">
                            <i class="bi bi-person me-2 text-primary"></i>
                            Personal Information
                        </h6>
                    </div>

                    <div class="card-body">

                        <div class="row g-3">

                            <!-- Student Name -->
                            <div class="col-md-6">
                                <label class="form-label fw-semibold">
                                    Student Name
                                    <span class="text-danger">*</span>
                                </label>

                                <input
                                    type="text"
                                    name="student_name"
                                    class="form-control"
                                    placeholder="Enter student name"
                                    required
                                >
                            </div>

                            <!-- Student ID -->
                            <div class="col-md-6">
                                <label class="form-label fw-semibold">
                                    Student ID
                                    <span class="text-danger">*</span>
                                </label>

                                <input
                                    type="text"
                                    name="student_id"
                                    class="form-control"
                                    placeholder="e.g. STU-1001"
                                    required
                                >
                            </div>

                            <!-- Email -->
                            <div class="col-md-6">
                                <label class="form-label fw-semibold">
                                    Email Address
                                </label>

                                <input
                                    type="email"
                                    name="email"
                                    class="form-control"
                                    placeholder="student@example.com"
                                >
                            </div>

                            <!-- Phone -->
                            <div class="col-md-6">
                                <label class="form-label fw-semibold">
                                    Phone Number
                                </label>

                                <input
                                    type="text"
                                    name="phone"
                                    class="form-control"
                                    placeholder="+880 1XXXXXXXXX"
                                >
                            </div>

                            <!-- Date of Birth -->
                            <div class="col-md-4">
                                <label class="form-label fw-semibold">
                                    Date of Birth
                                </label>

                                <input
                                    type="date"
                                    name="date_of_birth"
                                    class="form-control"
                                >
                            </div>

                            <!-- Gender -->
                            <div class="col-md-4">
                                <label class="form-label fw-semibold">
                                    Gender
                                </label>

                                <select name="gender" class="form-select">
                                    <option value="">Select Gender</option>
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                    <option value="Other">Other</option>
                                </select>
                            </div>

                            <!-- Blood Group -->
                            <div class="col-md-4">
                                <label class="form-label fw-semibold">
                                    Blood Group
                                </label>

                                <select name="blood_group" class="form-select">
                                    <option value="">Select Blood Group</option>
                                    <option value="A+">A+</option>
                                    <option value="A-">A-</option>
                                    <option value="B+">B+</option>
                                    <option value="B-">B-</option>
                                    <option value="AB+">AB+</option>
                                    <option value="AB-">AB-</option>
                                    <option value="O+">O+</option>
                                    <option value="O-">O-</option>
                                </select>
                            </div>

                        </div>

                    </div>
                </div>


                <!-- Academic Information -->
                <div class="card border-0 shadow-sm mb-4">

                    <div class="card-header bg-white py-3">
                        <h6 class="mb-0 fw-bold">
                            <i class="bi bi-mortarboard me-2 text-primary"></i>
                            Academic Information
                        </h6>
                    </div>

                    <div class="card-body">

                        <div class="row g-3">

                            <!-- Department -->
                            <div class="col-md-6">
                                <label class="form-label fw-semibold">
                                    Department
                                    <span class="text-danger">*</span>
                                </label>

                                <select name="department" class="form-select" required>
                                    <option value="">Select Department</option>
                                    <option value="Computer Science">
                                        Computer Science
                                    </option>
                                    <option value="Business Administration">
                                        Business Administration
                                    </option>
                                    <option value="Electrical Engineering">
                                        Electrical Engineering
                                    </option>
                                    <option value="Civil Engineering">
                                        Civil Engineering
                                    </option>
                                    <option value="English">
                                        English
                                    </option>
                                </select>
                            </div>

                            <!-- Admission Date -->
                            <div class="col-md-6">
                                <label class="form-label fw-semibold">
                                    Admission Date
                                </label>

                                <input
                                    type="date"
                                    name="admission_date"
                                    class="form-control"
                                >
                            </div>

                            <!-- Status -->
                            <div class="col-md-6">
                                <label class="form-label fw-semibold">
                                    Status
                                </label>

                                <select name="status" class="form-select">
                                    <option value="Active">Active</option>
                                    <option value="Inactive">Inactive</option>
                                    <option value="Graduated">Graduated</option>
                                </select>
                            </div>

                        </div>

                    </div>
                </div>


                <!-- Address -->
                <div class="card border-0 shadow-sm mb-4">

                    <div class="card-header bg-white py-3">
                        <h6 class="mb-0 fw-bold">
                            <i class="bi bi-geo-alt me-2 text-primary"></i>
                            Address Information
                        </h6>
                    </div>

                    <div class="card-body">

                        <div class="row g-3">

                            <div class="col-12">
                                <label class="form-label fw-semibold">
                                    Address
                                </label>

                                <textarea
                                    name="address"
                                    rows="3"
                                    class="form-control"
                                    placeholder="Enter full address"
                                ></textarea>
                            </div>

                            <div class="col-md-6">
                                <label class="form-label fw-semibold">
                                    City
                                </label>

                                <input
                                    type="text"
                                    name="city"
                                    class="form-control"
                                    placeholder="Enter city"
                                >
                            </div>

                            <div class="col-md-6">
                                <label class="form-label fw-semibold">
                                    Country
                                </label>

                                <input
                                    type="text"
                                    name="country"
                                    class="form-control"
                                    value="Bangladesh"
                                >
                            </div>

                        </div>

                    </div>
                </div>

            </div>


            <!-- Right Column -->
            <div class="col-lg-4">
                                <!-- Personal Information -->
                <div class="card border-0 shadow-sm mb-4">

                    <div class="card-header bg-white py-3">
                        <h6 class="mb-0 fw-bold">
                            <i class="bi bi-person me-2 text-primary"></i>
                            Parents Information
                        </h6>
                    </div>
                    <div class="card-body ">
                        <div class="row g-3 ">
                            <div class="col-12">
                                <label class="form-label fw-semibold">
                                    Father's Name
                                </label>
                                <input
                                    type="text"
                                    name="father_name"
                                    class="form-control @error('father_name') is-invalid @enderror"
                                    value="{{ old('father_name') }}"
                                    placeholder="Enter father's name">
                                @error('father_name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-12">
                                <label class="form-label fw-semibold">
                                    Mother's Name
                                </label>
                                <input
                                    type="text"
                                    name="mother_name"
                                    class="form-control @error('mother_name') is-invalid @enderror"
                                    value="{{ old('mother_name') }}"
                                    placeholder="Enter mother's name">
                                @error('mother_name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-12">
                                <label class="form-label fw-semibold ">Mobile</label>
                                <input
                                    type="text"
                                    name="mobile_number"
                                    class="form-control @error('mobile_number') is-invalid @enderror"
                                    value="{{ old('mobile_number') }}"
                                    placeholder="Enter parent's phone number"
                                    required>
                                @error('mobile_number')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-12">
                                <small class="text-muted">At least one parent's name is required.</small>
                            </div>
                        </div>
                    </div>
                    </div>

                <!-- Student Photo -->
                <div class="card border-0 shadow-sm mb-4">

                    <div class="card-header bg-white py-3">
                        <h6 class="mb-0 fw-bold">
                            <i class="bi bi-image me-2 text-primary"></i>
                            Student Photo
                        </h6>
                    </div>

                    <div class="card-body text-center">

                        <div class="mb-3">
                            <img
                                id="imagePreview"
                                src="https://via.placeholder.com/180x180?text=Student"
                                class="rounded-circle border"
                                width="180"
                                height="180"
                                style="object-fit: cover;"
                                alt="Student Preview"
                            >
                        </div>

                        <label class="btn btn-outline-primary">
                            <i class="bi bi-upload me-1"></i>
                            Choose Photo

                            <input
                                type="file"
                                name="student_image"
                                id="studentImage"
                                class="d-none"
                                accept="image/*"
                            >
                        </label>

                        <small class="d-block text-muted mt-2">
                            JPG, JPEG or PNG. Max 2MB.
                        </small>

                    </div>
                </div>


                <!-- Form Actions -->
                <div class="card border-0 shadow-sm">

                    <div class="card-body">

                        <button
                            type="submit"
                            class="btn btn-primary w-100 mb-2"
                        >
                            <i class="bi bi-check-circle me-1"></i>
                            Save Student
                        </button>

                        <button
                            type="reset"
                            class="btn btn-light border w-100"
                        >
                            <i class="bi bi-arrow-counterclockwise me-1"></i>
                            Reset Form
                        </button>

                    </div>
                </div>

            </div>

        </div>

    </form>

</div>

@endsection


@push('scripts')

<script>
    document.getElementById('studentImage').addEventListener('change', function(event) {

        const file = event.target.files[0];

        if (file) {

            const reader = new FileReader();

            reader.onload = function(e) {
                document.getElementById('imagePreview').src = e.target.result;
            };

            reader.readAsDataURL(file);
        }
    });

</script>

@endpush