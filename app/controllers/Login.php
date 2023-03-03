<?php

class Login
{
    use Controller;
    public function index()
    {
        $user = new User();
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $arr['email'] = $_POST['email'];
            $arr['password'] = $_POST['password'];
            $row =  $user->first($arr);
            show($row);
            if ($row) {
                if ($row->password == $_POST['password']) {
                    $_SESSION['USERNAME'] = $row;
                    redirect('home');
                }
            }
            $user->errors['email'] = 'email or password is required';
            $data['errors'] = $user->errors;
        }
        $data['login'] = 'Login page';
        $this->view('login', $data);
    }
}