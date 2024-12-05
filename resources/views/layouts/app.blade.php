

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta charset="utf-8">
    <title>@yield('title')</title>
    <meta name="description" content="Tanur Muthmainnah Tour melayani dan berusaha memampukan seluruh kaum Muslimin di Indonesia maupun di dunia untuk ibadah umroh ke tanah suci">
    <meta name="keywords" content="tanur muthmainnah, travel umroh berizin resmi">    <!-- Favicons-->
    <link rel="shortcut icon" type="image/x-icon" href="https://storage.googleapis.com/muslimpergi/uploads/site/logo/227/square_logo-tanur-muthmainnah-new_square.png">
    <link rel="apple-touch-icon" type="image/x-icon" href="https://storage.googleapis.com/muslimpergi/uploads/site/logo/227/square_logo-tanur-muthmainnah-new_square.png">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="72x72" href="https://storage.googleapis.com/muslimpergi/uploads/site/logo/227/square_logo-tanur-muthmainnah-new_square.png">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="114x114" href="https://storage.googleapis.com/muslimpergi/uploads/site/logo/227/square_logo-tanur-muthmainnah-new_square.png">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="144x144" href="https://storage.googleapis.com/muslimpergi/uploads/site/logo/227/square_logo-tanur-muthmainnah-new_square.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha512-iQQV+nXtBlmS3XiDrtmL+9/Z+ibux+YuowJjI4rcpO7NYgTzfTOiFNm09kWtfZzEB9fQ6TwOVc8lFVWooFuD/w==" crossorigin="anonymous" />
      
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css" integrity="sha512-4uGZHpbDliNxiAv/QzZNo/yb2FtAX+qiDb7ypBWiEdJQX8Pugp8M6il5SRkN8jQrDLWsh3rrPDSXRf3DwFYM6g==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" media="all" href="{{asset('css/app.css')}}" />
    <meta name="csrf-param" content="authenticity_token" />
    <meta name="csrf-token" content="{{csrf_token()}}" />
    <style type="text/css">
        .hero_single.version_2:before { background-image: url(https://storage.googleapis.com/muslimpergi/uploads/site/background/227/PRESENTASI_ACHIEVMENT_page19_image1.jpg); }

        .hero_in.contacts:before { background-image: url(https://storage.googleapis.com/muslimpergi/uploads/site/background2/227/PRESENTASI_GO_ES_23_page25_image2.png); }
        #login_bg, #register_bg { background-image: url(https://storage.googleapis.com/muslimpergi/uploads/site/background2/227/PRESENTASI_GO_ES_23_page25_image2.png); }
        .call_section { background-image: url(https://storage.googleapis.com/muslimpergi/uploads/site/background2/227/PRESENTASI_GO_ES_23_page25_image2.png); }
    </style>

    <link rel="shortcut icon" type="image/x-icon" href="https://storage.googleapis.com/muslimpergi/uploads/gallery/pict/4970/logo-tanur-muthmainnah-new_square.png">
    <link rel="apple-touch-icon" type="image/x-icon" href="https://storage.googleapis.com/muslimpergi/uploads/gallery/pict/4970/logo-tanur-muthmainnah-new_square.png">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="72x72" href="https://storage.googleapis.com/muslimpergi/uploads/gallery/pict/4970/logo-tanur-muthmainnah-new_square.png">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="114x114" href="https://storage.googleapis.com/muslimpergi/uploads/gallery/pict/4970/logo-tanur-muthmainnah-new_square.png">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="144x144" href="https://storage.googleapis.com/muslimpergi/uploads/gallery/pict/4970/logo-tanur-muthmainnah-new_square.png">

    <link rel="preload" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" as="style" onload="this.onload=null;this.rel='stylesheet'" integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="preload" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css" as="style" onload="this.onload=null;this.rel='stylesheet'" integrity="sha512-sMXtMNL1zRzolHYKEujM2AqCLUR9F2C4/05cdbxjjLSRvMQIciEPCQZo++nk7go3BtSuK9kfa/s+a4f4i5pLkw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

<!--<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.11.1/baguetteBox.min.css" integrity="sha512-NVt7pmp5f+3eWRPO1h4A1gCf4opn4r5z2wS1mi7AaVcTzE9wDJ6RzMqSygjDzYHLp+mAJ2/qzXXDHar6IQwddQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />-->
    <link rel="stylesheet" href="{{asset('css/theme.css')}}">


    <link rel="canonical" href="{{url()->current()}}" />

    <script>
      var currentCredential = window.localStorage.getItem("currentCredential");
    </script>
  </head>
  <body>
    <div id="page">

      <div id="sub-header" class="sub-header">
        <div class="container">
          <div class="row">
            <div class="col-5 col-md-8 col-xs-12">
              <ul class="left-info">
                <li>
                  <a href="mailto:mutmainnahtour.tanur@gmail.com"><i class="fa fa-envelope m-0"></i>
                    <span class="hide-text">mutmainnahtour.tanur@gmail.com</span>
                  </a>
                </li>
                <li>
                  <a href="tel:081903301909"><i class="fa fa-phone m-0"></i>
                    <span class="hide-text">081903301909</span>
                  </a>
                </li>
              </ul>
            </div>
            <div class="col-7 col-md-4">
              <ul class="right-icons">
                <li><a href="https://www.facebook.com/Tanur Muthmainnah" rel="nofollow" target="_blank"><i class="fa fa-facebook"></i></a></li>
                <li><a href="https://www.instagram.com/tanurmuthmainnah" rel="nofollow" target="_blank"><i class="fa fa-instagram"></i></a></li>
                <li><a href="#" rel="nofollow" target="_blank"><i class="fa fa-youtube-play"></i></a></li>
                <li><a href="#" rel="nofollow" target="_blank"><img src="https://storage.googleapis.com/muslimpergi/uploads/gallery/pict/2052/icon_tiktok-white.png" alt="Tiktok" style="width:18px;height:18px;"></a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
      <header id="header" class="header" data-spy="affix" data-offset-top="197">
        <div class="container">
          <div id="logo">
            <a href="/">
              <img src="https://storage.googleapis.com/muslimpergi/uploads/site/logo/227/logo-tanur-muthmainnah-new_square.png" height="48" alt="PT. Tanur Muthmainnah Tour" class="logo_normal">
              <img src="https://storage.googleapis.com/muslimpergi/uploads/site/logo2/227/logo-tanur-muthmainnah-new_square.png" height="48" alt="PT. Tanur Muthmainnah Tour" class="logo_sticky">
            </a>
          </div>
          <a href="#menu" class="btn_mobile">
            <div class="hamburger hamburger--spin" id="hamburger">
              <div class="hamburger-box">
                <div class="hamburger-inner"></div>
              </div>
            </div>
          </a>
          <nav id="menu" class="main-menu">
            <ul>
              <li><span><a href="/">Beranda</a></span></li>
              <li><span><a href="/listings">Umroh</a></span></li>
              <li><span><a href="/tour">Tour</a></span></li>
              <li><span><a href="/galleries">Galeri</a></span></li>
              <li><span><a href="/testimonials">Testimonial</a></span></li>
              <li><span><a href="/articles">Artikel</a></span></li>
              <li id="menu-logged-in">
                <span><a href="#0" class="sub-menu">Akun Saya</a></span>
                <ul>
                  <li><a href="https://tanurmuthmainnah.com/app_v2/#/login?as=user" target="_blank">Login Jamaah</a></li>
                  <li><a href="https://tanurmuthmainnah.com/app_v2/#/login?as=agent" target="_blank">Login Agen</a></li>
                  <li><a href="https://tanurmuthmainnah.com/app_v2/#/login?as=admin" target="_blank">Login Admin</a></li>
                </ul>
              </li>
            </ul>
          </nav>
        </div>
      </header>

      <main>
        
        @yield('content')
        
      </main>

      <!-- Site footer -->
      <footer class="site-footer">
        <div class="container">
          <div class="row">
            <div class="col-sm-12 col-md-5 mr-lg-auto">
              <div class="container">
                <h6>Tanur Muthmainnah Tour</h6>
                <p class="text-justify">
                  Kami melayani dan berusaha memampukan seluruh kaum Muslimin di Indonesia maupun di dunia untuk mendapat hak yang sama di hadapan Allah, dimuliakan menjadi tamu Allah SWT dan tamu Rosulullah SAW, beribadah Haji dan Umrah dengan meraih fadhillah yang dijanjikan Allah hingga sukses menggali dari mendapatkan harta karun kesuksesan di dunia dan di akhirat.
                </p>
              </div>
              <div class="container">
                <ul id="footer-selector" class="text-center text-sm-center text-md-center text-lg-right">
                  <li>
                    <img src="https://storage.googleapis.com/muslimpergi/uploads/gallery/pict/4419/Social-Proof_kemenag-sisko-5pasti-mp_48px.png" 
                    alt="">
                  </li>
                </ul>
              </div>
            </div>
            <div class="col-xs-6 col-md-4">
              
              <h6>Informasi Kontak</h6>
              <ul class="contact-official">
                <li>
                  <a class="phone" target="_blank" href="tel:081903301909">
                    <i class="fa fa-phone m-0"></i> 081903301909
                  </a>
                </li>
                <li>
                  <a class="mail" href="mailto:mutmainnahtour.tanur@gmail.com">
                    <i class="fa fa-envelope m-0"></i> mutmainnahtour.tanur@gmail.com
                  </a>
                </li>
              </ul>
              
              
              <h6>Head Office</h6>
              <ul class="contact-official">
                <li>
                  <a class="twitter" target="_blank" href="https://maps.app.goo.gl/7Zsae2mSvke8Whbj8">
                    <i class="fa m-0 fa-map-marker"></i> Rukan Venice, Golf Lake Residence No.12-15 Blok B, RT.9/RW.14, Cengkareng Tim., Kecamatan Cengkareng, Kota Jakarta Barat, Daerah Khusus Ibukota Jakarta 11730
                  </a>
                </li>
              </ul>
              
              <h6>Kantor Cabang</h6>
              <p class="text-justify">
                DKI Jakarta, Bogor, Tangerang, Bekasi, Jogja, Solo, Surabaya, Makassar.
              </p>
            </div>
            <div class="col-xs-6 col-md-auto">
              <h6>Lokasi Kami</h6>
              <img class="img-fluid"
                src="https://storage.googleapis.com/muslimpergi/uploads/gallery/pict/4971/medium_tanur-map_qr-code.png"
                alt="Map QR Code" style="width: 180px;">
            </div>
          </div>
          <hr>
        </div>
        <div class="container">
          <div class="row">
            <div class="col-md-8 col-sm-6 col-xs-12">
              <p class="copyright-text">
              © 2024 <strong>Tanur Muthmainnah Tour (PT. Tanur Muthmainnah Tour)</strong><br>
                Digitally Powered by <a class="text-white" href="https://muslimpergi.com/">MuslimPergi&reg;</a> – Indonesia's Most Advanced Travel App System
              </p>
            </div>
            <div class="col-md-4 col-sm-6 col-xs-12">
              <ul class="social-icons">
                <li>
                  <a class="facebook" href="https://www.facebook.com/Tanur Muthmainnah" target="_blank"><i class="fa fa-facebook m-0"></i></a>
                </li>
                <li>
                  <a class="instagram" href="https://www.instagram.com/tanurmuthmainnah" target="_blank"><i class="fa fa-instagram m-0"></i></a>
                </li>
                <li>
                  <a class="youtube" href="#" target="_blank"><i class="fa fa-youtube m-0"></i></a>
                </li>
                <li>
                  <a class="tiktok" href="#" target="_blank"><img src="https://storage.googleapis.com/muslimpergi/uploads/gallery/pict/2052/icon_tiktok-white.png" alt="Tiktok" style="width:15px;height:15px;"></a>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </footer>

      <!-- Modal Login Booking -->
      <style>
      #userLoginModal.modal {
        z-index: 99999999;
      }

      #userLoginModal .btn {
        font-size: 0.875rem;
        padding: 10px 20px;
        font-weight: 400;
        border-radius: 5px;
      }

      @media (min-width: 468px) {
        #userLoginModal .form-text-right {
          text-align: right !important;
        }
      }
      </style>

      <div class="modal fade" id="userLoginModal" tabindex="-1" role="dialog" aria-labelledby="userLoginModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="userLoginModalLabel">Login Pengguna</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <div class="align-items-center justify-content-center" style="background-color: var(--foreground-color);">
                  <div class="">
                    <div class="card">
                      <div class="card-body py-0 px-0">
                        <div id="login">
                          <div role="alert" aria-live="polite" aria-atomic="true" class="alert text-center mt-3" style="display: none;"></div>
                          <form class="av-tooltip tooltip-center-bottom w-90 w-sm-75 px-3 mx-auto mt-4">
                            <fieldset class="form-group">
                              <legend tabindex="-1" class="bv-no-focus-ring col-form-label pt-0">E-mail</legend>
                              <div class="email">
                                <input type="text" placeholder="user@travel.com" class="form-control">
                                <div class="invalid-feedback"> Harap isikan email! </div>
                              </div>
                            </fieldset>
                            <fieldset class="form-group">
                              <legend tabindex="-1" class="bv-no-focus-ring col-form-label pt-0">Password</legend>
                              <div class="password">
                                <input type="password" placeholder="******" class="form-control">
                                <div class="invalid-feedback"> Harap isikan password! </div>
                              </div>
                            </fieldset>
                            <!--<div class="text-right">
                              <span class="">
                                <button type="button" class="btn text-muted p-0 btn-link forget-password"> Lupa Password? </button>
                              </span>
                            </div>-->
                            <div class="row">
                              <div class="col-6 col-lg-6 col-md-6">
                                <fieldset class="form-group">
                                  <input name="role" type="checkbox" class="form-checkbox loginRole"> Masuk sebagai Agen
                                </fieldset>
                              </div>
                              <div class="col-6 col-lg-6 col-md-6 form-text-right">
                                <span class="">
                                  <button type="button" class="btn text-muted p-0 btn-link forget-password"> Lupa Password? </button>
                                </span>
                              </div>
                            </div>
                            <div class="mt-4">
                              <button type="submit" class="btn btn-primary btn-block login" style="border-radius: 8px;"> Masuk </button>
                              <a href="/app_v2/#/register?as=user" class="" target="_blank">
                                <button type="button" class="btn mt-2 btn-link btn-block"> Daftar </button>
                              </a>
                            </div>
                          </form>
                        </div>
                        <div id="forget-password" style="display: none;">
                          <div role="alert" aria-live="polite" aria-atomic="true" class="alert text-center mt-3 alert-info">
                            Instruksi reset password akan dikirim ke alamat email Anda.
                          </div>
                          <form class="av-tooltip tooltip-center-bottom w-90 w-sm-75 px-3 mx-auto mt-4">
                            <fieldset class="form-group">
                              <legend tabindex="-1" class="bv-no-focus-ring col-form-label pt-0">E-mail</legend>
                              <div class="email">
                                <input type="text" placeholder="user@travel.com" class="form-control">
                                <div class="invalid-feedback"> Harap isikan email! </div>
                              </div>
                            </fieldset>
                            <div class="mt-4">
                              <button type="submit" class="btn btn-primary btn-block forget-password" style="border-radius: 8px;"> Kirim </button>
                              <span class="">
                                <button type="button" class="btn mt-2 btn-link btn-block login" style="border-radius: 8px;"> Masuk </button>
                              </span>
                            </div>
                          </form>
                        </div>
                        <div id="signup" style="display: none;">
                          <div role="alert" aria-live="polite" aria-atomic="true" class="alert text-center mt-3 alert-info">
                            Instruksi reset password akan dikirim ke alamat email Anda.
                          </div>
                          <form class="av-tooltip tooltip-center-bottom w-90 w-sm-75 px-3 mx-auto mt-4">
                            <fieldset class="form-group">
                              <legend tabindex="-1" class="bv-no-focus-ring col-form-label pt-0">E-mail</legend>
                              <div class="email">
                                <input type="text" placeholder="user@travel.com" class="form-control">
                                <div class="invalid-feedback"> Harap isikan email! </div>
                              </div>
                            </fieldset>
                            <div class="mt-4">
                              <button type="submit" class="btn btn-primary btn-block signup" style="border-radius: 8px;"> Daftar </button>
                              <span class="">
                                <button type="button" class="btn mt-2 btn-link btn-block login" style="border-radius: 8px;"> Masuk </button>
                              </span>
                            </div>
                          </form>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
            </div>
            <!--<div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="button" class="btn btn-primary">Save changes</button>
            </div>-->
          </div>
        </div>
      </div>

      <!-- WhatsApp Chat Button -->
      <div id="whatsapp-chat" class="hide-custom">
        <div class="header-chat">
          <div class="head-home">
            <div class="header-avatar">
              <img src="https://storage.googleapis.com/muslimpergi/uploads/site/logo2/227/logo-tanur-muthmainnah-new_square.png" />
            </div>
            <p>
              <span id="get-nama" class="whatsapp-name">Tanur Muthmainnah Tour</span><br>
              <span id="get-label" class="tagline">Now Everyone Can Umroh</span>
            </p>
          </div>
          <div class="get-default hide-custom">
            <div id="get-nama_def">
              Tanur Muthmainnah Tour
            </div>
            <div id="get-label_def">
              Now Everyone Can Umroh
            </div>
          </div>
        </div>
        <div class="home-chat">
          <!-- Info Contact Start -->
          <div class="cs-list">
            
            <a class="informasi wa-chat" href="javascript:void" title="WhatsApp Chat">
              <div class="info-avatar">
                <img
                src="https://storage.googleapis.com/muslimpergi/uploads/gallery/pict/892/whatsapp-icon.png" />
              </div>
              <div class="info-chat">
                <span class="chat-nama">Admin 1</span>
                <span class="chat-label">CS Marketing</span>
              </div>
              <span class="my-number">6281903301909</span>
            </a>
            <a class="informasi wa-chat" href="javascript:void" title="WhatsApp Chat">
              <div class="info-avatar">
                <img
                src="https://storage.googleapis.com/muslimpergi/uploads/gallery/pict/892/whatsapp-icon.png" />
              </div>
              <div class="info-chat">
                <span class="chat-nama">Admin 2</span>
                <span class="chat-label">CS Marketing</span>
              </div>
              <span class="my-number">0000000</span>
            </a>
            
          </div>

          <!-- Info Contact End -->
          <div class="cs-list-footer">
            <div class="social-media">
              <a href="tel:6281903301909" rel="nofollow" target="_blank">
                <img src="https://storage.googleapis.com/muslimpergi/uploads/gallery/pict/942/phone_logo.png" alt="">
              </a>
              <a href="https://www.facebook.com/Tanur Muthmainnah" rel="nofollow" target="_blank">
                <img src="https://storage.googleapis.com/muslimpergi/uploads/gallery/pict/898/icon-fb.png" alt="">
              </a>
              <a href="https://www.instagram.com/tanurmuthmainnah" rel="nofollow" target="_blank">
                <img src="https://storage.googleapis.com/muslimpergi/uploads/gallery/pict/895/icon-instagram.png" alt="">
              </a>
              <a href="#" rel="nofollow" target="_blank">
                <img src="https://storage.googleapis.com/muslimpergi/uploads/gallery/pict/896/icon-yt.png" alt="">
              </a>
            </div>
          </div>
        </div>
        <div class="start-chat hide-custom">
          <div pattern="https://storage.googleapis.com/muslimpergi/uploads/gallery/pict/1712/whatsapp_bg.png"
            class="whatsapp-chat-body">
            <div class="dAbFpq">
              <div style="opacity: 0;" class="eJJEeC">
                <div class="hFENyl">
                  <div class="ixsrax"></div>
                  <div class="dRvxoz"></div>
                  <div class="kXBtNt"></div>
                </div>
              </div>
              <div style="opacity: 1;" class="kAZgZq">
                <!--<div class="bMIBDo" id="chat-nama">Tanur Muthmainnah Tour</div>-->
                <div class="iSpIQi">
                  Assalamu'alaikum 👋<br><br>Ahlan wa sahlan di Tanur Muthmainnah Tour <br>Ada yang dapat kami bantu?
                </div>
                <div class="cqCDVm">
                  <script data-cfasync="false" src="{{asset('js/email-decode.min.js')}}"></script><script>
                    var currentTime = new Date();
                    document.write(currentTime.getHours() + ":" + currentTime.getMinutes());
                  </script>
                </div>
              </div>
            </div>
          </div>
          <div class="blanter-msg">
            <textarea id="chat-input" placeholder="Tulis pesan di sini..." maxlength="120" row="1"></textarea>
            <a href="javascript:void;" id="send-it"><svg viewBox="0 0 448 448">
              <path d="M.213 32L0 181.333 320 224 0 266.667.213 416 448 224z" />
            </svg></a>
          </div>
        </div>
        <div id="get-number"></div>
        <a class="close-chat" href="javascript:void">×</a>
      </div>
      <a id="chatBtn" class="blantershow-chat" href="javascript:void" title="Show WhatsApp Chat">
        <svg width="25" viewBox="0 0 24 24">
          <defs />
          <path fill="#eceff1"
            d="M20.5 3.4A12.1 12.1 0 0012 0 12 12 0 001.7 17.8L0 24l6.3-1.7c2.8 1.5 5 1.4 5.8 1.5a12 12 0 008.4-20.3z" />
          <path fill="#4caf50"
            d="M12 21.8c-3.1 0-5.2-1.6-5.4-1.6l-3.7 1 1-3.7-.3-.4A9.9 9.9 0 012.1 12a10 10 0 0117-7 9.9 9.9 0 01-7 16.9z" />
          <path fill="#fafafa"
            d="M17.5 14.3c-.3 0-1.8-.8-2-.9-.7-.2-.5 0-1.7 1.3-.1.2-.3.2-.6.1s-1.3-.5-2.4-1.5a9 9 0 01-1.7-2c-.3-.6.4-.6 1-1.7l-.1-.5-1-2.2c-.2-.6-.4-.5-.6-.5-.6 0-1 0-1.4.3-1.6 1.8-1.2 3.6.2 5.6 2.7 3.5 4.2 4.2 6.8 5 .7.3 1.4.3 1.9.2.6 0 1.7-.7 2-1.4.3-.7.3-1.3.2-1.4-.1-.2-.3-.3-.6-.4z" />
        </svg>
        Chat WA Sekarang!
      </a>

    </div> <!-- page -->

    <div id="toTop">
      <i class="fa fa-arrow-up"></i>
    </div><!-- Back to top button -->

    <script src="{{asset('js/app.js')}}"></script>

    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js" integrity="sha512-+NqPlbbtM1QqiK8ZAo4Yrj2c4lNQoGv8P79DPtKzj++l5jnN39rHA/xsqn8zE9l0uSoxaCdrOgFs6yjyfbBxSg==" crossorigin="anonymous"></script> --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.1/umd/popper.min.js" integrity="sha512-ubuT8Z88WxezgSqf3RLuNi5lmjstiJcyezx34yIU2gAHonIi27Na7atqzUZCOoY4CExaoFumzOsFQ2Ch+I/HCw==" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.3/js/bootstrap.min.js" integrity="sha512-8qmis31OQi6hIRgvkht0s6mCOittjMa9GMqtK9hes5iEQBQE/Ca6yGE5FsW36vyipGoWQswBj/QBm2JR086Rkw==" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"
      integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw=="
      crossorigin="anonymous"></script>
    <!--<script src="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.11.1/baguetteBox.min.js" integrity="sha512-7KzSt4AJ9bLchXCRllnyYUDjfhO2IFEWSa+a5/3kPGQbr+swRTorHQfyADAhSlVHCs1bpFdB1447ZRzFyiiXsg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.3.5/js/swiper.min.js" integrity="sha512-NdZyIQYjul6RuB0vCoq9ec+xqTO2riVTZAZf9YM3BHkkcJxFTq7z9FAK3PXP+XYs5zQRuOycmL5GdwD85t2T+Q==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script>
      //baguetteBox.run('.tz-gallery');

      // var fullHeight = function () {
      //   $('.js-fullheight').css('height', $(window).height());
      //   $(window).resize(function () {
      //     $('.js-fullheight').css('height', $(window).height());
      //   });
      // };
      // fullHeight();

      /** Sub header top */
      var prevScrollpos = window.pageYOffset;
      window.onscroll = function () {
        var currentScrollPos = window.pageYOffset;
        if (prevScrollpos > currentScrollPos) {
          document.getElementById("sub-header").classList.add("top-0");
          document.getElementById("header").classList.remove("top-0");
          document.getElementById("header").classList.add("top-45");
        } else {
          if (prevScrollpos == 0) {
            document.getElementById("header").classList.add("top-45");
          } else {
            document.getElementById("header").classList.add("top-0");
            document.getElementById("header").classList.remove("top-45");
          }
        }

        prevScrollpos = currentScrollPos;
      }

      $('.home-slider').owlCarousel({
        loop: true,
        autoplay: true,
        margin: 0,
        animateOut: 'fadeOut',
        animateIn: 'fadeIn',
        nav: true,
        dots: false,
        autoplayHoverPause: false,
        autoplayTimeout: 10000,
        items: 1,
        navText: ["<span class='ion-ios-arrow-back'></span>", "<span class='ion-ios-arrow-forward'></span>"],
        responsive: {
          0: {
            items: 1
          },
          600: {
            items: 1
          },
          800: {
            items: 1,
            nav: false
          },
          1000: {
            items: 1
          }
        }
      });

      $('.testimonials.owl-carousel').owlCarousel({
        loop: true,
        margin: 10,
        dots: false,
        nav: false,
        autoplay: true,
        autoplayTimeout: 5000,
        responsive: {
          0: {
            items: 1
          },
          600: {
            items: 1
          },
          1000: {
            items: 1
          }
        }
      });

      $('.featured-app-img').owlCarousel({
        items: 1,
        loop: true,
        autoplay: true,
        nav: false,
        dots: true,
      });

      /** WhatsApp Chat Widget by www.bloggermix.com */
      $(document).on("click", "#send-it", function () {
        var a = document.getElementById("chat-input");
        if (a.value) {
          var b = $("#get-number").text(),
          c = document.getElementById("chat-input").value,
          d = "https://web.whatsapp.com/send",
          e = b,
          f = "&text=" + c;
          if (/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent)) {
            var d = "whatsapp://send";
          }
          var g = d + "?phone=" + e + f;
          window.open(g, "_blank");
        }
      });

      $(document).on("click", ".informasi.wa-chat", function () {
        document.getElementById("get-number").innerHTML = $(this).children(".my-number").text();
        document.getElementById("get-nama").innerHTML = $(this).children(".info-chat").children(".chat-nama").text();
        document.getElementById("get-label").innerHTML = $(this).children(".info-chat").children(".chat-label").text();
        /*document.getElementById("chat-nama").innerHTML = $(this).children(".info-chat").children(".chat-nama").text();*/
        $(".start-chat,.get-new").addClass("show-custom").removeClass("hide-custom");
        $(".home-chat,.head-home").addClass("hide-custom").removeClass("show-custom");
      });

      $(document).on("click", ".close-chat", function () {
        document.getElementById("get-number").innerHTML = "";
        document.getElementById("get-nama").innerHTML = $("#get-nama_def").text();
        document.getElementById("get-label").innerHTML = $("#get-label_def").text();
        $("#whatsapp-chat").addClass("hide-custom").removeClass("show-custom");
        $(".home-chat,.head-home").addClass("show-custom").removeClass("hide-custom");
        $(".start-chat,.get-new").addClass("hide-custom").removeClass("show-custom");
        $(".blanter-msg #chat-input").val('');
        /*location.reload();*/
      });

      $(document).on("click", ".blantershow-chat", function () {
        $("#whatsapp-chat").addClass("show-custom").removeClass("hide-custom");
      });

      $(window).on("scroll", function() {
        if (0 != $(this).scrollTop()) {
          $("#chatBtn").fadeIn();
        } else {
          $("#chatBtn").fadeOut();
          $("#whatsapp-chat").addClass("hide-custom").removeClass("show-custom");
        }
      });

      document.addEventListener("DOMContentLoaded", function() {
        var listingVariants = document.getElementById("listing_variants");
        var listingInfoHead = document.querySelector(".listing-info-head");

        function isElementInViewport(el) {
          if (el) {
            var rect = el.getBoundingClientRect();
            return (
              rect.top >= 0 &&
              rect.left >= 0 &&
              rect.bottom <= (window.innerHeight || document.documentElement.clientHeight) &&
              rect.right <= (window.innerWidth || document.documentElement.clientWidth)
            );
          }
          return false;
        }

        function toggleDirectBookingListingVisibility() {
          if (window.innerWidth <= 991 && window.location.href.includes("/listings/") && !window.location.href.includes("/booking")) {
            var listingVariantsVisible = isElementInViewport(listingVariants);
            var listingInfoHeadVisible = isElementInViewport(listingInfoHead);

            if (listingVariantsVisible || listingInfoHeadVisible) {
              document.getElementById("chatBtn").style.bottom = "25px";
              document.getElementById("whatsapp-chat").style.bottom = "90px";
            } else {
              document.getElementById("chatBtn").style.bottom = "150px";
              document.getElementById("whatsapp-chat").style.bottom = "210px";
            }
          }
        }

        window.addEventListener("scroll", toggleDirectBookingListingVisibility);
        window.addEventListener("resize", toggleDirectBookingListingVisibility);

        toggleDirectBookingListingVisibility();
      });
    </script>


    <script type="text/javascript">

      function numberWithCommas(x) {
        return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
      }

      $(document).ready (function(){
        var currentCredential = localStorage.getItem('currentCredential');
        const user = JSON.parse(currentCredential);
        // console.log(user);
        // console.log(user["role"]);

        // $('#booking').hide();
        // $('#login').show();

        // user bisa null karena dihapus ketika logout,
        // jadi defaultnya booking.hide, login.show
        if (user !== null) {
          // if (user["role"] === "USER") {
          //   $('#booking').show();
          //   $('#login').hide();
          // }

          const agentReferralCode = localStorage.getItem('agentReferralCode');
  
          if (agentReferralCode !== null && agentReferralCode !== '') {
            const urlParams = new URLSearchParams(window.location.search);
            urlParams.set('ref', agentReferralCode);
            
            const newUrl = `${window.location.pathname}?${urlParams.toString()}`;
            window.history.replaceState({}, '', newUrl);
          } else {
            const newUrl = `${window.location.pathname}`;
            window.history.replaceState({}, '');
            console.log('agentReferralCode kosong atau tidak ada');
          }
        }

        $('#spinner').hide();
        bind_select_variant()
        bind_booking_cancel()
        calculate_total_price()

        $('#btn_new_profile').on('click', function(e){
          var content = "";
          var new_id = 'invoice[bookings][' + new Date().getTime() + ']';
          var regexp = new RegExp("invoice\\[bookings]\\[0]", "g");
          $('div.booking-row').last().after(content.replace(regexp, new_id).replace('profile_name disabled', 'profile_name'))
          bind_select_variant()
          bind_booking_cancel()
          calculate_total_price()
          e.preventDefault()
        })

        function bind_select_variant() {
          $('select.select_variant').on('change', function(e){
            calculate_total_price()
          })
        }

        function bind_booking_cancel() {
          $('a.booking_cancel').on('click', function(e){
            $(this).parent().parent().parent().parent().remove()
            calculate_total_price()
            e.preventDefault()
          })
        }

        function calculate_total_price() {
          total = 0
          addon_price = 0
          // alert('ok')
          $('select.select_variant').each(function(){
            // alert($(this).val())
            // alert(variant_price[$(this).val()])
            if ($(this).val() > 0) {



              total += variant_price[$(this).val()]
            }
          })


            bookings_count = $('input.text_name').length;
            if (bookings_count > 0) {
              total += addon_price
            }
          $('#total_price').html(numberWithCommas(total))
        }

        // button form submit clicked
        $('form.user').bind('submit', function (e) {

          // hapus dulu semua error
          $('.alert-danger').each(function() {
            $(this).remove()
          })

          // validasi
          var data = $("form.user").serializeArray()

          $('select.select_variant').each(function(){
            console.log($(this).val())
            if ($(this).val() == '---') {
              $($(this)).parent().parent().parent().parent().before(
                '<div class="alert alert-danger">' +
                  'Varian belum dipilih' +
                '</div>'
              )
              // $('#e').hide();
              if (window.grecaptcha) grecaptcha.reset();
              e.preventDefault();
              return;
            }
          })

          $('input.text_name').each(function(){
            console.log($(this).val())
            $(this).removeAttr("disabled")

            if ($(this).val() == '') {
              $($(this)).parent().parent().parent().parent().before(
                '<div class="alert alert-danger">' +
                  'Nama belum diisi' +
                '</div>'
              )
              // $('#e').hide();
              if (window.grecaptcha) grecaptcha.reset();
              e.preventDefault();
              return;
            }
          })

          $.ajax({
            type: "POST",
            async: false,
              url: '/api/invoices.json',
            data: $("form.user").serialize(),
            success: function(data) {
              console.log(data)
              if (data.slug) {
                window.location.href = '/user/invoices/' + data.slug;
              }
            },
            error: function(xhr, status, error) {
              console.log(xhr.responseJSON.msg)
              console.log(status)
              var err = JSON.parse(xhr.responseText);
              // alert(err.Message);
              if ( xhr.responseJSON.msg.length > 0 ) {
                $('form.user').before(
                  '<div class="alert alert-danger">' +
                    xhr.responseJSON.msg +
                  '</div>'
                )
                if (window.grecaptcha) grecaptcha.reset();
              }
            }
          });
          // ajax

          // $('#e').hide();
          e.preventDefault();
          return;
        })

      })
      var agentReferralCode = '';
      localStorage.setItem('agentReferralCode', agentReferralCode);
    </script>

    <script src="{{asset('js/theme.js')}}"></script>


  </body>
</html>
