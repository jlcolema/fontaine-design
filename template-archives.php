<?php
/*
Template Name: Archives
*/
?>

<?php get_header(); ?>
			
			<h1 class="page-title">
				<?php 
				global $post;
				global $post;
				if(get_post_meta($post->ID, 'heading_value', true) != ''): 
					echo get_post_meta($post->ID, 'heading_value', true); 
				else: 
					the_title();
				endif; 
				?>
            </h1>
            
			<!--BEGIN #primary .hfeed-->
			<div id="primary" class="hfeed">
            		
			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
				
				<!--BEGIN .hentry -->
				<div <?php post_class(); ?> id="post-<?php the_ID(); ?>">	
                
					<!--BEGIN .clearfix -->
                    <div class="clearfix">		
    
                        <!--BEGIN .entry-content -->
                        <div class="entry-content">
                        
                            <?php the_content(); ?>
                            
                            <!--BEGIN .archive-lists -->
                            <div class="archive-lists">
                                
                                <h4><?php _e('Last 30 Posts', 'framework') ?></h4>
                                
                                <ul>
                                <?php $archive_30 = get_posts('numberposts=30');
                                foreach($archive_30 as $post) : ?>
                                    <li><a href="<?php the_permalink(); ?>"><?php the_title();?></a></li>
                                <?php endforeach; ?>
                                </ul>
                                
                                <h4><?php _e('Archives by Month:', 'framework') ?></h4>
                                
                                <ul>
                                    <?php wp_get_archives('type=monthly'); ?>
                                </ul>
                    
                                <h4><?php _e('Archives by Subject:', 'framework') ?></h4>
                                
                                <ul>
                                    <?php wp_list_categories( 'title_li=' ); ?>
                                </ul>
                            
                            <!--END .archive-lists -->
                            </div>
                            
                        <!--END .entry-content -->
                        </div>
                        
                    <!--END .clearfix -->
				    </div>     
                          
				<!--END .hentry-->  
				</div>

				<?php endwhile; ?>

			<?php else : ?>

				<!--BEGIN #post-0-->
				<div id="post-0" <?php post_class(); ?>>
				
					<h2 class="entry-title"><?php _e('Error 404 - Not Found', 'framework') ?></h2>
				
					<!--BEGIN .entry-content-->
					<div class="entry-content">
						<p><?php _e("Sorry, but you are looking for something that isn't here.", "framework") ?></p>
					<!--END .entry-content-->
					</div>
				
				<!--END #post-0-->
				</div>

			<?php endif; ?>
			<!--END #primary .hfeed-->
			</div>

<?php get_sidebar(); ?>

<?php get_footer(); ?>