<?php
/**
 * Template part for displaying callback popup form
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Harvesy
 * @since 1.0.0
 */
?>

<div class="callback-popup popup-box form-container">
  <button class="close-btn"
          aria-label="<?php esc_attr_e( 'Close popup', 'mst_harvesy' ); ?>">
  </button>

  <form class="popup__form">
    <label class="popup__label">
      <?php esc_html_e( 'Your phone number', 'mst_harvesy' ); ?>
      <input name="phone" class="popup__input popup__input--tel" type="tel" placeholder="+380671122333" required="">
    </label>

    <label class="popup__label">
      <?php esc_html_e( 'Your name', 'mst_harvesy' ); ?>
      <input name="name"
             class="popup__input"
             type="text"
             placeholder="<?php esc_attr_e( 'John Doe', 'mst_harvesy' ); ?>">
    </label>

    <input type="submit"
           value="<?php esc_html_e( 'Send', 'mst_harvesy' ); ?>"
           class="button popup__submit-btn">
  </form>
</div>
