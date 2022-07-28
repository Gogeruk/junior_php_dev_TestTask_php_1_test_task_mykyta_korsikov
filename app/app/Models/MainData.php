<?php

namespace App\Models;

use App\Modules\Database;

class MainData extends Model
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
     * @param string $title
     * @param string $body
     * @param string $user
     * @param string $button
     * @return bool
     */
    public function save(string $title, string $body, string $user, string $button): bool
    {
        $this->db->query('INSERT INTO main_data (title, body, user, button) VALUES(:title, :body, :user, :button)');
        $this->db->bind(':title', $title);
        $this->db->bind(':body', $body);
        $this->db->bind(':user', $user);
        $this->db->bind(':button', $button);

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
}