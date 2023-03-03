<?php

class User
{
    use Model;

    protected $table = 'user_tb';
    protected $allowedColumns = [
        'email',
        'password',
        'date',
        'terms'
    ];

    public function validate($data)
    {
        $this->errors = [];
        if (empty($data['email'])) {
            $this->errors['email'] = 'Email is required';
        } else{
            if (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
                $this->errors['email'] = 'Email is not valid';
            }
        }

        if (empty($data['password'])) {
            $this->errors['password'] = 'Password is required';
        }else if (strlen($data['password']) < 7) {
            $this->errors['password'] = 'The password should be more than 7 characters';
        }
        if (empty($data['terms'])) {
            $this->errors['terms'] = 'Please accept the terms';
        }

        if (empty($this->errors)) {
            return true;
        }
        return false;
    }
}