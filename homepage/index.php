<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Web Base Queing Management System</title>
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous"> -->
    <?php
      include '../cdn/cdns.php';
    ?>
  </head>
  <body>
    <?php
    session_start();
    if(isset($_SESSION['admin_id']) && !isset($_SESSION['student_id']))
    {
      echo '
        <script>
          window.location.href = "../admin/admin.php";
        </script>
      ';
    }
    else if(!isset($_SESSION['admin_id']) && isset($_SESSION['student_id']))
    {
      echo '
        <script>
        window.location.href = "../student/student.php";
        </script>
      ';
    }
  ?>
      <?php
        include "../navbars/homepage_navbar.php";
      ?>
      <section id="home">
        <img style="width: 100%; height: 100vh; margin-top: 40px;" src="homepageimg.jpg" alt="">
      </section>

      <section id="aboutus" style="position: relative;">
        <img style="position: absolute; text-align: center; z-index: -1;width: 100%;" src="aboutus.png" alt="">
        <div class="container">
           <div class="display-1 text-center pt-5 fw-bold text-warning font-border">About Us</div>
           <div>
            <div class="card border-success mt-3 mb-3" style="max-width: 200rem;">
                <div class="card-header text-center fs-3">About PTC</div>
                <div class="card-body text-success">
                  
                  <p class="card-text">Pateros Technological College (PTC) is a technical-vocational school established on January 29, 1993 by virtue of Municipal Ordinance No. 93-07. It started its operation on August 16, 1993, initially offering short term and two-year Associate in Computer Science, Computer Secretarial Science, and Computer Technology courses. Systematrix Computer Education and Services, Inc. (SCESI) became the partner group of PTC through Municipal Resolution No. 64 – 95 authorizing the Municipality of Pateros to sign a Memorandum of Agreement with SCESI.
<br><br>
                    The partnership between PTC and SCESI ended on October, 1995. Keeping up with the goal to continue its technical-vocational advocacy, PTC forged another linkage, this time with the Technological University of the Philippines (TUP). On September 26, 1995, PTC became the recipient of the Adopt-A-School program of TUP through another Memorandum of Agreement. The linkage gave birth to the first four-year Bachelor of Computer Science program in academic year 1997 – 1998. PTC also became TUP’s ally in the off-campus training of the latter’s undergraduate and graduate students.
         <br><br>           
                    Because of these linkages, Pateros Technological College gained its institutional footing to stand on its own. This paved the way to offer ladderized scheme programs that lead to Baccalaureate Degrees. The Bachelor of Science in Education, Major in Information System and Minor in Mathematics was offered in SY 2006 – 2007. Then, the Certificate in Hotel and Restaurant Management leading to Bachelor of Science in Hospitality Management and Bachelor of Science in Office Administration were offered the following school year.</p>
                </div>
           </div>
           <div class="container mt-5">
            <div class="row justify-content-evenly">
              <div class="col-lg-8 col-md-12">
                <div class="card border-success">
                  <div class="card-header display-5 text-center">Mission</div>
                  <div class="card-body text-success">
                    <h5 class="card-title">Pateros Technological College commits itself to:</h5>
                    <p class="card-text">
                      <ul>
                        <li>provide quality higher education thru specialized professional instruction;</li>
                        <li>provide training in scientific, technological, industrial and vocational fields;</li>
                        <li>enhance moral and spiritual values;</li>
                        <li>instill the love of country and appreciation of the Filipino cultural heritage;</li>
                        <li>promote environmental awareness and unconditional love for mother earth;</li>
                        <li>after educational opportunities especially to marginalized individuals;</li>
                        <li>heighten students' creativity and leadership through extra and co-curricular activities; and</li>
                        <li>produce quality graduates adept with technological skills and professional education.</li>
                      </ul>
                    </p>
                  </div>
                </div>
              </div>
              <div class="col-lg-4 col-md-12 mt-4">
                <div class="card border-success">
                  <div class="card-header display-5 text-center">Vision</div>
                  <div class="card-body text-success">
                    <p class="card-text">Pateros Technological College envisions itself as an institution of higher learning which is strongly committed to the holistic development of the students to improve their lives in particular and the society in general</p>
                  </div>
                </div>
              </div>
            </div>
          </div>

        </div>
      </section>

      <style>
        body{
          background-color: rgb(31, 86, 66);
          background-size: cover;
        }
        #my_team_images 
        {
          height: 350px;
          width: 350px;
        }
        @media only screen and (max-width: 1594px) {
          #my_team_images 
          {
            height: 250px;
            width: 250px;
          }
        }
        @media only screen and (max-width: 1194px) {
          #my_team_images 
          {
            height: 200px;
            width: 200px;
          }
        }
        .font-border 
        {
          -webkit-text-stroke: 1px black;
          
          color: rgb(31, 86, 66);
        }
      </style>

      <section id="team" style="position: relative;">
        <img style="position: absolute; text-align: center; z-index: -1; width: 100%;" src="aboutsystembg.jpg" alt="">
        <div style="padding: 100px; color: rgb(31, 86, 66);">
          <p class="display-4 text-center text-light fw-bold font-border "><b>My Team</b></p>
          <div class="row justify-content-center mt-3">
            <div class="col-sm-6 col-md-3 text-center text-warning mb-4">
              <img src="homepageimg.jpg" alt="" id="my_team_images" style="clip-path: circle(50% at 50% 50%); margin: 0 auto;">
              <p class="fs-5">Example</p>
              <p class="fs-6">Programmer</p>
            </div>
            <div class="col-sm-6 col-md-3 text-center text-warning mb-4">
              <img src="homepageimg.jpg" alt="" id="my_team_images" style="clip-path: circle(50% at 50% 50%); margin: 0 auto;">
              <p class="fs-5">Example</p>
              <p class="fs-6">Programmer</p>
            </div>
            <div class="col-sm-6 col-md-3 text-center text-warning mb-4">
              <img src="homepageimg.jpg" alt="" id="my_team_images" style="clip-path: circle(50% at 50% 50%); margin: 0 auto;">
              <p class="fs-5">Example</p>
              <p class="fs-6">Programmer</p>
            </div>
            <div class="col-sm-6 col-md-3 text-center text-warning mb-4">
              <img src="homepageimg.jpg" alt="" id="my_team_images" style="clip-path: circle(50% at 50% 50%); margin: 0 auto;">
              <p class="fs-5">Example</p>
              <p class="fs-6">Programmer</p>
            </div>
          </div>
        </div>
      </section>
      
    
    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script> -->
  </body>
</html>