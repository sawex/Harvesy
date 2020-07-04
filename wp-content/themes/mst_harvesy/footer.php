<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Harvesy
 */

$motto = wp_kses_post(get_field('motto'));
?>

  <footer class="main-footer">
    <div class="container-fluid">
      <div class="row">
        <div class="main-footer__wrap box-padding">
          <nav class="main-footer__navbar">
            <?php
            wp_nav_menu([
              'theme_location' => 'footer-menu',
              'menu_id' => 'primary-menu',
              'container' => false,
              'menu_class' => 'main-footer__menu',
              'list_item_class' => 'main-footer__list-item',
              'link_class' => 'main-footer__nav-link',
            ]);
            ?>

            <button class="button booking-btn booking">
              <?php esc_html_e('Booking', 'mst_harvesy'); ?>
            </button>
          </nav>

          <div class="main-footer__logo-and-slogan">
            <?php the_custom_logo(); ?>

            <p class="main-footer__slogan"><?php echo $motto; ?></p>
          </div>

          <nav class="main-footer__social-nav">
            <?php get_template_part('template-parts/footer/content', 'social-links'); ?>
          </nav>
        </div>
      </div>
    </div>

    <div class="main-footer__copyright-container">
      <p class="main-footer__copyright">
        <?php
        printf(
          esc_html__('Harvesy studio © %d, All rights reserved', 'mst_harvesy'),
          date('Y')
        );
        ?>
      </p>
    </div>
  </footer>

<?php wp_footer();
