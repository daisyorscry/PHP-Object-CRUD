<?php

namespace belajar\php\App\Controller;

use belajar\php\App\View\View;
use belajar\php\Connection\Connection;
use belajar\php\App\Repository\UserRepository;
use belajar\php\App\Request\UserRequest;
use belajar\php\App\Service\UserServiceValidate;

class Controller 
{
    private $repository;
    private $userservicevalidate;

    public function __construct()
    {
        $this->repository = new UserRepository(Connection::getConnection());
        $this->userservicevalidate = new UserServiceValidate($this->repository);

    }
    public function index()
    {
        $model = $this->repository->fetchAll();

        View::render('index', $model );
    }

    public function show()
    {
        $model = "title";
        View::render('adduser', $model);

    }

    public function create()
    {
        $UserRequest = new UserRequest();

        $UserRequest->nama = $_POST['nama'];
        $UserRequest->email = $_POST['email'];
        $UserRequest->password = $_POST['password'];
        $UserRequest->alamat = $_POST['alamat'];
        $UserRequest->no_hp = $_POST['no_hp'];

        $this->userservicevalidate->validateRequest($UserRequest);

        header('Location: /'); 
        exit;

    }

    public function update($id)
    {
        // Mengambil data pengguna berdasarkan ID
        $user = $this->repository->findById($id);

        // Pastikan data pengguna dalam format array
        if ($user) {
            // Mengirimkan data ke view sebagai array
            View::render('edituser', ['user' => $user]);
        } else {
            // Jika pengguna tidak ditemukan, arahkan ke halaman kesalahan atau halaman lain yang sesuai
            header('Location: /error'); 
            exit;
        }
    }
    

    public function edit($id)
    {   
        $UserRequest = new UserRequest();

        $UserRequest->nama = $_POST['nama'];
        $UserRequest->email = $_POST['email'];
        $UserRequest->alamat = $_POST['alamat'];
        $UserRequest->no_hp = $_POST['no_hp'];

        $this->userservicevalidate->validateEditRequest($UserRequest, $id);

        header('Location: /'); 
        exit;

    }

    public function destroy($id)
    {
        $this->repository->destroy((int)$id);
        header('Location: /');
        exit;
    }
}
