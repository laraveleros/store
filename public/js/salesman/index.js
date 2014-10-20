/**
 * 
 */
$('[data-view-action]').click(function(e){
	var $a = $(this);
	e.preventDefault();
	
	$.ajax({
	      url: $a.attr('href'),
	      context: document.body
	    }).done(function(fragment) { 
	      $("#form_content").html(fragment);
	    });
});