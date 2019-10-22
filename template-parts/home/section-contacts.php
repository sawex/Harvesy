<?php
/**
 * Template part for displaying about section
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Harvesy
 * @since 1.0.0
 */

/* @var string $contacts_text */
$contacts_text = wp_kses_post( get_field( 'contacts_text' ) );
?>

<section class="contacts section-padding">
  <h2 class="secondary-title" id="contacts">
    <?php esc_html_e( 'Contacts', 'mst_harvesy' ); ?>
  </h2>

  <div class="container-fluid">
    <div class="row">
      <div class="contacts__content-box box-padding">

        <div class="contacts__info-box">
          <?php
            if ( ! empty( $contacts_text ) ) {
              echo $contacts_text;
            }
          ?>

          <button class="contacts__callback-btn button">
            <?php esc_html_e( 'Call me', 'mst_harvesy' ); ?>
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
