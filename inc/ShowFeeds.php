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
                                <a href="<?php echo $result['url'];?>" target="_blank"><?php echo $result['url'];?></a>
                            </div>
                            <div class="panel-body bio-graph-info">
                                <h1>فید <?php echo $result['url']; ?></h1>
                                <div class="row">
                                    <div class="bio-row">
                                        <p><span>آدرس</span>: <?php echo $result['url'];?></p>
                                    </div>
                                    <div class="bio-row">
                                        <p><span>تعداد</span>: <?php echo $result['cnt'];?> </p>
                                    </div>
                                    <div class="bio-row">
                                        <div class="form-group">
                                            <div class="col-lg-offset-2 col-lg-10">
                                                <span><a class="btn btn-danger" href="feeds.php?delete=<?php echo $result['id']; ?>">حذف فید</a></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="bio-row">
                                        <div class="form-group">
                                            <div class="col-lg-offset-2 col-lg-10">
                                                <span><a class="btn btn-danger" href="feeds.php?edit=<?php echo $result['id']; ?>">ویرایش فید</a></span>
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
                                <strong>اوه! </strong> فید درخواستی، یافت نشد.
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
