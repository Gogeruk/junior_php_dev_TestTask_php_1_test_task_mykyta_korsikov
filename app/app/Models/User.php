<?php

namespace App\Models;


use App\Modules\Database;


/**
 * roles are:
 * 1 is a director
 * 2 is a manager
 * 3 is a worker
 */
Class User Extends Model
{
    /**
     * @var Database
     */
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }


    /**
     * @param string $email
     * @return bool
     */
    public function findUserByEmail(string $email): bool
    {
        $this->db->query('SELECT * FROM users WHERE email= :email');
        $this->db->bind(':email', $email);
        $row = $this->db->single();

        // check row
        if ($this->db->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    }


    /**
     * @param string $email
     * @param string $password
     * @param int $role
     * @return bool
     */
    public function register(string $email, string $password, int $role): bool
    {
        $this->db->query('INSERT INTO users (email, password, role) VALUES(:email, :password, :role)');
        $this->db->bind(':email', $email);
        $this->db->bind(':password', $password);
        $this->db->bind(':role', $role);

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }


    /**
     * @param string $email
     * @param string $password
     * @return false|object
     */
    public function login(string $email, string $password): false|object
    {
        $this->db->query('SELECT *FROM users WHERE email=:email');
        $this->db->bind(':email', $email);
        $row = $this->db->single();
        $hashedPassword = $row->password;

        if (password_verify($password, $hashedPassword)) {
            return $row;
        } else {
            return false;
        }
    }
}