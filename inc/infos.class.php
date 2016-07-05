<?php
class Infos
{
    //id,key_array,msg,img_array,doc_array,feed_id,regdate
    public $id;
    public $key_array;
    public $msg;
    public $img_array;
    public $doc_array;
    public $feed_id;
    public $regdate;
    public $count_display;

    public function GetInfosCount ()
    {
        $db = new Database();
        $db->query("SELECT * FROM infos");
        $db->execute();
        return $db->rowCount();
    }

    private function UpdateInfo ($id,$key_array,$msg,$img_array,$doc_array,$feed_id)
    {
        $db = new Database();
        $db->query("UPDATE infos SET key_array = ?,msg = ?,img_array = ?,doc_array = ?,feed_id = ? WHERE id = ?");
        $db->bind(1,$key_array);
        $db->bind(2,$msg);
        $db->bind(3,$img_array);
        $db->bind(4,$doc_array);
        $db->bind(5,$feed_id);
        $db->bind(6,$id);
        $db->execute();
    }
    private function InsertInfo ($key_array,$msg,$img_array,$doc_array,$feed_id)
    {
        $db = new Database();
        $db->query("INSERT INTO infos (key_array,msg,img_array,doc_array,feed_id,regdate) VALUES (?,?,?,?,?,?)");
        $db->bind(1,$key_array);
        $db->bind(2,$msg);
        $db->bind(3,$img_array);
        $db->bind(4,$doc_array);
        $db->bind(5,$feed_id);
        $db->bind(6,idate("U"));
        $db->execute();
    }

    private function FetchInfo($id)
    {
        $db = new Database();
        $db->query("SELECT * FROM infos WHERE id = ?");
        $db->bind(1,$id);
        $db->execute();
        if($db->rowCount() == 1)
            return $db->single();
        else
            return false;
    }

    private function DeleteInfos ($id)
    {
        $db = new Database();
        $db->query("DELETE FROM infos WHERE id = ?");
        $db->bind(1,$id);
        $db->execute();
    }
    private function FetchInfos($type,$value)
    {
        $db = new Database();
        if($type == "id")
            $db->query("SELECT * FROM infos WHERE $type = ?");
        elseif($type == "key_array")
        {
            $db->query("SELECT * FROM infos WHERE $type LIKE ?");
            $value="%".$value."%";
        }
        $db->bind(1,$value);
        $db->execute();
        if($db->rowCount() >0)
            return $db->resultset();
        else
            return false;
    }

    public function inf ()
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
                    $this->DeleteInfos($result_delete);
                    return "با موفقیت حذف شد";
                }
                else
                {
                    header("location: infos.php");
                }
            }
            {
                header("location: infos.php");
            }
        }
        elseif(isset($_POST['ADD']))
        {
            if(isset($_GET['add']))
            {
                if(isset($_POST['feed_id']) && !empty($_POST['key_array']) && isset($_POST['msg']) && !empty($_POST['count_display']))
                {
                    if(!empty($_POST['doc_array']))
                    {
                        $this->doc_array = $set->Check_Param($_POST['doc_array']);
                    }
                    else
                    {
                        $this->doc_array = "";
                    }
                    if(!empty($_POST['img_array']))
                    {
                        $this->img_array = $set->Check_Param($_POST['img_array']);
                    }
                    else
                    {
                        $this->img_array = "";
                    }
                    $this->feed_id = $set->Check_Param($_POST['feed_id']);
                    $this->key_array = $set->Check_Param($_POST['key_array']);
                    $this->msg = $set->Check_Param($_POST['msg']);
                    $this->count_display = $set->Check_Param($_POST['count_display']);
                    if(!is_numeric($this->feed_id) || !is_numeric($this->count_display))
                    {
                        return "یکی از مقادیر نادرست وارد شده اند.";
                    }
                    if($this->feed_id != 0)
                    {
                        $feed = new Feeds();
                        if(!$feed->CheckIsAvailable($this->feed_id))
                        {
                            return "این کد فید وجود ندارد.";
                        }
                    }
                    if($this->count_display > $set->GetSetting(4))
                    {
                        $msg = 'تعداد باید از '.$set->GetSetting(4).' بیشتر باشد. لطفاً اصلاح فرمایید.';
                        return $msg;
                    }

                    $this->InsertInfo($this->key_array,$this->msg,$this->img_array,$this->doc_array,$this->feed_id);
                    return "با موفقیت افزوده شد.";
                }
                else
                {
                    return "همه موارد را وارد کنید.";
                }
            }
            else
            {
                header("location: infos.php?add");
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
                                $result = $this->FetchInfos("id",$value);
                                if($result != false)
                                {
                                    return $result;
                                }
                                else
                                    return "چیزی یافت نشد.";
                            }
                            break;
                        case 2:
                            $result = $this->FetchInfos("key_array",$value);
                            if($result != false)
                            {
                                return $result;
                            }
                            else
                                return "چیزی یافت نشد.";
                            break;
                        default:
                            header("location: infos.php?search");
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
                if(isset($_POST['feed_id']) && !empty($_POST['key_array']) && !empty($_POST['msg']) && !empty($_POST['count_display']))
                {
                    if(!empty($_POST['doc_array']))
                    {
                        $this->doc_array = $set->Check_Param($_POST['doc_array']);
                    }
                    else
                    {
                        $this->doc_array = "";
                    }
                    if(!empty($_POST['img_array']))
                    {
                        $this->img_array = $set->Check_Param($_POST['img_array']);
                    }
                    else
                    {
                        $this->img_array = "";
                    }
                    $this->feed_id = $set->Check_Param($_POST['feed_id']);
                    $this->key_array = $set->Check_Param($_POST['key_array']);
                    $this->msg = $set->Check_Param($_POST['msg']);
                    $this->count_display = $set->Check_Param($_POST['count_display']);

                    if(!is_numeric($this->feed_id) || !is_numeric($this->count_display))
                    {
                        return "یکی از مقادیر نادرست وارد شده اند.";
                    }
                    if($this->count_display > $set->GetSetting(4))
                    {
                        $msg = 'تعداد باید از '.$set->GetSetting(4).' بیشتر باشد. لطفاً اصلاح فرمایید.';
                        return $msg;
                    }
                    if($this->feed_id != 0)
                    {
                        $feed = new Feeds();
                        if(!$feed->CheckIsAvailable($this->feed_id))
                        {
                            return "این کد فید وجود ندارد.";
                        }
                    }
                    $this->UpdateInfo($result_edit,$this->key_array,$this->msg,$this->img_array,$this->doc_array,$this->feed_id);
                    return "دستور با موفقیت بروز شد.";
                }
                else
                {
                    return "یکی از فیلد ها را پر نکرده اید.";
                }
            }
            else
            {
                header("location: infos.php");
            }
        }
        elseif($result_id != null && intval($result_id) > 0)
        {
            return $this->FetchInfo($result_id);
        }
        elseif($result_edit != null && intval($result_edit) > 0)
        {
            return $this->FetchInfo($result_edit);

        }
        elseif($result_delete != null && intval($result_delete) > 0)
        {
            return $this->FetchInfo($result_delete);
        }
    }

}
?>