<?php
/**
 * Template part for displaying posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.2
 */

?>

<?php
// ACF
$product_main_informations = get_field('product_main_informations');
$product_images = get_field('product_images');
$keys = get_field('keys');
$keycaps = get_field('keycaps');
$dye_sub_printing = $keycaps['dye_sub_printing'] == 1 ? '(昇華印刷)' : '';
$ec_main_informations = get_field('ec_main_informations');
$ec_sites = get_field('ec_sites');
$product_cutomize_images = get_field('product_cutomize_images');
$customize_main_informations = get_field('customize_main_informations');
$customize_ec_sites = get_field('customize_ec_sites');
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php
	if ( is_sticky() && is_home() ) :
		echo twentyseventeen_get_svg( array( 'icon' => 'thumb-tack' ) );
	endif;
	?>
	<header class="entry-header">
		<?php
		if ( 'post' === get_post_type() ) {
			echo '<div class="entry-meta">';
				if ( is_single() ) {
					twentyseventeen_posted_on();
				} else {
					echo twentyseventeen_time_link();
					twentyseventeen_edit_link();
				};
			echo '</div><!-- .entry-meta -->';
		};

		if ( is_single() ) {
			the_title( '<h1 class="entry-title">', '</h1>' );
		} elseif ( is_front_page() && is_home() ) {
			the_title( '<h3 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h3>' );
		} else {
			the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
		}
		?>
	</header><!-- .entry-header -->

	<?php if ( '' !== get_the_post_thumbnail() && ! is_single() ) : ?>
		<div class="post-thumbnail">
			<a href="<?php the_permalink(); ?>">
				<?php the_post_thumbnail( 'twentyseventeen-featured-image' ); ?>
			</a>
		</div><!-- .post-thumbnail -->
	<?php endif; ?>

	<div class="entry-content">
		<?php
		/* translators: %s: Name of current post */
		the_content( sprintf(
			__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'twentyseventeen' ),
			get_the_title()
		) );

		wp_link_pages( array(
			'before'      => '<div class="page-links">' . __( 'Pages:', 'twentyseventeen' ),
			'after'       => '</div>',
			'link_before' => '<span class="page-number">',
			'link_after'  => '</span>',
		) );
		?>

		<!-- product main informations -->
		<div class="contents-container">
			<img src="<?php echo $product_main_informations['picture']['url']; ?>" width="640">
			<h2><?php echo $product_main_informations['heading_descriptions']; ?></h2>
			<?php echo $product_main_informations['descriptions']; ?>
		</div>
		<!-- /product main informations -->

		<!-- product images pictures -->
		<?php if( $product_images['pictures'] ): ?>
			<div class="embed-container">
				<?php foreach( $product_images['pictures'] as $product_images_pictures ) { ?>
					<p>
						<?php echo $product_images_pictures['url']; ?>
					</p>
				<?php } ?>
			</div>
		<?php endif; ?>
		<!-- /product images pictures -->

		<!-- product images videos -->
		<?php if( $product_images['videos'] ): ?>
			<div class="embed-container">
				<?php foreach( $product_images['videos'] as $product_images_videos ) { ?>
					<p>
						<?php echo $product_images_videos['url']; ?>
					</p>
				<?php } ?>
			</div>
		<?php endif; ?>
		<!-- /product images videos -->

		<h2>Specs</h2>
		<!-- keys -->
		<?php if( $keys ): ?>
			<div class="contents-container">
					<ul class="list">
						<li>キー数<?php echo $keys['count']; ?></li>
						<li><?php echo $keys['layout']; ?></li>
					</ul>
			</div>
		<?php endif; ?>
		<!-- /keys -->

		<!-- keycaps -->
		<?php if( $keycaps ): ?>
			<div class="contents-container">
					<ul class="list">
						<li><?php echo $keycaps['materials']; ?> <?php echo $dye_sub_printing; ?></li>
						<li><?php echo $keycaps['profiles']; ?>プロファイル</li>
						<li><?php echo $keycaps['switches']; ?>軸</li>
					</ul>
			</div>
		<?php endif; ?>
		<!-- /keycaps -->

		<!-- ec sites -->
		<?php if( $ec_main_informations ): ?>
			<div class="contents-container">
				<h2><?php echo $ec_main_informations['heading_descriptions']; ?></h2>
				<?php echo $ec_main_informations['descriptions']; ?>
				<?php if( $ec_sites ): ?>
					<ul class="list">
						<?php foreach ($ec_sites as $ec_site) { ?>
							<li><a href="<?php echo $ec_site['site_link']['url']; ?>" target="_blank" rel="nofollow"><?php echo $ec_site['site_link']['title']; ?></a></li>
						<?php } ?>
					</ul>
				<?php endif; ?>
			</div>
		<?php endif; ?>
		<!-- /ec sites -->

		<h2>Customize</h2>
		<!-- product_cutomize_images pictures -->
		<?php if( $product_cutomize_images['pictures'] ): ?>
			<div class="embed-container">
				<?php foreach( $product_cutomize_images['pictures'] as $product_images_picture ) { ?>
					<p>
						<?php echo $product_images_picture['url']; ?>
					</p>
				<?php } ?>
			</div>
		<?php endif; ?>
		<!-- /product_cutomize_images pictures -->

		<!-- product_cutomize_images videos -->
		<?php if( $product_cutomize_images['videos'] ): ?>
			<div class="embed-container">
				<?php foreach( $product_cutomize_images['videos'] as $product_images_video ) { ?>
					<p>
						<?php echo $product_images_video['url']; ?>
					</p>
				<?php } ?>
			</div>
		<?php endif; ?>
		<!-- /product_cutomize_images videos -->

		<!-- customize main informations  -->
		<?php if( $customize_main_informations ): ?>
			<div class="contents-container">
				<h2><?php echo $customize_main_informations['heading_descriptions']; ?></h2>
				<?php echo $customize_main_informations['descriptions']; ?>
			</div>
		<?php endif; ?>
		<!-- /customize main informations -->

		<!-- customize ec sites -->
		<?php if( $customize_ec_sites ): ?>
			<div class="contents-container">
					<ul class="list">
						<?php foreach ($customize_ec_sites as $customize_ec_site) { ?>
							<li><a href="<?php echo $customize_ec_site['site_link']['url']; ?>" target="_blank" rel="nofollow"><?php echo $customize_ec_site['site_link']['title']; ?></a></li>
						<?php } ?>
					</ul>
			</div>
		<?php endif; ?>
		<!-- /customize ec sites -->

	</div><!-- .entry-content -->

	<?php
	if ( is_single() ) {
		twentyseventeen_entry_footer();
	}
	?>

</article><!-- #post-## -->
