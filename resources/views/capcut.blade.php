<!DOCTYPE html>
<html lang="en">
<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Capcut Package</title>

<link rel="stylesheet" href="{{ asset('css/shared.css') }}">
<link rel="stylesheet" href="{{ asset('css/capcut.css') }}">

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
    <img src="{{ asset('images/capcut.png') }}">
    <span>Capcut</span>
  </div>

  <!-- SHARING -->
  <h3>Sharing</h3>
  <div class="paket">
    <div class="card" data-name="Sharing Capcut" data-price="10.000">
      <h4>Sharing</h4><p>Rp.10.000</p>
    </div>
  </div>

  <!-- PRIVATE -->
  <h3>Private</h3>
  <div class="paket">
    <div class="card" data-name="Private Capcut" data-price="23.000">
      <h4>Private</h4><p>Rp.23.000</p>
    </div>
  </div>

</div>
<script src="{{ asset('js/cart.js') }}"></script>
<script src="{{ asset('js/capcut.js') }}"></script>
<script src="{{ asset('js/search.js') }}"></script>
</body>
</html>
