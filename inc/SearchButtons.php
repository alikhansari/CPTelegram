<section id="main-content">
    <section class="wrapper">
        <div class="row">
            <div class="col-lg-12">
                <section class="panel">
                    <header class="panel-heading">جستجوی دکمه ها</header>
                    <div class="panel-body">
                        <form class="form-horizontal tasi-form" action="buttons.php?search" method="POST">
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
                                            جستجو بر اساس کد دکمه
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
                                            >جستجو بر اساس نام دکمه</option>
                                        <option value="3"
                                            <?php
                                            if(isset($_POST['TYPE']))
                                            {
                                                if($_POST['TYPE'] == 3)
                                                {
                                                    echo "selected";
                                                }
                                            }
                                            ?>
                                            >جستجوی تمام زیر دکمه های پدر (شماره)</option>
                                        <option value="4"
                                            <?php
                                            if(isset($_POST['TYPE']))
                                            {
                                                if($_POST['TYPE'] == 4)
                                                {
                                                    echo "selected";
                                                }
                                            }
                                            ?>
                                            >جستجوی تمام زیر دکمه های پدر (نام)</option>
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
                            <th class="">نام دکمه</th>
                            <th class="hidden-phone">متن</th>
                            <th class="hidden-phone">صفحه اصلی</th>
                            <th class="hidden-phone">فعال</th>
                            <th class="hidden-phone">پدر</th>
                            <th class="hidden-phone">فید</th>
                            <th class="">ویرایش</th>
                            <th class="">حذف</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($result as $row) {
                            if($row['main'] == 1)
                                $f = "بلی";
                            else
                                $f = "خیر";
                            if($row['status'] == 1)
                                $g = "بلی";
                            else
                                $g = "خیر";
                            ?>
                            <tr class="odd gradeX">
                                <td><?php echo $row['id'];?></td>
                                <td class=""><a href="buttons.php?id=<?php echo $row['id'];?>" target="_blank"><?php echo $row['caption'];?></a></td>
                                <td class="hidden-phone"><a href="buttons.php?id=<?php echo $row['id'];?>" target="_blank"><?php echo substr($row['text'],0,50)?></a> </td>
                                <td class="hidden-phone"><span class="label label-success"><?php echo $f;?></span></td>
                                <td class="hidden-phone"><span class="label label-success"><?php echo $g;?></span></td>
                                <td class="hidden-phone"><a href="buttons.php?id=<?php echo $row['parent_id'];?>" target="_blank"><?php echo $button->FetchButtonName($row['parent_id']);?></a> </td>
                                <td class="hidden-phone"><?php if($row['feed_id']!=0 ) { ?> <a href="feeds.php?id=<?php echo $row['feed_id'];?>" target="_blank"><i class="icon-rss"></i></a> <?php } else echo "-"; ?> </td>
                                <td class=""><a href="buttons.php?edit=<?php echo $row['id'];?>" target="_blank"><i class="icon-edit"></i></a> </td>
                                <td class=""><a href="buttons.php?delete=<?php echo $row['id'];?>" target="_blank"><i class="icon-remove-circle"></i></td>
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