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
                                <?php echo $result['text'];?>
                            </div>
                            <div class="panel-body bio-graph-info">
                                <h1>دکمه <?php echo $result['caption']; ?></h1>
                                <div class="row">
                                    <div class="bio-row">
                                        <p><span>نام دکمه </span>: <?php echo $result['caption']; ?></p>
                                    </div>
                                    <div class="bio-row">
                                        <p><span>دکمه پدر </span>: <?php echo $button->FetchButtonName($result['parent_id']); ?></p>
                                    </div>
                                    <div class="bio-row">
                                        <p><span>فحه اصلی</span>: <?php if($result['main'] ==1) echo "بلی"; else echo "خیر"; ?></p>
                                    </div>
                                    <div class="bio-row">
                                        <p><span>فعال</span>: <?php if($result['status'] ==1) echo "بلی"; else echo "خیر"; ?></p>
                                    </div>
                                    <div class="bio-row">
                                        <p><span>فید</span>: <?php if($result['feed_id']==0) echo "-"; else { ?>
                                        <a href="feeds.php?id=<?php echo $result['feed_id'];?>" target="_blank"><?php echo $result['feed_id'];?></a> </p>
                                        <?php }?>
                                    </div>
                                    <div class="bio-row">
                                        <p><span>شماره در سیستم </span>: <?php echo $result['id']; ?></p>
                                    </div>
                                    <div class="bio-row">
                                        <div class="form-group">
                                            <div class="col-lg-offset-2 col-lg-10">
                                                <span><a class="btn btn-danger" href="buttons.php?delete=<?php echo $result['id']; ?>">حذف دکمه</a></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="bio-row">
                                        <div class="form-group">
                                            <div class="col-lg-offset-2 col-lg-10">
                                                <span><a class="btn btn-danger" href="buttons.php?edit=<?php echo $result['id']; ?>">ویرایش دکمه</a></span>
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
                                <strong>اوه! </strong> دکمه درخواستی، یافت نشد.
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
