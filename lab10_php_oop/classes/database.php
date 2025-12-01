<?php

class Database {

    protected $conn;

    public function __construct()
    {
        // include config dari root project
        include __DIR__ . "/../config.php";

        $this->conn = new mysqli(
            $config['host'],
            $config['username'],
            $config['password'],
            $config['db_name']
        );

        if ($this->conn->connect_error) {
            die("DB Connection Failed: " . $this->conn->connect_error);
        }

        $this->conn->set_charset("utf8mb4");
    }

    // Ambil semua data
    public function getAll($table)
    {
        $table = $this->conn->real_escape_string($table);
        $sql = "SELECT * FROM `$table`";
        $result = $this->conn->query($sql);

        return $result ? $result->fetch_all(MYSQLI_ASSOC) : [];
    }

    // Ambil data berdasarkan ID
    public function getById($table, $id)
    {
        $table = $this->conn->real_escape_string($table);
        $id = $this->conn->real_escape_string($id);

        $sql = "SELECT * FROM `$table` WHERE id='$id' LIMIT 1";
        $query = $this->conn->query($sql);

        return $query ? $query->fetch_assoc() : null;
    }

    // Insert data
    public function insert($table, $data)
    {
        $columns = array_keys($data);
        $values  = array_values($data);

        $columnsEsc = array_map([$this->conn, 'real_escape_string'], $columns);
        $valuesEsc  = array_map([$this->conn, 'real_escape_string'], $values);

        $columnsStr = "`" . implode("`,`", $columnsEsc) . "`";
        $valuesStr  = "'" . implode("','", $valuesEsc) . "'";

        $sql = "INSERT INTO `$table` ($columnsStr) VALUES ($valuesStr)";
        return $this->conn->query($sql);
    }

    // ✅ UPDATE DATA (inilah yang kamu butuh!)
    public function update($table, $data, $id)
    {
        $table = $this->conn->real_escape_string($table);
        $id    = $this->conn->real_escape_string($id);

        $setParts = [];
        foreach ($data as $key => $value) {
            $keyEsc   = $this->conn->real_escape_string($key);
            $valueEsc = $this->conn->real_escape_string($value);
            $setParts[] = "`$keyEsc`='$valueEsc'";
        }

        $setString = implode(", ", $setParts);

        $sql = "UPDATE `$table` SET $setString WHERE id='$id'";
        return $this->conn->query($sql);
    }

    // Opsional: DELETE data
    public function delete($table, $id)
    {
        $table = $this->conn->real_escape_string($table);
        $id    = $this->conn->real_escape_string($id);

        $sql = "DELETE FROM `$table` WHERE id='$id'";
        return $this->conn->query($sql);
    }

    // Alias untuk kompatibilitas lama
    public function select($table)
    {
        return $this->getAll($table);
    }
}
?>
