<?php

namespace App\Models;

use App\Application\Database\Connection;

class Post extends Connection
{
    protected int $id;
    protected string $title;
    protected string $body;
    protected string $user;
    protected string $button;
    protected int $created_at;

    public function getId(): int
    {
        return $this->id;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function setTitle(string $title): void
    {
        $this->title = $title;
    }

    public function getBody(): string
    {
        return $this->body;
    }

    public function setBody(string $body): void
    {
        $this->body = $body;
    }

    public function getUser(): string
    {
        return $this->user;
    }

    public function setUser(string $user): void
    {
        $this->user = $user;
    }

    public function getButton(): string
    {
        return $this->button;
    }

    public function setButton(string $button): void
    {
        $this->button = $button;
    }

    public function getCreatedAt(): int
    {
        return $this->created_at;
    }

    public function store()
    {
        $query = "INSERT INTO `posts` (`title`, `body`, `user`, `button`) VALUES ('{$this->title}', '{$this->body}', '{$this->user}', '{$this->button}')";
        $stmt = $this->connect()->prepare($query);
        $stmt->execute();
    }
}