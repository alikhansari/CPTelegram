<section id="main-content">
    <section class="wrapper">
        <div class="row">
            <div class="col-lg-12">
                <section class="panel">
                    <header class="panel-heading">نمایش پیام  <?php echo $msg_r_messages['id']; ?></header>
                    <div class="panel-body">
                        <div class="bio-graph-heading">
                            <?php echo $msg_r_messages['msg_body'];?>
                        </div>
                        <footer class="panel-footer">
                            <button class="btn btn-danger pull-right">حذف پیام</button>
                            <ul class="nav nav-pills">
                                <li>
                                    <a href="#"><i class="icon-time"></i> <?php echo date("m/d/Y",$msg_r_messages['regdate'])?></a>
                                </li>
                                <li>
                                    <a href="users.php?id=<?php echo $msg_r_messages['user_id'];?>" target="_blank"><i class="icon-pencil"></i><?php if($msg_r_messages['username'] == null) echo $msg_r_messages['user_id']; else echo $msg_r_messages['username'];?></a>
                                </li>

                            </ul>
                        </footer>
                    </div>
                </section>
            </div>
        </div>
        </section>
    </section>