<?php get_header(); ?>

<section>
    <div class="page_container">

		<div class="content pt-3">
			<div class="w-50">
				<h1 class="title_1 mb-3">Are you interested in our lecture about TikTok?</h1>
				<p class="text_2">Every week we have TikTok lectures by our very own experts on Splay One. If you are interested please contact us and we will arrange it for you and your colleagues to share our knowledge and best advices.</p>
			</div>
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
										<p class="font-weight-bold adieu_light text_2"><?php echo $date; ?></p>
										<p class="text-uppercase text_2 "><?php echo $title; ?></p>
									</div>
									<p class="text_2"><?php echo $text; ?></p>
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