<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StudentRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            "name"=> "required||max:231||string",
            "class"=> "required||max:231||string",
            "roll"=> "required||integer",
            "father_name"=> "required||string||max:231",
            "mother_name"=>"required||string||max:231",
            "number"=>"required||numeric||digits:11",
            "address"=>"required||string",
            "student_id"=>"required||numeric",
            'mathMarks'=>'required||numeric',
            'chemistryMarks'=>'required||numeric',
            'physicsMarks'=>'required||numeric',
            
        ];
    }
}
