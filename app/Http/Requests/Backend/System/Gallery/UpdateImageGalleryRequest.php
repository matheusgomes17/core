<?php

namespace MVG\Http\Requests\Backend\System\Gallery;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Class UpdateImageGalleryRequest.
 */
class UpdateImageGalleryRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth()->user()->hasRole('administrator');
    }
    
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'image' => 'required',
        ];
    }
}