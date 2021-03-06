<?php

namespace App\Http\Requests;

use App\Route;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyRouteRequest extends FormRequest
{
    

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:routes,id',
        ];
    }
}
