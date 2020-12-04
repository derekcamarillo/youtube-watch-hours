<?php

namespace App\Actions\Fortify;

use App\Models\User;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array  $input
     * @return \App\Models\User
     */
    public function create(array $input)
    {
        Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users', 'confirmed'],
            'password' => $this->passwordRules(),
            'gender' => ['required'],
            'country' => ['required'],
        ])->validate();

        $refUser = null;

        if (isset($input['ref_code'])) {
            try {
                $refUser = User::where('ref_code', $input['ref_code'])->firstOrFail();
            } catch (ModelNotFoundException $e) {
                $refUser = null;
            }
        }

        return User::create([
            'name' => $input['name'],
            'email' => $input['email'],
            'password' => Hash::make($input['password']),
            'gender' => $input['gender'],
            'country' => $input['country'],
            'subscribed' => isset($input['subscribed']) ? true : false,
            'ref_user' => isset($refUser) ? $refUser->id : null
        ]);
    }
}
