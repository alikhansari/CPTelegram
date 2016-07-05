<section id="main-content">
    <section class="wrapper">
        <div class="row">
            <div class="col-lg-6">
                <section class="panel">
                    <div class="panel-body">
                        <form action="messages.php" method="POST" class="form-horizontal" role="form">
                            <div class="form-group">
                                <label for="from" class="col-lg-2 control-label">از</label>
                                <div class="col-lg-10">
                                    <input name="from" type="number" value="<?php echo $set->CheckParamPost("from");?>" class="form-control" id="from" placeholder="از پیام ">
                                    <p class="help-block">نمایش پیام از </p>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="to" class="col-lg-2 control-label">تا</label>
                                <div class="col-lg-10">
                                    <input name="to" type="number" value="<?php echo $set->CheckParamPost("to");?>" class="form-control" id="to" placeholder="تا پیام">
                                    <p class="help-block">تا پیام</p>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-lg-offset-2 col-lg-10">
                                    <button name="SHOW_FROM_TO" type="submit" class="btn btn-danger">نمایش</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </section>
            </div>
            <div class="col-lg-6">
                <section class="panel">
                    <div class="panel-body">
                        <form action="messages.php" method="POST" class="form-horizontal" role="form">
                            <div class="form-group">
                                <label for="NUMBER" class="col-lg-2 control-label">تعداد</label>
                                <div class="col-lg-10">
                                    <input name="number" min="1" max="50" type="number" value="<?php echo $set->CheckParamPost("number");?>" class="form-control" id="NUMBER" placeholder="تعداد پیام ها">
                                    <p class="help-block">تعداد پیامهای قابل نمایش در این صفحه را مشخص کنید.</p>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-lg-offset-2 col-lg-10">
                                    <button name="SHOW_NUMBER" type="submit" class="btn btn-danger">نمایش</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </section>
            </div>
        </div>
        <div class="row">
            <section class="panel">
                <div class="panel-body">
                    <div class="col-lg-12">
                        <section class="panel">
                            <?php if ($msg_r_messages[0] == 1)
                            {
                            ?>
                                <header class="panel-heading"><?php echo $msg_r_messages[1];?> </header>
                            <?php
                            }
                            else
                            {
                                ?>
                            <header class="panel-heading">کل پیام ها: <?php echo $message->GetMessagesCount();?></header>
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
                                <?php foreach ($msg_r_messages[1] as $row) { ?>
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

