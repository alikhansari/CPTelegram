<?php require('inc/functions.php'); $set = new Settings(); $set->IsValidUser(); $group = new Groups(); $message = new Message(); $user = new Users(); $message_5_r = $message->GetLast5Messages(); $user_5_r = $user->GetLast5Users(); ?>
<!DOCTYPE html>
<html lang="fa">
<?php require("inc/head.php"); ?>
<body>
<section id="container" class="">
    <?php require("inc/header.php"); ?>
    <?php require("inc/sidebar.php"); ?>
    <section id="main-content">
        <section class="wrapper">
            <div class="row state-overview">
                <div class="col-lg-3 col-sm-6">
                    <section class="panel">
                        <div class="symbol terques">
                            <i class="icon-user"></i>
                        </div>
                        <div class="value">
                            <h1><?php echo $user->GetUsersCount(); ?></h1>
                            <p>کاربر</p>
                        </div>
                    </section>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <section class="panel">
                        <div class="symbol red">
                            <i class="icon-comments"></i>
                        </div>
                        <div class="value">
                            <h1><?php echo $message->GetMessagesCount();?></h1>
                            <p>پیام</p>
                        </div>
                    </section>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <section class="panel">
                        <div class="symbol yellow">
                            <i class="icon-group"></i>
                        </div>
                        <div class="value">
                            <h1><?php echo $group->GetGroupsCount(); ?></h1>
                            <p>گروه</p>
                        </div>
                    </section>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <section class="panel">
                        <div class="symbol blue">
                            <i class="icon-calendar"></i>
                        </div>
                        <div class="value">
                            <h1><?php echo $message->GetMassMessagesCount(); ?></h1>
                            <p>پیام انبوه</p>
                        </div>
                    </section>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4">
                    <section class="panel">
                        <div class="panel-body">
                            <div class="task-progress">
                                <h1>آخرین کاربران</h1>
                            </div>
                        </div>
                        <?php require("inc/Last5Users.php"); ?>
                    </section>
                </div>
                <div class="col-lg-8">
                    <section class="panel">
                        <div class="panel-body progress-panel">
                            <div class="task-progress">
                                <h1>آخرین پیام ها</h1>
                            </div>
                        </div>
                            <?php require("inc/Last5Messages.php"); ?>
                    </section>
                </div>
            </div>
        </section>
    </section>
</section>
<?php require("inc/footer.php"); ?>
</body>
</html>
