<section id="main-content">
    <section class="wrapper">
        <div class="row">
            <div class="col-lg-12">
                <section class="panel">
                    <div class="panel-body">
                        <?php
                        if($result != false)
                        {
                            ?>
                            <div class="hidden-phone bio-graph-heading">
                                <?php echo $result['msg'];?>
                            </div>
                            <div class="panel-body bio-graph-info">
                                <h1>دستور <?php echo $result['key_array']; ?></h1>
                                <div class="row">
                                    <div class="bio-row">
                                        <p><span>فید</span>: <?php if($result['feed_id']==0) echo "-"; else { ?>
                                            <a href="feeds.php?id=<?php echo $result['feed_id'];?>" target="_blank"><?php echo $result['feed_id'];?></a> </p>
                                        <?php }?>
                                    </div>
                                    <div class="bio-row">
                                        <p><span>تاریخ </span>: <?php echo date("h:i:s - Y/m/d",$result['regdate']);?></p>
                                    </div>
                                    <div class="bio-row">
                                        <div class="form-group">
                                            <div class="col-lg-offset-2 col-lg-10">
                                                <span><a class="btn btn-danger" href="infos.php?delete=<?php echo $result['id']; ?>">حذف دکمه</a></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="bio-row">
                                        <div class="form-group">
                                            <div class="col-lg-offset-2 col-lg-10">
                                                <span><a class="btn btn-danger" href="infos.php?edit=<?php echo $result['id']; ?>">ویرایش دکمه</a></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <?php
                        } else {
                            ?>
                            <div class="alert alert-block alert-danger fade in">
                                <button data-dismiss="alert" class="close close-sm" type="button">
                                    <i class="icon-remove"></i>
                                </button>
                                <strong>اوه! </strong> دستور درخواستی، یافت نشد.
                                <a href="buttons.php">صفحه اصلی</a>
                            </div>

                            <?php
                        }
                        ?>
                    </div>
                </section>
            </div>
        </div>
    </section>
</section>
