// ============================================================
// DELTA STORE - INDEX.JS
// Semua logika cart sudah dipindah ke /cart.js
// ============================================================

// =======================
// LOADING SCREEN
// =======================

window.addEventListener("load", function () {
  const loading = document.getElementById("loading-screen");
  if (!loading) return;
  setTimeout(function () {
    loading.style.opacity = "0";
    setTimeout(function () { loading.style.display = "none"; }, 500);
  }, 3000);
});