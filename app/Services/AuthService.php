<?php

namespace App\Services;


use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

trait AuthService
{

    #LOGIN
    protected function validateLogin(array $data)
    {
        return Validator::make($data, [
            'email' => ['required', 'string', 'email', 'max:255'],
            'password' => ['required', 'string'],
        ]);
    }

    #REGISTER
    protected function validateRegister(array $data)
    {
        return Validator::make($data, [
            'last_name' => ['required', 'string', 'max:255'],
            'first_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'activated_code' => rand(100000, 999999),
            'password' => Hash::make($data['password']),
            'remember_token' => Str::random(10),
        ]);
    }

    #UPDATE PASSWORD
    protected function validateUpdatePassword(array $data)
    {
        return Validator::make($data, [
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    protected function validateResetPassword(array $data)
    {
        return Validator::make($data, [
            'reset_code' => ['required', 'integer', 'min:6'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    protected function validateName(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
        ]);
    }
    protected function validateEmail(array $data)
    {
        return Validator::make($data, [
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
        ]);
    }

    protected function validateNumber(array $data)
    {
        return Validator::make($data, [
            'number' => ['required', 'string', 'max:15', 'unique:users'],
        ]);
    }

    protected function validateEmailNoUnique(array $data)
    {
        return Validator::make($data, [
            'email' => ['required', 'string', 'email', 'max:255'],
        ]);
    }
}
