<!DOCTYPE HTML>
<html dir="ltr" lang="en-US">
	<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="<?php echo base_url('css/css.css'); ?>" />

    <script type="text/javascript">
        var GB_ROOT_DIR = "<?php echo base_url('./js/gb/greybox'); ?>/";
    </script>
    
    <div style="margin-top:5%">
  
<center>
<img src="<?php echo $base."images"; ?>/TKCCloudBlank.png" width="30%" alt=""/>
</center>
	<style>
html, body, div, span, applet, object, iframe,
h1, h2, h3, h4, h5, h6, p, blockquote, pre, a, 
abbr, acronym, address, big, cite, code, del,
dfn, em, img, ins, kbd, q, s, samp, small,
strike, strong, sub, sup, tt, var, u, i, center,
dl, dt, dd, ol, ul, li, fieldset, form, label,
legend, table, caption, tbody, tfoot, thead, tr,
th, td, article, aside, canvas, details, embed,
figure, figcaption, footer, header, hgroup, menu,
nav, output, ruby, section, summary, time, mark, audio, video {
	margin: 0;
	padding: 0;
	border: 0;
	font-size: 100%;
	font: inherit;
	vertical-align: baseline;
}

/* ------- HTML5 display-role reset for older browsers ------- */

article, aside, details, figcaption, figure, footer, header, hgroup, menu, nav, section {
	display: block;
}
body {
	line-height: 1;
}
ol, ul {
	list-style: none;
}
blockquote, q {
	quotes: none;
}
blockquote:before, blockquote:after, q:before, q:after {
	content: '';
	content: none;
}
table {
	border-collapse: collapse;
	border-spacing: 0;
}


/* ------- Remove Chrome's border around active fields ------- */

*:focus {
	outline: none;
}

/* ------- Disable background and border for input fields ------- */

input {
	background: transparent;
	border: 0;
}



/* --------------------------------------------------------------- */

/* ------- Body ------- */

body {
	background: #eeeeee url(<?php echo $base; ?>/images/blue_abstract.jpg) top left repeat;
}


/* ------- Container ------- */

#container {
	margin: auto;
	/*margin-top: 15px;*/
	width: 524px;
	height: 262px;
	text-align: left;
	font-family: Verdana, Arial;
	font-weight: normal;
	font-size: 12px;
	color: #ffffff;
}


/* ------- Login Form ------- */

form, .welcome {
	background: url(images/form-bg.png) top left no-repeat;
	width: 524px;
	height: 262px;
	padding-top: 1px;
}

.login, .welcome-user {
	width: 470px;
	float: left;
	margin-top: 33px;
	margin-left: 40px;
	font-size: 20px;
}

.username-text {
	width: 190px;
	float: left;
	margin-top: 50px;
	margin-left: 40px;
}

.password-text {
	width: 290px;
	float: left;
	margin-top: 50px;
	margin-left: 0px;
}

.welcome-text {
	width: 360px;
	float: left;
	margin-top: 50px;
	margin-left: 40px;
	line-height: 16px;
}

.username-field {
	width: 168px;
	height: 38px;
	float:left;
	margin-top: 10px;
	margin-left: 35px;
	background: url(images/username-field.png) center left no-repeat;
}

.username-field:hover {
	background: url(images/username-field-hover.png) center left no-repeat;
}

.password-field {
	width: 280px;
	height: 38px;
	float:left;
	margin-top: 10px;
	margin-left: 22px;
	background: url(images/password-field.png) center left no-repeat;
}

.password-field:hover {
	background: url(images/password-field-hover.png) center left no-repeat;	
}

input[type="text"], input[type="password"] {
	width: 120px;
	height: 16px;
	margin-top: 10px;
	margin-left: 10px;
	font-family: Verdana, Arial;
	font-size: 16px;
	color: #2d2d2d;
}

.reset
{
	width: 190px;
	float: left;
	margin-top: 50px;
	margin-left: 40px;	
}

/* ------------ Custom Checkbox ------------------------------- */

/* Works for browsers with CSS3 support (with or without Javascript) */
/* Works for Internet Explorer 6-8 (without CSS3 support) with Javascript */
/* If Javascript isn't available this doesn't work for Internet Explorer 6-8 */

input[type="checkbox"] {
	position: absolute;
	left: -999px;
}

input[type="checkbox"] + label {
	width: 132px;
	height: 24px;
	float: left;
	margin-top: 26px;
	margin-left: 37px;
	padding-left: 28px;
	display: block;
	position: relative;
	line-height: 24px;
	background: url(images/checkbox-off.png) top left no-repeat;
}

input[type="checkbox"]:checked + label {
	background: url(images/checkbox-on.png) top left no-repeat;
}

input[type="checkbox"]:checked:hover + label, input[type="checkbox"]:checked:focus + label {
	background: url(images/checkbox-on-hover.png) top left no-repeat;
}

input[type="checkbox"]:not(:checked):hover + label, input[type="checkbox"]:not(:checked):focus + label {
	background: url(images/checkbox-off-hover.png) top left no-repeat;
}

/* -------------------------------------------------------------------------- */

.forgot-usr-pwd {
	width: 220px;
	float: left;
	margin-top: 50px;
	margin-left: 0;
	color: #cccccc;
	line-height: 24px;
	
}

.forgot-usr-pwd a {
	color: #cccccc;
	text-decoration: none;
	font-style: italic;
}

.forgot-usr-pwd a:hover, .forgot-usr-pwd a:focus {
	text-decoration: underline;
}

input[type="submit"] {
	width: 95px;
	height: 73px;
	float: left;
	margin-top: 12px;
	margin-left: 2px;
	font-family: Verdana, Arial;
	font-size: 26px;
	color: #ffffff;
}

input[type="submit"]:hover, input[type="submit"]:focus {
	background: url(images/go-hover.png) top left no-repeat;
}

.home {
	width: 70px;
	height: 73px;
	float: left;
	margin-top: 122px;
	margin-left: 21px;
	font-size: 20px;
	padding: 25px 0 0 15px;
}

.home:hover, .home:focus {
	background: url(images/go-hover.png) top left no-repeat;
}

.home a, .home a:hover, .home a:focus {
	color: #ffffff;
	text-decoration: none;
}

#footer {
	margin: auto;
	margin-top: 50px;
	width: 500px;
	height: 30px;
	background: url(images/footer-bg.png) bottom center no-repeat;
	text-align: center;
	font-family: "Times New Roman", Times, Georgia;
	font-weight: normal;
	font-size: 16px;
	color: #8d8d8d;
}

#footer a {
	text-decoration: none;
	color: #8d8d8d;
}

#footer a:hover, #footer a:focus {
	text-decoration: none;
	color: #2d2d2d;
}
    body {
	background-repeat: repeat-y;
	background-size:100%;
}
body,td,th {
	font-family: Arial, Helvetica, sans-serif;
}
    </style>

	</head>

<body>	

<div id="container">
			<form method="post" action="<?php echo $site; ?>/main_control/validate_login">
				<div class="login"></div>
				<div class="username-text">Awan ID</div>
				<div class="password-text">Password</div>
				<div class="username-field">
					<input type="text" name="username"/>
				</div>
				<div class="password-field">
					<input type="password" name="password"/>
				</div>
				<input type="checkbox" name="remember-me" id="remember-me" /><label for="remember-me"></label>
				<div class="forgot-usr-pwd"> <a href="<?php echo $site;?>/main_control/forgot" title="Reset Password" onclick="window.open(this.href, 'child', 'scrollbars,width=450,height=200'); return false">Forgot Password</a></div>
				<input type="submit" name="submit" value="GO" />
                
			</form>
		</div>
	 <center><div style="color:#FFF">Towards 21st Century School</div></center>
     </div>
</body>
</html>