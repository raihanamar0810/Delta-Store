(function () {

  // ============================================================
  // URL backend Laravel — ganti jika sudah di-hosting
  // ============================================================
  var API_BASE = "http://localhost:8000/api";

  // ============================================================
  // INJECT HTML POPUP KERANJANG
  // ============================================================
  function injectCartHTML() {
    if (document.getElementById("cartPopup")) return;

    const cartHTML = `
      <div class="cart-backdrop" id="cartBackdrop"></div>
      <div class="cart-popup" id="cartPopup">
        <div class="cart-header">
          <h3>Keranjang</h3>
          <span id="closeCart">✕</span>
        </div>
        <div id="cart-items"></div>
        <div class="cart-total">
          Total: <span id="total-price">Rp0</span>
        </div>
        <div class="cart-section-title">Metode Pembayaran</div>
        <div class="cart-payment" id="cartPaymentQRIS" onclick="selectCartPayment('QRIS', this)">
          <img src="/images/qris.png" alt="QRIS">
          <span>Pembayaran QRIS</span>
        </div>
        <div class="cart-payment" id="cartPaymentBank" onclick="selectCartPayment('Bank', this)">
          <img src="/images/bankjago.png" alt="Bank Jago">
          <span>Pembayaran Bank</span>
        </div>
        <input type="hidden" id="selectedPayment" value="">
        <div class="cart-section-title">No WhatsApp</div>
        <input
          type="text"
          id="cartWhatsapp"
          placeholder="Contoh: 08123456789"
          style="width:100%;padding:10px;border-radius:8px;border:1px solid rgba(255,255,255,0.4);background:rgba(255,255,255,0.9);font-size:13px;box-sizing:border-box;margin-bottom:12px;"
        >
        <button id="checkoutBtn">Buat Pesanan</button>
      </div>
    `;

    const container = document.querySelector(".container") || document.body;
    container.insertAdjacentHTML("afterbegin", cartHTML);
  }

  // ============================================================
  // INJECT CSS KERANJANG
  // ============================================================
  function injectCartCSS() {
    if (document.getElementById("cart-shared-style")) return;

    const style = document.createElement("style");
    style.id = "cart-shared-style";
    style.textContent = `
      .cart-backdrop {
        display: none;
        position: fixed;
        inset: 0;
        background: transparent;
        z-index: 9997;
        cursor: default;
      }
      .cart-popup {
        display: none;
        position: fixed;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        background: linear-gradient(180deg, #4fa3b1, #ff6f61);
        padding: 20px;
        border-radius: 14px;
        width: 300px;
        max-width: 90vw;
        max-height: 85vh;
        overflow-y: auto;
        box-shadow: 0 15px 40px rgba(0,0,0,0.4);
        z-index: 9998;
      }
      .cart-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 15px;
      }
      .cart-header h3 { margin: 0; font-size: 18px; color: white; }
      #closeCart { cursor: pointer; font-size: 18px; color: white; }
      .cart-total {
        margin-top: 10px;
        font-weight: bold;
        font-size: 14px;
        border-top: 2px solid rgba(255,255,255,0.3);
        padding-top: 10px;
        color: white;
      }
      .cart-section-title {
        font-size: 13px;
        font-weight: bold;
        color: white;
        margin: 14px 0 8px;
        font-family: 'Madimi One', sans-serif;
      }
      .cart-payment {
        display: flex !important;
        align-items: center !important;
        gap: 10px !important;
        padding: 10px 12px !important;
        border-radius: 10px !important;
        background: #f5f0e8 !important;
        margin-bottom: 8px !important;
        cursor: pointer !important;
        transition: all 0.2s ease !important;
        border: 2px solid transparent !important;
      }
      .cart-payment img { width: 50px; height: auto; object-fit: contain; }
      .cart-payment span { font-size: 13px; color: #333; }
      .cart-payment.selected {
        border: 2px solid #576A8F !important;
        box-shadow: 0 0 10px rgba(74,144,217,0.35) !important;
      }
      #checkoutBtn {
        margin-top: 12px;
        width: 100%;
        padding: 12px;
        border: none;
        border-radius: 10px;
        background: white;
        color: #576A8F;
        cursor: pointer;
        font-size: 14px;
        font-weight: bold;
        font-family: 'Madimi One', sans-serif;
      }
      #checkoutBtn:hover { background: #f0f0f0; }
      #checkoutBtn:disabled { opacity: 0.6; cursor: not-allowed; }
      #cart-count {
        position: absolute;
        top: -6px;
        right: -8px;
        background: red;
        color: white;
        font-size: 10px;
        width: 16px;
        height: 16px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
      }
      .cart-item {
        display: flex;
        flex-direction: column;
        padding: 10px 0;
        border-bottom: 1px solid rgba(255,255,255,0.3);
        gap: 6px;
      }
      .cart-item-top {
        display: flex;
        justify-content: space-between;
        align-items: center;
      }
      .cart-item-name {
        flex: 1;
        color: #fff;
        font-size: 13px;
        font-weight: bold;
      }
      .cart-item-price {
        color: #fff;
        font-size: 13px;
        font-weight: bold;
        margin-right: 8px;
      }
      .cart-item-remove {
        cursor: pointer;
        color: #ffcccc;
        font-size: 15px;
        line-height: 1;
      }
      .cart-item-bottom {
        display: flex;
        align-items: center;
        justify-content: space-between;
      }
      .cart-item-subtotal {
        font-size: 12px;
        color: rgba(255,255,255,0.75);
      }
      .qty-control {
        display: flex;
        align-items: center;
        background: rgba(255,255,255,0.2);
        border-radius: 20px;
        overflow: hidden;
      }
      .qty-btn {
        width: 28px;
        height: 28px;
        border: none;
        background: rgba(255,255,255,0.3);
        color: white;
        font-size: 16px;
        font-weight: bold;
        cursor: pointer;
        display: flex;
        align-items: center;
        justify-content: center;
        transition: background 0.15s;
        line-height: 1;
        padding: 0;
      }
      .qty-btn:hover { background: rgba(255,255,255,0.5); }
      .qty-value {
        min-width: 28px;
        text-align: center;
        color: white;
        font-size: 13px;
        font-weight: bold;
        padding: 0 4px;
      }
    `;
    document.head.appendChild(style);
  }

  // ============================================================
  // FUNGSI CART — baca/tulis localStorage
  // ============================================================
  window.getCart = function () {
    return JSON.parse(localStorage.getItem("deltaCart") || "[]");
  };

  window.saveCart = function (cart) {
    localStorage.setItem("deltaCart", JSON.stringify(cart));
  };

  window.isInCart = function (name) {
    return getCart().some(item => item.name === name);
  };

  // ============================================================
  // NOTIFIKASI TOAST
  // ============================================================
  window.showNotif = function (msg, type = "error") {
    let notif = document.getElementById("notif-toast");
    if (!notif) {
      notif = document.createElement("div");
      notif.id = "notif-toast";
      notif.style.cssText = `
        position:fixed; bottom:30px; left:50%; transform:translateX(-50%);
        color:white; padding:10px 20px; border-radius:20px; font-size:13px;
        z-index:9999; transition:opacity 0.3s ease; white-space:nowrap; pointer-events:none;
      `;
      document.body.appendChild(notif);
    }
    notif.style.background = type === "success" ? "#2ecc71" : "rgba(0,0,0,0.8)";
    notif.textContent = msg;
    notif.style.opacity = "1";
    clearTimeout(notif._t);
    notif._t = setTimeout(() => { notif.style.opacity = "0"; }, 2500);
  };

  // ============================================================
  // UPDATE TAMPILAN KERANJANG
  // ============================================================
  window.updateCartUI = function () {
    const cart    = getCart();
    const countEl = document.getElementById("cart-count");
    const itemsEl = document.getElementById("cart-items");
    const totalEl = document.getElementById("total-price");

    if (countEl) {
      const totalQty = cart.reduce((sum, item) => sum + (item.qty || 1), 0);
      countEl.textContent = totalQty;
    }

    if (itemsEl) {
      if (cart.length === 0) {
        itemsEl.innerHTML = `
          <div style="text-align:center;color:#eee;padding:16px;font-size:13px;">
            Cart masih kosong
          </div>
        `;
      } else {
        itemsEl.innerHTML = "";
        cart.forEach((item, index) => {
          const qty       = item.qty || 1;
          const unitPrice = parseInt(String(item.price).replace(/\./g, ""), 10) || 0;
          const subtotal  = unitPrice * qty;

          const div = document.createElement("div");
          div.className = "cart-item";
          div.innerHTML = `
            <div class="cart-item-top">
              <span class="cart-item-name">${item.name}</span>
              <span class="cart-item-price">Rp${unitPrice.toLocaleString("id-ID")}</span>
              <span class="cart-item-remove" onclick="event.stopPropagation(); removeFromCart(${index})">✕</span>
            </div>
            <div class="cart-item-bottom">
              <span class="cart-item-subtotal">Subtotal: Rp${subtotal.toLocaleString("id-ID")}</span>
              <div class="qty-control">
                <button class="qty-btn" onclick="event.stopPropagation(); changeQty(${index}, -1)">−</button>
                <span class="qty-value">${qty}</span>
                <button class="qty-btn" onclick="event.stopPropagation(); changeQty(${index}, 1)">+</button>
              </div>
            </div>
          `;
          itemsEl.appendChild(div);
        });
      }
    }

    if (totalEl) {
      const total = cart.reduce((sum, item) => {
        const unitPrice = parseInt(String(item.price).replace(/\./g, ""), 10) || 0;
        return sum + unitPrice * (item.qty || 1);
      }, 0);
      totalEl.textContent = "Rp" + total.toLocaleString("id-ID");
    }
  };

  window.changeQty = function (index, delta) {
    const cart = getCart();
    if (!cart[index]) return;
    cart[index].qty = (cart[index].qty || 1) + delta;
    if (cart[index].qty <= 0) cart.splice(index, 1);
    saveCart(cart);
    updateCartUI();
  };

  window.removeFromCart = function (index) {
    const cart = getCart();
    cart.splice(index, 1);
    saveCart(cart);
    updateCartUI();
  };

  window.selectCartPayment = function (value, el) {
    document.querySelectorAll(".cart-payment").forEach(p => p.classList.remove("selected"));
    el.classList.add("selected");
    document.getElementById("selectedPayment").value = value;
  };

  // ============================================================
  // HELPER: reset pilihan metode pembayaran
  // ============================================================
  function resetPaymentSelection() {
    document.querySelectorAll(".cart-payment").forEach(p => {
      p.classList.remove("selected");
      p.style.border = "";
    });
    const selectedPaymentEl = document.getElementById("selectedPayment");
    if (selectedPaymentEl) selectedPaymentEl.value = "";
  }

  // ============================================================
  // TAMBAH KE CART — sekarang menyertakan product_id dari database
  // ============================================================
  window.addToCart = function (name, price, productId) {
    const cart  = getCart();
    const found = cart.find(item => item.name === name);

    if (found) {
      found.qty = (found.qty || 1) + 1;
      showNotif("✅ Jumlah " + name + " ditambahkan!", "success");
    } else {
      cart.push({ name, price, id: productId || null, qty: 1 });
      showNotif("✅ " + name + " ditambahkan ke cart!", "success");
    }

    saveCart(cart);
    updateCartUI();
  };

  // ============================================================
  // INISIALISASI CART
  // ============================================================
  function initCart() {
    injectCartCSS();
    injectCartHTML();
    updateCartUI();

    const cartBtn      = document.getElementById("cart");
    const cartPopup    = document.getElementById("cartPopup");
    const cartBackdrop = document.getElementById("cartBackdrop");
    const closeCart    = document.getElementById("closeCart");
    const checkoutBtn  = document.getElementById("checkoutBtn");

    // ── Helper buka & tutup ──────────────────────────────────
    function resetBorders() {
      document.querySelectorAll(".cart-payment").forEach(p => { p.style.border = ""; });
      const wa  = document.getElementById("cartWhatsapp");
      const uid = document.getElementById("userId");
      const sid = document.getElementById("serverId");
      if (wa)  wa.style.border  = "";
      if (uid) uid.style.border = "";
      if (sid) sid.style.border = "";
    }

    function openCart() {
      cartPopup.style.display    = "block";
      cartBackdrop.style.display = "block";
      resetBorders();
      updateCartUI();
    }

    function closeCartPopup() {
      cartPopup.style.display    = "none";
      cartBackdrop.style.display = "none";
    }

    if (cartBtn && cartPopup) {

      // Tombol keranjang (🛒)
      cartBtn.addEventListener("click", function (e) {
        e.stopPropagation();
        const isOpen = cartPopup.style.display === "block";
        isOpen ? closeCartPopup() : openCart();
      });

      // Tombol ✕ di dalam popup
      if (closeCart) {
        closeCart.addEventListener("click", closeCartPopup);
      }

      // ── BACKDROP: klik di luar popup → reset pilihan pembayaran ──
      if (cartBackdrop) {
        cartBackdrop.addEventListener("click", function () {
          resetPaymentSelection();
          resetBorders();
        });
      }

      // ── Reset border merah saat user klik payment setelah validasi gagal ──
      document.addEventListener("click", function (e) {
        if (e.target.closest(".cart-payment")) {
          document.querySelectorAll(".cart-payment").forEach(p => {
            p.style.border = "";
          });
        }
      });

      // ── Checkout ─────────────────────────────────────────────
      if (checkoutBtn) {
        checkoutBtn.addEventListener("click", async function () {
          const cart    = getCart();
          const payment = document.getElementById("selectedPayment").value;
          const phone   = document.getElementById("cartWhatsapp").value.trim();

          // Validasi cart kosong
          if (cart.length === 0) {
            showNotif("⚠️ Pilih paket dulu!");
            return;
          }

          // Validasi metode pembayaran
          if (!payment) {
            showNotif("⚠️ Pilih metode pembayaran dulu!");
            document.querySelectorAll(".cart-payment").forEach(p => {
              p.style.border = "2px solid red";
            });
            return;
          }

          // Validasi nomor WhatsApp
          if (!phone) {
            showNotif("⚠️ Isi nomor WhatsApp dulu!");
            document.getElementById("cartWhatsapp").style.border = "2px solid red";
            return;
          }

          // Validasi nomor WhatsApp hanya angka dan minimal 10 digit
          if (!/^[0-9]{10,13}$/.test(phone)) {
            showNotif("⚠️ Nomor WhatsApp tidak valid!");
            document.getElementById("cartWhatsapp").style.border = "2px solid red";
            return;
          }

          // Validasi Id Pengguna & Id Server (khusus halaman ML dan FF)
          const userId   = document.getElementById("userId");
          const serverId = document.getElementById("serverId");

          if (userId && !userId.value.trim()) {
            showNotif("⚠️ Isi Id Pengguna dulu!");
            userId.style.border = "2px solid red";
            return;
          }

          if (serverId && !serverId.value.trim()) {
            showNotif("⚠️ Isi Id Server dulu!");
            serverId.style.border = "2px solid red";
            return;
          }

          // Cek apakah semua item punya product_id
          const adaYangTidakPunyaId = cart.some(item => !item.id);
          if (adaYangTidakPunyaId) {
            showNotif("⚠️ Ada produk yang tidak dikenali, refresh halaman!");
            return;
          }

          checkoutBtn.textContent = "Memproses...";
          checkoutBtn.disabled    = true;

          try {
            const res = await fetch(API_BASE + "/orders", {
              method: "POST",
              headers: { "Content-Type": "application/json" },
              body: JSON.stringify({
                whatsapp:       phone,
                payment_method: payment,
                user_id_game:   userId?.value || null,
                server_id_game: serverId?.value || null,
                items: cart.map(item => ({
                  product_id: item.id,
                  quantity:   item.qty || 1
                }))
              })
            });

            const data = await res.json();

            if (res.ok) {
              localStorage.setItem("deltaOrderCode",     data.order_code);
              localStorage.setItem("deltaOrderTotal",    data.subtotal);
              localStorage.setItem("deltaPaymentMethod", payment);
              localStorage.removeItem("deltaCart");
              window.location.href = "/payment";
            } else {
              const errMsg = data.message || JSON.stringify(data.errors || "Gagal membuat pesanan");
              showNotif("⚠️ " + errMsg);
            }

          } catch (e) {
            showNotif("⚠️ Tidak bisa terhubung ke server. Pastikan Laravel berjalan.");
          } finally {
            checkoutBtn.textContent = "Buat Pesanan";
            checkoutBtn.disabled    = false;
          }
        });
      }
    }
  }

  document.addEventListener("DOMContentLoaded", function () {
    initCart();
  });

})();
