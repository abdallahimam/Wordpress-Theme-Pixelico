
$(document).ready(function(){
    $('ul.navbar-nav li.dropdown').hover(function() {
        $(this).find('.dropdown-menu').stop(true, true).delay(200).fadeIn(500);
    }, function() {
        $(this).find('.dropdown-menu').stop(true, true).delay(200).fadeOut(500);
    });
    // Set the date we're counting down to
    var textShow = document.getElementById("downloadCounterDown");
    var downloadLink = document.getElementById("downloadLink");
    var downloadHead = document.getElementById("downloadHeading");
    var countDownDate = 5;
    var now = 0;

    // Update the count down every 1 second
    if (textShow !== null) {
    var x = setInterval(function() {

        // Find the distance between now and the count down date
        var distance = countDownDate - now;
        now = now + 1;
        
        // Output the result in an element with id="demo"
        textShow.innerHTML = "انتظر " + distance + " ثواني.";
        downloadLink.style.display = "none";

        
        // If the count down is over, write some text 
        if (distance < 0) {
          textShow.style.display = "none";
          downloadHead.innerHTML = "رابط التحميل متاح.";
          downloadLink.style.display = "inline-block";
          clearInterval(x);
        }
        
    }, 1000);
  }

  $('#downloadLink').click(function(e) {
    var id = $(this).attr('download');
    console.log(id); // Inspect this in your console

    jQuery.ajax({
      type: "POST",
      url: "../wp-admin/admin-ajax.php",
      data: {
          action: 'increase_post_counter',
          // add your parameters here
          post_id: id,
          counter_type: 'DOWNLOAD'
      },
      success: function (output) {
         console.log(output);
      }
    });
    return true;
  });

  $('a.like').click(function(e) {
    //var href = $(this).attr('href');
    var id = $(this).attr('data-id');
    var fileurl = $(this).attr('fileurl');
    var button = '#buttonLike' + id;
    
    jQuery.ajax({
      type: "POST",
      url: "wp-admin/admin-ajax.php",
      data: {
          action: 'increase_post_counter',
          // add your parameters here
          post_id: id,
          counter_type: 'LIKE'
      },
      success: function (output) {
        $(button).find('.like-counter').html(output['data']);
      }
    });
    return true;
  });
  
});



// LOAD More functionality

$(document).ready(function($){

    var pageNumber = 2;
    var total = 0;
    var page = 1;

    if(document.getElementById('total_downloads')){
    	total = document.getElementById('total_downloads').value;
    }

    if(document.getElementById('total_downloads')){
    	page = document.getElementById('page_number').value;
    }

    $(".load_more").click(function() {
        $("#showloadmore").hide();   
        $("#loading").show();

        var current_url = window.location.href,
	    separator = (current_url.indexOf("?")===-1)?"?":"&",
	    newParam = separator + "page=" + pageNumber;
	    newUrl = current_url.replace(newParam,"");
	    newUrl += newParam;

        $.ajax
        ({
            type: "GET",
            url: newUrl,
            success: function(msg)
            {
            	if(msg){
            		console.log(msg);
	                $('#downloads').append(msg);
	                $("#showloadmore").show(); 
	                $("#loading").hide();
	                if ((pageNumber *page)-1 > total) {
	                    $("#showloadmore").hide(); 
	                } else {
	                    pageNumber += 1;
	                }
	            } else {
	            	$("#loading").hide();
	            	$('#showloadmore').addClass('animated').addClass('fadeInUp');
	            	$('#showloadmore').html('<p>No more downloads to load</p>');
	            	$('#showloadmore').show();
	            }
            }
        });
    });
    //end loadmore
});


$(document).ready(function() {
 
    var owl = $("#pixelico-owl-carousel");
 
    owl.owlCarousel({

        rtl:true,
        loop:true,
        margin:10,
        nav:true,
        responsive:{
            0:{
                items:1
            },
            600:{
                items:1
            },
            1000:{
                items:1
            }
        }
    });
});