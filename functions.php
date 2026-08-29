<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

require_once get_template_directory() . '/inc/class-header-nav-walker.php';

function migrapro_static_setup() {
	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );

	register_nav_menus(
		array(
			'primary_header_menu' => 'Главное меню (Шапка)',
		)
	);

	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);
}
add_action( 'after_setup_theme', 'migrapro_static_setup' );

function migrapro_static_assets() {
	$css_path = get_theme_file_path( '/css/style.css' );
	$js_path  = get_theme_file_path( '/js/main.js' );

	wp_enqueue_style(
		'migrapro-static-fonts',
		'https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap',
		array(),
		null
	);

	wp_enqueue_style(
		'migrapro-static-main',
		get_theme_file_uri( '/css/style.css' ),
		array( 'migrapro-static-fonts' ),
		file_exists( $css_path ) ? (string) filemtime( $css_path ) : '1.0.0'
	);

	wp_enqueue_script(
		'migrapro-static-main',
		get_theme_file_uri( '/js/main.js' ),
		array(),
		file_exists( $js_path ) ? (string) filemtime( $js_path ) : '1.0.0',
		true
	);
}
add_action( 'wp_enqueue_scripts', 'migrapro_static_assets' );

function migrapro_static_nav_fallback() {
	?>
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
	<?php
}
