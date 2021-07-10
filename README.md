# DGTestPHPForm

Test form in PHP for Digital Grads recruitment

This form was created using VS Code and 'vanilla' PHP, HTML5, CSS3 & JS (without libraries).

To run this app, clone this repository, cd into the correct directory and start server from the terminal with: 
### php -S localhost:8000/home_page.php

Basic validation limited to email, using PHP. 

HTML validates inputs automatically unless 'switched off'. In which case, PHP email validation takes over as per the code.

Select a file to upload from device/computer. This sent with the email when form is submitted but will be sent (in this instance) 
to the 'assets/images/' folder of the cloned project, in the text editor, not the email recipient. On screen display showing the 
details of the upload and sent file in the form of an array in plain text using a simple function and 'print_r' between 'pre' tags, 
test_form.php lines 70-74 for user acknowledgment.

The information from the input fields on the form will be sent to an email address (in this instance: email@yeomeo.dev)
To change the recipient email address, amend: test_form.php line 37.

The layout is responsive, in that when on a mobile device, it narrows to a single column.

Styling is basic but with slightly more character than the test sample.

## Project is also live and served on my portfolio website at https://yeomeo.dev/home_page.php 




### https://yeomeo.dev 



