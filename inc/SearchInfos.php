<section id="main-content">
    <section class="wrapper">
        <div class="row">
            <div class="col-lg-12">
                <section class="panel">
                    <header class="panel-heading">جستجوی دستور ها</header>
                    <div class="panel-body">
                        <form class="form-horizontal tasi-form" action="infos.php?search" method="POST">
                            <div class="form-group">
                                <div class="col-sm-6">
                                    <select name="TYPE" class="">
                                        <option value="1"
                                            <?php
                                            if(isset($_POST['TYPE']))
                                            {
                                                if($_POST['TYPE'] == 1)
                                                {
                                                    echo "selected";
                                                }
                                            }
                                            ?>>
جستجو بر اساس کد دستور
                                        </option>
                                        <option value="2"
                                            <?php
                                            if(isset($_POST['TYPE']))
                                            {
                                                if($_POST['TYPE'] == 2)
                                                {
                                                    echo "selected";
                                                }
                                            }
                                            ?>
                                            >جستجو بر اساس نام دستور</option>

                                    </select>
                                </div>
                                <div class="col-sm-6">
                                    <input type="text" required name="value" placeholder="مقدار مورد نظر" value="<?php if($set->CheckParamPost("value") == null) echo $result['value']; else echo $set->CheckParamPost("value"); ?>" class="form-control">
                                </div>
                            </div>
                            <button type="submit" name="SEARCH" class="btn btn-info">جستجو</button>
                    </div>
                    </form>
                    <?php
                    if($result == "چیزی یافت نشد.")
                    {
                        ?>
                        <div style="text-align: center;">متأسفانه چیزی یافت نشد.</div>
                        <?php
                    } elseif($result != false) {
                        ?>
                        <table class="table table-striped border-top" id="sample_1">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th class="">نام دستور</th>
                                <th class="hidden-phone">متن</th>
                                <th class="hidden-phone">فید</th>
                                <th class="hidden-phone">تاریخ</th>
                                <th class="">ویرایش</th>
                                <th class="">حذف</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($result as $row) {
                                ?>
                                <tr class="odd gradeX">
                                    <td><?php echo $row['id'];?></td>
                                    <td class=""><a href="infos.php?id=<?php echo $row['id'];?>" target="_blank"><?php echo substr($row['key_array'],0,50)?></a></td>
                                    <td class="hidden-phone"><a href="infos.php?id=<?php echo $row['id'];?>" target="_blank"><?php echo substr($row['msg'],0,50)?></a></td>
                                    <td class="hidden-phone"><?php if($row['feed_id']!=0 ) { ?> <a href="feeds.php?id=<?php echo $row['feed_id'];?>" target="_blank"><i class="icon-rss"></i></a> <?php } else echo "-"; ?> </td>
                                    <td class="hidden-phone"><?php echo date("h:i:s - Y/m/d",$row['regdate']);?> </td>
                                    <td class=""><a href="infos.php?edit=<?php echo $row['id'];?>" target="_blank"><i class="icon-edit"></i></a> </td>
                                    <td class=""><a href="infos.php?delete=<?php echo $row['id'];?>" target="_blank"><i class="icon-remove-circle"></i></td>
                                </tr>
                                <?php
                            }
                            ?>
                            </tbody>
                        </table>
                        <?php
                    }
                    ?>
            </div>
    </section>
    </div>
    </div>
</section>
</section>