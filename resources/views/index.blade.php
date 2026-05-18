<!DOCTYPE html>
<html lang="en">
<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Delta Store</title>

<link href="https://fonts.googleapis.com/css2?family=Odor+Mean+Chey&family=Nunito+Sans&family=Madimi+One&family=Mouse+Memoirs&display=swap" rel="stylesheet">

<link rel="stylesheet" href="{{ asset('/css/style.css') }}">

</head>
<body>

<!-- LOADING SCREEN -->
<div id="loading-screen">
  <img src="{{ asset('/images/logo-intro.png') }}" class="loading-logo">
</div>

<div class="container">

  <!-- HEADER -->
  <div class="header">

    <div class="logo">
      <img src="{{ asset('/images/logo-intro.png') }}">
      <span>Delta Store</span>
    </div>

    <div class="search-cart">

      <div class="search-box">
        <input type="text" id="searchBar" placeholder="Cari...">
        <span class="clear-btn" id="clearSearch">✕</span>
        <div id="searchResults"></div>
      </div>

      <div class="cart" id="cart">
        🛒 <span id="cart-count">0</span>
      </div>

    </div>

  </div>

  <!-- APLIKASI PREMIUM -->
  <div class="section-title">Aplikasi Premium</div>

  <div class="premium-grid" id="appList">

    <div class="card netflix">
      <a href="{{ url('/netflix') }}" class="app-card">
        <img src="{{ asset('/images/netflix.png') }}">
        <span>Netflix</span>
      </a>
    </div>

    <div class="card spotify">
      <a href="{{ url('/spotify') }}" class="app-card">
        <img src="{{ asset('/images/spotify.png') }}">
        <span>Spotify</span>
      </a>
    </div>

    <div class="card capcut">
      <a href="{{ url('/capcut') }}" class="app-card">
        <img src="{{ asset('/images/capcut.png') }}">
        <span>Capcut</span>
      </a>
    </div>

    <div class="card alight">
      <a href="{{ url('/alight') }}" class="alight-icon">
        <img src="{{ asset('/images/alight.png') }}">
        <span>Alightmotion</span>
      </a>
    </div>

    <div class="card youtube">
      <a href="{{ url('/youtube') }}" class="app-card">
        <img src="{{ asset('/images/youtube.png') }}">
        <span>Youtube</span>
      </a>
    </div>

    <div class="card tiktok">
      <a href="{{ url('/tiktok') }}" class="app-card">
        <img src="{{ asset('/images/tiktok.png') }}">
        <span>Tiktok</span>
      </a>
    </div>

  </div>

  <!-- TOP UP GAMES -->
  <div class="section-title">Top up Games</div>

  <div class="game-grid">

    <a href="{{ url('/ml') }}" class="game-card blue">
      <img src="{{ asset('/images/ml.png') }}">
      <span>Mobile Legends</span>
    </a>

    <a href="{{ url('/ff') }}" class="game-card red">
      <img src="{{ asset('/images/ff.png') }}">
      <span>Free Fire</span>
    </a>

  </div>

  <!-- SOSIAL MEDIA -->
  <div class="section-title">Sosial Media</div>

  <div class="social-grid">

    <a href="https://www.instagram.com/delta.pointgamers/" target="_blank" class="social-card instagram">
      <img src="{{ asset('/images/instagram.png') }}">
      <span>Instagram</span>
    </a>

    <a href="https://www.tiktok.com/@deltapoint.gamers" target="_blank" class="social-card tiktok">
      <img src="{{ asset('/images/tiktok.png') }}">
      <span>Tiktok</span>
    </a>

    <a href="{{ url('/payment') }}" class="social-card whatsapp">
      <img src="{{ asset('/images/wa.png') }}">
      <span>WhatsApp</span>
    </a>

  </div>

</div>

<script src="{{ asset('/js/cart.js') }}"></script>
<script src="{{ asset('/js/index.js') }}"></script>
<script src="{{ asset('/js/search.js') }}"></script>

</body>
</html>
