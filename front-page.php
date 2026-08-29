<?php

get_header();

$images = get_theme_file_uri( '/images' );
?>

<main id="main">
	<section class="hero">
		<div class="container hero__layout">
			<div class="hero__copy">
				<h1>Миграционные услуги<br>в Москве и Московской области</h1>
				<p>РВП, ВНЖ, гражданство РФ: собираем полный пакет документов и ведём дело до результата. Компаниям — легальное оформление иностранных сотрудников.</p>
				<a class="hero__path" href="#paths">Выберите свой путь.</a>
			</div>

			<div class="hero__stage">
				<div class="hero__visual" aria-hidden="true">
					<img src="<?php echo esc_url( $images . '/hero-img.jpg' ); ?>" width="1604" height="1068" alt="">
				</div>

				<div class="paths" id="paths">
					<article class="path-card">
						<p class="path-card__label">Иностранным гражданам</p>
						<h2>Оформляю статус себе или семье</h2>
						<p>РВП, ВНЖ, гражданство РФ. Проверим основание, соберём документы, подадим без ошибок. Не знаете, с чего начать — начните с консультации.</p>
						<div class="path-card__actions">
							<button class="btn btn--primary" type="button" data-open-modal data-topic="Иностранным гражданам">Бесплатная консультация</button>
							<button class="btn btn--ghost" type="button" data-open-services>Смотреть услуги и цены</button>
						</div>
					</article>

					<article class="path-card" id="employers">
						<p class="path-card__label">Работодателям</p>
						<h2>Оформляю иностранных сотрудников</h2>
						<p>Разрешения на работу, ВКС, кадровые уведомления в МВД. Более 10 лет в миграционном праве, работаем с компаниями Москвы и области.</p>
						<div class="path-card__actions">
							<button class="btn btn--primary" type="button" data-open-modal data-topic="Работодателям">
								Решение для работодателей
								<img class="btn__icon" src="<?php echo esc_url( $images . '/arrow.svg' ); ?>" width="12" height="12" alt="">
							</button>
						</div>
					</article>

					<aside class="office-badge">
						<p>Офисы в Подольске и Одинцово</p>
						<p>Работаем по Москве и Московской области</p>
					</aside>
				</div>
			</div>

			<ul class="stats" id="about">
				<li>
					<span class="stats__icon">
						<img src="<?php echo esc_url( $images . '/achive.svg' ); ?>" width="24" height="24" alt="">
					</span>
					<div>
						<strong>Более 10 лет</strong>
						<span>помогаем с миграционными документами</span>
					</div>
				</li>
				<li>
					<span class="stats__icon">
						<img src="<?php echo esc_url( $images . '/achive2.svg' ); ?>" width="24" height="24" alt="">
					</span>
					<div>
						<strong>6 000+</strong>
						<span>оформлений по РВП, ВНЖ и гражданству</span>
					</div>
				</li>
				<li>
					<span class="stats__icon">
						<img src="<?php echo esc_url( $images . '/achive3.svg' ); ?>" width="24" height="24" alt="">
					</span>
					<div>
						<strong>2 офиса</strong>
						<span>Подольск и Одинцово: приём рядом с домом, без поездки в центр</span>
					</div>
				</li>
				<li>
					<span class="stats__icon">
						<img src="<?php echo esc_url( $images . '/achive4.svg' ); ?>" width="24" height="24" alt="">
					</span>
					<div>
						<strong>4,8</strong>
						<span>рейтинг на Яндекс.Картах и 2ГИС</span>
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
		<h2 id="modal-title">Бесплатная консультация</h2>
		<p class="modal__lead">Оставьте контакты — перезвоним в рабочее время и разберём вашу ситуацию.</p>
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
