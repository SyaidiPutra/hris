<?php

class transisi extends Controller
{
    public function index()
    {
        if(!isset($_SESSION['user'])) {
            header('Location: ' . BASEURL);
        }
        
        $data = [
            'title' => 'Dashboard',
            'breadcrumb' => 'Master',
            'breadcrumb_active' => 'Transisi',
            'href' => 'transisi',
            'data' => $this->model('transisi_model')->getTransisi()
        ];

        $this->view('template/header', $data);
        $this->view('master/transisi', $data);
        $this->view('template/footer');
    }

    public function store()
    {
        $checkExistTransisi = $this->model('transisi_model')->checkExistTransisi($_POST['nama_transisi']);
        if($checkExistTransisi > 0) {
            Flasher::setFlash('danger', 'Transisi ' . $_POST['nama_transisi'] . ' sudah terdaftar', '!');
            header('Location: ' . BASEURL . '/transisi');
        }else {
            $store = $this->model('transisi_model')->store($_POST);
            if($store > 0) {
                Flasher::setFlash('primary', 'Berhasil menambahkan Transisi ' . $_POST['nama_transisi'], '<i class="bi bi-check2-circle"></i>');
                header('Location: ' . BASEURL . '/transisi');

            } else {
                Flasher::setFlash('danger', 'Gagal menambahkan Transisi ' . $_POST['nama_transisi'], '!');
                header('Location: ' . BASEURL . '/transisi');
            }
        }
    }

    public function update()
    {
        $update = $this->model('transisi_model')->update($_POST);

        if($update > 0) {
            Flasher::setFlash('primary', 'Berhasil mengupdate ' . $_POST['nama_transisi'], '<i class="bi bi-check2-circle"></i>');
            header('Location: ' . BASEURL . '/transisi');

        } else {
            Flasher::setFlash('danger', 'Gagal mengupdate ' . $_POST['nama_transisi'], '!');
            header('Location: ' . BASEURL . '/transisi');
        }
    }

    public function destroy()
    {
        $delete = $this->model('transisi_model')->destroy($_POST);

        if($delete > 0) {
            Flasher::setFlash('primary', 'Berhasil menghapus ' . $_POST['nama_transisi'], '<i class="bi bi-check2-circle"></i>');
            header('Location: ' . BASEURL . '/transisi');

        } else {
            Flasher::setFlash('danger', 'Gagal menghapus ' . $_POST['nama_transisi'], ' !');
            header('Location: ' . BASEURL . '/transisi');
        }
    }
}