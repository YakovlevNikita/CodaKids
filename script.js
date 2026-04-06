(function () {
  'use strict';

  /* === Courses data mapping === */
  const courseMapping = {
    'Майнкрафт: основы программирования': 'minecraft-basics',
    'Майнкрафт: программирование на Python': 'minecraft-python',
    'Создание игр в Scratch (продвинутый)': 'scratch',
    'Веб-разработка (создание сайтов)': 'web-dev',
    'Гарвардский курс CS50': 'cs50',
    'Искусство общения / Эмоциональный интеллект': 'communication',
    'Профориентация для подростков': 'proforientation-teens',
    'Профориентация для взрослых': 'proforientation-adults'
  };

  /* === Courses data === */
  const courses = [
    {
      title: 'Майнкрафт: основы программирования',
      age: '8-9 лет',
      direction: 'IT',
      price: '5200₽/модуль',
      status: 'closed',
      image: 'Foto/Courses/minecraft-basics.png',
      desc: 'Вводный курс в мир программирования через любимую игру. Дети учатся базовым алгоритмам и логике.'
    },
    {
      title: 'Майнкрафт: программирование на Python',
      age: '10-11 лет',
      direction: 'IT',
      price: '5200₽/модуль',
      status: 'closed',
      image: 'Foto/Courses/minecraft-python.png',
      desc: 'Переход от визуальных блоков к реальному коду на Python в среде Minecraft.'
    },
    {
      title: 'Создание игр в Scratch (продвинутый)',
      age: '12-13 лет',
      direction: 'IT',
      price: '5200₽/модуль',
      status: 'closed',
      image: 'Foto/Courses/scratch.png',
      desc: 'Углублённое изучение Scratch: анимация, физика, создание механик и уровней.'
    },
    {
      title: 'Веб-разработка (создание сайтов)',
      age: '15+',
      direction: 'IT',
      price: '5200₽/модуль',
      status: 'closed',
      image: 'Foto/Courses/web-dev.png',
      desc: 'HTML, CSS и основы JavaScript. Результат — собственный сайт-портфолио.'
    },
    {
      title: 'Гарвардский курс CS50',
      age: '16+',
      direction: 'IT',
      price: '5200₽/модуль',
      status: 'closed',
      image: 'Foto/Courses/cs50.png',
      desc: 'Адаптированная программа знаменитого гарвардского курса для подростков.'
    },
    {
      title: 'Искусство общения / Эмоциональный интеллект',
      age: '7-15 лет',
      direction: 'Психология',
      price: '4700₽/модуль',
      status: 'closed',
      image: 'Foto/Courses/emotional-intelligence.png',
      desc: 'Развитие коммуникативных навыков, эмпатии и уверенности в себе.'
    },
    {
      title: 'Профориентация для подростков',
      age: '12-17 лет',
      direction: 'Психология',
      price: '9000₽ (3 консультации)',
      status: 'open',
      image: 'Foto/Courses/proforientation-teens.png',
      desc: 'Помогаем разобраться в интересах и выбрать направление для обучения и карьеры.'
    },
    {
      title: 'Профориентация для взрослых',
      age: '18+',
      direction: 'Психология',
      price: '9000₽ (3 консультации)',
      status: 'open',
      image: 'Foto/Courses/proforientation-adults.png',
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
          <div class="course-image">
            <img src="${escapeHtml(c.image)}" alt="${escapeHtml(c.title)}">
          </div>
          <span class="status ${statusClass}">${statusText}</span>
          <h3>${escapeHtml(c.title)}</h3>
          <ul class="course-meta">
            <li><strong>Направление:</strong> ${escapeHtml(c.direction)}</li>
            <li><strong>Возраст:</strong> ${escapeHtml(c.age)}</li>
          </ul>
          <p class="course-desc">${escapeHtml(c.desc)}</p>
          <div class="course-price">${escapeHtml(c.price)}</div>
          <div class="course-actions">
            <button type="button" class="course-details-btn" data-course="${escapeHtml(c.title)}">Подробнее</button>
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
    const consentCheckbox = document.getElementById('consentCheckbox');
    const submitBtn = document.getElementById('submitBtn');
    const formStatus = document.getElementById('formStatus');
    
    if (!form) return;

    // Toggle submit button based on consent checkbox
    if (consentCheckbox && submitBtn) {
      consentCheckbox.addEventListener('change', () => {
        submitBtn.disabled = !consentCheckbox.checked;
      });
    }

    form.addEventListener('submit', async (e) => {
      e.preventDefault();
      
      // Check consent
      if (consentCheckbox && !consentCheckbox.checked) {
        showStatus('Пожалуйста, подтвердите согласие с политикой обработки персональных данных', 'error');
        return;
      }
      
      const phone = form.phone.value.trim();
      const email = form.email.value.trim();

      if (!phone || phone.length < 6) {
        showStatus('Пожалуйста, введите корректный номер телефона', 'error');
        form.phone.focus();
        return;
      }
      if (!/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email)) {
        showStatus('Пожалуйста, введите корректный E-mail', 'error');
        form.email.focus();
        return;
      }

      // Show loading state
      if (submitBtn) {
        submitBtn.disabled = true;
        submitBtn.textContent = 'Отправка...';
      }

      try {
        const formData = new FormData(form);
        const response = await fetch('send.php', {
          method: 'POST',
          body: formData
        });

        const result = await response.json();

        if (result.success) {
          showStatus(result.message, 'success');
          form.reset();
          if (consentCheckbox) consentCheckbox.checked = false;
        } else {
          showStatus(result.message || 'Ошибка отправки', 'error');
        }
      } catch (error) {
        showStatus('Ошибка сети. Попробуйте ещё раз или позвоните нам.', 'error');
      } finally {
        if (submitBtn) {
          submitBtn.textContent = 'Оставить заявку';
          submitBtn.disabled = consentCheckbox ? !consentCheckbox.checked : true;
        }
      }
    });

    function showStatus(message, type) {
      if (!formStatus) return;
      formStatus.textContent = message;
      formStatus.className = 'form-status ' + type;
      formStatus.style.display = 'block';
      
      setTimeout(() => {
        formStatus.style.display = 'none';
      }, 5000);
    }
  }

  /* === Policy Modal === */
  function initPolicyModal() {
    const modal = document.getElementById('policyModal');
    const closeBtn = document.getElementById('policyModalClose');
    const openLink = document.getElementById('openPolicyLink');
    const footerLink = document.getElementById('footerPolicyLink');

    if (!modal) return;

    function openModal(e) {
      if (e) e.preventDefault();
      modal.classList.add('active');
      document.body.style.overflow = 'hidden';
    }

    function closeModal() {
      modal.classList.remove('active');
      document.body.style.overflow = '';
    }

    // Open from form link
    if (openLink) {
      openLink.addEventListener('click', openModal);
    }

    // Open from footer link
    if (footerLink) {
      footerLink.addEventListener('click', openModal);
    }

    // Close button
    if (closeBtn) {
      closeBtn.addEventListener('click', closeModal);
    }

    // Close on backdrop click
    modal.addEventListener('click', (e) => {
      if (e.target === modal) {
        closeModal();
      }
    });

    // Close on Escape key
    document.addEventListener('keydown', (e) => {
      if (e.key === 'Escape' && modal.classList.contains('active')) {
        closeModal();
      }
    });
  }

  /* === Cookie banner === */
  function initCookieBanner() {
    const banner = document.getElementById('cookieBanner');
    const btnOk = document.getElementById('cookieOk');
    const btnDecline = document.getElementById('cookieDecline');
    if (!banner) return;

    // Check if user already made a choice
    if (localStorage.getItem('cookiesChoice')) {
      banner.classList.add('hidden');
    }

    // Accept cookies
    if (btnOk) {
      btnOk.addEventListener('click', () => {
        localStorage.setItem('cookiesChoice', 'accepted');
        localStorage.setItem('cookiesAccepted', '1');
        banner.classList.add('hidden');
      });
    }

    // Decline cookies
    if (btnDecline) {
      btnDecline.addEventListener('click', () => {
        localStorage.setItem('cookiesChoice', 'declined');
        banner.classList.add('hidden');
      });
    }
  }

  /* === Photo Wheel Gallery === */
  function initPhotoWheel() {
    const wheel = document.getElementById('photoWheel');
    const prevBtn = document.getElementById('wheelPrev');
    const nextBtn = document.getElementById('wheelNext');
    const lightbox = document.getElementById('lightbox');
    const lightboxImg = document.getElementById('lightboxImg');
    const lightboxClose = document.getElementById('lightboxClose');
    const lightboxPrev = document.getElementById('lightboxPrev');
    const lightboxNext = document.getElementById('lightboxNext');
    
    if (!wheel) return;
    
    let rotation = 0;
    const angle = 45; // 360 / 8 фото
    let isAnimating = true;
    let currentImageIndex = 0;
    
    // Собираем все URL изображений
    const wheelImages = Array.from(wheel.querySelectorAll('.wheel-item img')).map(img => img.src);
    
    function rotate(direction) {
      rotation += direction * angle;
      wheel.style.animation = 'none';
      wheel.style.transform = `perspective(1000px) rotateY(${rotation}deg)`;
      isAnimating = false;
      
      setTimeout(() => {
        wheel.style.animation = 'rotateWheel 30s linear infinite';
        wheel.style.transform = '';
        isAnimating = true;
      }, 3000);
    }
    
    prevBtn?.addEventListener('click', () => rotate(-1));
    nextBtn?.addEventListener('click', () => rotate(1));
    
    // Lightbox функции
    function openLightbox(index) {
      currentImageIndex = index;
      lightboxImg.src = wheelImages[index];
      lightbox.classList.add('active');
      document.body.style.overflow = 'hidden';
    }
    
    function closeLightbox() {
      lightbox.classList.remove('active');
      document.body.style.overflow = '';
      // Возобновляем вращение колеса
      wheel.style.animationPlayState = 'running';
    }
    
    function showPrevImage() {
      currentImageIndex = (currentImageIndex - 1 + wheelImages.length) % wheelImages.length;
      lightboxImg.src = wheelImages[currentImageIndex];
    }
    
    function showNextImage() {
      currentImageIndex = (currentImageIndex + 1) % wheelImages.length;
      lightboxImg.src = wheelImages[currentImageIndex];
    }
    
    // Клик на фото в колесе
    wheel.querySelectorAll('.wheel-item').forEach((item, index) => {
      item.addEventListener('click', () => {
        wheel.style.animationPlayState = 'paused';
        openLightbox(index);
      });
      item.style.cursor = 'pointer';
    });
    
    // Lightbox события
    lightboxClose?.addEventListener('click', closeLightbox);
    lightboxPrev?.addEventListener('click', (e) => { e.stopPropagation(); showPrevImage(); });
    lightboxNext?.addEventListener('click', (e) => { e.stopPropagation(); showNextImage(); });
    
    lightbox?.addEventListener('click', (e) => {
      if (e.target === lightbox) closeLightbox();
    });
    
    // Клавиатура
    document.addEventListener('keydown', (e) => {
      if (!lightbox.classList.contains('active')) return;
      if (e.key === 'Escape') closeLightbox();
      if (e.key === 'ArrowLeft') showPrevImage();
      if (e.key === 'ArrowRight') showNextImage();
    });
  }

  /* === Scroll to Top === */
  function initScrollToTop() {
    const btn = document.getElementById('scrollToTop');
    if (!btn) return;

    // Show/hide button based on scroll position
    function toggleVisibility() {
      if (window.scrollY > 500) {
        btn.classList.add('visible');
      } else {
        btn.classList.remove('visible');
      }
    }

    // Scroll to top on click
    btn.addEventListener('click', () => {
      window.scrollTo({ top: 0, behavior: 'smooth' });
    });

    // Listen for scroll events
    window.addEventListener('scroll', toggleVisibility, { passive: true });
    
    // Initial check
    toggleVisibility();
  }

  /* === Course Modal === */
  function initCourseModal() {
    const modal = document.getElementById('courseModal');
    const closeBtn = document.getElementById('courseModalClose');
    const enrollBtn = document.getElementById('courseModalEnroll');
    const modalImg = document.getElementById('courseModalImg');
    const modalTitle = document.getElementById('courseModalTitle');
    const modalMeta = document.getElementById('courseModalMeta');
    const modalBody = document.getElementById('courseModalBody');

    if (!modal) return;

    function openModal(courseId, courseData) {
      const courseInfo = coursesData[courseId];
      if (!courseInfo) return;

      modalImg.src = courseData.image;
      modalImg.alt = courseData.title;
      modalTitle.textContent = courseData.title;
      
      modalMeta.innerHTML = `
        <span>${courseData.age}</span>
        <span>${courseData.direction}</span>
        <span>${courseData.price}</span>
      `;
      
      modalBody.innerHTML = courseInfo.content;
      
      modal.classList.add('active');
      document.body.style.overflow = 'hidden';
    }

    function closeModal() {
      modal.classList.remove('active');
      document.body.style.overflow = '';
    }

    // Attach click handlers to course detail buttons
    document.addEventListener('click', (e) => {
      if (e.target.classList.contains('course-details-btn')) {
        const courseTitle = e.target.dataset.course;
        const courseId = courseMapping[courseTitle];
        const courseData = courses.find(c => c.title === courseTitle);
        if (courseId && courseData) {
          openModal(courseId, courseData);
        }
      }
    });

    // Close button
    if (closeBtn) {
      closeBtn.addEventListener('click', closeModal);
    }

    // Close on backdrop click
    modal.addEventListener('click', (e) => {
      if (e.target === modal) {
        closeModal();
      }
    });

    // Close on Escape key
    document.addEventListener('keydown', (e) => {
      if (e.key === 'Escape' && modal.classList.contains('active')) {
        closeModal();
      }
    });

    // Enroll button scroll
    if (enrollBtn) {
      enrollBtn.addEventListener('click', () => {
        closeModal();
        const target = document.querySelector('#leadForm');
        if (target) {
          target.scrollIntoView({ behavior: 'smooth', block: 'start' });
        }
      });
    }
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
    initPolicyModal();
    initCourseModal();
    initScrollToTop();
  });
})();
