$(function(){

	if($(window).width() < 768){
		$('.typcn-th-menu').click(function(){
			if( $('nav').hasClass('active')){
				$('nav').removeClass('active');
			} else {
				$('nav').addClass('active');
				$('nav').height($(window).height() - 70);
			}
		});
	}
	

	$('.bloc-news').find('div').matchHeight();
	$('.presentation').children('div').matchHeight();
	$('.offres').find('.offre').matchHeight();


	// WINDOW RESIZE
	$( window ).resize(function(){ 
		if($(window).width() < 768){
			$('nav').height($(window).height() - 70);
		}
	});

});
