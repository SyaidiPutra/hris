<?php

class Dashboard extends Controller
{
    public function index()
    {
        if(!isset($_SESSION['user'])) {
            header('Location: ' . BASEURL);
        }

        $data = [
            'title' => 'Dashboard',
            'breadcrumb' => 'Home',
            'breadcrumb_active' => 'Dashboard',
            'href' => 'dashboard'
        ];

        $this->view('template/header', $data);
        $this->view('dashboard/index');
        $this->view('template/footer');
    }
}
