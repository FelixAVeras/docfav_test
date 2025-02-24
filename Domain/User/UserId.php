<?php

declare(strict_types=1);

use InvalidArgumentException;

final class UserId {
    private string $value;

    public function __construct() {
        if ($value <= 0) {
            throw new InvalidArgumentException('El Id del usuario debe de ser un numero entero');
        }

        $this->value = $value;
    }

    public function value(): int {
        return $this->value;
    }

    public function equals(UserId $other): bool {
        return $this->value === $other->value();
    }
}

?>