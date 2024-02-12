<?php

declare(strict_types=1);

namespace App\Services;

use Framework\Database;
use Framework\Exceptions\ValidationException;

class UserService {
    public function __construct(private Database $database) {
    }

    public function isEmailTaken(string $email) {
        $emailCount = $this->database->query(
            "SELECT COUNT(*) FROM users WHERE email = :email",
            ['email' => $email]
        )->count();

        if ($emailCount > 0) {
            throw new ValidationException(['email' => 'Email taken']);
        }
    }

    public function create(array $formData) {
        $this->database->query(
            "INSERT INTO users(email,password,age,country,social_media_url)
            VALUES  (:email, :password, :age, :country, :url)",
            [
                'email' => $formData['email'],
                'password' => $formData['password'],
                'age' => $formData['age'],
                'country' => $formData['country'],
                'url' => $formData['socialMediaUrl']
            ]
        );
    }
}
