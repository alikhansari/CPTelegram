<?php
class Groups
{
    public $id;
    public $group_id;
    public $group_title;
    public $regdate;

    public function GetGroupsCount ()
    {
        $db = new Database();
        $db->query("SELECT * FROM groups");
        $db->execute();
        return $db->rowCount();
    }
}

?>
