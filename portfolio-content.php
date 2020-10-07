<?php
/**
 * ==============================================
 *  ARCHIVE-PORTFOLIO.PHP
 * ==============================================
 * That's it?  For real?  For now :)
 *
 *
 * @package			WordPress
 * @subpackage		child theme
 * @author			pizzo
 */

get_header();

?>



		<div class="row">
			<div class="small-12 columns">
				<h1 class="title">Portfolio</h1>
				<p>J. Peterman &amp; Associates has so many really cool portfolio items. And these are a few</p>
			</div>
		</div>

	</div>

	<div class="outer" id="middle">

		<div class="row">

            <div class="columns medium-4">
                <?php dynamic_sidebar('portfolio-sidebar'); ?>
            </div>

			<div class="columns medium-8">

				<div class="one-column-section text-center">
					<div>
						<h2 class="title">At J. Peterman &amp; Associates we strive to create great things</h2>
							<h4 class="sub-header">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.
							</h4>
							<br/>
					</div>
				</div>

				<ul class="small-block-grid-1 medium-block-grid-1">


					<?php if (have_posts()) : ?>
						<?php while (have_posts()) : the_post();?>
							<li class="box wow fadeInDown" data-wow-delay=".3s">
								<div class="columns medium-12 small-12">
									<h2 class="title"><?php the_title();?></h2>
									<hr/>
                                    <?php $image_gallery = get_field('pid_image_gallery'); ?>
                                    <?php  $my_first_image = is_array($image_gallery) ? $image_gallery[0]['url'] : 'Nothing here';?>
                                    <img src="<?php echo $my_first_image ?>" alt="<?php echo $my_first_image['alt'] ?>" />

									<hr/>
									<a class="button" href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">View </a>


								</div>
							</li>

						<?php endwhile;?>
					<?php endif ;?>


				</ul>

				<?php if ( function_exists('wp_pagenavi') ) : ?>
					<div class="row text-center">
						<div class="columns small-12">
							<h3>More Postings</h3>
							<?php wp_pagenavi(); ?>
						</div>
						<p>&nbsp;</p>
					</div>
				<?php endif; ?>

			</div>

		</div>

	</div>

<?php

get_footer();
