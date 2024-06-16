<?php

namespace App\Models;

use App\Core\Database;
use PDO;

class UserCourse {
    public $id;
    public $user_id;
    public $course_id;
    public $name;
    public $start_date;
    public $end_date;
    public $status;

    /**
     * Get all user courses for a specific user.
     *
     * @param int $user_id
     * @return array
     */
    public static function allForUser($user_id) {
        $db = (new Database())->getConnection();
        $stmt = $db->prepare("SELECT uc.*, c.status FROM user_courses uc JOIN courses c ON uc.course_id = c.id WHERE uc.user_id = :user_id");
        $stmt->execute(['user_id' => $user_id]);
        return $stmt->fetchAll(PDO::FETCH_CLASS, self::class);
    }

    /**
     * Find a user course by ID.
     *
     * @param int $id
     * @return UserCourse|null
     */
    public static function find($id) {
        $db = (new Database())->getConnection();
        $stmt = $db->prepare("SELECT uc.*, c.status FROM user_courses uc JOIN courses c ON uc.course_id = c.id WHERE uc.id = :id");
        $stmt->execute(['id' => $id]);
        $stmt->setFetchMode(PDO::FETCH_CLASS, self::class);
        return $stmt->fetch();
    }

    /**
     * Save the current user course.
     */
    public function save() {
        $db = (new Database())->getConnection();

        if ($this->id) {
            $stmt = $db->prepare("UPDATE user_courses SET name = :name, start_date = :start_date, end_date = :end_date WHERE id = :id");
            $stmt->execute([
                'id' => $this->id,
                'name' => $this->name,
                'start_date' => $this->start_date,
                'end_date' => $this->end_date
            ]);
        } else {
            $stmt = $db->prepare("INSERT INTO user_courses (user_id, course_id, name, start_date, end_date) VALUES (:user_id, :course_id, :name, :start_date, :end_date)");
            $stmt->execute([
                'user_id' => $this->user_id,
                'course_id' => $this->course_id,
                'name' => $this->name,
                'start_date' => $this->start_date,
                'end_date' => $this->end_date
            ]);
            $this->id = $db->lastInsertId();
        }
    }

    /**
     * Delete the current user course.
     */
    public function delete() {
        $db = (new Database())->getConnection();
        $stmt = $db->prepare("DELETE FROM user_courses WHERE id = :id");
        $stmt->execute(['id' => $this->id]);
    }
}
?>
