<?php
/**
 * Template Name: Service Page Template
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
    <div class="breadcrumbs">
        <div class="container">
            <ul>
                <li><a href="/">Trang chủ</a></li>
                <li><a href="/page/product">Phạm vi cung cấp</a></li>
            </ul>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="nv-single-page-wrap col">
                <?php
                do_action( 'neve_page_header', $context );
                ?>
                <div class="row block-content">
                <?php
                $args = array(
                'post_type' => 'custom_post_type_3',
                'posts_per_page' => 10,
                'order' => 'ASC',
                'orderby' => 'title'
                );
                $custom_query = new WP_Query( $args );  ?>
                <?php if($custom_query->have_posts()) :?>
                <?php while ($custom_query->have_posts()) : ?>
                <?php $custom_query->the_post();
                $title     = get_the_title();
                $image     = get_the_post_thumbnail_url();
                $permalink = get_the_permalink();
                $date      = get_the_date('Ymd');
                ?>
                    <div class="col-md-4 col-xs-4 mb-2">
                        <div class="scope">
                            <a class="img cnv-img-rectangle v2" href="<?= $permalink ?>" title="">
                                <img src="<?= $image ?>" alt="" title="">
                            </a>
                            <p><?= $date ?></p>
                            <h3 class="title"><a class="smooth" href="<?= $permalink ?>" title=""><?= $title ?></a></h3>
                        </div>
                    </div>
                    <?php endwhile; ?>
                <?php endif; ?>
                <?php wp_reset_postdata();  ?>
                </div>
            </div>
            <?php do_action( 'neve_do_sidebar', $context, 'right' ); ?>
        </div>
    </div>
</div>

<div class="back-to-top"><i class="fa-solid fa-arrow-up"></i></div>
<?php
get_footer();
?>
