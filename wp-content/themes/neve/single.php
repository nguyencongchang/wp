<?php
/**
 * Author:          Andrei Baicus <andrei@themeisle.com>
 * Created on:      28/08/2018
 *
 * @package Neve
 */

$container_class = apply_filters('neve_container_class_filter', 'container', 'single-post');
$context = class_exists( 'WooCommerce', false ) && ( is_cart() || is_checkout() || is_account_page() ) ? 'woo-page' : 'single-page';

get_header();

?>
    <div class="<?php echo esc_attr($container_class); ?> single-post-container">
        <div class="breadcrumbs">
            <ul>
                <?php
                $postTypeLabel = "";
                $postTypeObject = get_post_type_object(get_post_type());
                if (get_post_type() === "post") {
                    $postTypeLabel = "Tin Tức";
                } else {
                    $postTypeLabel = $postTypeObject->labels->singular_name;
                }

                $postTypeLink = "";
                switch ($postTypeLabel) {
                    case "Tin Tức":
                        $postTypeLink = "/page/tin-tuc";
                        break;
                    case "Dịch Vụ":
                        $postTypeLink = "/page/service";
                        break;
                    case "Dự Án":
                        $postTypeLink = "/page/project";
                        break;
                    case "Sản Phẩm":
                        $postTypeLink = "/page/product";
                        break;
                    default:
                        break;
                }
                $permalink = get_permalink();
                $title = get_the_title();
                ?>
                <li><a href="/">Trang chủ</a></li>
                <li class="post-type"><a href="<?= $postTypeLink ?>"><?= $postTypeLabel ?></a></li>
                <li><a href="<?= $permalink ?>"><?= $title ?></a></li>
            </ul>
        </div>
        <div class="d-flex">
            <div class="single container col-12 col-lg-8">
                <h1 class="s-title"><?= $title ?></h1>
                <time><i class="fa fa-calendar"></i><?= get_the_date('F d, Y') ?></time>
                <div class="s-content fv-content">
                    <?= get_the_content() ?>
                </div>
                    <?php if(have_rows('slide-image')): ?>
                    <div class="pro-gallery">
                            <div class="pro-img">
                                <?php while (have_rows('slide-image')): ?>
                                    <?php the_row();
                                          $image = get_sub_field('image');
                                    ?>
                                    <div class="slick-slide">
                                        <a class="img cnv-img-rectangle v2 fancybox" data-fancybox="gallery" tabindex="-1">
                                            <img src="<?= $image['url']?>" alt="" title="">
                                        </a>
                                    </div>
                                <?php endwhile;?>
                            </div>
                            <div class="pro-thumb">
                                <?php while (have_rows('slide-image')): ?>
                                    <?php the_row();
                                    $image = get_sub_field('image');
                                    ?>
                                    <div class="slick-slide">
                                        <div class="img cnv-img-rectangle v2">
                                            <img src="<?= $image['url']?>" alt="" title="">
                                        </div>
                                    </div>
                                <?php endwhile;?>
                            </div>
                        </div>
                    <?php endif;?>

                <div class="s-social d-flex">
                    <span class="text">Chia sẻ:</span>
                    <div class="ctrl">
                        <ul class="cnv-social-icons list-inline">
                            <li class="list-inline-item"><a
                                        href="https://www.facebook.com/sharer/sharer.php?u=<?= $permalink ?>"
                                        onclick="window.open(this.href, 'facebook-share','width=580,height=296');return false;"
                                        class="facebook"><i class="fa fa-facebook"></i></a></li>
                            <li class="list-inline-item"><a
                                        href="https://twitter.com/intent/tweet?text=<?= $permalink ?>;url=<?= $permalink ?>"
                                        onclick="window.open(this.href, 'twitter-share', 'width=550,height=235');return false;"
                                        class="twitter"><i class="fa fa-twitter"></i></a></li>
                            <li class="list-inline-item"><a href="https://plus.google.com/share?url=<?= $permalink ?>"
                                                            onclick="window.open(this.href, 'google-plus-share', 'width=490,height=530');return false;"
                                "="" class="instagram"><i class="fa fa-google-plus"></i></a></li>
                        </ul>
                    </div>
                </div>
                <div id="fb-root"></div>
                <script async defer crossorigin="anonymous"
                        src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v16.0&appId=1985039484937664&autoLogAppEvents=1"
                        nonce="AE0xGFiN"></script>
                <div class="fb-comments" data-href="https://developers.facebook.com/docs/plugins/comments#configurator"
                     data-width="" data-numposts="1"></div>
                <?php
                // Get the category or tag IDs of the current post
                $categories = get_the_category();
                $tags = get_the_tags();
                $category_ids = array();
                $tag_ids = array();

                foreach ($categories as $category) {
                    $category_ids[] = $category->term_id;
                }

                foreach ($tags as $tag) {
                    $tag_ids[] = $tag->term_id;
                }

                // Query posts that have the same category or tag as the current post
                $args = array(
                    'post_type' => get_post_type(),
                    'post__not_in' => array(get_the_ID()),
                    'posts_per_page' => 3, // Change this value to display more or fewer related posts
                    'tax_query' => array(
                        'relation' => 'OR',
                        array(
                            'taxonomy' => 'category',
                            'field' => 'term_id',
                            'terms' => $category_ids,
                        ),
                        array(
                            'taxonomy' => 'post_tag',
                            'field' => 'term_id',
                            'terms' => $tag_ids,
                        ),
                    ),
                );
                $related_posts = new WP_Query($args); ?>
                <?php if ($related_posts->have_posts()): ?>
                    <div class="bor-box lpost-box">
                        <h2 class="i-title">Bài viết liên quan</h2>
                        <ul>
                        <?php while ($related_posts->have_posts()):?>
                        <?php  $related_posts->the_post();?>
                            <li>
                                <a href="<?= get_permalink() ?>">
                                    <?= get_the_title() ?>
                                </a>
                            </li>
                        <?php endwhile;?>
                        </ul>
                    </div>
                <?php endif; ?>
            </div>
            <div class="col-12 col-lg-4 side-bar">
                <?php do_action( 'neve_do_sidebar', $context, 'right' ); ?>
            </div>
        </div>
    </div>
    <div class="back-to-top"><i class="fa-solid fa-arrow-up"></i></div>
<?php
get_footer();
