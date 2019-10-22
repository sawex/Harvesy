<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Harvesy
 */

/* @var string $loader_logo_src */
$loader_logo_src = esc_url( get_field('loader_logo') );
?>

<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
  <?php wp_body_open(); ?>

  <?php if ( ! empty( $loader_logo_src ) ) { ?>
	<img src="<?php echo $loader_logo_src; ?>"
       alt=""
       class="main-header__logo-img logo__image loader-logo">
  <?php } ?>

	<div class="overlay"></div>

	<header class="main-header">
		<div class="mobile-header">
			<div class="container-fluid">
				<div class="row">
					<nav class="mobile-header__navbar">
						<div class="mobile-buttons">
							<div class="hamburger hamburger--spring">
						    <div class="hamburger-box">
						      <div class="hamburger-inner"></div>
						    </div>
  						</div>
						</div>

						<div class="mobile-header__nav-container disabled">
							<?php
								wp_nav_menu( [
									'theme_location'  => 'lang-menu',
									'menu_id'         => 'language-menu',
									'container'			  => false,
								] );
							?>

							<?php
								wp_nav_menu( [
									'theme_location'  => 'header-menu',
									'menu_id'         => 'primary-menu',
									'container'			  => false,
									'menu_class' 		  => 'main-header__nav-menu mobile-header__nav-menu',
									'list_item_class' => 'main-header__nav-list-item',
									'link_class' 	 	  => 'main-header__nav-link',
								] );
							?>
						</div>
						
						<?php the_custom_logo(); ?>

						<?php
            	if ( is_active_sidebar( 'mobile-header-sidebar' ) ) {
              	dynamic_sidebar( 'mobile-header-sidebar' );
            	}
            ?>
					</nav>
				</div>
			</div>
		</div>

		<div class="container-fluid desktop-header">
			<div class="row">
				<nav class="main-header__navbar">
					<?php
            wp_nav_menu( [
              'theme_location'  => 'header-menu',
              'menu_id'         => 'primary-menu',
              'container'			  => false,
              'menu_class' 		  => 'main-header__nav-menu',
              'list_item_class' => 'main-header__nav-list-item',
              'link_class' 	 	  => 'main-header__nav-link',
            ] );
					?>

					<?php the_custom_logo(); ?>

					<?php
						wp_nav_menu( [
							'theme_location'  => 'lang-menu',
							'menu_id'         => 'language-menu',
							'container'			  => false,
						] );
					?>

					<?php
           	if ( is_active_sidebar( 'desktop-header-sidebar' ) ) {
             	dynamic_sidebar( 'desktop-header-sidebar' );
           	}
          ?>
				</nav>
			</div>
		</div>
	</header>