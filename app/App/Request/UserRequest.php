<?php

namespace belajar\php\App\Request;

class UserRequest
{
    public ?string $nama = '';
    public ?string $password = '';
    public ?string $email = '';
    public ?string $alamat = '';
    public ?int $no_hp;
}