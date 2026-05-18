// ============================================================
// DELTA STORE - SEARCH.JS (dipakai di semua halaman)
// ============================================================

// =======================
// DATA SEMUA PRODUK
// =======================

const allProducts = [

  // NETFLIX
  { name: "1u1p Netflix",               price: "27.000",     url: "/netflix" },
  { name: "1u2p Netflix",               price: "17.000",     url: "/netflix" },
  { name: "Private Netflix 720p",       price: "125.000",    url: "/netflix" },

  // SPOTIFY
  { name: "Family Plan Spotify",        price: "5.000",      url: "/spotify" },
  { name: "Famhead Plan Spotify",       price: "11.000",     url: "/spotify" },

  // CAPCUT
  { name: "Sharing Capcut",             price: "10.000",     url: "/capcut" },
  { name: "Private Capcut",             price: "23.000",     url: "/capcut" },

  // ALIGHT MOTION
  { name: "Sharing Alight Motion",      price: "10.000",     url: "/alight" },
  { name: "Private Alight Motion",      price: "23.000",     url: "/alight" },

  // YOUTUBE
  { name: "Family Plan Youtube",        price: "5.000",      url: "/youtube" },
  { name: "Famhead Plan Youtube",       price: "11.000",     url: "/youtube" },

  // TIKTOK - FOLLOWERS
  { name: "100 Followers TikTok",       price: "8.000",      url: "/tiktok" },
  { name: "200 Followers TikTok",       price: "16.000",     url: "/tiktok" },
  { name: "300 Followers TikTok",       price: "22.000",     url: "/tiktok" },
  { name: "400 Followers TikTok",       price: "28.000",     url: "/tiktok" },
  { name: "500 Followers TikTok",       price: "34.000",     url: "/tiktok" },
  { name: "1000 Followers TikTok",      price: "60.000",     url: "/tiktok" },

  // TIKTOK - LIKE
  { name: "100 Like TikTok",            price: "1.000",      url: "/tiktok" },
  { name: "200 Like TikTok",            price: "1.500",      url: "/tiktok" },
  { name: "300 Like TikTok",            price: "2.000",      url: "/tiktok" },
  { name: "400 Like TikTok",            price: "2.500",      url: "/tiktok" },
  { name: "500 Like TikTok",            price: "3.000",      url: "/tiktok" },
  { name: "1000 Like TikTok",           price: "3.500",      url: "/tiktok" },

  // TIKTOK - VIEW
  { name: "1000 View TikTok",           price: "2.100",      url: "/tiktok" },
  { name: "2000 View TikTok",           price: "3.500",      url: "/tiktok" },
  { name: "3000 View TikTok",           price: "5.200",      url: "/tiktok" },
  { name: "4000 View TikTok",           price: "6.600",      url: "/tiktok" },
  { name: "5000 View TikTok",           price: "8.200",      url: "/tiktok" },

  // MOBILE LEGENDS - SPECIAL ITEM
  { name: "Weekly Day Pass ML",         price: "27.500",     url: "/ml" },
  { name: "Weekly Day Pass x2 ML",      price: "55.000",     url: "/ml" },
  { name: "Weekly Day Pass x3 ML",      price: "82.500",     url: "/ml" },
  { name: "Weekly Day Pass x4 ML",      price: "110.000",    url: "/ml" },
  { name: "Weekly Day Pass x5 ML",      price: "137.500",    url: "/ml" },
  { name: "Starlight Basic ML",         price: "37.000",     url: "/ml" },
  { name: "Starlight Premium ML",       price: "76.000",     url: "/ml" },

  // MOBILE LEGENDS - PROMO
  { name: "88 Diamond ML",              price: "23.409",     url: "/ml" },
  { name: "100 Diamond ML",             price: "25.546",     url: "/ml" },
  { name: "518 Diamond ML",             price: "132.276",    url: "/ml" },

  // MOBILE LEGENDS - DIAMOND
  { name: "5 Diamond ML",               price: "1.581",      url: "/ml" },
  { name: "12 Diamond ML",              price: "3.526",      url: "/ml" },
  { name: "19 Diamond ML",              price: "5.000",      url: "/ml" },
  { name: "22 Diamond ML",              price: "5.760",      url: "/ml" },
  { name: "28 Diamond ML",              price: "7.234",      url: "/ml" },
  { name: "33 Diamond ML",              price: "9.243",      url: "/ml" },
  { name: "74 Diamond ML",              price: "19.000",     url: "/ml" },
  { name: "86 Diamond ML",              price: "21.378",     url: "/ml" },
  { name: "110 Diamond ML",             price: "28.789",     url: "/ml" },
  { name: "130 Diamond ML",             price: "17.245",     url: "/ml" },
  { name: "140 Diamond ML",             price: "18.240",     url: "/ml" },
  { name: "150 Diamond ML",             price: "19.635",     url: "/ml" },
  { name: "153 Diamond ML",             price: "39.796",     url: "/ml" },
  { name: "167 Diamond ML",             price: "43.432",     url: "/ml" },
  { name: "170 Diamond ML",             price: "22.078",     url: "/ml" },
  { name: "172 Diamond ML",             price: "44.390",     url: "/ml" },
  { name: "190 Diamond ML",             price: "24.389",     url: "/ml" },
  { name: "200 Diamond ML",             price: "25.899",     url: "/ml" },
  { name: "250 Diamond ML",             price: "32.489",     url: "/ml" },
  { name: "260 Diamond ML",             price: "34.389",     url: "/ml" },
  { name: "284 Diamond ML",             price: "73.578",     url: "/ml" },
  { name: "305 Diamond ML",             price: "79.189",     url: "/ml" },
  { name: "344 Diamond ML",             price: "88.375",     url: "/ml" },
  { name: "355 Diamond ML",             price: "44.243",     url: "/ml" },
  { name: "360 Diamond ML",             price: "45.089",     url: "/ml" },
  { name: "375 Diamond ML",             price: "47.590",     url: "/ml" },
  { name: "405 Diamond ML",             price: "50.906",     url: "/ml" },
  { name: "425 Diamond ML",             price: "52.998",     url: "/ml" },
  { name: "455 Diamond ML",             price: "57.000",     url: "/ml" },
  { name: "495 Diamond ML",             price: "61.765",     url: "/ml" },
  { name: "510 Diamond ML",             price: "63.467",     url: "/ml" },
  { name: "515 Diamond ML",             price: "64.897",     url: "/ml" },
  { name: "545 Diamond ML",             price: "68.498",     url: "/ml" },
  { name: "568 Diamond ML",             price: "152.358",    url: "/ml" },
  { name: "600 Diamond ML",             price: "75.290",     url: "/ml" },
  { name: "635 Diamond ML",             price: "79.488",     url: "/ml" },
  { name: "706 Diamond ML",             price: "175.590",    url: "/ml" },
  { name: "720 Diamond ML",             price: "87.356",     url: "/ml" },
  { name: "738 Diamond ML",             price: "185.804",    url: "/ml" },
  { name: "740 Diamond ML",             price: "92.278",     url: "/ml" },
  { name: "770 Diamond ML",             price: "94.589",     url: "/ml" },
  { name: "790 Diamond ML",             price: "99.000",     url: "/ml" },
  { name: "860 Diamond ML",             price: "105.128",    url: "/ml" },
  { name: "930 Diamond ML",             price: "118.578",    url: "/ml" },
  { name: "1050 Diamond ML",            price: "258.590",    url: "/ml" },
  { name: "1075 Diamond ML",            price: "136.487",    url: "/ml" },
  { name: "1159 Diamond ML",            price: "286.876",    url: "/ml" },
  { name: "1200 Diamond ML",            price: "144.478",    url: "/ml" },
  { name: "1220 Diamond ML",            price: "301.721",    url: "/ml" },
  { name: "1440 Diamond ML",            price: "178.578",    url: "/ml" },
  { name: "2140 Diamond ML",            price: "265.000",    url: "/ml" },
  { name: "2380 Diamond ML",            price: "564.890",    url: "/ml" },
  { name: "2720 Diamond ML",            price: "339.000",    url: "/ml" },
  { name: "3640 Diamond ML",            price: "439.356",    url: "/ml" },
  { name: "3688 Diamond ML",            price: "887.409",    url: "/ml" },
  { name: "4000 Diamond ML",            price: "486.980",    url: "/ml" },
  { name: "4830 Diamond ML",            price: "1.140.567",  url: "/ml" },
  { name: "7290 Diamond ML",            price: "893.255",    url: "/ml" },
  { name: "7502 Diamond ML",            price: "1.772.009",  url: "/ml" },
  { name: "8040 Diamond ML",            price: "1.883.984",  url: "/ml" },
  { name: "8850 Diamond ML",            price: "2.074.769",  url: "/ml" },
  { name: "16080 Diamond ML",           price: "3.762.615",  url: "/ml" },
  { name: "20100 Diamond ML",           price: "4.702.717",  url: "/ml" },
  { name: "27864 Diamond ML",           price: "6.535.092",  url: "/ml" },
  { name: "73100 Diamond ML",           price: "8.200.000",  url: "/ml" },

  // FREE FIRE - SPECIAL ITEM
  { name: "Weekly Membership FF",       price: "28.340",     url: "/ff" },
  { name: "Monthly Membership FF",      price: "84.278",     url: "/ff" },

  // FREE FIRE - DIAMOND
  { name: "5 Diamond FF",               price: "989",        url: "/ff" },
  { name: "12 Diamond FF",              price: "1.897",      url: "/ff" },
  { name: "20 Diamond FF",              price: "3.550",      url: "/ff" },
  { name: "30 Diamond FF",              price: "5.189",      url: "/ff" },
  { name: "40 Diamond FF",              price: "6.600",      url: "/ff" },
  { name: "55 Diamond FF",              price: "7.570",      url: "/ff" },
  { name: "60 Diamond FF",              price: "8.407",      url: "/ff" },
  { name: "70 Diamond FF",              price: "9.076",      url: "/ff" },
  { name: "80 Diamond FF",              price: "10.879",     url: "/ff" },
  { name: "90 Diamond FF",              price: "12.389",     url: "/ff" },
  { name: "100 Diamond FF",             price: "12.987",     url: "/ff" },
  { name: "120 Diamond FF",             price: "16.245",     url: "/ff" },
  { name: "130 Diamond FF",             price: "17.245",     url: "/ff" },
  { name: "140 Diamond FF",             price: "18.240",     url: "/ff" },
  { name: "150 Diamond FF",             price: "19.635",     url: "/ff" },
  { name: "170 Diamond FF",             price: "22.078",     url: "/ff" },
  { name: "190 Diamond FF",             price: "24.389",     url: "/ff" },
  { name: "200 Diamond FF",             price: "25.899",     url: "/ff" },
  { name: "250 Diamond FF",             price: "32.489",     url: "/ff" },
  { name: "260 Diamond FF",             price: "34.389",     url: "/ff" },
  { name: "355 Diamond FF",             price: "44.243",     url: "/ff" },
  { name: "360 Diamond FF",             price: "45.089",     url: "/ff" },
  { name: "375 Diamond FF",             price: "47.590",     url: "/ff" },
  { name: "405 Diamond FF",             price: "50.906",     url: "/ff" },
  { name: "425 Diamond FF",             price: "52.998",     url: "/ff" },
  { name: "455 Diamond FF",             price: "57.000",     url: "/ff" },
  { name: "495 Diamond FF",             price: "61.765",     url: "/ff" },
  { name: "510 Diamond FF",             price: "63.467",     url: "/ff" },
  { name: "515 Diamond FF",             price: "64.897",     url: "/ff" },
  { name: "545 Diamond FF",             price: "68.498",     url: "/ff" },
  { name: "600 Diamond FF",             price: "75.290",     url: "/ff" },
  { name: "635 Diamond FF",             price: "79.488",     url: "/ff" },
  { name: "720 Diamond FF",             price: "87.356",     url: "/ff" },
  { name: "740 Diamond FF",             price: "92.278",     url: "/ff" },
  { name: "770 Diamond FF",             price: "94.589",     url: "/ff" },
  { name: "790 Diamond FF",             price: "99.000",     url: "/ff" },
  { name: "860 Diamond FF",             price: "105.128",    url: "/ff" },
  { name: "930 Diamond FF",             price: "118.578",    url: "/ff" },
  { name: "1050 Diamond FF",            price: "129.589",    url: "/ff" },
  { name: "1075 Diamond FF",            price: "136.487",    url: "/ff" },
  { name: "1200 Diamond FF",            price: "144.478",    url: "/ff" },
  { name: "1220 Diamond FF",            price: "301.721",    url: "/ff" },
  { name: "1440 Diamond FF",            price: "178.578",    url: "/ff" },
  { name: "2140 Diamond FF",            price: "265.000",    url: "/ff" },
  { name: "2720 Diamond FF",            price: "339.000",    url: "/ff" },
  { name: "3640 Diamond FF",            price: "439.356",    url: "/ff" },
  { name: "4000 Diamond FF",            price: "486.980",    url: "/ff" },
  { name: "7290 Diamond FF",            price: "893.255",    url: "/ff" },
  { name: "73100 Diamond FF",           price: "8.200.000",  url: "/ff" },

];

// =======================
// GLOBAL SEARCH
// =======================

document.addEventListener("DOMContentLoaded", function () {

  const searchBar  = document.getElementById("searchBar");
  const clearBtn   = document.getElementById("clearSearch");
  const resultsBox = document.getElementById("searchResults");
  const apps       = document.querySelectorAll("#appList .card"); // hanya ada di index

  if (!searchBar) return; // stop jika halaman tidak punya search bar

  searchBar.addEventListener("keyup", function () {
    const keyword = searchBar.value.toLowerCase().trim();
    clearBtn.style.display = keyword !== "" ? "block" : "none";

    // Filter card app (khusus halaman index)
    apps.forEach(function (app) {
      app.style.display = app.textContent.toLowerCase().includes(keyword) ? "flex" : "none";
    });

    if (keyword === "") {
      resultsBox.style.display = "none";
      return;
    }

    const filtered = allProducts.filter(p => p.name.toLowerCase().includes(keyword));
    resultsBox.innerHTML = "";

    if (filtered.length === 0) {
      resultsBox.innerHTML = `
        <div style="padding:12px;font-size:13px;color:#999;text-align:center;">
          Produk tidak ditemukan
        </div>`;
    } else {
      filtered.forEach(product => {
        const highlighted = product.name.replace(new RegExp(keyword, "gi"),
          match => `<span style="color:#ff4444;font-weight:bold;">${match}</span>`);
        const inCart = isInCart(product.name);
        resultsBox.innerHTML += `
          <div style="display:flex;align-items:center;padding:10px 14px;font-size:13px;border-bottom:1px solid #eee;">
          <a href="${product.url}" style="flex:1;text-decoration:none;color:#333;">${highlighted}</a>
          </div>`;
      });
    }

    resultsBox.style.display = "block";
  });

  clearBtn.addEventListener("click", function () {
    searchBar.value = "";
    clearBtn.style.display = "none";
    resultsBox.style.display = "none";
    apps.forEach(app => app.style.display = "flex");
  });

  document.addEventListener("click", function (e) {
    if (!e.target.closest(".search-box")) resultsBox.style.display = "none";
  });

});

// =======================
// TOGGLE CART DARI SEARCH
// =======================

function toggleCartFromSearch(name, price, btn) {
  const cart = getCart();
  const idx  = cart.findIndex(item => item.name === name);
  if (idx !== -1) {
    cart.splice(idx, 1);
    saveCart(cart);
    btn.style.background = "#576A8F";
    btn.textContent = "+";
    btn.closest("div").style.background = "white";
    showNotif("❌ " + name + " dihapus dari cart");
  } else {
    cart.push({ name, price });
    saveCart(cart);
    btn.style.background = "#ff4444";
    btn.textContent = "✕";
    btn.closest("div").style.background = "#f0f7ff";
    showNotif("✅ " + name + " ditambahkan ke cart", "success");
  }
  updateCartUI();
}
