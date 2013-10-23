<?php get_header(); ?>
	
					<?php if (is_category()) { ?>
                            <div id="featured" class="row">
                                <div class="post-box large-12 columns" id="headline">
                                    <?php
                                    $category = get_the_category();
                                    $args=array(
                                        'category_name' => $category[0]->category_nicename,
                                        'post_type' => 'headline',
                                        'post_status' => 'publish',
                                        'posts_per_page' => 1
                                    );
                                    
                                    $the_query = new WP_Query($args);
                                    if($the_query->have_posts()) : while ( $the_query->have_posts() ) : $the_query->the_post();
                                        echo the_post_thumbnail();
                                        echo '<h2 class="title">' . get_the_title() . '</h2>';
                                    endwhile; else :
                                        $current = date('FY', strtotime('-1 month') ) ;
                                    endif;
                                    wp_reset_postdata();
                                    ?>
                                </div>
                            </div>
					<?php } ?>

			
			<div id="content" class="clearfix row">
			
				<div id="main" class="large-12 columns" role="main">				
					<?php if (is_category()) { ?>					
						<h2 class="archive_title">
							<span><?php _e("", "bonestheme"); ?></span> <?php single_cat_title(); ?>
						</h2>
					<?php } elseif (is_tag()) { ?> 
						<h1 class="archive_title h2">
							<span><?php _e("Posts Tagged:", "bonestheme"); ?></span> <?php single_tag_title(); ?>
						</h1>
					<?php } elseif (is_author()) { ?>
						<h1 class="archive_title h2">
							<span><?php _e("Posts By:", "bonestheme"); ?></span> <?php get_the_author_meta('display_name'); ?>
						</h1>
					<?php } elseif (is_day()) { ?>
						<h1 class="archive_title h2">
							<span><?php _e("Daily Archives:", "bonestheme"); ?></span> <?php the_time('l, F j, Y'); ?>
						</h1>
					<?php } elseif (is_month()) { ?>
					    <h1 class="archive_title h2">
					    	<span><?php _e("Monthly Archives:", "bonestheme"); ?>:</span> <?php the_time('F Y'); ?>
					    </h1>
					<?php } elseif (is_year()) { ?>
					    <h1 class="archive_title h2">
					    	<span><?php _e("Yearly Archives:", "bonestheme"); ?>:</span> <?php the_time('Y'); ?>
					    </h1>
					<?php } ?>

					<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
					
					<article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?> role="article">
						
						<header>
							
							<h3 class="h2"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h3>
							
						
						</header> <!-- end article header -->
					
						<section class="post_content">
						
							<?php the_post_thumbnail( 'bones-thumb-300' ); ?>
						
							<?php the_excerpt(); ?>
					
						</section> <!-- end article section -->
						
						<footer>
							
						</footer> <!-- end article footer -->
					
					</article> <!-- end article -->
					
					<?php endwhile; ?>	
					
								
					
					<?php else : ?>
					
					<article id="post-not-found">
					    <header>
					    	<h1><?php _e("No Posts Yet", "bonestheme"); ?></h1>
					    </header>
					    <section class="post_content">
					    	<p><?php _e("Sorry, What you were looking for is not here.", "bonestheme"); ?></p>
					    </section>
					    <footer>
					    </footer>
					</article>
					
					<?php endif; ?>
			
				</div> <!-- end #main -->
    
    
			</div> <!-- end #content -->

<?php get_footer(); ?>