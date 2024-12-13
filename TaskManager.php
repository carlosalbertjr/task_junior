<?php
class TaskManager {
    private $tasks = [];

    public function addTask($task) {
        $this->tasks[$task->id] = $task;
    }

    public function getTasks() {
        return $this->tasks;
    }

    public function getTaskById($id) {
        return $this->tasks[$id] ?? null;
    }

    public function editTask($id, $title, $description, $status) {
        if (isset($this->tasks[$id])) {
            $this->tasks[$id]->title = $title;
            $this->tasks[$id]->description = $description;
            $this->tasks[$id]->status = $status;
        }
    }

    public function deleteTask($id) {
        if (array_key_exists($id, $this->tasks)) {
            unset($this->tasks[$id]);
        }
    }        
}
?>
