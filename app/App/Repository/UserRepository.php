<?php

namespace belajar\php\App\Repository;

use belajar\php\App\Domain\UserDomain;

class UserRepository
{
    private \PDO $connection;

    public function __construct(\PDO $connection)
    {
        $this->connection = $connection;
    }

    public function fetchAll(): array
    {
        $statement = $this->connection->prepare("SELECT * FROM DataMahasiswa");
        $statement->execute();
        $result = $statement->fetchAll(\PDO::FETCH_ASSOC);
        return $result;
    }

    public function create(UserDomain $userDomain): UserDomain
    {
        $statement = $this->connection->prepare("INSERT INTO DataMahasiswa (nama, password, email, alamat, no_hp) VALUES (:nama, :password, :email, :alamat, :no_hp)");

        $statement->bindParam(':nama', $userDomain->nama);
        $statement->bindParam(':password', $userDomain->password);  
        $statement->bindParam(':email', $userDomain->email);
        $statement->bindParam(':alamat', $userDomain->alamat);
        $statement->bindParam(':no_hp', $userDomain->no_hp);
        
        $statement->execute();
        
        return $userDomain;
    }

    public function findById($id)
    {
        $statement = $this->connection->prepare("SELECT * FROM DataMahasiswa WHERE id = :id");
        $statement->bindParam(':id', $id);
        $statement->execute();
        $result = $statement->fetch();

        return $result;
    }
    
    public function update(UserDomain $userDomain, $id): UserDomain
    {
        $statement = $this->connection->prepare("
            UPDATE DataMahasiswa 
            SET nama = :nama, email = :email, alamat = :alamat, no_hp = :no_hp
            WHERE id = :id
        ");
    
        $statement->bindParam(':nama', $userDomain->nama);
        $statement->bindParam(':email', $userDomain->email);
        $statement->bindParam(':alamat', $userDomain->alamat);
        $statement->bindParam(':no_hp', $userDomain->no_hp);
        $statement->bindParam(':id', $id);
    
        $statement->execute();
        
        return $userDomain;
    }
    

    public function destroy(int $id): void
    {
        $statement = $this->connection->prepare("DELETE FROM DataMahasiswa WHERE id = :id"); 
        $statement->bindParam(":id", $id, \PDO::PARAM_INT);
        $statement->execute();
    }
}
