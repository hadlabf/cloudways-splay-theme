<?php get_header(); ?>
    <section>
        <div class="page_container pb-5">
            
<!-- SECTION: INTRO -->
            <div class="content">
                <h1 class="page_title">News </h1>
            

            <div class="case_archive">
                <?php if ( have_posts() ) : 
                while ( have_posts() ) : the_post(); 
                $title = get_field('news_title');
                $text = get_field('news_text');
                ?>
                <a href="<?php the_permalink();?>" class="case_item">
                    <div class="d-flex flex-row align-items-center text-align-baseline">
                        <p class="text_2 adieu_light pr-3"><?php echo $title; ?></p>
                        <p class="text_2"><?php echo $name; ?></p>
                    </div>
                </a>
                
                <?php endwhile; endif;?>
            </div>
            </div>

        </div>
    </section>



<div class="entry-content">
	<?php
	if ( is_single() ) {
		the_content(
			sprintf(
				wp_kses(
				/* translators: %s: Name of current post. */
					__( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'aquila' ),
					[
						'span' => [
							'class' => [],
						],
					]
				),
				the_title( '<span class="screen-reader-text">"', '"</span>', false )
			)
		);

		wp_link_pages(
			[
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'aquila' ),
				'after'  => '</div>',
			]
		);

	} else {
		?>
		<div class="truncate-4">
			<?php aquila_the_excerpt( 200 ); ?>
		</div>
		<?php
		echo aquila_excerpt_more();
	}
	?>
</div>



<?php get_footer(); ?>