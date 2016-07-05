<section id="main-content">
    <section class="wrapper">
        <div class="row">
            <div class="col-lg-12">
                <section class="panel">
                    <header class="panel-heading">
                        افزودن دستور                        </header>
                    <?php
                    if(isset($_POST['ADD']))
                    {
                        ?>
                        <div style="text-align: center;" class="alert alert-block alert-danger fade in">
                            <button data-dismiss="alert" class="close close-sm" type="button">
                                <i class="icon-remove"></i>
                            </button>
                            <?php echo $result; ?>
                            <a href="infos.php">بازگشت به صفحه دستور ها</a>
                        </div>
                        <?php
                    }
                    ?>
                    <div class="panel-body">
                        <form class="form-horizontal tasi-form" name="form_edit" action="infos.php?add" method="POST">
                            <div class="form-group">
                                <label class="col-sm-2 control-label">نام دستور را می توانید با ; جدا کنید</label>
                                <div class="col-sm-10">
                                    <input type="text" required name="key_array" placeholder="نام دستور را می توانید با ; جدا کنید " value="<?php echo $set->CheckParamPost("key_array"); ?>" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">عکس را با ";" جدا کنید</label>
                                <div class="col-sm-10">
                                    <input type="text" name="img_array" placeholder="عکس را با ; جدا کنید" value="<?php echo $set->CheckParamPost("img_array");?>" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">فایل را با ";" جدا کنید</label>
                                <div class="col-sm-10">
                                    <input type="text" name="doc_array" placeholder="فایل را با ; جدا کنید" value="<?php echo $set->CheckParamPost("doc_array");?>" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">کد فید (اگر فید ندارد، 0 قرار دهید.)</label>
                                <div class="col-sm-10">
                                    <input type="number" min="0" required name="feed_id" placeholder="یک فید را وارد کنید." value="<?php echo $set->CheckParamPost("feed_id"); ?>" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">متن دستور</label>
                                <div class="col-sm-10">
                                    <textarea required class="form-control" autofocus onkeyup="countChars();" onload="countChars()" onblur="countChars();" name="msg" placeholder="متن دستور" rows="8"><?php echo $set->CheckParamPost("msg"); ?></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-2 control-label">تعداد کاراکتر: </label>
                                <div class="col-lg-10">
                                    <input type="number" required name="count_display" value="0" size="5" readonly="readonly" class="form-control">

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