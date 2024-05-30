<?php

namespace App\Actions\Fortify;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Laravel\Jetstream\Jetstream;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array<string, string>  $input
     */
    public function create(array $input): User
    {
        Validator::make($input, [
            'name' => ['required', 'string', 'max:255','unique:users'],
            'refral_id' => ['required'],
            'refral_name' => ['required'],
            'full_name'=>['string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => $this->passwordRules(),
            //'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['accepted', 'required'] : '',
        ])->validate();
       
        $user=User::create([
            'name' => $input['name'],
            'full_name' => $input['full_name'],
            'refral_name' => $input['refral_name'],
            'cnic' => '',
            'father_name' => $input['father_name'],
            'email' => $input['email'],
            'active_phone' => $input['active_phone'],
            'refral_id' => $input['refral_id'],
            'status' => 'Active',
            'password' => Hash::make($input['password']),
            'string_password' => $input['password'],
        ]);
        $user->assignRole('User');
        return $user;

       
       
    }
}
