<?php

get_header();

$images = get_theme_file_uri( '/images' );

$hero_title     = ( function_exists( 'get_field' ) ? get_field( 'hero_title' ) : '' ) ?: 'Миграционные услуги<br>в Москве и Московской области';
$hero_text      = ( function_exists( 'get_field' ) ? get_field( 'hero_text' ) : '' ) ?: 'РВП, ВНЖ, гражданство РФ: собираем полный пакет документов и ведём дело до результата. Компаниям — легальное оформление иностранных сотрудников.';
$hero_link_text = ( function_exists( 'get_field' ) ? get_field( 'hero_link_text' ) : '' ) ?: 'Выберите свой путь.';
$hero_link_url  = ( function_exists( 'get_field' ) ? get_field( 'hero_link_url' ) : '' ) ?: '#paths';
$hero_image     = ( function_exists( 'get_field' ) ? get_field( 'hero_image' ) : '' ) ?: $images . '/hero-img.jpg';

$path1_label = ( function_exists( 'get_field' ) ? get_field( 'path1_label' ) : '' ) ?: 'Иностранным гражданам';
$path1_title = ( function_exists( 'get_field' ) ? get_field( 'path1_title' ) : '' ) ?: 'Оформляю статус себе или семье';
$path1_text  = ( function_exists( 'get_field' ) ? get_field( 'path1_text' ) : '' ) ?: 'РВП, ВНЖ, гражданство РФ. Проверим основание, соберём документы, подадим без ошибок. Не знаете, с чего начать — начните с консультации.';
$path1_btn1  = ( function_exists( 'get_field' ) ? get_field( 'path1_btn1' ) : '' ) ?: 'Бесплатная консультация';
$path1_btn2  = ( function_exists( 'get_field' ) ? get_field( 'path1_btn2' ) : '' ) ?: 'Смотреть услуги и цены';

$path2_label = ( function_exists( 'get_field' ) ? get_field( 'path2_label' ) : '' ) ?: 'Работодателям';
$path2_title = ( function_exists( 'get_field' ) ? get_field( 'path2_title' ) : '' ) ?: 'Оформляю иностранных сотрудников';
$path2_text  = ( function_exists( 'get_field' ) ? get_field( 'path2_text' ) : '' ) ?: 'Разрешения на работу, ВКС, кадровые уведомления в МВД. Более 10 лет в миграционном праве, работаем с компаниями Москвы и области.';
$path2_btn   = ( function_exists( 'get_field' ) ? get_field( 'path2_btn' ) : '' ) ?: 'Решение для работодателей';

$office_line1 = ( function_exists( 'get_field' ) ? get_field( 'office_line1' ) : '' ) ?: 'Офисы в Подольске и Одинцово';
$office_line2 = ( function_exists( 'get_field' ) ? get_field( 'office_line2' ) : '' ) ?: 'Работаем по Москве и Московской области';

$stat1_title = ( function_exists( 'get_field' ) ? get_field( 'stat1_title' ) : '' ) ?: 'Более 10 лет';
$stat1_text  = ( function_exists( 'get_field' ) ? get_field( 'stat1_text' ) : '' ) ?: 'помогаем с миграционными документами';
$stat2_title = ( function_exists( 'get_field' ) ? get_field( 'stat2_title' ) : '' ) ?: '6 000+';
$stat2_text  = ( function_exists( 'get_field' ) ? get_field( 'stat2_text' ) : '' ) ?: 'оформлений по РВП, ВНЖ и гражданству';
$stat3_title = ( function_exists( 'get_field' ) ? get_field( 'stat3_title' ) : '' ) ?: '2 офиса';
$stat3_text  = ( function_exists( 'get_field' ) ? get_field( 'stat3_text' ) : '' ) ?: 'Подольск и Одинцово: приём рядом с домом, без поездки в центр';
$stat4_title = ( function_exists( 'get_field' ) ? get_field( 'stat4_title' ) : '' ) ?: '4,8';
$stat4_text  = ( function_exists( 'get_field' ) ? get_field( 'stat4_text' ) : '' ) ?: 'рейтинг на Яндекс.Картах и 2ГИС';

$modal_title = ( function_exists( 'get_field' ) ? get_field( 'modal_title' ) : '' ) ?: 'Бесплатная консультация';
$modal_lead  = ( function_exists( 'get_field' ) ? get_field( 'modal_lead' ) : '' ) ?: 'Оставьте контакты — перезвоним в рабочее время и разберём вашу ситуацию.';
?>

<main id="main">
	<section class="hero">
		<div class="container hero__layout">
			<div class="hero__copy">
				<h1><?php echo wp_kses_post( $hero_title ); ?></h1>
				<p><?php echo esc_html( $hero_text ); ?></p>
				<a class="hero__path" href="<?php echo esc_url( $hero_link_url ); ?>"><?php echo esc_html( $hero_link_text ); ?></a>
			</div>

			<div class="hero__stage">
				<div class="hero__visual" aria-hidden="true">
					<img src="<?php echo esc_url( $hero_image ); ?>" width="1604" height="1068" alt="">
				</div>

				<div class="paths" id="paths">
					<article class="path-card">
						<p class="path-card__label"><?php echo esc_html( $path1_label ); ?></p>
						<h2><?php echo esc_html( $path1_title ); ?></h2>
						<p><?php echo esc_html( $path1_text ); ?></p>
						<div class="path-card__actions">
							<button class="btn btn--primary" type="button" data-open-modal data-topic="<?php echo esc_attr( $path1_label ); ?>"><?php echo esc_html( $path1_btn1 ); ?></button>
							<button class="btn btn--ghost" type="button" data-open-services><?php echo esc_html( $path1_btn2 ); ?></button>
						</div>
					</article>

					<article class="path-card" id="employers">
						<p class="path-card__label"><?php echo esc_html( $path2_label ); ?></p>
						<h2><?php echo esc_html( $path2_title ); ?></h2>
						<p><?php echo esc_html( $path2_text ); ?></p>
						<div class="path-card__actions">
							<button class="btn btn--primary" type="button" data-open-modal data-topic="<?php echo esc_attr( $path2_label ); ?>">
								<?php echo esc_html( $path2_btn ); ?>
								<img class="btn__icon" src="<?php echo esc_url( $images . '/arrow.svg' ); ?>" width="12" height="12" alt="">
							</button>
						</div>
					</article>

					<aside class="office-badge">
						<p><?php echo esc_html( $office_line1 ); ?></p>
						<p><?php echo esc_html( $office_line2 ); ?></p>
					</aside>
				</div>
			</div>

			<ul class="stats" id="about">
				<li>
					<span class="stats__icon">
						<img src="<?php echo esc_url( $images . '/achive.svg' ); ?>" width="24" height="24" alt="">
					</span>
					<div>
						<strong><?php echo esc_html( $stat1_title ); ?></strong>
						<span><?php echo esc_html( $stat1_text ); ?></span>
					</div>
				</li>
				<li>
					<span class="stats__icon">
						<img src="<?php echo esc_url( $images . '/achive2.svg' ); ?>" width="24" height="24" alt="">
					</span>
					<div>
						<strong><?php echo esc_html( $stat2_title ); ?></strong>
						<span><?php echo esc_html( $stat2_text ); ?></span>
					</div>
				</li>
				<li>
					<span class="stats__icon">
						<img src="<?php echo esc_url( $images . '/achive3.svg' ); ?>" width="24" height="24" alt="">
					</span>
					<div>
						<strong><?php echo esc_html( $stat3_title ); ?></strong>
						<span><?php echo esc_html( $stat3_text ); ?></span>
					</div>
				</li>
				<li>
					<span class="stats__icon">
						<img src="<?php echo esc_url( $images . '/achive4.svg' ); ?>" width="24" height="24" alt="">
					</span>
					<div>
						<strong><?php echo esc_html( $stat4_title ); ?></strong>
						<span><?php echo esc_html( $stat4_text ); ?></span>
					</div>
				</li>
			</ul>
		</div>
	</section>
</main>

<div class="modal" id="consult-modal" hidden>
	<div class="modal__backdrop" data-close-modal></div>
	<div class="modal__dialog" role="dialog" aria-modal="true" aria-labelledby="modal-title" tabindex="-1">
		<button class="modal__close" type="button" data-close-modal aria-label="Закрыть">×</button>
		<h2 id="modal-title"><?php echo esc_html( $modal_title ); ?></h2>
		<p class="modal__lead"><?php echo esc_html( $modal_lead ); ?></p>
		<form class="form" data-consult-form novalidate>
			<input type="hidden" name="topic" value="">
			<label>Имя<input type="text" name="name" autocomplete="name" required placeholder="Как к вам обращаться"></label>
			<label>Телефон<input type="tel" name="phone" autocomplete="tel" required inputmode="tel" placeholder="+7 (___) ___-__-__"></label>
			<label>Комментарий<textarea name="comment" rows="3" placeholder="Страна гражданства, какой статус нужен"></textarea></label>
			<label class="form__check">
				<input type="checkbox" name="agree" required>
				<span>Согласен на обработку персональных данных</span>
			</label>
			<p class="form__error" data-form-error hidden></p>
			<button class="btn btn--primary btn--block" type="submit">Отправить заявку</button>
		</form>
		<p class="form__success" data-form-success hidden>Заявка отправлена. Мы свяжемся с вами в ближайшее рабочее время.</p>
	</div>
</div>

<?php
get_footer();
