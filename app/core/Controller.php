<?php

trait Controller
{
    public function view($view, $data = [])
    {
        if(!empty($data))
            extract($data);
        $fileName = '../app/views/' . $view . '.view.php';
        if (file_exists($fileName)) {
            require_once $fileName;
        } else {
            if (DEBUG) {
                echo '<h1>we cant found this ' . $view . '</h1>';
            }

        }
    }
}