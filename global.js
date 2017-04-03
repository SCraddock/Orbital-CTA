//  GLOBAL SCRIPTS

//  This manifest imports all of the individual JS modules together ready to
//  compile into a single minified file.
//
//  It is recommended that you customise the loadout of your project by
//  removing any modules that will not be used.


//  ***** ***** ***** ***** ***** ***** ***** ***** ***** ***** ***** *****  //


// PROJECT LEVEL JS

$(document).ready(function() {

  // $("*").click(function(i){
  //   console.log(this);
  // });

  $('video').on('play', function() {
    $(this).next('.play-video').addClass('play-fade')
  });
  $('video').on('pause', function() {
    $(this).next('.play-video').removeClass('play-fade');
  });

  $('.play-video').click(function(i) {
    var video = $(this).parent().find('video').get(0);
    video.addEventListener('ended', function(i){
      $(this).parent().find('.play-video').removeClass('play-fade');
    });
    video.play();
    $(this).addClass('play-fade');
  });

  $('.play-video').click(function(i) {
    var video = $(this).parent().find('video').get(0);
    video.addEventListener('ended', function(i){
      $(this).parent().find('.play-video').removeClass('play-fade');
    });
    video.play();
    $(this).addClass('play-fade');
  });



// START JONS CODE =---

 // jons extra bit to call the scroll
 // front page scroll
if ( $("#scroll").length ) {
  $("#scroll").onepage_scroll({
    easing: "ease-in-out",
    animationTime: 600,
    keyboard: true,
    loop: false,
    pagination: true,
    responsiveFallback: 800,
  });

  $('.front__scroll').click(function() {
    $("#scroll").moveDown();
  });
}

// start showreel
$('.action--play').click(function() {
  $("video.video-player").get(0).currentTime = 0;
  $('body').addClass('video--show');
  $("video.video-player").get(0).play();
});

$('#call-showreel').on('click', '.action--close', function() {
  $('body').removeClass('video--show');
  $("video.video-player").get(0).pause();
});
// end showreel

// header background (on scroll)
$(window).scroll(function() {
  var height = $('.hero').innerHeight();
  var fadePoint = height - 80;

  if ($(window).scrollTop() > fadePoint ){
   $('.header__bg, .toTop').addClass('visible');
   $('.body-gold').removeClass('header--gold');
  } else {
   $('.header__bg, .toTop').removeClass('visible');
   $('.body-gold').addClass('header--gold');
  }
});

// END OF JONS CODE =---



  // nav toggle
  $('.nav-toggle').click(function(){
    $('body').toggleClass('nav--open');
  });

  // header background (on scroll)
  $(window).scroll(function() {
    var height = $('.hero').innerHeight();
    var fadePoint = height - 80;

    if ($(window).scrollTop() > fadePoint ){
     $('.header__bg').addClass('visible');
    } else {
     $('.header__bg').removeClass('visible');
    }
  });

  // cta forms
  $('.cta--footer').click(function(){
    var formID = $(this).attr('data-form');


    $('.cta--footer .font--alt').removeClass('color--blanc');
    $('.cta--footer .font--alt').addClass('color--grad-blue');

    $('.cta--footer').addClass('bg--neutral');

    $(this).find('.font--alt').addClass('color--blanc');
    $(this).find('.font--alt').removeClass('color--grad-blue');

    $(this).removeClass('bg--neutral');

    $('.cta-form form').removeClass('visible');
    $('.cta-form form#' + formID).addClass('visible');
    $('.cta-form').addClass('visible');
  });

  $('.input-container input').blur(function() {
    if( $(this).val() ) {
      $(this).addClass('filled');
    } else {
      $(this).removeClass('filled');
    }
  });

  $('.textarea-container .edit-area').blur(function() {
    var copyVal = $(this).text();
    if( copyVal ) {
      $(this).parents('.textarea-container').children('textarea').val(copyVal);
      $(this).addClass('filled');
    } else {
      $(this).removeClass('filled');
    }
  });

  $('.check-btn').click(function() {
    $(this).toggleClass('checked');

    if( $(this).hasClass('checked') ) {
      $(this).children('input[type=checkbox]').attr('checked', true);
    } else {
      $(this).children('input[type=checkbox]').attr('checked', false);
    }
  });

  $('.radio-btn').click(function() {
    $(this).parents('.radio-list').find('.check--date').removeClass('checked');
    $(this).parents('.radio-list').find('.radio-btn').removeClass('checked');
    $(this).parents('.radio-list').find('.radio-btn').children('input[type=checkbox]').attr('checked', false);
    $(this).addClass('checked');
    $(this).parents('.check--date').addClass('checked');
    $(this).children('input[type=checkbox]').attr('checked', true);
  });

$('.check--date > .radio-btn').click(function() {
  $(this > '.radio-btn--sub').removeClass('checked');
  $('input[name="time[]"]').attr('checked',false);
});

  $('.radio-btn--sub').click(function() {
    $(this).parents('.radio-list').find('.radio-btn--sub').removeClass('checked');
    $(this).parents('.radio-list').find('.radio-btn--sub').children('input[type=checkbox]').attr('checked', false);
    $(this).addClass('checked');
    $(this).children('input[type=checkbox]').attr('checked', true);
  });


  $('.upload-container input[type="file"]').on('change', function(){
    var filename = $('input[type=file]').val().split('\\').pop();

    $(this).parents('.upload-container').find('.filename').text(filename);
  });




  // SMOOTH CRIMINAL SCROLLER -- This creates the smooth scrolling when clicking on an internal page link

  $(function() {
    $('a[href*="#"]:not([href="#"])').click(function() {
      if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
        var target = $(this.hash);
        target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
        if (target.length) {
          $('html, body').animate({
            scrollTop: target.offset().top
          }, 1000);
          return false;
        }
      }
    });
  });


// START hot ajax for the CTA forms

// ==+==+==+==+==+==+==+==+==+==+==+==+==+==+==+==+==+==+==+==+==+==+==+==+
// ==+==+==+==+==+==+==+==+==+==+==+==+==+==+==+==+==+==+==+==+==+==+==+==+
// START Form 1
// ==+==+==+==+==+==+==+==+==+==+==+==+==+==+==+==+==+==+==+==+==+==+==+==+
// ==+==+==+==+==+==+==+==+==+==+==+==+==+==+==+==+==+==+==+==+==+==+==+==+

  function submitedForm(i){
    $(i).css('background', '#8CC36E');
    $(i).prop('disabled',true);
    $(i).text("Thanks!");
  }

  $('#form1').submit(function(event) {
    event.preventDefault();

    $('.error-dot').removeClass('visible');

       $.ajax({
            url: '/_partials/process.php',
            type: 'POST',
            data:  new FormData($("#form1")[0]),
            contentType: false,
            dataType    : 'json',
            processData:false
       })

       // THIS IS AFTER process.php has done some magic ------------------------

// THE CURRENT ISSUE START!!!
/*



*/
// THE CURRENT ISSUE END!!!
         .done(function(data) {


             // log data to the console so we can see
             console.log(data);

             // here we will handle errors and validation messages
             if ( !data.success) {



              // handle errors for name ---------------
              if (data.errors.name) { $('#form1').find('input[name=name]').closest('.error-dot').addClass('visible'); }
              // handle errors for email ---------------
              if (data.errors.email) { $('#form1').find('input[name=email]').closest('.error-dot').addClass('visible'); }
              // handle errors for file too big ---------------
              if (data.errors.size) { $('#form1').find('.fileError').html('<i class="color--notify-failed">Your file is too big</i>'); }
              // handle errors for file wrong type---------------
              if (data.errors.brief) { $('#form1').find('.fileError').html('<i class="color--notify-failed">Invalid file type</i>'); }
              // handle errors for not uploading ---------------
              if (data.errors.upload) { $('#form1').find('.fileError').html('<i class="color--notify-failed">Please upload your brief</i>'); }


          } else {submitedForm('#submit1');} // ON SUCCESS
         })
         .fail(function(data) {     console.log(data);   });

         // stop the form from submitting the normal way and refreshing the page
         event.preventDefault();


  });

// ==+==+==+==+==+==+==+==+==+==+==+==+==+==+==+==+==+==+==+==+==+==+==+==+
// ==+==+==+==+==+==+==+==+==+==+==+==+==+==+==+==+==+==+==+==+==+==+==+==+
// END Form 1 / START Form 2
// ==+==+==+==+==+==+==+==+==+==+==+==+==+==+==+==+==+==+==+==+==+==+==+==+
// ==+==+==+==+==+==+==+==+==+==+==+==+==+==+==+==+==+==+==+==+==+==+==+==+


  $('#form2').submit(function(event) {
      event.preventDefault();
    // Reset errors
    // NOTE : MAKE CODE TO REMOVE THE RED ERROR DOT
    $('.error-dot').removeClass('visible');

    // HAVE TO USE DIFFERNT FORM DA

    var formData = {
        'frmname'           : $('#form2').find('input[name=frmname]').val(),
        'submit'            : 'submited',
        'CarrotStick'       : $('#form2').find('input[name=CarrotStick]').val(),
        'name'              : $('#form2').find('input[name=name]').val(),
        'email'             : $('#form2').find('input[name=email]').val(),
        'phone'             : $('#form2').find('input[name=phone]').val(),
        'location'          : $('#form2').find('input[name="location[]"][checked=checked]').val(),
        'date'              : $('#form2').find('input[name="date[]"][checked=checked]').val(),
        'time'              : $('#form2').find('input[name="time[]"][checked=checked]').val()
    };

    console.log(formData);
    $.ajax({
          type        : 'POST', // define the type of HTTP verb we want to use (POST for our form)
          url         : '/_partials/process.php', // the url where we want to POST
          data        : formData, // our data object
          dataType    : 'json', // what type of data do we expect back from the server
          encode      : true
    })

    // THIS IS AFTER process.php has done some magic ------------------------

      // using the done promise callback
      .done(function(data) {

          // log data to the console so we can see
          console.log(data);

          // here we will handle errors and validation messages
          if ( ! data.success) {

           // handle errors for name ---------------
           if (data.errors.name) {
            $('#form2').find('input[name=name]').closest('.error-dot').addClass('visible');
           }
           // handle errors for email ---------------
           if (data.errors.email) {
            $('#form2').find('input[name=email]').closest('.error-dot').addClass('visible');
           }
           // handle errors for file wrong type---------------
           if (data.errors.date || data.errors.time ){

             $('#bookDates').addClass('visible');


           }

           if (data.errors.location) {
             $('#formLocation').addClass('visible');
           }


       } else {

           // ON SUCCESS
           // NOTE : MAKE CODE TO change button to green and say 'thanks!' (steal from blog)
          //  $('#submit2').css('background', '#8CC36E');
          //  $('#submit2').prop('disabled',true);
          //  $('#submit2').text("Thanks!");

          submitedForm('#submit2');


       }
      })
      .fail(function(data) {
        // show any errors
        // used for showing those pesky php errors that wouldn't be shown normally
        // best to remove for production
        console.log(data);
      });

      // stop the form from submitting the normal way and refreshing the page
      event.preventDefault();

  });

// ==+==+==+==+==+==+==+==+==+==+==+==+==+==+==+==+==+==+==+==+==+==+==+==+
// ==+==+==+==+==+==+==+==+==+==+==+==+==+==+==+==+==+==+==+==+==+==+==+==+
// END Form 2 / START Form 3
// ==+==+==+==+==+==+==+==+==+==+==+==+==+==+==+==+==+==+==+==+==+==+==+==+
// ==+==+==+==+==+==+==+==+==+==+==+==+==+==+==+==+==+==+==+==+==+==+==+==+

  $('#form3').submit(function(event) {
      event.preventDefault();
    // Reset errors
    // NOTE : MAKE CODE TO REMOVE THE RED ERROR DOT
    $('.error-dot').removeClass('visible');

    // to make an array of the services
    var services = [];
    $("input[name='service[]']:checked").each(function(){
      services.push($(this).val());
    });

    // alert(services);

    var formData = {
        'frmname'           : $('#form3').find('input[name=frmname]').val(),
        'submit'            : 'submited',
        'CarrotStick'       : $('#form3').find('input[name=CarrotStick]').val(),
        'name'              : $('#form3').find('input[name=name]').val(),
        'email'             : $('#form3').find('input[name=email]').val(),
        'phone'             : $('#form3').find('input[name=phone]').val(),
        'message'           : $('#form3').find('textarea[name=message]').val(),
        'service'           : services
    };

    console.log(formData);
    $.ajax({
          type        : 'POST', // define the type of HTTP verb we want to use (POST for our form)
          url         : '/_partials/process.php', // the url where we want to POST
          data        : formData, // our data object
          dataType    : 'json', // what type of data do we expect back from the server
          encode      : true
    })

    // THIS IS AFTER process.php has done some magic ------------------------

      // using the done promise callback
      .done(function(data) {

          // log data to the console so we can see
          console.log(data);

          // here we will handle errors and validation messages
          if ( ! data.success) {

           // handle errors for name ---------------
           if (data.errors.name) {
            $('#form3').find('input[name=name]').closest('.error-dot').addClass('visible');
           }
           // handle errors for email ---------------
           if (data.errors.email) {
            $('#form3').find('input[name=email]').closest('.error-dot').addClass('visible');
           }
           // handle errors for message ---------------
           if (data.errors.message) {
            $('#form3').find('textarea[name="message"]').closest('.error-dot').addClass('visible');
           }
           // handle errors for services ---------------
           if (data.errors.service) {
            $('#form3').find('input[name="service[]"]').closest('.error-dot').addClass('visible');
           }


       } else {

           // ON SUCCESS
           // NOTE : MAKE CODE TO change button to green and say 'thanks!' (steal from blog)
          //  $('#submit3').css('background', '#8CC36E');
          //  $('#submit3').prop('disabled',true);
          //  $('#submit3').text("Thanks!");

           submitedForm('#submit3');

       }
      })
      .fail(function(data) {
        // show any errors
        // used for showing those pesky php errors that wouldn't be shown normally
        // best to remove for production
        console.log(data);
      });

      // stop the form from submitting the normal way and refreshing the page
      event.preventDefault();

  });


// ==+==+==+==+==+==+==+==+==+==+==+==+==+==+==+==+==+==+==+==+==+==+==+==+
// ==+==+==+==+==+==+==+==+==+==+==+==+==+==+==+==+==+==+==+==+==+==+==+==+
// END Form 3
// ==+==+==+==+==+==+==+==+==+==+==+==+==+==+==+==+==+==+==+==+==+==+==+==+
// ==+==+==+==+==+==+==+==+==+==+==+==+==+==+==+==+==+==+==+==+==+==+==+==+

// END OF AJAX FOR CTA FORMS



});

//  ***** ***** ***** ***** ***** ***** ***** ***** ***** ***** ***** *****  //
