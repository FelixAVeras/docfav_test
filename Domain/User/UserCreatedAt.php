<?php

declare(strict_types=1);

use InvalidArgumentException;

final class UserCreatedAt {
    private DateTimeImmutable $value;

    public function __construct() {
        $this->value = new DateTimeImmutable();
    }

    public function value(): DateTimeImmutable {
        return $this->value;
    }
}
?>