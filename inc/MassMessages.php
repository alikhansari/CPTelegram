<section id="main-content">
    <section class="wrapper">
        <div class="row">
            <div class="col-lg-12">
                <section class="panel">
                    <header class="panel-heading">نمایش پیام  <?php echo $msg_r_messages['id']; ?></header>
                    <div class="panel-body">
                        <div class="bio-graph-heading">
                            <?php echo $msg_r_messages['message'];?>
                        </div>
                        <footer class="panel-footer">
                            <button class="btn btn-danger pull-right">حذف پیام</button>
                            <ul class="nav nav-pills">
                                <li>
                                    <a href="#"><i class="icon-user"></i> <?php echo $msg_r_messages['users_count']?></a>
                                </li>
                                <li>
                                    <a href="#"><i class="icon-group"></i> <?php echo $msg_r_messages['groups_count']?></a>
                                </li>

                            </ul>
                        </footer>
                    </div>
                </section>
            </div>
        </div>
    </section>
</section>