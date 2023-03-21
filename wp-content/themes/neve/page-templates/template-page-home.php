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

<div class="single-page-container">
    <div class="page-home">
        <div class="section-information container">
            <div class="row">
            <?php if(have_rows('section-information')) :?>
                <?php while (have_rows('section-information')): ?>
                <?php the_row();
                    $title             = get_sub_field('title');
                    $desc              = get_sub_field('description');
                    $content           = get_sub_field('content');
                    $image             = get_sub_field('image');
                    $yearsOfExperience = get_sub_field('years-of-experience');  ?>
                    <div class="col-lg-6 content-left">
                        <div class="cnv-head">
                            <h2 class="title"><?= $title ?></h2>
                            <div class="desc"><?= $desc ?></div>
                        </div>
                        <div class="s-content" >
                           <?= $content ?>
                        </div>
                        <a class="btn-show-more" href="/pages/ve-chung-toi">Xem thêm</a>
                    </div>
                    <div class="col-lg-6 content-right">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/home/ab-img.png" alt="ab-img" />
                        <div class="caption">
                            <div class="num"><span class="hc-counter" data-counter="<?= $yearsOfExperience?>"></span>+</div>
                            <p>Năm kinh nghiệm</p>
                    </div>
                <?php endwhile;?>
            <?php endif;?>
            </div>
            </div>
        </div>
        <div class="cnv-services">
            <?php if(have_rows('section-service')) :?>
            <?php while (have_rows('section-service')): ?>
            <?php the_row();
                $title = get_sub_field('title');
                $desc  = get_sub_field('description'); ?>
                    <div class="container">
                        <div class="cnv-head text-center">
                            <h2 class="title"><?= $title ?></h2>
                            <div class="desc"><?= $desc ?></div>
                        </div>
                    </div>
            <?php endwhile; ?>
            <?php endif; ?>

        </div>
        <div class="cnv-statistic">
                <div class="container">
                    <div class="row sm-pad-5">
                        <?php if(have_rows('section-service')) :?>
                            <?php while (have_rows('section-service')): ?>
                                <?php the_row(); ?>
                                <?php if(have_rows('block-counter-number')) :?>
                                    <?php while (have_rows('block-counter-number')): ?>
                                        <?php
                                        the_row();
                                        $number = get_sub_field('number');
                                        $desc   = get_sub_field('description');
                                        $image  = get_sub_field('image');
                                        ?>
                                        <div class="col-lg-3 col-6 st-col">
                                            <div class="statis">
                                                <div class="icon"><img src="/themes/default/images/st1.png" alt="icon" /></div>
                                                <div class="num"><span class="hc-counter">32</span>+</div>
                                                <p><?= $desc ?>></p>
                                            </div>
                                        </div>
                                    <?php endwhile; ?>
                                <?php endif; ?>
                            <?php endwhile; ?>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
</div>

<?php
get_footer();
?>
