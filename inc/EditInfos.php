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
ویرایش دستور ها
                        </header>
                        <div class="panel-body">
                            <form class="form-horizontal tasi-form" name="form_edit" action="infos.php?edit=<?php echo $_GET['edit'];?>" method="POST">
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">نام دستور را می توانید با ; جدا کنید</label>
                                    <div class="col-sm-10">
                                        <input type="text" required name="key_array" placeholder="نام دستور را می توانید با ; جدا کنید" value="<?php if($set->CheckParamPost("key_array") == null) echo $result['key_array']; else echo $set->CheckParamPost("key_array"); ?>" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">عکس را با ";" جدا کنید</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="img_array" placeholder="عکس را با ; جدا کنید" value="<?php if(!isset($_POST['EDIT'])) {if($set->CheckParamPost("img_array") == null) echo $result['img_array']; else echo $set->CheckParamPost("img_array"); } elseif(isset($_POST['img_array'])) echo $set->CheckParamPost("img_array"); ?>" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">فایل را با ";" جدا کنید</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="doc_array" placeholder="فایل را با ; جدا کنید" value="<?php if(!isset($_POST['EDIT'])) {if($set->CheckParamPost("doc_array") == null) echo $result['doc_array']; else echo $set->CheckParamPost("doc_array"); } elseif(isset($_POST['doc_array'])) echo $set->CheckParamPost("doc_array"); ?>" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">کد فید (اگر فید ندارد، 0 قرار دهید.)</label>
                                    <div class="col-sm-10">
                                        <input type="number" min="0" required name="feed_id" placeholder="یکد فید را وارد کنید." value="<?php if(!isset($_POST['EDIT'])) {if($set->CheckParamPost("feed_id") == null) echo $result['feed_id']; else echo $set->CheckParamPost("feed_id"); } elseif(isset($_POST['feed_id'])) echo $set->CheckParamPost("feed_id"); ?>" class="form-control">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-2 control-label">متن دستور</label>
                                    <div class="col-sm-10">
                                        <textarea required class="form-control" autofocus onkeyup="countChars();" onload="countChars()" onblur="countChars();" name="msg" placeholder="متن دکمه" rows="8"><?php if($set->CheckParamPost("msg") == null) echo $result['msg']; else echo $set->CheckParamPost("msg"); ?></textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-lg-2 control-label">تعداد کاراکتر: </label>
                                    <div class="col-lg-10">
                                        <input type="number" required name="count_display" value="0" size="5" readonly="readonly" class="form-control">

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
                            <strong>اوه! </strong> دستور درخواستی، یافت نشد.
                            <a href="buttons.php">صفحه اصلی</a>
                        </div>

                        <?php
                    }
                    ?>
                </section>
            </div>
        </div>
    </section>
</section>