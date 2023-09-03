<script>
  $(document).ready(function(){
   $('#username_textfield').blur(function(){

   var member_username = $(this).val();
    $.ajax({
     url:'checkmember.php',
     method:"POST",
     data:{user_name:member_username},
      success:function(data)
   {
    //    alert(data);
        if(data != '000')
        {
         $('#availability2').html('<span class="text-danger" id="username_validity">User Existing</span>');
         $('#Submit').attr("disabled", true);

        }
        else
        {
         $('#availability2').html('<span class="text-success" id="username_validity">Username Available</span>');
         $('#Submit').attr("disabled", false);

        }
       }
     })

   });
  });
 </script>

<script>
 $(document).ready(function(){
   $('#agent_id').blur(function(){

     var agent_id = $(this).val();

     $.ajax({
      url:'checkagent.php',
      method:"POST",
      data:{agent:agent_id},
      success:function(data)
      {
       if(data != '0')
       {
        $('#availability1').html('<span class="text-success">Valid');
        $('#Submit').attr("disabled", false);

       }
       else
       {
        $('#availability1').html('<span class="text-danger">Agent ID Not Found');
        $('#Submit').attr("disabled", true);

       }
      }
     })

  });
 });
</script>

<script>
 $(document).ready(function(){
   $('#agent_username').blur(function(){

     var agent_username = $(this).val();

     $.ajax({
      url:'checkusename.php',
      method:"POST",
      data:{username:agent_username},
      success:function(data)
      {
       if(data != '0')
       {
        $('#availability').html('<span class="text-success" id="affiliate_code_validity">Valid');
        $('#Submit').attr("disabled", false);

       }
       else
       {
        $('#availability').html('<span class="text-danger" id="affiliate_code_validity">Coupon Not Found');
        $('#Submit').attr("disabled", true);

       }
      }
     })

  });
 });
</script>



<script>
// Example starter JavaScript for disabling form submissions if there are invalid fields
(function() {
  'use strict';
  window.addEventListener('load', function() {
    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    var forms = document.getElementsByClassName('needs-validation');
    // Loop over them and prevent submission
    var validation = Array.prototype.filter.call(forms, function(form) {
      form.addEventListener('submit', function(event) {
        if (form.checkValidity() === false) {
          event.preventDefault();
          event.stopPropagation();
        }
        form.classList.add('was-validated');
      }, false);
    });
  }, false);
})();
</script>

<!-- If using a CDN -->

<!-- <script src = "https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js">
</script> -->
<script type="text/javascript">
        function select_data_using_order_id(action){
        $(document).ready(function(){
            var data = {
            action: action,
            order_id: $("#order_id").val(),
            };

            $.ajax({
            url: 'index_ajax.php',
            type: 'post',
            data: data,
            success:function(response){

                var parsedResponse = JSON.parse(response);

                
                if(parsedResponse[7] == "Order_ID_not_found")
                {
                    Swal.fire({
                        title: "Invalid!",
                        text: "Order ID is not found",
                        icon: 'error',
                        confirmButtonText: 'Okay'
                    });
                    document.getElementById("firstname").value = parsedResponse[0];
                    document.getElementById("firstname").style.backgroundColor = "white";
                        
                    document.getElementById("lastname").value = parsedResponse[1];
                    document.getElementById("lastname").style.backgroundColor = "white";

                    document.getElementById("street_address").value = parsedResponse[2];
                    document.getElementById("street_address").style.backgroundColor = "white";

                    document.getElementById("town_city").value = parsedResponse[3];
                    document.getElementById("town_city").style.backgroundColor = "white";

                    document.getElementById("postcode").value = parsedResponse[4];
                    document.getElementById("postcode").style.backgroundColor = "white";

                    document.getElementById("email").value = parsedResponse[5];
                    document.getElementById("email").style.backgroundColor = "white";

                    document.getElementById("number").value = parsedResponse[6];
                    document.getElementById("number").style.backgroundColor = "white";
                }
                else
                {
                    document.getElementById("firstname").value = parsedResponse[0];
                    document.getElementById("firstname").style.backgroundColor = "#E8F0FE";
                        
                    document.getElementById("lastname").value = parsedResponse[1];
                    document.getElementById("lastname").style.backgroundColor = "#E8F0FE";

                    document.getElementById("street_address").value = parsedResponse[2];
                    document.getElementById("street_address").style.backgroundColor = "#E8F0FE";

                    document.getElementById("town_city").value = parsedResponse[3];
                    document.getElementById("town_city").style.backgroundColor = "#E8F0FE";

                    document.getElementById("postcode").value = parsedResponse[4];
                    document.getElementById("postcode").style.backgroundColor = "#E8F0FE";

                    document.getElementById("email").value = parsedResponse[5];
                    document.getElementById("email").style.backgroundColor = "#E8F0FE";

                    document.getElementById("number").value = parsedResponse[6];
                    document.getElementById("number").style.backgroundColor = "#E8F0FE";
                }
                
                // Swal.fire({
                //     title: parsedResponse[0],
                //     text: parsedResponse[1],
                //     icon: 'success',
                //     confirmButtonText: 'Okay'
                // });

                close_loading();
            }
            });
        });
        }
</script>
<script src = "https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script>
    var otp = 0;
    function submitMember_function()
    {
        if (document.getElementById("username_textfield").value.trim() == "")
        {
            document.getElementById("username_textfield").setCustomValidity("Please fill out this field.");
            document.getElementById("username_textfield").reportValidity();
            Swal.fire(
              'Invalid!',
              'Please put your username!',
              'error'
            )
        }
        else if (document.getElementById("username_textfield").value.trim().length < 5)
        {
            document.getElementById("username_textfield").setCustomValidity("Username must be at least 5 characters long.");
            document.getElementById("username_textfield").reportValidity();
            Swal.fire(
              'Invalid!',
              'Username must be at least 5 characters long!',
              'error'
            )
        }
        else if (document.getElementById("username_textfield").value.trim().length > 18)
        {
            document.getElementById("username_textfield").setCustomValidity("Username must be 18 characters or less.");
            document.getElementById("username_textfield").reportValidity();
            Swal.fire(
              'Invalid!',
              'Username must be 18 characters or less!',
              'error'
            )
        }
        else if (document.getElementById("password_textfield").value == "")
        {
            document.getElementById("password_textfield").setCustomValidity("Please fill out this field.");
            document.getElementById("password_textfield").reportValidity();

            Swal.fire(
              'Invalid!',
              'Please put your password!',
              'error'
            )
        }
        else if (document.getElementById("confirm_password_textfield").value == "")
        {
            document.getElementById("confirm_password_textfield").setCustomValidity("Please fill out this field.");
            document.getElementById("confirm_password_textfield").reportValidity();

            Swal.fire(
              'Invalid!',
              'Please put your confirm password!',
              'error'
            )
        }
        else if (document.getElementById("confirm_password_textfield").value !== document.getElementById("password_textfield").value) {
            document.getElementById("confirm_password_textfield").setCustomValidity("Passwords do not match");
            document.getElementById("confirm_password_textfield").reportValidity();

            Swal.fire(
                'Invalid!',
                'Passwords are not the same!',
                'error'
            );
        }
        else if (
            !/\d/.test(document.getElementById("password_textfield").value) ||  // Check for at least 1 number
            !/[a-z]/.test(document.getElementById("password_textfield").value) ||  // Check for at least 1 lowercase letter
            !/[A-Z]/.test(document.getElementById("password_textfield").value) ||  // Check for at least 1 uppercase letter
            !/[!@#$%^&*()_+{}\[\]:;<>,.?~\-]/.test(document.getElementById("password_textfield").value) ||  // Check for at least 1 special character
            document.getElementById("password_textfield").value.length < 8  // Check for at least 8 characters
        ) 
        {
          document.getElementById("password_textfield").setCustomValidity("Passwords do not match");
          document.getElementById("password_textfield").reportValidity();

          var ekis = '<i class="fas fa-times-circle" style="color: red;"></i>';
          var checkk = '<i class="fas fa-check-circle" style="color: green;"></i>';
          var one_number_icon = "";
          var one_lowercase_icon = "";
          var one_uppercase_icon = "";
          var one_special_char_icon = "";
          var eight_chars_icon = "";

          if(!/\d/.test(document.getElementById("password_textfield").value))
            one_number_icon = ekis;
          else
            one_number_icon = checkk;

          if(!/[a-z]/.test(document.getElementById("password_textfield").value))
            one_lowercase_icon = ekis;
          else
            one_lowercase_icon = checkk;

          if(!/[A-Z]/.test(document.getElementById("password_textfield").value))
            one_uppercase_icon = ekis;
          else
            one_uppercase_icon = checkk;

          if(!/[!@#$%^&*()_+{}\[\]:;<>,.?~\-]/.test(document.getElementById("password_textfield").value))
            one_special_char_icon = ekis;
          else
            one_special_char_icon = checkk;

          if(document.getElementById("password_textfield").value.length < 8)
            eight_chars_icon = ekis;
          else
            eight_chars_icon = checkk;

          Swal.fire({
              title: 'Invalid Password!',
              html: `
                  `+one_number_icon+` Must Contain at least one number!<br>
                  `+one_lowercase_icon+` Must Contain at least one lowercase letter!<br>
                  `+one_uppercase_icon+` Must Contain at least one uppercase letter!<br>
                  `+one_special_char_icon+` Must Contain at least one special character (!@#$%^&*()_+{}\[\]:;<>,.?~\-)<br>
                  `+eight_chars_icon+` Length must be atleast 8 characters!<br>
              `,
              icon: 'error'
          });

        }
        else if (document.getElementById("student_number_textfield").value.trim() == "")
        {
            document.getElementById("student_number_textfield").setCustomValidity("Please fill out this field.");
            document.getElementById("student_number_textfield").reportValidity();

            Swal.fire(
              'Invalid!',
              'Please put your Student Number!',
              'error'
            )
        }
        else if (document.getElementById("institute_email_textfield").value.trim() == "")
        {
            document.getElementById("institute_email_textfield").setCustomValidity("Please fill out this field.");
            document.getElementById("institute_email_textfield").reportValidity();

            Swal.fire(
              'Invalid!',
              'Please put your Institute Email!',
              'error'
            )
        }
        else if (!document.getElementById("institute_email_textfield").value.endsWith("@paterostechnologicalcollege.edu.ph"))
        {
            document.getElementById("institute_email_textfield").setCustomValidity("Email must end with @paterostechnologicalcollege.edu.ph.");
            document.getElementById("institute_email_textfield").reportValidity();

            Swal.fire(
              'Invalid!',
              'Email is invalid! You must put your Institute Email!',
              'error'
            )
        }
        else if (document.getElementById("student_type_dropdownlist").value.trim() == "")
        {
            document.getElementById("student_type_dropdownlist").setCustomValidity("Please fill out this field.");
            document.getElementById("student_type_dropdownlist").reportValidity();

            Swal.fire(
              'Invalid!',
              'Please select your Student Type!',
              'error'
            )
        }
        else if (document.getElementById("course_textfield").value.trim() == "")
        {
            document.getElementById("course_textfield").setCustomValidity("Please fill out this field.");
            document.getElementById("course_textfield").reportValidity();

            Swal.fire(
              'Invalid!',
              'Please put your Course!',
              'error'
            )
        }
        else if (document.getElementById("first_name_textfield").value.trim() == "")
        {
            document.getElementById("first_name_textfield").setCustomValidity("Please fill out this field.");
            document.getElementById("first_name_textfield").reportValidity();

            Swal.fire(
              'Invalid!',
              'Please put your First Name!',
              'error'
            )
        }
        else if (document.getElementById("last_name_textfield").value.trim() == "")
        {
            document.getElementById("last_name_textfield").setCustomValidity("Please fill out this field.");
            document.getElementById("last_name_textfield").reportValidity();

            Swal.fire(
              'Invalid!',
              'Please put your Last Name!',
              'error'
            )
        }
        else if (document.getElementById("gender_dropdownlist").value.trim() == "")
        {
            document.getElementById("gender_dropdownlist").setCustomValidity("Please fill out this field.");
            document.getElementById("gender_dropdownlist").reportValidity();

            Swal.fire(
              'Invalid!',
              'Please select your Gender!',
              'error'
            )
        }
        else if (document.getElementById("birthday_textfield").value.trim() == "")
        {
            document.getElementById("birthday_textfield").setCustomValidity("Please fill out this field.");
            document.getElementById("birthday_textfield").reportValidity();

            Swal.fire(
              'Invalid!',
              'Please put your Birthday!',
              'error'
            )
        }
        else if (document.getElementById("contact_no_textfield").value.trim() == "")
        {
            document.getElementById("contact_no_textfield").setCustomValidity("Please fill out this field.");
            document.getElementById("contact_no_textfield").reportValidity();

            Swal.fire(
              'Invalid!',
              'Please put your Contact No.!',
              'error'
            )
        }
        else if (!document.getElementById("contact_no_textfield").value.startsWith("09"))
        {
            document.getElementById("contact_no_textfield").setCustomValidity("0");
            document.getElementById("contact_no_textfield").reportValidity();

            Swal.fire(
              'Invalid!',
              'Please Enter valid contact Number!',
              'error'
            )
        }
        else if (document.getElementById("contact_no_textfield").value.length < 11)
        {
            document.getElementById("contact_no_textfield").setCustomValidity("0");
            document.getElementById("contact_no_textfield").reportValidity();

            Swal.fire(
              'Invalid!',
              'Please Enter valid contact Number!',
              'error'
            )
        }
        else if (document.getElementById("street_address_textfield").value.trim() == "")
        {
            document.getElementById("street_address_textfield").setCustomValidity("Please fill out this field.");
            document.getElementById("street_address_textfield").reportValidity();

            Swal.fire(
              'Invalid!',
              'Please put your Street Address!',
              'error'
            )
        }
        else if (document.getElementById("province_dropdownlist").value.trim() == "")
        {
            document.getElementById("province_dropdownlist").setCustomValidity("Please fill out this field.");
            document.getElementById("province_dropdownlist").reportValidity();

            Swal.fire(
              'Invalid!',
              'Please select your Province!',
              'error'
            )
        }
        else if (document.getElementById("town_city_dropdownlist").value.trim() == "")
        {
            document.getElementById("town_city_dropdownlist").setCustomValidity("Please fill out this field.");
            document.getElementById("town_city_dropdownlist").reportValidity();

            Swal.fire(
              'Invalid!',
              'Please select your Town / City!',
              'error'
            )
        }
        else if (document.getElementById("barangay_dropdownlist").value.trim() == "")
        {
            document.getElementById("barangay_dropdownlist").setCustomValidity("Please fill out this field.");
            document.getElementById("barangay_dropdownlist").reportValidity();

            Swal.fire(
              'Invalid!',
              'Please select your Barangay!',
              'error'
            )
        }
        else if (!document.getElementById("agree_checkbox").checked)
        {
            // document.getElementById("barangay_dropdownlist").setCustomValidity("Please fill out this field.");
            // document.getElementById("barangay_dropdownlist").reportValidity();

            Swal.fire(
              'Invalid!',
              'Please Agree to terms and conditions!',
              'error'
            )
        }
        else 
        {
            open_loading();
            var existing_username = false;
            var data = 
            {
                action1: 'check_username_if_exists',
                username_textfield: document.getElementById("username_textfield").value.trim(),
            };

            $.ajax({
                url: 'registration_form_ajax.php',
                type: 'post',
                data: data,

                success:function(response)
                {

                    if(response.trim() == "existing_username")
                        existing_username = true;
                    else
                        existing_username = false;
                    // var parsedResponse = JSON.parse(response);
                    // alert(response);
                    

                }
            });
            
            setTimeout(function() {
                if(existing_username == true)
                {
                    close_loading();  
                    // setTimeout(function() {
                    Swal.fire(
                        'Invalid!',
                        'Username already exists! Please try a different one!',
                        'error'
                    );
                    document.getElementById("username_textfield").scrollIntoView();
                    document.getElementById("username_textfield").focus();
                    // }, 1000);
                }
                else
                {
                    if(pede_na_magsend == true)
                    {
                        document.getElementById("resend-link").click();
                    }
                    else
                    {
                        close_loading();
                        $('#otp_modal').modal('show');
                    }
                }     
            }, 1000);
        }
    }

    function send_otp_to_contact_number_function()
    {
        document.getElementById("otp_modal_contact_number").innerHTML = document.getElementById("contact_no_textfield").value.trim();
        otp = Math.floor(100000 + Math.random() * 900000);
        // alert(otp);

        var data = 
        {
            action1: 'send_otp_to_contact_no',
            contact_no_textfield: document.getElementById("contact_no_textfield").value.trim(),
            otp: otp,
        };

        $.ajax({
            url: 'registration_form_ajax.php',
            type: 'post',
            data: data,

            success:function(response)
            {
                var parsedResponse = JSON.parse(response);
                if(parsedResponse['message'] == "Success")
                {
                    close_loading();  
                    $('#otp_modal').modal('show');
                }
                else
                {
                    close_loading();
                    insert_to_dbb();
                    // Swal.fire(
                    //     'Invalid!',
                    //     'Contact Number is not verified!',
                    //     'error'
                    // );
                }
            }
        });
    }

    function resend_otp()
    {
        send_otp_to_contact_number_function();
    }

    function insert_to_dbb()
    {
        var data = 
        {
            action1: 'student_registration_ajax',
            username_textfield: document.getElementById("username_textfield").value.trim(),
            password_textfield: document.getElementById("password_textfield").value,
            student_number_textfield: document.getElementById("student_number_textfield").value.trim(),
            institute_email_textfield: document.getElementById("institute_email_textfield").value.trim(),
            student_type_dropdownlist: document.getElementById("student_type_dropdownlist").value.trim(),
            course_textfield: document.getElementById("course_textfield").value.trim(),
            first_name_textfield: document.getElementById("first_name_textfield").value.trim(),
            middle_name_textfield: document.getElementById("middle_name_textfield").value.trim(),
            last_name_textfield: document.getElementById("last_name_textfield").value.trim(),
            suffix_textfield: document.getElementById("suffix_textfield").value.trim(),
            gender_dropdownlist: document.getElementById("gender_dropdownlist").value.trim(),
            birthday_textfield: document.getElementById("birthday_textfield").value.trim(),
            contact_no_textfield: document.getElementById("contact_no_textfield").value.trim(),
            street_address_textfield: document.getElementById("street_address_textfield").value.trim(),
            province_dropdownlist: document.getElementById("province_dropdownlist").value.trim(),
            town_city_dropdownlist: document.getElementById("town_city_dropdownlist").value.trim(),
            barangay_dropdownlist: document.getElementById("barangay_dropdownlist").value.trim(),
            postcode_textfield: document.getElementById("postcode_textfield").value.trim(),
        };

        $.ajax({
            url: 'registration_form_ajax.php',
            type: 'post',
            data: data,

            success:function(response){
            // alert(response);
            
            if(response.trim() == "username_existing")
            {
                setTimeout(function() {
                    Swal.fire(
                        'Invalid!',
                        'Username already exists! Please try a different one!',
                        'error'
                    );
                    close_loading();
                    document.getElementById("username_textfield").scrollIntoView();
                    document.getElementById("username_textfield").focus();
                }, 1000);
            }
            else
            {
                var loginPageURL = '../login/login.php';
                window.location.href = loginPageURL;
            }
            }
        
        });
    }

    function verify_otp_button()
    {
        if(otp == document.getElementById("otp_modal_otp_textfield").value) //if same
        {
            // alert("same");
            open_loading();
            insert_to_dbb();
        }
        else
        {
            Swal.fire(
                'Invalid!',
                'The entered OTP is incorrect.',
                'error'
            );
        }
    }

    function select_province_ajax()
    {
      // alert(document.getElementById("province_dropdownlist").value);

      var data = 
      {
        action1: 'select_province_ajax',
        province_dropdownlist: document.getElementById("province_dropdownlist").value,
      };

      $.ajax({
        url: 'registration_form_ajax.php',
        type: 'post',
        data: data,

        success:function(response)
        {
          // alert(response); //alert metro manila
          document.getElementById("town_city_dropdownlist").innerHTML = response;
          document.getElementById("barangay_dropdownlist").innerHTML = "";
        }

      });
    }

    function select_town_city_ajax()
    {
      // alert(document.getElementById("town_city_dropdownlist").value);
      
      var data = 
      {
        action1: 'select_town_city_ajax',
        town_city_dropdownlist: document.getElementById("town_city_dropdownlist").value,
      };

      $.ajax({
        url: 'registration_form_ajax.php',
        type: 'post',
        data: data,

        success:function(response)
        {
          // alert(response); //alert metro manila
          document.getElementById("barangay_dropdownlist").innerHTML = response;
        }

      });
    }
</script>
