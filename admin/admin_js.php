<?php
  require '../connections/my_cnx.php';
?>
<script>
  var pinindot_na_date = "";
  function r_and_r_all_radiobutton()
  {
    document.getElementById("r_and_r_all_panel").style.display = "block";
    document.getElementById("r_and_r_1_panel").style.display = "none";
    document.getElementById("r_and_r_2_panel").style.display = "none";
    document.getElementById("r_and_r_3_panel").style.display = "none";
    document.getElementById("r_and_r_4_panel").style.display = "none";
    document.getElementById("r_and_r_5_panel").style.display = "none";
  }
  function r_and_r_1_radiobutton()
  {
    document.getElementById("r_and_r_all_panel").style.display = "none";
    document.getElementById("r_and_r_1_panel").style.display = "block";
    document.getElementById("r_and_r_2_panel").style.display = "none";
    document.getElementById("r_and_r_3_panel").style.display = "none";
    document.getElementById("r_and_r_4_panel").style.display = "none";
    document.getElementById("r_and_r_5_panel").style.display = "none";
  }
  function r_and_r_2_radiobutton()
  {
    document.getElementById("r_and_r_all_panel").style.display = "none";
    document.getElementById("r_and_r_1_panel").style.display = "none";
    document.getElementById("r_and_r_2_panel").style.display = "block";
    document.getElementById("r_and_r_3_panel").style.display = "none";
    document.getElementById("r_and_r_4_panel").style.display = "none";
    document.getElementById("r_and_r_5_panel").style.display = "none";
  }
  function r_and_r_3_radiobutton()
  {
    document.getElementById("r_and_r_all_panel").style.display = "none";
    document.getElementById("r_and_r_1_panel").style.display = "none";
    document.getElementById("r_and_r_2_panel").style.display = "none";
    document.getElementById("r_and_r_3_panel").style.display = "block";
    document.getElementById("r_and_r_4_panel").style.display = "none";
    document.getElementById("r_and_r_5_panel").style.display = "none";
  }
  function r_and_r_4_radiobutton()
  {
    document.getElementById("r_and_r_all_panel").style.display = "none";
    document.getElementById("r_and_r_1_panel").style.display = "none";
    document.getElementById("r_and_r_2_panel").style.display = "none";
    document.getElementById("r_and_r_3_panel").style.display = "none";
    document.getElementById("r_and_r_4_panel").style.display = "block";
    document.getElementById("r_and_r_5_panel").style.display = "none";
  }
  function r_and_r_5_radiobutton()
  {
    document.getElementById("r_and_r_all_panel").style.display = "none";
    document.getElementById("r_and_r_1_panel").style.display = "none";
    document.getElementById("r_and_r_2_panel").style.display = "none";
    document.getElementById("r_and_r_3_panel").style.display = "none";
    document.getElementById("r_and_r_4_panel").style.display = "none";
    document.getElementById("r_and_r_5_panel").style.display = "block";
  }
</script>
<script>
  var tempp = document.getElementById("process_course_innerHTML").innerHTML;
  var tempp2 = document.getElementById("update_process_course_innerHTML").innerHTML;
  function add_user_button(){
    
    // Clear input values
    document.getElementById("username_admin_input").value = "";
    document.getElementById("password_admin_input").value = "";

    document.getElementById("process_course_innerHTML").innerHTML = "";
    document.getElementById("process_course_innerHTML").innerHTML = tempp;
    new MultiSelectTag('process_course_dropdownlist')

    document.getElementById("firstname_admin_input").value = "";
    document.getElementById("middlename_admin_input").value = "";
    document.getElementById("lastname_admin_input").value = "";


  }

  function add_event_button(){
    
    //clear input values
    document.getElementById("event_textfield").value = "";

  }


</script>

<script>
  function update_admin_function()
  {
    var update_id_admin_input = document.getElementById("update_id_admin_input");
    var update_username_admin_input = document.getElementById("update_username_admin_input");
    var update_password_admin_input = document.getElementById("update_password_admin_input");
    var update_firstname_admin_input = document.getElementById("update_firstname_admin_input");
    var update_middlename_admin_input = document.getElementById("update_middlename_admin_input");
    var update_lastname_admin_input = document.getElementById("update_lastname_admin_input");

    var selectElement12 = document.getElementById("update_process_course_dropdownlist");
    var update_selected_process_course = [];

    for (var i = 0; i < selectElement12.options.length; i++) {
      if (selectElement12.options[i].selected) {
        update_selected_process_course.push(selectElement12.options[i].value);
      }
    }

    if (update_username_admin_input.value == "")
    {
      update_username_admin_input.setCustomValidity("Please fill out this field.");
      update_username_admin_input.reportValidity();
    }
    else if (update_password_admin_input.value == "")
    {
      update_password_admin_input.setCustomValidity("Please fill out this field.");
      update_password_admin_input.reportValidity();
    }
    else if(update_selected_process_course == "")
    {
      Swal.fire(
        'Invalid!',
        'Please select process Course!',
        'error'
      );
    }
    else if (update_firstname_admin_input.value == "")
    {
      update_firstname_admin_input.setCustomValidity("Please fill out this field.");
      update_firstname_admin_input.reportValidity();
    }
    else if (update_middlename_admin_input.value == "")
    {
      update_middlename_admin_input.setCustomValidity("Please fill out this field.");
      update_middlename_admin_input.reportValidity();
    }
    else if (update_lastname_admin_input.value == "")
    {
      update_lastname_admin_input.setCustomValidity("Please fill out this field.");
      update_lastname_admin_input.reportValidity();
    }
    else
    {
      var data = 
      {
          action: 'update_admin_ajax',
          update_id_admin_input:update_id_admin_input.value.trim(),
          update_username_admin_input:update_username_admin_input.value.trim(),
          update_password_admin_input:update_password_admin_input.value.trim(),
          update_firstname_admin_input:update_firstname_admin_input.value.trim(),
          update_middlename_admin_input:update_middlename_admin_input.value.trim(),
          update_lastname_admin_input:update_lastname_admin_input.value.trim(),
          update_selected_process_course:update_selected_process_course.join(" --- "),
      };

      $.ajax({
      url: 'admin_ajax.php',
      type: 'post',
      data: data,

      success:function(response)
      {
        var parsedResponse = JSON.parse(response);
        
        if(parsedResponse[0].trim() == "update_success")
        {
          Swal.fire(
            'Updated!',
            'Updating data successfully!',
            'success'
          );

          if(document.getElementById("admin_id").value == parsedResponse[8])
          {
            document.getElementById("my_account_id").value = parsedResponse[8];  
            document.getElementById("my_account_admin_type").value = parsedResponse[7];
            document.getElementById("my_account_username").value = parsedResponse[2];
            document.getElementById("my_account_password").value = parsedResponse[3];
            document.getElementById("my_account_first_name").value = parsedResponse[4];
            document.getElementById("my_account_middle_name").value = parsedResponse[5];
            document.getElementById("my_account_last_name").value = parsedResponse[6];
            
            document.getElementById("topnavbar_username").innerHTML = parsedResponse[2].toUpperCase();
            document.getElementById("topnavbar_name").innerHTML = parsedResponse[4].toUpperCase() + " " + parsedResponse[6].toUpperCase();

          }

          $('#update_user_modall').modal('hide'); 

          $('#admin_users_table').DataTable().destroy();
          setTimeout(function() {
            document.getElementById("admin_users_tbody").innerHTML = parsedResponse[1];
            $('#admin_users_table').DataTable();
          }, 500);
        }
        else if(parsedResponse[0].trim() == "update_failed_dahil_may_existing_username")
        {
          document.getElementById("update_username_admin_input").focus();

          Swal.fire(
            'Failed!',
            'Username already existing!',
            'error'
          );
        }
        
      }

      });
    }
  }

  function my_account_update_button()
  {
    if (document.getElementById("my_account_username").value === "")
    {
      document.getElementById("my_account_username").setCustomValidity("Please fill out this field.");
      document.getElementById("my_account_username").reportValidity();
    }
    else if (document.getElementById("my_account_password").value === "")
    {
      document.getElementById("my_account_password").setCustomValidity("Please fill out this field.");
      document.getElementById("my_account_password").reportValidity();
    }
    
    else if (document.getElementById("my_account_first_name").value == "")
    {
      document.getElementById("my_account_first_name").setCustomValidity("Please fill out this field.");
      document.getElementById("my_account_first_name").reportValidity();
    }
    else if (document.getElementById("my_account_middle_name").value == "")
    {
      document.getElementById("my_account_middle_name").setCustomValidity("Please fill out this field.");
      document.getElementById("my_account_middle_name").reportValidity();
    }
    else if (document.getElementById("my_account_last_name").value == "")
    {
      document.getElementById("my_account_last_name").setCustomValidity("Please fill out this field.");
      document.getElementById("my_account_last_name").reportValidity();
    }
    else
    {
      var data = 
      {
          action: 'my_account_update_ajax',
          my_account_username: document.getElementById("my_account_username").value.trim(),
          my_account_password:document.getElementById("my_account_password").value.trim(),
          my_account_first_name:document.getElementById("my_account_first_name").value.trim(),
          my_account_middle_name:document.getElementById("my_account_middle_name").value.trim(),
          my_account_last_name:document.getElementById("my_account_last_name").value.trim(),
      };

      $.ajax({
      url: 'admin_ajax.php',
      type: 'post',
      data: data,

      success:function(response)
      {
        var parsedResponse = JSON.parse(response);

        // alert(parsedResponse[0]);
        
        if(parsedResponse[0].trim() == "update_success")
        {
          Swal.fire(
            'Updated!',
            'Updating data successfully!',
            'success'
          );

          if(document.getElementById("admin_id").value == parsedResponse[8])
          {
            document.getElementById("my_account_id").value = parsedResponse[8];  
            document.getElementById("my_account_admin_type").value = parsedResponse[7];
            document.getElementById("my_account_username").value = parsedResponse[2];
            document.getElementById("my_account_password").value = parsedResponse[3];
            document.getElementById("my_account_first_name").value = parsedResponse[4];
            document.getElementById("my_account_middle_name").value = parsedResponse[5];
            document.getElementById("my_account_last_name").value = parsedResponse[6];
            
            document.getElementById("topnavbar_username").innerHTML = parsedResponse[2].toUpperCase();
            document.getElementById("topnavbar_name").innerHTML = parsedResponse[4].toUpperCase() + " " + parsedResponse[6].toUpperCase();

          }

          // $('#update_user_modall').modal('hide'); 

          $('#admin_users_table').DataTable().destroy();
          setTimeout(function() {
            document.getElementById("admin_users_tbody").innerHTML = parsedResponse[1];
            $('#admin_users_table').DataTable();
          }, 500);
        }
        else if(parsedResponse[0].trim() == "update_failed_dahil_may_existing_username")
        {
          document.getElementById("my_account_username").focus();

          Swal.fire(
            'Failed!',
            'Username already existing!',
            'error'
          );
        }
        
      }

      });
    }
  }

  function update_event_function()
  {
    if (document.getElementById("event_textfield_on_update").value == "")
    {
      document.getElementById("event_textfield_on_update").setCustomValidity("Please fill out this field.");
      document.getElementById("event_textfield_on_update").reportValidity();
    }
    else
    {
      var data = 
      {
          action: 'update_event_ajax',
          event_textfield_on_update:document.getElementById("event_textfield_on_update").value.trim(),
          month_select_update:document.getElementById("month_select_update").value.trim(),
          day_select_update:document.getElementById("day_select_update").value.trim(),
          event_id_textfield_on_update:document.getElementById("event_id_textfield_on_update").value.trim(),
      };

      $.ajax({
      url: 'admin_ajax.php',
      type: 'post',
      data: data,

      success:function(response)
      {
        // alert(response);
        var parsedResponse = JSON.parse(response);
        
        if(parsedResponse[0].trim() == "update_success")
        {
          Swal.fire(
            'Update Event!',
            'Successfully Updated!',
            'success'
          );
          $('#update_event_modall').modal('hide'); 

          $('#events_table').DataTable().destroy();
          setTimeout(function() {
            document.getElementById("events_tbody").innerHTML = parsedResponse[1];
            $('#events_table').DataTable();
          }, 500);
        }
        else if(parsedResponse[0].trim() == "update_failed_dahil_may_existing_day_and_month")
        {
          // document.getElementById("month_select").focus();

          Swal.fire(
            'Failed!',
            'Month and Day already existing!',
            'error'
          );
        }
        
      }

      });
    }
  }

  function add_event_function()
  {
    if (document.getElementById("event_textfield").value == "")
    {
      document.getElementById("event_textfield").setCustomValidity("Please fill out this field.");
      document.getElementById("event_textfield").reportValidity();
    }
    else
    {
      var data = 
      {
          action: 'add_event_ajax',
          event_textfield:document.getElementById("event_textfield").value.trim(),
          month_select:document.getElementById("month_select").value.trim(),
          day_select:document.getElementById("day_select").value.trim(),
      };

      $.ajax({
      url: 'admin_ajax.php',
      type: 'post',
      data: data,

      success:function(response)
      {
        var parsedResponse = JSON.parse(response);
        
        if(parsedResponse[0].trim() == "add_success")
        {
          Swal.fire(
            'New Event!',
            'Successfully Added!',
            'success'
          );
          $('#add_event_modall').modal('hide'); 

          $('#events_table').DataTable().destroy();
          setTimeout(function() {
            document.getElementById("events_tbody").innerHTML = parsedResponse[1];
            $('#events_table').DataTable();
          }, 500);
        }
        else if(parsedResponse[0].trim() == "add_failed_dahil_may_existing_day_and_month")
        {
          // document.getElementById("month_select").focus();

          Swal.fire(
            'Failed!',
            'Month and Day already existing!',
            'error'
          );
        }
        
      }

      });
    }
  }

  function add_admin_function()
  {
    var admin_username = document.getElementById("username_admin_input");
    var admin_password = document.getElementById("password_admin_input");
    var admin_firstname = document.getElementById("firstname_admin_input");
    var admin_middlename = document.getElementById("middlename_admin_input");
    var admin_lastname = document.getElementById("lastname_admin_input");

    var selectElement = document.getElementById("process_course_dropdownlist");
    var selected_process_course = [];

    for (var i = 0; i < selectElement.options.length; i++) {
      if (selectElement.options[i].selected) {
        selected_process_course.push(selectElement.options[i].value);
      }
    }
    
    if (admin_username.value == "")
    {
        admin_username.setCustomValidity("Please fill out this field.");
        admin_username.reportValidity();
    }
    else if (admin_password.value == "")
    {
      admin_password.setCustomValidity("Please fill out this field.");
      admin_password.reportValidity();
    }
    else if(selected_process_course == "")
    {
      Swal.fire(
        'Invalid!',
        'Please select process Course!',
        'error'
      );
    }
    else if (admin_firstname.value == "")
    {
      admin_firstname.setCustomValidity("Please fill out this field.");
      admin_firstname.reportValidity();
    }
    else if (admin_lastname.value == "")
    {
      admin_lastname.setCustomValidity("Please fill out this field.");
      admin_lastname.reportValidity();
    }
    else
    {
      var data = 
      {
          action: 'add_admin_ajax',
          admin_username:admin_username.value.trim(),
          admin_password:admin_password.value.trim(),
          admin_firstname:admin_firstname.value.trim(),
          admin_middlename:admin_middlename.value.trim(),
          admin_lastname:admin_lastname.value.trim(),
          selected_process_course:selected_process_course.join(" --- "),
      };

      $.ajax({
      url: 'admin_ajax.php',
      type: 'post',
      data: data,

      success:function(response)
      {
        var parsedResponse = JSON.parse(response);
        
        if(parsedResponse[0].trim() == "add_success")
        {
          Swal.fire(
            'New Admin!',
            'Successfully Added!',
            'success'
          );
          document.getElementById("username_admin_input").value = "";
          document.getElementById("password_admin_input").value = "";
          document.getElementById("firstname_admin_input").value = "";
          document.getElementById("middlename_admin_input").value = "";
          document.getElementById("lastname_admin_input").value = "";    
          $('#add_user_modall').modal('hide'); 

          $('#admin_users_table').DataTable().destroy();
          setTimeout(function() {
            document.getElementById("admin_users_tbody").innerHTML = parsedResponse[1];
            $('#admin_users_table').DataTable();
          }, 500);
        }
        else if(parsedResponse[0].trim() == "add_failed_dahil_may_existing_username")
        {
          document.getElementById("username_admin_input").focus();

          Swal.fire(
            'Failed!',
            'Username already existing!',
            'error'
          );
        }
        
      }

      });
    }

    

  }
</script>
<script>
  $(document).ready(function() {
    $('#my_account_toggle_password').click(function() {
        var passwordInput = $('#my_account_password');
        var toggleIcon = $('#my_account_toggle_password i');
        
        if (passwordInput.attr('type') === 'password') {
            passwordInput.attr('type', 'text');
            toggleIcon.removeClass('fa-eye').addClass('fa-eye-slash');
        } else {
            passwordInput.attr('type', 'password');
            toggleIcon.removeClass('fa-eye-slash').addClass('fa-eye');
        }
    });
});
</script>
<script>
  function event_delete_function(id)
  {
    Swal.fire({
      title: 'Warning!',
      text: "Are you sure you want to Delete this Event?",
      icon: 'question',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Yes',
      cancelButtonText: 'No'
    }).then((result) => {
      if (result.isConfirmed) {
        var data = 
        {
            action: 'delete_event_ajax',
            id: id,
        };

        $.ajax({
        url: 'admin_ajax.php',
        type: 'post',
        data: data,

        success:function(response)
        {
          var parsedResponse = JSON.parse(response);

          if(parsedResponse[0] == "delete_success")
          {
            Swal.fire(
              'Deleted!',
              'Deleting data successfully!',
              'success'
            );

            $('#events_table').DataTable().destroy();
            setTimeout(function() {
              document.getElementById("events_tbody").innerHTML = parsedResponse[1];
              $('#events_table').DataTable();
            }, 500);
          }
        }

        });
      } else {
        // User clicked "No" or closed the dialog
        Swal.fire(
          'Cancelled',
          'Your action has been cancelled.',
          'error'
        );
      }
    });
  }

  function delete_admin_user(id)
  {
    Swal.fire({
      title: 'Warning!',
      text: "Are you sure you want to Delete this admin user?",
      icon: 'question',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Yes',
      cancelButtonText: 'No'
    }).then((result) => {
      if (result.isConfirmed) {
        var data = 
        {
            action: 'delete_admin_user_ajax',
            id: id,
        };

        $.ajax({
        url: 'admin_ajax.php',
        type: 'post',
        data: data,

        success:function(response)
        {
          var parsedResponse = JSON.parse(response);

          if(parsedResponse[0] == "delete_success")
          {
            Swal.fire(
              'Deleted!',
              'Deleting data successfully!',
              'success'
            );

            $('#admin_users_table').DataTable().destroy();
            setTimeout(function() {
              document.getElementById("admin_users_tbody").innerHTML = parsedResponse[1];
              $('#admin_users_table').DataTable();
            }, 500);
          }
          else if(parsedResponse[0] == "failed_to_delete_because_super_admin")
          {
            Swal.fire(
              'Failed!',
              'You can\'t delete Super Admin!',
              'error'
            );
          }
        }

        });
      } else {
        // User clicked "No" or closed the dialog
        Swal.fire(
          'Cancelled',
          'Your action has been cancelled.',
          'error'
        );
      }
    });
  }
  function open_update_modal(id)
  {
    var data = 
    {
        action: 'get_admin_data_display_to_update_modal',
        id: id,
    };

    $.ajax({
        url: 'admin_ajax.php',
        type: 'post',
        data: data,

        success:function(response)
        {
          // alert(response);
          var parsedResponse = JSON.parse(response);

          document.getElementById("update_username_admin_input").value = parsedResponse[0];
          document.getElementById("update_password_admin_input").value = parsedResponse[1];
          document.getElementById("update_firstname_admin_input").value = parsedResponse[2];
          document.getElementById("update_middlename_admin_input").value = parsedResponse[3];
          document.getElementById("update_lastname_admin_input").value = parsedResponse[4];
          document.getElementById("update_id_admin_input").value = parsedResponse[5];
          // document.getElementById("update_process_course_dropdownlist").value = parsedResponse[6];

          document.getElementById("update_process_course_innerHTML").innerHTML = "";
          document.getElementById("update_process_course_innerHTML").innerHTML = tempp2;
          var parts = parsedResponse[6].split(" --- ");

          if(parsedResponse[6] != "")
          {
            for (let index = 0; index < parts.length; index++) 
            {
              var selectElement1 = document.getElementById("update_process_course_dropdownlist");
              var desiredValue = parts[index];

              for (var i = 0; i < selectElement1.options.length; i++) {
                if (selectElement1.options[i].value === desiredValue) {
                  selectElement1.options[i].selected = true;
                  break; 
                }
              }
              // document.getElementById("update_process_course_dropdownlist").options[parts[index]].selected = true;
            }
          }
          new MultiSelectTag('update_process_course_dropdownlist')

          // alert(parsedResponse[6]);

          $('#update_user_modall').modal('show');
        }

    });
  }

  function event_open_update_modal(id)
  {
    var data = 
    {
        action: 'get_admin_data_display_to_update_modal_event',
        id: id,
    };

    $.ajax({
      url: 'admin_ajax.php',
      type: 'post',
      data: data,

      success:function(response)
      {
        // alert(response);
        var parsedResponse = JSON.parse(response);

        document.getElementById("event_textfield_on_update").value = parsedResponse[0];
        document.getElementById("month_select_update").value = parsedResponse[1];
        document.getElementById("day_select_update").value = parsedResponse[2];
        document.getElementById("event_id_textfield_on_update").value = parsedResponse[3];

        $('#update_event_modall').modal('show');
      }
    });
  }
</script>
<script>
  function myFunction22(x22)
  {
    if (x22.matches) 
    { // If media query matches
      // alert("qwe");
      document.getElementById("appointment_table").classList.add("table-responsive");
      // document.getElementById("modal_content_appointment").style.width = "100%;";
      // document.getElementById("modal_content_appointment").style.marginLeft = "0;";
    } 
    else 
    {
      // alert("qwe1");
      document.getElementById("appointment_table").classList.remove("table-responsive");
      // document.getElementById("modal_content_appointment").style.width = "200%;";
      // document.getElementById("modal_content_appointment").style.marginLeft = "-50%;";
    }
  }
  var x22 = window.matchMedia("(max-width: 999px)")
  myFunction22(x22) // Call listener function at run time
  x22.addListener(myFunction22)
</script>
<script>
  if(!window.matchMedia("(max-width: 914px)").matches)
  {
    document.getElementById("left_nav_bar").style.marginLeft = "0px";
    document.getElementById('leftnavbar_toggle_button').style.display = "none";
    document.getElementById('main_panel').style.width = "calc(100% - 250px)";
    document.getElementById("main_panel").style.marginLeft = "250px";
    document.getElementById("checkbox_leftnavbar").checked = true;
  }
  else
  {
    document.getElementById("left_nav_bar").style.marginLeft = "-250px";
    document.getElementById('leftnavbar_toggle_button').style.display = "block";
    document.getElementById('main_panel').style.width = "100%";
    document.getElementById("main_panel").style.marginLeft = "0";
    document.getElementById("checkbox_leftnavbar").checked = false;
  }
  
  mobile_view = true;
  var resize_window = false;
</script>
<script>
  document.addEventListener('DOMContentLoaded', function() 
  {

    var calendarEl1 = document.getElementById('calendar');
    calendarEl1.innerHTML = '';

    var calendar1 = new FullCalendar.Calendar(calendarEl1, {

    eventClick: function(info) { //function kapag kinlick ang mga button
    var iconClass = info.event.extendedProps.iconClass;
    pinindot_na_date = moment(info.event.start).format('YYYY-MM-DD');
    var data = 
    {
        action: 'get_all_appointments_depends_on_date',
        datee: moment(info.event.start).format('YYYY-MM-DD'),
        process_courses:document.getElementById("process_coursess").value,
    };

    $.ajax({
        url: 'admin_ajax.php',
        type: 'post',
        data: data,

        success:function(response)
        {
            if(iconClass == 'fa fa-regular fa-calendar')
            {
                // Swal.fire(
                //     '<b>'+info.event.title+'</b><br>',
                //     'This day is holiday!',
                //     'info'
                // )
            }
            else
            {
                var parsedResponse = JSON.parse(response);

                // alert(parsedResponse[1]);

                $('#appointment_table').DataTable().destroy();
                document.getElementById("appointment_tbody").innerHTML = parsedResponse[1];
                $('#appointment_table').DataTable({
                    responsive: true
                }); 
                    
                if(parsedResponse[0] == null)
                    parsedResponse[0] = "0";
                $('#totalAppointment').html('Total Appointments: <b>'+parsedResponse[0]+'/50</b>');
                $('#eventDate').html('Appointment Date: <b><span id="appointment_date">' + moment(info.event.start).format('YYYY-MM-DD') + '</span></b>');
                $('#eventModal').modal('show');


                // }
            }
        }

    });
    },
    
    eventContent: function(info) {
    var iconClass = info.event.extendedProps.iconClass;

    if (iconClass == 'fa fa-regular fa-calendar') {
        var iconHtml = iconClass ? '<i class="' + iconClass + '"></i> <span id="title_label"><br> ' + info.event.title + '<br></span>  <br> ' : '';
        return {
        html: iconHtml + "Event"
        };
    } else if (iconClass == 'fa fa-solid fa-check') {
        var iconHtml = iconClass ? '<i class="' + iconClass + '"></i> <span id="title_label"><br>Slot Available<br></span>  <br> ' : '';
        return {
        html: iconHtml + info.event.title
        };
    } else if (iconClass == 'fa fa-solid fa-x') {
        var iconHtml = iconClass ? '<i class="' + iconClass + '"></i> <span id="title_label"><br>Full Slot<br></span>  <br> ' : '';
        return {
        html: iconHtml + info.event.title
        };
    }
    },

    events: generateEvents(),
    });
    calendar1.render();
});
</script>
<script>
    $(document).ready(function() {
        $("#passwordToggle").on("click", function() {
            const passwordInput = $("#password_admin_input");
            const icon = $(this).find("i");

            if (passwordInput.attr("type") === "password") {
                passwordInput.attr("type", "text");
                icon.removeClass("fa-eye").addClass("fa-eye-slash");
            } else {
                passwordInput.attr("type", "password");
                icon.removeClass("fa-eye-slash").addClass("fa-eye");
            }
        });
    });

    $(document).ready(function() {
        $("#update_passwordToggle").on("click", function() {
            const passwordInput = $("#update_password_admin_input");
            const icon = $(this).find("i");

            if (passwordInput.attr("type") === "password") {
                passwordInput.attr("type", "text");
                icon.removeClass("fa-eye").addClass("fa-eye-slash");
            } else {
                passwordInput.attr("type", "password");
                icon.removeClass("fa-eye-slash").addClass("fa-eye");
            }
        });
    });
</script>
<script>
$(document).ready(function() {
  $('#admin_users_table').DataTable({
    responsive: true
  });
});

$(document).ready(function() {
  $('#events_table').DataTable({
    responsive: true
  });
});
</script>

<script>
  setTimeout(function() {
    close_loading();
    document.querySelector('.fc-next-button').click();
    setTimeout(function() {
      document.querySelector('.fc-prev-button').click();
      document.getElementById("dashboard_with_icon_button").click();
      document.getElementById("biar").style.display = "none";
    }, 800);
  }, 1500); // 2000 milliseconds = 2 seconds
</script>

<script>
  //2am
  var mobile_view = false;
  function leftnavbar_toggle_button_function()
  {
    if(document.getElementById("checkbox_leftnavbar").checked)
    {
      $('#left_nav_bar').animate({ marginLeft: '0' });
    }
  }

  function myFunction(x)
  {
    if (x.matches) 
    { // mobile view
      $('#left_nav_bar').animate({ marginLeft: '-250px' }); //display = "none"
      document.getElementById('leftnavbar_toggle_button').style.display = "block";
      document.getElementById('main_panel').style.width = "100%";
      $('#main_panel').animate({ marginLeft: '0' });
      document.getElementById("checkbox_leftnavbar").checked = false;
      mobile_view = true;
    } 
    else 
    {
      $('#left_nav_bar').animate({ marginLeft: '0' }); //display = 'block';
      document.getElementById('leftnavbar_toggle_button').style.display = "none";
      document.getElementById('main_panel').style.width = "calc(100% - 250px)";
      $('#main_panel').animate({ marginLeft: '250px' });
      document.getElementById("checkbox_leftnavbar").checked = true;
      mobile_view = false;
    }
  }
  var x = window.matchMedia("(max-width: 914px)")
  myFunction(x) // Call listener function at run time
  x.addListener(myFunction)
</script>
<script>
  function logout_button()
  {
    Swal.fire({
      title: 'Warning!',
      text: "Are you sure you want to log out?",
      icon: 'question',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Yes',
      cancelButtonText: 'No'
    }).then((result) => {
      if (result.isConfirmed) {
        window.location.href = "../logout.php";
      } else {
        // User clicked "No" or closed the dialog
        Swal.fire(
          'Cancelled',
          'Your action has been cancelled.',
          'error'
        );
      }
    });
  }

</script>
<script>
  
  function show_dashboard_panel()
  {
    document.getElementById('dashboard_panel').style.display = "Inherit";
    document.getElementById('appointments_panel').style.display = "none";
    document.getElementById('admin_users_panel').style.display = "none";
    document.getElementById('events_panel').style.display = "none";
    document.getElementById('my_account_panel').style.display = "none";

    document.getElementById("dashboard_button").style.backgroundColor = "lightgreen";
    document.getElementById("appointments_button").style.backgroundColor = "white";
    document.getElementById('admin_users_button').style.backgroundColor = "white";
    document.getElementById('events_button').style.backgroundColor = "white"; //
    document.getElementById("my_account_button").style.backgroundColor = "white";
    
    if(mobile_view == true)
    {
      $('#left_nav_bar').animate({ marginLeft: '-250px' }); //display = "none"
      document.getElementById("checkbox_leftnavbar").checked = false;
    }
  }
  function show_appointments_panel()
  {
    // alert("qwe");
    document.getElementById('dashboard_panel').style.display = "none";
    document.getElementById('appointments_panel').style.display = "Inherit";
    document.getElementById('admin_users_panel').style.display = "none";
    document.getElementById('events_panel').style.display = "none";
    document.getElementById('my_account_panel').style.display = "none";

    document.getElementById("dashboard_button").style.backgroundColor = "white";
    document.getElementById("appointments_button").style.backgroundColor = "lightgreen";
    document.getElementById('admin_users_button').style.backgroundColor = "white";
    document.getElementById('events_button').style.backgroundColor = "white"; //
    document.getElementById("my_account_button").style.backgroundColor = "white";

    resize_window = true;

    if(mobile_view == true)
    {
      $('#left_nav_bar').animate({ marginLeft: '-250px' }); //display = "none"
      document.getElementById("checkbox_leftnavbar").checked = false;
    }
  }
  function show_admin_users_panel()
  {
    // alert("qwe");
    document.getElementById('dashboard_panel').style.display = "none";
    document.getElementById('appointments_panel').style.display = "none";
    document.getElementById('admin_users_panel').style.display = "Inherit";
    document.getElementById('events_panel').style.display = "none";
    document.getElementById('my_account_panel').style.display = "none";

    document.getElementById("dashboard_button").style.backgroundColor = "white";
    document.getElementById("appointments_button").style.backgroundColor = "white";
    document.getElementById('admin_users_button').style.backgroundColor = "lightgreen";
    document.getElementById('events_button').style.backgroundColor = "white"; //
    document.getElementById("my_account_button").style.backgroundColor = "white";

    if(mobile_view == true)
    {
      $('#left_nav_bar').animate({ marginLeft: '-250px' }); //display = "none"
      document.getElementById("checkbox_leftnavbar").checked = false;
    }
  }
  function show_events_panel()
  {
    // alert("qwe");
    document.getElementById('dashboard_panel').style.display = "none";
    document.getElementById('appointments_panel').style.display = "none";
    document.getElementById('admin_users_panel').style.display = "none";
    document.getElementById('events_panel').style.display = "Inherit"; //
    document.getElementById('my_account_panel').style.display = "none";

    document.getElementById("dashboard_button").style.backgroundColor = "white";
    document.getElementById("appointments_button").style.backgroundColor = "white";
    document.getElementById('admin_users_button').style.backgroundColor = "white";
    document.getElementById('events_button').style.backgroundColor = "lightgreen"; //
    document.getElementById("my_account_button").style.backgroundColor = "white";

    if(mobile_view == true)
    {
      $('#left_nav_bar').animate({ marginLeft: '-250px' }); //display = "none"
      document.getElementById("checkbox_leftnavbar").checked = false;
    }
  }
  function show_my_account_panel()
  {
    // alert("qwe");
    document.getElementById('dashboard_panel').style.display = "none";
    document.getElementById('appointments_panel').style.display = "none";
    document.getElementById('admin_users_panel').style.display = "none";
    document.getElementById('events_panel').style.display = "none";
    document.getElementById('my_account_panel').style.display = "Inherit";

    document.getElementById("dashboard_button").style.backgroundColor = "white";
    document.getElementById("appointments_button").style.backgroundColor = "white";
    document.getElementById('admin_users_button').style.backgroundColor = "white";
    document.getElementById('events_button').style.backgroundColor = "white"; //
    document.getElementById("my_account_button").style.backgroundColor = "lightgreen";

    if(mobile_view == true)
    {
      $('#left_nav_bar').animate({ marginLeft: '-250px' }); //display = "none"
      document.getElementById("checkbox_leftnavbar").checked = false;
    }
  }
</script>

<?php


    $sql = "SELECT * FROM ptc_holidays";
    $result = mysqli_query($con, $sql);

    $holiday_name = array(); //laman neto lahat ng total_students //2, 2, 2
    $holiday_name_index = 0;

    $date_month_and_day = array(); //laman neto lahat ng total_students //2, 2, 2
    $date_month_and_day_index = 0;

    while ($row = mysqli_fetch_assoc($result)) 
    {
        $holiday_name[$holiday_name_index] = $row['holiday_name'];
        $holiday_name_index++;

        $date_month_and_day[$date_month_and_day_index] = $row['date_month_and_day'];
        $date_month_and_day_index++;
    }



    $sql = "SELECT * FROM ptc_student_appointments_history";
    $result = mysqli_query($con, $sql);

    $total_students = array(); //laman neto lahat ng total_students //2, 2, 2
    $total_students_index = 0;

    $datee = array();   //laman neto lahat ng datee //2023-08-30, 2023-08-24, 2023-08-28
    $datee_index = 0;
    
    while ($row = mysqli_fetch_assoc($result)) 
    {
        $datee[$datee_index] = $row['datee'];
        $datee_index++;

        $total_students[$total_students_index] = $row['total_students'];
        $total_students_index++;
    }
    
    $ifs = "if (eventDate.format('YYYY-MM-DD') == '0000-00-00') {var event = {title: '2/50',start: eventDate.format('YYYY-MM-DD'),classNames: ['fc-event-slot-available'],iconClass: 'fa fa-solid fa-check'};}";

    for ($i = 0; $i < count($date_month_and_day); $i++) 
    {
      $qwe = $date_month_and_day[$i];
      $modifiedDate = substr($qwe, 5);
      $classNames = "fc-event-holidayy";
      $iconClass = "fa fa-regular fa-calendar";
      
      $ifs .= "
          else if (eventDate.format('MM-DD') == '" . $modifiedDate . "') {
              var event = {
                  title: '" . $holiday_name[$i] . "',
                  start: eventDate.format('YYYY-MM-DD'),
                  classNames: ['".$classNames."'],
                  iconClass: '".$iconClass."'
              };
          }
      ";
    }

    for ($i = 0; $i < count($datee); $i++) 
    {
        if($total_students[$i] >= 50)
        {
            $classNames = "fc-event-no-slot-available";
            $iconClass = "fa fa-solid fa-x";
        }
        else
        {
            $classNames = "fc-event-slot-available";
            $iconClass = "fa fa-solid fa-check";
        }

        $ifs .= "
            else if (eventDate.format('YYYY-MM-DD') == '" . $datee[$i] . "') {
                var event = {
                    title: '".$total_students[$i]."/50',
                    start: eventDate.format('YYYY-MM-DD'),
                    classNames: ['".$classNames."'],
                    iconClass: '".$iconClass."'
                };
            }
        ";
    }
    
    
    // echo "<script>
    //     alert('" . $ifs . "');
    //   </script>";

    echo "<script>
        function generateEvents() 
        {
            var startDate = moment();
            var events = [];

            for (var i = 0; i < 9999; i++) 
            {
                var eventDate = startDate.clone().add(i, 'days'); // eventDate 0 = date today

                // Skip Saturdays (6) and Sundays (0)
                if (eventDate.day() !== 6 && eventDate.day() !== 0) 
                {
                    ".$ifs."
                    else
                    {
                        var event = {
                            title: '0/50',
                            start: eventDate.format('YYYY-MM-DD'),
                            classNames: ['fc-event-slot-available'],
                            iconClass: 'fa fa-solid fa-check'
                        };
                    }

                    events.push(event);

                }
            }

            for (var i = 9999; i < 15000; i++) 
            {
                var eventDate = startDate.clone().add(i, 'days'); // eventDate 0 = date today

                // Skip Saturdays (6) and Sundays (0)
                if (eventDate.day() !== 6 && eventDate.day() !== 0) 
                {
                    ".$ifs."
                    else
                    {
                        var event = {
                            title: 'Open Soon',
                            start: eventDate.format('YYYY-MM-DD'),
                            classNames: ['fc-event-no-slot-available'],
                            iconClass: 'fa fa-solid fa-x'
                        };
                    }

                    events.push(event);

                }
            }
            return events;
        }
        </script>";
?>

<script>
function getCurrentFormattedDate() {
    const months = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
    
    const currentDate = new Date();
    const monthIndex = currentDate.getMonth();
    const day = currentDate.getDate();
    const year = currentDate.getFullYear();

    const formattedDate = months[monthIndex] + " " + day + ", " + year;
    return formattedDate;
}

document.getElementById('currentDate').textContent = getCurrentFormattedDate();

document.getElementById("left_nav_bar").addEventListener('mousedown', function(event) {
    event.preventDefault();
});

document.getElementById("left_nav_bar").addEventListener('mouseup', function(event) {
    event.preventDefault();
});
</script>
<script>
  window.addEventListener('resize', function() {  
    resize_window = true;
  });
</script>
<script>
    setInterval(function() {
      // alert(resize_window);
        if(resize_window == true)
        {
          resize_window = false;

            var calendarEl1 = document.getElementById('calendar');
            calendarEl1.innerHTML = '';

            var calendar1 = new FullCalendar.Calendar(calendarEl1, {

            eventClick: function(info) { //function kapag kinlick ang mga button
            var iconClass = info.event.extendedProps.iconClass;
            pinindot_na_date = moment(info.event.start).format('YYYY-MM-DD');
            var data = 
            {
                action: 'get_all_appointments_depends_on_date',
                datee: moment(info.event.start).format('YYYY-MM-DD'),
                process_courses:document.getElementById("process_coursess").value,
            };

            $.ajax({
                url: 'admin_ajax.php',
                type: 'post',
                data: data,

                success:function(response)
                {
                    if(iconClass == 'fa fa-regular fa-calendar')
                    {
                        // Swal.fire(
                        //     '<b>'+info.event.title+'</b><br>',
                        //     'This day is holiday!',
                        //     'info'
                        // )
                    }
                    else
                    {
                        var parsedResponse = JSON.parse(response);

                        // alert(parsedResponse[1]);

                        $('#appointment_table').DataTable().destroy();
                        document.getElementById("appointment_tbody").innerHTML = parsedResponse[1];
                        $('#appointment_table').DataTable({
                            responsive: true
                        }); 
                            
                        if(parsedResponse[0] == null)
                            parsedResponse[0] = "0";
                        $('#totalAppointment').html('Total Appointments: <b>'+parsedResponse[0]+'/50</b>');
                        $('#eventDate').html('Appointment Date: <b><span id="appointment_date">' + moment(info.event.start).format('YYYY-MM-DD') + '</span></b>');
                        $('#eventModal').modal('show');


                        // }
                        // alert(parsedResponse[2]);
                    }
                }

            });
          },

          eventContent: function(info) {
            var iconClass = info.event.extendedProps.iconClass;

            if (iconClass == 'fa fa-regular fa-calendar') {
              var iconHtml = iconClass ? '<i class="' + iconClass + '"></i> <span id="title_label"><br> ' + info.event.title + '<br></span>  <br> ' : '';
              return {
                html: iconHtml + "Event"
              };
            } else if (iconClass == 'fa fa-solid fa-check') {
              var iconHtml = iconClass ? '<i class="' + iconClass + '"></i> <span id="title_label"><br>Slot Available<br></span>  <br> ' : '';
              return {
                html: iconHtml + info.event.title
              };
            } else if (iconClass == 'fa fa-solid fa-x') {
              var iconHtml = iconClass ? '<i class="' + iconClass + '"></i> <span id="title_label"><br>Full Slot<br></span>  <br> ' : '';
              return {
                html: iconHtml + info.event.title
              };
            }
          },

          events: generateEvents(),
          });
          calendar1.render();
        }
    }, 2000);
</script>
<script>
  function update_status_func(id, status)
  {
    var data = 
    {
        action: 'update_status',
        id: id,
        status: status,
        admin_processor: document.getElementById("topnavbar_name").innerHTML,
    };

    $.ajax({
        url: 'admin_ajax.php',
        type: 'post',
        data: data,
        success:function(response)
        {
          // alert(response);

          var statusParts = response.trim().split(' --- ');

          var status = statusParts[0];
          var id = statusParts[1];
          var admin_processorr = statusParts[2];

          // alert(status);
          // alert(admin_processorr);

          if(status == "PENDING")
            document.getElementById("status_id_"+id).innerHTML = "<span style='background: linear-gradient(135deg, #f6d365 0%, #fda085 100%);border-radius: 10px;color: white;text-align: center;padding: 10px 20px;'>"+status+"</span>";
          else if(status == "ONGOING")
            document.getElementById("status_id_"+id).innerHTML = "<span style='background: linear-gradient(135deg, #23a6d5 0%, #23d5ab 100%);border-radius: 10px;color: white;text-align: center;padding: 10px 20px;'>"+status+"</span>";
          else if(status == "DONE")
            document.getElementById("status_id_"+id).innerHTML = "<span style='background: linear-gradient(135deg, #2ecc71 0%, #27ae60 100%);border-radius: 10px;color: white;text-align: center;padding: 10px 20px;'>"+status+"</span>";

            if(admin_processorr != "undefinedd")
              document.getElementById("admin_processor_"+id).innerHTML = admin_processorr;
            else
              document.getElementById("admin_processor_"+id).innerHTML = "";
        }
    });
  }
  
  document.addEventListener('click', function(event) {
      var dropdowns = document.querySelectorAll('.dropdown-menu');
      for (var i = 0; i < dropdowns.length; i++) {
          var dropdown = dropdowns[i];
          if (dropdown.style.display === 'block' && !dropdown.contains(event.target)) {
              dropdown.style.display = 'none';
          }
      }
  });

  function toggleDropdown(id) {
        var dropdown = document.getElementById("myDropdown" + id);
        if (dropdown) {
            var computedStyle = window.getComputedStyle(dropdown);
            if (computedStyle.display === "none") {
              setTimeout(function() {
                dropdown.style.display = "block";
              }, 5);
            } else {
                dropdown.style.display = "none";
            }
        }
    }

    $('#eventModal').on('hidden.bs.modal', function () {
      pinindot_na_date = "";
    });

    function refresh_appointment_table() 
    {
        // alert(pinindot_na_date);
        if(pinindot_na_date != "")
        {
          var data = 
          {
              action: 'get_appointments_realtime',
              pinindot_na_date: pinindot_na_date,
          };

          $.ajax({
              url: 'admin_ajax.php',
              type: 'post',
              data: data,

              success:function(response)
              {
                response = JSON.parse(response);

                var statuses = response.statuses;
                var admin_processors = response.admin_processors;
                var ids = response.ids;

                // alert(statuses);
                // alert(admin_processors);
                // alert(ids);

                for (let i = 0; i < ids.length; i++) 
                {
                  // alert(ids[i]);
                  if(statuses[i] == "PENDING")
                    document.getElementById("status_id_"+ids[i]).innerHTML = "<span style='background: linear-gradient(135deg, #f6d365 0%, #fda085 100%);border-radius: 10px;color: white;text-align: center;padding: 10px 20px;'>"+statuses[i]+"</span>";
                  else if(statuses[i] == "ONGOING")
                    document.getElementById("status_id_"+ids[i]).innerHTML = "<span style='background: linear-gradient(135deg, #23a6d5 0%, #23d5ab 100%);border-radius: 10px;color: white;text-align: center;padding: 10px 20px;'>"+statuses[i]+"</span>";
                  else if(statuses[i] == "DONE")
                    document.getElementById("status_id_"+ids[i]).innerHTML = "<span style='background: linear-gradient(135deg, #2ecc71 0%, #27ae60 100%);border-radius: 10px;color: white;text-align: center;padding: 10px 20px;'>"+statuses[i]+"</span>";

                    document.getElementById("admin_processor_"+ids[i]).innerHTML = admin_processors[i];
                }
              }

          });
        }
    }

    // Call showAlert every 5 seconds (5000 milliseconds)
    setInterval(refresh_appointment_table, 2000);
</script>
<script>
    // Get references to the month and day select elements
    const monthSelect = document.getElementById('month_select');
    const daySelect = document.getElementById('day_select');

    // Define the number of days for each month
    const daysInMonth = {
        '01': 31, // January
        '02': 29, // February (assuming a leap year)
        '03': 31, // March
        '04': 30, // April
        '05': 31, // May
        '06': 30, // June
        '07': 31, // July
        '08': 31, // August
        '09': 30, // September
        '10': 31, // October
        '11': 30, // November
        '12': 31, // December
    };

    // Populate the day select based on the selected month
    monthSelect.addEventListener('change', function () {
        const selectedMonth = this.value;
        const days = daysInMonth[selectedMonth];

        // Clear existing options
        daySelect.innerHTML = '';

        // Populate day options
        for (let i = 1; i <= days; i++) {
            const dayOption = document.createElement('option');
            dayOption.value = i.toString().padStart(2, '0'); // Zero-pad the day
            dayOption.textContent = dayOption.value;
            daySelect.appendChild(dayOption);
        }
    });

    // Initial population of days based on the default selected month
    const initialMonth = monthSelect.value;
    const initialDays = daysInMonth[initialMonth];

    for (let i = 1; i <= initialDays; i++) {
        const dayOption = document.createElement('option');
        dayOption.value = i.toString().padStart(2, '0'); // Zero-pad the day
        dayOption.textContent = dayOption.value;
        daySelect.appendChild(dayOption);
    }
</script>
<script>
    // Get references to the month and day select elements
    const monthSelect1 = document.getElementById('month_select_update');
    const daySelect1 = document.getElementById('day_select_update');

    // Define the number of days for each month
    const daysInMonth1 = {
        '01': 31, // January
        '02': 29, // February (assuming a leap year)
        '03': 31, // March
        '04': 30, // April
        '05': 31, // May
        '06': 30, // June
        '07': 31, // July
        '08': 31, // August
        '09': 30, // September
        '10': 31, // October
        '11': 30, // November
        '12': 31, // December
    };

    // Populate the day select based on the selected month
    monthSelect1.addEventListener('change', function () {
        const selectedMonth1 = this.value;
        const days = daysInMonth1[selectedMonth1];

        // Clear existing options
        daySelect1.innerHTML = '';

        // Populate day options
        for (let i = 1; i <= days; i++) {
            const dayOption1 = document.createElement('option');
            dayOption1.value = i.toString().padStart(2, '0'); // Zero-pad the day
            dayOption1.textContent = dayOption1.value;
            daySelect1.appendChild(dayOption1);
        }
    });

    // Initial population of days based on the default selected month
    const initialMonth1 = monthSelect1.value;
    const initialDays1 = daysInMonth1[initialMonth1];

    for (let i = 1; i <= initialDays1; i++) {
        const dayOption1 = document.createElement('option');
        dayOption1.value = i.toString().padStart(2, '0'); // Zero-pad the day
        dayOption1.textContent = dayOption1.value;
        daySelect1.appendChild(dayOption1);
    }
</script>