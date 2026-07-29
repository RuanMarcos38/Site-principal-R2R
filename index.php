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
