<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$images    = get_theme_file_uri( '/images' );
$home      = home_url( '/' );
$site_name = get_bloginfo( 'name' );
?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<?php if ( ! has_site_icon() ) : ?>
		<link rel="icon" href="<?php echo esc_url( $images . '/logo.svg' ); ?>" type="image/svg+xml">
	<?php endif; ?>
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<a class="skip-link" href="#main">К содержанию</a>

<header class="header" data-header>
	<div class="header__inner">
		<div class="header__top">
			<a class="logo" href="<?php echo esc_url( $home ); ?>">
				<img class="logo__img" src="<?php echo esc_url( $images . '/logo.svg' ); ?>" width="168" height="36" alt="<?php echo esc_attr( $site_name ); ?>">
			</a>

			<div class="header__contacts">
				<div class="header__socials">
					<a class="social" href="https://wa.me/74958590051" target="_blank" rel="noopener noreferrer">
						<img src="<?php echo esc_url( $images . '/watsup.svg' ); ?>" width="24" height="24" alt="WhatsApp">
					</a>
					<a class="social" href="https://t.me/migrapro" target="_blank" rel="noopener noreferrer">
						<img src="<?php echo esc_url( $images . '/tg.svg' ); ?>" width="24" height="24" alt="Telegram">
					</a>
				</div>
				<a class="header__phone" href="tel:+74958590051">
					<span class="header__phone-num">+7 (495) 859-00-51</span>
					<span class="header__hours">Пн-Пт: 09:00–18:00</span>
				</a>
				<button class="btn btn--red" type="button" data-open-modal>Бесплатная консультация</button>
			</div>

			<div class="header__actions">
				<a class="header__call" href="tel:+74958590051" aria-label="Позвонить">
					<svg viewBox="0 0 24 24" width="18" height="18" aria-hidden="true">
						<path fill="currentColor" d="M6.6 10.8c1.4 2.8 3.8 5.1 6.6 6.6l2.2-2.2c.3-.3.7-.4 1.1-.2 1.2.4 2.5.6 3.8.6.6 0 1 .4 1 1V20c0 .6-.4 1-1 1C10.6 21 3 13.4 3 4c0-.6.4-1 1-1h3.5c.6 0 1 .4 1 1 0 1.3.2 2.6.6 3.8.1.4 0 .8-.3 1.1z"/>
					</svg>
				</a>
				<button class="burger" id="burger-btn" type="button" data-burger aria-expanded="false" aria-controls="mobile-menu" aria-label="Открыть меню">
					<span aria-hidden="true"></span>
					<span aria-hidden="true"></span>
					<span aria-hidden="true"></span>
				</button>
			</div>
		</div>

		<div class="header__bottom" id="mobile-menu" data-mobile-menu>
			<nav class="nav" id="header-nav" aria-label="Главное меню">
				<a class="nav__link" href="#paths">Услуги</a>
				<a class="nav__link" href="#employers">Работодателям</a>
				<a class="nav__link" href="#about">О нас</a>
				<a class="nav__link" href="#about">База знаний</a>
				<a class="nav__link" href="#about">Отзывы</a>
				<a class="nav__link" href="#about">Контакты</a>
			</nav>

			<div class="header__rating">
				<svg class="stars" width="84" height="13" viewBox="0 0 84 13" aria-hidden="true">
					<path d="M6.5 0 8.1 4.5H13L9.3 7.3l1.4 4.5L6.5 9.1 2.3 11.8l1.4-4.5L0 4.5h4.9z"/>
					<path d="M23.3 0 24.9 4.5h4.9l-3.7 2.8 1.4 4.5-4.2-2.7-4.2 2.7 1.4-4.5-3.7-2.8h4.9z"/>
					<path d="M40.1 0 41.7 4.5h4.9l-3.7 2.8 1.4 4.5-4.2-2.7-4.2 2.7 1.4-4.5-3.7-2.8h4.9z"/>
					<path d="M56.9 0 58.5 4.5h4.9l-3.7 2.8 1.4 4.5-4.2-2.7-4.2 2.7 1.4-4.5-3.7-2.8h4.9z"/>
					<path d="M73.7 0 75.3 4.5h4.9l-3.7 2.8 1.4 4.5-4.2-2.7-4.2 2.7 1.4-4.5-3.7-2.8h4.9z"/>
				</svg>
				<span class="header__rating-text"><span>4,8</span> на Яндекс.Картах и 2ГИС</span>
			</div>

			<div class="header__mobile-extra">
				<a class="header__phone" href="tel:+74958590051">
					<span class="header__phone-num">+7 (495) 859-00-51</span>
					<span class="header__hours">Пн-Пт: 09:00–18:00</span>
				</a>
				<div class="header__socials">
					<a class="social" href="https://wa.me/74958590051" target="_blank" rel="noopener noreferrer">
						<img src="<?php echo esc_url( $images . '/watsup.svg' ); ?>" width="24" height="24" alt=""> WhatsApp
					</a>
					<a class="social" href="https://t.me/migrapro" target="_blank" rel="noopener noreferrer">
						<img src="<?php echo esc_url( $images . '/tg.svg' ); ?>" width="24" height="24" alt=""> Telegram
					</a>
				</div>
				<button class="btn btn--red btn--block" type="button" data-open-modal>Бесплатная консультация</button>
			</div>
		</div>
	</div>
</header>
