// Sembunyikan dropdown saat halaman dimuat
$('.menu-dropdown-box').hide();

// Event handler untuk klik pada elemen dengan class .has-dropdown
$('.has-dropdown').on('click', function (e) {
  e.preventDefault(); // Mencegah default behavior seperti navigasi link

  // Tutup dropdown lain yang terbuka
  $('.menu-dropdown-box').not($(this).find('.menu-dropdown-box')).slideUp();

  // Toggle dropdown yang terkait dengan elemen ini
  $(this).find('.menu-dropdown-box').slideToggle();
});

// Cegah penutupan dropdown saat item dropdown diklik
$('.menu-dropdown-box a').on('click', function (e) {
  e.stopPropagation(); // Mencegah event bubbling
});

// Event untuk tombol buka menu
$('.menu-open-button').on('click', function () {
  $('.menu-box').addClass('active');
});

// Event untuk tombol tutup menu
$('.menu-close-button').on('click', function () {
  $('.menu-box').removeClass('active');
});
