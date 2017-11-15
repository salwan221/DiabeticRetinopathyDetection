
          $("#register_patient_form").validate({
              submitHandler: enterPatientDetails
          });
         
          function enterPatientDetails() {
              $.ajax({
                  type: "post",
                  url: "enter_patient_details.php",
                  data: {name: $("#name").val(), age: $("#age").val(), mobile_no: $("#mobile_no").val(), address: $("#address").val()},
                  success: function (output) {
                  	console.log('print this : '+output);
                      if(output!="-1"){
                          $msg="<div class='alert alert-danger' role='alert'>Patient details saved successfully. Patient Id : "+ output+"</div>";
                      }
                      else{
                          $msg="<div class='alert alert-danger' role='alert'>Error saving details. Try again!</div>";
                      }
                      $("#signupResponseMsg").html($msg);
                  }
              });
              //return false;
          }

