<?php if(!isset($v_sval)) die();
?>
<!doctype html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Worktraq Login</title>
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <meta name="robots" content="index, follow" />
    <meta name="author" content="" />
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <meta name="apple-mobile-web-app-status-bar-style" content="black" />
    <!--<meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0; user-scalable=0;" />-->
    <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon" />
    <link rel="stylesheet" type="text/css" href="<?php  echo URL; ?>user_account/customer/templates/default/css/screen.css" media="screen" />
    <!--[if lte IE 9]><link rel="stylesheet" type="text/css" href="<?php  echo URL; ?>user_acoount/customer/tempates/default/css/iehack.css" /><![endif]-->
    <!--[if lt IE 9]><script type="text/javascript" src="<?php echo URL; ?>user_account/customer/templates/default/js/html5.js"></script><![endif]-->
    <link rel="shortcut icon" href="<?php echo URL;?>images/icons/favicon.ico" type="image/x-icon">
    <script type="text/javascript" src="<?php  echo URL; ?>lib/js/jquery.min.1.9.1.js"></script>
</head>
<body>
<section id="login-cms">
    <section id="container">
        <header id="header">
            <h1><img src="<?php  echo URL; ?>images/logo-wt.jpg" alt="WorkTraq Online Product Management"></h1>
        </header>
        <section id="main">

            <div class="login">              
                <form class="form-general" id="login-form" action="<?php echo URL;?>" method="post" >
                    <input type="hidden" name="txt_ajax" id="txt_ajax">
                    <h2>Login</h2>
					<?php if(isset($_REQUEST['txt_error'])){ ?>
						<div class="alert-message"><?php echo isset($_SESSION['error_login']) ?$_SESSION['error_login']:''; ?></div>
					<?php } ?>
                    <div><input type="text" required placeholder="Username" name="txt_user_name" id="username"></div>
                    <div><input type="password" required placeholder="Password" name="txt_user_pass" id="password"></div>
					
                    <div>
                        <input type="checkbox" name="remember" id="remember">
                        <label for="remember">Remind my password</label>
                        <input type="submit" class="btn btn-danger" id="submit-login" value="Submit" name="btn_login_submit">
                    </div>
                </form>
                <div class="footer-login-form">
                    <a title="Forgot password" href="#" style="display: none">Forgot Password</a>
                    <a title="Contact Support" href="mailto:<?php echo $v_support_email;?>">Contact Support</a>
                </div>
            </div>
        </section>
        <footer id="footer">&copy; Anvy Inc. 2012 </footer>
    </section>
</section>
</body>

</html>
