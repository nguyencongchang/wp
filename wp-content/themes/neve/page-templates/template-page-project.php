<?php
/**
 * Template Name: Project Page Template
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
<div class="single-page-container page-template container">
    <div class="breadcrumbs">
        <ul>
            <li><a href="/">Trang chủ</a></li>
            <li><a href="/page/project">Dự Án</a></li>
        </ul>
    </div>
    <div class="container">
    <div class="row">
        <div class="nv-single-page-wrap col block-content col-12 col-lg-8">
            <?php
            $args = array(
                'post_type' => 'custom_post_type_1',
                'posts_per_page' => 4,
                'order' => 'ASC',
                'orderby' => 'title'
            );
            $custom_query = new WP_Query( $args );
            ?>
            <?php if($custom_query->have_posts()) :?>
            <?php while ($custom_query->have_posts()) : ?>
            <?php $custom_query->the_post();
            $title     = get_the_title();
            $image     = get_the_post_thumbnail_url();
            $permalink = get_the_permalink();
            $excerpt   = get_the_excerpt();
            ?>
                <div class="post2 clearfix d-block d-lg-flex">
                    <a class="img hv-scale hv-over cnv-img-2x3 w-100" href="<?= $permalink ?>" title="">
                        <img src="<?= $image ?>" alt="" title="">
                    </a>
                    <div class="ct">
                        <h2 class="title"><a class="smooth" href="<?= $permalink ?>" title=""><?= $title ?></a></h2>
                        <div class="des">
                            <?= $excerpt ?>
                        </div>
                        <a class="more" href="<?= $permalink ?>" title="">Xem chi tiết</a>
                    </div>
                </div>
                <?php endwhile; ?>
            <?php endif; ?>
            <?php wp_reset_postdata();  ?>
        </div>
        <div class="col-12 col-lg-4 side-bar">
            <?php do_action( 'neve_do_sidebar', $context, 'right' ); ?>
        </div>
    </div>
    </div>
</div>

<div class="back-to-top"><i class="fa-solid fa-arrow-up"></i></div>
<?php
get_footer();
?>
