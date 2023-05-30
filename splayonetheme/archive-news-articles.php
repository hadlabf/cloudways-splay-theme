<?php get_header(); ?>

<section>
    <div class="page_container top_page_padding">

		<div class="content">
			<h1 class="page_title">News</h1>
			<div class="section_padding_1">
                <p class="title_2"><?php echo the_field('home_news_section_title')?></p>
                
				<div class="">

						<div class="news_list row">
							<?php if ( have_posts() ) : 
							while ( have_posts() ) : the_post(); 
							$title = get_field('news_title');
							$text = get_field('news_text');
							$date = get_field('news_date');
							$link = get_field('news_link');
							?>
							<div style="margin-bottom: 15px;" class="col-3">
								<a target="_blank" href="<?php echo $link;?>" class="news_article_item">
									<div>
										<p class="font-weight-bold adieu_black text_2"><?php echo $date; ?></p>
										<p class="bold_1 text_1"><?php echo $title; ?></p>
									</div>
									<p class="text_1"><?php echo $text; ?></p>
								</a>
							</div>
							
							<?php endwhile; endif;?>
						</div>

            	</div>

            </div>

               
		</div>


	</div>
</section>

<?php get_footer(); ?>