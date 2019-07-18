$(document).ready(function() {
  $(".voteMe").click(function() {
    var carId = this.id;
    var upOrDown = carId.split('_');
    var slug = $('#carslug').val();

      $.ajax({
        type: "post",
        url: "view/"+slug,
        cache: false,
        data: 'carId='+upOrDown[0] + '&upOrDown;=' +upOrDown[1],
        success: function(response) {
          try {
            if (response == 'true') {
              var newValue = parseInt($("#"+carId+'_result').text()) + 1;
              $("#"+carId+'_result').html(newValue);
            } else {
              alert('Sorry Unable to update');
            }
          } catch(e) {
            alert('Exception while request..');
          }
        },
        error: function() {
          alert('Error while request..');
        }
      });
  });
});