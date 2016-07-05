<aside>
    <div id="sidebar"  class="nav-collapse ">
        <!-- sidebar menu start-->
        <ul class="sidebar-menu">
            <li class="<?php if(basename($_SERVER['PHP_SELF']) == "index.php" ) echo "active" ?>">
                <a class="" href="index.php">
                    <i class="icon-dashboard"></i>
                    <span>صفحه اصلی</span>
                </a>
            </li>
            <li class="sub-menu">
                <a href="javascript:;" >
                    <i class="icon-comment-alt"></i>
                    <span>پیام ها</span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub">
                    <li><a href="messages.php">نمایش پیام ها</a></li>
                    <li><a href="messages.php?search">جستجوی پیام ها</a></li>
                    <li><a href="messages.php?user">نمایش پیامهای ارسال کننده</a></li>
                    <li><a href="messages.php?mass">آخرین پیام های انبوه</a></li>
                    <li><a href="users.php">آخرین اعضا</a></li>
                </ul>
            </li>
            <li class="sub-menu">
                <a href="javascript:;" >
                    <i class="icon-keyboard"></i>
                    <span>دکمه های کیبرد</span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub">
                    <li><a href="buttons.php">نمایش دکمه ها</a></li>
                    <li><a href="buttons.php?add">اضافه کردن دکمه </a></li>
                    <li><a href="buttons.php?search">جستجوی دکمه ها</a></li>
                </ul>
            </li>
            <li class="sub-menu">
                <a href="javascript:;" >
                    <i class="icon-list-ul"></i>
                    <span>دستور ها</span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub">
                    <li><a href="infos.php">نمایش دستور ها</a></li>
                    <li><a href="infos.php?add">اضافه کردن دستور</a></li>
                    <li><a href="infos.php?search">جستجو کردن دستور</a></li>
                </ul>
            </li>
            <li class="sub-menu">
                <a href="javascript:;" >
                    <i class="icon-rss"></i>
                    <span>فید ها</span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub">
                    <li><a href="feeds.php">نمایش فید ها</a></li>
                    <li><a href="feeds.php?add">اضافه کردن فید</a></li>
                    <li><a href="feeds.php?search">جستجو کردن فید</a></li>
                </ul>
            </li>
            <li class="sub-menu">
                <a href="javascript:;" >
                    <i class="icon-cogs"></i>
                    <span>تنظیمات</span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub">
                    <li><a href="settings.php">تنظیمات کامل</a></li>
                </ul>
            </li>
        </ul>
        <!-- sidebar menu end-->
    </div>
</aside>
