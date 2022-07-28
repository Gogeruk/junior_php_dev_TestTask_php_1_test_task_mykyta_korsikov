<?php

namespace App\Models;


use App\Modules\Database;

Class User Extends Model
{
    /**
     * @var Database
     */
    private $db;

    /**
     *
     */
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
     * @param array $data
     * @return bool
     */
    public function register(array $data): bool
    {
        $this->db->query('INSERT INTO users (email, password, role) VALUES(:email, :password, :role)');
        $this->db->bind(':email', $data['email']);
        $this->db->bind(':password', $data['password']);
        $this->db->bind(':role', $data['role']);


        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }


    /**
     * @param string $email
     * @param string $password
     * @return false
     */
    public function login(string $email, string $password)
    {
        $this->db->query('SELECT *FROM users WHERE email=:email');
        $this->db->bind(':email', $email);
        $row = $this->db->single();
        $hashed_password = $row->password;

        if (password_verify($password, $hashed_password)) {
            return $row;
        } else {
            return false;
        }
    }
}