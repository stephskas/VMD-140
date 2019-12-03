<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
    <title>TFT Workshop Contact Form</title>
    <meta name="description" content="VMD 140 - Project 4 - Final" />
    <meta name="author" content="Stephanie Sakai" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
<!-- CSS--->	
    <link rel="stylesheet" href="css/style.css">
    <link href="css/animate.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,500,700&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Crimson+Pro:300,300i,400,500,500i,600,700&display=swap" rel="stylesheet">
<!-- JS SCRIPTS--->	
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/parallax.js"></script>
	<script src="js/main.js"></script>
	<script src="js/wow.js"></script>
    <script>
        new WOW().init();
  	</script>
</head>

<body>

<!------- HEADER BAR------->	
<header>
<!---------- ROW ---------->			
    <div class="row">
		<div id="nav">
			<a class="col-lg-4 col-md-4" href="https://www.tftcenter.com" target="_blank" rel="noreferrer noopener"><img src="images/tft_logo.png" alt="TFT Center - Thought Field Therapy Center"></a>
			<a class="col-lg-8 col-md-8 dates"  href="signup1.html">December 23, 28-29, 2019 &nbsp;</a>
		</div>
<!---- START NAV ------->
			<nav>
				<ul>
					<li><a href="index.html">Home</a></li>
					<li><a href="about.html">About</a></li>
					<li><a href="workshops.html">Workshops</a></li>
				</ul>
			</nav>
<!------- END NAV ------->
	</div>
</header>
<!---------- END ROW ---------->


<!-- START CONTAINER-FLUID --->	
<div class="container-fluid"> 
<!---- START HEADER ------->	
  <div class="row">
	      <header>
	        <h1> Contact us</h1>
<!--  <img src="images/icons8-christmas-star-48.png" alt="Christmas Star icon by Icons8"> -->
	        <h4> Do you have any questions? Please do not hesitate to contact us directly.</h4>  
	      </header>
    </div>  
<!---------- START MAIN CONTENT ---------->	
	<main id="main">
<!--START Contact-->
    <?php
// 	  $name_error= $surname_error= $email_error= $message_error = "";
	  
      if(isset($_POST['submit'])){
        $name = htmlspecialchars(stripslashes(trim($_POST['name'])));
        $surname = htmlspecialchars(stripslashes(trim($_POST['surname'])));
        $email = htmlspecialchars(stripslashes(trim($_POST['email'])));
        $message = htmlspecialchars(stripslashes(trim($_POST['message'])));
        if(!preg_match("/^[A-Za-z .'-]+$/", $name)){
          $name_error = 'Please enter only letters and spaces';
        }
        if(!preg_match("/^[A-Za-z .'-]+$/", $surname)){
          $surname_error = 'Please enter only letters and spaces';
        }
        if(!preg_match("/^[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/", $email)){
          $email_error = 'Invalid email';
        }
        if(strlen($message) === 0){
          $message_error = 'Please enter your message';
        }
      }
    ?>
    <form  id="contact-form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"method="POST" role="form">
        <div class="messages"></div>
<!--- FIRST NAME --->
        <div class="messages"></div>
            <fieldset class="form-group">
                <label for="form_name"></label>
                <input id="form_name" type="text" name="name" placeholder="Your first name" class="form-control" aria-required="true" required tabindex="1" data-error="Firstname is required.">
                <div class="err"><?php if(isset($name_error)) echo $name_error; ?>
            </fieldset>
<!--- LAST NAME --->
            <fieldset class="form-group">
                <label for="form_lastname"></label>
                <input id="form_lastname" type="text" name="surname" placeholder="Your last name" class="form-control" aria-required="true" required tabindex="2" data-error="Lastname is required.">
                 <div class="err"><?php if(isset($surname_error)) echo $surname_error; ?></div>
            </fieldset>
<!--- EMAIL --->
            <fieldset class="form-group">
                <label for="form_email"></label>
                <input id="form_email" type="email" name="email" placeholder="Your email address" class="form-control" aria-required="true" required tabindex="3" data-error="Valid email is required.">
                <div class="err"><?php if(isset($email_error)) echo $email_error; ?></div>
            </fieldset>
<!--- MESSAGE --->
            <fieldset class="form-group">
                <label for="form_message"></label>
                <textarea id="form_message" name="message" placeholder="Your message... " class="form-control" placeholder="" rows="4" aria-required="true"  required tabindex="5" data-error="Please leave us a message."></textarea>
                <div class="err"><?php if(isset($message_error)) echo $message_error; ?></div>
            </fieldset>
<!--- SUBMIT --->
	<button name="submit" type="submit" id="contact-form-submit">Send</button>
</div>   
         <?php 
	     $subject = "New message";
        if(isset($_POST['submit']) && !isset($name_error) && !isset($surname_error) && !isset($email_error) && !isset($message_error)){
          $to = 'support@inkondo.com'; //
          $body = " Name: $name\n E-mail: $email\n Message:\n $message";
          if(mail($to, $subject, $body)){
            echo '<p class="valid">Thank you. Message sent.</p>';
          }else{
            echo '<p class="err">Sorry an error occurred. Please try again.</p>';
          }
        }
      ?>
</form>		
<!------------END CONTACT FORM----------->

</main>
<!---------- END MAIN CONTENT ---------->	

</div>
<!-- END CONTAINER-FLUID --->

<!-- START FOOTER --->
<footer>
  <div id="footer" class="col-md-12 footer3 fixed-bottom" data-parallax="scroll" data-image-src="images/people-at-a-party-3249760.jpg"></div>
  <div class="col-md-12 footer3 wow bounceInRight"></div>
</footer>
<!-- END FOOTER --->

</body>

</html>
