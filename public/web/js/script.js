
$(document).ready(function() {
    $('div#instagram_id').html("");
    $('div#instagram_mobile_view').html("");
    $.ajax({
        url: 'get_instagram_api_value',
        method: 'GET',
        // contentType: 'application/json; charset=utf-8',
        dataType: "json",
        success:  function (data) {
            // console.log(data)
            $.each(data, function(i, resp)
            {
                $('div#instagram_id').append(
                    ' <div class="col-12 col-md-3 p-4" style="max-height: 100%">\n' +
                    '                        <div class="card">\n' +
                    '                            <img src="'+resp.image_url+'" class="card-img-top img-fluid" />\n' +
                    '                            <div class="card-body">\n' +
                    '                                <span class="card-title font-weight-bold px-16">'+resp.name+'</span>\n' +
                    '                                <div class="card-text px-12">\n' +
                    '                                    <span class="mr-4">'+resp.like+' Likes</span>'+resp.created_time+'\n' +
                    '                                </div>\n' +
                    '                            </div>\n' +
                    '                        </div>\n' +
                    '                    </div>'
                );
            });

            $.each(data, function (i, resp) {
                if (i === 0) {
                    $('div#instagram_mobile_view').append(
                        '<div class="card carousel-item active">\n' +
                        '                        <img src="'+resp.image_url+'" class="card-img-top img-fluid" />\n' +
                        '                        <div class="card-body">\n' +
                        '                            <span class="card-title font-weight-bold px-16">'+resp.name+'</span>\n' +
                        '                            <div class="card-text px-12">\n' +
                        '                                <span class="mr-4">'+resp.like+' Likes</span>'+resp.created_time+'\n' +
                        '                            </div>\n' +
                        '                        </div>\n' +
                        '                    </div>'
                    )
                }else
                {
                    $('div#instagram_mobile_view').append(
                        '<div class="card carousel-item">\n' +
                        '                        <img src="'+resp.image_url+'" class="card-img-top img-fluid" />\n' +
                        '                        <div class="card-body">\n' +
                        '                            <span class="card-title font-weight-bold px-16">'+resp.name+'</span>\n' +
                        '                            <div class="card-text px-12">\n' +
                        '                                <span class="mr-4">'+resp.like+' Likes</span>'+resp.created_time+'\n' +
                        '                            </div>\n' +
                        '                        </div>\n' +
                        '                    </div>'
                    )
                }

            })
        }
    });

});

let currentMenuState = 0;
const toggleNav = function(){
    const menuElement = document.getElementById("menu");
    if (currentMenuState === 0) {
        menuElement.classList.remove("d-none");
        menuElement.classList.add("d-flex");
        console.log("Menu opened");
        currentMenuState = 1;
    } else {
        menuElement.classList.remove("d-flex");
        menuElement.classList.add("d-none");
        console.log("Menu closed");
        currentMenuState = 0;
    }
};

jQuery.fn.clickOutside = function(callback){
    var $me = this;
    $(document).mouseup(function(e) {
        if ( !$me.is(e.target) && $me.has(e.target).length === 0 ) {
            callback.apply($me);
        }
    });
};

var $categoryMenu = $('#photography-categories-menu');
var $categoryMenuMobile = $("#photography-categories-mobile-menu");
var $galleryMenu = $("#photography-galleries-menu");
var $galleryMenuMobile = $("#photography-galleries-mobile-menu");

const toggleCategory = function() {
    if($categoryMenu.hasClass("d-flex") || $categoryMenuMobile.hasClass("d-flex")){
        $categoryMenu.removeClass("d-flex").addClass("d-none");
        $categoryMenuMobile.removeClass("d-flex").addClass("d-none");
    } else {
        $categoryMenu.removeClass("d-none").addClass("d-flex");
        $categoryMenuMobile.removeClass("d-none").addClass("d-flex");
    }
    $galleryMenu.removeClass("d-flex").addClass("d-none");
    $galleryMenuMobile.removeClass("d-flex").addClass("d-none");
};

const toggleGallery = function() {
    $categoryMenu.removeClass("d-flex").addClass("d-none");
    $categoryMenuMobile.removeClass("d-flex").addClass("d-none");
    if($galleryMenu.hasClass("d-flex") || $galleryMenuMobile.hasClass("d-flex")){
        $galleryMenu.removeClass("d-flex").addClass("d-none");
        $galleryMenuMobile.removeClass("d-flex").addClass("d-none");
    } else {
        $galleryMenu.removeClass("d-none").addClass("d-flex");
        $galleryMenuMobile.removeClass("d-none").addClass("d-flex");
    }
};

const closeAllMenu = function(){
    $categoryMenu.removeClass("d-flex").addClass("d-none");
    $categoryMenuMobile.removeClass("d-flex").addClass("d-none");
    $galleryMenu.removeClass("d-flex").addClass("d-none");
    $galleryMenuMobile.removeClass("d-flex").addClass("d-none");
};

$('#photography-galleries, #photography-categories').clickOutside(function(){
    closeAllMenu();
});

$('.videography-carousel-overlay').on("click", function () {
    $('.videography-carousel-overlay').removeClass("active");
    let $this = $(this);
    $this.addClass("active");
});

$(document).ready( e => {
    $("#experience-text-block").height($("#experience-img").height())
});
$(window).on("resize",function () {
    $("#experience-text-block").height($("#experience-img").height());
});

$("#scroll-down").on("click", function () {
    var target = $("#blog-post-content");
    var targetOffset = $(target).offset().top + ($(target).height() / 2);
    console.log(targetOffset);
    $('html,body').animate(
        {
            scrollTop: targetOffset
        },200,function()
        {
            location.hash = target;
        });
});


function get_gallery(val,name) {
     $('div#photography-galleries-menu ul.nav').empty();
     $('div#photography-galleries-mobile-menu ul.nav').empty();
    $('.cat_name').text(name)
     //console.log(name)
	$.ajax({
		url: '/get_gallery/'+val,
		method: 'get',
		success: function (response) {


		    //console.log(response);
			let data = JSON.parse(response);
			//console.log(data)
            $.each(data, function(i, resp)
            {
                $('div#photography-galleries-menu ul.nav').append("<li href='#?' class='nav-item' onclick='set_gallery("+resp.id+")'><a class='nav-link text-light'>"+resp.gallery_title+"</a> </li>")
                $('div#photography-galleries-mobile-menu ul.nav').append("<li href='#?' class='nav-item' onclick='set_gallery("+resp.id+")'><a class='nav-link text-light'>"+resp.gallery_title+"</a> </li>")
            });
        },error: function (resp) {
			console.log(resp)
        },

	});

}

function set_gallery(id) {
    $('#gallery_title').empty();
    $('.gallery_img').empty();
    $('.mobile_gallery_image').empty();

    $.ajax({
		url: '/get_images/'+id,
		method: 'get',
		success: function (response)
		{
		    // console.log(response)
			let data = JSON.parse(response);

			$('#gallery_title').append(data.gallery_title);
            $('.gal_name').text(data.gallery_title)

			let img_name = JSON.parse(data.gallery_images);
			//console.log(data.gallery_images);
			// // console.log(img_name);
			// let fruitsArray = img.gallery_images;
            // $.each(JSON.parse(fruitsArray), function(index, value){
            // 	alert(value)
            //     // $("#result").append(index + ": " + value + '<br>');
            // });
            $.each(img_name, function(i, resp)
            {
                if (i === 0)
                {
                    $('.gallery_img').append(
                        "<div>\n" +
                        "<div class=\"photography-slider-overlay active position-absolute\" data-target=\"#photography-carousel\" data-slide-to='"+i+"'>\n" +
                        "<img src='"+resp+"' class=\"photography-slider-overlay-inner img-fluid\" alt=\"\"/>\n" +
                        "</div>\n" +
                        "<img src='"+resp+"' class=\"img-fluid\" alt=\"\" />\n" +
                        "</div>"
                    );

                    $('.mobile_gallery_image').append(
                        '<div class="col-4">\n' +
                        '<div class="photography-slider-overlay active position-absolute w-100 h-100" data-target="#photography-carousel-mobile" data-slide-to="'+i+'"></div>\n' +
                        '<img src="'+resp+'" class="img-fluid" alt=""/>\n' +
                        '</div>'
                    )
                }
				else
                {
                    $('.gallery_img').append(
                        "<div>\n" +
                        "<div class=\"photography-slider-overlay position-absolute\" data-target=\"#photography-carousel\" data-slide-to='"+i+"'>\n" +
                        "<img src='"+resp+"' class=\"photography-slider-overlay-inner img-fluid\" alt=\"\"/>\n" +
                        "</div>\n" +
                        "<img src='"+resp+"' class=\"img-fluid\" alt=\"\" />\n" +
                        "</div>"
                    );

                    $('.mobile_gallery_image').append(
                        '<div class="col-4">\n' +
                        '<div class="photography-slider-overlay position-absolute w-100 h-100" data-target="#photography-carousel-mobile" data-slide-to="'+i+'"></div>\n' +
                        '<img src="'+resp+'" class="img-fluid" alt=""/>\n' +
                        '</div>'
                    )
                }

            });

            $('div.slider_image').empty();
            $('.carousel-indicators').empty();
            $('div.mobile_slider_image').empty();

            $.each(img_name, function(i, resp)
            {
                console.log(resp)
                if(i==0){
                    $('.slider_image').append(
                        "<div class=\"carousel-item h-100 active\" data-interval=\"10000\">\n" +
                        "<img src= '"+resp+"' class=\"d-block h-100 w-100\" alt=\"...\">\n" +
                        "</div>"
                    );
                    $('.mobile_slider_image').append
                    (
                        '<div class="carousel-item active" data-interval="10000">\n' +
                        '<img src="'+resp+'" class="img-fluid" alt="...">\n' +
                        '</div>'
                    );
                    $(".carousel-indicators").append(
                        '<li data-target="#photography-carousel" data-slide-to="'+i+'" class="active"></li>'
                    );

                }else {
                    $('.slider_image').append(
                        "<div class=\"carousel-item h-100\" data-interval=\"10000\">\n" +
                        "<img src= '"+resp+"' class=\"d-block h-100 w-100\" alt=\"...\">\n" +
                        "</div>"
                    );

                    $('.mobile_slider_image').append
                    (
                        '<div class="carousel-item" data-interval="10000">\n' +
                        '<img src="'+resp+'" class="img-fluid" alt="...">\n' +
                        '</div>'
                    );
                    $(".carousel-indicators").append(
                        '<li data-target="#photography-carousel" data-slide-to="'+i+'"></li>'
                    );
                }

            });



            var numOfPhotos = parseInt($("#photography-carousel .carousel-item").length); //Number of photos in slider.
            var currentPhoto = 0; //Current photo is 0 when loaded.
            var currentPhotoMobile = numOfPhotos; //Current photo in mobile is numOfPhotos while loaded;
            $("#carousel-counter").html(currentPhoto+1+"/"+numOfPhotos);
            $("#photography-carousel").on("slide.bs.carousel", function () { //When the desktop slider slides.
                currentPhoto = currentPhoto + 1; //current photo should be changed.
                if(currentPhoto<numOfPhotos){ //If it's not beyond last slide
                    $(".photography-slider-overlay").removeClass("active");
                    $(".photography-slider-overlay:eq("+currentPhoto+")").addClass("active");
                    $("#carousel-counter").html(currentPhoto+1+"/"+numOfPhotos);
                } else {
                    currentPhoto = 0;
                    $(".photography-slider-overlay").removeClass("active");
                    $(".photography-slider-overlay:eq("+currentPhoto+")").addClass("active");
                    $("#carousel-counter").html(currentPhoto+1+"/"+numOfPhotos);
                }
            });
            $("#photography-carousel-mobile").on("slide.bs.carousel", function () { //When the desktop slider slides.
                currentPhotoMobile = currentPhotoMobile + 1; //current photo should be changed.
                if(currentPhotoMobile<numOfPhotos*2){ //If it's not beyond last slide
                    $(".photography-slider-overlay").removeClass("active");
                    $(".photography-slider-overlay:eq("+currentPhotoMobile+")").addClass("active");
                } else {
                    currentPhotoMobile = numOfPhotos;
                    $(".photography-slider-overlay").removeClass("active");
                    $(".photography-slider-overlay:eq("+currentPhotoMobile+")").addClass("active");
                }
            });
            $(".photography-slider-overlay").on("click", function () { //While clicking photography slider index.
                var i = $(".photography-slider-overlay").index($(this)); //Getting the index of the photo selected.
                i = parseInt(i); //Parsing the index to integer for later operation
                if(i<numOfPhotos){ //If the number of photos is greater than index it should be desktop view, else it should be the mobile view.
                    currentPhoto = i-1;
                } else {
                    currentPhotoMobile = i-1;
                }
                $(".photography-slider-overlay").removeClass("active");
                $(this).addClass("active");
                $("#carousel-counter").html(currentPhoto+1+"/"+numOfPhotos);
            });


        },
		error: function (resp) {
			console.log(resp)
        }
	});


}



//Final Review by Zubo on 17th September 2019
$(document).ready(function () {

    var numOfPhotos = parseInt($("#photography-carousel .carousel-item").length); //Number of photos in slider.
    var currentPhoto = 0; //Current photo is 0 when loaded.
    var currentPhotoMobile = numOfPhotos; //Current photo in mobile is numOfPhotos while loaded;
    $("#carousel-counter").html(currentPhoto+1+"/"+numOfPhotos);
    $("#photography-carousel").on("slide.bs.carousel", function () { //When the desktop slider slides.
        currentPhoto = currentPhoto + 1; //current photo should be changed.
        if(currentPhoto<numOfPhotos){ //If it's not beyond last slide
            $(".photography-slider-overlay").removeClass("active");
            $(".photography-slider-overlay:eq("+currentPhoto+")").addClass("active");
            $("#carousel-counter").html(currentPhoto+1+"/"+numOfPhotos);
        } else {
            currentPhoto = 0;
            $(".photography-slider-overlay").removeClass("active");
            $(".photography-slider-overlay:eq("+currentPhoto+")").addClass("active");
            $("#carousel-counter").html(currentPhoto+1+"/"+numOfPhotos);
        }
    });
    $("#photography-carousel-mobile").on("slide.bs.carousel", function () { //When the desktop slider slides.
        currentPhotoMobile = currentPhotoMobile + 1; //current photo should be changed.
        if(currentPhotoMobile<numOfPhotos*2){ //If it's not beyond last slide
            $(".photography-slider-overlay").removeClass("active");
            $(".photography-slider-overlay:eq("+currentPhotoMobile+")").addClass("active");
        } else {
            currentPhotoMobile = numOfPhotos;
            $(".photography-slider-overlay").removeClass("active");
            $(".photography-slider-overlay:eq("+currentPhotoMobile+")").addClass("active");
        }
    });
    $(".photography-slider-overlay").on("click", function () { //While clicking photography slider index.
        var i = $(".photography-slider-overlay").index($(this)); //Getting the index of the photo selected.
        i = parseInt(i); //Parsing the index to integer for later operation
        if(i<numOfPhotos){ //If the number of photos is greater than index it should be desktop view, else it should be the mobile view.
            currentPhoto = i-1;
        } else {
            currentPhotoMobile = i-1;
        }
        $(".photography-slider-overlay").removeClass("active");
        $(this).addClass("active");
        $("#carousel-counter").html(currentPhoto+1+"/"+numOfPhotos);
    });

    var numOfVideos = parseInt($("#videography-carousel .carousel-item").length); //Number of photos in slider.
    var currentVideo = 0; //Current photo is 0 when loaded.
    var currentVideoMobile = numOfVideos; //Current photo in mobile is numOfPhotos while loaded;
    $(".videography-carousel-overlay:eq(0)").addClass("active");
    $(".videography-carousel-overlay:eq("+numOfVideos+")").addClass("active");
    $("#videography-carousel").on("slide.bs.carousel", function () { //When the desktop slider slides.
        currentVideo = currentVideo + 1; //current photo should be changed.
        if(currentVideo<numOfVideos){ //If it's not beyond last slide
            $(".videography-carousel-overlay").removeClass("active");
            $(".videography-carousel-overlay:eq("+currentVideo+")").addClass("active");
        } else {
            currentVideo = 0;
            $(".videography-carousel-overlay").removeClass("active");
            $(".videography-carousel-overlay:eq("+currentVideo+")").addClass("active");
        }
    });
    $("#videography-carousel-mobile").on("slide.bs.carousel", function () { //When the desktop slider slides.
        currentVideoMobile = currentVideoMobile + 1; //current photo should be changed.
        if(currentVideoMobile<(numOfVideos*2)){ //If it's not beyond last slide
            $(".videography-carousel-overlay").removeClass("active");
            $(".videography-carousel-overlay:eq("+currentVideoMobile+")").addClass("active");
        } else if (currentVideoMobile == numOfVideos){
            currentVideoMobile = numOfVideos*2-1;
            $(".videography-carousel-overlay").removeClass("active");
            $(".videography-carousel-overlay:eq("+currentVideoMobile+")").addClass("active");
        } else
        {
            currentVideoMobile = numOfVideos;
            $(".videography-carousel-overlay").removeClass("active");
            $(".videography-carousel-overlay:eq("+currentVideoMobile+")").addClass("active");
        }
    });
    $(".videography-carousel-overlay").on("click", function () { //While clicking photography slider index.
        var i = $(".videography-carousel-overlay").index($(this)); //Getting the index of the photo selected.
        i = parseInt(i); //Parsing the index to integer for later operation
        if(i<numOfVideos){ //If the number of photos is greater than index it should be desktop view, else it should be the mobile view.
            currentVideo = i-1;
        } else {
            currentVideoMobile = i-1;
        }
        $(".videography-carousel-overlay").removeClass("active");
        $(this).addClass("active");
    });
});



$(function(){
    $(".video-player").YTPlayer();
});
