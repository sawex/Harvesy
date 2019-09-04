<?php
/*
  Template Name: Home page
*/

defined( 'ABSPATH' ) || exit;
get_header();
?>

	<main class="main">
		<section class="photo-gallery gallery">
			<h2 class="secondary-title"><?php esc_html_e( 'Photo', 'mst_harvesy' ); ?></h2>
			<div class="container-fluid">
				<div class="row">
					<div class="gallery__slider">

						<div class="gallery__slider-img-box">
							<a href="#" class="gallery__slider-img-link">
								<img src="images/1.jpg" alt="Виски" class="gallery__slider-image">d
								<div class="gallery__slider-img-btn--hover">
									<button class="photo-gallery__opening-button"></button>
								</div>
							</a>
						</div>

						<div class="gallery__slider-navigation">
							<button class="arrow gallery__slider-nav-arrow-left"></button>
							<button class="arrow gallery__slider-nav-arrow-right"></button>
						</div>
					</div>
				</div>
			</div>
		</section>

		<section class="video-gallery gallery">
			<h2 class="secondary-title"><?php esc_html_e( 'Video', 'mst_harvesy' ); ?></h2>
			<div class="container-fluid">
				<div class="row">
					<div class="gallery__slider">

						<div class="gallery__slider-img-box">
							<a href="#" class="gallery__slider-img-link">
								<img src="images/1.jpg" alt="Виски" class="gallery__slider-image">
								<div class="gallery__slider-img-btn--hover">
									<button class="video-gallery__opening-button"></button>
								</div>
							</a>
						</div>

						<div class="gallery__slider-navigation">
							<button class="arrow gallery__slider-nav-arrow-left"></button>
							<button class="arrow gallery__slider-nav-arrow-right"></button>
						</div>
					</div>
				</div>
			</div>
		</section>

		<section class="about-us section-padding">
			<h2 class="secondary-title"><?php esc_html_e( 'About us', 'mst_harvesy' ); ?></h2>
			<div class="container-fluid">
				<div class="row">
					<div class="about-us__content-box box-padding">
						<div class="about-us__carousel-container">
							<div class="about-us__carousel-item">
								<img src="images/4.jpg" alt="photo" class="about-us__carousel-img">
							</div>

							<div class="about-us__carousel-item" style="display: none;">
								<img src="images/6.jpg" alt="photo" class="about-us__carousel-img">
							</div>
						</div>

						<div class="about-us__description">
							<h3 class="tertinary-title about-us__desc-title">Harvesy studio</h3>

							<div class="about-us__desc-text-box">
								<p class="about-us__desc-text">HARVESY – это команда, которая однажды отдалась своему желанию. Желанию сохранять воспоминания  в лучших цветах, подобранных в палитре аматорского искусства, что со временем перешло из желания в предназначение. </p>

								<p class="about-us__desc-text">За нашей спиной находится более двухсот проектов, которые связаны с клубными, отельными, пищевыми, индустриальными, IT, аграрными, развлекательными и другими сферами жизни. Мы – новое поколение, которое внедряет в свои проекты динамику, отдаляясь от статичной съемки.</p>

								<p class="about-us__desc-text">С нами вы сможете увеличить посещаемость, узнаваемость бренда, увеличить количество клиентов и продаж, оговорив всего лишь несколько тем, чтобы мы смогли понять вашу мысль, отредактировать сюжет и начать работать.</p>

								<p class="about-us__desc-text"> Вам нужно лишь понять, что с нами просто, качественно и динамично!</p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>

		<section class="contacts section-padding">
			<h2 class="secondary-title"><?php esc_html_e( 'Contacts', 'mst_harvesy' ) ?></h2>
			<div class="container-fluid">
				<div class="row">
					<div class="contacts__content-box box-padding">
						<div class="contacts__info-box">
							<p class="contacts__info-text">If you have any photo project in mind, please feel free to contact me.</p>

							<ul class="contacts__menu">
								<li class="contacts__list-item">
Instagram:
									<a href="#" class="contacts__link">www.instagram.com/harvesystudio</a>
								</li>

								<li class="contacts__list-item">
Facebook:
									<a href="#" class="contacts__link">www.facebook.com/harvesystudio</a>
								</li>

								<li class="contacts__list-item">
Email:
									<a href="#" class="contacts__link">harvesystudio@gmail.com</a>
								</li>

								<li class="contacts__list-item">
Phone:
									<a href="#" class="contacts__link">+380671122333</a>
								</li>
							</ul>

							<button class="contacts__callback-btn button">Call me</button>
						</div>

						<div class="contacts__instagram-photos">
							<a href="#" class="contacts__instagram-photo-box">
								<img src="images/6.jpg" alt="insta-photo" class="contacts__instagram-photo">
							</a>

							<a href="#" class="contacts__instagram-photo-box">
								<img src="images/6.jpg" alt="insta-photo" class="contacts__instagram-photo">
							</a>

							<a href="#" class="contacts__instagram-photo-box">
								<img src="images/6.jpg" alt="insta-photo" class="contacts__instagram-photo">
							</a>

							<a href="#" class="contacts__instagram-photo-box">
								<img src="images/6.jpg" alt="insta-photo" class="contacts__instagram-photo">
							</a>

							<a href="#" class="contacts__instagram-photo-box">
								<img src="images/6.jpg" alt="insta-photo" class="contacts__instagram-photo">
							</a>

							<a href="#" class="contacts__instagram-photo-box">
								<img src="images/6.jpg" alt="insta-photo" class="contacts__instagram-photo">
							</a>

							<a href="#" class="contacts__instagram-photo-box">
								<img src="images/6.jpg" alt="insta-photo" class="contacts__instagram-photo">
							</a>

							<a href="#" class="contacts__instagram-photo-box">
								<img src="images/6.jpg" alt="insta-photo" class="contacts__instagram-photo">
							</a>

							<a href="#" class="contacts__instagram-photo-box">
								<img src="images/6.jpg" alt="insta-photo" class="contacts__instagram-photo">
							</a>
						</div>
					</div>
				</div>
			</div>
		</section>
	</main>

<?php

get_footer();