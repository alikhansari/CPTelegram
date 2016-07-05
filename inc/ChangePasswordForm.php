<header class="panel-heading">تغییر رمز عبور </header>
<div class="panel-body">
    <form class="form-horizontal tasi-form" action="settings.php" method="POST">
        <div class="form-group">
            <label class="col-sm-2 control-label">رمز عبور فعلی</label>
            <div class="col-sm-10">
                <input type="password" required name="current_password" placeholder="رمز عبور فعلی را وارد کنید." value="<?php echo $set->CheckParamPost("current_password"); ?>" class="form-control">
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">رمز عبور جدید</label>
            <div class="col-sm-10">
                <input type="password" required name="new_password" placeholder="رمز عبور جدید را وارد کنید." value="<?php echo $set->CheckParamPost("new_password"); ?>" class="form-control">
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label"></label>
            <div class="col-sm-10">
                <button type="submit" name="CHANGE_PASSWORD" class="btn btn-info">ذخیره</button>
            </div>
        </div>


        <?php
        if($result_4 != false)
        {
            ?>
            <div class="form-group">
                <label class="col-sm-2 control-label"></label>
                <div class="col-sm-10">
                    <?php echo $result_4;?>
                </div>
            </div>

            <?php
        }
        ?>
    </form>
</div>


</section>
</div>
</div>
</section>
</section>
