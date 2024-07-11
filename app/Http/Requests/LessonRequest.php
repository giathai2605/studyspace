<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LessonRequest extends FormRequest
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
                    case 'update':
                    case 'store':
                        $rules = [
                            'CourseChapterId' => 'required',
                            'LessonName' => 'required',
                            'LessonDescription' => 'required',
                            'SortNumber' => 'required',
                            'Status' => 'required',
                        ];
                        break;
                    case 'storeVideos':
                        $rules = [
                            'Title' => 'required',
                            'LessonLinkUrl' => 'required',
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
            'Title.required' => 'Video title cannot be empty',
            'LessonName.required' => 'Course name cannot be empty',
            'LessonDescription.required' => 'Please enter a description, it cannot be empty',
            'Status.required' => 'Status cannot be empty',
            'LessonLinkUrl.required' => 'Video link cannot be empty',
            'LessonLinkUrl.url' => 'Video link is not in the correct format',
            'SortNumber.required' => 'Sort number cannot be empty',
            'CourseChapterId.required' => 'Chapter cannot be empty',
        ];
    }
}

