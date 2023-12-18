<?php

$base_url    = 'https://d1sb0nhp4t2db4.cloudfront.net/resources/masteriyo/certificate/samples';
$samples_dir = __DIR__ . '/samples';
$directories = array_diff( scandir( $samples_dir ), array( '..', '.' ) );
$directories = array_filter(
	$directories,
	function( $dir ) {
		return ! is_dir( $dir );
	}
);
$samples     = [];

foreach ( $directories as $dir ) {
	$samples[] = [
		'id'     => $dir,
		'title'  => ucwords( str_replace( '-', ' ', $dir ) ),
		'images' => array_reduce(
			scandir( $samples_dir . '/' . $dir ),
			function( $images, $file ) use ( $samples_dir, $base_url, $dir ) {
				$image_file = $samples_dir . '/' . $dir . '/' . $file;
				$image_url  = $base_url . '/' . $dir . '/' . $file;
				if ( is_file( $image_file ) && in_array( pathinfo( $file, PATHINFO_EXTENSION ), [ 'jpg', 'jpeg', 'png', 'gif' ] ) ) {
					$images[] = [
						'url'             => $image_url,
						'url_placeholder' => "{{{$file}}}",
						'id_placeholder'  => '{{' . str_replace( [ '.jpg', '.jpeg', '.png', '.gif' ], '', $file ) . '}}',
					];
				}
				return $images;
			},
			[]
		),
		'html'   => file_get_contents( $samples_dir . '/' . $dir . '/content.html' ),
	];
}

file_put_contents( 'samples.json', json_encode( $samples, JSON_PRETTY_PRINT ) );
