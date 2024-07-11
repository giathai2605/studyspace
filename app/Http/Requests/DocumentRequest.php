<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DocumentRequest extends FormRequest
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
        $rules = [];
        $currenAction = $this->route()->getActionMethod();
        switch ($this->method()) {
            case 'POST':
                switch ($currenAction) {
                    case 'store':
                        $rules = [
                            'name' => 'required|max:255',
                            'thumbnail' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                            'file' => 'required|mimes:pdf|max:20480',
                            'description' => 'required',
                            'is_featured' => 'required',
                            'status' => 'required',
                        ];
                        break;
                    case 'update':
                        $rules = [
                            'name' => 'required|max:255',
                            'thumbnail' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                            'file' => 'mimes:pdf|max:20480',
                            'description' => 'required',
                            'is_featured' => 'required',
                            'status' => 'required',
                        ];
                        break;
                    default:
                        break;
                }
        }
        return $rules;
    }

    public function messages()
    {
        return [
            'name.required' => 'Document name cannot be empty',
            'thumbnail.required' => 'Thumbnail cannot be empty',
            'thumbnail.image' => 'Thumbnail must be an image',
            'thumbnail.mimes' => 'Thumbnail must be a file of type: jpeg, png, jpg, gif, svg',
            'thumbnail.max' => 'Thumbnail size must be less than 2MB',
            'file.required' => 'File cannot be empty',
            'file.mimes' => 'File must be a file of type: pdf',
            'file.max' => 'File size must be less than 20MB',
            'description.required' => 'Please enter a description, it cannot be empty',
            'is_featured.required' => 'Featured cannot be empty',
            'status.required' => 'Status cannot be empty',
        ];
    }
}
