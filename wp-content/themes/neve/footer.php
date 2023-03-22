<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the "wrapper" div and all content after.
 *
 * @package Neve
 * @since   1.0.0
 */

/**
 * Executes actions before main tag is closed.
 *
 * @since 1.0.4
 */
do_action('neve_before_primary_end'); ?>

</main><!--/.neve-main-->

<footer class="bg-footer">
    <?php
    $title = get_field('title', 'options');
    ?>
    <div class="container reveal">
        <div class="row align-items-center">
            <div class="col-lg-3 text-center order-lg-last wow fadeInUp"
                 style="visibility: visible; animation-name: fadeInUp;">
                <p><img src="<?php echo get_template_directory_uri(); ?>/assets/img/header/newlogo-edit-02.png" alt="new-logo" />
                </p>
            </div>
            <div class="col-lg-9">

                <h4 class="name wow fadeInUp"
                    style="visibility: visible; animation-name: fadeInUp;"><?php echo $title; ?></h4>
                <div class="row">
                    <?php if (have_rows('information', 'options')) : ?>
                        <?php while (have_rows('information', 'options')): ?>
                            <?php the_row();
                            $office  = get_sub_field('office');
                            $address = get_sub_field('address');
                            $phone   = get_sub_field('phone');
                            $fax     = get_sub_field('fax');
                            $email   = get_sub_field('email');
                            ?>
                            <div class="col-lg-6 col-md-6 wow fadeInUp"
                                 style="visibility: visible; animation-name: fadeInUp;">
                                <div class="f-line"><i class="fa fa-home" aria-hidden="true"></i><span class="ml-2"><?php echo $office; ?></span> : <br>
                                    </div>
                                <div class="f-line">
                                    <span class="ml-2"><?php echo $address; ?></span>
                                </div>
                                <div class="f-line"><i class="fa fa-phone" aria-hidden="true"></i><span class="ml-2"><?php echo $phone; ?></span></div>
                                <div class="f-line"><i class="fa fa-fax" aria-hidden="true"></i><span class="ml-2"><?php echo $fax; ?></span></div>
                                <div class="f-line"><i class="fa fa-envelope" aria-hidden="true"></i><span class="ml-2"><?php echo $email; ?></span> |&nbsp;
                                </div>
                            </div>

                        <?php endwhile; ?>
                    <?php endif; ?>

                </div>
            </div>

        </div>
    </div>

</footer>
<?php

/**
 * Executes actions after main tag is closed.
 *
 * @since 1.0.4
 */
do_action('neve_after_primary');

/**
 * Filters the content parts.
 *
 * @param bool $status Whether the component should be displayed or not.
 * @param string $context The context name.
 *
 * @since 1.0.9
 *
 */
if (apply_filters('neve_filter_toggle_content_parts', true, 'footer') === true) {

    /**
     * Executes actions before the footer was rendered.
     *
     * @since 1.0.0
     */
    do_action('neve_before_footer_hook');

    /**
     * Executes the rendering function for the footer.
     *
     * @since 1.0.0
     */
    do_action('neve_do_footer');

    /**
     * Executes actions after the footer was rendered.
     *
     * @since 1.0.0
     */
    do_action('neve_after_footer_hook');
}
?>

</div><!--/.wrapper-->
<?php

wp_footer();

/**
 * Executes actions before the body tag is closed.
 *
 * @since 2.11
 */
do_action('neve_body_end_before');

?>
</body>

</html>
