<?php session_start(); $isHome = false; $needsCoursesData = false; ?>
<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>КодаКидс — Курсы программирования для детей и подростков</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="style.css">
</head>
<body>
<?php include 'includes/header.php'; ?>

  <main>
    <section class="hero" style="background: linear-gradient(135deg, rgba(10,22,40,0.88) 0%, rgba(24,26,29,0.88) 100%), url('Foto/Gallery/new_05.jpg') center/cover no-repeat;">
      <div class="container hero-inner">
        <div class="hero-content">
          <h1>Летние каникулы для школьников</h1>
          <p style="font-size: 1.1rem; line-height: 1.7; margin-bottom: 16px; color: rgba(255,255,255,0.95);">
            Идеальное решение для работающих родителей, которые хотят сделать вклад в будущее своих детей!<br>
            <strong style="color: var(--accent);">Программирование + Творчество + Психология.</strong>
          </p>
          <p style="font-size: 1.05rem; line-height: 1.7; margin-bottom: 28px; color: rgba(255,255,255,0.9);">
            Живое общение и новые друзья!
          </p>
          <div class="hero-actions">
            <button class="btn btn-primary" data-scroll="#leadForm">ЗАПИСАТЬСЯ</button>
          </div>
        </div>
        <div class="camp-details">
          <div class="camp-detail-item">
            <div class="camp-detail-icon">
              <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <rect x="3" y="4" width="18" height="18" rx="2" stroke="currentColor" stroke-width="2"/>
                <path d="M16 2V6M8 2V6M3 10H21" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
              </svg>
            </div>
            <div>
              <div class="camp-detail-label">Даты</div>
              <div class="camp-detail-value">с 1 по 12 июня</div>
            </div>
          </div>
          <div class="camp-detail-item">
            <div class="camp-detail-icon">
              <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <circle cx="12" cy="12" r="9" stroke="currentColor" stroke-width="2"/>
                <path d="M12 7V12L15 15" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
              </svg>
            </div>
            <div>
              <div class="camp-detail-label">Режим</div>
              <div class="camp-detail-value">по 6 часов в день, с 9 до 15:00</div>
            </div>
          </div>
          <div class="camp-detail-item">
            <div class="camp-detail-icon">
              <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5c-1.38 0-2.5-1.12-2.5-2.5s1.12-2.5 2.5-2.5 2.5 1.12 2.5 2.5-1.12 2.5-2.5 2.5z" fill="currentColor"/>
              </svg>
            </div>
            <div>
              <div class="camp-detail-label">Город</div>
              <div class="camp-detail-value">Ангарск</div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </main>

  <section class="section section-light summer-program" id="program">
    <div class="container">
      <h2 class="section-title center">Уникальная программа специально для школьников до 13 лет, учитывая их уровень знаний и интересов</h2>
      <p class="summer-subtitle">Мы соединили в своей программе современные знания программирования, информационных технологий, творчество и психологию!</p>

      <div class="program-features">
        <article class="program-feature">
          <div class="feature-text">
            <h3>Создадим свою первую компьютерную игру</h3>
            <p>Дети познакомятся с программированием через специальную детскую среду, в которой им легко разобраться. Это будет невероятно увлекательно! Каждый в итоге создаст свою мини-игру</p>
          </div>
          <div class="feature-image">
            <img src="Foto/Summer/1.jpg" alt="Создание компьютерной игры">
          </div>
        </article>

        <article class="program-feature">
          <div class="feature-text">
            <h3>Творческий мастер-класс с художником</h3>
            <p>Мы пригласили педагога-художника с опытом 26 лет Саторник Татьяну, чтобы раскрыть творческую сторону наших детей.</p>
            <p>Мы НЕ будем что-то рисовать в классическом понимании. Даже если ребенок не умеет/не любит рисовать, здесь у него всё получится.</p>
          </div>
          <div class="feature-image">
            <img src="Foto/Summer/2.jpg" alt="Творческий мастер-класс">
          </div>
        </article>

        <article class="program-feature">
          <div class="feature-text">
            <h3>МК с детским психологом</h3>
            <p>Пройдём игровой мастер-класс с детским психологом, чтобы лучше понимать себя и свои эмоции.</p>
          </div>
          <div class="feature-image">
            <img src="Foto/Summer/3.jpg" alt="Мастер-класс с психологом">
          </div>
        </article>

        <article class="program-feature">
          <div class="feature-text">
            <h3>Игры, викторины, квесты</h3>
            <p>Дети будут участвовать в творческих заданиях, квестах, викторинах, настольных играх.</p>
            <p class="feature-highlight">10 ДНЕЙ, которые дадут ребёнку много живого общения, новые навыки и классный отдых!</p>
          </div>
          <div class="feature-image">
            <img src="Foto/Summer/4.jpg" alt="Игры и квесты">
          </div>
        </article>

        <article class="program-feature">
          <div class="feature-text">
            <h3>Как проходят занятия?</h3>
            <p>Дети проводят в студии по 6 часов — с 9 до 15:00.</p>
            <p>Во время занятий предусмотрены перерывы.</p>
          </div>
          <div class="feature-image">
            <img src="Foto/Summer/5.jpg" alt="Расписание занятий">
          </div>
        </article>

        <article class="program-feature">
          <div class="feature-text">
            <h3>Мы полностью берем на себя досуг детей вместо привычных школьных занятий</h3>
            <p>Детям не придётся скучать дома и они всё время будут под присмотром опытных педагогов.</p>
            <ul class="feature-list">
              <li>Они смогут познакомиться с другими детьми и провести время в живом общении</li>
              <li>Приобретут новые навыки и знания</li>
              <li>И весело проведут время!</li>
            </ul>
          </div>
          <div class="feature-image">
            <img src="Foto/Summer/6.jpg" alt="Досуг детей под присмотром">
          </div>
        </article>
      </div>
    </div>
  </section>

  <section class="section section-light gallery" id="summerGallery">
    <div class="container">
      <h2 class="section-title center">Как это было в прошлых сезонах? Мы провели уже 5!</h2>
      <div class="masonry-gallery" id="photoGallery">
        <div class="masonry-item"><img src="Foto/Summer/s1.jpg" alt="Летняя программа 1"></div>
        <div class="masonry-item"><img src="Foto/Summer/s2.jpg" alt="Летняя программа 2"></div>
        <div class="masonry-item"><img src="Foto/Summer/s3.jpg" alt="Летняя программа 3"></div>
        <div class="masonry-item"><img src="Foto/Summer/s4.jpg" alt="Летняя программа 4"></div>
        <div class="masonry-item"><img src="Foto/Summer/s5.jpg" alt="Летняя программа 5"></div>
        <div class="masonry-item"><img src="Foto/Summer/s6.jpg" alt="Летняя программа 6"></div>
        <div class="masonry-item"><img src="Foto/Summer/s7.jpg" alt="Летняя программа 7"></div>
        <div class="masonry-item"><img src="Foto/Summer/s8.jpg" alt="Летняя программа 8"></div>
        <div class="masonry-item"><img src="Foto/Summer/s9.jpg" alt="Летняя программа 9"></div>
        <div class="masonry-item"><img src="Foto/Summer/s10.jpg" alt="Летняя программа 10"></div>
        <div class="masonry-item"><img src="Foto/Summer/s11.jpg" alt="Летняя программа 11"></div>
        <div class="masonry-item"><img src="Foto/Summer/s12.jpg" alt="Летняя программа 12"></div>
        <div class="masonry-item"><img src="Foto/Summer/s13.jpg" alt="Летняя программа 13"></div>
        <div class="masonry-item"><img src="Foto/Summer/s14.jpg" alt="Летняя программа 14"></div>
        <div class="masonry-item"><img src="Foto/Summer/s15.jpg" alt="Летняя программа 15"></div>
        <div class="masonry-item"><img src="Foto/Summer/s16.jpg" alt="Летняя программа 16"></div>
        <div class="masonry-item"><img src="Foto/Summer/s17.jpg" alt="Летняя программа 17"></div>
        <div class="masonry-item"><img src="Foto/Summer/s18.jpg" alt="Летняя программа 18"></div>
        <div class="masonry-item"><img src="Foto/Summer/s19.jpg" alt="Летняя программа 19"></div>
        <div class="masonry-item"><img src="Foto/Summer/s20.jpg" alt="Летняя программа 20"></div>
        <div class="masonry-item"><img src="Foto/Summer/s21.jpg" alt="Летняя программа 21"></div>
        <div class="masonry-item"><img src="Foto/Summer/s22.jpg" alt="Летняя программа 22"></div>
        <div class="masonry-item"><img src="Foto/Summer/s23.jpg" alt="Летняя программа 23"></div>
        <div class="masonry-item"><img src="Foto/Summer/s24.jpg" alt="Летняя программа 24"></div>
        <div class="masonry-item"><img src="Foto/Summer/s25.jpg" alt="Летняя программа 25"></div>
        <div class="masonry-item"><img src="Foto/Summer/s26.jpg" alt="Летняя программа 26"></div>
        <div class="masonry-item"><img src="Foto/Summer/s27.jpg" alt="Летняя программа 27"></div>
        <div class="masonry-item"><img src="Foto/Summer/s28.jpg" alt="Летняя программа 28"></div>
        <div class="masonry-item"><img src="Foto/Summer/s29.jpg" alt="Летняя программа 29"></div>
        <div class="masonry-item"><img src="Foto/Summer/s30.jpg" alt="Летняя программа 30"></div>
        <div class="masonry-item"><img src="Foto/Summer/s31.jpg" alt="Летняя программа 31"></div>
        <div class="masonry-item"><img src="Foto/Summer/s32.jpg" alt="Летняя программа 32"></div>
        <div class="masonry-item"><img src="Foto/Summer/s33.jpg" alt="Летняя программа 33"></div>
        <div class="masonry-item"><img src="Foto/Summer/s34.jpg" alt="Летняя программа 34"></div>
        <div class="masonry-item"><img src="Foto/Summer/s35.jpg" alt="Летняя программа 35"></div>
        <div class="masonry-item"><img src="Foto/Summer/s36.jpg" alt="Летняя программа 36"></div>
      </div>
    </div>
  </section>

  <section class="section section-dark reviews" id="reviews">
    <div class="container">
      <h2 class="section-title center">Отзывы родителей</h2>
      <div class="reviews-slider">
        <button class="reviews-nav reviews-prev" id="reviewsPrev" aria-label="Назад">
          <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <path d="M15 18l-6-6 6-6"/>
          </svg>
        </button>
        <div class="reviews-viewport">
          <div class="reviews-track" id="reviewsTrack">
            <div class="review-slide"><img src="Foto/Summer/fb1.jpg" alt="Отзыв 1"></div>
            <div class="review-slide"><img src="Foto/Summer/fb2.jpg" alt="Отзыв 2"></div>
            <div class="review-slide"><img src="Foto/Summer/fb3.jpg" alt="Отзыв 3"></div>
            <div class="review-slide"><img src="Foto/Summer/fb4.jpg" alt="Отзыв 4"></div>
            <div class="review-slide"><img src="Foto/Summer/fb5.jpg" alt="Отзыв 5"></div>
            <div class="review-slide"><img src="Foto/Summer/fb6.jpg" alt="Отзыв 6"></div>
            <div class="review-slide"><img src="Foto/Summer/fb7.jpg" alt="Отзыв 7"></div>
            <div class="review-slide"><img src="Foto/Summer/fb8.jpg" alt="Отзыв 8"></div>
            <div class="review-slide"><img src="Foto/Summer/fb9.jpg" alt="Отзыв 9"></div>
            <div class="review-slide"><img src="Foto/Summer/fb10.jpg" alt="Отзыв 10"></div>
            <div class="review-slide"><img src="Foto/Summer/fb11.jpg" alt="Отзыв 11"></div>
          </div>
        </div>
        <button class="reviews-nav reviews-next" id="reviewsNext" aria-label="Вперёд">
          <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <path d="M9 18l6-6-6-6"/>
          </svg>
        </button>
      </div>
    </div>
  </section>

  <section class="section section-light faq" id="faq">
    <div class="container">
      <h2 class="section-title center">Часто задаваемые вопросы</h2>
      <div class="faq-list">
        <div class="faq-item">
          <button class="faq-question" aria-expanded="false">
            <span>Кто может принять участие?</span>
            <span class="faq-icon"></span>
          </button>
          <div class="faq-answer">
            <p>Наша программа для школьников до 13 лет, детям будет интересно общаться со сверстниками</p>
          </div>
        </div>
        <div class="faq-item">
          <button class="faq-question" aria-expanded="false">
            <span>Кто будет с моим ребенком?</span>
            <span class="faq-icon"></span>
          </button>
          <div class="faq-answer">
            <p>Комфортную обстановку для обучения и отдыха обеспечат преподаватели студии программирования КОДАкидс, которые каждый день занимаются с учениками и имеют большой опыт преподавания детям</p>
          </div>
        </div>
        <div class="faq-item">
          <button class="faq-question" aria-expanded="false">
            <span>Что нужно взять с собой?</span>
            <span class="faq-icon"></span>
          </button>
          <div class="faq-answer">
            <p>С собой взять сменную обувь. Быть в удобной одежде.</p>
          </div>
        </div>
        <div class="faq-item">
          <button class="faq-question" aria-expanded="false">
            <span>Не будет ли программа сложной? Если у нас нет опыта в программировании?</span>
            <span class="faq-icon"></span>
          </button>
          <div class="faq-answer">
            <p>Мы разработали программу, которая подойдет новичкам. Наши преподаватели всегда помогут детям, если что-то не понятно.</p>
          </div>
        </div>
        <div class="faq-item">
          <button class="faq-question" aria-expanded="false">
            <span>Будет ли интересно, если мы уже посещаем ваши курсы? Или были в прошлом году?</span>
            <span class="faq-icon"></span>
          </button>
          <div class="faq-answer">
            <p>Да! Программа занятий будет полезна и ребятам с опытом изучения программирования</p>
          </div>
        </div>
        <div class="faq-item">
          <button class="faq-question" aria-expanded="false">
            <span>Хватит ли моему ребенку внимания?</span>
            <span class="faq-icon"></span>
          </button>
          <div class="faq-answer">
            <p>Группы небольшие, поэтому каждому хватит внимания</p>
          </div>
        </div>
      </div>
    </div>
  </section>

<?php include 'includes/lead-form.php'; ?>

<?php include 'includes/map-section.php'; ?>

<?php include 'includes/footer.php'; ?>

<?php include 'includes/lightbox.php'; ?>

<?php include 'includes/cookie-banner.php'; ?>

<?php include 'includes/policy-modal.php'; ?>

<?php include 'includes/scroll-top.php'; ?>

<?php include 'includes/scripts.php'; ?>
</body>
</html>
