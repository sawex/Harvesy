<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Harvesy
 */

get_header();
?>

  <div class="page-404">
    <div class="page-404__wrap">
      <h1 class="page-404__title">
        <span class="page-404__title--top">404</span>
        <span class="page-404__title--bottom">
          <?php esc_html_e('There is no such page', 'mst_harvesy'); ?>
        </span>
      </h1>
      <a href="<?php echo esc_url(home_url()); ?>" class="page-404__to-home-btn button">
        <?php esc_html_e('Homepage', 'mst_harvesy'); ?>
      </a>
    </div>
  </div>

<?php get_footer();
