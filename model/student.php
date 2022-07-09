<?php
class Student {
    public $id;
    public $name;
    public $birth_date;
    public $teacher;
    public $start_date;
    public $user_id;
    public $group_id;

    public function __construct($id=null, $name=null, $birth_date=null, $teacher, $start_date, $user_id, $group_id)
    {
        $this->id = $id;
        $this->name = $name;
        $this->birth_date = $birth_date;
        $this->teacher = $teacher;
        $this->start_date = $start_date;
        $this->user_id = $user_id;
        $this->group_id = $group_id;
    }

}
?>