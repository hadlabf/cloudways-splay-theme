<?php
/**
 * Content template
 *
 */

$container_classes = !empty( $args['container_classes'] ) ? $args['container_classes'] : 'mb-5';

?>

<article id="post-<?php the_ID(); ?>" <?php post_class( $container_classes ); ?>>
	<h1>This is MAIN CONTENT page</h1>
</article>