<?php
class Task {
    public $id;
    public $title;
    public $description;
    public $status;

    public function __construct($id, $title, $description, $status = 'Pendente') {
        $this->id = $id;
        $this->title = $title;
        $this->description = $description;
        $this->status = $status;
    }

    public function markAsComplete() {
        $this->status = 'Concluído';
    }
}
?>
