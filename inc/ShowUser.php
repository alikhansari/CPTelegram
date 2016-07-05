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
    <div class="panel-body bio-graph-info">
        <h1>بیوگرافی</h1>
        <div class="row">
            <div class="bio-row">
                <p><span>نام کاربری </span>: <?php echo $result['username']; ?></p>
            </div>
            <div class="bio-row">
                <p><span>شماره کاربری </span>: <?php echo $result['user_id']; ?></p>
            </div>
            <div class="bio-row">
                <p><span>تاریخ عضویت </span>: <?php echo date("h:i:s , Y/m/d",$result['regdate']); ?></p>
            </div>
            <div class="bio-row">
                <p><span>وضعیت عضویت</span>: <?php if($result['sub'] ==1) echo "بلی"; else echo "خیر"; ?></p>
            </div>
            <div class="bio-row">
                <p><span>شماره در سیستم </span>: <?php echo $result['id']; ?></p>
            </div>
            <div class="bio-row">
                <div class="form-group">
                    <div class="col-lg-offset-2 col-lg-10">
                        <button name="delete" type="button" class="btn btn-danger">حذف کاربر</button>
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
        <strong>اوه! </strong> کاربر درخواستی، یافت نشد.
        <a href="users.php">صفحه اصلی</a>
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
