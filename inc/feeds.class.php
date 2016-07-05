<?php
class Feeds
{
    public $id;
    public $url;
    public $cnt;

    public function GetFeedsCount ()
    {
        $db = new Database();
        $db->query("SELECT * FROM feeds");
        $db->execute();
        return $db->rowCount();
    }

    public function CheckIsAvailable ($id)
    {
        $db = new Database();
        $db->query("SELECT * FROM feeds WHERE id = ?");
        $db->bind(1,$id);
        $db->execute();
        if($db->rowCount() == 1)
            return true;
        else
            return false;
    }

    public function FetchFeed ($id)
    {
        $db = new Database();
        $db->query("SELECT * FROM feeds WHERE id = ?");
        $db->bind(1,$id);
        $db->execute();
        if($db->rowCount() == 1)
            return $db->single();
        else
            return false;
    }

    private function UpdateFeed($id,$url,$cnt)
    {
        $db = new Database();
        $db->query("UPDATE feeds SET url = ?, cnt = ? WHERE id = ?");
        $db->bind(1,$url);
        $db->bind(2,$cnt);
        $db->bind(3,$id);
        $db->execute();
    }

    private function InsertFeed ($url,$cnt)
    {
        $db = new Database();
        $db->query("INSERT INTO feeds (url, cnt) VALUES (?,?)");
        $db->bind(1,$url);
        $db->bind(2,$cnt);
        $db->execute();
        return $db->lastInsertId();
    }

    private function FetchFeeds($type,$value)
    {
        $db = new Database();
        if($type == "id")
            $db->query("SELECT * FROM feeds WHERE $type = ?");
        elseif($type == "url")
        {
            $db->query("SELECT * FROM feeds WHERE $type LIKE ?");
            $value="%".$value."%";
        }
        $db->bind(1,$value);
        $db->execute();
        if($db->rowCount() >0)
            return $db->resultset();
        else
            return false;
    }

    private function DeleteFeed ($id)
    {
        $db = new Database();
        $db->query("DELETE FROM feeds WHERE id = ?");
        $db->bind(1,$id);
        $db->execute();
    }


    public function feed ()
    {
        $set = new Settings();
        $result_id = $set->CheckParamGet("id");
        $result_edit = $set->CheckParamGet("edit");
        $result_delete = $set->CheckParamGet("delete");
        if(isset($_POST['DELETE']))
        {
            if($result_delete != null)
            {
                if(is_numeric($result_delete) && intval($result_delete) > 0)
                {
                    $this->DeleteFeed($result_delete);
                    return "با موفقیت حذف شد";
                }
                else
                {
                    header("location: feeds.php");
                }
            }
            {
                header("location: feeds.php");
            }
        }
        elseif(isset($_POST['ADD']))
        {
            if(isset($_GET['add']))
            {
                if(!empty($_POST['url']) && !empty($_POST['cnt']))
                {
                    $this->url = $set->Check_Param($_POST['url']);
                    $this->cnt = $set->Check_Param($_POST['cnt']);
                    if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$this->url)) {
                        return "یک آدرس معتبر وارد کنید.";
                    }

                    if(!is_numeric($this->cnt) && intval($this->cnt) < 1)
                    {
                        return "یکی از مقادیر نادرست وارد شده اند.";
                    }
                    $id = $this->InsertFeed($this->url,$this->cnt);
                    return "فید شماره $id با موفقیت ایجاد شد.";
                }
                else
                {
                    return "همه موارد را وارد کنید.";
                }
            }
            else
            {
                header("location: feeds.php?add");
            }
        }
        elseif(isset($_POST['SEARCH']))
        {
            if(isset($_GET['search']))
            {
                if(isset($_POST['value']) && isset($_POST['TYPE']))
                {
                    $value = $set->Check_Param($_POST['value']);
                    $type = $set->Check_Param($_POST['TYPE']);
                    if(!is_numeric($type))
                    {
                        return "چیزی یافت نشد.";
                    }
                    switch($type)
                    {
                        case 1:
                            if(!is_numeric($value))
                            {
                                return "چیزی یافت نشد.";
                            }
                            else
                            {
                                $result = $this->FetchFeeds("id",$value);
                                if($result != false)
                                {
                                    return $result;
                                }
                                else
                                    return "چیزی یافت نشد.";
                            }
                            break;
                        case 2:
                            $result = $this->FetchFeeds("url",$value);
                            if($result != false)
                            {
                                return $result;
                            }
                            else
                                return "چیزی یافت نشد.";
                            break;
                        default:
                            header("location: feeds.php?search");
                    }
                }
            }
        }
        elseif(isset($_GET['search']))
        {
            return false;
        }
        elseif(isset($_GET['add']))
        {
            return false;
        }
        elseif(isset($_POST['EDIT']))
        {
            if($result_edit != null)
            {
                if(!empty($_POST['url']) && !empty($_POST['cnt']))
                {
                    $this->url = $set->Check_Param($_POST['url']);
                    $this->cnt = $set->Check_Param($_POST['cnt']);
                    if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$this->url)) {
                        return "یک آدرس معتبر وارد کنید.";
                    }

                    if(!is_numeric($this->cnt) && intval($this->cnt) < 1)
                    {
                        return "یکی از مقادیر نادرست وارد شده اند.";
                    }

                    $this->UpdateFeed($result_edit,$this->url,$this->cnt);
                    return "دستور با موفقیت بروز شد.";
                }
                else
                {
                    return "یکی از فیلد ها را پر نکرده اید.";
                }
            }
            else
            {
                header("location: feeds.php");
            }
        }
        elseif($result_id != null && intval($result_id) > 0)
        {
            return $this->FetchFeed($result_id);
        }
        elseif($result_edit != null && intval($result_edit) > 0)
        {
            return $this->FetchFeed($result_edit);

        }
        elseif($result_delete != null && intval($result_delete) > 0)
        {
            return $this->FetchFeed($result_delete);
        }
    }
}
?>