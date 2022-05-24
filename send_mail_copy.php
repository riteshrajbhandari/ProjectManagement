<?php
$to = 'kanmol21@tbc.edu.np'; 
$from = 'rritesh21@tbc.edu.np'; 
$fromName = 'Ritesh'; 
 
$subject = "Send HTML Email in PHP by CodexWorld"; 
 
$htmlContent = ' 
<html> 
<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
    <body> 
        <h1></h1> 
        <table cellspacing="0" style="border: 2px dashed #FB4314; width: 100%;"> 
            <tr> 
                <th>Name:</th><td>CodexWorld</td> 
            </tr> 
            <tr style="background-color: #e0e0e0;"> 
                <th>Email:</th><td>contact@codexworld.com</td> 
            </tr> 
            <tr> 
                <th>Website:</th><td> <a href="http://localhost:80/project_management/backend/wishListAdd.php?aboutProductId">Add to Wishlist</a></td> 
            </tr> 
        </table> 
    </body> 
    </html>';
    
// Set content-type header for sending HTML email 
$headers = "MIME-Version: 1.0" . "\r\n"; 
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n"; 
 
// Additional headers 
$headers .= 'From: '.$fromName.'<'.$from.'>' . "\r\n"; 
// $headers .= 'Cc: welcome@example.com' . "\r\n"; 
// $headers .= 'Bcc: welcome2@example.com' . "\r\n"; 
 
// Send email 
if(mail($to, $subject, $htmlContent, $headers)){ 
    echo 'Email has sent successfully.'; 
}else{ 
   echo 'Email sending failed.'; 
}
