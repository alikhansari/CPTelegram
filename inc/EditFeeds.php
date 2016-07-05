<section id="main-content">
                    <section class="wrapper">
                        <div class="row">
                            <div class="col-lg-12">
                <section class="panel">
                    <?php
                    if($result != false)
                    {
                        ?>
                        <header class="panel-heading">
ویرایش فید ها                        </header>
                        <div class="panel-body">
                            <form class="form-horizontal tasi-form" action="feeds.php?edit=<?php echo $_GET['edit'];?>" method="POST">
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">آدرس فید را بصورت http://yoursite.com وارد کنید</label>
                                    <div class="col-sm-10">
                                        <input type="url" required name="url" placeholder="آدرس فید را بصورت http://yoursite.com وارد کنید" value="<?php if($set->CheckParamPost("url") == null) echo $result['url']; else echo $set->CheckParamPost("url"); ?>" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">تعداد</label>
                                    <div class="col-sm-10">
                                        <input type="number" name="cnt" placeholder="تعداد" value="<?php if(!isset($_POST['EDIT'])) {if($set->CheckParamPost("cnt") == null) echo $result['cnt']; else echo $set->CheckParamPost("cnt"); } elseif(isset($_POST['cnt'])) echo $set->CheckParamPost("cnt"); ?>" class="form-control">
                                    </div>
                                </div>

                                <?php
                                if(isset($_POST['EDIT']))
                                {
                                    ?>
                                    <div class="form-group">
                                        <label class="col-lg-2 control-label">پیغام: </label>
                                        <div class="col-lg-10">
                                            <?php echo $result;?>
                                        </div>
                                    </div>
                                    <?php
                                }
                                ?>

                                <button type="submit" name="EDIT" class="btn btn-info">ذخیره</button>
                                <button type="reset" class="btn btn-error">بازنویسی</button>
                            </form>
                        </div>
                        <?php
                    } else {
                        ?>
                        <div class="alert alert-block alert-danger fade in">
                            <button data-dismiss="alert" class="close close-sm" type="button">
                                <i class="icon-remove"></i>
                            </button>
                            <strong>اوه! </strong> فید درخواستی، یافت نشد.
                            <a href="feeds.php">صفحه اصلی</a>
                        </div>

                        <?php
                    }
                    ?>
                </section>
            </div>
        </div>
    </section>
</section>