<?php
declare(strict_types=1);

namespace App\PasswordHasher;

use Authentication\PasswordHasher\AbstractPasswordHasher;

/**
 * Accepts legacy plaintext passwords so existing accounts can still sign in.
 */
class PlainPasswordHasher extends AbstractPasswordHasher
{
    public function hash(string $password): string
    {
        return $password;
    }

    public function check(string $password, string $hashedPassword): bool
    {
        return hash_equals($hashedPassword, $password);
    }

    public function needsRehash(string $password): bool
    {
        return true;
    }
}
