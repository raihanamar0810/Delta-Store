<!DOCTYPE html>
<html lang="en">
<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Free Fire - Delta Store</title>

<link rel="stylesheet" href="{{ asset("css/shared.css") }}">
<link rel="stylesheet" href="{{ asset("css/ff.css") }}">

<link href="https://fonts.googleapis.com/css2?family=Odor+Mean+Chey&family=Nunito+Sans&family=Londrina+Solid&family=Righteous&family=Utendo&display=swap" rel="stylesheet">

</head>
<body>

<div class="container">

  <!-- CART POPUP -->
  <div class="cart-popup" id="cartPopup">
    <div class="cart-header">
      <h3>Keranjang</h3>
      <span id="closeCart">✕</span>
    </div>
    <div id="cart-items"></div>
    <div class="cart-total">Total: <span id="total-price">Rp0</span></div>
    <div class="cart-section-title">Metode Pembayaran</div>
    <div class="cart-payment" onclick="selectCartPayment('QRIS', this)">
      <img src="{{ asset("images/qris.png") }}"><span>Pembayaran QRIS</span>
    </div>
    <div class="cart-payment" onclick="selectCartPayment('Bank', this)">
      <img src="{{ asset("images/bankjago.png") }}"><span>Pembayaran Bank</span>
    </div>
    <input type="hidden" id="selectedPayment" value="">
    <div class="cart-section-title">No WhatsApp</div>
    <input type="text" id="cartWhatsapp" placeholder="Contoh: 08123456789"
      style="width:100%;padding:10px;border-radius:8px;border:1px solid #ddd;font-size:13px;box-sizing:border-box;margin-bottom:12px;">
    <button id="checkoutBtn">Buat Pesanan</button>
  </div>

  <!-- HEADER -->
  <div class="header">
    <a href="{{ url('/') }}" class="back-btn">←</a>
    <a href="{{ url('/') }}" class="logo">
      <img src="{{ asset("images/logo-intro.png") }}">
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
    <img src="{{ asset("images/ff.png") }}">
    <span>Free Fire</span>
  </div>

  <!-- USER ID FORM -->
  <div class="box user-box">
    <div class="box-title user-title">🎮 Masukan Id Pengguna & Server</div>
    <div class="user-inputs">
      <div class="input-group">
        <label>Id Pengguna</label>
        <input type="text" id="userId" placeholder="Contoh: 23455293">
      </div>
    </div>
    <p class="user-info">
      Untuk Menemukan Id Pengguna anda, Klik avatar anda di pojok kiri atas layar
      dan buka tab info umum ID Pengguna Anda akan ditampilkan di bawah nama
      Panggilan Anda. Silakan Masukan ID Pengguna Lengkap disini misal.
      <strong>23455293 (2456).</strong>
    </p>
  </div>

  <!-- SPECIAL ITEM -->
  <h3>Special Item</h3>
  <div class="paket">
    <div class="card" data-name="Weekly Membership FF" data-price="28.340">
      <div class="card-img"><img src="{{ asset('images/ff-wmm.png') }}" alt="Weekly Membership" class="card-icon"></div>
      <h4>Weekly Membership</h4><p>Rp.28.340</p>
    </div>
    <div class="card" data-name="Monthly Membership FF" data-price="84.278">
      <div class="card-img"><img src="{{ asset('images/ff-wmm.png') }}" alt="Monthly Membership" class="card-icon"></div>
      <h4>Monthly Membership</h4><p>Rp.84.278</p>
    </div>
  </div>

  <!-- DIAMOND -->
  <h3>Diamond</h3>
  <div class="paket">
    <div class="card" data-name="5 Diamond FF" data-price="989"><div class="card-img"><img src="{{ asset("images/diamond.png") }}" class="card-icon"></div><h4>5 Diamond</h4><p>Rp.989</p></div>
    <div class="card" data-name="12 Diamond FF" data-price="1.897"><div class="card-img"><img src="{{ asset("images/diamond.png") }}" class="card-icon"></div><h4>12 Diamond</h4><p>Rp.1.897</p></div>
    <div class="card" data-name="20 Diamond FF" data-price="3.550"><div class="card-img"><img src="{{ asset("images/diamond.png") }}" class="card-icon"></div><h4>20 Diamond</h4><p>Rp.3.550</p></div>
    <div class="card" data-name="30 Diamond FF" data-price="5.189"><div class="card-img"><img src="{{ asset("images/diamond.png") }}" class="card-icon"></div><h4>30 Diamond</h4><p>Rp.5.189</p></div>
    <div class="card" data-name="40 Diamond FF" data-price="6.600"><div class="card-img"><img src="{{ asset("images/diamond.png") }}" class="card-icon"></div><h4>40 Diamond</h4><p>Rp.6.600</p></div>
    <div class="card" data-name="55 Diamond FF" data-price="7.570"><div class="card-img"><img src="{{ asset("images/diamond.png") }}" class="card-icon"></div><h4>55 Diamond</h4><p>Rp.7.570</p></div>
    <div class="card" data-name="60 Diamond FF" data-price="8.407"><div class="card-img"><img src="{{ asset("images/diamond.png") }}" class="card-icon"></div><h4>60 Diamond</h4><p>Rp.8.407</p></div>
    <div class="card" data-name="70 Diamond FF" data-price="9.076"><div class="card-img"><img src="{{ asset("images/diamond.png") }}" class="card-icon"></div><h4>70 Diamond</h4><p>Rp.9.076</p></div>
    <div class="card" data-name="80 Diamond FF" data-price="10.879"><div class="card-img"><img src="{{ asset("images/diamond.png") }}" class="card-icon"></div><h4>80 Diamond</h4><p>Rp.10.879</p></div>
    <div class="card" data-name="90 Diamond FF" data-price="12.389"><div class="card-img"><img src="{{ asset("images/diamond.png") }}" class="card-icon"></div><h4>90 Diamond</h4><p>Rp.12.389</p></div>
    <div class="card" data-name="100 Diamond FF" data-price="12.987"><div class="card-img"><img src="{{ asset("images/diamond.png") }}" class="card-icon"></div><h4>100 Diamond</h4><p>Rp.12.987</p></div>
    <div class="card" data-name="120 Diamond FF" data-price="16.245"><div class="card-img"><img src="{{ asset("images/diamond.png") }}" class="card-icon"></div><h4>120 Diamond</h4><p>Rp.16.245</p></div>
    <div class="card" data-name="130 Diamond FF" data-price="17.245"><div class="card-img"><img src="{{ asset("images/diamond.png") }}" class="card-icon"></div><h4>130 Diamond</h4><p>Rp.17.245</p></div>
    <div class="card" data-name="140 Diamond FF" data-price="18.240"><div class="card-img"><img src="{{ asset("images/diamond.png") }}" class="card-icon"></div><h4>140 Diamond</h4><p>Rp.18.240</p></div>
    <div class="card" data-name="150 Diamond FF" data-price="19.635"><div class="card-img"><img src="{{ asset("images/diamond.png") }}" class="card-icon"></div><h4>150 Diamond</h4><p>Rp.19.635</p></div>
    <div class="card" data-name="170 Diamond FF" data-price="22.078"><div class="card-img"><img src="{{ asset("images/diamond.png") }}" class="card-icon"></div><h4>170 Diamond</h4><p>Rp.22.078</p></div>
    <div class="card" data-name="190 Diamond FF" data-price="24.389"><div class="card-img"><img src="{{ asset("images/diamond.png") }}" class="card-icon"></div><h4>190 Diamond</h4><p>Rp.24.389</p></div>
    <div class="card" data-name="200 Diamond FF" data-price]="25.899"><div class="card-img"><img src="{{ asset("images/diamond.png") }}" class="card-icon"></div><h4>200 Diamond</h4><p>Rp.25.899</p></div>
    <div class="card" data-name="250 Diamond FF" data-price="32.489"><div class="card-img"><img src="{{ asset("images/diamond.png") }}" class="card-icon"></div><h4>250 Diamond</h4><p>Rp.32.489</p></div>
    <div class="card" data-name="260 Diamond FF" data-price="34.389"><div class="card-img"><img src="{{ asset("images/diamond.png") }}" class="card-icon"></div><h4>260 Diamond</h4><p>Rp.34.389</p></div>
    <div class="card" data-name="355 Diamond FF" data-price="44.243"><div class="card-img"><img src="{{ asset("images/diamond.png") }}" class="card-icon"></div><h4>355 Diamond</h4><p>Rp.44.243</p></div>
    <div class="card" data-name="360 Diamond FF" data-price="45.089"><div class="card-img"><img src="{{ asset("images/diamond.png") }}" class="card-icon"></div><h4>360 Diamond</h4><p>Rp.45.089</p></div>
    <div class="card" data-name="375 Diamond FF" data-price="47.590"><div class="card-img"><img src="{{ asset("images/diamond.png") }}" class="card-icon"></div><h4>375 Diamond</h4><p>Rp.47.590</p></div>
    <div class="card" data-name="405 Diamond FF" data-price="50.906"><div class="card-img"><img src="{{ asset("images/diamond.png") }}" class="card-icon"></div><h4>405 Diamond</h4><p>Rp.50.906</p></div>
    <div class="card" data-name="425 Diamond FF" data-price="52.998"><div class="card-img"><img src="{{ asset("images/diamond.png") }}" class="card-icon"></div><h4>425 Diamond</h4><p>Rp.52.998</p></div>
    <div class="card" data-name="455 Diamond FF" data-price="57.000"><div class="card-img"><img src="{{ asset("images/diamond.png") }}" class="card-icon"></div><h4>455 Diamond</h4><p>Rp.57.000</p></div>
    <div class="card" data-name="495 Diamond FF" data-price="61.765"><div class="card-img"><img src="{{ asset("images/diamond.png") }}" class="card-icon"></div><h4>495 Diamond</h4><p>Rp.61.765</p></div>
    <div class="card" data-name="510 Diamond FF" data-price="63.467"><div class="card-img"><img src="{{ asset("images/diamond.png") }}" class="card-icon"></div><h4>510 Diamond</h4><p>Rp.63.467</p></div>
    <div class="card" data-name="515 Diamond FF" data-price="64.897"><div class="card-img"><img src="{{ asset("images/diamond.png") }}" class="card-icon"></div><h4>515 Diamond</h4><p>Rp.64.897</p></div>
    <div class="card" data-name="545 Diamond FF" data-price="68.498"><div class="card-img"><img src="{{ asset("images/diamond.png") }}" class="card-icon"></div><h4>545 Diamond</h4><p>Rp.68.498</p></div>
    <div class="card" data-name="600 Diamond FF" data-price="75.290"><div class="card-img"><img src="{{ asset("images/diamond.png") }}" class="card-icon"></div><h4>600 Diamond</h4><p>Rp.75.290</p></div>
    <div class="card" data-name="635 Diamond FF" data-price="79.488"><div class="card-img"><img src="{{ asset("images/diamond.png") }}" class="card-icon"></div><h4>635 Diamond</h4><p>Rp.79.488</p></div>
    <div class="card" data-name="720 Diamond FF" data-price="87.356"><div class="card-img"><img src="{{ asset("images/diamond.png") }}" class="card-icon"></div><h4>720 Diamond</h4><p>Rp.87.356</p></div>
    <div class="card" data-name="740 Diamond FF" data-price="92.278"><div class="card-img"><img src="{{ asset("images/diamond.png") }}" class="card-icon"></div><h4>740 Diamond</h4><p>Rp.92.278</p></div>
    <div class="card" data-name="770 Diamond FF" data-price="94.589"><div class="card-img"><img src="{{ asset("images/diamond.png") }}" class="card-icon"></div><h4>770 Diamond</h4><p>Rp.94.589</p></div>
    <div class="card" data-name="790 Diamond FF" data-price="99.000"><div class="card-img"><img src="{{ asset("images/diamond.png") }}" class="card-icon"></div><h4>790 Diamond</h4><p>Rp.99.000</p></div>
    <div class="card" data-name="860 Diamond FF" data-price="105.128"><div class="card-img"><img src="{{ asset("images/diamond.png") }}" class="card-icon"></div><h4>860 Diamond</h4><p>Rp.105.128</p></div>
    <div class="card" data-name="930 Diamond FF" data-price="118.578"><div class="card-img"><img src="{{ asset("images/diamond.png") }}" class="card-icon"></div><h4>930 Diamond</h4><p>Rp.118.578</p></div>
    <div class="card" data-name="1050 Diamond FF" data-price="129.589"><div class="card-img"><img src="{{ asset("images/diamond.png") }}" class="card-icon"></div><h4>1050 Diamond</h4><p>Rp.129.589</p></div>
    <div class="card" data-name="1075 Diamond FF" data-price="136.487"><div class="card-img"><img src="{{ asset("images/diamond.png") }}" class="card-icon"></div><h4>1075 Diamond</h4><p>Rp.136.487</p></div>
    <div class="card" data-name="1200 Diamond FF" data-price="144.478"><div class="card-img"><img src="{{ asset("images/diamond.png") }}" class="card-icon"></div><h4>1200 Diamond</h4><p>Rp.144.478</p></div>
    <div class="card" data-name="1220 Diamond FF" data-price="301.721"><div class="card-img"><img src="{{ asset("images/diamond.png") }}" class="card-icon"></div><h4>1220 Diamond</h4><p>Rp.301.721</p></div>
    <div class="card" data-name="1440 Diamond FF" data-price="178.578"><div class="card-img"><img src="{{ asset("images/diamond.png") }}" class="card-icon"></div><h4>1440 Diamond</h4><p>Rp.178.578</p></div>
    <div class="card" data-name="2140 Diamond FF" data-price="265.000"><div class="card-img"><img src="{{ asset("images/diamond.png") }}" class="card-icon"></div><h4>2140 Diamond</h4><p>Rp.265.000</p></div>
    <div class="card" data-name="2720 Diamond FF" data-price="339.000"><div class="card-img"><img src="{{ asset("images/diamond.png") }}" class="card-icon"></div><h4>2720 Diamond</h4><p>Rp.339.000</p></div>
    <div class="card" data-name="3640 Diamond FF" data-price="439.356"><div class="card-img"><img src="{{ asset("images/diamond.png") }}" class="card-icon"></div><h4>3640 Diamond</h4><p>Rp.439.356</p></div>
    <div class="card" data-name="4000 Diamond FF" data-price="486.980"><div class="card-img"><img src="{{ asset("images/diamond.png") }}" class="card-icon"></div><h4>4000 Diamond</h4><p>Rp.486.980</p></div>
    <div class="card" data-name="7290 Diamond FF" data-price="893.255"><div class="card-img"><img src="{{ asset("images/diamond.png") }}" class="card-icon"></div><h4>7290 Diamond</h4><p>Rp.893.255</p></div>
    <div class="card" data-name="73100 Diamond FF" data-price="8.200.000"><div class="card-img"><img src="{{ asset("images/diamond.png") }}" class="card-icon"></div><h4>73100 Diamond</h4><p>Rp.8.200.000</p></div>
  </div>

</div>

<script src="{{ asset("js/cart.js") }}"></script>
<script src="{{ asset("js/ff.js") }}"></script>
<script src="{{ asset("js/search.js") }}"></script>

</body>
</html>
