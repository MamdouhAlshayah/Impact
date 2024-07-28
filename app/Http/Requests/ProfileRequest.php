<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\User;
class ProfileRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        $userId = $this->route('id'); 

        return [
            'email' => 'required|email|max:255|unique:users,email,' . $userId,
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'bio' => 'nullable|string|max:255',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ];
    }
    public function messages()
    {
       
        return [
            'email.required' => 'Email is required.',
            'email.email' => 'Email must be valid.',
            'email.max' => 'Email must not exceed 255 characters.',
            'email.unique' => 'Email is already in use.',
            'first_name.required' => 'First name is required.',
            'first_name.string' => 'First name must be a string.',
            'first_name.max' => 'First name must not exceed 255 characters.',
            'last_name.required' => 'Last name is required.',
            'last_name.string' => 'Last name must be a string.',
            'last_name.max' => 'Last name must not exceed 255 characters.',
            'bio.string' => 'Bio must be a string.',
            'bio.max' => 'Bio must not exceed 255 characters.',
            'photo.image' => 'The file must be an image.',
            'photo.mimes' => 'The image must be a file of type: jpeg, png, jpg, gif, svg.',
            'photo.max' => 'The image must not exceed 2 MB.',
        ];
    }
}