"use strict";

/* ===== Enable Bootstrap Popover (on element  ====== */

var popoverTriggerList = [].slice.call(
    document.querySelectorAll('[data-toggle="popover"]')
);
var popoverList = popoverTriggerList.map(function (popoverTriggerEl) {
    return new bootstrap.Popover(popoverTriggerEl);
});

/* ==== Enable Bootstrap Alert ====== */
var alertList = document.querySelectorAll(".alert");
alertList.forEach(function (alert) {
    new bootstrap.Alert(alert);
});

/* ===== Responsive Sidepanel ====== */
const sidePanelToggler = document.getElementById("sidepanel-toggler");
const sidePanel = document.getElementById("app-sidepanel");
const sidePanelDrop = document.getElementById("sidepanel-drop");
const sidePanelClose = document.getElementById("sidepanel-close");

window.addEventListener("load", function () {
    responsiveSidePanel();
});

window.addEventListener("resize", function () {
    responsiveSidePanel();
});

function responsiveSidePanel() {
    let w = window.innerWidth;
    if (w >= 1200) {
        // if larger
        //console.log('larger');
        sidePanel.classList.remove("sidepanel-hidden");
        sidePanel.classList.add("sidepanel-visible");
    } else {
        // if smaller
        //console.log('smaller');
        sidePanel.classList.remove("sidepanel-visible");
        sidePanel.classList.add("sidepanel-hidden");
    }
}

sidePanelToggler.addEventListener("click", () => {
    if (sidePanel.classList.contains("sidepanel-visible")) {
        console.log("visible");
        sidePanel.classList.remove("sidepanel-visible");
        sidePanel.classList.add("sidepanel-hidden");
    } else {
        console.log("hidden");
        sidePanel.classList.remove("sidepanel-hidden");
        sidePanel.classList.add("sidepanel-visible");
    }
});

sidePanelClose.addEventListener("click", (e) => {
    e.preventDefault();
    sidePanelToggler.click();
});

sidePanelDrop.addEventListener("click", (e) => {
    sidePanelToggler.click();
});

/* ====== Mobile search ======= */
const searchMobileTrigger = document.querySelector(".search-mobile-trigger");
const searchBox = document.querySelector(".app-search-box");

searchMobileTrigger.addEventListener("click", () => {
    searchBox.classList.toggle("is-visible");

    let searchMobileTriggerIcon = document.querySelector(
        ".search-mobile-trigger-icon"
    );

    if (searchMobileTriggerIcon.classList.contains("fa-search")) {
        searchMobileTriggerIcon.classList.remove("fa-search");
        searchMobileTriggerIcon.classList.add("fa-times");
    } else {
        searchMobileTriggerIcon.classList.remove("fa-times");
        searchMobileTriggerIcon.classList.add("fa-search");
    }
});

//Ini menggunakan FunctionXML (Not Recommended for Clean Code)
// function hitungTotalHargaProduk($kode) {
//     const tanggalMulai = document.getElementById("tanggalMulai").valueAsDate;
//     const tanggalSelesai = document.getElementById("tanggalSelesai").valueAsDate;
//     const diffInDays = Math.floor((tanggalSelesai - tanggalMulai) / (1000 * 60 * 60 * 24)); // Hitung selisih dalam hari
//     // Kirim permintaan Ajax ke server
//     const xhr = new XMLHttpRequest();
//     xhr.open("GET", "/api/unit/"+$kode, true);
//     xhr.onreadystatechange = function () {
//         if (xhr.readyState === 4 && xhr.status === 200) {
//             const data = JSON.parse(xhr.responseText); // Menguraikan respons JSON
//             const hargaProduk = parseInt(data[0].harga);
//             const totalHarga = diffInDays * hargaProduk; // Hitung total harga
//             document.getElementById("totalHarga").value = totalHarga;
//         }
//     };
//     xhr.send();
// }
