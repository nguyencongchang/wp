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
        <div class="section-information container reveal">
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
        <div class="section-services reveal">
            <?php if(have_rows('section-service')) :?>
            <?php while (have_rows('section-service')): ?>
            <?php the_row();
                $title = get_sub_field('title');
                $desc  = get_sub_field('description'); ?>
                    <div class="container">
                        <div class="head text-center">
                            <h2 class="title"><?= $title ?></h2>
                            <div class="desc"><?= $desc ?></div>
                        </div>
                    </div>
            <?php endwhile; ?>
            <?php endif; ?>

        </div>
        <div class="section-statistic reveal">
                <div class="container">
                    <div class="row sm-pad-5">
                        <?php if(have_rows('section-service')) :?>
                            <?php while (have_rows('section-service')): ?>
                                <?php the_row(); ?>
                                <?php if(have_rows('block-counter-number')) :?>
                                <?php $i = 0; ?>
                                    <?php while (have_rows('block-counter-number')): ?>
                                        <?php
                                        the_row();
                                        $i++;
                                        $number = get_sub_field('number');
                                        $desc   = get_sub_field('description');
                                        $image  = get_sub_field('image');
                                        ?>
                                        <div class="col-lg-3 col-6 st-col">
                                            <div class="statis">
                                                <div class="icon"><img src="<?=$image['url'] ?>" alt="icon" /></div>
                                                <div class="num"><span class="static-counter-<?= $i ?>" data-counter="<?= $number ?>"></span><span>+</span></div>
                                                <p><?= $desc ?></p>
                                            </div>
                                        </div>
                                    <?php endwhile; ?>
                                <?php endif; ?>
                            <?php endwhile; ?>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        <div class="section-project reveal">
            <div class="container v2">
                <div class="head text-center">
                    <?php if(have_rows('section-project')) :?>
                    <?php while (have_rows('section-project')): ?>
                    <?php the_row();
                        $title = get_sub_field('title');
                        $desc  = get_sub_field('description');
                    ?>
                    <h2 class="title"><?= $title ?></h2>
                    <div class="desc ">
                        <?= $desc ?>
                    </div>
                        <?php endwhile; ?>
                    <?php endif; ?>
                </div>
                <div class="row">
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
                            $title   = get_the_title();
                            $image   = get_the_post_thumbnail_url();
                            $pemarlink = get_the_permalink();
                            $excerpt = get_the_excerpt();
                        ?>

                        <div class="col-lg-3 col-sm-6 wow fadeInUp">
                            <div class="project">
                                <a class="img cnv-img-2x3" href="<?= $pemarlink?>" title="">
                                    <img src="<?= $image ?>" alt="" title="">
                                </a>
                                <h3 class="i-title"><i class="fa fa-check-circle"></i> <?= $title ?></h3>
                                <div class="caption">
                                    <h3 class="title"><i class="fa fa-check-circle"></i><?= $title ?></h3>
                                    <p class="excerpt"><?= $excerpt ?></p>
                                    <a class="smooth more" href="<?= $pemarlink ?>" title="">View Project <i class="arrow_right"></i></a>
                                </div>
                            </div>
                        </div>
                        <?php endwhile; ?>
                    <?php endif; ?>
                    <?php wp_reset_postdata();  ?>
                </div>
                <a class="btn-show-more" href="/page/du-an">Xem thêm</a>
            </div>
        </div>
        <div class="section-scope reveal">
            <div class="container">
                <div class="head">
                    <?php if(have_rows('section-product')) :?>
                        <?php while (have_rows('section-product')): ?>
                        <?php the_row();
                        $title = get_sub_field('title');
                        $desc  = get_sub_field('description');
                        ?>
                        <h2 class="title"><?= $title?></h2>
                        <div class="desc"><?= $desc ?></div>
                        <?php endwhile; ?>
                    <?php endif; ?>
                    <a class="smooth pro-btn" href="" title="">Sản phẩm</a>
                </div>
                <div class="slick-slide-product">
                    <?php
                        $args = array(
                            'post_type' => 'custom_post_type_3',
                            'posts_per_page' => -1,
                            'order' => 'ASC',
                            'orderby' => 'title'
                        );
                        $custom_query = new WP_Query( $args );  ?>
                    <?php if($custom_query->have_posts()) :?>
                        <?php while ($custom_query->have_posts()) : ?>
                        <?php $custom_query->the_post();
                            $title     = get_the_title();
                            $image     = get_the_post_thumbnail_url();
                            $pemarlink = get_the_permalink();
                            $date      = get_the_date('Ymd');
                            ?>
                        <div class="slick-slide">
                            <div class="scope">
                                <a class="img cnv-img-rectangle v2" href="<?= $pemarlink ?>">
                                    <img src="<?= $image ?>" alt="" title="">
                                </a>
                                <p><?= $date?></p>
                                <h3 class="title"><a class="smooth" href="<?= $pemarlink ?>" title="" tabindex="0"><?= $title ?></a></h3>
                            </div>
                        </div>
                        <?php endwhile; ?>
                    <?php endif; ?>
                    <?php wp_reset_postdata();  ?>
                </div>
            </div>
        </div>
        <div class="section-milestone reveal">
            <div class="container">
                <div class="head text-center">
                    <?php if(have_rows('section-milestones')) :?>
                        <?php while (have_rows('section-milestones')): ?>
                            <?php the_row();
                            $title = get_sub_field('title');
                            $desc  = get_sub_field('description');
                            ?>
                            <h2 class="title"><?= $title?></h2>
                            <div class="desc"><?= $desc ?></div>
                        <?php endwhile; ?>
                    <?php endif; ?>
                </div>
                <?php if(have_rows('section-milestones')) :?>
                    <?php while (have_rows('section-milestones')): ?>
                    <?php the_row()?>
                        <div class="mile-cas">
                            <?php if(have_rows('block-milestones')) :?>
                                <?php $i = 0;?>
                                <?php while (have_rows('block-milestones')): ?>
                                <?php the_row();
                                    $i++;
                                    $time  = get_sub_field('time');
                                    $desc  = get_sub_field('description'); ?>
                                    <div class="slick-slide">
                                        <div class="item">
                                            <div class="num"><?= $i ?></div>
                                            <div class="date"><?= $time ?></div>
                                            <p><?= $desc ?></p>
                                        </div>
                                    </div>
                                <?php endwhile; ?>
                            <?php endif; ?>
                        </div>
                    <?php endwhile; ?>
                <?php endif; ?>
            </div>
        </div>
        <div class="section-article reveal">
            <div class="container">
                <div class="head">
                    <?php if(have_rows('section-posts')) :?>
                        <?php while (have_rows('section-posts')): ?>
                            <?php the_row();
                            $title = get_sub_field('title');
                            $desc  = get_sub_field('description');
                            ?>
                            <h2 class="title"><?= $title?></h2>
                            <div class="desc"><?= $desc ?></div>
                        <?php endwhile; ?>
                    <?php endif; ?>
                </div>
                <div class="article-cas">
                    <div class="article">
                        <?php
                        $args = array(
                            'post_type' => 'post',
                            'posts_per_page' => 2,
                            'order' => 'ASC',
                            'orderby' => 'title' );
                        $custom_query = new WP_Query( $args );  ?>
                        <?php if($custom_query->have_posts()) :?>
                        <?php while ($custom_query->have_posts()) : ?>
                        <?php $custom_query->the_post();
                        $title     = get_the_title();
                        $image     = get_the_post_thumbnail_url();
                        $pemarlink = get_the_permalink();
                        $date      = get_the_date('F d,y');
                        ?>
                        <a class="img cnv-img-square v2" href="<?= $pemarlink ?>" title="" tabindex="0">
                            <img src="<?= $image?>" alt="" title="">
                        </a>
                        <p><i class="fa fa-calendar"></i>&nbsp; <?= $date ?></p>
                        <h3 class="title"><a class="smooth" href="<?= $pemarlink ?>" title="" tabindex="0"><?= $title ?></a></h3>
                    </div>
                    <?php endwhile; ?>
                    <?php endif; ?>
                    <?php wp_reset_postdata();  ?>
                </div>
            </div>
        <div class="section-partner">
            <div class="container">
                <div class="partner-cas">
                    <?php if(have_rows('section-brand')) :?>
                    <?php while (have_rows('section-brand')): ?>
                    <?php the_row();
                    $brandImage = get_sub_field('image-brand');
                    ?>
                            <div class="slick-slide">
                                <a class="smooth partner" href="" title="" tabindex="-1">
                                    <img src="<?= $brandImage["url"] ?>" alt="" title="">
                                </a>
                            </div>
                        <?php endwhile;?>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
get_footer();
?>
