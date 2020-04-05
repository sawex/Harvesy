<?php
/**
 * Template part for displaying video gallery
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Harvesy
 * @since 1.0.0
 */

/* @var array $video_gallery */
$video_gallery = get_field( 'video_gallery' );
?>

<section class="video-gallery gallery">
  <h2 class="secondary-title" id="videos">
    <?php esc_html_e( 'Video', 'mst_harvesy' ); ?>
  </h2>

  <div class="gallery__slider">
    <?php
    if ( ! empty( $video_gallery ) ) {
      foreach( $video_gallery as $video_el ) {

        /* @var string $vimeo_id */
        $vimeo_id = esc_attr( $video_el['vimeo_id'] );

        /* @var array $video_thumbnail Thumbnail data */
        $video_thumbnail = $video_el['thumbnail'];

        /* @var string $id Thumbnail id */
        $id = esc_attr( $video_thumbnail['id'] );

        /* @var string $src Thumbnail src */
        $src = esc_url( $video_thumbnail['sizes']['medium_large'] );

        /* @var string $alt Thumbnail alt */
        $alt = esc_attr( $video_thumbnail['alt'] );

        /* @var string $label Thumbnail a11y label */
        $label = esc_attr__( sprintf( 'Open photo %s', $alt ), 'mst_harvesy' );
        ?>

        <div class="gallery__slider-img-box" id="video-<?php echo $id; ?>" data-video-id="<?php echo $vimeo_id ?>">
          <a class="gallery__slider-img-link">
            <img src=""
                 data-src="<?php echo $src; ?>"
                 alt="<?php echo $alt; ?>"
                 class="gallery__slider-image lazy">

            <div class="gallery__slider-img-btn--hover gallery__slider-img-btn--video">
              <button class="video-gallery__opening-button"
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
            aria-label="<?php esc_attr_e( 'Show previous gallery videos', 'mst_harvesy' ); ?>">
    </button>
    <button class="arrow gallery__slider-nav-arrow-right"
            aria-label="<?php esc_attr_e( 'Show next gallery videos', 'mst_harvesy' ); ?>">
    </button>
  </div>
</section>
