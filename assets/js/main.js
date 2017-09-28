(function ( $ ) {


	$.fn.extend({
		bkc_gallery: function (options) {

			var settings = {
				images: []
			};
			$.extend(settings, options);

			for (var i in settings.images) {
				image_container = $('<div>');
				image = $('<img>');
				image.attr('src', settings.images[i]);
				image.appendTo(image_container);
				image_container.appendTo($(this));
			}
		}
	});

	



	var images_source = [];
	for (var i = 1; i <= 5; i++) {
		images_source[i] = './assets/img/'+i+'.jpg';
	}

	$('#gallery').bkc_gallery({
		images: images_source
	});



})( jQuery );


