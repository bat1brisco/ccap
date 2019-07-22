$(document).ready(function(){  
    
  var dataTable = $('#transaction_data').DataTable({  
       "processing":true,  
       "serverSide":true,  
       "order":[],  
       "ajax":{  
            url:'transactions/fetch_transactions',  
            type:"POST"  
       },  
       "columnDefs":[  
            {  
                 "targets":[0, 2, 3],  
                 "orderable":false,  
            },  
       ],  
  });  
    
  $(document).on('click', '.update', function(){  
    var transaction_id = $(this).attr("id");  
      $.ajax({  
        url:"transactions/fetch_single_transaction",  
        method:"POST",  
        data:{transaction_id:transaction_id},  
        dataType:"json",  
        success:function(data) {  
          $('#transactionModal').modal('show');  
          $('#car_make').val(data.car_make);  
          $('#car_model').val(data.car_model);  
          $('.modal-title').text("Update Transaction");  
          $('#transaction_id').val(transaction_id);  
          $('#user_uploaded_image').html(data.userfile);  
          $('#action').val("Edit");  
        }  
      })  
  });  
});