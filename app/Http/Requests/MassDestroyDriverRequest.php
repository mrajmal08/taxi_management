<?php

namespace App\Http\Requests;

use App\Driver;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyDriverRequest extends FormRequest
{
   

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:drivers,id',
        ];
    }
}
