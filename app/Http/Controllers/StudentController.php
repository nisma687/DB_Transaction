<?php

namespace App\Http\Controllers;

use App\Http\Requests\StudentRequest;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $students = Student::with('courses')->get();
        if ($students->count() > 0) {
            return response()->json([
                "students" => $students,
                "status" => "success",
                "message" => "aaaa",
            ]);
        } else {
            return response()->json([
                "status" => "error",
            ]);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StudentRequest $request)
    {
        $validatedData = $request->validated();
        DB::beginTransaction();

        try {
            $student = Student::create([
                "name" => $validatedData["name"],
                'class' => $validatedData["class"],
                'roll' => $validatedData["roll"],
            ]);
            $student->details()->create([
                "father_name" => $validatedData["father_name"],
                "mother_name" => $validatedData["mother_name"],
                "number" => $validatedData["number"],
                "address" => $validatedData["address"],
                "student_id" => $student->id,
            ]);

            $student->courses()->create([
                "mathMarks"=> $validatedData["mathMarks"],
                "chemistryMarks"=> $validatedData["chemistryMarks"],
                "physicsMarks"=> $validatedData["physicsMarks"],
                "student_id"=> $student->id,
            ]);

            // dd($student->with('courses')->get());
            DB::commit();
            return response()->json(['message' => 'Student record created successfully']);
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with("error", $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $student = Student::with('courses')->find($id);
        if ($student) {
            return response()->json([
                "student data" => $student,
                "status" => "ok",
            ]);
        } else {
            return response()->json(["message" => "student not found"]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // return 'here';
        $student = Student::find($id);

        if (!$student) {
            return response()->json([
                "status" => "couldn't delete",
            ]);
        }

        $student->delete();

        return redirect('students')->with('success', 'Student deleted successfully');
    }
    public function restore(Request $request, string $id)
    {
        $student = Student::withTrashed()->find($id);
        if (!$student) {
            return redirect()->back()->with('error', 'Student not found.');
        }

        $student->restore();
        return redirect()->back()->with('success', 'Student restored successfully.');
    }

    public function hasManyRelationship(Request $request){}
}
