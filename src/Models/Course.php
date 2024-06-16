<?php

namespace App\Models;

use PDO;

class Course extends Model {
    public $id;
    public $name;
    public $start_date;
    public $end_date;
    public $status;

    public function __construct() {
        parent::__construct();
    }

    /**
     * Get all courses.
     *
     * @return array
     */
    public function all() {
        $stmt = $this->getConnection()->query("SELECT * FROM courses");
        return $stmt->fetchAll(PDO::FETCH_CLASS, self::class);
    }

    /**
     * Find a course by ID.
     *
     * @param int $id
     * @return Course|null
     */
    public function find($id) {
        $stmt = $this->getConnection()->prepare("SELECT * FROM courses WHERE id = :id");
        $stmt->execute(['id' => $id]);
        $stmt->setFetchMode(PDO::FETCH_CLASS, self::class);
        return $stmt->fetch();
    }

    /**
     * Save the current course.
     */
    public function save() {
        if ($this->id) {
            $stmt = $this->getConnection()->prepare("UPDATE courses SET name = :name, start_date = :start_date, end_date = :end_date, status = :status WHERE id = :id");
            $stmt->execute([
                'id' => $this->id,
                'name' => $this->name,
                'start_date' => $this->start_date,
                'end_date' => $this->end_date,
                'status' => $this->status
            ]);
        } else {
            $stmt = $this->getConnection()->prepare("INSERT INTO courses (name, start_date, end_date, status) VALUES (:name, :start_date, :end_date, :status)");
            $stmt->execute([
                'name' => $this->name,
                'start_date' => $this->start_date,
                'end_date' => $this->end_date,
                'status' => $this->status
            ]);
            $this->id = $this->getConnection()->lastInsertId();
        }
    }

    /**
     * Delete the current course.
     */
    public function delete() {
        $stmt = $this->getConnection()->prepare("DELETE FROM courses WHERE id = :id");
        $stmt->execute(['id' => $this->id]);
    }
}
?>
