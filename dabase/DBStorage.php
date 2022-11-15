<?php

class DBStorage implements IStorage
{

    private $conn;

    public function __construct()
    {
        try {
            $this->conn = new PDO("mysql:host=localhost;dbname=blog", "root", "dtb456");
            // set the PDO error mode to exception
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch(PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }

    /**
     * @return Journ[]
     */
    public function getAll()
    {
        return $this->
                conn->query('SELECT * FROM blogs')
                ->fetchAll(PDO::FETCH_CLASS, Journ::class);
    }

    public function getOne($id)
    {
        $stmt = $this->conn->prepare("SELECT * FROM blogs WHERE id = ?");
        $stmt->execute([intval($id)]);
        return $stmt->fetch();
    }

    public function store(Journ $blog)
    {
        $stmt = $this->conn->prepare("INSERT INTO blogs (title, body) VALUES (?,?)");
        $stmt->execute([$blog->getTitle(), $blog->getBody()]);
    }

    public function remove($id)
    {
        $stmt = $this->conn->prepare("DELETE FROM blogs WHERE id = ?");
        $stmt->execute([intval($id)]);
    }

    public function edit($id, $title, $body)
    {
        $stmt = $this->conn->prepare("UPDATE blogs SET title = ?, body = ? WHERE id = ?");
        $stmt->execute([$title, $body, intval($id)]);
    }
}