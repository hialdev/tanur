"use strict";

let site = "https://tanurmuthmainnah.com";

/** Default variable */
let credential, authToken, authRole, bookingUrl, listingId, agentRefCode;

$(document).ready(function() {
  // Get listing id.
  if (window.location.href.includes("/listings/")) {
    bookingUrl = $(".mt-2 a#booking").attr("href");
    const queryString = parseQueryString(bookingUrl);
    listingId = queryString.listing_id;
    //console.log("Listing id: " + listingId);
  }

  // Get agent referral code.
  agentRefCode = window.localStorage.getItem("agentReferralCode");

  // Get saved credentials.
  const currentCredential = window.localStorage.getItem("currentCredential");

  if (currentCredential) {
    credential = JSON.parse(currentCredential);
    authToken = credential.auth_token;
    authRole = credential.role;
  }

  // Modify login menu.
  if (authToken) {
    //console.log("Auth role: " + authRole);

    // Replace login menu with logged-in menu.
    switch (authRole) {
      case "ROOT":
      case "MAIN":
      case "AGENT":
        $("li#menu-logged-in").html('<span><a href="#0" class="sub-menu">Akun Saya</a></span><ul><li><a href="/app_v2/#/admin">Dashboard</a></li><li><a href="/app_v2/#/admin/my-account">Profile</a></li><li><a href="/app_v2/#/admin/transactions/invoices">Invoices</a></li><li><a href="#logout" onclick="javascript:logOut();">Logout</a></li></ul>');

        // Modify booking url.
        if (window.location.href.includes("/listings/")) {
          //console.log(listingId);
          $(".mt-2 a#booking").replaceWith('<a id="booking" href="/app_v2/#/admin/transactions/booking/add?listing_id=' + listingId + '" class="btn btn-warning btn-lg btn-block" style="display:block"><i class="fa fa-plane"></i> BOOKING</a>');
          $(".mt-2 a#booking").show();
          $(".mt-2 a#login").remove();
        }
      break;

      case "USER":
      default:
        $("li#menu-logged-in").html('<span><a href="#0" class="sub-menu">Akun Saya</a></span><ul><li><a href="/app_v2/#/user">Dashboard</a></li><li><a href="/app_v2/#/user/my-account">Profile</a></li><li><a href="/app_v2/#/user/booking">Invoices</a></li><li><a href="#logout" onclick="javascript:logOut();">Logout</a></li></ul>');

        // Modify mobile menu.
        // https://stackoverflow.com/questions/28631790/jquery-mmenu-on-opening-a-submenu-how-to-close-all-others
        // https://mmenujs.com/docs/core/api.html
        $("li#mm-menu-logged-in").click(function (e) {
          const $parent = $(e.target).parents("div.mm-panels");
          const $mmopened = $parent.children("div.mm-opened");
          if ($mmopened) {
            console.log("mm opened menu found");
            let $listview = $mmopened.find("ul.mm-listview");
            $listview.replaceWith('<ul class="mm-listview"><li><a href="/app_v2/#/user">Dashboard</a></li><li><a href="/app_v2/#/user/my-account">Profile</a></li><li><a href="/app_v2/#/user/booking">Invoices</a></li><li><a href="#logout" onclick="javascript:logOut();">Logout</a></li></ul>');
            console.log("mm opened menu");
          } else {
            console.log("mm opened menu not found");
          }
        });

        // Modify booking url.
        if (window.location.href.includes("/listings/")) {
          // Booking url /app_v2/#/user/booking/add?listing_id=
          if (agentRefCode > 0) {
            bookingUrl += "&ref=" + agentRefCode;
          }

          $(".mt-2 a#booking").replaceWith('<a id="booking" href="' + bookingUrl + '" class="btn btn-warning btn-lg btn-block" style="display:block"><i class="fa fa-plane"></i> BOOKING</a>');
          $(".mt-2 a#booking").show();
          $(".mt-2 a#login").remove();
        }
      break;
    }
  } else {
    //console.log("Auth role: not logged in.");

    // Listing: replace login button with popup modal.
    if (window.location.href.includes("/listings/")) {
      $(".mt-2 a#login").replaceWith('<a id="login" href="#" class="btn btn-warning btn-lg btn-block" data-toggle="modal" data-target="#userLoginModal"><i class="fa fa-plane"></i> Login untuk Booking</a>');
      $(".mt-2 a#login").show();
      $(".mt-2 a#booking").remove();
    }

    /** Login action. */
    $("#login button.login").click(function(e) {
      e.preventDefault();

      const email = $("#login .email input").val();
      const password = $("#login .password input").val();
      const loginAsAdmin = $("#login input.loginRole").prop('checked');

      if (email && password) {
        const payload = {
          "email": email,
          "password": password
        };

        console.log("Login role: " + loginAsAdmin);

        // Login request.
        $.ajax({
          type: "POST",
          url: loginAsAdmin ? "/admin_api/auth/sign_in" : "/user_api/auth/sign_in",
          dataType: "text",
          data: payload,
          success: function (data) {
            //console.log("Response login auth: " + data);
            //console.log("Listing id: " + listingId + ", Agent ref code: " + agentRefCode);
            loginSuccess(data, listingId, agentRefCode);
          },
          error: function (xhr, status, error) {
            if (xhr.status === 200) {
              console.log("Request status: " + xhr.statusText);
              console.log("Request response: " + xhr.responseText);
            } else {
              console.log("Request failed: " + xhr.responseText);
              loginFail(xhr.responseText);
            }
          }
        });
      } else {
        // If email empty.
        if (! email) {
          $("#login .email div.invalid-feedback").show().delay(3000).fadeOut();
        }

        // If passw empty.
        if (! password) {
          $("#login .password div.invalid-feedback").show().delay(3000).fadeOut();
        }
      }
    });

    /** Forgat password action. */
    $("#forget-password button.forget-password").click(function(e) {
      e.preventDefault();

      const email = $("#forget-password .email input").val();

      if (email) {
        const payload = {
          "email": email
        };

        // Forget password request.
        $.ajax({
          type: "POST",
          url: "/user_api/auth/reset_password",
          dataType: "text",
          data: payload,
          success: function (data) {
            forgetPasswordSuccess(data);
          },
          error: function (xhr, status, error) {
            if (xhr.status === 200) {
              console.log("Request status: " + xhr.statusText);
              console.log("Request response: " + xhr.responseText);
            } else {
              console.log("Request failed: " + xhr.responseText);
              forgetPasswordFail(xhr.responseText);
            }
          }
        });
      } else {
        // If email empty.
        if (! email) {
          $("#forget-password .email div.invalid-feedback").show().delay(3000).fadeOut();
        }
      }
    });
  }

  /* Fix modal login */
  $("#userLoginModal").appendTo("body");
  $("#userLoginModal").on("shown.bs.modal", function() {
    $("#userLoginModal").trigger("focus");
  });

  /* Login <=> Forget Password Switch */
  $("#login span button.forget-password").click(function(e) {
    e.preventDefault();
    $("div#login").hide();
    $("div#forget-password").show();
  });

  /* Forget Password <=> Login Switch */
  $("#forget-password span button.login").click(function(e) {
    e.preventDefault();
    $("div#forget-password").hide();
    $("div#login").show();
  });

  /* Responsive custom buy button position */
  customizeBuyButton();

  /* List bank method */
  //getBankLists(site);

  /* Customize page styling */
  customizePageStyle();
});

const loginSuccess = (credential = "{}", redirect = "", referral = 0) => {
  let authCredential = JSON.parse(credential);

  if (! authCredential.role) {
    authCredential.role = "USER";
  }

  let authRole = authCredential.role,
      redirectUrl = "";

  console.log("Authenticated role: " + authRole);

  if (authRole) {
    $("#userLoginModal h5.modal-title").html("Login Berhasil");
    $("#login div.alert").removeClass("alert-danger").addClass("alert-info")
      .html("Sedang melanjutkan ke halaman booking. Mohon tunggu!")
      .show().delay(1000).fadeIn();
    $("div#login form").hide().delay(3000).fadeOut();

    // Save logged-in credentials.
    window.localStorage.setItem("currentCredential", JSON.stringify(authCredential));

    if (authRole === "ROOT" || authRole === "MAIN" || authRole === "AGENT") {
      if (!isNaN(redirect)) {
        redirectUrl = "/app_v2/#/admin/transactions/booking/add?listing_id=" + redirect;
      } else {
        redirectUrl = redirect;
      }
    } else if (authRole === "USER") {
      if (!isNaN(redirect)) {
        redirectUrl = "/app_v2/#/user/booking/add?listing_id=" + redirect;

        if (referral > 0) {
          redirectUrl += "&ref=" + referral;
        }
      } else {
        redirectUrl = redirect;
      }
    } else {
      redirectUrl = redirect;
    }

    console.log("Redirected to: " + redirectUrl);

    if (redirectUrl) {
      window.location.replace(redirectUrl);
    } else {
      window.location.reload();
    }
  } else {
    console.log("No authenticated credentials received.");
  }
};

const loginFail = (response = "{}") => {
  let res = JSON.parse(response);

  $("#login div.alert").removeClass("alert-info").addClass("alert-danger").html(res.msg);
  $("#login div.alert").show().delay(500).fadeIn();
  $("#login div.alert").delay(6000).fadeOut("slow");

  console.log("Login failed: " + res.msg);
};

const forgetPasswordSuccess = (response = "{}") => {
  let res = JSON.parse(response);

  $("#forget-password div.alert").removeClass("alert-danger").addClass("alert-info").html(res.msg);
  $("#forget-password div.alert").show().delay(500).fadeIn();
  $("#forget-password div.alert").delay(6000).fadeOut("slow");
};

const forgetPasswordFail = (response = "{}") => {
  let res = JSON.parse(response);

  $("#forget-password div.alert").removeClass("alert-info").addClass("alert-danger").html(res.msg);
  $("#forget-password div.alert").show().delay(500).fadeIn();
  $("#forget-password div.alert").delay(6000).fadeOut("slow");
};

const logOut = (redirectUrl = "") => {
  window.localStorage.removeItem("currentCredential");

  if (redirectUrl) {
    window.location.replace(redirectUrl);
  } else {
    window.location.reload();
  }
};

const parseQueryString = (query = "") => {
  const urlParts = query.split("?");
  let params;

  if (urlParts) {
    params = urlParts[1].split("&");
  } else {
    params = query.split("&");
  }

  let queryString = {};

  for (let i = 0; i < params.length; i++) {
    let pair = params[i].split("=");
    let key = decodeURIComponent(pair.shift());
    let value = decodeURIComponent(pair.join("="));

    // If first entry with this name.
    if (typeof queryString[key] === "undefined") {
      queryString[key] = value;
      // If second entry with this name
    } else if (typeof queryString[key] === "string") {
      let arr = [queryString[key], value];
      queryString[key] = arr;
      // If third or later entry with this name
    } else {
      queryString[key].push(value);
    }
  }

  return queryString;
};

/**
 * Get current url parameter.
 *
 * Usage: const blog = getUrlParameter('blog');
 */
const getUrlParameter = (sParam) => {
  const sPageURL = window.location.search.substring(1);
  let sURLVariables = sPageURL.split('&');
  let sParameterName, i;

  for (i = 0; i < sURLVariables.length; i++) {
    sParameterName = sURLVariables[i].split('=');

    if (sParameterName[0] === sParam) {
      return sParameterName[1] === undefined ? true : decodeURIComponent(sParameterName[1]);
    }
  }

  return false;
};

/**
 * Customize page style.
 *
 * Usage: for S&K page
 */
const customizePageStyle = () => {
  const section = getUrlParameter('section');
  const fullpage = getUrlParameter('fullpage');

  if (fullpage == 1) {
    // Hide header, menu, footer, make full page view.
    $("nav#mm-menu, div#sub-header, div#header-top, header.header, section.hero_in, footer.footer, div#whatsapp-chat, div.blantershow-chat, div#toTop").hide();

    // Add margin bottom.
    $("main .post-content #note-snk").attr("style", "margin-bottom: 5rem !important;");
  }

  // Scroll to selected section.
  switch (section) {
    case "user":
      console.log('S&K section: ' + section);
      $("main .post-content #agent").hide();
      //$("main .post-content #user").attr("style", "margin-bottom: 5rem !important;");
      $("main .container.margin_60_35").removeClass("margin_60_35");
      $("main .container.margin_80_55").removeClass("margin_80_55");
      $("html, body").animate({
        scrollTop: $("main .post-content #user").offset().top
      }, 1000);
    break;
    case "agent":
      console.log('S&K section: ' + section);
      $("main .post-content #user").hide();
      //$("main .post-content #agent").attr("style", "margin-bottom: 5rem !important;");
      $("main .container.margin_60_35").removeClass("margin_60_35");
      $("main .container.margin_80_55").removeClass("margin_80_55");
      $("html, body").animate({
        scrollTop: $("main .post-content #agent").offset().top
      }, 1000);
    break;
    default:
      console.log('S&K section: default');
    break;
  }
};

/**
 * Custom buy button position
 *
 */
const customizeBuyButton = () => {
    if (window.location.href.includes("/listings/")) {
    const $section = $('.container .row .col-lg-8 section');
    const $sidebar = $('#sidebar .theiaStickySidebar');
    const $priceBox = $sidebar.find('div.box_detail:first-child');

    $priceBox.hide();

    // Remove btn Tanya CS & Print
    //$priceBox.find('.panel-body .row div:nth-last-child(2)').remove();

    // Clone price box into after listing's poster
    $priceBox.clone().insertAfter($section.children('p'));

    buyButtonPosition();

    // Bind event listener
    $(window).resize(buyButtonPosition);
  }
}

const buyButtonPosition = () => {
  const $window = $(window);
  const screenWidth = $window.width();
  const minScreenWidth = 991;
  const $section = $('.container .row .col-lg-8 section');
  const $sidebar = $('#sidebar .theiaStickySidebar');

  //console.log('Screen width: ' + screenWidth);

  // If screen with less then min width (mobile size)
  if (screenWidth < minScreenWidth) {
    // Show element
    $section.find('div.box_detail').show();
    $sidebar.find('div.box_detail:first-child').hide();
    //console.log('Buy button min');
  } else {
    $section.find('div.box_detail').hide();
    $sidebar.find('div.box_detail:first-child').show();
    //console.log('Buy button max');
  }
}

/**
 * Get bank list
 * @param {*} site
 * @returns void modify DOM
 *
 * Usage:
 * JS part
 * $(document).ready(function() {
 *   getBankLists(site);
 * });
 *
 * HTML part
 * <div id="payments-method">
 *   <h5 class="mb-2">Rekening Pembayaran</h5>
 *   <!-- jQuery Bank Lists -->
 *   <ul class="bank-lists"></ul>
 * </div>
 */
const getBankLists = (site = "https://tanurmuthmainnah.com") => {
  $.ajax({
    dataType: "json",
    url: site + "/api/banks.json",
    success: function(banks) {
      if (banks.length) {
        $.each(banks, function(id, bank) {
          let bankLogo = bank.logo;
          $("#payments-method .bank-lists")
            .append('<div id="bank-' + id + '" class="border-bottom mb-2"><p class="font-weight-bold mb-2"><span class="fa fa-bank"></span> ' + bank.bank + ' (' + bank.currency + ')</p><ul class="contact-official mb-2"><li>a/n: <strong>' + bank.name + '</strong></li><li>No. Rek: <strong>' + bank.number + '</strong></li></ul></div>');
        });
      } else {
        $("#payments-method .bank-lists").append('<strong>Belum ada informasi bank.</strong> Segera masukkan data rekening bank melalui menu <em><a href="/app_v2/#/admin/settings/banks" rel="nofollow" target="_blank">Pengaturan &raquo; Bank</a></em> pada dashboard admin!');
      }
    }
  });
};