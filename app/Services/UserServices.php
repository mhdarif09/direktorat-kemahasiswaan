<?php

namespace App\Services;

use App\Models\User;
use App\Models\Student;
use Illuminate\Support\Facades\Hash;

class UserService
{
    public function registerStudent(array $data)
    {
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'role' => 'student',
        ]);

        Student::create([
            'user_id' => $user->id,
            'student_number' => $data['student_number'],
            'course' => $data['course'],
        ]);

        return $user;
    }
}
