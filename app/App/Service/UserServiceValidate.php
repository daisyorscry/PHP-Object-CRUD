<?php

namespace belajar\php\App\Service;

use belajar\php\App\Domain\UserDomain;
use belajar\php\App\Repository\UserRepository;
use belajar\php\App\Request\UserRequest;

class UserServiceValidate
{
    private $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function validateRequest(UserRequest $userRequest)
    {
        $hashedPassword = password_hash($userRequest->password, PASSWORD_BCRYPT);

        $domain = new UserDomain;

        $domain->nama = $userRequest->nama;
        $domain->password = $hashedPassword;
        $domain->email = $userRequest->email;
        $domain->alamat = $userRequest->alamat;
        $domain->no_hp = $userRequest->no_hp;
        $this->userRepository->create($domain);
        

    }

    public function validateEditRequest(UserRequest $userRequest, $id)
    {
        $domain = new UserDomain;

        $domain->nama = $userRequest->nama;
        $domain->email = $userRequest->email;
        $domain->alamat = $userRequest->alamat;
        $domain->no_hp = $userRequest->no_hp;
        $this->userRepository->update($domain, $id);
    }
    
}