<?php
/**
 * @package Bloglane
 */
?>
<?php get_header();	
$daron_header_show_title = get_theme_mod('daron_header_show_title', 1);
$daron_header_show_breadcrumb = get_theme_mod('daron_header_show_breadcrumb', 1);
// If static page is front-page, get it's template.
if ( get_option( 'show_on_front' ) == 'page' ) {
/***
* Load Daron Theme Option Setting
*/
$daron_slider_section = get_theme_mod('daron_slider_section', 'inactive');
$daron_blog_section = get_theme_mod('daron_blog_section', 'inactive');

if ( $daron_slider_section == "active" ) { get_template_part('index-slider'); }
if ( $daron_blog_section == "active" ) { get_template_part('index-blog'); }

} else {
?>

<!-- Breadcrumbs -->
	<div class="js__parallax-window">
		<div class="daron-breadcrumb g-container--md g-text-center--xs">
			<?php if($daron_header_show_title == 1) { ?>
			<?php if ( is_home() && ! is_front_page() ) : ?>
			<h1 class="g-font-size-40--xs g-font-size-50--sm g-font-size-60--md g-color--white g-letter-spacing--1 g-margin-b-30--xs"><?php single_post_title(); ?></h1>
			<?php else : ?>
				<h1 class="g-font-size-40--xs g-font-size-50--sm g-font-size-60--md g-color--white g-letter-spacing--1 g-margin-b-30--xs"><?php esc_html_e( 'Posts', 'bloglane' ); ?></h1>
			<?php endif; ?>
			
			<?php } ?>
			<?php if($daron_header_show_breadcrumb == 1) { ?>
			<p class="g-font-size-14--xs g-color--white-opacity g-letter-spacing--2">
				<a class="breadcumb-color" href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php esc_html_e('Home', 'bloglane'); ?></a> / <span>
				<?php if ( is_home() && ! is_front_page() ) : ?>
				<?php single_post_title(); ?>
				<?php else : ?>
					<?php esc_html_e( 'Posts', 'bloglane' ); ?>
				<?php endif; ?>
				</span>
			</p>
			<?php } ?>
		</div>
	</div>
	<!-- Breadcrumbs -->
<!-- Blog Large Section Start -->
	<section class="g-bg-color--sky-light site-content">
		<div class="container g-padding-y-100--xs g-padding-y-125--xsm">
			<div class="row">
				<?php
				// Page Layout Settings
				$daron_page_layout_style = get_theme_mod('daron_page_layout_style', 'rightsidebar');
				
				// Intialize Variable
				$layout_style = "col-md-12 col-sm-12 col-xs-12";
				
				// Check Sidebar Column Condition
				if( $daron_page_layout_style == "rightsidebar" || $daron_page_layout_style == "leftsidebar" && is_active_sidebar( 'sidebar-widget' )  ) {
					$layout_style = "col-md-8 col-sm-7 col-xs-12";
				}
				?>
				<?php if($daron_page_layout_style == "leftsidebar") { ?>
					<?php if ( is_active_sidebar( 'sidebar-widget' ) ) { ?>
						<!--Sidebar Widget-->
						<div class="col-md-4 col-sm-5 col-xs-12">
							<div class="sidebar">
								<?php dynamic_sidebar('sidebar-widget') ?>
							</div>
						</div>
						<!--Sidebar Widget End-->
					<?php } ?>
				<?php } ?>
				<div class="<?php echo esc_attr($layout_style); ?>">
					<?php
					// Get current page and append to custom query parameters array
					$custom_query_args['paged'] = get_query_var( 'paged' ) ? get_query_var( 'paged' ) : 1;
					
					// Instantiate custom query
					$custom_query = new WP_Query( $custom_query_args );

					// Pagination fix
					$temp_query = $wp_query;
					$wp_query   = NULL;
					$wp_query   = $custom_query;
					
					// Fetch All Post 
					if( $custom_query->have_posts()):
						while ( $custom_query->have_posts()) : $custom_query->the_post();
						?>
						<!-- News --> 
							<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
								<div class="blog-list-wrap">
									<?php if ( has_post_thumbnail() ) { ?>
									<div class="col-md-4 col-sm-4 col-xs-12 blog-img-box blog-img-box-l" >
										<!--Post Thumbnail-->
										<a href="<?php the_permalink(); ?>">
											<?php echo the_post_thumbnail(); ?>
										</a>
									</div>
									<?php } ?>
									<div class="<?php if ( has_post_thumbnail() ) { echo "col-md-8 col-sm-8"; } else { echo "col-md-12 col-sm-12"; } ?> col-xs-12 blog-meta-box-wrap">
										<div class="blog-meta-box g-bg-color--white g-text-left--xs">
											<h3 class="g-font-size-24--xs g-letter-spacing--1 formate-hading-color">
												<a href="<?php the_permalink(); ?>"><?php echo get_the_title(); ?></a>
											</h3>
											<p class="blog-list-meta g-margin-b-10--xs g-font-size-14--xs g-letter-spacing--2 blog-date-color"><?php echo get_the_date(); ?> |
												<a href="#"><?php $categories = get_the_category();
													$separator = ", ";
													$output = '';

													if($categories){
														foreach($categories as $category){
															$output .= '<a class="categories-color-blog" href="' .get_category_link($category->term_id) .'">' . $category->cat_name . '</a>'  . $separator;
														}
														echo trim($output, $separator);
													} ?>
												</a> 
												| <span class=""><?php comments_number(); ?></span>
											</p>
											<?php the_excerpt(); ?>
											<div class="g-padding-y-20--xs g-font-size-14--xs g-color--primary g-letter-spacing--2">
												<a class="read-more" href="<?php the_permalink(); ?>"><?php esc_html_e('Read More', 'bloglane'); ?></a>
											</div>
										</div>
									</div>	
								</div>
							</article>
						<!-- End News -->	
					<?php
					endwhile;
					// Reset Post Data
					wp_reset_postdata();
					endif;
					?>
					<div class="g-margin-b-30--xs g-margin-t-30--xs daron-pagination">
						<?php	
							the_posts_pagination( array(
								'type'			=> 'plain',						
								'mid_size'  	=> 2,
								'prev_text' 	=> ('&laquo;'),
								'next_text' 	=> ('&raquo;'),
							) ); 
						?>
					</div>
				</div>
				<?php if($daron_page_layout_style == "rightsidebar") { ?>
					<?php if ( is_active_sidebar( 'sidebar-widget' ) ) { ?>
						<!--Sidebar Widget-->
						<div class="col-md-4 col-sm-5 col-xs-12">
							<div class="sidebar">
								<?php dynamic_sidebar('sidebar-widget') ?>
							</div>
						</div>
						<!--Sidebar Widget End-->
					<?php } ?>
				<?php } ?>
			</div><!--/.row-->
		</div> <!--/.container-->
	</section>
	<!-- Blog Large Section End -->
<?php } ?>
<?php get_footer(); ?>