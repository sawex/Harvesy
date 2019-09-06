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

$slogan = get_field('slogan');
?>

  <footer class="main-footer">
			<div class="container-fluid">
				<div class="row">
					<div class="main-footer__wrap box-padding">
						<nav class="main-footer__navbar">
							<?php
								wp_nav_menu( [
									'theme_location'  => 'footer-menu',
									'menu_id'         => 'primary-menu',
									'container'			  => false,
									'menu_class' 		  => 'main-footer__menu',
									'list_item_class' => 'main-footer__list-item',
									'link_class' 	 	  => 'main-footer__nav-link',
								] );
							?>

							<button class="button booking-btn booking">
                <?php esc_html_e( 'Booking', 'mst_harvesy' ); ?>
              </button>
						</nav>
						
						<div class="main-footer__logo-and-slogan">
							<?php the_custom_logo(); ?>

							<p class="main-footer__slogan"><?php echo $slogan; ?></p>
						</div>

						<nav class="main-footer__social-nav">
              <?php
                if ( is_active_sidebar( 'footer-header-sidebar' ) ) {
                  dynamic_sidebar( 'footer-header-sidebar' );
                }
              ?>
						</nav>
					</div>
				</div>
			</div>
<!--    TODO: Fix grammar -->
			<div class="main-footer__copyrigt-container">
				<p class="main-footer__copyrygt">
          <?php
            printf(
              esc_html__( 'Harvesy studio © %d, All rights reserved', 'mst_harvesy' ),
              date('Y')
            );
          ?>
        </p>
			</div>
	</footer>

  <!-- Popups -->
  <div class="background-popup"></div>

  <div class="booking-popup popup-box form-container">
    <button class="close-btn"
            aria-label="<?php esc_attr_e( 'Close modal', 'mst_harvesy' ); ?>">
    </button>
    <form class="popup__form booking-popup__form">
      <label class="popup__label">
        <?php esc_html_e( 'Your name', 'mst_harvesy' ); ?>
        <input name="name" class="popup__input" type="text" placeholder="Viktor">
      </label>

      <label class="popup__label">
        <?php esc_html_e( 'Your phone number', 'mst_harvesy' ); ?>
        <input name="phone" class="popup__input popup__input--tel" type="tel" placeholder="+380671122333" required="">
      </label>

      <label class="popup__label">
        <?php esc_html_e( 'Your email', 'mst_harvesy' ); ?>
        <input name="email"
               class="popup__input popup__input--email"
               type="email"
               placeholder="example@gmail.com"
               required="">
      </label>

      <label class="popup__label">
        <?php esc_html_e( 'Task description', 'mst_harvesy' ); ?>
        <textarea name="description"
                  class="popup__input popup__input--textarea"
                  placeholder="
                  <?php esc_html_e(
                    'A brief description of the service you would like to receive',
                    'mst_harvesy'
                  ); ?>">
        </textarea>
      </label>

      <input type="submit"
             value="<?php esc_html_e( 'Send', 'mst_harvesy' ); ?>"
             class="button popup__submit-btn">
    </form>
  </div>

  <div class="callback-popup popup-box form-container">
    <button class="close-btn"
            aria-label="<?php esc_attr_e( 'Close modal', 'mst_harvesy' ); ?>">
    </button>
    <form class="popup__form">
      <label class="popup__label">
        <?php esc_html_e( 'Your phone number', 'mst_harvesy' ); ?>
        <input name="phone" class="popup__input popup__input--tel" type="tel" placeholder="+380671122333" required="">
      </label>
<!--      TODO: Change Viktor and add name icon -->
      <label class="popup__label">
        <?php esc_html_e( 'Your name', 'mst_harvesy' ); ?>
        <input name="name" class="popup__input" type="text" placeholder="Viktor">
      </label>

      <input type="submit"
             value="<?php esc_html_e( 'Send', 'mst_harvesy' ); ?>"
             class="button popup__submit-btn">
    </form>
  </div>

	<?php wp_footer(); ?>

</body>
</html>
