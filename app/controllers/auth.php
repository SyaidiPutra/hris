<?php

class auth extends Controller
{
    public function index()
    {
        if(isset($_SESSION['user'])) {
            header('Location: ' . BASEURL . '/dashboard');
        }

        $this->view('auth/login');
    }

    public function login()
    {
        $checkUserExist = $this->model('auth_model')->checkUserExist($_POST['username']);
        $getUser = $this->model('auth_model')->getUser($_POST['username']);

        if ($checkUserExist > 0 && password_verify($_POST['password'], $checkUserExist['password'])) {
            $_SESSION['user'] = $getUser;
            header('Location: ' . BASEURL . '/dashboard');
        } else {
            Flasher::setFlash('danger', 'Username atau password tidak dikenal !', '');
            header('Location: ' . BASEURL . '/auth');
        }
    }

    public function logout()
    {
        session_unset();
        session_destroy();
        header('Location: ' . BASEURL . '/auth');
    }
}