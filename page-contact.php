<?php /**
 * Template Name: Contacts Page
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package tervue-theme
 */
?>

<body class = "mainPage">
<div class="page" style="width:100%;">
	
<?php get_header(); ?>
<div class="header-icon">
	<div class="page-header-img">
	<img src="<?php echo get_template_directory_uri(); ?>/library/images/contactHeaderPic.png" alt=" ">
</div>
			<div id="content">

				<div id="inner-content">
					<?php get_sidebar(); ?>

						<main id="main" class="m-all t-2of3 d-5of7" role="main" itemscope itemprop="mainContentOfPage" itemtype="http://schema.org/Blog">

							<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

							<article id="post-<?php the_ID(); ?>" role="article" itemscope itemtype="http://schema.org/BlogPosting">

								<header class="article-header">

									<h1 class="page-title" itemprop="headline"><?php the_title(); ?></h1>

									<p class="byline vcard">
										<?php //printf( __( 'Posted', 'bonestheme').' <time class="updated" datetime="%1$s" itemprop="datePublished">%2$s</time> '.__( 'by',  'bonestheme').' <span class="author">%3$s</span>', get_the_time('Y-m-j'), get_the_time(get_option('date_format')), get_the_author_link( get_the_author_meta( 'ID' ) )); ?>
									</p>

								</header> <?php // end article header ?>

								<section class="entry-content cf" itemprop="articleBody">
									<?php
										// the content (pretty self explanatory huh)
										the_content();

										/*
										 * Link Pages is used in case you have posts that are set to break into
										 * multiple pages. You can remove this if you don't plan on doing that.
										 *
										 * Also, breaking content up into multiple pages is a horrible experience,
										 * so don't do it. While there are SOME edge cases where this is useful, it's
										 * mostly used for people to get more ad views. It's up to you but if you want
										 * to do it, you're wrong and I hate you. (Ok, I still love you but just not as much)
										 *
										 * http://gizmodo.com/5841121/google-wants-to-help-you-avoid-stupid-annoying-multiple-page-articles
										 *
										*/
										wp_link_pages( array(
											'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'bonestheme' ) . '</span>',
											'after'       => '</div>',
											'link_before' => '<span>',
											'link_after'  => '</span>',
										) );
									?>
								</section> <?php // end article section ?>

								<footer class="article-footer cf">

								</footer>

								<?php// comments_template(); ?>

							</article>

							<?php endwhile; endif; ?>

						</main>
					<?php get_sidebar(); ?>
				</div>

			</div>

<?php get_footer(); ?>
</div>
<div class="sideMenu">
   <div class ="close"><img src="<?php echo get_template_directory_uri(); ?>/library/images/closeButton.svg" alt=" "></div>
	  	<div class="sideMenuNav">
        <h2>MENU</h2>
    <?php //Get wp_nav
     wp_nav_menu( array( 'menu' => 'primary' ) ); ?>
 </div>
</div>
</body>