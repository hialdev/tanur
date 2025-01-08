$(window).on('scroll', function () {
    const header = $('header'); // Selector header
    const img = header.find('img'); // Selector img dalam header

    if ($(window).scrollTop() === 0) {
        // Jika posisi scroll di atas
        img.css('height', '5.5em');
    } else {
        // Jika posisi scroll tidak di atas
        img.css('height', '4em');
    }
});


// Sembunyikan dropdown saat halaman dimuat
$('.menu-dropdown-box').hide();

// Event handler untuk klik pada elemen dengan class .has-dropdown
$('.has-dropdown').on('click', function (e) {
  // Cek apakah target adalah link utama (e.g., "Tanur")
  if ($(e.target).is('a') && $(e.target).attr('href')) {
    return; // Izinkan navigasi ke link tanpa membuka dropdown
  }

  e.preventDefault(); // Mencegah navigasi link jika target bukan link utama

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
