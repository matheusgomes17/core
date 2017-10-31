<?php

namespace MVG\Http\Requests\Backend\System\Deposition;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Class ManageDepositionRequest.
 */
class ManageDepositionRequest extends FormRequest
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
            //
        ];
    }
}