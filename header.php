<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$images    = get_theme_file_uri( '/images' );
$home      = home_url( '/' );
$site_name = get_bloginfo( 'name' );
$acf_id    = get_option( 'page_on_front' ) ? (int) get_option( 'page_on_front' ) : get_queried_object_id();

$logo         = function_exists( 'get_field' ) ? get_field( 'logo', $acf_id ) : '';
$logo         = $logo ? $logo : $images . '/logo.svg';
$whatsapp_url = ( function_exists( 'get_field' ) ? get_field( 'whatsapp_url', $acf_id ) : '' ) ?: 'https://wa.me/74958590051';
$telegram_url = ( function_exists( 'get_field' ) ? get_field( 'telegram_url', $acf_id ) : '' ) ?: 'https://t.me/migrapro';
$phone        = ( function_exists( 'get_field' ) ? get_field( 'phone', $acf_id ) : '' ) ?: '+7 (495) 859-00-51';
$phone_link   = ( function_exists( 'get_field' ) ? get_field( 'phone_link', $acf_id ) : '' ) ?: 'tel:+74958590051';
$hours        = ( function_exists( 'get_field' ) ? get_field( 'hours', $acf_id ) : '' ) ?: 'Пн-Пт: 09:00–18:00';
$rating_value = ( function_exists( 'get_field' ) ? get_field( 'rating_value', $acf_id ) : '' ) ?: '4,8';
$rating_text  = ( function_exists( 'get_field' ) ? get_field( 'rating_text', $acf_id ) : '' ) ?: 'на Яндекс.Картах и 2ГИС';
$consult_btn  = ( function_exists( 'get_field' ) ? get_field( 'consult_btn', $acf_id ) : '' ) ?: 'Бесплатная консультация';
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
				<img class="logo__img" src="<?php echo esc_url( $logo ); ?>" width="168" height="36" alt="<?php echo esc_attr( $site_name ); ?>">
			</a>

			<div class="header__contacts">
				<div class="header__socials">
					<a class="social" href="<?php echo esc_url( $whatsapp_url ); ?>" target="_blank" rel="noopener noreferrer">
						<img src="<?php echo esc_url( $images . '/watsup.svg' ); ?>" width="24" height="24" alt="WhatsApp">
					</a>
					<a class="social" href="<?php echo esc_url( $telegram_url ); ?>" target="_blank" rel="noopener noreferrer">
						<img src="<?php echo esc_url( $images . '/tg.svg' ); ?>" width="24" height="24" alt="Telegram">
					</a>
				</div>
				<a class="header__phone" href="<?php echo esc_url( $phone_link ); ?>">
					<span class="header__phone-num"><?php echo esc_html( $phone ); ?></span>
					<span class="header__hours"><?php echo esc_html( $hours ); ?></span>
				</a>
				<button class="btn btn--red" type="button" data-open-modal><?php echo esc_html( $consult_btn ); ?></button>
			</div>

			<div class="header__actions">
				<a class="header__call" href="<?php echo esc_url( $phone_link ); ?>" aria-label="Позвонить">
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
				<div class="nav__item nav__item--drop" data-dropdown>
					<button class="nav__link nav__link--btn" type="button" data-dropdown-btn aria-expanded="false">
						Услуги
						<svg class="nav__chevron" viewBox="0 0 12 8" width="10" height="7" aria-hidden="true"><path d="M1 1.5 6 6.5 11 1.5" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"/></svg>
					</button>
					<div class="dropdown" data-dropdown-panel hidden>
						<ul class="dropdown__list">
							<li><a href="#paths"><strong>РВП</strong><span>Разрешение на временное проживание</span></a></li>
							<li><a href="#paths"><strong>ВНЖ</strong><span>Вид на жительство, бессрочный</span></a></li>
							<li><a href="#paths"><strong>Гражданство РФ</strong><span>Общий и упрощённый порядок</span></a></li>
							<li><a href="#paths"><strong>Репатриация</strong><span>Программа возвращения соотечественников</span></a></li>
							<li><a href="#paths"><strong>Запрет на въезд и депортация</strong><span>Обжалование и снятие ограничений</span></a></li>
							<li><a href="#consult-modal" data-open-modal><strong>Консультация миграционного юриста</strong><span>Разбор ситуации и план действий</span></a></li>
							<li class="dropdown-all-item">
								<a class="dropdown__all" href="#paths">
									Все услуги и цены
									<svg class="dropdown__arrow" viewBox="0 0 12 12" width="12" height="12" aria-hidden="true"><path d="M10.9 9.4V1H2.38M10.9 1 1 10.9" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/></svg>
								</a>
							</li>
						</ul>
					</div>
				</div>
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
				<span class="header__rating-text"><span><?php echo esc_html( $rating_value ); ?></span> <?php echo esc_html( $rating_text ); ?></span>
			</div>

			<div class="header__mobile-extra">
				<a class="header__phone" href="<?php echo esc_url( $phone_link ); ?>">
					<span class="header__phone-num"><?php echo esc_html( $phone ); ?></span>
					<span class="header__hours"><?php echo esc_html( $hours ); ?></span>
				</a>
				<div class="header__socials">
					<a class="social" href="<?php echo esc_url( $whatsapp_url ); ?>" target="_blank" rel="noopener noreferrer">
						<img src="<?php echo esc_url( $images . '/watsup.svg' ); ?>" width="24" height="24" alt=""> WhatsApp
					</a>
					<a class="social" href="<?php echo esc_url( $telegram_url ); ?>" target="_blank" rel="noopener noreferrer">
						<img src="<?php echo esc_url( $images . '/tg.svg' ); ?>" width="24" height="24" alt=""> Telegram
					</a>
				</div>
				<button class="btn btn--red btn--block" type="button" data-open-modal><?php echo esc_html( $consult_btn ); ?></button>
			</div>
		</div>
	</div>
</header>
