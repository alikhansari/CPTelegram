<?php
class Users
{
    public $user_id;
    public $username;
    public $sub;
    public $regdate;

    public function GetUsersCount ()
    {
        $db = new Database();
        $db->query("SELECT * FROM users");
        $db->execute();
        return $db->rowCount();
    }

    public function GetLast5Users ()
    {
        $db = new Database();
        $db->query("SELECT * FROM users ORDER BY id DESC LIMIT 10");
        $db->execute();
        return $db->resultset();

    }

    private function FetchUsers ($id)
    {
        $db = new Database();
        $db->query("SELECT * FROM users WHERE user_id = ?");
        $db->bind(1,$id);
        $db->execute();
        if($db->rowCount() == 1)
            return $db->single();
        else
            return false;
    }

    public function SearchUser ()
    {
        $set = new Settings();
        $result = $set->CheckParamGet("id");
        if($result != null)
        {
            $result = $this->FetchUsers($result);
            return $result;
        }
    }
}

?>