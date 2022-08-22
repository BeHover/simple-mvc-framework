<?php

namespace App\Models;

use App\Application\Database\Connection;

class User extends Connection
{
    protected int $id;
    protected string $email;
    protected string $password;
    protected string $position;
    protected int $created_at;
    protected int $updated_at;

    public function getId(): int
    {
        return $this->id;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    public function setPassword(string $password): void
    {
        $this->password = $password;
    }

    public function getPosition(): string
    {
        return $this->position;
    }

    public function setPosition(string $position): void
    {
        $this->position = $position;
    }

    public function getCreatedAt(): int
    {
        return $this->created_at;
    }

    public function getUpdatedAt(): int
    {
        return $this->updated_at;
    }

    public function store()
    {
        $query = "INSERT INTO `users` (`email`, `password`, `position`) VALUES ('{$this->email}', '{$this->password}', '{$this->position}')";
        $stmt = $this->connect()->prepare($query);
        $stmt->execute();
    }
}