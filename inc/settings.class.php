<?php
class Settings {
    public $id;
    public $username;
    public $password;

    public function __construct()
    {
        if($this->Access())
        {
            $this->username = $_SESSION['username'];
            $this->password = $_SESSION['password'];
        }
    }

    public function ChangePassword()
    {
        if (isset($_POST['CHANGE_PASSWORD']))
        {
            if(!empty($_POST['current_password']) && !empty($_POST['new_password']))
            {
                $c = $this->Check_Param($_POST['current_password']);
                $p = $this->Check_Param($_POST['new_password']);
                if($c != $p)
                {
                    $c = $this->hashcode($c);
                    $p = $this->hashcode($p);
					$r = $this->GetUsernameAdmin();
                    if($this->ValidateAdmin($r['username'],$c) != false)
                    {
                        $db = new Database();
                        $db->query("UPDATE telegram_admin SET password = ? WHERE id = 1");
                        $db->bind(1,$p);
                        $db->execute();
                        return "رمز عبور تغییر پیدا کرد.";
                    }
                    else
                    {
                        return "رمز عبور فعلی اشتباه است.";
                    }
                }
                else
                {
                    return "رمز عبور جدید و قدیمی نباید یکسان باشند.";
                }
            }
            else
            {
                return "هر دو مقدار رمز عبور را وارد کنید.";
            }
        }
        else
        {
            return false;
        }
    }

    public function ChangeUsername ()
    {
        if(isset($_POST['CHANGE_USERNAME']))
        {
            if(!empty($_POST['username']))
            {
                $username = $this->Check_Param($_POST['username']);
                $db = new Database();
                $db->query("UPDATE telegram_admin SET username = ? WHERE id = 1");
                $db->bind(1,$username);
                $db->execute();
                return "ذخیره شد.";
            }
            else
            {
                return "نام کاربری نباید خالی باشد.";
            }
        }
        else
        {
            return false;
        }
    }

    public function GetUsernameAdmin ()
    {
        $db = new Database();
        $db->query("SELECT username FROM telegram_admin WHERE id = 1");
        $db->execute();
        return $db->single();
    }

    public function FetchCols ($id)
    {
        $db = new Database();
        $db->query("SELECT * FROM general_options WHERE id = ?");
        $db->bind(1,$id);
        $db->execute();
        $result = $db->single();
        return $result['info'];
    }

    public function Change_Cols ()
    {
        if(isset($_POST['CHANGE_COLS']))
        {
            if(!empty($_POST['main']) && !empty($_POST['sub']))
            {
                $main = $this->Check_Param($_POST['main']);
                $sub = $this->Check_Param($_POST['sub']);
                $db1 = new Database();
                $db1->query("UPDATE general_options SET info = ? WHERE id = 1");
                $db1->bind(1,$main);
                $db1->execute();
                $db2 = new Database();
                $db2->query("UPDATE general_options SET info = ? WHERE id = 2");
                $db2->bind(1,$sub);
                $db2->execute();
                return "ذخیره شد.";
            }
            else
            {
                return "ستون ها نباید خالی باشند.";
            }
        }
        else
        {
            return false;
        }
    }

    public function IsValidUser ()
    {
        session_start();
        if(!$this->Access())
        {
            header("location: login.php?access=false");
        }
    }

    public function Change_Start_Message ()
    {
        if(isset($_POST['CHANGE_MSG']))
        {
            if(!empty($_POST['msg']))
            {
                $msg = $this->Check_Param($_POST['msg']);
                $db = new Database();
                $db->query("UPDATE static_info SET body = ? WHERE id = 1");
                $db->bind(1,$msg);
                $db->execute();
                return "ذخیره شد.";
            }
            else
            {
                return "پیغام نباید خالی باشد";
            }
        }
        return false;
    }

    public function Login ()
    {
        session_start();
        if(isset($_GET['access']) && !$this->Access())
        {
            if($_GET['access'] == "false")
            {
                return "لطفاً ابتدا وارد سایت شوید";
            }
        }
        elseif(isset($_GET['logout']))
        {
            if($_GET['logout'] == "true")
            {
                session_destroy();
                return "با موفقیت خارج شدید";
            }
        }
        elseif($this->Access())
        {
            header("location: index.php");
        }
        elseif(isset($_POST['login']))
        {
            if(isset($_POST['username']) && isset($_POST['password']))
            {
                if(!empty($_POST['username']) && !empty($_POST['password']))
                {
                    $this->username = $this->Check_Param($_POST['username']);
                    $this->password = $this->hashcode($this->Check_Param($_POST['password']));
                    $result = $this->ValidateAdmin($this->username,$this->password);
                    if($result != false)
                    {
                        $_SESSION['username']= $this->username;
                        $_SESSION['password'] = $this->password;
                        header("location: index.php");
                    }
                    else
                    {
                        return "رمزعبور / نام کاربری نادرست است";
                    }
                }
                return "نام کاربری / رمز عبور را وارد کنید";
            }
            else
                return false;
        }
        return false;
    }

    public function GetSetting ($id)
    {
        $db = new Database();
        $db->query("SELECT * FROM static_info WHERE id = ?");
        $db->bind(1,$id);
        $db->execute();
        if($db->rowCount() == 1)
        {
            $result = $db->single();
            return $result['body'];
        }
        else
            return false;
    }

    public function ValidateAdmin ($username,$password)
    {
        $db = new Database();
        $db->query("SELECT * FROM telegram_admin WHERE username = ? AND password = ?");
        $db->bind(1,$username);
        $db->bind(2,$password);
        $db->execute();
        if($db->rowCount() == 1)
            return $db->single();
        else
            return false;
    }

    public function Access ()
    {
        if(isset($_SESSION['username']) && isset($_SESSION['password']))
            return true;
        return false;
    }

    public function hashcode ($pass)
    {
        return hash("sha512", md5(sha1(md5($pass))));
    }

    public function Check_Param ($string)
    {
        $string = htmlspecialchars($string);
        $string = strip_tags($string);
        return $string;
    }

    public function CheckParamPost ($str)
    {
        if(isset($_POST[$str]))
        {
            $str = $_POST[$str];
            return $this->Check_Param($str);
        }
        else
        {
            return null;
        }
    }

    public function CheckParamGet ($str)
    {
        if(isset($_GET[$str]))
        {
            $str = $_GET[$str];
            return $this->Check_Param($str);
        }
        else
        {
            return null;
        }
    }
}
?>