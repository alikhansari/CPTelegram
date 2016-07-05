<?php
/*                  :: Programmer :  Ali Khodabakhshian - @ Nov,2015 ::
 *                  Please put your information to connection to your database like this:
 *
 */
                        define("LOCALHOST","localhost"); // localhost
                        define("DBNAME","telegram"); // project
                        define("DBUSERNAME","root"); // root
                        define("DBPASSWORD",""); // Your Password
/*
 * Classes In Use
 */
date_default_timezone_set("Asia/Tehran");
require('buttons.class.php');
require('feeds.class.php');
require('infos.class.php');
require('message.class.php');
require('settings.class.php');
require('database.class.php');
require('groups.class.php');
require('users.class.php');
?>