<?php
/**
 * Template Name: Home Page Template
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
    <div class="page-home">
        <div class="section-information">
            <?php if(have_posts()) : while(have_posts()) : the_post(); ?>
            <div class="content-left">
                <?php the_content();?>
                <a class="btn-show-more" href="/pages/ve-chung-toi">Xem thêm</a>
            </div>
            <?php endwhile;?>
            <?php endif; ?>
            <div class="content-right">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/img/home/ab-img.png" alt="ab-img" />
                <div class="caption">
                    <div class="num"><span class="hc-counter"></span>+</div>
                    <p>Năm kinh nghiệm</p>
                </div>
            </div>
        </div>
        <div class="cnv-services">
            <div class="container">
                <div class="cnv-head text-center">
                    <h2 class="title wow fadeInUp" style="visibility: visible; animation-name: fadeInUp;">DỊCH VỤ&nbsp;&amp;&nbsp;NĂNG LỰC</h2>
                    <div class="desc wow fadeInUp" style="visibility: visible; animation-name: fadeInUp;">Cung cấp cho khách hàng dịch vụ chất lượng cao, chi phí cạnh tranh</div>
                </div>
                <div class="services-cas def-cas wow fadeInUp slick-initialized slick-slider" style="visibility: visible; animation-name: fadeInUp;">
                    <div aria-live="polite" class="slick-list draggable"><div class="slick-track" role="listbox" style="opacity: 1; width: 0px; left: 0px;"></div></div></div>
            </div>
        </div>
    </div>
</div>

<?php
get_footer();
?>
