<?php
/**
 * The front page template file
 *
 * If the user has selected a static page for their homepage, this is what will
 * appear.
 * Learn more: https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */

get_header(); ?>

    <!-- Featured Tours Carousel -->
    <div id="carousel-header-cover" class="carousel slide" data-ride="carousel">
      <ol class="carousel-indicators">
		
		<?php

		// TODO Mocked function
		function get_featured_posts() {
			return $posts = array(
					    0 => array(
					    	'id' => '10',
					    	'url' => 'everest',
					    	'img' => '1.jpg',
					    	'name' => 'Побачити Еверест',
					    	'countries' => ['Непал'],
					    	'date' => '03 квітня - 25 квітня 2018',
					    	'days' => '10 днів',
					    	'price' => '885$'
					    	),
					    1 => array(
					    	'id' => '12',
					    	'url' => 'montblanc',
					    	'img' => '2.jpg',
					    	'name' => 'Тур навколо Монблану',
					    	'countries' => ['Швейцарія', 'Франція', 'Італія'],
					    	'date' => '03 квітня - 25 квітня 2018',
					    	'days' => '10 днів',
					    	'price' => '790€'
					    	)
					);
		}

		function get_tours() {
			$tours = 
				array(
					0 => array()
				);
			return $tours;
		}

		function get_reviewers() {
			$reviewers = 
				array(
					0 => array()
				);
			return $reviewers;
		}

		function get_guides() {
			$guides = 
				array(
					0 => array()
				);
			return  $guides;
		}

		$featured_posts = get_featured_posts();
		foreach ($featured_posts as $i=>$featured_post) {
		?>
        <li data-target="#carousel-header-cover" data-slide-to="<?= $i ?>" class="<?= ($i == 0) ? "active" : "" ?>"></li>
		<?php } ?>
      </ol>
      <div class="carousel-inner">
		<?php
		foreach ($featured_posts as $i=>$post) {
		?>

        <div class="carousel-item <?= ($i == 0) ? "active" : "" ?>">
          <img class="d-block w-100" src="<?= get_theme_file_uri('assets/images/') . $post['img'] ?>" alt="First slide">
          <div class="carousel-caption d-none d-block">
          	<!-- TODO: Add days wording -->
            <p class="tour-date font-weight-bold m-2"><?= $post['date'] ?>(<?= $post['days'] ?>)</p>
            <p class="tour-countries mb-5"><?= join(', ', $post['countries']) ?></p>
            <h3 class="tour-name mb-4"><a href="#"><?= $post['name'] ?></a></h3>
            <p class="tour-price font-weight-bold mb-4"><?= $post['price'] ?></p>
            <button type="button" class="btn btn-outline-vyo-lt mb-4">ВЙО!</button>
          </div>
        </div>

		<?php
		}
		?>
      </div>
      <a class="carousel-control-prev" href="#carousel-header-cover" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Попередній</span>
      </a>
      <a class="carousel-control-next" href="#carousel-header-cover" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Наступний</span>
      </a>
    </div>

        <!-- About Us block -->

    <div class="container">
        <div class="row mt-4 mb-65 justify-content-center">
            <div class="col-12 text-center mb-475">
                <h1>Про нас</h1>
            </div>
            <div class="w-100"></div>
            <div class="col-8">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Numquam sint, eius aliquam sequi eos fugiat molestias, in temporibus illum aliquid reiciendis iste obcaecati saepe et eveniet, alias ipsam, culpa beatae! Lorem ipsum dolor sit amet, consectetur adipisicing elit. Facilis praesentium neque iure impedit sequi, suscipit vero quis unde cum? Beatae soluta dolorem laborum quidem maxime repellendus dolor minus fugit in.</div>
        </div>

        <!-- TODO: VIDEO about US. -->
        <!-- 
        <div class="row mb-65 justify-content-center">
            <div class="col-12 text-center">
                <iframe class="w-75" src="https://www.youtube.com/embed/mg67iIFivDo" frameborder="0" allowfullscreen="allowfullscreen" data-link="https://www.youtube.com/watch?v=mg67iIFivDo"></iframe>
            </div>
        </div> -->

        <!-- Guides block -->

        <div class="row mb-5 justify-content-center guides">
            <div class="col-12 text-center mb-475">
                <h1>Наші Гіди</h1>
            </div>
            <div class="w-100"></div>
            <div class="col-md-4 col-12 mb-3 text-center">
                <div class="guide">
                    <img class="w-75 rounded-circle mb-35" src="<?= get_theme_file_uri('assets/images/guides/') ?>achystyakov.jpg" alt="">
                    <div class="guide-name font-weight-bold text-center mb-1">Арсен Чистяков</div>
                    <div class="guide-desc mb-4">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consectetur dicta tempore cupiditate, aliquid omnis.</div>
                    <div class="guide-socials"><a href="https://fb.com/achystyakov">Facebook</a><a href="https://instagram.com/achystyakov">Instagram</a></div>
                </div>
            </div>
            <div class="col-md-4 col-12 mb-3 text-center">
                <div class="guide">
                    <img class="w-75 rounded-circle mb-35" src="<?= get_theme_file_uri('assets/images/guides/') ?>ysira.jpg" alt="">
                    <div class="guide-name font-weight-bold text-center mb-1">Юля Сіра</div>
                    <div class="guide-desc mb-4">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sint delectus sapiente maxime nostrum atque modi expedita.</div>
                    <div class="guide-socials"><a href="https://fb.com/yuliya.sira">Facebook</a><a href="https://www.instagram.com/sirenjka/">Instagram</a></div>
                </div>
            </div>
            <div class="col-md-4 col-12 mb-3 text-center">
                <div class="guide">
                    <img class="w-75 rounded-circle mb-35" src="<?= get_theme_file_uri('assets/images/guides/') ?>mbalandukh.jpg" alt="">
                    <div class="guide-name font-weight-bold text-center mb-1">Максим Баландюх</div>
                    <div class="guide-desc mb-4">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Enim fuga aperiam totam praesentium numquam incidunt provident.</div>
                    <div class="guide-socials"><a href="https://fb.com/maxymbalanduh">Facebook</a><a href="https://www.instagram.com/balanduh/">Instagram</a></div>
                </div>
            </div>
        </div>

        <!-- Tours block -->

        <div class="row mb-5 no-gutters tours">
            <div class="col-12 text-center"><h1>Найближчі Подорожі</h1></div>

            <div class="w-100"></div>

            <div class="col-12 col-sm-12 col-md-6 col-lg-4 tour-container">
                <div class="tour">
                    <div><img class="w-100" src="<?= get_theme_file_uri('assets/images/tours/') ?>slovenia.jpg" alt=""></div>
                    <div class="tour-detail">
                        <div class="tour-date"><span class="font-weight-bold">29 грудня 2017 - 04 січня 2018</span> (10 днів)</div>
                        <div class="tour-countries mb-35">Словенія, Угорщина</div>
                        <h3 class="tour-name font-weight-bold mb-475">Новий рік в Альпах</h3>
                        <button class="btn btn-outline-vyo-dr align-bottom">ВЙО!</button>
                    </div>
                </div>        
            </div>

           <div class="col-12 col-sm-12 col-md-6 col-lg-4 tour-container">
                <div class="tour">
                    <div><img class="w-100" src="<?= get_theme_file_uri('assets/images/tours/') ?>lofoten.jpg" alt=""></div>
                    <div class="tour-detail">
                        <div class="tour-date"><span class="font-weight-bold">03 березня - 10 березня 2018</span> (7 днів)</div>
                        <div class="tour-countries mb-35">Норвегія</div>
                        <h3 class="tour-name font-weight-bold mb-475">Лофотени: полювання на полярне сяйво</h3>
                        <button class="btn btn-outline-vyo-dr align-bottom">ВЙО!</button>
                    </div>
                </div>        
            </div>

            <div class="col-12 col-sm-12 col-md-6 col-lg-4 tour-container">
                <div class="tour">
                    <div><img class="w-100" src="<?= get_theme_file_uri('assets/images/tours/') ?>ebc.jpg" alt=""></div>
                    <div class="tour-detail">
                        <div class="tour-date"><span class="font-weight-bold">11 березня - 04 квітня 2018</span> (24 дня)</div>
                        <div class="tour-countries mb-35">Непал</div>
                        <h3 class="tour-name font-weight-bold mb-475">Побачити Еверест</h3>
                        <button class="btn btn-outline-vyo-dr align-self-end">ВЙО!</button>
                    </div>
                </div>        
            </div>

            <div class="col-12 col-sm-12 col-md-6 col-lg-4 tour-container">
                <div class="tour">
                    <div><img class="w-100" src="<?= get_theme_file_uri('assets/images/tours/') ?>china.jpg" alt=""></div>
                    <div class="tour-detail">
                        <div class="tour-date"><span class="font-weight-bold">28 квітя - 13 травня 2018</span> (15 днів)</div>
                        <div class="tour-countries mb-35">Китай</div>
                        <h3 class="tour-name font-weight-bold mb-475">Від Гонконгу до Пекіну</h3>
                        <button class="btn btn-outline-vyo-dr align-self-end">ВЙО!</button>
                    </div>
                </div>        
            </div>

            <div class="col-12 col-sm-12 col-md-6 col-lg-4 tour-container">
                <div class="tour">
                    <div><img class="w-100" src="<?= get_theme_file_uri('assets/images/tours/') ?>tmb-refugio.jpg" alt=""></div>
                    <div class="tour-detail">
                        <div class="tour-date"><span class="font-weight-bold">24 червня - 30 червня 2018</span> (7 днів)</div>
                        <div class="tour-countries mb-35">Франція, Італія, Швейцарія</div>
                        <h3 class="tour-name font-weight-bold mb-475">Навколо Монблану в готелях</h3>
                        <button class="btn btn-outline-vyo-dr align-self-end">ВЙО!</button>
                    </div>
                </div>        
            </div>

            <div class="col-12 col-sm-12 col-md-6 col-lg-4 tour-container">
                <div class="tour">
                    <div><img class="w-100" src="<?= get_theme_file_uri('assets/images/tours/') ?>tmb-camping.jpg" alt=""></div>
                    <div class="tour-detail">
                        <div class="tour-date"><span class="font-weight-bold">01 липня - 08 липня 2018</span> (7 днів)</div>
                        <div class="tour-countries mb-35">Франція, Італія, Швейцарія</div>
                        <h3 class="tour-name font-weight-bold mb-475">Навколо Монблану в кемпінгах</h3>
                        <button class="btn btn-outline-vyo-dr align-self-end">ВЙО!</button>
                    </div>
                </div>        
            </div>
        </div>

        <div class="row justify-content-center mb-65">
            <div class="col-8 text-center"><a href="#" class="btn btn-vyo-black text-uppercase">Усі подорожі</a></div>
        </div>
    </div>



    <!-- Carousel Reviewer block -->

    <div id="carousel-review" class="carousel slide" data-ride="carousel">
      <ol class="carousel-indicators">
        <li data-target="#carousel-review" data-slide-to="0" class="active"></li>
         <li data-target="#carousel-review" data-slide-to="1"></li>
      </ol>
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img class="d-block w-100" src="assets/img/static/empty.png" alt="First slide">
          <div class="carousel-caption d-none d-block">
            <div class="review-img mb-4">
                <img class="d-block rounded-circle" src="<?= get_theme_file_uri('assets/images/reviewers/') ?>nchystiakova.jpg" alt="First slide">
            </div>
            <div class="reviewer font-weight-bold">Наталя Чистякова</div>
            <div class="mb-5">Організатор Lviv Travel Club</div>
            <p class="font-italic">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Labore necessitatibus sequi soluta quibusdam, amet asperiores qui unde pisicing elit. Culpa itaque aliquid facilis ullam aspernatur magnam atque ipsa ut perspiciatis, voluptatem numquam maiores reiciendis modi. Maxime fugiat beatae ea laboriosam sunt.</p>
          </div>
        </div>

        <div class="carousel-item">
          <img class="d-block w-100" src="assets/img/static/empty.png" alt="First slide">
          <div class="carousel-caption d-none d-block">
            <div class="review-img mb-4">
                <img class="d-block rounded-circle" src="<?= get_theme_file_uri('assets/images/reviewers/') ?>mstriltsiv.jpg" alt="First slide">
            </div>
            <div class="reviewer font-weight-bold">Маріан Стрільців</div>
            <div class="mb-5">Фотограф, Турбат</div>
            <p class="font-italic">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Labore necessitatibus sequi soluta quibusdam, amet asperiores qui unde maiores minus nobis ipsam accusantium numquam doloremque, molestiae reprehenderit natus nihil ut? Quis. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Alias eligendi magni maxime, odio dolor obcaecati repellat aperiam ducimus praesentium. Veniam, quibusdam nihil molestias quae porro voluptate repudiandae sed sit cupiditate! Lorem ipsum dolor sit amet, consectetur adipisicing elit. Culpa itaque aliquid facilis ullam aspernatur magnam atque ipsa ut perspiciatis, voluptatem numquam maiores reiciendis modi. Maxime fugiat beatae ea laboriosam sunt.</p>
          </div>
        </div>
      </div>
      <a class="carousel-control-prev" href="#carousel-review" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Попередній</span>
      </a>
      <a class="carousel-control-next" href="#carousel-review" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Наступний</span>
      </a>
    </div>

<?php get_footer();
