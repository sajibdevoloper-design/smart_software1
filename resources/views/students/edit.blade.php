@extends('layouts.app')

@section('title', 'Edit Student')
@section('page-title', 'Edit Student')

@section('content')

<div class="container-fluid">

    <form action="{{ route('students.update', $student->id) }}"
          method="POST"
          enctype="multipart/form-data">

        @csrf
        @method('PUT')

        <div class="row">

            {{-- ============================= --}}
            {{-- LEFT SIDE --}}
            {{-- ============================= --}}

            <div class="col-lg-8">

                {{-- Personal Information --}}
                <div class="card shadow-sm mb-4">

                    <div class="card-header">
                        <h5 class="mb-0">
                            <i class="bi bi-person me-2"></i>
                            Personal Information
                        </h5>
                    </div>

                    <div class="card-body">

                        <div class="row">

                            {{-- Student Name --}}
                            <div class="col-md-6 mb-3">

                                <label class="form-label">
                                    Student Name
                                    <span class="text-danger">*</span>
                                </label>

                                <input
                                    type="text"
                                    name="student_name"
                                    class="form-control @error('student_name') is-invalid @enderror"
                                    value="{{ old('student_name', $student->student_name) }}"
                                    placeholder="Enter student name"
                                    required
                                >

                                @error('student_name')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror

                            </div>


                            {{-- Student ID --}}
                            <div class="col-md-6 mb-3">

                                <label class="form-label">
                                    Student ID
                                    <span class="text-danger">*</span>
                                </label>

                                <input
                                    type="text"
                                    name="student_id"
                                    class="form-control @error('student_id') is-invalid @enderror"
                                    value="{{ old('student_id', $student->student_id) }}"
                                    placeholder="Enter student ID"
                                    required
                                >

                                @error('student_id')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror

                            </div>


                            {{-- Email --}}
                            <div class="col-md-6 mb-3">

                                <label class="form-label">
                                    Email
                                </label>

                                <input
                                    type="email"
                                    name="email"
                                    class="form-control @error('email') is-invalid @enderror"
                                    value="{{ old('email', $student->email) }}"
                                    placeholder="example@email.com"
                                >

                                @error('email')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror

                            </div>


                            {{-- Phone --}}
                            <div class="col-md-6 mb-3">

                                <label class="form-label">
                                    Phone
                                </label>

                                <input
                                    type="text"
                                    name="phone"
                                    class="form-control @error('phone') is-invalid @enderror"
                                    value="{{ old('phone', $student->phone) }}"
                                    placeholder="01XXXXXXXXX"
                                >

                                @error('phone')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror

                            </div>


                            {{-- Date of Birth --}}
                            <div class="col-md-6 mb-3">

                                <label class="form-label">
                                    Date of Birth
                                </label>

                                <input
                                    type="date"
                                    name="date_of_birth"
                                    class="form-control @error('date_of_birth') is-invalid @enderror"
                                    value="{{ old('date_of_birth', $student->date_of_birth) }}"
                                >

                                @error('date_of_birth')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror

                            </div>


                            {{-- Gender --}}
                            <div class="col-md-6 mb-3">

                                <label class="form-label">
                                    Gender
                                </label>

                                <select
                                    name="gender"
                                    class="form-select @error('gender') is-invalid @enderror"
                                >

                                    <option value="">
                                        Select Gender
                                    </option>

                                    <option
                                        value="Male"
                                        {{ old('gender', $student->gender) == 'Male' ? 'selected' : '' }}
                                    >
                                        Male
                                    </option>

                                    <option
                                        value="Female"
                                        {{ old('gender', $student->gender) == 'Female' ? 'selected' : '' }}
                                    >
                                        Female
                                    </option>

                                    <option
                                        value="Other"
                                        {{ old('gender', $student->gender) == 'Other' ? 'selected' : '' }}
                                    >
                                        Other
                                    </option>

                                </select>

                                @error('gender')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror

                            </div>


                            {{-- Blood Group --}}
                            <div class="col-md-6 mb-3">

                                <label class="form-label">
                                    Blood Group
                                </label>

                                <select
                                    name="blood_group"
                                    class="form-select @error('blood_group') is-invalid @enderror"
                                >

                                    <option value="">
                                        Select Blood Group
                                    </option>

                                    @foreach([
                                        'A+',
                                        'A-',
                                        'B+',
                                        'B-',
                                        'AB+',
                                        'AB-',
                                        'O+',
                                        'O-'
                                    ] as $blood)

                                        <option
                                            value="{{ $blood }}"
                                            {{ old('blood_group', $student->blood_group) == $blood ? 'selected' : '' }}
                                        >
                                            {{ $blood }}
                                        </option>

                                    @endforeach

                                </select>

                                @error('blood_group')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror

                            </div>

                        </div>

                    </div>

                </div>


                {{-- ============================= --}}
                {{-- Academic Information --}}
                {{-- ============================= --}}

                <div class="card shadow-sm mb-4">

                    <div class="card-header">
                        <h5 class="mb-0">
                            <i class="bi bi-mortarboard me-2"></i>
                            Academic Information
                        </h5>
                    </div>

                    <div class="card-body">

                        <div class="row">

                            {{-- Department --}}
                            <div class="col-md-6 mb-3">

                                <label class="form-label">
                                    Department
                                    <span class="text-danger">*</span>
                                </label>

                                <input
                                    type="text"
                                    name="department"
                                    class="form-control @error('department') is-invalid @enderror"
                                    value="{{ old('department', $student->department) }}"
                                    placeholder="Enter department"
                                    required
                                >

                                @error('department')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror

                            </div>


                            {{-- Admission Date --}}
                            <div class="col-md-6 mb-3">

                                <label class="form-label">
                                    Admission Date
                                </label>

                                <input
                                    type="date"
                                    name="admission_date"
                                    class="form-control @error('admission_date') is-invalid @enderror"
                                    value="{{ old('admission_date', $student->admission_date) }}"
                                >

                                @error('admission_date')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror

                            </div>


                            {{-- Status --}}
                            <div class="col-md-6 mb-3">

                                <label class="form-label">
                                    Status
                                </label>

                                <select
                                    name="status"
                                    class="form-select @error('status') is-invalid @enderror"
                                >

                                    <option
                                        value="Active"
                                        {{ old('status', $student->status) == 'Active' ? 'selected' : '' }}
                                    >
                                        Active
                                    </option>

                                    <option
                                        value="Inactive"
                                        {{ old('status', $student->status) == 'Inactive' ? 'selected' : '' }}
                                    >
                                        Inactive
                                    </option>

                                </select>

                                @error('status')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror

                            </div>

                        </div>

                    </div>

                </div>


                {{-- Parents Information --}}
                <div class="card shadow-sm mb-4">

                    <div class="card-header">
                        <h5 class="mb-0">
                            <i class="bi bi-people me-2"></i>
                            Parents Information
                        </h5>
                    </div>

                    <div class="card-body">

                        <div class="row">

                            <div class="col-md-6 mb-3">
                                <label class="form-label">Father's Name</label>
                                <input
                                    type="text"
                                    name="father_name"
                                    class="form-control @error('father_name') is-invalid @enderror"
                                    value="{{ old('father_name', $student->father_name) }}"
                                >
                                @error('father_name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6 mb-3">
                                <label class="form-label">Mother's Name</label>
                                <input
                                    type="text"
                                    name="mother_name"
                                    class="form-control @error('mother_name') is-invalid @enderror"
                                    value="{{ old('mother_name', $student->mother_name) }}"
                                >
                                @error('mother_name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6 mb-3">
                                <label class="form-label">Parent's Mobile Number</label>
                                <input
                                    type="text"
                                    name="mobile_number"
                                    class="form-control @error('mobile_number') is-invalid @enderror"
                                    value="{{ old('mobile_number', $student->mobile_number) }}"
                                >
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


                {{-- ============================= --}}
                {{-- Address Information --}}
                {{-- ============================= --}}

                <div class="card shadow-sm mb-4">

                    <div class="card-header">
                        <h5 class="mb-0">
                            <i class="bi bi-geo-alt me-2"></i>
                            Address Information
                        </h5>
                    </div>

                    <div class="card-body">

                        {{-- Address --}}
                        <div class="mb-3">

                            <label class="form-label">
                                Address
                            </label>

                            <textarea
                                name="address"
                                class="form-control @error('address') is-invalid @enderror"
                                rows="4"
                                placeholder="Enter full address"
                            >{{ old('address', $student->address) }}</textarea>

                            @error('address')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror

                        </div>


                        <div class="row">

                            {{-- City --}}
                            <div class="col-md-6 mb-3">

                                <label class="form-label">
                                    City
                                </label>

                                <input
                                    type="text"
                                    name="city"
                                    class="form-control @error('city') is-invalid @enderror"
                                    value="{{ old('city', $student->city) }}"
                                    placeholder="Enter city"
                                >

                                @error('city')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror

                            </div>


                            {{-- Country --}}
                            <div class="col-md-6 mb-3">

                                <label class="form-label">
                                    Country
                                </label>

                                <input
                                    type="text"
                                    name="country"
                                    class="form-control @error('country') is-invalid @enderror"
                                    value="{{ old('country', $student->country) }}"
                                    placeholder="Enter country"
                                >

                                @error('country')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror

                            </div>

                        </div>

                    </div>

                </div>

            </div>


            {{-- ============================= --}}
            {{-- RIGHT SIDE - IMAGE --}}
            {{-- ============================= --}}

            <div class="col-lg-4">

                <div class="card shadow-sm mb-4">

                    <div class="card-header">
                        <h5 class="mb-0">
                            <i class="bi bi-image me-2"></i>
                            Student Photo
                        </h5>
                    </div>

                    <div class="card-body text-center">

                        {{-- Existing Image --}}
                        <div class="mb-3">

                            @if($student->student_image)

                                <img
                                    id="imagePreview"
                                    src="{{ asset('storage/' . $student->student_image) }}"
                                    alt="{{ $student->student_name }}"
                                    width="180"
                                    height="180"
                                    class="rounded-circle shadow-sm"
                                    style="object-fit: cover;"
                                >

                            @else

                                <div
                                    id="imagePlaceholder"
                                    class="rounded-circle bg-light d-flex align-items-center justify-content-center mx-auto"
                                    style="width:180px; height:180px;"
                                >

                                    <i
                                        class="bi bi-person"
                                        style="font-size:80px; color:#999;"
                                    ></i>

                                </div>

                                <img
                                    id="imagePreview"
                                    class="rounded-circle shadow-sm d-none"
                                    width="180"
                                    height="180"
                                    style="object-fit: cover;"
                                >

                            @endif

                        </div>


                        {{-- Image Upload --}}
                        <div class="mb-3 text-start">

                            <label class="form-label">
                                Change Photo
                            </label>

                            <input
                                type="file"
                                name="student_image"
                                id="studentImage"
                                class="form-control @error('student_image') is-invalid @enderror"
                                accept="image/jpeg,image/png,image/jpg,image/webp"
                            >

                            @error('student_image')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror

                            <small class="text-muted">
                                JPG, JPEG, PNG, WEBP — Max 2MB
                            </small>

                        </div>

                    </div>

                </div>


                {{-- Student ID Card --}}
                <div class="card shadow-sm">

                    <div class="card-body text-center">

                        <h6 class="text-muted mb-2">
                            Student ID
                        </h6>

                        <h4 class="fw-bold">
                            {{ $student->student_id }}
                        </h4>

                        <span
                            class="badge
                            {{ $student->status == 'Active' ? 'bg-success' : 'bg-danger' }}"
                        >
                            {{ $student->status }}
                        </span>

                    </div>

                </div>

            </div>

        </div>


        {{-- ============================= --}}
        {{-- FORM BUTTONS --}}
        {{-- ============================= --}}

        <div class="d-flex gap-2 mt-3 mb-4">

            <a
                href="{{ route('students.show', $student->id) }}"
                class="btn btn-secondary"
            >
                <i class="bi bi-arrow-left me-1"></i>
                Cancel
            </a>

            <button
                type="submit"
                class="btn btn-primary"
            >
                <i class="bi bi-check-lg me-1"></i>
                Update Student
            </button>

        </div>

    </form>

</div>


{{-- ============================= --}}
{{-- IMAGE PREVIEW SCRIPT --}}
{{-- ============================= --}}

<script>

    document
    .getElementById('studentImage')
    .addEventListener('change', function(event) {

        const file = event.target.files[0];

        if (!file) {
            return;
        }

        const reader = new FileReader();

        reader.onload = function(e) {

            const preview =
                document.getElementById('imagePreview');

            preview.src = e.target.result;

            preview.classList.remove('d-none');


            const placeholder =
                document.getElementById('imagePlaceholder');

            if (placeholder) {

                placeholder.classList.add('d-none');

            }

        };

        reader.readAsDataURL(file);

    });

</script>

@endsection