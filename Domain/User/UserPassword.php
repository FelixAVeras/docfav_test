<?php

declare(strict_types=1);

use InvalidArgumentException;

final class UserPassword {
    private string $hashedPassword;

    public function __construct(string $plainPassword)
    {
        $this->ensureIsValid($plainPassword);
        $this->hashedPassword = password_hash($plainPassword, PASSWORD_DEFAULT);
    }

    private function ensureIsValid(string $password): void
    {
        if (strlen($password) < 8) {
            throw new InvalidArgumentException("Password must be at least 8 characters long.");
        }
    }

    public function value(): string
    {
        return $this->hashedPassword;
    }

    public function verify(string $plainPassword): bool
    {
        return password_verify($plainPassword, $this->hashedPassword);
    }
}

?>