<?php
/*
  Template Name: Home page
*/

defined( 'ABSPATH' ) || exit;
get_header();

$fields = get_fields();
$photo_gallery = $fields['photo_gallery'];
$video_gallery = $fields['video_gallery'];

$about_us_gallery = $fields['about_us_gallery'];
$about_us_text = $fields['about_us_text'];
$contacts_text = $fields['contacts_text'];
?>

	<main class="main">
		<section class="photo-gallery gallery">
			<h2 class="secondary-title" id="photos">
        <?php esc_html_e( 'Photo', 'mst_harvesy' ); ?>
      </h2>

			<div class="gallery__slider">
        <?php
          if ( isset( $photo_gallery ) ) {
            foreach( $photo_gallery as $photo ) {
              $id = esc_attr( $photo['id'] );
              $src = esc_url( $photo['sizes']['medium_large'] );
              $full = esc_attr( esc_url( $photo['url'] ) );
              $alt = esc_attr( $photo['alt'] );
              $label = esc_attr__( sprintf( 'Open photo %s', $alt ), 'mst_harvesy' );
        ?>

				<div class="gallery__slider-img-box" id="photo-<?php echo $id; ?>">
					<a class="gallery__slider-img-link">
						<img src="<?php echo $src; ?>"
                 alt="<?php echo $alt; ?>"
                 class="gallery__slider-image">

						<div class="gallery__slider-img-btn--hover">
							<button class="photo-gallery__opening-button"
                      aria-label="<?php echo $label; ?>"
                      data-full="<?php echo $full; ?>">
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
                aria-label="<?php esc_attr_e( 'Show previous gallery photos', 'mst_harvesy' ); ?>">
        </button>
        <button class="arrow gallery__slider-nav-arrow-right"
                aria-label="<?php esc_attr_e( 'Show next gallery photos', 'mst_harvesy' ); ?>">
        </button>
      </div>
		</section>

		<section class="video-gallery gallery">
			<h2 class="secondary-title" id="videos">
        <?php esc_html_e( 'Video', 'mst_harvesy' ); ?>
      </h2>

			<div class="gallery__slider">
        <?php
          if ( isset( $video_gallery ) ) {
            foreach( $video_gallery as $video_el ) {
              $vimeo_url = $video_el['vimeo_url'];
              $video_thumbnail = $video_el['thumbnail'];

              $id = esc_attr( $video_thumbnail['id'] );
              $src = esc_url( $video_thumbnail['sizes']['medium_large'] );
              $full = esc_attr( esc_url( $video_thumbnail['url'] ) );
              $alt = esc_attr( $video_thumbnail['alt'] );
              $label = esc_attr__( sprintf( 'Open photo %s', $alt ), 'mst_harvesy' );
              ?>

              <div class="gallery__slider-img-box" id="photo-<?php echo $id; ?>">
                <a class="gallery__slider-img-link">
                  <img src="<?php echo $src; ?>"
                       alt="<?php echo $alt; ?>"
                       class="gallery__slider-image">

                  <div class="gallery__slider-img-btn--hover">
                    <button class="video-gallery__opening-button"
                            aria-label="<?php echo $label; ?>"
                            data-full="<?php echo $full; ?>">
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

		<section class="about-us section-padding">
			<h2 class="secondary-title" id="aboutus">
        <?php esc_html_e( 'About us', 'mst_harvesy' ); ?>
      </h2>
			<div class="container-fluid">
				<div class="row">
					<div class="about-us__content-box box-padding">
						<div class="about-us__carousel-container">

              <?php
                if ( isset( $about_us_gallery ) ) {
                  foreach( $about_us_gallery as $photo ) {
                    $src = esc_url( $photo['url'] );
                    $alt = esc_attr( $photo['alt'] );
              ?>

                <div class="about-us__carousel-item">
                  <img src="<?php echo $src; ?>" alt="<?php echo $alt; ?>" class="about-us__carousel-img">
                </div>

              <?php
                }
              }
              ?>

						</div>

						<div class="about-us__description">
							<h3 class="tertinary-title about-us__desc-title">
							  <?php esc_html_e( 'Harvesy studio', 'mst_harvesy' ); ?>
							</h3>

							<div class="about-us__desc-text-box">
                <?php
                  if ( isset( $about_us_text ) ) {
                    echo $about_us_text;
                  }
                ?>
							</div>
						</div>

					</div>
				</div>
			</div>
		</section>

		<section class="contacts section-padding">
			<h2 class="secondary-title" id="contacts">
        <?php esc_html_e( 'Contacts', 'mst_harvesy' ) ?>
      </h2>
			<div class="container-fluid">
				<div class="row">
					<div class="contacts__content-box box-padding">

						<div class="contacts__info-box">
              <?php
                if ( isset( $contacts_text ) ) {
                  echo $contacts_text;
                }
              ?>

							<button class="contacts__callback-btn button">
                <?php esc_html_e('Call me', 'mst_harvesy' ); ?>
              </button>
						</div>

						<div class="contacts__instagram-photos">
              <?php
                if ( is_active_sidebar( 'instagram-sidebar' ) ) {
                  dynamic_sidebar( 'instagram-sidebar' );
                }
              ?>
						</div>
					</div>
				</div>
			</div>
		</section>
	</main>

<?php
get_footer();