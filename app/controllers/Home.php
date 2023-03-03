<?php

class Home
{
    use Controller;
    public function index($a = '')
    {

        $data['title'] = 'home page';
        $data['username'] = empty($_SESSION['USER']) ? 'User':$_SESSION['USER']->email;
        $this->view('home', $data);
    }
}
