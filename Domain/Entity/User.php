<?php

declare(strict_types=1);

use App\Domain\User\UserId;
use App\Domain\User\UserName;
use App\Domain\User\UserEmail;
use App\Domain\User\UserPassword;
use App\Domain\User\UserCreatedAt;

final class User {
    private UserId $id;
    private UserName $name;
    private UserEmail $email;
    private UserPassword $password;
    private UserCreatedAt $createdAt;

    public function __construct(UserId $id, UserName $name, 
        UserEmail $email, UserPassword $password) {
        $this->id = $id;
        $this->name = $name;
        $this->email = $email;
        $this->password = $password;
        $this->createdAt = new UserCreatedAt();
    }

    public function id(): UserId
    {
        return $this->id;
    }

    public function name(): UserName
    {
        return $this->name;
    }

    public function email(): UserEmail
    {
        return $this->email;
    }

    public function password(): UserPassword
    {
        return $this->password;
    }

    public function createdAt(): UserCreatedAt
    {
        return $this->createdAt;
    }
}

?>