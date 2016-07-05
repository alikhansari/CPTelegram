<section id="main-content">
    <section class="wrapper">
        <div class="row">
            <div class="col-lg-12">
                <section class="panel">
                    <header class="panel-heading">ویرایش پیغام شروع</header>
                    <div class="panel-body">
                    <form class="form-horizontal tasi-form" action="settings.php" method="POST">
        <div class="form-group">
            <label class="col-sm-2 control-label">پیغام شروع کار با تلگرام:</label>
            <div class="col-sm-8">
                <textarea name="msg" class="form-control"rows="7" placeholder="پیغام شروع کار با تلگرام"><?php if(!isset($_POST['msg'])) echo $set->GetSetting(1); else echo $set->CheckParamPost("msg"); ?></textarea>
            </div>
            </div>
        <div class="form-group">
            <label class="col-sm-2 control-label"></label>
        <div class="col-sm-10">
        <button type="submit" name="CHANGE_MSG" class="btn btn-info">ذخیره</button>
            </div>
            </div>


        <?php
        if($result_1 != false)
        {
            ?>
            <div class="form-group">
                <label class="col-sm-2 control-label"></label>
                <div class="col-sm-10">
                    <?php echo $result_1;?>
                </div>
            </div>

        <?php
        }
        ?>
    </form>
                        </div>
