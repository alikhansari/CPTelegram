<?php
class Message
{
    public $id;
    public $update_id;
    public $msg_id;
    public $user_id;
    public $msg_body;
    public $chat_id;
    public $username;

    private function FetchMessage($id)
    {
        $db = new Database();
        $db->query("SELECT * FROM message_log WHERE msg_id = ?");
        $db->bind(1,$id);
        $db->execute();
        if($db->rowCount() == 1)
            return $db->single();
        else
            return false;
    }

    private function FetchMassMessage ($id)
    {
        $db = new Database();
        $db->query("SELECT * FROM mass_mess WHERE id = ?");
        $db->bind(1,$id);
        $db->execute();
        if($db->rowCount() == 1)
            return $db->single();
        else
            return false;
    }

    public function GetMessagesCount ()
    {
        $db = new Database();
        $db->query("SELECT * FROM message_log");
        $db->execute();
        return $db->rowCount();
    }

    public function GetMassMessagesCount ()
    {
        $db = new Database();
        $db->query("SELECT * FROM mass_mess");
        $db->execute();
        return $db->rowCount();
    }

    public function GetLast5Messages ()
    {
        $db = new Database();
        $db->query("SELECT * FROM message_log WHERE msg_body !='' ORDER BY id DESC LIMIT 10");
        $db->execute();
        return $db->resultset();
    }

    public function GetMessages ()
    {
        $limit = 20;
        $d1 = new Database();
        $set = new Settings();
        if(isset($_GET['id']))
        {
            $id = $set->Check_Param($_GET['id']);
            if(!is_numeric($id) || intval($id) < 0)
            {
                header("location: messages.php?a");
            }
            $result = $this->FetchMessage($id);
            if($result != false)
            {
                return $result;
            }
            else
            {
                header("location: messages.php?b");
            }

        }
        elseif(isset($_GET['mass_id']))
        {
            $id = $set->Check_Param($_GET['mass_id']);
            if(!is_numeric($id) || intval($id) < 0)
            {
                header("location: messages.php?a");
            }
            $result = $this->FetchMassMessage($id);
            if($result != false)
            {
                return $result;
            }
            else
            {
                header("location: messages.php?b");
            }
        }
        elseif(isset($_GET['user']))
        {
            if(isset($_POST['SEARCH']))
            {
                if(!empty($_POST['search_value']))
                {
                    $value = $set->Check_Param($_POST['search_value']);
                    $db = new Database();
                    $db->query("SELECT * FROM message_log WHERE user_id = ? AND msg_body != '' ORDER BY regdate DESC");
                    $db->bind(1,$value);
                    $db->execute();
                    if($db->rowCount() > 0)
                    {
                        return $db->resultset();
                    }
                    else
                    {
                        return 2;
                    }
                }
            }
            return false;
        }
        elseif(isset($_GET['search']))
        {
            if(isset($_POST['SEARCH']))
            {
                if(!empty($_POST['search_value']))
                {
                    $value = $set->Check_Param($_POST['search_value']);
                    $db = new Database();
                    $db->query("SELECT * FROM message_log WHERE msg_body LIKE ? ORDER BY regdate DESC LIMIT 20");
                    $db->bind(1,"%".$value."%");
                    $db->execute();
                    if($db->rowCount() > 0)
                    {
                        return $db->resultset();
                    }
                    else
                    {
                        return 2;
                    }
                }
            }
            return false;
        }
        elseif(isset($_POST['SHOW_FROM_TO']))
        {
            if(empty($_POST['to']) || empty($_POST['from']))
            {
                return array(1,"لطفاً مقدار مورد نظر را وارد کنید.");
            }
            $limit = $set->Check_Param($_POST['from']);
            $to = $set->Check_Param($_POST['to']);
            if(!is_numeric($limit) || intval($limit) < 1 || !is_numeric($to) || intval($to) < 0)
            {
                return array(1,"لطفاً یک عدد را وارد کنید.");
            }
            $d1->query("SELECT * FROM message_log WHERE msg_body != '' ORDER BY id DESC LIMIT $limit, $to");
            $d1->execute();
            return array(0,$d1->resultset());


        }
        elseif(isset($_POST['SHOW_NUMBER']))
        {
            if(empty($_POST['number']))
            {
                return array(1,"لطفاً مقدار مورد نظر را وارد کنید.");
            }
            $limit = $set->Check_Param($_POST['number']);
            if(!is_numeric($limit) || intval($limit) < 1)
            {
                return array(1,"لطفاً یک عدد را وارد کنید.");
            }
            $d1->query("SELECT * FROM message_log WHERE msg_body != '' ORDER BY id DESC LIMIT $limit");
            $d1->execute();
            return array(0,$d1->resultset());
        }
        else
        {
            $d1->query("SELECT * FROM message_log WHERE msg_body != '' ORDER BY id DESC LIMIT $limit");
            $d1->execute();
            return array(0,$d1->resultset());
        }
    }

}

?>