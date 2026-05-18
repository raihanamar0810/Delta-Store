<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>YouTube Package</title>
<link rel="stylesheet" href="{{ asset('css/shared.css') }}">
<link rel="stylesheet" href="{{ asset('css/youtube.css') }}">
<link href="https://fonts.googleapis.com/css2?family=Odor+Mean+Chey&family=Nunito+Sans&family=Quando&family=Odibee+Sans&family=Righteous&display=swap" rel="stylesheet">
</head>
<body>
<div class="container">
  <!-- HEADER -->
  <div class="header">
    <a href="{{ url('/') }}" class="back-btn">←</a>
    <a href="{{ url('/') }}" class="logo">
      <img src="{{ asset('images/logo-intro.png') }}">
      <span>Delta Store</span>
    </a>
    <div class="search-cart">
      <div class="search-box">
        <input type="text" id="searchBar" placeholder="Cari...">
        <span class="clear-btn" id="clearSearch">✕</span>
        <div id="searchResults"></div>
      </div>
      <div class="cart" id="cart">🛒 <span id="cart-count">0</span></div>
    </div>
  </div>
  <!-- APP TITLE -->
  <div class="app-title">
    <img src="{{ asset('images/youtube.png') }}">
    <span>YouTube</span>
  </div>
  <!-- SHARING -->
  <h3>Sharing</h3>
  <div class="paket">
    <div class="card" data-name="Family Plan Youtube" data-price="5.000">
      <h4>Family Plan</h4><p>Rp.5.000</p>
    </div>
    <div class="card" data-name="Famhead Plan Youtube" data-price="11.000">
      <h4>Famhead Plan</h4><p>Rp.11.000</p>
    </div>
  </div>
</div>
<script src="{{ asset('js/cart.js') }}"></script>
<script src="{{ asset('js/youtube.js') }}"></script>
<script src="{{ asset('js/search.js') }}"></script>
</body>
</html>
