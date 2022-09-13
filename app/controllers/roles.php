<?php

class roles extends Controller
{
    public function index()
    {
        if(!isset($_SESSION['user'])) {
            header('Location: ' . BASEURL);
        }
        
        $data = [
            'title' => 'Dashboard',
            'breadcrumb' => 'Master',
            'breadcrumb_active' => 'Roles',
            'href' => 'roles',
            'data' => $this->model('roles_model')->getRoles()
        ];

        $this->view('template/header', $data);
        $this->view('master/roles', $data);
        $this->view('template/footer');
    }

    public function store()
    {
        $store = $this->model('roles_model')->store($_POST);

        if($store > 0) {
            Flasher::setFlash('primary', 'Berhasil menambahkan role ' . $_POST['nama_role'], '<i class="bi bi-check2-circle"></i>');
            header('Location: ' . BASEURL . '/roles');

        } else {
            Flasher::setFlash('danger', 'Gagal menambahkan role ' . $_POST['nama_role'], '<i class="bi bi-x-lg"></i>');
            header('Location: ' . BASEURL . '/roles');
        }
    }

    public function update()
    {
        $update = $this->model('roles_model')->update($_POST);

        if($update > 0) {
            Flasher::setFlash('primary', 'Berhasil mengupdate ' . $_POST['nama_role'], '<i class="bi bi-check2-circle"></i>');
            header('Location: ' . BASEURL . '/roles');

        } else {
            Flasher::setFlash('danger', 'Gagal mengupdate ' . $_POST['nama_role'], '<i class="bi bi-x-lg"></i>');
            header('Location: ' . BASEURL . '/roles');
        }
    }

    public function destroy()
    {
        $delete = $this->model('roles_model')->destroy($_POST);

        if($delete > 0) {
            Flasher::setFlash('primary', 'Berhasil menghapus ' . $_POST['nama_role'], '<i class="bi bi-check2-circle"></i>');
            header('Location: ' . BASEURL . '/roles');

        } else {
            Flasher::setFlash('danger', 'Gagal menghapus ' . $_POST['nama_role'], '<i class="bi bi-x-lg"></i>');
            header('Location: ' . BASEURL . '/roles');
        }
    }
}