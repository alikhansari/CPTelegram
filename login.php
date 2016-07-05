<?php require('inc/functions.php');
$set = new Settings();
$result = $set->Login();
?>
<!DOCTYPE html>
<html lang="fa">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Ali-Khodabakhshian">
    <title>ورود به پنل مدیریت</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/bootstrap-reset.css" rel="stylesheet">
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link href="css/style.css" rel="stylesheet">
    <link href="css/style-responsive.css" rel="stylesheet" />
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->
</head>

<body class="login-body">
<div class="container">
    <form class="form-signin" action="login.php" method="POST">
        <h2 class="form-signin-heading">همین حالا وارد شوید</h2>
        <div class="login-wrap">
            <input name="username" type="text" class="form-control" value="<?php echo $set->CheckParamPost("username");?>" <?php if(!isset($_POST['username'])) echo "autofocus"; ?> placeholder="نام کاربری"  <>
            <input name="password" type="password" <?php if(!empty($_POST['username'])) echo "autofocus"; ?> class="form-control" placeholder="کلمه عبور">
            <button class="btn btn-lg btn-login btn-block" name="login" type="submit">ورود</button>
            <?php if($result != false)
                    echo "<p> $result </p>";
                ?>
        </div>

    </form>

</div>


</body>
</html>

