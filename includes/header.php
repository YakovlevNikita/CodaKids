<?php
$logoHref = !empty($isHome) ? '#' : 'index.php';
$coursesHref = !empty($isHome) ? '#courses' : 'index.php#courses';
$aboutHref = !empty($isHome) ? '#about' : 'index.php#about';
$teamHref = !empty($isHome) ? '#team' : 'index.php#team';
$contactsHref = !empty($isHome) ? '#contacts' : 'index.php#contacts';
?>
  <header class="site-header" id="header">
    <div class="container header-inner">
      <a href="<?php echo $logoHref; ?>" class="logo">Кода<span>Кидс</span></a>
      <nav class="main-nav" id="mainNav">
        <a href="<?php echo $coursesHref; ?>">Курсы</a>
        <a href="<?php echo $aboutHref; ?>">О студии</a>
        <a href="<?php echo $teamHref; ?>">Команда</a>
        <a href="<?php echo $contactsHref; ?>">Контакты</a>
      </nav>
      <a href="tel:+79247121322" class="header-phone">+7 (924) 712-13-22</a>
      <button class="burger" id="burger" aria-label="Открыть меню">
        <span></span>
        <span></span>
        <span></span>
      </button>
    </div>
  </header>
