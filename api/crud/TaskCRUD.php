<?php
include_once 'api/config/Database.php';

class TaskCRUD {
    static function read($id): int {
        $query = "SELECT title, data, created FROM task WHERE id = $id";
        $stmt = Database::getConnection()->prepare($query);
        $stmt->execute();

        $num = $stmt->rowCount();

        if ($num > 0) {
            echo json_encode(self::getTask($stmt->fetch(PDO::FETCH_ASSOC)));
        }
        return 200;
    }

    static function readAll(): int {
        $statement = self::execute("SELECT id, title, data, created FROM task");
        $num = $statement->rowCount();

        if ($num > 0) {
            $tasks = [];

            while ($row = $statement->fetch(PDO::FETCH_ASSOC)){
                array_push($tasks, self::getTask($row));
            }
            echo json_encode($tasks);
        }
        return 200;
    }

    public static function delete(int $id) {
        self::execute("DELETE FROM task WHERE id = $id");
        return 200;
    }

    public static function create($title, $data): int {
        self::execute("INSERT INTO task (title, data) VALUES ('$title', '$data')");
        return 200;
    }

    public static function update(int $id, $title, $data) {
        self::execute("UPDATE task SET title = '$title', data = '$data' WHERE id = $id");
        return 200;
    }

    private static function execute($query) {
        $statement = Database::getConnection()->prepare($query);
        $statement->execute();
        return $statement;
    }

    private static function getTask($row): array {
        extract($row);
        return [
            'id' => $id,
            'title' => $title,
            'data' => $data,
            'created' => $created
        ];
    }
}