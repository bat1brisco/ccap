$(document).ready(function(){

		// Initialize
		$('.ratingbar').rating({
	    	showCaption:false,
	    	showClear: false,
	    	size: 'lg'
	    });

		// Rating change
	 //    $('.ratingbar').on('rating:change', function(event, value, caption) {
	 //    	var id = this.id;
	 //    	var splitid = id.split('_');
	 //    	var postid = splitid[1];
	    	
		//    	$.ajax({
		//    		url: '<?= base_url() ?>index.php/posts/updateRating',
		//    		type: 'post',
		//    		data: {postid: postid, rating: value},
		//    		success: function(response){
		//    			$('#averagerating_'+postid).text(response);
		//    		}
		//    	});
		// });
	});