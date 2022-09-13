<?php

class jabatan extends Controller
{
    public function index()
    {
        if(!isset($_SESSION['user'])) {
            header('Location: ' . BASEURL);
        }
        
        $data = [
            'title' => 'Dashboard',
            'breadcrumb' => 'Master',
            'breadcrumb_active' => 'Jabatan',
            'href' => 'jabatan',
            'data' => $this->model('jabatan_model')->getJabatan()
        ];

        $this->view('template/header', $data);
        $this->view('master/jabatan', $data);
        $this->view('template/footer');
    }

    public function store()
    {
        $checkExistJabatan = $this->model('jabatan_model')->checkExistJabatan($_POST['nama_jabatan']);
        if($checkExistJabatan > 0) {
            Flasher::setFlash('danger', 'Jabatan ' . $_POST['nama_jabatan'] . ' sudah terdaftar', '!');
            header('Location: ' . BASEURL . '/jabatan');
        }else {
            $store = $this->model('jabatan_model')->store($_POST);
            if($store > 0) {
                Flasher::setFlash('primary', 'Berhasil menambahkan jabatan ' . $_POST['nama_jabatan'], '<i class="bi bi-check2-circle"></i>');
                header('Location: ' . BASEURL . '/jabatan');

            } else {
                Flasher::setFlash('danger', 'Gagal menambahkan jabatan ' . $_POST['nama_jabatan'], '!');
                header('Location: ' . BASEURL . '/jabatan');
            }
        }
    }

    public function update()
    {
        $update = $this->model('jabatan_model')->update($_POST);

        if($update > 0) {
            Flasher::setFlash('primary', 'Berhasil mengupdate ' . $_POST['nama_jabatan'], '<i class="bi bi-check2-circle"></i>');
            header('Location: ' . BASEURL . '/jabatan');

        } else {
            Flasher::setFlash('danger', 'Gagal mengupdate ' . $_POST['nama_jabatan'], '!');
            header('Location: ' . BASEURL . '/jabatan');
        }
    }

    public function destroy()
    {
        $delete = $this->model('jabatan_model')->destroy($_POST);

        if($delete > 0) {
            Flasher::setFlash('primary', 'Berhasil menghapus ' . $_POST['nama_jabatan'], '<i class="bi bi-check2-circle"></i>');
            header('Location: ' . BASEURL . '/jabatan');

        } else {
            Flasher::setFlash('danger', 'Gagal menghapus ' . $_POST['nama_jabatan'], ' !');
            header('Location: ' . BASEURL . '/jabatan');
        }
    }
}