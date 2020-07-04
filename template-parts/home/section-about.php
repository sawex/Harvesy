<?php
/**
 * Template part for displaying about section
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Harvesy
 * @since 1.0.0
 */

/* @var array $fields ACF fields */
$fields = get_fields();

/* @var array $about_us_gallery */
$about_us_gallery = $fields['about_us_gallery'];

/* @var string $about_us_text */
$about_us_text = wp_kses_post($fields['about_us_text']);
?>

<section class="about-us section-padding">
  <h2 class="secondary-title" id="aboutus">
    <?php esc_html_e('About us', 'mst_harvesy'); ?>
  </h2>

  <div class="container-fluid">
    <div class="row">
      <div class="about-us__content-box box-padding">
        <div class="about-us__carousel-container">
          <?php
          if (!empty($about_us_gallery)) {
            foreach ($about_us_gallery as $photo) {

              /* @var string $src */
              $src = esc_url($photo['url']);

              /* @var string $alt */
              $alt = esc_attr($photo['alt']);
              ?>

              <div class="about-us__carousel-item">
                <img src="" data-src="<?php echo $src; ?>" alt="<?php echo $alt; ?>"
                     class="about-us__carousel-img lazy">
              </div>

              <?php
            }
          }
          ?>
        </div>

        <div class="about-us__description">
          <h3 class="tertinary-title about-us__desc-title">
            <?php esc_html_e('Harvesy studio', 'mst_harvesy'); ?>
          </h3>

          <div class="about-us__desc-text-box">
            <?php
            if (!empty($about_us_text)) {
              echo $about_us_text;
            }
            ?>
          </div>
        </div>

      </div>
    </div>
  </div>
</section>
