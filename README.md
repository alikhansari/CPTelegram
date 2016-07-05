# CPTelegram
About my [previous codes](https://github.com/alikhansari/Telegram), I created a matched control panel for your telegram, to add/remove your buttons, orders, ... .

##Configuration
####Step 1
Open `function.php` in `inc` directory:
  ```PHP
define("LOCALHOST","Your Host"); // localhost
define("DBNAME","Your Database name"); // project
define("DBUSERNAME","Your Database Username"); // root
define("DBPASSWORD","Your Password"); // Your Password
```
Edit your codes as your database info.
####Step 2
Please run this SQL code in your database to add the admin_telegram table:
```sql
CREATE TABLE `telegram_admin` (
  `id` int(11) NOT NULL,
  `username` varchar(200) NOT NULL,
  `password` varchar(400) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `telegram_admin`
--

INSERT INTO `telegram_admin` (`id`, `username`, `password`) VALUES
(1, 'admin', '43dc8f69b61b683bd04f06b5124c77b66a113026d6e5091b80f9e2e7f942a5c0027ae671791a46b7a2371d285159edb6387c7a67ff5a796ea14eaa7ef6505df6');
```

####Step 3
run your script in your page, like http://your_host/your_dir

your username: admin
your password: 123456
Login and use it.

this article will be compelete.

This project has written by persian language, you can change `css/bootstrap.min.css` file as you want.
