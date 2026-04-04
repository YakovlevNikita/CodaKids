(function () {
  'use strict';

  /* === Courses data === */
  const courses = [
    {
      title: 'Майнкрафт: основы программирования',
      age: '8-9 лет',
      direction: 'IT',
      price: '5200₽/модуль',
      status: 'closed',
      desc: 'Вводный курс в мир программирования через любимую игру. Дети учатся базовым алгоритмам и логике.'
    },
    {
      title: 'Майнкрафт: программирование на Python',
      age: '10-11 лет',
      direction: 'IT',
      price: '5200₽/модуль',
      status: 'closed',
      desc: 'Переход от визуальных блоков к реальному коду на Python в среде Minecraft.'
    },
    {
      title: 'Создание игр в Scratch (продвинутый)',
      age: '12-13 лет',
      direction: 'IT',
      price: '5200₽/модуль',
      status: 'closed',
      desc: 'Углублённое изучение Scratch: анимация, физика, создание механик и уровней.'
    },
    {
      title: 'Веб-разработка (создание сайтов)',
      age: '15+',
      direction: 'IT',
      price: '5200₽/модуль',
      status: 'closed',
      desc: 'HTML, CSS и основы JavaScript. Результат — собственный сайт-портфолио.'
    },
    {
      title: 'Гарвардский курс CS50',
      age: '16+',
      direction: 'IT',
      price: '5200₽/модуль',
      status: 'closed',
      desc: 'Адаптированная программа знаменитого гарвардского курса для подростков.'
    },
    {
      title: 'Искусство общения / Эмоциональный интеллект',
      age: '7-15 лет',
      direction: 'Психология',
      price: '4700₽/модуль',
      status: 'closed',
      desc: 'Развитие коммуникативных навыков, эмпатии и уверенности в себе.'
    },
    {
      title: 'Профориентация для подростков',
      age: '12-17 лет',
      direction: 'Психология',
      price: '9000₽ (3 консультации)',
      status: 'open',
      desc: 'Помогаем разобраться в интересах и выбрать направление для обучения и карьеры.'
    },
    {
      title: 'Профориентация для взрослых',
      age: '18+',
      direction: 'Психология',
      price: '9000₽ (3 консультации)',
      status: 'open',
      desc: 'Индивидуальные консультации по выбору профессии и построению карьерного трека.'
    }
  ];

  function renderCourses() {
    const grid = document.getElementById('coursesGrid');
    if (!grid) return;

    grid.innerHTML = courses.map(c => {
      const isOpen = c.status === 'open';
      const statusText = isOpen ? '✅ Идёт набор' : '❌ Набор закрыт';
      const statusClass = isOpen ? 'status-open' : 'status-closed';
      return `
        <article class="course-card">
          <span class="status ${statusClass}">${statusText}</span>
          <h3>${escapeHtml(c.title)}</h3>
          <ul class="course-meta">
            <li><strong>Направление:</strong> ${escapeHtml(c.direction)}</li>
            <li><strong>Возраст:</strong> ${escapeHtml(c.age)}</li>
          </ul>
          <p class="course-desc">${escapeHtml(c.desc)}</p>
          <div class="course-price">${escapeHtml(c.price)}</div>
          <div class="course-actions">
            <a href="#" onclick="event.preventDefault(); alert('Страница курса в разработке');">Подробнее</a>
            <button type="button" data-scroll="#leadForm">Записаться</button>
          </div>
        </article>
      `;
    }).join('');

    // Attach scroll handlers to newly added buttons
    attachScrollHandlers();
  }

  function escapeHtml(str) {
    return String(str)
      .replace(/&/g, '&amp;')
      .replace(/</g, '&lt;')
      .replace(/>/g, '&gt;')
      .replace(/"/g, '&quot;');
  }

  /* === Mobile menu === */
  function initMenu() {
    const burger = document.getElementById('burger');
    const nav = document.getElementById('mainNav');
    if (!burger || !nav) return;

    burger.addEventListener('click', () => {
      nav.classList.toggle('open');
    });

    nav.querySelectorAll('a').forEach(link => {
      link.addEventListener('click', () => {
        nav.classList.remove('open');
      });
    });
  }

  /* === Smooth scroll === */
  function attachScrollHandlers() {
    document.querySelectorAll('[data-scroll]').forEach(btn => {
      btn.addEventListener('click', (e) => {
        const target = document.querySelector(btn.dataset.scroll);
        if (target) {
          e.preventDefault();
          target.scrollIntoView({ behavior: 'smooth', block: 'start' });
        }
      });
    });
  }

  /* === Phone mask === */
  function initPhoneMask() {
    const input = document.getElementById('phoneInput');
    if (!input) return;

    input.addEventListener('input', (e) => {
      let val = input.value.replace(/\D/g, '');
      if (val.length > 11) val = val.slice(0, 11);

      let formatted = '+7';
      if (val.length > 1) {
        formatted += ' (' + val.slice(1, 4);
      }
      if (val.length >= 4) {
        formatted += ') ' + val.slice(4, 7);
      }
      if (val.length >= 7) {
        formatted += '-' + val.slice(7, 9);
      }
      if (val.length >= 9) {
        formatted += '-' + val.slice(9, 11);
      }

      // Keep cursor near the end for simplicity
      input.value = formatted;
    });

    input.addEventListener('focus', () => {
      if (!input.value) input.value = '+7 (';
    });

    input.addEventListener('blur', () => {
      if (input.value === '+7 (') input.value = '';
    });
  }

  /* === Form handling === */
  function initForm() {
    const form = document.getElementById('captureForm');
    if (!form) return;

    form.addEventListener('submit', (e) => {
      e.preventDefault();
      const phone = form.phone.value.trim();
      const email = form.email.value.trim();

      if (!phone || phone.length < 6) {
        alert('Пожалуйста, введите корректный номер телефона');
        form.phone.focus();
        return;
      }
      if (!/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email)) {
        alert('Пожалуйста, введите корректный E-mail');
        form.email.focus();
        return;
      }

      alert('Спасибо! Заявка отправлена. Мы свяжемся с вами в ближайшее время.');
      form.reset();
    });
  }

  /* === Cookie banner === */
  function initCookieBanner() {
    const banner = document.getElementById('cookieBanner');
    const btn = document.getElementById('cookieOk');
    if (!banner || !btn) return;

    if (localStorage.getItem('cookiesAccepted')) {
      banner.classList.add('hidden');
    }

    btn.addEventListener('click', () => {
      localStorage.setItem('cookiesAccepted', '1');
      banner.classList.add('hidden');
    });
  }

  /* === Photo Wheel Gallery === */
  function initPhotoWheel() {
    const wheel = document.getElementById('photoWheel');
    const prevBtn = document.getElementById('wheelPrev');
    const nextBtn = document.getElementById('wheelNext');
    
    if (!wheel) return;
    
    let rotation = 0;
    const angle = 45; // 360 / 8 фото
    let isAnimating = true;
    
    function rotate(direction) {
      rotation += direction * angle;
      wheel.style.animation = 'none';
      wheel.style.transform = `perspective(1000px) rotateY(${rotation}deg)`;
      isAnimating = false;
      
      // Возобновить авто-вращение через 3 секунды
      setTimeout(() => {
        wheel.style.animation = 'rotateWheel 30s linear infinite';
        wheel.style.transform = '';
        isAnimating = true;
      }, 3000);
    }
    
    prevBtn?.addEventListener('click', () => rotate(-1));
    nextBtn?.addEventListener('click', () => rotate(1));
    
    // Остановка при наведении (уже через CSS)
    // Дополнительно остановим анимацию при клике на фото
    wheel.querySelectorAll('.wheel-item').forEach(item => {
      item.addEventListener('click', () => {
        wheel.style.animationPlayState = 'paused';
        setTimeout(() => {
          wheel.style.animationPlayState = 'running';
        }, 2000);
      });
    });
  }

  /* === Init === */
  document.addEventListener('DOMContentLoaded', () => {
    renderCourses();
    initMenu();
    attachScrollHandlers();
    initPhoneMask();
    initForm();
    initCookieBanner();
    initPhotoWheel();
  });
})();
