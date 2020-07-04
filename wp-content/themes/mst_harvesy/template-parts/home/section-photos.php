<?php
/**
 * Template part for displaying photo gallery
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Harvesy
 * @since 1.0.0
 */

/* @var array $photo_gallery */
$photo_gallery = get_field('photo_gallery');
?>

<section class="photo-gallery gallery">
  <h2 class="secondary-title" id="photos">
    <?php esc_html_e('Photo', 'mst_harvesy'); ?>
  </h2>

  <div class="gallery__slider">
    <?php
    if (!empty($photo_gallery)) {
      foreach ($photo_gallery as $photo) {
        /* @var int $id */
        $id = esc_attr($photo['id']);

        /* @var string $src */
        $src = esc_url($photo['sizes']['medium_large']);

        /* @var string $full */
        $full = esc_attr(esc_url($photo['url']));

        /* @var string $alt */
        $alt = esc_attr($photo['alt']);

        /* @var string $label */
        $label = esc_attr__(sprintf('Open photo %s', $alt), 'mst_harvesy');
        ?>

        <div class="gallery__slider-img-box" id="photo-<?php echo $id; ?>">
          <a class="gallery__slider-img-link">
            <img src=""
                 data-src="<?php echo $src; ?>"
                 alt="<?php echo $alt; ?>"
                 data-bp="<?php echo $full; ?>"
                 class="gallery__slider-image lazy">

            <div class="gallery__slider-img-btn--hover gallery__slider-img-btn--photo">
              <button class="photo-gallery__opening-button"
                      aria-label="<?php echo $label; ?>">
              </button>
            </div>
          </a>
        </div>

        <?php
      }
    }
    ?>
  </div>

  <div class="gallery__slider-navigation">
    <button class="arrow gallery__slider-nav-arrow-left"
            aria-label="<?php esc_attr_e('Show previous gallery photos', 'mst_harvesy'); ?>">
    </button>
    <button class="arrow gallery__slider-nav-arrow-right"
            aria-label="<?php esc_attr_e('Show next gallery photos', 'mst_harvesy'); ?>">
    </button>
  </div>
</section>
