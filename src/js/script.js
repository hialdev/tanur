// Sembunyikan dropdown saat halaman dimuat
$('.menu-dropdown-box').hide();

// Event handler untuk klik pada elemen dengan class .has-dropdown
$('.has-dropdown').on('click', function (e) {
  e.preventDefault(); // Mencegah default behavior seperti navigasi link

  // Cari elemen .menu-dropdown-box yang terkait dengan elemen ini
  $(this).find('.menu-dropdown-box').slideToggle();
});

$('.menu-open-button').on('click', function( ){
  $('.menu-box').addClass('active');
})

$('.menu-close-button').on('click', function( ){
  $('.menu-box').removeClass('active');
})

