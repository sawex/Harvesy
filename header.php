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

  <?php
    if ( function_exists( 'mst_harvesy_the_loader_logo' ) ) {
      mst_harvesy_the_loader_logo();
    }
  ?>

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

								wp_nav_menu( [
									'theme_location'  => 'header-menu',
									'menu_id'         => 'primary-menu-mobile',
									'container'			  => false,
									'menu_class' 		  => 'main-header__nav-menu mobile-header__nav-menu',
									'list_item_class' => 'main-header__nav-list-item',
									'link_class' 	 	  => 'main-header__nav-link',
								] );
							?>
						</div>
						
						<?php
              the_custom_logo();
						  get_template_part( 'template-parts/header/content', 'mobile-social-links' );
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
              'menu_id'         => 'primary-menu-desktop',
              'container'			  => false,
              'menu_class' 		  => 'main-header__nav-menu',
              'list_item_class' => 'main-header__nav-list-item',
              'link_class' 	 	  => 'main-header__nav-link',
            ] );

					  the_custom_logo();

						wp_nav_menu( [
							'theme_location'  => 'lang-menu',
							'menu_id'         => 'language-menu',
							'container'			  => false,
						] );

					  get_template_part( 'template-parts/header/content', 'desktop-social-links' );
					?>
				</nav>
			</div>
		</div>
	</header>