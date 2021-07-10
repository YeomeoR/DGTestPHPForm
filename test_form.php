<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/styles/styles.css">
    <title>PHP Test Form</title>
</head>
<body>

<?php
// echo "<pre>";
// print_r($_POST);
// echo "</pre>";

$message_sent = false;

if(isset($_POST['email']) && $_POST['email'] != ''){

    // check email is valid
    if(filter_var($_POST["email"], FILTER_VALIDATE_EMAIL) ){

        // declare variables to use in the email form the form
        $first_name = $_POST["first_name"];
        $last_name = $_POST["last_name"];
        $email = $_POST["email"];
        $number = $_POST["number"];
        $address_line_1 =  $_POST["address_line_1"];
        $address_line_2 = $_POST["address_line_2"];
        $town = $_POST["town"];
        $county = $_POST["county"];
        $postcode = $_POST["postcode"];
        $message = $_POST["message"];
        
        // submit the email
        $to = "email@yeomeo.dev";
        $body = "";
        $file = "";
        
        $body .= "From: ".$first_name."\r\n";
        $body .= "Email: ".$email."\r\n";
        $body .= "Message: ".$message."\r\n";
        $body .= $first_name ." ". $last_name." "."\r\n".$address_line_1."\r\n".$town."\r\n".$number."\r\n";
        $body .= $file;
        
        mail($to, $body, $message); // add uploaded file: mail($to, $body, $message, $file);

        $message_sent = true;

    }
    else {
        $invalid_class_name = "form-invalid";
    }
    
}



?>

<!-- upload -->
<?php 

if(isset($_FILES['usercv'])){
    pre_r($_FILES);
    move_uploaded_file($_FILES['usercv']['tmp_name'], 'assets/images/'.$_FILES['usercv']['name']);
}
function pre_r($array){
    echo "<pre>";
        print_r($array);
    echo "</pre>";
}
?>

<!-- render to the screen a success message or the form if not sent -->
<?php 
if($message_sent):
    ?>
    <h3>Thanks. You sent your information to yeomeo.dev</h3>
<?php 
else:
?>
<div>
<form action="test_form.php" method="POST" enctype="multipart/form-data" class="form-style-test">

<input type="text" name="first_name" placeholder="First Name" class="field-style field-split align-left" required/>
<input type="text" name="last_name" placeholder="Last Name" class="field-style field-split align-right" required /><br>
<input type="email" name="email" placeholder="email" class="form-group  <?= $invalid_class_name ?? "" ?> " required />
<input type="number" name="number" placeholder="Phone Number" /><br>
<input type="text" name="address_line_1" class="field-style field-split align-left" placeholder="Address line 1" required />
<input type="text" name="address_line_2" class="field-style field-split align-right" placeholder="Address line 2" /><br>
<input type="text" name="town" placeholder="Town" class="field-style field-split align-right" required />
<input type="text" name="county" class="field-style field-split align-right" placeholder="County" required /><br>
<input  type="postcode" name="postcode" placeholder="Postcode" class="field-style field-split align-right" required />
<select name="country" class="field-style field-split align-right">
    <span>Country</span><br>
<option value="United Kingdom">UK</option></select><br>
<textarea name="message" placeholder="Message" rows="8" cols="30" class="field-style" ></textarea>
<!-- file upload -->
<input type="file" name="usercv" />
<!-- <button type="submit" name="upload" value="Submit" >Upload</button> -->



<!-- send -->
<button type="submit" name="Submit" value="Submit" >Send Info</button>
</form>
</div>
<?php endif;
?>
 
    <script type="text/javascript">
//auto expand textarea
function adjust_textarea(h) {
    h.style.height = "20px";
    h.style.height = (h.scrollHeight)+"px";
}
</script>
</body>
</html>