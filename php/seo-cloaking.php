<?php
/**
 * SEO Cloaking Simulation - Nuclei Lab Target
 *
 * This file deliberately serves different content depending on the User-Agent,
 * simulating common black-hat SEO cloaking techniques.
 *
 * Detection vectors covered by seo-cloaking-detector.yaml:
 *   1. title_mismatch  - different <title> for bot / mobile vs desktop
 *   2. body_size_mismatch - response body > 1000 bytes larger for bot / mobile
 *   3. spam_keywords   - casino, betting, viagra, poker, slots only for bot/mobile
 */

$ua = $_SERVER['HTTP_USER_AGENT'] ?? '';

$is_googlebot = (bool) preg_match('/Googlebot/i', $ua);
$is_mobile    = (bool) preg_match('/iPhone|iPad|Android/i', $ua);

/* ──────────────────────────────────────────────────────────────────────────
 * DESKTOP - conteúdo legítimo exibido para navegadores comuns
 * ────────────────────────────────────────────────────────────────────────── */
if (!$is_googlebot && !$is_mobile) {
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Empresa Legítima - Soluções de TI</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.4/css/bulma.min.css">
</head>
<body>
<section class="hero is-primary">
  <div class="hero-body">
    <h1 class="title">Bem-vindo à Empresa Legítima</h1>
    <p class="subtitle">Soluções completas de TI para o seu negócio</p>
  </div>
</section>

<section class="section">
  <div class="container">
    <h2 class="title is-4">Nossos Serviços</h2>
    <div class="columns">
      <div class="column">
        <div class="box">
          <h3 class="title is-5">Consultoria</h3>
          <p>Análise e planejamento estratégico de TI para sua empresa.</p>
        </div>
      </div>
      <div class="column">
        <div class="box">
          <h3 class="title is-5">Suporte Técnico</h3>
          <p>Atendimento especializado 24/7 para sua infraestrutura.</p>
        </div>
      </div>
      <div class="column">
        <div class="box">
          <h3 class="title is-5">Segurança</h3>
          <p>Proteção completa dos seus dados e sistemas.</p>
        </div>
      </div>
    </div>
  </div>
</section>

<footer class="footer">
  <div class="content has-text-centered">
    <p>© 2025 Empresa Legítima. Todos os direitos reservados.</p>
  </div>
</footer>
</body>
</html>
<?php
/* ──────────────────────────────────────────────────────────────────────────
 * GOOGLEBOT - conteúdo de spam exibido apenas para crawlers do Google
 * Triggers: title_mismatch, body_size_mismatch, spam_keywords
 * ────────────────────────────────────────────────────────────────────────── */
} elseif ($is_googlebot) {
    $spam_block = str_repeat(
        '<p>casino online gratis | betting apostas esportivas | ' .
        'viagra comprar barato | poker texas holdem | slots machines | ' .
        'casino bonus boas-vindas | apostas online betting | ' .
        'melhores slots gratis | poker ao vivo | cassino online seguro</p>' . "\n",
        30 // ~30 repetições para garantir diferença > 1000 bytes
    );
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="utf-8">
  <title>Melhor Casino Online - Slots, Poker e Betting GRATIS!</title>
</head>
<body>
<h1>Bem-vindo ao Melhor Casino Online do Brasil!</h1>
<p>
  Jogue casino, betting, poker e slots com os maiores bônus de boas-vindas!
  Compre viagra e outros medicamentos com desconto incrível!
</p>

<!-- Spam block para diferenciar o tamanho da resposta -->
<div id="spam-content">
<?= $spam_block ?>
</div>

<h2>Links Patrocinados</h2>
<ul>
  <li><a href="#">Casino Royale - Jogue Agora</a></li>
  <li><a href="#">Betting Brasil - Apostas Esportivas</a></li>
  <li><a href="#">Viagra Original - Entrega Rápida</a></li>
  <li><a href="#">Poker Stars - Torneios Online</a></li>
  <li><a href="#">Slots Grátis - Gire e Ganhe</a></li>
</ul>
</body>
</html>
<?php
/* ──────────────────────────────────────────────────────────────────────────
 * MOBILE (iPhone / Android) - variante de spam para dispositivos móveis
 * Triggers: title_mismatch, body_size_mismatch, spam_keywords
 * ────────────────────────────────────────────────────────────────────────── */
} else {
    $mobile_spam = str_repeat(
        '<p>casino mobile | betting app | poker celular | ' .
        'slots android ios | viagra entrega discreta | ' .
        'apostas mobile betting | jackpot casino app | ' .
        'roleta online | blackjack ao vivo | bingo online</p>' . "\n",
        30
    );
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Casino Mobile - Slots e Poker no Celular!</title>
</head>
<body>
<h1>Casino na Palma da Mão!</h1>
<p>
  Jogue slots, poker e betting diretamente do seu celular!
  Baixe nosso app de casino com bônus exclusivo de 500% no primeiro depósito!
</p>

<!-- Spam block móvel para garantir diferença de tamanho > 1000 bytes -->
<div id="mobile-spam">
<?= $mobile_spam ?>
</div>

<h2>Aplicativos Disponíveis</h2>
<ul>
  <li>Casino Gold App - iOS e Android</li>
  <li>Betting Master - Apostas Esportivas</li>
  <li>Poker Plus - Torneios ao Vivo</li>
  <li>Slots Mania - Jackpots Progressivos</li>
</ul>
</body>
</html>
<?php
}
?>
