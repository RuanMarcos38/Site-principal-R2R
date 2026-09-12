<?php
declare(strict_types=1);

$indexPath = __DIR__ . '/index.html';
$html = @file_get_contents($indexPath);

if ($html === false) {
    http_response_code(500);
    header('Content-Type: text/plain; charset=UTF-8');
    echo 'Não foi possível carregar o site.';
    exit;
}

$headAdditions = [];

$headAdditions[] = <<<'HTML'
<style id="r2r-professional-typography">
  :root {
    --r2r-bg: #02050f;
    --r2r-bg-soft: #050917;
    --r2r-surface: #040916;
    --r2r-surface-2: #071022;
    --r2r-border: rgba(255,255,255,.08);
    --r2r-border-soft: rgba(255,255,255,.05);
    --r2r-text: #f3f5f9;
    --r2r-text-soft: #c5cbda;
    --r2r-text-muted: #a8b0c2;
    --r2r-accent: #4f8cff;
    --r2r-accent-soft: #2d6bdb;
    --r2r-green: #19d46b;
    --r2r-shadow: 0 10px 24px rgba(0,0,0,.18);
    --r2r-shadow-soft: 0 6px 14px rgba(0,0,0,.12);
    --r2r-radius: 14px;
    --r2r-radius-sm: 10px;
    --r2r-container: 1180px;
  }

  html,
  body,
  button,
  input,
  textarea,
  select {
    font-family: Inter, "Segoe UI", Roboto, Helvetica, Arial, sans-serif;
    font-kerning: normal;
    text-rendering: optimizeLegibility;
    -webkit-font-smoothing: antialiased;
    -moz-osx-font-smoothing: grayscale;
  }

  body {
    background:
      radial-gradient(circle at 12% 10%, rgba(63,101,181,.08), transparent 24%),
      radial-gradient(circle at 85% 14%, rgba(30,78,160,.06), transparent 24%),
      linear-gradient(180deg, #02040c 0%, #040814 55%, #02040c 100%);
    color: var(--r2r-text);
    font-size: 16px;
    line-height: 1.65;
    letter-spacing: 0;
    font-weight: 400;
  }

  .container {
    width: min(var(--r2r-container), calc(100% - 48px));
    margin: 0 auto;
  }

  .topbar {
    background: rgba(3, 6, 15, .94);
    border-bottom: 1px solid rgba(255,255,255,.06);
    backdrop-filter: blur(8px);
    -webkit-backdrop-filter: blur(8px);
  }

  .nav {
    gap: 28px;
  }

  .logo {
    min-width: 180px;
    line-height: .95;
    letter-spacing: .04em;
  }

  .logo strong {
    font-size: 36px;
    font-weight: 800;
    letter-spacing: -.03em;
    background: linear-gradient(90deg, #9357ff 0%, #d7def0 82%);
    -webkit-background-clip: text;
    background-clip: text;
    color: transparent;
  }

  .logo span {
    font-size: 11px;
    font-weight: 700;
    letter-spacing: .08em;
    color: #f2f5fc;
  }

  .menu {
    gap: 30px;
  }

  .menu a {
    font-size: 15px;
    font-weight: 600;
    color: rgba(255,255,255,.9);
    letter-spacing: -.01em;
    opacity: 1;
  }

  .menu a:hover,
  .menu a:focus {
    color: #ffffff;
  }

  .menu a.active::after {
    height: 1px;
    bottom: -16px;
    background: rgba(120, 174, 255, .9);
  }

  .whats {
    min-width: 160px;
    min-height: 50px;
    padding: 0 22px;
    border-radius: 10px;
    font-size: 15px;
    font-weight: 700;
    border: 1px solid rgba(25,212,107,.8);
    background: transparent;
    color: #f9fbff;
    box-shadow: none;
  }

  .whats:hover,
  .whats:focus {
    transform: translateY(-1px);
    background: rgba(25,212,107,.04);
    box-shadow: 0 8px 18px rgba(25,212,107,.08);
  }

  .hero-print {
    filter: saturate(.88) contrast(.95) brightness(.97);
  }

  main {
    padding-top: 54px;
    background:
      radial-gradient(circle at 20% 0%, rgba(34,86,170,.07), transparent 24%),
      linear-gradient(180deg, #02050f 0%, #040813 100%);
  }

  main > section {
    padding-top: 42px;
    padding-bottom: 42px;
    scroll-margin-top: 110px;
  }

  .section-title {
    max-width: 760px;
    margin: 0 0 34px;
  }

  .section-title h2,
  .panel h2,
  .final h2 {
    margin: 0 0 14px;
    font-size: clamp(28px, 3.5vw, 44px);
    line-height: 1.12;
    letter-spacing: -.025em;
    font-weight: 700;
    color: #f5f7fb;
  }

  .panel h2 {
    font-size: clamp(26px, 3.2vw, 40px);
  }

  .section-title p,
  .panel p,
  .final p {
    margin: 0;
    color: var(--r2r-text-soft);
    font-size: 16px;
    line-height: 1.72;
    font-weight: 400;
    letter-spacing: 0;
  }

  .grid {
    gap: 18px;
  }

  .cards {
    grid-template-columns: repeat(4, minmax(0, 1fr));
  }

  .card,
  .panel,
  .final {
    background: linear-gradient(180deg, rgba(5,10,24,.98), rgba(4,8,20,.98));
    border: 1px solid var(--r2r-border);
    border-radius: var(--r2r-radius);
    box-shadow: var(--r2r-shadow-soft);
    padding: 28px;
  }

  .card {
    min-height: 210px;
  }

  .card:hover,
  .panel:hover,
  .final:hover {
    border-color: rgba(255,255,255,.11);
    box-shadow: var(--r2r-shadow);
  }

  .icon {
    width: 44px;
    height: 44px;
    border-radius: 12px;
    background: #0a1833;
    border: 1px solid rgba(109,157,255,.18);
    color: #8ab8ff;
    display: grid;
    place-items: center;
    margin-bottom: 18px;
    font-weight: 700;
    box-shadow: none;
  }

  h3 {
    margin: 0 0 12px;
    font-size: 18px;
    line-height: 1.3;
    letter-spacing: -.01em;
    font-weight: 700;
    color: #f5f7fb;
  }

  .card p {
    margin: 0;
    color: var(--r2r-text-soft);
    font-size: 15px;
    line-height: 1.7;
  }

  .split {
    grid-template-columns: 1fr 1fr;
    gap: 20px;
  }

  .checks {
    list-style: none;
    padding: 0;
    margin: 22px 0 24px;
    display: grid;
    gap: 12px;
    color: #eef2fa;
  }

  .checks li {
    font-size: 15px;
    line-height: 1.6;
  }

  .checks li::before {
    content: "✓";
    color: var(--r2r-green);
    font-weight: 700;
    margin-right: 10px;
  }

  .btn {
    min-height: 48px;
    padding: 0 20px;
    border-radius: 10px;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 10px;
    border: 1px solid rgba(255,255,255,.12);
    background: rgba(255,255,255,.025);
    font-size: 15px;
    font-weight: 700;
    color: #ffffff;
    box-shadow: none;
    letter-spacing: -.01em;
    transition: transform .18s ease, border-color .18s ease, background .18s ease;
  }

  .btn:hover,
  .btn:focus {
    transform: translateY(-1px);
    border-color: rgba(255,255,255,.18);
    background: rgba(255,255,255,.04);
    box-shadow: 0 8px 18px rgba(0,0,0,.14);
  }

  .btn-primary {
    border: 1px solid rgba(95,153,255,.36);
    background: linear-gradient(180deg, #4f84ea 0%, #3f73d6 100%);
    color: #ffffff;
  }

  .btn-primary:hover,
  .btn-primary:focus {
    background: linear-gradient(180deg, #578cf1 0%, #4578d9 100%);
  }

  .final {
    margin-top: 6px;
    display: grid;
    grid-template-columns: 1fr auto;
    align-items: center;
    gap: 26px;
    border-radius: 16px;
  }

  footer {
    margin-top: 36px;
    padding: 46px 0 30px;
    background: #02040c;
    border-top: 1px solid rgba(255,255,255,.06);
    color: var(--r2r-text-soft);
  }

  .footer-grid {
    display: grid;
    grid-template-columns: 1.2fr 1fr 1fr;
    gap: 34px;
  }

  footer strong {
    display: block;
    font-size: 30px;
    font-weight: 800;
    letter-spacing: -.025em;
    color: #ffffff;
  }

  footer span,
  footer p,
  footer b {
    color: var(--r2r-text-soft);
  }

  .foot-links {
    display: grid;
    gap: 12px;
    margin-top: 12px;
  }

  .foot-links a {
    color: var(--r2r-text-soft);
    line-height: 1.55;
  }

  .foot-links a:hover {
    color: #ffffff;
  }

  @media (max-width: 1100px) {
    .cards {
      grid-template-columns: repeat(2, minmax(0, 1fr));
    }

    .menu {
      gap: 18px;
    }

    .menu a {
      font-size: 14px;
    }
  }

  @media (max-width: 900px) {
    main {
      padding-top: 42px;
    }

    main > section {
      padding: 34px 0;
    }

    .split,
    .final,
    .footer-grid {
      grid-template-columns: 1fr;
    }

    .final .btn {
      justify-self: start;
    }
  }

  @media (max-width: 768px) {
    .container {
      width: min(100% - 28px, var(--r2r-container));
    }

    .card,
    .panel,
    .final {
      padding: 24px;
    }

    .section-title {
      margin-bottom: 26px;
    }

    .section-title h2,
    .panel h2,
    .final h2 {
      font-size: 32px;
    }
  }

  @media (max-width: 640px) {
    .cards {
      grid-template-columns: 1fr;
    }

    .card,
    .panel,
    .final {
      padding: 22px;
      border-radius: 12px;
    }

    .btn {
      width: 100%;
      max-width: 100%;
      text-align: center;
    }

    .final .btn {
      justify-self: stretch;
    }

    .whats {
      min-width: auto;
      padding: 0 16px;
      font-size: 14px;
    }
  }

  @media (prefers-reduced-motion: reduce) {
    *,
    *::before,
    *::after {
      transition: none !important;
      animation: none !important;
      scroll-behavior: auto !important;
    }
  }
</style>
HTML;

$metaPixelMissing = strpos($html, '1712816106504415') === false;

if (strpos($html, 'G-DHSV67MTDJ') === false) {
    $headAdditions[] = <<<'HTML'
<!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-DHSV67MTDJ"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-DHSV67MTDJ');
</script>
HTML;
}

if (strpos($html, 'google-adsense-account') === false) {
    $headAdditions[] = <<<'HTML'
<!-- Google AdSense account verification -->
<meta name="google-adsense-account" content="ca-pub-4258015992085102">
HTML;
}

if (strpos($html, 'pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-4258015992085102') === false) {
    $headAdditions[] = <<<'HTML'
<!-- Google AdSense -->
<script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-4258015992085102"
     crossorigin="anonymous"></script>
HTML;
}

if ($metaPixelMissing) {
    $headAdditions[] = <<<'HTML'
<!-- Meta Pixel Code -->
<script>
  !function(f,b,e,v,n,t,s)
  {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
  n.callMethod.apply(n,arguments):n.queue.push(arguments)};
  if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
  n.queue=[];t=b.createElement(e);t.async=!0;
  t.src=v;s=b.getElementsByTagName(e)[0];
  s.parentNode.insertBefore(t,s)}(window, document,'script',
  'https://connect.facebook.net/en_US/fbevents.js');
  fbq('init', '1712816106504415');
  fbq('track', 'PageView');
</script>
<!-- End Meta Pixel Code -->
HTML;
}

if ($headAdditions !== []) {
    $trackingHead = "\n\n" . implode("\n\n", $headAdditions) . "\n";
    $headCount = 0;
    $html = preg_replace_callback(
        '/<\/head\s*>/i',
        static function (array $match) use ($trackingHead): string {
            return $trackingHead . $match[0];
        },
        $html,
        1,
        $headCount
    );

    if ($html === null || $headCount !== 1) {
        http_response_code(500);
        header('Content-Type: text/plain; charset=UTF-8');
        echo 'Não foi possível configurar as tags no cabeçalho.';
        exit;
    }
}

if ($metaPixelMissing) {
    $metaPixelNoScript = <<<'HTML'

<!-- Meta Pixel Code (noscript) -->
<noscript><img height="1" width="1" style="display:none"
  src="https://www.facebook.com/tr?id=1712816106504415&ev=PageView&noscript=1"
  alt=""
></noscript>
HTML;

    $bodyCount = 0;
    $html = preg_replace_callback(
        '/<body\b[^>]*>/i',
        static function (array $match) use ($metaPixelNoScript): string {
            return $match[0] . $metaPixelNoScript;
        },
        $html,
        1,
        $bodyCount
    );

    if ($html === null || $bodyCount !== 1) {
        http_response_code(500);
        header('Content-Type: text/plain; charset=UTF-8');
        echo 'Não foi possível configurar o fallback do Meta Pixel.';
        exit;
    }
}

header('Content-Type: text/html; charset=UTF-8');
echo $html;
