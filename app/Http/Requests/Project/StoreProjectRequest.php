<?php

namespace App\Http\Requests\Project;

use App\Extensions\RoleResolver\UserProjectRoleResolver;
use App\Models\Project;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class StoreProjectRequest extends FormRequest
{
    /**
     * @return bool
     */
    public function authorize()
    {
        return Auth::user()
            && UserProjectRoleResolver::userHasAccessTo(Auth::user(), null, UserProjectRoleResolver::USER_CAN_CREATE_PROJECT);
    }

    /**
     * @return array
     */
    public function rules()
    {
        return [
            'title' => 'required|string',
            'content' => 'required|string|min:5',
        ];
    }
}
