$(function () {

var text = "html";


    var adminsTable = $("#adminsTable").DataTable({
      "responsive": true,
      "lengthChange": true, 
      "aLengthMenu": [[10,50,100,500,1000],[10,50,100,500,1000]], 
      "autoWidth": false,
      "processing":true,
      "serverSide":true,
      "ajax":{
        "url":"ajax/data-admins.php?text="+text,
        "type":"POST"
      },
      "columns":[
        {"data": "id_user"},
        {"data": "displayname_user"},
        {"data": "username_user"},
        {"data": "email_user"},
        {"data": "country_user"},
        {"data": "city_user"},
        {"data": "date_created_user"},
        {"data": "actions", "orderable":false},
  
      ],
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"],
    })
    $("#adminsTable").on("draw.dt",function(){
      setTimeout(function(){
    adminsTable.buttons().container().appendTo('#adminsTable_wrapper .col-md-6:eq(0)');
  },10)
  })
  });



/*=============================================
Eliminar registro
=============================================*/

$(document).on("click",".removeItem",function(){

    var idItem = $(this).attr("idItem");
    var table = $(this).attr("table");
    var suffix = $(this).attr("suffix");
    var page = $(this).attr("page");

    fncSweetAlert("confirm","Are you sure to delete this record?","").then(resp=>{

      if(resp){

        var data = new FormData();
        data.append("idItem", idItem);
        data.append("table", table);
        data.append("suffix", suffix);
        data.append("token", localStorage.getItem("token_user"));

        $.ajax({  

          url: "ajax/ajax-delete.php",
          method: "POST",
          data: data,
          contentType: false,
          cache: false,
          processData: false,
          success: function (response){   
            console.log("response", response);
           
           if(response == 200){

                fncSweetAlert(
                  "success",
                  "The record has been successfully deleted",
                  "/"+page
                 
                );

            }else{

              fncNotie(3, "error deleting the record");

            }

          }

        })

      }

    })
})
