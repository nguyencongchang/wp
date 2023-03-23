<?php
/**
 * Template Name: Product Page Template
 *
 * The template for the page builder full-width.
 *
 * It contains header, footer and 100% content width.
 *
 * @package Neve
 */
add_action(
	'body_class',
	function ( $class ) {
		$class[] = 'nv-template';
		return $class;
	}
);
$container_class = apply_filters( 'neve_container_class_filter', 'container', 'single-page' );
$context = class_exists( 'WooCommerce', false ) && ( is_cart() || is_checkout() || is_account_page() ) ? 'woo-page' : 'single-page';

get_header();
?>
<div class="<?php echo esc_attr( $container_class ); ?> single-page-container">
    <div class="row">
        <?php do_action( 'neve_do_sidebar', $context, 'left' ); ?>
        <div class="nv-single-page-wrap col">
            <?php
            /**
             * Executes actions before the page header.
             *
             * @since 2.4.0
             */
            do_action( 'neve_before_page_header' );

            /**
             * Executes the rendering function for the page header.
             *
             * @param string $context The displaying location context.
             *
             * @since 1.0.7
             */
            do_action( 'neve_page_header', $context );

            /**
             * Executes actions before the page content.
             *
             * @param string $context The displaying location context.
             *
             * @since 1.0.7
             */
            do_action( 'neve_before_content', $context );

            if ( have_posts() ) {
                while ( have_posts() ) {
                    the_post();
                    get_template_part( 'template-parts/content', 'page' );
                }
            } else {
                get_template_part( 'template-parts/content', 'none' );
            }

            /**
             * Executes actions after the page content.
             *
             * @param string $context The displaying location context.
             *
             * @since 1.0.7
             */
            do_action( 'neve_after_content', $context );
            ?>
        </div>
        <?php do_action( 'neve_do_sidebar', $context, 'right' ); ?>
    </div>
</div>

<div class="back-to-top"><i class="fa-solid fa-arrow-up"></i></div>
<?php
get_footer();
?>
