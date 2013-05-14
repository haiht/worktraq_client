<!doctype html>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>[@TITLE]</title>
<base href="[@URL]" />
<meta name="description" content="[@DESCRIPTION]" />
<meta name="keywords" content="[@KEYWORDS]" />
<meta name="robots" content="index, follow" />
<meta name="author" content="" />
<meta name="apple-mobile-web-app-capable" content="yes" />
<meta name="apple-mobile-web-app-status-bar-style" content="black" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
<link rel="shortcut icon" href="[@URL]images/favicon.ico" type="image/x-icon" />
<link rel="stylesheet" type="text/css" href="[@URL_TEMPLATES]/css/bootstrap.min.css" media="screen">
<link rel="stylesheet" type="text/css" href="[@URL_TEMPLATES]/css/screen.css" media="screen" />

<!--[if lte IE 9]><link rel="stylesheet" type="text/css" href="[@URL_TEMPLATES]/css/iefix.css" /><![endif]-->
<!--[if lt IE 9]><script type="text/javascript" src="[@URL_TEMPLATES]/js/html5.js"></script><![endif]-->
<script type="text/javascript" src="[@URL]lib/js/jquery.min.1.8.2.js"></script>
<script type="text/javascript" src="[@URL]lib/js/jquery-ui-1.8.14.custom.min.js"></script>
<script type="text/javascript" src="[@URL]lib/js/jquery.number.min.js"></script>
<script type="text/javascript" src="[@URL]lib/js/common.js"></script>
<!-- script src="[@URL_TEMPLATES]/js/bootstrap.min.js"></script-->

</head>
<body>
<section id="user">
    <div>
        <ul>
            <li>[@WEBSITE_STATUS]</li>
            <li>[@CUSTOMER_NAME]</li>
            <li><a href="[@URL]setting.html" title="Setting">Settings</a></li>
            <li class="last"><a href="[@URL]logout.html" title="Logout">Logout</a></li>
        </ul>
    </div>
</section>
<section id="container">
    <header id="header">
        <h1><a href="#" title="[@COMPANY_NAME]">[@LOGO]</a></h1>
        <!--
        <form class="form-general" name="quicksearch" action="" method="post">
            <div class="search">
                <input type="text" placeholder="Enter your search here...">
                <button type="submit"><span></span></button>
            </div>
        </form>
        !-->
[@COMPANY_MENU]
<!--
        <nav>
            <ul>
                <li class="first"><a title="Home" href="[@URL]">Home</a></li>
                <li><a href="[@URL]catalogue/">Catalogue</a></li>
                <li><a title="Order" href="[@URL]order/">Order</a></li>
				<li class="last"><a title="Shipping" href="#">Shipping</a></li>
                <li><a title="Inventory" href="#">Inventory</a></li>
                <li><a title="Support" href="#">Support</a></li>
            </ul>
        </nav>
-->
    </header>

