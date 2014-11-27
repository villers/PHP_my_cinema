// gere la position du menu
$(document).ready(function() {
    $(window).bind("load resize", function() {
        width = (this.window.innerWidth > 0) ? this.window.innerWidth : this.screen.width;
        if (width < 768) {
            $('div.sidebar-collapse').addClass('collapse')
        } else {
            $('div.sidebar-collapse').removeClass('collapse')
        }
    })
})

// Gere les buttons nbrPage
$(document).ready(function() {	
	$('#nbelemnt').on('submit', function(e){
		e.preventDefault();
		
		var nbElement = $('input#limit').val();

		$.ajax({
		  url: $base_url+'json/nbPage/'+nbElement,
		  type: 'GET',
		  success: function(data, textStatus, xhr) {
		    location.reload();
		  }
		});

	});
});

$('.popup').tooltip();