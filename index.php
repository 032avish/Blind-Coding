<?php
session_start();
  if ($_SERVER['REQUEST_METHOD'] == "POST")
  {
    $server = "localhost";
    $user = "avish";
    $dbName = "login_details";
    $conn = new mysqli($server, $user, "jay@2000", $dbName);
    
    if ($_POST['tab'] == "login")
    {
        $roll = $_POST['Roll_Number'];
        $pass = $_POST['Password'];
        
        if (!$roll | !$pass)
        {
              echo "<script>alert('All Fields Required!')</script>";
        }
        else
        {
            $sql = "SELECT * FROM login WHERE Roll_Number='$roll' and Password='$pass';";
            // echo $sql;
            
            $res = $conn->query($sql)->fetch_array();
            $out = $res[0] ?? "";
            $flag = $res[4] ?? "";
        
            if ($out == "")
                    echo "<script>alert('Wrong Roll Number or Password')</script>";
        
            else if ($flag != 0)
              echo "<script>alert('You cannot login again!')</script>";
        
            else  
            {
              $_SESSION['Roll_Number'] = $roll;
              $_SESSION['Question'] = 0;
            //   echo "done";
              $sql = "UPDATE login SET flag=1 WHERE Roll_Number='$roll'";
              $conn->query($sql);
              header("Location: http://codorb.in//instruction_page.php");
              exit();
            }
        }
    }
    else
    {
        $roll = $_POST['Roll_Number_reg'];
        $email = $_POST['Email'];
        $user = $_POST['Username'];
        $pass1 = $_POST['password_1'];
          
        if (!$roll | !$email | !$user | !$pass1)
        {
              echo "<script>alert('All Fields Required!')</script>";
              
              
        }
        else if ($roll < 100000000 || $roll > 999999999)
            echo "<script>alert('Please enter a valid Roll number')</script>";
        else
        {
          
            $sql = "INSERT INTO login VALUES('$roll', '$user', '$email', '$pass1', 0);";
            
            // echo $sql;
            $res = $conn->query($sql);
           
            
              echo "<script>alert('Registered Successfully!')</script>";
            header("Location: http://codorb.in/");
        
        }
        
    }
    
    
    
  }

?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <!-- <link rel="stylesheet" type ="text/css" href="basicjavascript/s.css" > -->
        <link rel="stylesheet" href="new.css">
        <script src="main.js"></script>
        <script type="text/javascript">
        function preventBack() { window.history.forward(); }
        setTimeout("preventBack()", 0);
        window.onunload = function () { null };
        </script>
        <script>
            function fun2(evt) {
            var code = evt.keyCode;
            if (code >= 48 && code <= 57 || code >= 96 && code <= 105 || code == 8 || code >= 37 && code <= 40)
                return true;
            else
                return false;
    
            }
            function fun1(evt) {
            var code = evt.keyCode;
            if (code >= 65 && code <= 90 || code == 190 || code == 8 || code == 32 || code >= 37 && code <= 40)
                return true;
            else
                return false;
    
            }

            function fun4(evt) {
            var code = evt.keyCode;
            if (code >= 48 && code <= 57 || code >= 96 && code <= 105 || code == 8 || code >= 37 && code <= 40)
            return true;
            else
            return false;

        }
        </script>
    </head>

<!--<body class ="title" background ="i9.jpeg">-->
<body class ="title" background ="dark.jpeg">
    
    <!-- <nav class="navbar navbar-expand-lg navbar-dark bg-dark"> -->
    <div style="text-align: center;">
        <nav class="navbar">
          <h3 class="navbar-brand" ><h3 style="color:white"> Welcome to COD-ORB</h3></h3>
      
          <!-- <ul class="navbar-nav ml-auto">
            <li class="nav-item active"> -->
              <!-- <a class="nav-link" href="thanku_page.htm">Contact Us<span class="sr-only">(current)</span></a> -->
            <!-- </li> -->
          <!-- </ul> -->
        </nav>
    </div>

    <section class="my-5">
        <br>
        
        <form action="http://codorb.in/" method="post">
        
            <!--<?php include('errors.php'); ?>-->

        <div class="row">
            <div class="col-md-6 mx-auto p-0">
                <div class="card">
                    <div class="login-box">
                        <div class="login-snip text-centre"> <input id="tab-1" type="radio" name="tab" class="sign-in" value="login" checked><label for="tab-1" class="tab">Login</label>
                        <input id="tab-2" type="radio" name="tab" class="sign-up" value="reg"><label for="tab-2" class="tab">Sign Up</label>
                            <div class="login-space">
                                <div class="login">
                                <!-- <div class="form-group"> -->
                                    <div class="group"> <label for="user" class="label text-left"></label>
                                
                                    <input id="user" type="number" class="input" name="Roll_Number" placeholder="enter roll number"> </div>
                                    <div class="group"> <label for="pass" class="label text-left"></label>
                                    <input id="pass" type="password" class="input" data-type="Password" name="Password" placeholder="enter password"> </div>
                                    <!-- <div class="group"> <input id="check" type="checkbox" class="check" checked> <label for="check"><span class="icon"></span> Keep me Signed in</label> </div> -->
                                    <button type="submit" class="btn btn-primary" name="login_user" onclick="validateForm1()">SUBMIT</button>
                                    <!-- <div class="hr"></div> -->
                                    <!-- <div class="foot"> <a href="#">Forgot Password?</a> </div> -->
                                </div>
                                <div class="sign-up-form">
                                    
                                    <div class="group"> <label for="user" class="label text-left"></label>
                                    <input id="user" type="text" class="input" placeholder="enter username" name="Username" value="<?php echo $username; ?>"> </div>
                                    <div class="group"> <label for="user" class="label text-left"></label>
                                    <input id="user" type="number" class="input" placeholder="enter roll number" name="Roll_Number_reg" value="<?php echo $rollno; ?>"> </div>
                                    <div class="group"> <label for="pass" class="label text-left"></label>
                                    <input id="pass" type="email" class="input" placeholder="enter email address" name="Email" > </div>
                                    <div class="group"> <label for="pass" class="label text-left"></label>
                                    <input id="pass" type="password" class="input" data-type="password" name="password_1" placeholder="enter password"> </div>
                                    <button type="submit" class="btn btn-primary" name="reg_user" onclick="validateForm2()">SUBMIT</button>
                                    <!-- <div class="hr"></div> -->
                                    <!-- <div class="foot"> <label for="tab-1">Already Member?</label> </div> -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
      <!-- </div> -->
    </form>
    </section>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>


    <div id="nitt" class = "logo">
        <img src = "nitt.png">
        <span class = "full-form nowrap"> National Institute of Technology, Trichy </span>
    </div>
    <div id = "acm" class = "logo">
        <img src="acm1.png">
        <span class = "full-form nowrap"> Association for Computing Machinery </span>
    </div>
</div.container>
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