<!DOCTYPE html>
  <?php
  session_start();
  $Roll_Number = $_SESSION['Roll_Number'] ?? "";
  echo $ROll_Number;
  if ($Roll_Number == "")
  {
    echo "<script>alert('login to proceed')</script>";
      header("location: http://codorb.in/");
      
  }
  ?>
<html>

  <head>
    <title></title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="main.js"></script>
    <link rel="stylesheet" href="http://codorb.in/instruction.css">
    <script type="text/javascript">
      function preventBack() { window.history.forward(); }
      setTimeout("preventBack()", 0);
      window.onunload = function () { null };
    </script>
    <script>
      function init() {
        <?php
    $server = "localhost";
    $user = "jayshree";
    $dbName = "login_details";
    $conn = new mysqli($server, $user, "jay@2000", $dbName);

          $Roll_Number = $_SESSION['Roll_Number'] ?? "";
          $_SESSION['Question'] = 1;                          
        ?> 
      window.open("http://codorb.in/main_page.php");
     
      }
    </script>



  </head>

  <body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <a class="navbar-brand" href="#">Welcome to COD-ORB</a>
    </nav>
    <section class="my-5">
      <div>
        <h3 class="text-center"><b>Instructions</b></h3>
      </div>
      <br>
      <div class="w-50 m-auto text-black">
       
        <p>
           
                1) This event will last for 45 mins. The number of questions in this event is 3.<br><br> 
                2) You can submit the code for each question only once.<br><br>
                3) You can not copy/paste from any website.<br><br>
                4) Only one question will appear on the screen at a time. 
                   You will not be able to access the question once you have submitted the answer to that particular question. <br><br>
                5) Click on the NEXT button to save your code and move to the next question. <br><br>
                6) If you have submitted everything or you've to end the test, you can click on the FINISH button otherwise don't click it. 
                   It will save all your answers and exit the event.<br><br>
                7) Do not refresh the page while writing the code or else your data will be lost.<br><br>
                8) Do not close the tab once you have logged in else you will log out automatically. You can't log in more than once.<br>
        </p>
      </div>

      <br><br>
      <div class="col-md-9  text-right">
        <a  class="btn btn-primary" role="button" aria-disabled="true" vale="timeset" onclick="init()">Next</a>
      </div>
    </section>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  </body>

  <script>
    window.oncontextmenu = function () {
      return false;
    }
    $(document).keydown(function (event) {
      if (event.keyCode == 123) {
        return false;
      }
      else if ((event.ctrlKey && event.shiftKey && event.keyCode == 73) || (event.ctrlKey && event.shiftKey && event.keyCode == 74)) {
        return false;
      }
    });
  </script>
  <script type="text/javascript">
    $(document).ready(function () {
      //Disable full page
      $('body').bind('cut copy paste', function (e) {
        e.preventDefault();
      });
    });
  </script>

</html>