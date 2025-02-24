<?php

declare(strict_types=1);

use InvalidArgumentException;

final class UserName {
    private string $value;

    public function __construct(string $value) {
        $this->ensureIsValid($value);
        $this->value = $value;
    }

    private function ensureIsValid(string $value): void {
        if (strlen($value) < 3 || strlen($value) > 50) {
            throw new InvalidArgumentException("User name must be between 3 and 50 characters.");
        }

        if (!preg_match('/^[a-zA-Z\s]+$/', $value)) {
            throw new InvalidArgumentException("User name must contain only letters and spaces.");
        }
    }

    public function value(): string {
        return $this->value;
    }
}

?>