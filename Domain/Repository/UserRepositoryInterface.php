<?php

declare(strict_types=1);

use App\Domain\Entity\User;

interface UserRepositoryInterface {
    public function save(User $user): void;

    public function findById(UserId $id): ?User;

    public function delete(UserId $id): void;
}

?>