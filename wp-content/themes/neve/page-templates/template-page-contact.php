<?php
/**
 * Template Name: Contact Page Template
 *
 * The template for the page builder full-width.
 *
 * It contains header, footer and 100% content width.
 *
 * @package Neve
 */
add_action(
    'body_class',
    function ($class) {
        $class[] = 'nv-template';
        return $class;
    }
);
$container_class = apply_filters('neve_container_class_filter', 'container', 'single-page');
$context = class_exists('WooCommerce', false) && (is_cart() || is_checkout() || is_account_page()) ? 'woo-page' : 'single-page';

get_header();
?>
<div class="<?php echo esc_attr($container_class); ?> single-page-container page-template">
    <?php
    do_action('neve_page_header', $context); ?>
    <div class="section-contact row">
        <div class="col-8">
            <?php echo do_shortcode("[contact-form-7 id='101' title='Contact']")?>
        </div>
        <div class="col-4 mb-lg-5">
            <div class="block-address fv-content">
                <p><strong> <?= get_field('title', 'options'); ?></strong></p>
                <?php if (have_rows('information', 'options')) : ?>
                    <?php while (have_rows('information', 'options')): ?>
                        <?php the_row();
                        $office = get_sub_field('office');
                        $address = get_sub_field('address');
                        $phone = get_sub_field('phone');
                        $fax = get_sub_field('fax');
                        $email = get_sub_field('email');
                        ?>
                        <p>
                            <strong><?= $office ?><span>:</span></strong><?= $address ?><br>
                            <strong><?= $phone ?></strong><br>
                            <strong><?= $fax ?></strong><br>
                            <strong><?= $email ?></strong>&nbsp;
                        </p>
                    <?php endwhile; ?>
                <?php endif; ?>

            </div>
        </div>
    </div>
</div>
<div class="map">
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3724.123767871314!2d105.85005821521978!3d21.027733185998965!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135ac69f861af3f%3A0x331250d72cd2fa28!2zSOG7kyBHxrDGoW0gKEhvYcyAbiBLacOqzIFtKQ!5e0!3m2!1svi!2s!4v1679567777885!5m2!1svi!2s"
            width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"
            referrerpolicy="no-referrer-when-downgrade"></iframe>
</div>
<div class="back-to-top"><i class="fa-solid fa-arrow-up"></i></div>

<?php
get_footer();
?>
