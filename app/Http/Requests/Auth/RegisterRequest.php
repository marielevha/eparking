<?php
/**
 * Created by IntelliJ IDEA.
 * User: maeva
 * Date: 27/08/22
 * Time: 16:29
 */

namespace App\Http\Requests\Auth;


use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class RegisterRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'first_name' => ['required', 'max:50'],
            'last_name' => ['required', 'max:50'],
            'email' => ['required', 'max:50', 'email', Rule::unique('users')],
            'password' => ['required', 'string', 'min:8'],
            'photo' => ['nullable', 'image'],
        ];
    }
}
