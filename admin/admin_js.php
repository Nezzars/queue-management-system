<?php
  require '../connections/my_cnx.php';
?>
<script>
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
  function add_user_button(){

   
    // Clear input values
    document.getElementById("username_admin_input").value = "";
    document.getElementById("password_admin_input").value = "";
    document.getElementById("firstname_admin_input").value = "";
    document.getElementById("middlename_admin_input").value = "";
    document.getElementById("lastname_admin_input").value = "";


  }


</script>

<script>
                  function add_admin_function(){
                    

                    var admin_username = document.getElementById("username_admin_input");
                    var admin_password = document.getElementById("password_admin_input");
                    var admin_firstname = document.getElementById("firstname_admin_input");
                    var admin_middlename = document.getElementById("middlename_admin_input");
                    var admin_lastname = document.getElementById("lastname_admin_input");
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
                    
                    else if (admin_firstname.value == "")
                    {
                      admin_firstname.setCustomValidity("Please fill out this field.");
                      admin_firstname.reportValidity();
                    }
                    else if (admin_middlename.value == "")
                    {
                      admin_middlename.setCustomValidity("Please fill out this field.");
                      admin_middlename.reportValidity();
                    }
                    else if (admin_lastname.value == "")
                    {
                      admin_lastname.setCustomValidity("Please fill out this field.");
                      admin_lastname.reportValidity();
                    }
                    else{
                      var data = 
                      {
                          action: 'add_admin_ajax',
                          admin_username:admin_username.value.trim(),
                          admin_password:admin_password.value.trim(),
                          admin_firstname:admin_firstname.value.trim(),
                          admin_middlename:admin_middlename.value.trim(),
                          admin_lastname:admin_lastname.value.trim(),
                      };

                      $.ajax({
                      url: 'admin_ajax.php',
                      type: 'post',
                      data: data,

                      success:function(response)
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
                        $('#staticBackdrop').modal('hide'); 
                      }

                      });
                    }

                    

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
    var data = 
    {
        action: 'get_all_appointments_depends_on_date',
        datee: moment(info.event.start).format('YYYY-MM-DD'),
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
        html: iconHtml + "Holiday"
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
</script>
<script>
$(document).ready(function() {
  $('#department_table').DataTable({
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
    document.getElementById('my_account_panel').style.display = "none";

    document.getElementById("dashboard_button").style.backgroundColor = "lightgreen";
    document.getElementById("appointments_button").style.backgroundColor = "white";
    document.getElementById('admin_users_button').style.backgroundColor = "white";
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
    document.getElementById('my_account_panel').style.display = "none";

    document.getElementById("dashboard_button").style.backgroundColor = "white";
    document.getElementById("appointments_button").style.backgroundColor = "lightgreen";
    document.getElementById('admin_users_button').style.backgroundColor = "white";
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
    document.getElementById('my_account_panel').style.display = "none";

    document.getElementById("dashboard_button").style.backgroundColor = "white";
    document.getElementById("appointments_button").style.backgroundColor = "white";
    document.getElementById('admin_users_button').style.backgroundColor = "lightgreen";
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
    document.getElementById('my_account_panel').style.display = "Inherit";

    document.getElementById("dashboard_button").style.backgroundColor = "white";
    document.getElementById("appointments_button").style.backgroundColor = "white";
    document.getElementById('admin_users_button').style.backgroundColor = "white";
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
      $modifiedDate = date('Y') . substr($qwe, 4);

      $classNames = "fc-event-holidayy";
      $iconClass = "fa fa-regular fa-calendar";
      
      $ifs .= "
          else if (eventDate.format('YYYY-MM-DD') == '" . $modifiedDate . "') {
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

            for (var i = 0; i < 90; i++) 
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
            var data = 
            {
                action: 'get_all_appointments_depends_on_date',
                datee: moment(info.event.start).format('YYYY-MM-DD'),
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
                html: iconHtml + "Holiday"
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