<?php

namespace App\Http\Controllers;
use App\Models\student;
use Illuminate\Http\Request;

class studentController extends Controller
{
public function store(Request $request)
{
    $validatedData = $request->validate([
        'student_name'   => 'required|string|max:255',
        'student_id'     => 'required|string|max:255|unique:students,student_id',
        'email'          => 'required|email|max:255|unique:students,email',
        'phone'          => 'nullable|string|max:20',
        'date_of_birth'  => 'nullable|date',
        'gender'         => 'nullable|string|max:50',
        'blood_group'    => 'nullable|string|max:20',
        'department'     => 'required|string|max:255',
        'admission_date' => 'nullable|date',
        'student_image'  => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        'status'         => 'required|string|max:50',
        'address'        => 'nullable|string|max:255',
        'city'           => 'nullable|string|max:100',
        'country'        => 'nullable|string|max:100',
        'mother_name'    => 'nullable|required_without:father_name|string|max:255',
        'father_name'    => 'nullable|required_without:mother_name|string|max:255',
        'mobile_number'  => 'required|string|max:20',
    ]);

    if ($request->hasFile('student_image')) {
        $validatedData['student_image'] =
            $request->file('student_image')->store('students', 'public');
    }
    

    Student::create($validatedData);

    return redirect()
        ->route('students.index')
        ->with('success', 'Student created successfully.');
}

public function index()
{
    $students = Student::latest()->paginate(10);

    $totalStudents = Student::count();

    $activeStudents = Student::where('status', 'Active')->count();

    $inactiveStudents = Student::where('status', 'Inactive')->count();

    $graduatedStudents = Student::where('status', 'Graduated')->count();

    return view('students.index', compact(
        'students',
        'totalStudents',
        'activeStudents',
        'inactiveStudents',
        'graduatedStudents'
    ));
}
    
    public function show($id)
{
    $student = Student::findOrFail($id);

    return view('students.show', compact('student'));
}

public function edit($id)
{
    $student = Student::findOrFail($id);

    return view('students.edit', compact('student'));
}

public function update(Request $request, $id)
{
    $student = Student::findOrFail($id);

    $validatedData = $request->validate([
        'student_name'  => 'required|string|max:255',
        'student_id'    => 'required|string|max:255|unique:students,student_id,' . $student->id,
        'email'         => 'required|email|max:255|unique:students,email,' . $student->id,
        'phone'         => 'nullable|string|max:20',
        'date_of_birth' => 'nullable|date',
        'gender'        => 'nullable|string|max:50',
        'blood_group'   => 'nullable|string|max:20',
        'department'    => 'required|string|max:255',
        'admission_date'=> 'nullable|date',
        'student_image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        'status'        => 'required|string|max:50',
        'address'       => 'nullable|string|max:255',
        'city'          => 'nullable|string|max:100',
        'country'       => 'nullable|string|max:100',
        'mother_name'    => 'nullable|required_without:father_name|string|max:255',
        'father_name'    => 'nullable|required_without:mother_name|string|max:255',
        'mobile_number'  => 'nullable|string|max:20',
    ]);

    if ($request->hasFile('student_image')) {

        // পুরাতন image delete করতে চাইলে
        if ($student->student_image &&
            \Illuminate\Support\Facades\Storage::disk('public')->exists($student->student_image)) {

            \Illuminate\Support\Facades\Storage::disk('public')
                ->delete($student->student_image);
        }

        $validatedData['student_image'] =
            $request->file('student_image')->store('students', 'public');
    }

    $student->update($validatedData);

    return redirect()
        ->route('students.show', $student->id)
        ->with('success', 'Student updated successfully.');
}

public function destroy($id)
{
    $student = Student::findOrFail($id);

    if (
        $student->student_image &&
        \Illuminate\Support\Facades\Storage::disk('public')
            ->exists($student->student_image)
    ) {
        \Illuminate\Support\Facades\Storage::disk('public')
            ->delete($student->student_image);
    }

    $student->delete();

    return redirect()
        ->route('students.index')
        ->with('success', 'Student deleted successfully.');
}
}