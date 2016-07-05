<section id="main-content">
    <section class="wrapper">
        <div class="row">
            <div class="col-lg-12">
                <section class="panel">
<?php
if($result != false)
{
    $b_r = $button->GetButtonExpectOne($_GET['edit']);
?>
    <header class="panel-heading">
                            ویرایش دکمه ها
                        </header>
                        <div class="panel-body">
                            <form class="form-horizontal tasi-form" name="form_edit" action="buttons.php?edit=<?php echo $_GET['edit'];?>" method="POST">
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">نام دکمه</label>
                                    <div class="col-sm-10">
                                        <input type="text" required name="caption" placeholder="نام دکمه را وارد کنید" value="<?php if($set->CheckParamPost("caption") == null) echo $result['caption']; else echo $set->CheckParamPost("caption"); ?>" class="form-control">
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
                                    <label class="col-sm-2 control-label">دکمه پدر</label>
                                    <div class="col-lg-10">
                                        <?php
                                        if($b_r != false) {
                                            ?>
                                            <select name="parent_id" class="form-control"><option <?php if(isset($_POST['parent_id'])) {if($_POST['parent_id'] == $_GET['edit']) {echo "selected";}}
                                            ?>
                                            value="<?php echo $_GET['edit'];?>">هیچ کدام</option>
                                                <?php foreach ($b_r as $row) {?><option value="<?php echo $row['id'];?>"<?php if(isset($_POST['parent_id'])) {if($_POST['parent_id'] == $row['id']) {echo "selected";}} elseif($row['id'] == $result['parent_id']) {echo "selected";} ?>><?php echo $row['caption']; ?>/ کد: <?php echo $row['id'];?></option>
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
                                        <textarea required class="form-control" autofocus onkeyup="countChars();" onload="countChars()" onblur="countChars();" name="text" placeholder="متن دکمه" rows="8"><?php if($set->CheckParamPost("text") == null) echo $result['text']; else echo $set->CheckParamPost("text"); ?></textarea>
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
                            <strong>اوه! </strong> دکمه درخواستی، یافت نشد.
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