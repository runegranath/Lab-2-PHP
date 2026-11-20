<?php

class BucketList
{
    private $db;
    private $name;
    private $description;
    private $priority;

    // anslut till databasen
    public function __construct()
    {
        $this->db = new mysqli("localhost", "root", "", "bucketlist_db");

        if ($this->db->connect_errno > 0) {
            die("Fel vid anslutning till databasen" . $this->db->connect_error);
        }
    }

    // Setters & validering
    public function setName(string $name): bool
    {
        $name = trim($name);
        if (!empty($name)) {
            $this->name = $name;
            return true;
        }
        return false;
    }

    public function setDescription(string $description): bool
    {
        $description = trim($description);
        if (!empty($description)) {
            $this->description = $description;
            return true;
        }
        return false;
    }

    public function setPriority(int $priority): bool
    {
        if ($priority >= 1 && $priority <= 3) {
            $this->priority = $priority;
            return true;
        }
        return false;
    }

    // Hämta alla poster
    public function getItems(): array
    {
        $sql = "SELECT * FROM bucketlist ORDER BY priority ASC, created_at DESC";
        $result = $this->db->query($sql);

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    // Lägg till post
    public function addItem(string $name, string $description, int $priority): bool
    {
        // Validera via setters 
        if (!$this->setName($name) || !$this->setDescription($description) || !$this->setPriority($priority)) {
            return false;
        }

        // Prepared statement mot SQL-injektioner
        $stmt = $this->db->prepare("INSERT INTO bucketlist (name, description, priority) VALUES (?, ?, ?)");
        // data binds till frågan, string string integer
        $stmt->bind_param("ssi", $this->name, $this->description, $this->priority);

        return $stmt->execute();
    }

    // Radera en post
    public function deleteItem(int $id): bool
    {
        $stmt = $this->db->prepare("DELETE FROM bucketlist WHERE id = ?");
        $stmt->bind_param("i", $id);

        return $stmt->execute();
    }
}