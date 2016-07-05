<section id="main-content">
    <section class="wrapper">
        <div class="row">
            <div class="col-lg-12">
                <section class="panel">
                    <header class="panel-heading">
                        اضافه کردن فید
                        </header>
                    <?php
                    if(isset($_POST['ADD']))
                    {
                        ?>
                        <div style="text-align: center;" class="alert alert-block alert-danger fade in">
                            <button data-dismiss="alert" class="close close-sm" type="button">
                                <i class="icon-remove"></i>
                            </button>
                            <?php echo $result; ?>
                            <a href="feeds.php">بازگشت به صفحه فید ها</a>
                        </div>
                        <?php
                    }
                    ?>
                    <div class="panel-body">
                        <form class="form-horizontal tasi-form" name="form_edit" action="feeds.php?add" method="POST">
                            <div class="form-group">
                                <label class="col-sm-2 control-label">آدرس فید را بصورت http://yoursite.com وارد کنید</label>
                                <div class="col-sm-10">
                                    <input type="url" required name="url" placeholder="آدرس فید را بصورت http://yoursite.com واردکنید." value="<?php echo $set->CheckParamPost("url"); ?>" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">تعداد</label>
                                <div class="col-sm-10">
                                    <input type="number" min="1" name="cnt" placeholder="تعداد" value="<?php echo $set->CheckParamPost("cnt");?>" class="form-control">
                                </div>
                            </div>
                            <button type="submit" name="ADD" class="btn btn-info">ذخیره</button>
                            <button type="reset" class="btn btn-error">بازنویسی</button>
                        </form>
                    </div>
                </section>
            </div>
        </div>
    </section>
</section>