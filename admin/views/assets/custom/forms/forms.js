
//validacion de formularios desde bootstrap 4


(function () {
  'use strict';
  window.addEventListener('load', function () {
    // Get the forms we want to add validation styles to
    var forms = document.getElementsByClassName('needs-validation');
    // Loop over them and prevent submission
    var validation = Array.prototype.filter.call(forms, function (form) {
      form.addEventListener('submit', function (event) {
        if (form.checkValidity() === false) {
          event.preventDefault();
          event.stopPropagation();
        }
        form.classList.add('was-validated');
      }, false);
    });
  }, false);
})();


//validacion pàra que no existan correos repetidos
function validateRepeat(event, type, table, suffix){


  var data = new FormData();
  data.append("data", event.target.value);
  data.append("table", table);
  data.append("suffix", suffix);

  $.ajax({
    url: "ajax/ajax-validate.php",
    method: "POST",
    data: data,
    contentType: false,
    cache: false,
    processData: false,
    success: function(response){
      
    
      if(response == 200){

        event.target.value = "";
        $(event.target).parent().addClass("was-validated");
        $(event.target).parent().children(".invalid-feedback").html("the data written already exists in the database");

      }else{

        validateJS(event, type);

      }

    }
  
  })


}



//validacion de formularios desde bootstrap 4
function validateJS(event, type) {

  var pattern;

  if (type == "text") pattern = /^[A-Za-zñÑáéíóúÁÉÍÓÚ ]{1,}$/;

  if (type == "t&n") pattern = /^[A-Za-z0-9]{1,}$/;

  if (type == "email") pattern = /^[.a-zA-Z0-9_]+([.][.a-zA-Z0-9_]+)*[@][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{2,4}$/;

  if (type == "pass") pattern = /^[#\\=\\$\\;\\*\\_\\?\\¿\\!\\¡\\:\\.\\,\\0-9a-zA-Z]{1,}$/;

  if (type == "regex") pattern = /^[-\\(\\)\\=\\%\\&\\$\\;\\_\\*\\"\\#\\?\\¿\\!\\¡\\:\\,\\.\\0-9a-zA-ZñÑáéíóúÁÉÍÓÚ ]{1,}$/;

  if (type == "phone") pattern = /^[-\\(\\)\\0-9 ]{1,}$/;

  if (!pattern.test(event.target.value)) {

    $(event.target).parent().addClass("was-validated");
    $(event.target).parent().children(".invalid-feedback").html("Field syntax error");

  }

}


//Initialize Select2 Elements

$('.select2').select2({
  theme: 'bootstrap4'
})


$(document).on("change", ".changeCountry", function () {

  $(".dialCode").html($(this).val().split("_")[1]);

})
