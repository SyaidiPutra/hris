<?php

class dept extends Controller
{
    public function index()
    {
        if(!isset($_SESSION['user'])) {
            header('Location: ' . BASEURL);
        }
        
        $data = [
            'title' => 'Dashboard',
            'breadcrumb' => 'Master',
            'breadcrumb_active' => 'Department',
            'href' => 'dept',
            'data' => $this->model('dept_model')->getDept()
        ];

        $this->view('template/header', $data);
        $this->view('master/dept', $data);
        $this->view('template/footer');
    }

    public function store()
    {
        $checkExistDept = $this->model('dept_model')->checkExistDept($_POST['nama_dept']);
        if($checkExistDept > 0) {
            Flasher::setFlash('danger', 'Department ' . $_POST['nama_dept'] . ' sudah terdaftar', '!');
            header('Location: ' . BASEURL . '/dept');
        }else {
            $store = $this->model('dept_model')->store($_POST);
            if($store > 0) {
                Flasher::setFlash('primary', 'Berhasil menambahkan Department ' . $_POST['nama_dept'], '<i class="bi bi-check2-circle"></i>');
                header('Location: ' . BASEURL . '/dept');

            } else {
                Flasher::setFlash('danger', 'Gagal menambahkan Department ' . $_POST['nama_dept'], '!');
                header('Location: ' . BASEURL . '/dept');
            }
        }
    }

    public function update()
    {
        $update = $this->model('dept_model')->update($_POST);

        if($update > 0) {
            Flasher::setFlash('primary', 'Berhasil mengupdate ' . $_POST['nama_dept'], '<i class="bi bi-check2-circle"></i>');
            header('Location: ' . BASEURL . '/dept');

        } else {
            Flasher::setFlash('danger', 'Gagal mengupdate ' . $_POST['nama_dept'], '!');
            header('Location: ' . BASEURL . '/dept');
        }
    }

    public function destroy()
    {
        $delete = $this->model('dept_model')->destroy($_POST);

        if($delete > 0) {
            Flasher::setFlash('primary', 'Berhasil menghapus ' . $_POST['nama_dept'], '<i class="bi bi-check2-circle"></i>');
            header('Location: ' . BASEURL . '/dept');

        } else {
            Flasher::setFlash('danger', 'Gagal menghapus ' . $_POST['nama_dept'], ' !');
            header('Location: ' . BASEURL . '/dept');
        }
    }
}