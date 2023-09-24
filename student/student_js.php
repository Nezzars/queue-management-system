<?php
  require '../connections/my_cnx.php';
?>
<script>
  document.getElementById("togglePassword").addEventListener("click", function() {
  const passwordInput = document.getElementById("password_textfield");
  const eyeIcon = document.getElementById("eyeIcon");

  if (passwordInput.type === "password") {
      passwordInput.type = "text";
      eyeIcon.classList.remove("fa-eye");
      eyeIcon.classList.add("fa-eye-slash");
  } else {
      passwordInput.type = "password";
      eyeIcon.classList.remove("fa-eye-slash");
      eyeIcon.classList.add("fa-eye");
  }
  });
</script>

<script>
  document.getElementById("toggleConfirmPassword").addEventListener("click", function() {
  const passwordInput = document.getElementById("confirm_password_textfield");
  const eyeIcon = document.getElementById("eyeIcon1");

  if (passwordInput.type === "password") {
      passwordInput.type = "text";
      eyeIcon.classList.remove("fa-eye");
      eyeIcon.classList.add("fa-eye-slash");
  } else {
      passwordInput.type = "password";
      eyeIcon.classList.remove("fa-eye-slash");
      eyeIcon.classList.add("fa-eye");
  }
  });
</script>
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
  function appointment_submit_function()
  {
    if(
        !document.getElementById("transcript_of_record_checkbox").checked &&
        !document.getElementById("certificate_of_grades_checkbox").checked &&
        !document.getElementById("certified_true_copy_checkbox").checked &&
        !document.getElementById("form_137_checkbox").checked &&
        !document.getElementById("certificate_as_students_checkbox").checked &&
        !document.getElementById("honorable_dismissal_checkbox").checked &&
        !document.getElementById("cav_checkbox").checked &&
        !document.getElementById("certificate_of_subject_or_course_description_checkbox").checked &&
        !document.getElementById("certificate_of_units_earned_checkbox").checked &&
        !document.getElementById("others_checkbox").checked
    )
    {
        Swal.fire(
            'Invalid!',
            'Please select a record you want to request!',
            'error'
          )
    }
    // else if(document.getElementById("certification_checkbox").checked && (!document.getElementById("honorable_dismissal_checkbox").checked && !document.getElementById("good_moral_character_checkbox").checked))
    // {
    //     Swal.fire(
    //         'Invalid! ',
    //         'Please select Certification you want to request!',
    //         'error'
    //     )
    // }
    else if(document.getElementById("others_checkbox").checked && document.getElementById("others_textfield").value.trim() == "")
    {
        // Swal.fire(
        //     'Invalid! ',
        //     'Please Specify your request!',
        //     'error'
        // )
        document.getElementById("others_textfield").setCustomValidity("Please Specify your request!");
        document.getElementById("others_textfield").reportValidity();
    }
    else if(document.getElementById("purpose_of_request_textfield").value.trim() == "")
    {
      document.getElementById("purpose_of_request_textfield").setCustomValidity("Please provide the purpose of your request.");
      document.getElementById("purpose_of_request_textfield").reportValidity();
    }
    else
    {
        Swal.fire({
            title: 'Warning!',
            text: "Are you sure you want to submit an Appointment?",
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
                action: 'insert_appointment',
                username: document.getElementById("username").value,
                transcript_of_record_checkbox: document.getElementById("transcript_of_record_checkbox").checked,
                certificate_of_grades_checkbox: document.getElementById("certificate_of_grades_checkbox").checked,
                certified_true_copy_checkbox: document.getElementById("certified_true_copy_checkbox").checked,
                form_137_checkbox: document.getElementById("form_137_checkbox").checked,
                certificate_as_students_checkbox: document.getElementById("certificate_as_students_checkbox").checked,
                honorable_dismissal_checkbox: document.getElementById("honorable_dismissal_checkbox").checked,
                cav_checkbox: document.getElementById("cav_checkbox").checked,
                certificate_of_subject_or_course_description_checkbox: document.getElementById("certificate_of_subject_or_course_description_checkbox").checked,
                certificate_of_units_earned_checkbox: document.getElementById("certificate_of_units_earned_checkbox").checked,
                others_textfield: document.getElementById("others_textfield").value.trim(),
                purpose_of_request_textfield: document.getElementById("purpose_of_request_textfield").value.trim(),
                date_hidden: document.getElementById("date_hidden").value.trim(),
                // email: $("#email1").val(),
                // gender: $("#gender1").val(),
                };

                $.ajax({
                url: 'student_ajax.php',
                type: 'post',
                data: data,

                success:function(response){
                    var parsedResponse = JSON.parse(response);

                    if(parsedResponse[1].trim() == "submit_success")
                    {
                        window.location.href = "student.php";
                    }
                    else if(parsedResponse[1].trim() == "submit_failed")
                    {
                        Swal.fire(
                        'Invalid!',
                        'You already set an appointment to this Date !',
                        'info'
                        )
                    }
                    else if(parsedResponse[1].trim() == "submit_failed_because_of_total_students_is_50")
                    {
                        Swal.fire(
                        'Invalid!',
                        'No Slot Available!',
                        'error'
                        )
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
  }
  
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
$(document).ready(function() {
  $('#department_table').DataTable({
    responsive: true
  });
});
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

  function show_dashboard_panel()
  {
    document.getElementById('dashboard_panel').style.display = "Inherit";
    document.getElementById('schedule_an_appointment_panel').style.display = "none";
    document.getElementById('my_appointments_panel').style.display = "none";
    document.getElementById('my_profile_panel').style.display = "none";

    document.getElementById("dashboard_button").style.backgroundColor = "lightgreen";
    document.getElementById("schedule_an_appointment_button").style.backgroundColor = "white";
    document.getElementById('my_appointments_button').style.backgroundColor = "white";
    document.getElementById("my_profile_button").style.backgroundColor = "white";
    
    // resize_window = false;
    
    if(mobile_view == true)
    {
      $('#left_nav_bar').animate({ marginLeft: '-250px' }); //display = "none"
      document.getElementById("checkbox_leftnavbar").checked = false;
    }
  }
  function show_schedule_an_appointment_panel()
  {
    // alert("qwe");
    document.getElementById('dashboard_panel').style.display = "none";
    document.getElementById('schedule_an_appointment_panel').style.display = "Inherit";
    document.getElementById('my_appointments_panel').style.display = "none";
    document.getElementById('my_profile_panel').style.display = "none";

    document.getElementById("dashboard_button").style.backgroundColor = "white";
    document.getElementById("schedule_an_appointment_button").style.backgroundColor = "lightgreen";
    document.getElementById('my_appointments_button').style.backgroundColor = "white";
    document.getElementById("my_profile_button").style.backgroundColor = "white";
    
    resize_window = true;

    if(mobile_view == true)
    {
      $('#left_nav_bar').animate({ marginLeft: '-250px' }); //display = "none"
      document.getElementById("checkbox_leftnavbar").checked = false;
    }
  }
  function show_my_appointments_panel()
  {
    // alert("qwe");
    document.getElementById('dashboard_panel').style.display = "none";
    document.getElementById('schedule_an_appointment_panel').style.display = "none";
    document.getElementById('my_appointments_panel').style.display = "Inherit";
    document.getElementById('my_profile_panel').style.display = "none";

    document.getElementById("dashboard_button").style.backgroundColor = "white";
    document.getElementById("schedule_an_appointment_button").style.backgroundColor = "white";
    document.getElementById('my_appointments_button').style.backgroundColor = "lightgreen";
    document.getElementById("my_profile_button").style.backgroundColor = "white";
    
    // resize_window = false;

    if(mobile_view == true)
    {
      $('#left_nav_bar').animate({ marginLeft: '-250px' }); //display = "none"
      document.getElementById("checkbox_leftnavbar").checked = false;
    }
  }
  function show_my_profile_panel()
  {
    // alert("qwe");
    document.getElementById('dashboard_panel').style.display = "none";
    document.getElementById('schedule_an_appointment_panel').style.display = "none";
    document.getElementById('my_appointments_panel').style.display = "none";
    document.getElementById('my_profile_panel').style.display = "Inherit";

    document.getElementById("dashboard_button").style.backgroundColor = "white";
    document.getElementById("schedule_an_appointment_button").style.backgroundColor = "white";
    document.getElementById('my_appointments_button').style.backgroundColor = "white";
    document.getElementById("my_profile_button").style.backgroundColor = "lightgreen";
    
    // resize_window = false;

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
  document.addEventListener('DOMContentLoaded', function() 
  {
    var calendarEl1 = document.getElementById('calendar');
            calendarEl1.innerHTML = '';

            var calendar1 = new FullCalendar.Calendar(calendarEl1, {

            eventClick: function(info) { //function kapag kinlick ang mga button
            var iconClass = info.event.extendedProps.iconClass;
            var data = 
            {
                action: 'select_total_students_if_50',
                datee: moment(info.event.start).format('YYYY-MM-DD'),
            };

            $.ajax({
                url: 'student_ajax.php',
                type: 'post',
                data: data,

                success:function(response)
                {
                    if(iconClass == 'fa fa-regular fa-calendar')
                    {
                        Swal.fire(
                            'Invalid!',
                            '<b>'+info.event.title+'</b><br><br>This day is holiday!',
                            'info'
                        )
                    }
                    else if (parseInt(response.trim()) >= 50) 
                    {
                        Swal.fire(
                            'Invalid!',
                            'No Slot Available!',
                            'error'
                        );
                    }
                    else
                    {
                        // if(document.getElementById("certification_checkbox").checked)
                        // {
                        //     $('#certification_checkboxes').toggle();
                        //     // document.getElementById("honorable_dismissal_checkbox").checked = false;
                        //     document.getElementById("good_moral_character_checkbox").checked = false;
                        // }
                        if(document.getElementById("others_checkbox").checked)
                        {
                            $('#others_label_and_textfield').toggle();
                            document.getElementById("others_textfield").value = "";
                        }

                        document.getElementById("transcript_of_record_checkbox").checked = false;
                        document.getElementById("certificate_of_grades_checkbox").checked = false;
                        document.getElementById("certified_true_copy_checkbox").checked = false;
                        document.getElementById("form_137_checkbox").checked = false;
                        document.getElementById("certificate_as_students_checkbox").checked = false;
                        document.getElementById("honorable_dismissal_checkbox").checked = false;
                        document.getElementById("cav_checkbox").checked = false;
                        document.getElementById("certificate_of_subject_or_course_description_checkbox").checked = false;
                        document.getElementById("certificate_of_units_earned_checkbox").checked = false;
                        document.getElementById("others_checkbox").checked = false;
                        document.getElementById("purpose_of_request_textfield").value = "";
                        document.getElementById("date_hidden").value = moment(info.event.start).format('YYYY-MM-DD');
                        
                        if(response.trim() == "")
                            response = "0";
                        $('#totalAppointment').html('Total Appointments: <b>'+response.trim()+'/50</b>');
                        $('#eventDate').html('Appointment Date: <b><span id="appointment_date">' + moment(info.event.start).format('YYYY-MM-DD') + '</span></b>');
                        $('#eventModal').modal('show');
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
              var iconHtml = iconClass ? '<i class="' + iconClass + '"></i> <span id="title_label"><br>No Slot Available<br></span>  <br> ' : '';
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
  setTimeout(function() {
    // close_loading();
    document.querySelector('.fc-next-button').click();
    document.querySelector('.fc-prev-button').click();
  //   setTimeout(function() {
    <?php
      if($_SESSION['kakacancel_lang_ng_appointment'] == true)
      {
        echo 'document.getElementById("my_appointments_with_icon_button").click();';
        $_SESSION['kakacancel_lang_ng_appointment'] = false;
      }
      else if($_SESSION['kakasubmit_lang_ng_feedback'] == true)
      {
        echo 'document.getElementById("dashboard_with_icon_button").click();';
        $_SESSION['kakasubmit_lang_ng_feedback'] = false;
      }
      else if($_SESSION['kaka_delete_lang_ng_review'] == true)
      {
        echo 'document.getElementById("dashboard_with_icon_button").click();';
        $_SESSION['kaka_delete_lang_ng_review'] = false;
      }
      else if($_SESSION['kakaupdate_lang_ng_feedback'] == true)
      {
        echo 'document.getElementById("dashboard_with_icon_button").click();';
        $_SESSION['kakaupdate_lang_ng_feedback'] = false;
      }
      else 
      {
        echo 'document.getElementById("schedule_an_appointment_with_icon_button").click();';
      }
    ?>
    
    // document.getElementById("biar").style.display = "none";
  //   }, 800);
  }, 1000); // 2000 milliseconds = 2 seconds
</script>
<script>
  function appointment_others_function()
  {
    if(document.getElementById("others_checkbox").checked)
    {
      $('#others_label_and_textfield').slideToggle('2000');
      document.getElementById("others_textfield").value = "";
    }
    else
    {
      $('#others_label_and_textfield').slideToggle('2000');
      document.getElementById("others_textfield").value = "";
    }
  }

  // function appointment_certification_function()
  // {
  //   if(document.getElementById("certification_checkbox").checked)
  //   {
  //     $('#certification_checkboxes').slideToggle('2000');
  //     // document.getElementById("honorable_dismissal_checkbox").checked = false;
  //     document.getElementById("good_moral_character_checkbox").checked = false;
  //   }
  //   else
  //   {
  //     $('#certification_checkboxes').slideToggle('2000');
  //     // document.getElementById("honorable_dismissal_checkbox").checked = false;
  //     document.getElementById("good_moral_character_checkbox").checked = false;
  //   }
  // }
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
                action: 'select_total_students_if_50',
                datee: moment(info.event.start).format('YYYY-MM-DD'),
            };

            $.ajax({
                url: 'student_ajax.php',
                type: 'post',
                data: data,

                success:function(response)
                {
                    if(iconClass == 'fa fa-regular fa-calendar')
                    {
                        Swal.fire(
                            'Invalid!',
                            '<b>'+info.event.title+'</b><br><br>This day is holiday!',
                            'info'
                        )
                    }
                    else if (parseInt(response.trim()) >= 50) 
                    {
                        Swal.fire(
                            'Invalid!',
                            'No Slot Available!',
                            'error'
                        );
                    }
                    else
                    {
                        // if(document.getElementById("certification_checkbox").checked)
                        // {
                        //     $('#certification_checkboxes').toggle();
                        //     // document.getElementById("honorable_dismissal_checkbox").checked = false;
                        //     document.getElementById("good_moral_character_checkbox").checked = false;
                        // }
                        if(document.getElementById("others_checkbox").checked)
                        {
                            $('#others_label_and_textfield').toggle();
                            document.getElementById("others_textfield").value = "";
                        }

                        document.getElementById("transcript_of_record_checkbox").checked = false;
                        document.getElementById("certificate_of_grades_checkbox").checked = false;
                        document.getElementById("certified_true_copy_checkbox").checked = false;
                        document.getElementById("form_137_checkbox").checked = false;
                        document.getElementById("certificate_as_students_checkbox").checked = false;
                        document.getElementById("honorable_dismissal_checkbox").checked = false;
                        document.getElementById("cav_checkbox").checked = false;
                        document.getElementById("certificate_of_subject_or_course_description_checkbox").checked = false;
                        document.getElementById("certificate_of_units_earned_checkbox").checked = false;
                        document.getElementById("others_checkbox").checked = false;
                        document.getElementById("purpose_of_request_textfield").value = "";
                        document.getElementById("date_hidden").value = moment(info.event.start).format('YYYY-MM-DD');
                        
                        if(response.trim() == "")
                            response = "0";
                        $('#totalAppointment').html('Total Appointments: <b>'+response.trim()+'/50</b>');
                        $('#eventDate').html('Appointment Date: <b><span id="appointment_date">' + moment(info.event.start).format('YYYY-MM-DD') + '</span></b>');
                        $('#eventModal').modal('show');
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
              var iconHtml = iconClass ? '<i class="' + iconClass + '"></i> <span id="title_label"><br>No Slot Available<br></span>  <br> ' : '';
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
//   function qweqwe()
//   {
//     alert("1234");
//   }
  function cancel_appointment(id, datee)
  {
    Swal.fire({
      title: 'Warning!',
      text: "Are you sure you want to Cancel this appointment?",
      icon: 'question',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Yes',
      cancelButtonText: 'No'
    }).then((result) => {
      if (result.isConfirmed) { //if yes
        // alert(datee+" and "+id);

        var data = 
        {
          action: 'cancel_appointment',
          id: id,
          datee: datee,
        };

        $.ajax({
          url: 'student_ajax.php',
          type: 'post',
          data: data,

          success:function(response){
            if(response.trim() == "delete_success")
            {
              window.location.href = "student.php";
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

  function show_qr_appointment(id, datee)
  {
    
    var data = 
    {
      action: 'show_qr_code_in_appointments',
      id: id,
      datee: datee,
    };

    $.ajax({
      url: 'student_ajax.php',
      type: 'post',
      data: data,

      success:function(response){

        // Get the div element where you want to generate the QR code
        var qrCodeDiv = document.getElementById("qrcode");

        // Text you want to encode in the QR code
        var qrText = response;

        // Create a QR code instance
        var qr = qrcode(0, "L");

        // Set the QR code data
        qr.addData(qrText);
        qr.make();

        // Generate an HTML <img> element with the QR code image
        var qrImage = qr.createImgTag(4); // You can adjust the size using the scale factor

        // Append the QR code image to the div
        qrCodeDiv.innerHTML = qrImage;

        var qrcodeElement = document.getElementById("qrcode");
        var qrcodeChildren = qrcodeElement.children;

        for (var i = 0; i < qrcodeChildren.length; i++) {
          qrcodeChildren[i].style.width = "240px";
          qrcodeChildren[i].style.height = "240px";
          qrcodeChildren[i].style.border = "1px solid black";
          // Apply your additional styles to qrcodeChildren[i] here
        }
      }

    });

    document.getElementById("launch_qr_modal_id").click();
  }
</script>
<script>
  function limitChars(inputField) 
  {
      var inputValue = inputField.value;
      
      if (inputValue.length > 100) {
          inputField.value = inputValue.substring(0, 100);
      }
  }
  function experience_textarea(inputField) 
  {
      var inputValue = inputField.value;
      
      if (inputValue.length > 255) {
          inputField.value = inputValue.substring(0, 255);
      }

      inputField.style.height = 'auto'; // Reset height to auto
      inputField.style.height = (inputField.scrollHeight) + 'px'; // Set height to content's scroll height
  }


  var star1_clicked = false;
  var star2_clicked = false;
  var star3_clicked = false;
  var star4_clicked = false;
  var star5_clicked = false;
  
  function star1_mouse_over()
  {
    document.getElementById("star1").style.color = "gold";
    // document.getElementById("star1").style.textShadow = "none";
    // document.getElementById("star1").style.background = "linear-gradient(to right, gold 50%, transparent 50%)";
    // document.getElementById("star1").style.backgroundClip = "text";
    // document.getElementById("star1").style.webkitBackgroundClip = "text";
    // document.getElementById("star1").style.color = "transparent";
  }
  function star1_mouse_out()
  {
    document.getElementById("star1").style.color = "white";
  }

  function star2_mouse_over()
  {
    document.getElementById("star1").style.color = "gold";
    document.getElementById("star2").style.color = "gold";
  }
  function star2_mouse_out()
  {
    document.getElementById("star1").style.color = "white";
    document.getElementById("star2").style.color = "white";
  }

  function star3_mouse_over()
  {
    document.getElementById("star1").style.color = "gold";
    document.getElementById("star2").style.color = "gold";
    document.getElementById("star3").style.color = "gold";
  }
  function star3_mouse_out()
  {
    document.getElementById("star1").style.color = "white";
    document.getElementById("star2").style.color = "white";
    document.getElementById("star3").style.color = "white";
  }

  function star4_mouse_over()
  {
    document.getElementById("star1").style.color = "gold";
    document.getElementById("star2").style.color = "gold";
    document.getElementById("star3").style.color = "gold";
    document.getElementById("star4").style.color = "gold";
  }
  function star4_mouse_out()
  {
    document.getElementById("star1").style.color = "white";
    document.getElementById("star2").style.color = "white";
    document.getElementById("star3").style.color = "white";
    document.getElementById("star4").style.color = "white";
  }

  function star5_mouse_over()
  {
    document.getElementById("star1").style.color = "gold";
    document.getElementById("star2").style.color = "gold";
    document.getElementById("star3").style.color = "gold";
    document.getElementById("star4").style.color = "gold";
    document.getElementById("star5").style.color = "gold";
  }
  function star5_mouse_out()
  {
    document.getElementById("star1").style.color = "white";
    document.getElementById("star2").style.color = "white";
    document.getElementById("star3").style.color = "white";
    document.getElementById("star4").style.color = "white";
    document.getElementById("star5").style.color = "white";
  }





  function star1_inside_modal_mouse_over()
  {
    if(star1_clicked == false)
      document.getElementById("star1_inside_modal").style.color = "gold";
    // document.getElementById("star1").style.textShadow = "none";
    // document.getElementById("star1").style.background = "linear-gradient(to right, gold 50%, transparent 50%)";
    // document.getElementById("star1").style.backgroundClip = "text";
    // document.getElementById("star1").style.webkitBackgroundClip = "text";
    // document.getElementById("star1").style.color = "transparent";
  }
  function star1_inside_modal_mouse_out()
  {
    if(star1_clicked == false)
      document.getElementById("star1_inside_modal").style.color = "white";
  }

  function star2_inside_modal_mouse_over()
  {
    if(star1_clicked == false)
      document.getElementById("star1_inside_modal").style.color = "gold";
    if(star2_clicked == false) 
      document.getElementById("star2_inside_modal").style.color = "gold";
  }
  function star2_inside_modal_mouse_out()
  {
    if(star1_clicked == false)
      document.getElementById("star1_inside_modal").style.color = "white";
    if(star2_clicked == false)   
      document.getElementById("star2_inside_modal").style.color = "white";
  }

  function star3_inside_modal_mouse_over()
  {
    if(star1_clicked == false)document.getElementById("star1_inside_modal").style.color = "gold";
    if(star2_clicked == false)document.getElementById("star2_inside_modal").style.color = "gold";
    if(star3_clicked == false)document.getElementById("star3_inside_modal").style.color = "gold";
  }
  function star3_inside_modal_mouse_out()
  {
    if(star1_clicked == false)document.getElementById("star1_inside_modal").style.color = "white";
    if(star2_clicked == false)document.getElementById("star2_inside_modal").style.color = "white";
    if(star3_clicked == false)document.getElementById("star3_inside_modal").style.color = "white";
  }

  function star4_inside_modal_mouse_over()
  {
    if(star1_clicked == false)document.getElementById("star1_inside_modal").style.color = "gold";
    if(star2_clicked == false)document.getElementById("star2_inside_modal").style.color = "gold";
    if(star3_clicked == false)document.getElementById("star3_inside_modal").style.color = "gold";
    if(star4_clicked == false)document.getElementById("star4_inside_modal").style.color = "gold";
  }
  function star4_inside_modal_mouse_out()
  {
    if(star1_clicked == false)document.getElementById("star1_inside_modal").style.color = "white";
    if(star2_clicked == false)document.getElementById("star2_inside_modal").style.color = "white";
    if(star3_clicked == false)document.getElementById("star3_inside_modal").style.color = "white";
    if(star4_clicked == false)document.getElementById("star4_inside_modal").style.color = "white";
  }

  function star5_inside_modal_mouse_over()
  {
    if(star1_clicked == false)document.getElementById("star1_inside_modal").style.color = "gold";
    if(star2_clicked == false)document.getElementById("star2_inside_modal").style.color = "gold";
    if(star3_clicked == false)document.getElementById("star3_inside_modal").style.color = "gold";
    if(star4_clicked == false)document.getElementById("star4_inside_modal").style.color = "gold";
    if(star5_clicked == false)document.getElementById("star5_inside_modal").style.color = "gold";
  }
  function star5_inside_modal_mouse_out()
  {
    if(star1_clicked == false)document.getElementById("star1_inside_modal").style.color = "white";
    if(star2_clicked == false)document.getElementById("star2_inside_modal").style.color = "white";
    if(star3_clicked == false)document.getElementById("star3_inside_modal").style.color = "white";
    if(star4_clicked == false)document.getElementById("star4_inside_modal").style.color = "white";
    if(star5_clicked == false)document.getElementById("star5_inside_modal").style.color = "white";
  }







  function star1_inside_modal_onclick()
  {
    document.getElementById("stars").value = "1";

    star2_clicked = false;
    star3_clicked = false;
    star4_clicked = false;
    star5_clicked = false;
    document.getElementById("star2_inside_modal").style.color = "white";
    document.getElementById("star3_inside_modal").style.color = "white";
    document.getElementById("star4_inside_modal").style.color = "white";
    document.getElementById("star5_inside_modal").style.color = "white";

    star1_clicked = true;
    document.getElementById("star1_inside_modal").style.color = "gold";
  }
  function star2_inside_modal_onclick()
  {
    document.getElementById("stars").value = "2";

    star3_clicked = false;
    star4_clicked = false;
    star5_clicked = false;
    document.getElementById("star3_inside_modal").style.color = "white";
    document.getElementById("star4_inside_modal").style.color = "white";
    document.getElementById("star5_inside_modal").style.color = "white";

    star1_clicked = true;
    document.getElementById("star1_inside_modal").style.color = "gold";
    star2_clicked = true;
    document.getElementById("star2_inside_modal").style.color = "gold";
  }
  function star3_inside_modal_onclick()
  {
    document.getElementById("stars").value = "3";
    
    star4_clicked = false;
    star5_clicked = false;
    document.getElementById("star4_inside_modal").style.color = "white";
    document.getElementById("star5_inside_modal").style.color = "white";

    star1_clicked = true;
    document.getElementById("star1_inside_modal").style.color = "gold";
    star2_clicked = true;
    document.getElementById("star2_inside_modal").style.color = "gold";
    star3_clicked = true;
    document.getElementById("star3_inside_modal").style.color = "gold";
  }
  function star4_inside_modal_onclick()
  {
    document.getElementById("stars").value = "4";
    
    star5_clicked = false;
    document.getElementById("star5_inside_modal").style.color = "white";

    star1_clicked = true;
    document.getElementById("star1_inside_modal").style.color = "gold";
    star2_clicked = true;
    document.getElementById("star2_inside_modal").style.color = "gold";
    star3_clicked = true;
    document.getElementById("star3_inside_modal").style.color = "gold";
    star4_clicked = true;
    document.getElementById("star4_inside_modal").style.color = "gold";
  }
  function star5_inside_modal_onclick()
  {
    document.getElementById("stars").value = "5";
    
    star1_clicked = true;
    document.getElementById("star1_inside_modal").style.color = "gold";
    star2_clicked = true;
    document.getElementById("star2_inside_modal").style.color = "gold";
    star3_clicked = true;
    document.getElementById("star3_inside_modal").style.color = "gold";
    star4_clicked = true;
    document.getElementById("star4_inside_modal").style.color = "gold";
    star5_clicked = true;
    document.getElementById("star5_inside_modal").style.color = "gold";
  }



  function star1_onclick()
  {
    document.getElementById("write_a_review_button").click();
    document.getElementById("star1_inside_modal").click();
  }
  function star2_onclick()
  {
    document.getElementById("write_a_review_button").click();
    document.getElementById("star2_inside_modal").click();
  }
  function star3_onclick()
  {
    document.getElementById("write_a_review_button").click();
    document.getElementById("star3_inside_modal").click();
  }
  function star4_onclick()
  {
    document.getElementById("write_a_review_button").click();
    document.getElementById("star4_inside_modal").click();
  }
  function star5_onclick()
  {
    document.getElementById("write_a_review_button").click();
    document.getElementById("star5_inside_modal").click();
  }

  function write_a_review_onclick()
  {
    star1_clicked = false;
    star2_clicked = false;
    star3_clicked = false;
    star4_clicked = false;
    star5_clicked = false;
    document.getElementById("star1_inside_modal").style.color = "white";
    document.getElementById("star2_inside_modal").style.color = "white";
    document.getElementById("star3_inside_modal").style.color = "white";
    document.getElementById("star4_inside_modal").style.color = "white";
    document.getElementById("star5_inside_modal").style.color = "white";
    document.getElementById("experience_textfield").value = "";
  }
</script>
<script>
  function review_submit_button()
  {
    if(document.getElementById("stars").value.trim() == "")
    {
      Swal.fire(
            'Invalid!',
            'Please select your star rating!',
            'error'
          )
    }
    else
    {
      var data = 
      {
        action: 'submit_review',
        stars: document.getElementById("stars").value,
        experience_textfield: document.getElementById("experience_textfield").value.trim(),
        username: document.getElementById("username").value,
        // email: $("#email1").val(),
        // gender: $("#gender1").val(),
      };

      $.ajax({
        url: 'student_ajax.php',
        type: 'post',
        data: data,

        success:function(response){
          if(response.trim() == "review_already_submitted")
          {
            Swal.fire(
              'You already submitted a feedback!',
              ' ',
              'error'
            )
          }
          else if(response.trim() == "review_submitted_successfully")
          {
            // document.getElementsByName('yes_review')[0].style.display="inherit";
            // document.getElementsByName('no_review')[0].style.display="none";
            // document.getElementById("review_close_button").click();
            window.location.href = "student.php";
            // Swal.fire(
            //   'Thank you for your feedback!',
            //   ' ',
            //   'success'
            // )
          }
          
        }

      });
    }
  }

  function delete_a_review_onclick(id)
  {
    var data = 
    {
      action: 'delete_review',
      id: id,
    };

    $.ajax({
      url: 'student_ajax.php',
      type: 'post',
      data: data,

      success:function(response){
        window.location.href = "student.php";
      }

    });
  }

  function edit_a_review_onclick(id)
  {
    var data = 
    {
      action: 'get_edit_review',
      id: id,
    };

    $.ajax({
      url: 'student_ajax.php',
      type: 'post',
      data: data,

      success:function(response){
        var parsedResponse = JSON.parse(response);
        if(parsedResponse[0] == "1")
          document.getElementById("star1_inside_modal").click();
        if(parsedResponse[0] == "2")
          document.getElementById("star2_inside_modal").click();
        if(parsedResponse[0] == "3")
          document.getElementById("star3_inside_modal").click();
        if(parsedResponse[0] == "4")
          document.getElementById("star4_inside_modal").click();
        if(parsedResponse[0] == "5")
          document.getElementById("star5_inside_modal").click();
          
        document.getElementById("experience_textfield").value = parsedResponse[1];
      }

    });
  }

  function review_edit_button(id)
  {
    if(document.getElementById("stars").value.trim() == "")
    {
      Swal.fire(
            'Invalid!',
            'Please select your star rating!',
            'error'
          )
    }
    else
    {
      var data = 
      {
        action: 'edit_review',
        stars: document.getElementById("stars").value,
        experience_textfield: document.getElementById("experience_textfield").value.trim(),
        username: document.getElementById("username").value,
      };

      $.ajax({
        url: 'student_ajax.php',
        type: 'post',
        data: data,

        success:function(response){
          // alert(response);
          window.location.href = "student.php";
          // document.getElementsByName('yes_review')[0].style.display="inherit";
          // document.getElementsByName('no_review')[0].style.display="none";
          // document.getElementById("review_close_button").click();
          // Swal.fire(
          //   'Thank you for your feedback!',
          //   ' ',
          //   'success'
          // )
        }

      });
    }
  }
</script>
<script>
  function select_province_ajax()
  {
    // alert(document.getElementById("province_dropdownlist").value);

    var data = 
    {
      action1: 'select_province_ajax',
      province_dropdownlist: document.getElementById("province_dropdownlist").value,
    };

    $.ajax({
      url: '../registration/registration_form_ajax.php',
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
      url: '../registration/registration_form_ajax.php',
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
<?php echo "
  <script>
    setTimeout(function() 
    {

      document.getElementById('province_dropdownlist').value = '".$my_profile['province']."';
      select_province_ajax();
      setTimeout(function() 
      {

        document.getElementById('town_city_dropdownlist').value = '".$my_profile['town_city']."'; 
        select_town_city_ajax();
        setTimeout(function() {
            document.getElementById('barangay_dropdownlist').value = '".$my_profile['barangay']."'; 
        }, 1000); 
      }, 1000);
    }, 1000);
  </script>"; ?>
<?php //echo "<script></script>"; ?>
<?php //echo "<script></script>"; ?>
<script>
  setTimeout(function() {
    document.getElementById("white-div").style.display = "none";
  }, 1000); // 2000 milliseconds = 2 seconds
</script>
<script>
//MYPROFILE_ACCOUNTINFORMATION UPDATE
  let my_account_account_information_temp_array = [];
    function my_account_account_information_edit_button()
    {
        document.getElementById("my_account_account_information_update_button_id").style.display = "inline";
        document.getElementById("my_account_account_information_cancel_button_id").style.display = "inline";
        document.getElementById("my_account_account_information_edit_button_id").style.display = "none";
        document.getElementById("username_textfield").disabled = false;
        document.getElementById("password_textfield").disabled = false;
        document.getElementById("confirm_password_textfield").disabled = false;
        document.getElementById("togglePassword").disabled = false;
        document.getElementById("toggleConfirmPassword").disabled = false;
        my_account_account_information_temp_array[0] = document.getElementById("username_textfield").value;
        my_account_account_information_temp_array[1] = document.getElementById("password_textfield").value;
        my_account_account_information_temp_array[2] = document.getElementById("confirm_password_textfield").value;
    }
    function my_account_account_information_cancel_button()
    {
        document.getElementById("my_account_account_information_update_button_id").style.display = "none";
        document.getElementById("my_account_account_information_cancel_button_id").style.display = "none";
        document.getElementById("my_account_account_information_edit_button_id").style.display = "inline";
        document.getElementById("username_textfield").disabled = true;
        document.getElementById("password_textfield").disabled = true;
        document.getElementById("confirm_password_textfield").disabled = true;
        if(document.getElementById("password_textfield").type == "text")
          document.getElementById("togglePassword").click();
        if(document.getElementById("confirm_password_textfield").type == "text")
          document.getElementById("toggleConfirmPassword").click();
        document.getElementById("togglePassword").disabled = true;
        document.getElementById("toggleConfirmPassword").disabled = true;
        document.getElementById("username_textfield").value = my_account_account_information_temp_array[0];
        document.getElementById("password_textfield").value = my_account_account_information_temp_array[1];
        document.getElementById("confirm_password_textfield").value = my_account_account_information_temp_array[2];
    }
    //ajax
    function my_account_account_information_update_button()
    {
        if(document.getElementById("username_textfield").value === '')
            document.getElementById("username_textfield").reportValidity();
        else if(document.getElementById("password_textfield").value === '')
            document.getElementById("password_textfield").reportValidity();
        else if(document.getElementById("confirm_password_textfield").value === '')
            document.getElementById("confirm_password_textfield").reportValidity();
        else if (
            !/\d/.test(document.getElementById("password_textfield").value) ||  // Check for at least 1 number
            !/[a-z]/.test(document.getElementById("password_textfield").value) ||  // Check for at least 1 lowercase letter
            !/[A-Z]/.test(document.getElementById("password_textfield").value) ||  // Check for at least 1 uppercase letter
            !/[!@#$%^&*()_+{}\[\]:;<>,.?~\-]/.test(document.getElementById("password_textfield").value) ||  // Check for at least 1 special character
            document.getElementById("password_textfield").value.length < 8  // Check for at least 8 characters
        ) 
        {
          // var ekis = '<i class="fas fa-times-circle" style="color: red;"></i>';
          // var checkk = '<i class="fas fa-check-circle" style="color: green;"></i>';
          var ekis = '❌'; // Placeholder for error
          var checkk = '✅'; // Placeholder for success
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

          
          document.getElementById("password_textfield").setCustomValidity(`
              INVALID PASSWORD! \n
              ${one_number_icon} Must Contain at least one number!
              ${one_lowercase_icon} Must Contain at least one lowercase letter!
              ${one_uppercase_icon} Must Contain at least one uppercase letter!
              ${one_special_char_icon} Must Contain at least one special character (!@#$%^&*()_+{}[]:;<>,.?~\-)
              ${eight_chars_icon} Length must be at least 8 characters!
          `);
          document.getElementById("password_textfield").reportValidity();
        }
        else if (document.getElementById("confirm_password_textfield").value !== document.getElementById("password_textfield").value) 
        {
          document.getElementById("password_textfield").setCustomValidity("Passwords do not match");
          document.getElementById("password_textfield").reportValidity();
        }
        else
        {
            $(document).ready(function()
            {
                var data = {
                  action: 'update_account_information',
                  username_textfield: $("#username_textfield").val(),
                  password_textfield: $("#password_textfield").val(),
                };

                $.ajax({
                url: 'student_ajax.php',
                type: 'post',
                data: data,
                success:function(response){
                  if(response.trim() != "username_is_existing123**")
                  {
                    Swal.fire({
                    icon: 'success',
                    title: 'Success!',
                    text: 'Updating Data Successfully',
                    showConfirmButton: true
                    });
                    document.getElementById("my_account_account_information_update_button_id").style.display = "none";
                    document.getElementById("my_account_account_information_cancel_button_id").style.display = "none";
                    document.getElementById("my_account_account_information_edit_button_id").style.display = "inline";
                    document.getElementById("username_textfield").disabled = true;
                    document.getElementById("password_textfield").disabled = true;
                    document.getElementById("confirm_password_textfield").disabled = true;
                    if(document.getElementById("password_textfield").type == "text")
                      document.getElementById("togglePassword").click();
                    if(document.getElementById("confirm_password_textfield").type == "text")
                      document.getElementById("toggleConfirmPassword").click();
                    document.getElementById("togglePassword").disabled = true;
                    document.getElementById("toggleConfirmPassword").disabled = true;

                    document.getElementById("username").value = response.trim();
                    document.getElementById("username_top_nav_bar").innerHTML = response.trim();
                  }
                  else
                  {
                    Swal.fire({
                    icon: 'error',
                    title: 'Failed!',
                    text: 'Username already exists!'
                    });
                  }
                }
                });
            });
        }
    }
//END OF MYPROFILE_ACCOUNTINFORMATION UPDATE

//MYPROFILE_INSTITUTEINFORMATION UPDATE
let my_account_institute_information_temp_array = [];
    function my_account_institute_information_edit_button()
    {
        document.getElementById("my_account_institute_information_update_button_id").style.display = "inline";
        document.getElementById("my_account_institute_information_cancel_button_id").style.display = "inline";
        document.getElementById("my_account_institute_information_edit_button_id").style.display = "none";
        document.getElementById("student_number_textfield").disabled = false;
        document.getElementById("institute_email_textfield").disabled = false;
        document.getElementById("student_type_dropdownlist").disabled = false;
        document.getElementById("course_textfield").disabled = false;
        my_account_institute_information_temp_array[0] = document.getElementById("student_number_textfield").value;
        my_account_institute_information_temp_array[1] = document.getElementById("institute_email_textfield").value;
        my_account_institute_information_temp_array[2] = document.getElementById("student_type_dropdownlist").value;
        my_account_institute_information_temp_array[3] = document.getElementById("course_textfield").value;
    }
    function my_account_institute_information_cancel_button()
    {
        document.getElementById("my_account_institute_information_update_button_id").style.display = "none";
        document.getElementById("my_account_institute_information_cancel_button_id").style.display = "none";
        document.getElementById("my_account_institute_information_edit_button_id").style.display = "inline";
        document.getElementById("student_number_textfield").disabled = true;
        document.getElementById("institute_email_textfield").disabled = true;
        document.getElementById("student_type_dropdownlist").disabled = true;
        document.getElementById("course_textfield").disabled = true;
        document.getElementById("student_number_textfield").value = my_account_institute_information_temp_array[0];
        document.getElementById("institute_email_textfield").value = my_account_institute_information_temp_array[1];
        document.getElementById("student_type_dropdownlist").value = my_account_institute_information_temp_array[2];
        document.getElementById("course_textfield").value = my_account_institute_information_temp_array[3];
    }
    //ajax
    function my_account_institute_information_update_button()
    {
        if (document.getElementById("student_number_textfield").value.trim() == "")
        {
            document.getElementById("student_number_textfield").setCustomValidity("Please fill out this field.");
            document.getElementById("student_number_textfield").reportValidity();
        }
        else if (document.getElementById("institute_email_textfield").value.trim() == "")
        {
            document.getElementById("institute_email_textfield").setCustomValidity("Please fill out this field.");
            document.getElementById("institute_email_textfield").reportValidity();
        }
        else if (!document.getElementById("institute_email_textfield").value.endsWith("@paterostechnologicalcollege.edu.ph"))
        {
            document.getElementById("institute_email_textfield").setCustomValidity("Email is invalid! You must input your Institute Email!");
            document.getElementById("institute_email_textfield").reportValidity();
        }
        else if (document.getElementById("student_type_dropdownlist").value.trim() == "")
        {
            document.getElementById("student_type_dropdownlist").setCustomValidity("Please fill out this field.");
            document.getElementById("student_type_dropdownlist").reportValidity();
        }
        else if (document.getElementById("course_textfield").value.trim() == "")
        {
            document.getElementById("course_textfield").setCustomValidity("Please fill out this field.");
            document.getElementById("course_textfield").reportValidity();
        }
        else
        {
            $(document).ready(function()
            {
                var data = {
                  action: 'update_institute_information',
                  student_number_textfield: $("#student_number_textfield").val(),
                  institute_email_textfield: $("#institute_email_textfield").val(),
                  student_type_dropdownlist: $("#student_type_dropdownlist").val(),
                  course_textfield: $("#course_textfield").val(),
                };

                $.ajax({
                url: 'student_ajax.php',
                type: 'post',
                data: data,
                success:function(response){
                    Swal.fire({
                    icon: 'success',
                    title: 'Success!',
                    text: 'Updating Data Successfully',
                    showConfirmButton: true
                    });
                    document.getElementById("my_account_institute_information_update_button_id").style.display = "none";
                    document.getElementById("my_account_institute_information_cancel_button_id").style.display = "none";
                    document.getElementById("my_account_institute_information_edit_button_id").style.display = "inline";
                    
                    document.getElementById("student_number_textfield").disabled = true;
                    document.getElementById("institute_email_textfield").disabled = true;
                    document.getElementById("student_type_dropdownlist").disabled = true;
                    document.getElementById("course_textfield").disabled = true;
                }
                });
            });
        }
    }
//END OF MYPROFILE_INSTITUTEINFORMATION UPDATE

//MYPROFILE_PERSONALINFORMATION UPDATE
    let my_account_personal_information_temp_array = [];
    function my_account_personal_information_edit_button()
    {
        document.getElementById("my_account_personal_information_update_button_id").style.display = "inline";
        document.getElementById("my_account_personal_information_cancel_button_id").style.display = "inline";
        document.getElementById("my_account_personal_information_edit_button_id").style.display = "none";
        document.getElementById("first_name_textfield").disabled = false;
        document.getElementById("middle_name_textfield").disabled = false;
        document.getElementById("last_name_textfield").disabled = false;
        document.getElementById("suffix_textfield").disabled = false;
        document.getElementById("gender_dropdownlist").disabled = false;
        document.getElementById("birthday_textfield").disabled = false;
        document.getElementById("contact_no_textfield").disabled = false;
        document.getElementById("street_address_textfield").disabled = false;
        document.getElementById("province_dropdownlist").disabled = false;
        document.getElementById("town_city_dropdownlist").disabled = false;
        document.getElementById("barangay_dropdownlist").disabled = false;
        document.getElementById("postcode_textfield").disabled = false;
        my_account_personal_information_temp_array[0] = document.getElementById("first_name_textfield").value;
        my_account_personal_information_temp_array[1] = document.getElementById("middle_name_textfield").value;
        my_account_personal_information_temp_array[2] = document.getElementById("last_name_textfield").value;
        my_account_personal_information_temp_array[3] = document.getElementById("suffix_textfield").value;
        my_account_personal_information_temp_array[4] = document.getElementById("gender_dropdownlist").value;
        my_account_personal_information_temp_array[5] = document.getElementById("birthday_textfield").value;
        my_account_personal_information_temp_array[6] = document.getElementById("contact_no_textfield").value;
        my_account_personal_information_temp_array[7] = document.getElementById("street_address_textfield").value;
        my_account_personal_information_temp_array[8] = document.getElementById("province_dropdownlist").value;
        my_account_personal_information_temp_array[9] = document.getElementById("town_city_dropdownlist").value;
        my_account_personal_information_temp_array[10] = document.getElementById("barangay_dropdownlist").value;
        my_account_personal_information_temp_array[11] = document.getElementById("postcode_textfield").value;
    }
    function my_account_personal_information_cancel_button()
    {
        document.getElementById("my_account_personal_information_update_button_id").style.display = "none";
        document.getElementById("my_account_personal_information_cancel_button_id").style.display = "none";
        document.getElementById("first_name_textfield").disabled = true;
        document.getElementById("middle_name_textfield").disabled = true;
        document.getElementById("last_name_textfield").disabled = true;
        document.getElementById("suffix_textfield").disabled = true;
        document.getElementById("gender_dropdownlist").disabled = true;
        document.getElementById("birthday_textfield").disabled = true;
        document.getElementById("contact_no_textfield").disabled = true;
        document.getElementById("street_address_textfield").disabled = true;
        document.getElementById("province_dropdownlist").disabled = true;
        document.getElementById("town_city_dropdownlist").disabled = true;
        document.getElementById("barangay_dropdownlist").disabled = true;
        document.getElementById("postcode_textfield").disabled = true;
        document.getElementById("first_name_textfield").value = my_account_personal_information_temp_array[0];
        document.getElementById("middle_name_textfield").value = my_account_personal_information_temp_array[1];
        document.getElementById("last_name_textfield").value = my_account_personal_information_temp_array[2];
        document.getElementById("suffix_textfield").value = my_account_personal_information_temp_array[3];
        document.getElementById("gender_dropdownlist").value = my_account_personal_information_temp_array[4];
        document.getElementById("birthday_textfield").value = my_account_personal_information_temp_array[5];
        document.getElementById("contact_no_textfield").value = my_account_personal_information_temp_array[6];
        document.getElementById("street_address_textfield").value = my_account_personal_information_temp_array[7];
        document.getElementById("province_dropdownlist").value = my_account_personal_information_temp_array[8];
        select_province_ajax();
        setTimeout(function() {
          document.getElementById("town_city_dropdownlist").value = my_account_personal_information_temp_array[9];
          select_town_city_ajax();
          setTimeout(function() {
            document.getElementById("barangay_dropdownlist").value = my_account_personal_information_temp_array[10];
            document.getElementById("postcode_textfield").value = my_account_personal_information_temp_array[11];
            document.getElementById("my_account_personal_information_edit_button_id").style.display = "inline";
          }, 1000); 
        }, 1000); 
    }
    //ajax
    function my_account_personal_information_update_button()
    {
        if (document.getElementById("first_name_textfield").value.trim() == "")
        {
            document.getElementById("first_name_textfield").setCustomValidity("Please fill out this field.");
            document.getElementById("first_name_textfield").reportValidity();
        }
        else if (document.getElementById("last_name_textfield").value.trim() == "")
        {
            document.getElementById("last_name_textfield").setCustomValidity("Please fill out this field.");
            document.getElementById("last_name_textfield").reportValidity();
        }
        else if (document.getElementById("gender_dropdownlist").value.trim() == "")
        {
            document.getElementById("gender_dropdownlist").setCustomValidity("Please select your Gender.");
            document.getElementById("gender_dropdownlist").reportValidity();
        }
        else if (document.getElementById("birthday_textfield").value.trim() == "")
        {
            document.getElementById("birthday_textfield").setCustomValidity("Please select your Birthday!");
            document.getElementById("birthday_textfield").reportValidity();
        }
        else if (document.getElementById("contact_no_textfield").value.trim() == "")
        {
            document.getElementById("contact_no_textfield").setCustomValidity("Please fill out this field.");
            document.getElementById("contact_no_textfield").reportValidity();
        }
        // else if (!document.getElementById("contact_no_textfield").value.startsWith("09"))
        // {
        //     document.getElementById("contact_no_textfield").setCustomValidity("Invalid contact number");
        //     document.getElementById("contact_no_textfield").reportValidity();
        // }
        // else if (document.getElementById("contact_no_textfield").value.length < 11)
        // {
        //     document.getElementById("contact_no_textfield").setCustomValidity("0");
        //     document.getElementById("contact_no_textfield").reportValidity();
        // }
        else if (document.getElementById("street_address_textfield").value.trim() == "")
        {
            document.getElementById("street_address_textfield").setCustomValidity("Please fill out this field.");
            document.getElementById("street_address_textfield").reportValidity();
        }
        else if (document.getElementById("province_dropdownlist").value.trim() == "")
        {
            document.getElementById("province_dropdownlist").setCustomValidity("Please select your province!");
            document.getElementById("province_dropdownlist").reportValidity();
        }
        else if (document.getElementById("town_city_dropdownlist").value.trim() == "")
        {
            document.getElementById("town_city_dropdownlist").setCustomValidity("Please select your town or city!");
            document.getElementById("town_city_dropdownlist").reportValidity();
        }
        else if (document.getElementById("barangay_dropdownlist").value.trim() == "")
        {
            document.getElementById("barangay_dropdownlist").setCustomValidity("Please select your barangay!");
            document.getElementById("barangay_dropdownlist").reportValidity();
        }
        else
        {
            $(document).ready(function()
            {
                var data = {
                  action: 'update_personal_information',
                  first_name_textfield: $("#first_name_textfield").val(),
                  middle_name_textfield: $("#middle_name_textfield").val(),
                  last_name_textfield: $("#last_name_textfield").val(),
                  suffix_textfield: $("#suffix_textfield").val(),
                  gender_dropdownlist: $("#gender_dropdownlist").val(),
                  birthday_textfield: $("#birthday_textfield").val(),
                  contact_no_textfield: $("#contact_no_textfield").val(),
                  street_address_textfield: $("#street_address_textfield").val(),
                  province_dropdownlist: $("#province_dropdownlist").val(),
                  town_city_dropdownlist: $("#town_city_dropdownlist").val(),
                  barangay_dropdownlist: $("#barangay_dropdownlist").val(),
                  postcode_textfield: $("#postcode_textfield").val(),
                };

                $.ajax({
                url: 'student_ajax.php',
                type: 'post',
                data: data,
                success:function(response){
                    Swal.fire({
                    icon: 'success',
                    title: 'Success!',
                    text: 'Updating Data Successfully',
                    showConfirmButton: true
                    });
                    document.getElementById("my_account_personal_information_update_button_id").style.display = "none";
                    document.getElementById("my_account_personal_information_cancel_button_id").style.display = "none";
                    document.getElementById("my_account_personal_information_edit_button_id").style.display = "inline";
                    
                    document.getElementById("first_name_textfield").disabled = true;
                    document.getElementById("middle_name_textfield").disabled = true;
                    document.getElementById("last_name_textfield").disabled = true;
                    document.getElementById("suffix_textfield").disabled = true;
                    document.getElementById("gender_dropdownlist").disabled = true;
                    document.getElementById("birthday_textfield").disabled = true;
                    document.getElementById("contact_no_textfield").disabled = true;
                    document.getElementById("street_address_textfield").disabled = true;
                    document.getElementById("province_dropdownlist").disabled = true;
                    document.getElementById("town_city_dropdownlist").disabled = true;
                    document.getElementById("barangay_dropdownlist").disabled = true;
                    document.getElementById("postcode_textfield").disabled = true;

                    document.getElementById("name_top_nav_bar").innerHTML = response.trim().toUpperCase();
                }
                });
            });
        }
    }
//END OF MYPROFILE_PERSONALINFORMATION UPDATE
</script>