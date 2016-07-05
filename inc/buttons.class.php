<?php
Class Buttons
{
    public $id;
    public $caption;
    public $text;
    public $img_array;
    public $doc_array;
    public $feed_id;
    public $parent_id;
    public $main;
    public $status;
    public $count_display;

    public function GetButtonsCount ()
    {
        $db = new Database();
        $db->query("SELECT * FROM buttons");
        $db->execute();
        return $db->rowCount();
    }
    public function FetchAllButtons ()
    {
        $db = new Database();
        $db->query("SELECT * FROM buttons");
        $db->execute();
        if($db->rowCount() >0 )
            return $db->resultset();
        else
            return false;
    }

    public function FetchButtonName($id)
    {
        $db = new Database();
        $db->query("SELECT * FROM buttons WHERE id = ?");
        $db->bind(1,$id);
        $db->execute();
        if($db->rowCount() == 1)
        {
            $result = $db->single();
            return $result['caption'];
        }
        else
            return null;
    }

    private function FetchButtons($type,$value)
    {
        $db = new Database();
        if($type == "id")
            $db->query("SELECT * FROM buttons WHERE $type = ?");
        elseif($type == "caption")
        {
            $db->query("SELECT * FROM buttons WHERE $type LIKE ?");
            $value="%".$value."%";
        }
        $db->bind(1,$value);
        $db->execute();
        if($db->rowCount() >0)
            return $db->resultset();
        else
            return false;
    }

    public function FetchButton($id)
    {
        $db = new Database();
        $db->query("SELECT * FROM buttons WHERE id = ?");
        $db->bind(1,$id);
        $db->execute();
        if($db->rowCount() == 1)
            return $db->single();
        else
            return null;
    }

    private function UpdateButtons ($id,$feed_id,$caption,$text,$doc_array,$img_array,$parent_id,$main,$status)
    {
        $db = new Database();
        $db->query("UPDATE buttons SET feed_id = ?, caption = ?,text = ?,doc_array = ?,img_array = ?,parent_id = ?,main = ?,status = ? WHERE id = ?");
        $db->bind(1,$feed_id);
        $db->bind(2,$caption);
        $db->bind(3,$text);
        $db->bind(4,$doc_array);
        $db->bind(5,$img_array);
        $db->bind(6,$parent_id);
        $db->bind(7,$main);
        $db->bind(8,$status);
        $db->bind(9,$id);
        $db->execute();
    }

    private function SearchButtonName ($str)
    {
        $db = new Database();
        $db->query("SELECT * FROM buttons WHERE caption = ?");
        $db->bind(1,$str);
        $db->execute();
        if($db->rowCount() > 0)
        {
            $result = $db->single();
            return $result['id'];
        }
        else
        {
            return false;
        }
    }

    private function ParentButtons($type,$value)
    {
        $db = new Database();
        if($type == "name")
        {
            if($this->SearchButtonName($value) != false)
            {
                $value = $this->SearchButtonName($value);
            }
            else
            {
                return false;
            }

        }
        $db->query("SELECT * FROM buttons WHERE parent_id = ?");
        $db->bind(1,$value);
        $db->execute();
        if($db->rowCount() > 0)
            return $db->resultset();
        else
            return false;
    }

    private function DeleteButtons ($id)
    {
        $db = new Database();
        $db->query("DELETE FROM buttons WHERE id = ?");
        $db->bind(1,$id);
        $db->execute();
    }

    public function GetButtonExpectOne($id)
    {
        $db = new Database();
        $db->query("SELECT * FROM buttons WHERE id != ?");
        $db->bind(1,$id);
        $db->execute();
        if($db->rowCount() > 0)
            return $db->resultset();
        else
            return false;
    }

    private function InsertButton ($feed_id,$caption,$text,$doc_array,$img_array,$parent_id,$main,$status)
    {
        $db = new Database();
        $db->query("INSERT INTO buttons (feed_id,caption,text,doc_array,img_array,parent_id,main,status) VALUES (?,?,?,?,?,?,?,?)");
        $db->bind(1,$feed_id);
        $db->bind(2,$caption);
        $db->bind(3,$text);
        $db->bind(4,$doc_array);
        $db->bind(5,$img_array);
        $db->bind(6,$parent_id);
        $db->bind(7,$main);
        $db->bind(8,$status);
        $db->execute();
    }

    public function Button()
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
                    $this->DeleteButtons($result_delete);
                    return "با موفقیت حذف شد";
                }
                else
                {
                    header("location: buttons.php");
                }
            }
            {
                header("location: buttons.php");
            }
        }
        elseif(isset($_POST['EDIT']))
        {
            if($result_edit != null)
            {
                if(isset($_POST['feed_id']) && !empty($_POST['caption']) && !empty($_POST['main']) && !empty($_POST['status']) && !empty($_POST['count_display']) && !empty($_POST['text']))
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
                    $this->caption = $set->Check_Param($_POST['caption']);
                    $this->text = $set->Check_Param($_POST['text']);
                    $this->feed_id = $set->Check_Param($_POST['feed_id']);
                    $this->parent_id = 0;
                    if($this->GetButtonsCount() > 1)
                    {
                        if(!isset($_POST['parent_id']))
                        {
                            return "باید دکمه پدر را انتخاب کنید.";
                        }
                        else
                        {
                            $this->parent_id = $set->Check_Param($_POST['parent_id']);
                        }
                    }
                    $this->main = $set->Check_Param($_POST['main']);
                    $this->status = $set->Check_Param($_POST['status']);
                    $this->count_display = $set->Check_Param($_POST['count_display']);
                    $this->id = $result_edit;
                    if(!is_numeric($this->status) || !is_numeric($this->parent_id) ||!is_numeric($this->feed_id) || !is_numeric($this->main) || !is_numeric($this->count_display))
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
                    if($this->count_display > $set->GetSetting(3))
                    {
                        $msg = 'تعداد باید از '.$set->GetSetting(3).' بیشتر باشد. لطفاً اصلاح فرمایید.';
                        return $msg;
                    }
                    if($this->parent_id == $result_edit)
                    {
                        $this->parent_id = 0;
                    }
                    switch($this->main)
                    {
                        case 1:
                            $this->main = 1;
                            break;
                        case 2:
                            $this->main = 0;
                            break;
                    }
                    switch($this->status)
                    {
                        case 1:
                            $this->status = 1;
                            break;
                        case 2:
                            $this->status = 0;
                            break;
                    }
                    $this->UpdateButtons($this->id,$this->feed_id,$this->caption,$this->text,$this->doc_array,$this->img_array,$this->parent_id,$this->main,$this->status);
                    return "با موفقیت بروز شد.";

                }
                else
                {
                    return "تمامی مقادیر متن، نام، دکمه ها باید بررسی شوند.";
                }
            }
            else
            {
                header("location: buttons.php");
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
                                $result = $this->FetchButtons("id",$value);
                                if($result != false)
                                {
                                    return $result;
                                }
                                else
                                    return "چیزی یافت نشد.";
                            }
                            break;
                        case 2:
                            $result = $this->FetchButtons("caption",$value);
                            if($result != false)
                            {
                                return $result;
                            }
                            else
                                return "چیزی یافت نشد.";
                            break;
                        case 3:
                            if(!is_numeric($value))
                            {
                                return "چیزی یافت نشد.";
                            }
                            else
                            {
                                $result = $this->ParentButtons("id",$value);
                                if($result != false)
                                {
                                    return $result;
                                }
                                else
                                    return "چیزی یافت نشد.";
                            }
                            break;
                        case 4:
                            $result = $this->ParentButtons("name",$value);
                            if($result != false)
                            {
                                return $result;
                            }
                            else
                                return "چیزی یافت نشد.";                            break;
                        default:
                            header("location: buttons.php?search");
                    }
                }
            }
            else
            {
                header("location: buttons.php?search");
            }
        }
        elseif(isset($_GET['search']))
        {
            return false;
        }
        elseif(isset($_POST['ADD']))
        {
            if(isset($_GET['add']))
            {
                if(isset($_POST['feed_id']) && !empty($_POST['caption']) && !empty($_POST['main']) && !empty($_POST['status']) && !empty($_POST['count_display']) && !empty($_POST['text']))
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
                    $this->caption = $set->Check_Param($_POST['caption']);
                    $this->text = $set->Check_Param($_POST['text']);
                    $this->feed_id = $set->Check_Param($_POST['feed_id']);
                    $this->parent_id = 0;
                    if($this->GetButtonsCount() != 0)
                    {
                        if(!isset($_POST['parent_id']))
                        {
                            return "باید دکمه پدر را انتخاب کنید.";
                        }
                        else
                        {
                            $this->parent_id = $set->Check_Param($_POST['parent_id']);
                        }
                    }
                    $this->main = $set->Check_Param($_POST['main']);
                    $this->status = $set->Check_Param($_POST['status']);
                    $this->count_display = $set->Check_Param($_POST['count_display']);
                    $this->id = $result_edit;
                    if(!is_numeric($this->status) || !is_numeric($this->parent_id) ||!is_numeric($this->feed_id) || !is_numeric($this->main) || !is_numeric($this->count_display))
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
                    if($this->count_display > $set->GetSetting(3))
                    {
                        $msg = 'تعداد باید از '.$set->GetSetting(3).' بیشتر باشد. لطفاً اصلاح فرمایید.';
                        return $msg;
                    }
                    switch($this->main)
                    {
                        case 1:
                            $this->main = 1;
                            break;
                        case 2:
                            $this->main = 0;
                            break;
                    }
                    switch($this->status)
                    {
                        case 1:
                            $this->status = 1;
                            break;
                        case 2:
                            $this->status = 0;
                            break;
                    }
                    $this->InsertButton($this->feed_id,$this->caption,$this->text,$this->doc_array,$this->img_array,$this->parent_id,$this->main,$this->status);
                    return "با موفقیت افزوده شد.";
                }
                else
                {
                    return "همه موارد را وارد کنید.";
                }
            }
            else
            {
                header("location: buttons.php?add");
            }
        }
        elseif(isset($_GET['add']))
        {
            return false;
        }
        elseif($result_id != null && intval($result_id) > 0)
        {
            return $this->FetchButton($result_id);
        }
        elseif($result_edit != null && intval($result_edit) > 0)
        {
            return $this->FetchButton($result_edit);

        }
        elseif($result_delete != null && intval($result_delete) > 0)
        {
            return $this->FetchButton($result_delete);
        }
    }
}
?>