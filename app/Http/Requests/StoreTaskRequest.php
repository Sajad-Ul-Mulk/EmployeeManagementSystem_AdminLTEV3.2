<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class StoreTaskRequest extends FormRequest
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
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
//        $this->dd(Request::all());
        return [
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:500',
            'estimated_completion_time' => 'required|after:today',
            'priority' => 'required|integer|between:1,10',
            'status' => 'required',Rule::in(['open','in progress','on hold','completed',]),
            'user_id' => 'required|exists:App\Models\User,id',
            'task_approval_id' => '0',
        ];
    }
}
