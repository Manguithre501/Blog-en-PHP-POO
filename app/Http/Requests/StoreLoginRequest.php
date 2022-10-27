<?php

namespace App\Http\Requests;

use PDO;
use Database\DBConnection;


class StoreLoginRequest
{
    public $errors = [];
    private $email, $password;

    public function validate()
    {
        $errors = $this->errors;

        if (empty($this->email) && empty($this->password)) {
            $errors['vide']  = "Les champs ne peuvent pas être vide !";
        } else if ($this->Password() === false) {
            $errors['exists'] = "L’adresse e-mail que vous avez saisi(e) n’est pas associé(e) à un compte.";
        }


        return $errors;
    }

    private static function exists(string $table, string $column, $value)
    {
        $stmt = static::db()->prepare("SELECT COUNT(*) AS count FROM `$table` WHERE `$column` = :value");
        $stmt->bindParam(':value', $value);
        $stmt->execute();
        $data = $stmt->fetch(PDO::FETCH_ASSOC);

        return intval($data['count']) === 0;
    }


    private function Password()
    {
        $stmt = static::db()->prepare("SELECT password FROM users WHERE email = :email");
        $stmt->bindValue(':email', $this->email, PDO::PARAM_STR);
        $stmt->execute();
        @$hashedPassword = $stmt->fetch(PDO::FETCH_OBJ)->password;

        if (password_verify($this->password, $hashedPassword)) {
            return true;
        } else {
            return false;
        }
    }

    private static function email($value)
    {
        return filter_var($value, FILTER_VALIDATE_EMAIL) !== false;
    }


    /**
     * METHODE D'INSTANCE DE PDO
     */
    protected static function db(): PDO
    {
        return (new DBConnection())->getPDO();
    }

    /**
     * Get the value of email
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set the value of email
     *
     * @return  self
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get the value of password
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set the value of password
     *
     * @return  self
     */
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }
}
