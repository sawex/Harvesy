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

      get_footer();
    ?>
	</main>

  <!-- Popups -->
  <div class="background-popup"></div>
  <?php
    get_template_part( 'template-parts/popups/popup', 'callback' );
    get_template_part( 'template-parts/popups/popup', 'book' );
    get_template_part( 'template-parts/popups/popup', 'success' );
  ?>

</body>
</html>
