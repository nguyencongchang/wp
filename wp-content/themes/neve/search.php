<?php
/**
 * Author:          Andrei Baicus <andrei@themeisle.com>
 * Created on:      04/09/2018
 *
 * @package Neve
 */

$container_class = apply_filters( 'neve_container_class_filter', 'container', 'blog-archive' );

get_header();

$wrapper_classes = [ 'posts-wrapper' ];
$wrapper_classes = apply_filters( 'neve_posts_wrapper_class', $wrapper_classes );
$context = class_exists( 'WooCommerce', false ) && ( is_cart() || is_checkout() || is_account_page() ) ? 'woo-page' : 'single-page';

?>
	<div class="<?php echo esc_attr( $container_class ); ?> archive-container">
        <div class="breadcrumbs">
            <ul>
                <li><a href="/">Trang chủ</a></li>
                <li><a href="#"> Kết quả tìm kiếm</a></li>
            </ul>
        </div>
		<div class="row">
			<div class="nv-index-posts search col">
                <h1 class="pcate-title"><span>Kết quả tìm kiếm</span></h1>
				<?php if(have_posts()) :?>
                    <div class="row">
                        <?php while (have_posts()) :?>
                            <?php the_post();?>
                            <div class="col-md-4 col-xs-4 mb-2">
                                <div class="scope">
                                    <a class="img cnv-img-rectangle v2" href="<?= get_permalink()?>" title="">
                                        <img src="<?= get_the_post_thumbnail_url() ?>" alt="" title="">
                                    </a>
                                    <p><?= get_the_date('Ymd')?></p>
                                    <h3 class="title"><a class="smooth" href="<?= get_permalink() ?>" title=""><?= get_the_title()?></a></h3>
                                </div>
                            </div>
                        <?php endwhile;?>
                    </div>
                <?php else:?>
                    <?php get_template_part( 'template-parts/content', 'none' );?>
                <?php endif;?>
				<div class="w-100"></div>
			</div>
            <?php do_action( 'neve_do_sidebar', $context, 'right' ); ?>
		</div>
	</div>
<?php
get_footer();
