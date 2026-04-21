<?php $isHome = true; $needsCoursesData = true; ?>
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

  <section class="hero" id="hero">
    <div class="container hero-inner">
      <div class="hero-content">
        <h1>Профессиональные курсы по программированию, созданию игр, веб-разработке, нейросетям, психологии для детей и подростков <span class="accent">7-16 лет</span> в г. Ангарске</h1>
        <ul class="hero-features">
          <li><span class="check">✓</span> 80% практики</li>
          <li><span class="check">✓</span> Опытные преподаватели</li>
          <li><span class="check">✓</span> Лицензия на образовательную деятельность</li>
        </ul>
        <div class="hero-actions">
          <button class="btn btn-primary" data-scroll="#leadForm">Записаться на пробный урок</button>
          <p class="hero-note">Бесплатный пробный урок или индивидуальная консультация</p>
        </div>
      </div>
      <div class="hero-visual">
        <img src="Foto/General/Screth.jfif" alt="Дети на занятии" class="section-image section-image-lg">
      </div>
    </div>
    <div class="hero-cards">
      <div class="container">
        <div class="hero-cards-grid">
          <article class="advantage-card card">
            <div class="adv-icon">
              <svg viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                <circle cx="24" cy="24" r="18" stroke="#0d8bf2" stroke-width="2" class="icon-circle"/>
                <circle cx="24" cy="24" r="12" stroke="#0d8bf2" stroke-width="2" class="icon-circle-inner"/>
                <circle cx="24" cy="24" r="4" fill="#0d8bf2" class="icon-center"/>
                <path d="M24 6V12M24 36V42M6 24H12M36 24H42" stroke="#0d8bf2" stroke-width="2" stroke-linecap="round" class="icon-cross"/>
              </svg>
            </div>
            <h3>Бесплатный пробный урок</h3>
            <p>Или индивидуальная консультация (в зависимости от курса) — чтобы выбрать подходящее обучение для ребёнка</p>
          </article>
          <article class="advantage-card card">
            <div class="adv-icon">
              <svg viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                <rect x="6" y="10" width="36" height="24" rx="4" stroke="#0d8bf2" stroke-width="2" class="icon-chat"/>
                <path d="M18 34L12 40V34H18Z" fill="#0d8bf2" class="icon-tail"/>
                <line x1="14" y1="20" x2="34" y2="20" stroke="#0d8bf2" stroke-width="2" stroke-linecap="round" class="icon-line"/>
                <line x1="14" y1="26" x2="28" y2="26" stroke="#0d8bf2" stroke-width="2" stroke-linecap="round" class="icon-line"/>
                <circle cx="36" cy="36" r="8" fill="#0d8bf2" class="icon-badge"/>
                <path d="M33 36L35 38L39 34" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon-check"/>
              </svg>
            </div>
            <h3>Реальный прогресс ребенка</h3>
            <p>Каждый наш курс — это 80% практики. Дети получают практические навыки, а не теорию</p>
          </article>
          <article class="advantage-card card">
            <div class="adv-icon">
              <svg viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M24 8L30 20H18L24 8Z" fill="#0d8bf2" class="icon-rocket-top"/>
                <rect x="18" y="20" width="12" height="16" rx="2" fill="#0d8bf2" fill-opacity="0.3" stroke="#0d8bf2" stroke-width="2" class="icon-rocket-body"/>
                <path d="M18 36L14 42H20L18 36Z" fill="#0d8bf2" class="icon-fin-left"/>
                <path d="M30 36L34 42H28L30 36Z" fill="#0d8bf2" class="icon-fin-right"/>
                <circle cx="24" cy="28" r="3" fill="#0d8bf2" class="icon-window"/>
                <path d="M20 42C20 40 22 38 24 38C26 38 28 40 28 42" stroke="#0d8bf2" stroke-width="2" stroke-linecap="round" class="icon-flame"/>
                <path d="M22 44C22 42.5 23 41.5 24 41.5C25 41.5 26 42.5 26 44" stroke="#0d8bf2" stroke-width="1.5" stroke-linecap="round" class="icon-flame-inner"/>
              </svg>
            </div>
            <h3>Обратная связь родителям</h3>
            <p>Мы всегда на связи с родителями и даем регулярные отчеты о пройденных модулях и успехах детей</p>
          </article>
        </div>
      </div>
    </div>
    <div class="hero-dots" aria-hidden="true"></div>
  </section>

  <section class="section section-light advantages" id="advantages">
    <div class="container">
      <h2 class="section-title">Для кого наши курсы?</h2>
      <div class="for-whom-inner">
        <div class="for-whom-list">
          <article class="for-whom-item card">
            <div class="adv-icon">
              <svg viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                <rect x="6" y="8" width="36" height="26" rx="3" stroke="#0d8bf2" stroke-width="2"/>
                <path d="M14 20L18 24L14 28" stroke="#0d8bf2" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                <path d="M22 28H30" stroke="#0d8bf2" stroke-width="2" stroke-linecap="round"/>
                <line x1="12" y1="38" x2="36" y2="38" stroke="#0d8bf2" stroke-width="2" stroke-linecap="round"/>
              </svg>
            </div>
            <div class="for-whom-text">
              <h3>Превратим потребителя технологий в их создателя</h3>
              <p>Мы научим его создавать технологии, а не просто пользоваться ими. Из потребителя — в создателя.</p>
            </div>
          </article>
          <article class="for-whom-item card">
            <div class="adv-icon">
              <svg viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                <circle cx="24" cy="14" r="6" stroke="#0d8bf2" stroke-width="2"/>
                <path d="M12 38C12 31.3726 17.3726 26 24 26C30.6274 26 36 31.3726 36 38" stroke="#0d8bf2" stroke-width="2" stroke-linecap="round"/>
                <path d="M38 10L39.5 13.5H43L40.2 15.8L41.2 19.5L38 17.2L34.8 19.5L35.8 15.8L33 13.5H36.5L38 10Z" fill="#0d8bf2"/>
              </svg>
            </div>
            <div class="for-whom-text">
              <h3>Не просто программист, а лидер с навыками будущего</h3>
              <p>Наши курсы — это трамплин в будущее. Мы учим навыкам, которые будут нужны через 10 лет.</p>
            </div>
          </article>
          <article class="for-whom-item card">
            <div class="adv-icon">
              <svg viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                <circle cx="16" cy="14" r="5" stroke="#0d8bf2" stroke-width="2"/>
                <path d="M8 34C8 28.4772 12.4772 24 18 24H20" stroke="#0d8bf2" stroke-width="2" stroke-linecap="round"/>
                <circle cx="34" cy="14" r="5" stroke="#0d8bf2" stroke-width="2"/>
                <path d="M42 34C42 28.4772 37.5228 24 32 24H28" stroke="#0d8bf2" stroke-width="2" stroke-linecap="round"/>
                <rect x="18" y="22" width="14" height="10" rx="2" fill="#0d8bf2" fill-opacity="0.15" stroke="#0d8bf2" stroke-width="2"/>
                <path d="M22 34L24 38L26 34" stroke="#0d8bf2" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
              </svg>
            </div>
            <div class="for-whom-text">
              <h3>Хотите развить у ребенка навыки общения и лидерства?</h3>
              <p>У нас дети учатся общаться, работать в команде и презентовать идеи.</p>
            </div>
          </article>
        </div>
        <div class="for-whom-visual">
          <img src="Foto/General/new_29.jpg" alt="Занятия в студии КодаКидс" class="section-image section-image-lg">
        </div>
      </div>
    </div>
  </section>

  <section class="section section-dark values" id="values">
    <div class="container values-inner">
      <div class="values-visual">
        <img src="Foto/General/studio.jpg" alt="Занятия в студии" class="section-image section-image-md">
      </div>
      <div class="values-text">
        <h2 class="section-title">Почему именно мы?</h2>
        <ul class="values-list">
          <li><span class="bullet"></span> Не просто программист, а лидер с навыками будущего</li>
          <li><span class="bullet"></span> Хотите развить у ребенка навыки общения и лидерства?</li>
          <li><span class="bullet"></span> Учим создавать технологии, а не просто пользоваться ими</li>
        </ul>
      </div>
    </div>
  </section>

  <section class="section section-light courses" id="courses">
    <div class="container">
      <h2 class="section-title center">Каталог курсов</h2>
      <div class="courses-grid" id="coursesGrid">
        <!-- Карточки генерируются из JS, но для семантики оставим шаблон здесь или сразу вставим -->
      </div>
    </div>
  </section>

  <section class="section section-dark about" id="about">
    <div class="container">
      <h2 class="section-title">Студия интеллектуального роста "КОДАкидс"</h2>
      <p class="about-subtitle">Ваш ребенок наконец-то оторвется от гаджетов и проведет время за развивающими занятиями вместо игр на телефоне.</p>
      <div class="about-inner">
        <div class="about-list">
          <article class="about-item">
            <div class="adv-icon">
              <svg viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                <rect x="10" y="6" width="28" height="36" rx="3" stroke="#0d8bf2" stroke-width="2"/>
                <path d="M16 16H24" stroke="#0d8bf2" stroke-width="2" stroke-linecap="round"/>
                <path d="M16 22H22" stroke="#0d8bf2" stroke-width="2" stroke-linecap="round"/>
                <path d="M30 28L32 32L38 24" stroke="#0d8bf2" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
              </svg>
            </div>
            <div class="about-item-text">
              <h3>У нас есть государственная образовательная лицензия</h3>
              <p>Все помещения соответствуют нормам СанПиН. Вы можете получить налоговый вычет 13%.</p>
            </div>
          </article>
          <article class="about-item">
            <div class="adv-icon">
              <svg viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                <circle cx="18" cy="16" r="5" stroke="#0d8bf2" stroke-width="2"/>
                <path d="M8 40C8 33.3726 12.4772 28 18 28" stroke="#0d8bf2" stroke-width="2" stroke-linecap="round"/>
                <circle cx="34" cy="16" r="5" stroke="#0d8bf2" stroke-width="2"/>
                <path d="M44 40C44 33.3726 39.5228 28 34 28" stroke="#0d8bf2" stroke-width="2" stroke-linecap="round"/>
              </svg>
            </div>
            <div class="about-item-text">
              <h3>Группы до 10 человек</h3>
              <p>Каждому ребенку хватит внимания и поддержки от преподавателя.</p>
            </div>
          </article>
          <article class="about-item">
            <div class="adv-icon">
              <svg viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                <circle cx="24" cy="24" r="14" stroke="#0d8bf2" stroke-width="2"/>
                <path d="M24 16V24L30 28" stroke="#0d8bf2" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
              </svg>
            </div>
            <div class="about-item-text">
              <h3>Удобный график</h3>
              <p>На любом курсе уроки проходят 1 раз в неделю по 2 часа. Это не перегружает детей и позволяет построить удобный график.</p>
            </div>
          </article>
          <article class="about-item">
            <div class="adv-icon">
              <svg viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M14 14L22 22" stroke="#0d8bf2" stroke-width="2" stroke-linecap="round"/>
                <circle cx="28" cy="28" r="6" stroke="#0d8bf2" stroke-width="2"/>
                <path d="M32 32L40 40" stroke="#0d8bf2" stroke-width="2" stroke-linecap="round"/>
                <path d="M40 40L44 44" stroke="#0d8bf2" stroke-width="2" stroke-linecap="round"/>
              </svg>
            </div>
            <div class="about-item-text">
              <h3>80% практики на каждом уроке</h3>
              <p>А значит детям не будет скучно, + они точно получат конкретные навыки, которые смогут применять дальше в учебе, хобби, или карьере.</p>
            </div>
          </article>
        </div>
        <div class="about-visual">
          <img src="Foto/General/general.jpg" alt="О студии КодаКидс" class="section-image section-image-md">
        </div>
      </div>
    </div>
  </section>

<?php include 'includes/lead-form.php'; ?>

  <section class="section section-dark gallery" id="gallery">
    <div class="container">
      <h2 class="section-title center">Фотогалерея</h2>
      <div class="masonry-gallery" id="photoGallery">
        <div class="masonry-item"><img src="Foto/Gallery/1.jpg" alt="Галерея 1"></div>
        <div class="masonry-item"><img src="Foto/Gallery/5.jfif" alt="Галерея 2"></div>
        <div class="masonry-item"><img src="Foto/Gallery/_WhatsApp_2023-11-26.jpg" alt="Галерея 3"></div>
        <div class="masonry-item"><img src="Foto/Gallery/_WhatsApp_2024-01-28 (1).jpg" alt="Галерея 4"></div>
        <div class="masonry-item"><img src="Foto/Gallery/_WhatsApp_2024-02-17.jpg" alt="Галерея 5"></div>
        <div class="masonry-item"><img src="Foto/Gallery/_WhatsApp_2024-03-26.jpg" alt="Галерея 6"></div>
        <div class="masonry-item"><img src="Foto/Gallery/_WhatsApp_2024-03-27 (1).jpg" alt="Галерея 7"></div>
        <div class="masonry-item"><img src="Foto/Gallery/_WhatsApp_2024-03-27 (2).jpg" alt="Галерея 8"></div>
        <div class="masonry-item"><img src="Foto/Gallery/_WhatsApp_2024-03-27.jpg" alt="Галерея 9"></div>
        <div class="masonry-item"><img src="Foto/Gallery/_WhatsApp_2024-03-29.jpg" alt="Галерея 10"></div>
        <div class="masonry-item"><img src="Foto/Gallery/_WhatsApp_2024-03-30.jpg" alt="Галерея 11"></div>
        <div class="masonry-item"><img src="Foto/Gallery/IMG_4591.jfif" alt="Галерея 12"></div>
        <div class="masonry-item"><img src="Foto/Gallery/IMG_4615.jfif" alt="Галерея 13"></div>
        <div class="masonry-item"><img src="Foto/Gallery/IMG_4631.jfif" alt="Галерея 14"></div>
        <div class="masonry-item"><img src="Foto/Gallery/IMG_4637.jfif" alt="Галерея 15"></div>
        <div class="masonry-item"><img src="Foto/Gallery/certificate.jfif" alt="Галерея 16"></div>
        <div class="masonry-item"><img src="Foto/Gallery/general.png" alt="Галерея 17"></div>
        <div class="masonry-item"><img src="Foto/Gallery/new_01.jpg" alt="Галерея 18"></div>
        <div class="masonry-item"><img src="Foto/Gallery/new_02.jpg" alt="Галерея 19"></div>
        <div class="masonry-item"><img src="Foto/Gallery/new_03.jpg" alt="Галерея 20"></div>
        <div class="masonry-item"><img src="Foto/Gallery/new_04.jpg" alt="Галерея 21"></div>
        <div class="masonry-item"><img src="Foto/Gallery/new_05.jpg" alt="Галерея 22"></div>
        <div class="masonry-item"><img src="Foto/Gallery/new_06.jpg" alt="Галерея 23"></div>
        <div class="masonry-item"><img src="Foto/Gallery/new_08.jpg" alt="Галерея 24"></div>
        <div class="masonry-item"><img src="Foto/Gallery/new_16.jpg" alt="Галерея 25"></div>
        <div class="masonry-item"><img src="Foto/Gallery/new_17.jpg" alt="Галерея 26"></div>
        <div class="masonry-item"><img src="Foto/Gallery/new_20.jpg" alt="Галерея 27"></div>
        <div class="masonry-item"><img src="Foto/Gallery/new_28.jpg" alt="Галерея 28"></div>
        <div class="masonry-item"><img src="Foto/Gallery/new_29.jpg" alt="Галерея 29"></div>
        <div class="masonry-item"><img src="Foto/Gallery/new_30.jpg" alt="Галерея 30"></div>
        <div class="masonry-item"><img src="Foto/Gallery/new_32.jpg" alt="Галерея 31"></div>
        <div class="masonry-item"><img src="Foto/Gallery/new_33.jpg" alt="Галерея 32"></div>
        <div class="masonry-item"><img src="Foto/Gallery/new_37.jpg" alt="Галерея 33"></div>
        <div class="masonry-item"><img src="Foto/Gallery/new_38.jpg" alt="Галерея 34"></div>
        <div class="masonry-item"><img src="Foto/Gallery/photo_2022-10-30_10-.jpg" alt="Галерея 35"></div>
        <div class="masonry-item"><img src="Foto/Gallery/photo_2024-05-26_12-.jpg" alt="Галерея 36"></div>
      </div>
    </div>
  </section>

  <section class="section section-light team" id="team">
    <div class="container">
      <h2 class="section-title center">Команда</h2>
      <div class="team-grid">
        <article class="team-card card">
          <div class="team-avatar">
            <img src="Foto/Teachers/nikita.jfif" alt="Яковлев Никита">
          </div>
          <h3>Яковлев Никита Андреевич</h3>
          <p class="team-role">Старший преподаватель IT-направления</p>
          <p class="team-desc">Преподаватель курсов информационных технологий: Создание игр в Пайтон (Python), Пилотирование дронов и современное авиамоделирование, Компьютерная грамотность, Программирование в Майнкрафт, Создание игр в Скретч (Scratch), Гарвардский курс Гарвардский курс по основам программирования CS50, Создание игр в "Unreal Engine 4", Визуальное программирование в Скретч (Scratch), Нейросети.</p>
        </article>
        <article class="team-card card">
          <div class="team-avatar">
            <img src="Foto/Teachers/veronika.jpg" alt="Кучерявенко Вероника">
          </div>
          <h3>Кучерявенко Вероника Валерьевна</h3>
          <p class="team-role">Профориентолог, Психолог</p>
          <p class="team-desc">Педагог-психолог, специалист по НЛП, профориентолог. Повышение квалификации по направлениям: детская и подростковая психотерапия, аналитическая психология.</p>
        </article>
        <article class="team-card card">
          <div class="team-avatar">
            <img src="Foto/Teachers/larisa.jpg" alt="Семенюк Лариса">
          </div>
          <h3>Семенюк Лариса Валерьевна</h3>
          <p class="team-role">Педагог-психолог, детский психолог, системный семейный психолог, арт-терапевт, сказкотерапевт</p>
          <p class="team-desc">Руководитель Детского Центра "Чудо-Остров" в г. Иркутск. Опыт работы с детьми - более 20-ти лет, в качестве психолога - более 10-ти лет. Опыт ведения подросткового психологического клуба и коммуникативной группы для детей 7-10 лет. Принимала участие как один из ведущих психологов в Иркутском кинопроекте для детей. Консультирование семей по детско-родительским отношениям и индивидуальная психологическая работа с детьми, подростками и юношеским возрастом.</p>
        </article>
      </div>
    </div>
  </section>

<?php include 'includes/map-section.php'; ?>

<?php include 'includes/footer.php'; ?>

<?php include 'includes/cookie-banner.php'; ?>

<?php include 'includes/lightbox.php'; ?>

<?php include 'includes/course-modal.php'; ?>

<?php include 'includes/policy-modal.php'; ?>

<?php include 'includes/scroll-top.php'; ?>

<?php include 'includes/scripts.php'; ?>
</body>
</html>
