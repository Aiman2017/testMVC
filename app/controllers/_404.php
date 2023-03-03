<?php

class _404
{
    use Controller;

    public function index()
    {
        $data['error'] = '404';
        $this->view('404', $data);
    }
}
