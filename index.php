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
    --r2r-surface: rgba(9, 13, 28, .96);
    --r2r-surface-soft: rgba(255, 255, 255, .035);
    --r2r-border: rgba(255, 255, 255, .10);
    --r2r-text-soft: #c7ccda;
    --r2r-shadow: 0 12px 32px rgba(0, 0, 0, .22);
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
    font-weight: 400;
    letter-spacing: 0;
    line-height: 1.6;
    background: linear-gradient(180deg, #02040c 0%, #050814 56%, #02040c 100%);
  }

  .topbar {
    background: rgba(5, 6, 17, .96);
    border-bottom-color: rgba(255, 255, 255, .08);
    backdrop-filter: blur(10px);
    -webkit-backdrop-filter: blur(10px);
  }

  .logo {
    letter-spacing: .055em;
  }

  .logo strong {
    font-weight: 800;
    letter-spacing: -.035em;
    background: linear-gradient(90deg, #9b4dff 0%, #f2f4f8 76%);
    -webkit-background-clip: text;
    background-clip: text;
  }

  .logo span {
    font-weight: 700;
    letter-spacing: .105em;
  }

  .menu a {
    font-size: 15px;
    font-weight: 600;
    letter-spacing: -.01em;
    opacity: .9;
  }

  .menu a:hover,
  .menu a:focus {
    opacity: 1;
  }

  .menu a.active::after {
    height: 1px;
    background: #6bbcff;
  }

  .whats {
    min-height: 52px;
    border-radius: 10px;
    font-size: 16px;
    font-weight: 700;
    background: transparent;
    box-shadow: none;
  }

  .whats:hover,
  .whats:focus {
    transform: translateY(-1px);
    box-shadow: 0 8px 22px rgba(32, 233, 116, .12);
    background: rgba(32, 233, 116, .045);
  }

  .hero-print {
    filter: saturate(.92) contrast(.97) brightness(.985);
  }

  main {
    padding-top: 60px;
    background: linear-gradient(180deg, #020511 0%, #050814 100%);
  }

  main > section {
    padding-top: 44px;
    padding-bottom: 44px;
  }

  .section-title {
    max-width: 740px;
    margin-bottom: 32px;
  }

  .section-title h2,
  .panel h2,
  .final h2 {
    margin-bottom: 14px;
    font-size: clamp(31px, 4vw, 48px);
    line-height: 1.08;
    letter-spacing: -.025em;
    font-weight: 700;
  }

  .section-title p,
  .panel p,
  .final p {
    color: var(--r2r-text-soft);
    font-size: 16px;
    line-height: 1.72;
    letter-spacing: 0;
  }

  .grid {
    gap: 18px;
  }

  .card,
  .panel,
  .final {
    padding: 28px;
    border-radius: 16px;
    background: var(--r2r-surface);
    border-color: var(--r2r-border);
    box-shadow: var(--r2r-shadow);
  }

  .card:hover,
  .panel:hover {
    border-color: rgba(255, 255, 255, .16);
  }

  .icon {
    width: 44px;
    height: 44px;
    border-radius: 11px;
    margin-bottom: 18px;
    background: #111a34;
    border: 1px solid rgba(107, 188, 255, .22);
    color: #8dcbff;
    font-weight: 700;
  }

  h3 {
    margin-bottom: 10px;
    font-size: 19px;
    line-height: 1.25;
    letter-spacing: -.015em;
    font-weight: 700;
  }

  .card p {
    color: var(--r2r-text-soft);
    font-size: 15px;
    line-height: 1.66;
  }

  .split {
    gap: 20px;
  }

  .checks {
    gap: 11px;
    line-height: 1.55;
  }

  .checks li::before {
    font-weight: 700;
  }

  .btn {
    min-height: 50px;
    padding-inline: 20px;
    border-radius: 10px;
    font-size: 15px;
    font-weight: 700;
    letter-spacing: -.01em;
    background: rgba(255, 255, 255, .04);
    box-shadow: none;
  }

  .btn:hover,
  .btn:focus {
    transform: translateY(-1px);
    box-shadow: 0 8px 22px rgba(0, 0, 0, .16);
  }

  .btn-primary {
    background: linear-gradient(135deg, #7d35d8, #0d79c7);
    box-shadow: none;
  }

  .final {
    border-radius: 18px;
  }

  footer {
    margin-top: 42px;
    padding-top: 48px;
    background: #02040c;
    border-top-color: rgba(255, 255, 255, .08);
  }

  footer strong {
    font-size: 32px;
    font-weight: 800;
    letter-spacing: -.03em;
  }

  .foot-links {
    gap: 12px;
  }

  .foot-links a {
    line-height: 1.5;
  }

  @media (max-width: 900px) {
    main {
      padding-top: 40px;
    }

    main > section {
      padding-top: 34px;
      padding-bottom: 34px;
    }

    .card,
    .panel,
    .final {
      padding: 24px;
    }
  }

  @media (max-width: 640px) {
    main {
      padding-top: 30px;
    }

    main > section {
      padding-top: 28px;
      padding-bottom: 28px;
    }

    .section-title {
      margin-bottom: 26px;
    }

    .section-title h2,
    .panel h2,
    .final h2 {
      font-size: 30px;
      line-height: 1.12;
    }

    .card,
    .panel,
    .final {
      padding: 22px;
      border-radius: 14px;
    }
  }

  @media (prefers-reduced-motion: reduce) {
    *,
    *::before,
    *::after {
      scroll-behavior: auto !important;
      transition: none !important;
      animation: none !important;
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