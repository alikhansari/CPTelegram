<section id="main-content">
    <section class="wrapper">
        <div class="row">
            <div class="col-lg-12">
                <section class="panel">
                    <?php
                    $b_r = $button->FetchAllButtons();
                        ?>
                        <header class="panel-heading">
افزودن دکمه                        </header>
                    <?php
                    if(isset($_POST['ADD']))
                    {
                        ?>
                        <div style="text-align: center;" class="alert alert-block alert-danger fade in">
                            <button data-dismiss="alert" class="close close-sm" type="button">
                                <i class="icon-remove"></i>
                            </button>
                            <?php echo $result; ?>
                            <a href="buttons.php">بازگشت به صفحه دکمه ها</a>
                        </div>
                    <?php
                    }
                    ?>
                        <div class="panel-body">
                            <form class="form-horizontal tasi-form" name="form_edit" action="buttons.php?add" method="POST">
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">نام دکمه</label>
                                    <div class="col-sm-10">
                                        <input type="text" required name="caption" placeholder="نام دکمه را وارد کنید" value="<?php echo $set->CheckParamPost("caption"); ?>" class="form-control">
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
                                    <label class="col-sm-2 control-label">دکمه پدر</label>
                                    <div class="col-lg-10">
                                        <?php
                                        if($b_r != false) {
                                            ?>
                                            <select name="parent_id" class="form-control"><option <?php if(isset($_POST['parent_id'])) {if($_POST['parent_id'] == 0 ) {echo "selected";}}
                                                ?>
                                                    value="0">هیچ کدام</option>
                                                <?php
                                                foreach ($b_r as $row) {
                                                    ?>
                                                    <option value="<?php echo $row['id'];?>"
                                                        <?php
                                                        if(isset($_POST['parent_id']))
                                                        {
                                                            if($_POST['parent_id'] == $row['id'])
                                                            {
                                                                echo "selected";
                                                            }
                                                        }
                                                        ?>
                                                        >
                                                        <?php echo $row['caption'] ?> / کد :  <?php echo $row['id']; ?>
                                                    </option>
                                                <?php
                                                }
                                                ?>
                                            </select>
                                            <?php
                                        } else {echo '<div class="form-control">متأسفانه، تا کنون هیچ دکمه ای ساخته نشده است.</div>';}
                                        ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">نمایش در صفحه اصلی</label>
                                    <div class="col-lg-10">
                                        <select name="main" class="form-control">
                                            <option value="1"
                                                <?php
                                                if(isset($_POST['main']))
                                                {
                                                    if($_POST['main'] == 1)
                                                    {
                                                        echo "selected";
                                                    }
                                                }
                                                elseif($result['main'] == 1)
                                                {
                                                    echo "selected";
                                                }
                                                ?>
                                                >بله</option>
                                            <option value="2"
                                                <?php
                                                if(isset($_POST['main']))
                                                {
                                                    if($_POST['main'] == 2)
                                                    {
                                                        echo "selected";
                                                    }
                                                }
                                                elseif($result['main'] == 0)
                                                {
                                                    echo "selected";
                                                }
                                                ?>
                                                >خیر</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">فعال باشد</label>
                                    <div class="col-lg-10">
                                        <select name="status" class="form-control">
                                            <option value="1"
                                                <?php
                                                if(isset($_POST['status']))
                                                {
                                                    if($_POST['status'] == 1)
                                                    {
                                                        echo "selected";
                                                    }
                                                }
                                                elseif($result['status'] == 1)
                                                {
                                                    echo "selected";
                                                }
                                                ?>
                                                >بله</option>
                                            <option value="2"
                                                <?php
                                                if(isset($_POST['status']))
                                                {
                                                    if($_POST['status'] == 2)
                                                    {
                                                        echo "selected";
                                                    }
                                                }
                                                elseif($result['status'] == 0)
                                                {
                                                    echo "selected";
                                                }
                                                ?>
                                                >خیر</option>                                            </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">متن دکمه</label>
                                    <div class="col-sm-10">
                                        <textarea required class="form-control" autofocus onkeyup="countChars();" onload="countChars()" onblur="countChars();" name="text" placeholder="متن دکمه" rows="8"><?php echo $set->CheckParamPost("text"); ?></textarea>
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