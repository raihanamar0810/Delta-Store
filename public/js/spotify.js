// ============================================================
// SPOTIFY.JS — Halaman Spotify
// Fetch product ID dari Laravel API, lalu pasang ke setiap card
// ============================================================

var API_BASE = "http://localhost:8000/api";

document.addEventListener("DOMContentLoaded", async function () {

  // ----------------------------------------------------------
  // 1. Inject backdrop transparan untuk deselect card
  // ----------------------------------------------------------
  var backdrop = document.createElement("div");
  backdrop.id  = "productBackdrop";
  backdrop.style.cssText = `
    display: none;
    position: fixed;
    inset: 0;
    background: transparent;
    z-index: 10;
    cursor: default;
  `;
  document.body.appendChild(backdrop);

  // Naikkan z-index header & cart agar tidak tertutup backdrop
  var headerEl = document.querySelector(".header");
  var cartEl   = document.getElementById("cart");
  if (headerEl) headerEl.style.zIndex = "30";
  if (cartEl)   cartEl.style.zIndex   = "30";

  // ----------------------------------------------------------
  // 2. Ambil daftar produk Spotify dari backend, buat map: nama → id
  // ----------------------------------------------------------
  var productIdMap = {};

  try {
    var res  = await fetch(API_BASE + "/products?category=spotify");
    var data = await res.json();
    data.forEach(function (p) {
      productIdMap[p.name] = p.id;
    });
  } catch (e) {
    console.warn("Tidak bisa fetch produk Spotify dari API:", e);
  }

  // ----------------------------------------------------------
  // 3. Sync visual card dengan isi cart
  // ----------------------------------------------------------
  function syncCardStates() {
    var anySelected = false;
    document.querySelectorAll(".card[data-name]").forEach(function (card) {
      if (isInCart(card.dataset.name)) {
        card.classList.add("selected");
        anySelected = true;
      } else {
        card.classList.remove("selected");
      }
    });

    // Tampilkan backdrop hanya jika ada card yang dipilih
    backdrop.style.display = anySelected ? "block" : "none";
  }

  var originalUpdateCartUI = window.updateCartUI;
  window.updateCartUI = function () {
    originalUpdateCartUI();
    syncCardStates();
  };

  // ----------------------------------------------------------
  // 4. Pasang event click pada setiap card
  //    Card harus di atas backdrop (z-index lebih tinggi)
  // ----------------------------------------------------------
  document.querySelectorAll(".card[data-name]").forEach(function (card) {
    card.style.position = "relative";
    card.style.zIndex   = "20";

    card.addEventListener("click", function (e) {
      e.stopPropagation();

      var name      = this.dataset.name;
      var price     = this.dataset.price;
      var productId = productIdMap[name];

      if (!productId) {
        showNotif("⚠️ Produk tidak ditemukan di server, coba refresh.");
        return;
      }

      addToCart(name, price, productId);
    });
  });

  // ----------------------------------------------------------
  // 5. Klik backdrop → hapus semua produk halaman ini dari cart
  // ----------------------------------------------------------
  backdrop.addEventListener("click", function (e) {
    // Jangan batalkan jika yang diklik adalah cart atau header
    if (e.target.closest("#cart") || e.target.closest(".header")) return;

    var cart = getCart();

    // Kumpulkan nama produk di halaman ini
    var namesOnPage = [];
    document.querySelectorAll(".card[data-name]").forEach(function (card) {
      namesOnPage.push(card.dataset.name);
    });

    // Hapus dari cart hanya produk yang ada di halaman ini
    var newCart = cart.filter(function (item) {
      return !namesOnPage.includes(item.name);
    });

    saveCart(newCart);
    updateCartUI();
    backdrop.style.display = "none";
  });

  syncCardStates();

});
