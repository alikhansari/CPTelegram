<section id="main-content">
    <section class="wrapper">
        <div class="row">
            <div class="col-lg-12">
                <section class="panel">
                    <div class="panel-body">
                        <form action="messages.php?user" method="POST" class="form-horizontal" role="form">
                            <div class="form-group">
                                <label for="search_value" class="col-lg-2 control-label">شماره ارسال کننده : </label>
                                <div class="col-lg-10">
                                    <input name="search_value" required type="text" value="<?php echo $set->CheckParamPost("search_value");?>" class="form-control" id="search_value" placeholder="جستجوی کلمه ی مورد نظر ...">
                                    <p class="help-block">عبارت خود را وارد کنید.</p>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-lg-offset-2 col-lg-10">
                                    <button name="SEARCH" type="submit" class="btn btn-danger">جستجو</button>
                                </div>
                            </div>
                        </form>
                </section>
            </div>
        </div>
        <?php if ($msg_r_messages == 2)
        {
        ?>
        <div class="row">
            <section class="panel">
                <div class="panel-body">
                    <div class="col-lg-12">
                        <section class="panel">
                            <header class="panel-heading">یافت نشد.</header>
                            <?php
                            }
                            elseif($msg_r_messages != false)
                            {
                            ?>
                            <div class="row">
                                <section class="panel">
                                    <div class="panel-body">
                                        <div class="col-lg-12">
                                            <section class="panel">
                                                <header class="panel-heading"> نتایج:</header>
                                                <table class="table table-striped">
                                                    <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>پیام </th>
                                                        <th>کاربر</th>
                                                        <th>تاریخ</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    <?php foreach ($msg_r_messages as $row) { ?>
                                                        <tr>
                                                            <td><?php echo $row['id'];?></td>
                                                            <td><a href="messages.php?id=<?php echo $row['msg_id'];?>" target="_blank"><?php echo substr($row['msg_body'],0,50); ?></a></td>
                                                            <td><a href="users.php?id=<?php echo $row['user_id'];?>" target="_blank"><?php if($row['username'] == null) echo $row['user_id']; else echo $row['username'];?></a> </td>
                                                            <td><span class="badge bg-important"><?php echo date('m/d/Y', $row['regdate']); ?></span></td>
                                                        </tr>
                                                    <?php }?>
                                                    </tbody>
                                                </table>
                                                <?php } ?>
                                            </section>
                                        </div>
                                    </div>
                                </section>
                            </div>

                        </section>
            </section>