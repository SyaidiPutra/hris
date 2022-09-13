<?php

class users extends Controller
{
    public function index()
    {
        if(!isset($_SESSION['user'])) {
            header('Location: ' . BASEURL);
        }
        
        $data = [
            'title' => 'Dashboard',
            'breadcrumb' => 'Master',
            'breadcrumb_active' => 'Users',
            'href' => 'users',
            'data' => $this->model('users_model')->getUsers(),
            'roles' => $this->model('roles_model')->getRoles(),
            'karyawan' => $this->model('karyawan_model')->getKaryawan()
        ];

        $this->view('template/header', $data);
        $this->view('master/users', $data);
        $this->view('template/footer');
    }

    public function store()
    {
        if($_POST['confirmPassword'] !== $_POST['password']) {
            Flasher::setFlash('danger', 'Konfirmasi password tidak sesuai !', '<i class="bi bi-x-lg"></i>');
            header('Location: ' . BASEURL . '/users');
        } else {
            $store = $this->model('users_model')->store($_POST);
            if($store > 0) {
                Flasher::setFlash('primary', 'Berhasil menambahkan user ' . $_POST['username'], '<i class="bi bi-check2-circle"></i>');
                header('Location: ' . BASEURL . '/users');
            } else {
                Flasher::setFlash('danger', 'Gagal menambahkan user ' . $_POST['username'], '<i class="bi bi-x-lg"></i>');
                header('Location: ' . BASEURL . '/users');
            }
        }
    }

    public function update()
    {
        $update = $this->model('users_model')->update($_POST);
        if($update > 0) {
            Flasher::setFlash('primary', 'Berhasil mengupdate user ' . $_POST['username'], '<i class="bi bi-check2-circle"></i>');
            header('Location: ' . BASEURL . '/users');
        } else {
            Flasher::setFlash('danger', 'Gagal mengupdate user ' . $_POST['username'], '<i class="bi bi-x-lg"></i>');
            header('Location: ' . BASEURL . '/users');
        }
    }

    public function destroy()
    {
        $delete = $this->model('users_model')->destroy($_POST);

        if($delete > 0) {
            Flasher::setFlash('primary', 'Berhasil menghapus user' . $_POST['username'], '<i class="bi bi-check2-circle"></i>');
            header('Location: ' . BASEURL . '/users');

        } else {
            Flasher::setFlash('danger', 'Gagal menghapus user' . $_POST['username'], '<i class="bi bi-x-lg"></i>');
            header('Location: ' . BASEURL . '/users');
        }
    }
}