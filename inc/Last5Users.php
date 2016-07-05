<?php
if($user->GetUsersCount() < 1)
{
    echo "<span class='icon-quote-right'>هنوز کاربری عضو نشده است.</span> ";
}
else {?>

<table class="table table-hover personal-task">
    <tbody>
    <tr>
        <td><i class="icon-sort-by-order-alt"></i></td>
        <td>نـام کاربری</td>
        <td> عضویت</td>
    </tr>
    <?php foreach ($user_5_r as $row) {
        ?>

        <tr>
            <td>
                <?php echo $row['id'];?>
            </td>
            <td><a href="users.php?id=<?php echo $row['user_id'];?>" target="_blank"><?php if($row['username'] == null) echo $row['user_id']; else echo $row['username'];?></a> </td>
            <td><span class="<?php if($row['sub'] == 1) echo "icon-check"; else echo "icon-unchecked" ?>"></span></td>
        </tr>
        <?php
    }
        ?>
    </tbody>
</table>

<?php } ?>