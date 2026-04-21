<?php require_once __DIR__ . '/csrf.php'; ?>
  <section class="section section-dark lead" id="leadForm">
    <div class="container">
      <div class="lead-card">
        <h2 class="lead-title">Запишитесь на бесплатный урок или узнайте подробности</h2>
        <p class="lead-subtitle">Мы перезвоним и проконсультируем</p>
        <form class="lead-form" id="captureForm" novalidate action="send.php" method="POST">
          <input type="hidden" name="csrf_token" value="<?php echo generateCsrfToken(); ?>">
          <div class="form-row">
            <input type="text" name="name" id="nameInput" placeholder="Ваше имя" required>
            <input type="tel" name="phone" id="phoneInput" placeholder="+7 (___) ___-__-__" required>
            <button type="submit" class="btn btn-primary" id="submitBtn" disabled>Оставить заявку</button>
          </div>
          <label class="form-consent">
            <input type="checkbox" id="consentCheckbox" name="consent" value="1">
            <span class="checkmark"></span>
            <span class="consent-text">Я согласен с <a href="#" class="policy-link" id="openPolicyLink">политикой обработки персональных данных</a></span>
          </label>
          <div class="form-status" id="formStatus"></div>
        </form>
      </div>
    </div>
  </section>
