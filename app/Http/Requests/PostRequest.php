<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
{
    protected $post_rules = [
        'name' => 'required|string',
        'title' =>'required|string',
        'description' => 'required|string',

    ];


    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */


    public function rules(): array
    {
        return match ($this->method()) {
            'PUT' => $this->updatePostRules(),
            default => $this->post_rules,
        };
    }


    private function updatePostRules(): array
    {
        return $this->post_rules;
    }
}