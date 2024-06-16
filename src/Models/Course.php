<?php

namespace App\Models;

use App\Core\Database;
use PDO;

class Course {
    public $id;
    public $name;
    public $start_date;
    public $end_date;
    public $status;

    /**
     * Get all courses.
     *
     * @return array
     */
    public static function all() {
        $db = (new Database())->getConnection();
        $stmt = $db->query("SELECT * FROM courses");
        return $stmt->fetchAll(PDO::FETCH_CLASS, self::class);
    }

    /**
     * Find a course by ID.
     *
     * @param int $id
     * @return Course|null
     */
    public static function find($id) {
        $db = (new Database())->getConnection();
        $stmt = $db->prepare("SELECT * FROM courses WHERE id = :id");
        $stmt->execute(['id' => $id]);
        $stmt->setFetchMode(PDO::FETCH_CLASS, self::class);
        return $stmt->fetch();
    }

    /**
     * Save the current course.
     */
    public function save() {
        $db = (new Database())->getConnection();

        if ($this->id) {
            $stmt = $db->prepare("UPDATE courses SET name = :name, start_date = :start_date, end_date = :end_date, status = :status WHERE id = :id");
            $stmt->execute([
                'id' => $this->id,
                'name' => $this->name,
                'start_date' => $this->start_date,
                'end_date' => $this->end_date,
                'status' => $this->status
            ]);
        } else {
            $stmt = $db->prepare("INSERT INTO courses (name, start_date, end_date, status) VALUES (:name, :start_date, :end_date, :status)");
            $stmt->execute([
                'name' => $this->name,
                'start_date' => $this->start_date,
                'end_date' => $this->end_date,
                'status' => $this->status
            ]);
            $this->id = $db->lastInsertId();
        }
    }

    /**
     * Delete the current course.
     */
    public function delete() {
        $db = (new Database())->getConnection();
        $stmt = $db->prepare("DELETE FROM courses WHERE id = :id");
        $stmt->execute(['id' => $this->id]);
    }
}
?>
