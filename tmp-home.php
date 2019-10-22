<?php
/*
  Template Name: Home page
*/

defined( 'ABSPATH' ) || exit;
get_header();
?>

	<main class="main" id="content" role="main">
    <?php
      get_template_part( 'template-parts/home/section', 'photos' );
      get_template_part( 'template-parts/home/section', 'videos' );
      get_template_part( 'template-parts/home/section', 'about' );
      get_template_part( 'template-parts/home/section', 'contacts' );
    ?>
	</main>

<?php
get_footer();