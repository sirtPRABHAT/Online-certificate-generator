<?php 
   
    include '../db.php';
    require("pdflib.php");
     
     


///////////////////////////////  Internship Certificate Template  //////////////////////////////////////


    if(isset($_POST['issue_internshipcertificate'])){

        $id = (int)$_POST['request_id'];
        $certificate_number = $_POST['certificate_number'];

        $name = $_POST['name'];
        $organization = $_POST['organization'];
        $domain = $_POST['domain'];
        $startdate = $_POST['startdate'];
        $enddate = $_POST['enddate'];

        $query = "SELECT * FROM certificate_requests WHERE request_id = $id";
        $result = mysqli_query($db, $query);
        $result = mysqli_fetch_assoc($result);

        $email = $result['email'];
        $contact = $result['contact'];
        $type = $result['type'];
        $course = $result['course'];
        $duration = $result['duration'];
        $requestdate = $result['request_date'];


        function certificate_print_text($pdf, $x, $y, $align, $font='freeserif', $style, $size = 10, $text, $width = 0) {
            $pdf->setFont($font, $style, $size);
            $pdf->SetXY($x, $y);
            $pdf->writeHTMLCell($width, 0, '', '', $text, 0, 0, 0, true, $align);
        }
        
        $pdf = new PDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
        
        $pdf->SetCreator(PDF_CREATOR);
        $pdf->SetTitle("My Awesome Certificate");
        $pdf->SetProtection(array('modify'));
        $pdf->setPrintHeader(false);
        $pdf->setPrintFooter(false);
        $pdf->SetAutoPageBreak(false, 0);
        $pdf->AddPage();
        
        
            $x = 10;
            $y = 70;
        
            $sealx = 130;
            $sealy = 200;
            $seal = realpath("images/seal0.png");
        
            $sigx = 140;
            $sigy = 198;
            $sig = realpath("images/sing.png");
        
            $custx = 30;
            $custy = 230;
        
            $wmarkx = 10;
            $wmarky = 10;
            $wmarkw = 190;
            $wmarkh = 277;
            $wmark = realpath("images/certificateIntern.png");
        
            $brdrx = 0;
            $brdry = 0;
            $brdrw = 210;
            $brdrh = 257;
            $codey = 250;
        
        
        $fontsans = 'helvetica';
        $fontserif = 'times';
        
        // border
         // $pdf->SetLineStyle(array('width' => 1.5, 'color' => array(252, 250, 249)));
         // $pdf->Rect(10, 10, 190, 277);
        // create middle line border
        //$pdf->Rect(13, 13, 184, 271);
        // create inner line border
        // $pdf->SetLineStyle(array('width' => 1.0, 'color' => array(128,128,128)));
        // $pdf->Rect(16, 16, 178, 265);
        
        
        // Set alpha to semi-transparency
        if (file_exists($wmark)) {
            $pdf->SetAlpha(1);
            $pdf->Image($wmark, $wmarkx, $wmarky, $wmarkw, $wmarkh);
        }
        
        // $pdf->SetAlpha(1);
        // if (file_exists($seal)) {
        //     $pdf->Image($seal, $sealx, $sealy, '', '');
        // }
        if (file_exists($sig)) {
            $pdf->Image($sig, $sigx, $sigy, '', '');
        }
        
        // Add text
        $pdf->SetTextColor(243, 156, 18);
        certificate_print_text($pdf, $x, $y+5, 'C', $fontserif, '', 28, $organization);
        $pdf->SetTextColor(52, 73, 94 );
        certificate_print_text($pdf, $x, $y + 65, 'C', $fontserif, '', 30, "This Certificate is Presented To");
        certificate_print_text($pdf, $x, $y + 80, 'C', $fontserif, '', 30, $name);
        certificate_print_text($pdf, $x, $y + 95, 'C', $fontserif, '', 20, "In Appreciation For Yor Successfull Work ");
        certificate_print_text($pdf, $x, $y + 105, 'C', $fontserif, '', 15, "As Intern At " .$organization);
              certificate_print_text($pdf, $x, $y + 115, 'C', $fontserif, '', 10, $startdate." To ".$enddate);
        certificate_print_text($pdf, $x+36, $y + 133, 'L', $fontsans, '', 14, $enddate);
        // certificate_print_text($pdf, $x, $y + 102, 'C', $fontserif, '', 10, "With a grade of 80%");
        // certificate_print_text($pdf, $x, $y + 112, 'C', $fontserif, '', 10, "Earning him a A+");
        // certificate_print_text($pdf, $x, $y + 122, 'C', $fontserif, '', 10, "In only 48 hours.");
         $pdf->SetTextColor(243, 156, 18);
        certificate_print_text($pdf, $x+10, $y + 140, 'C', $fontserif, '', 8, $certificate_number);
        // certificate_print_text($pdf, 60, $y + 153, 'L', $fontserif, '', 10, "CEO TechHunt");


//=================================Generating bar Code===============================================================
// define barcode style
$style = array(
    'position' => '',
    'align' => 'L',
    'stretch' => false,
    'fitwidth' => true,
    'cellfitalign' => '',
    'border' => true,
    'hpadding' => 'auto',
    'vpadding' => 'auto',
    'fgcolor' => array(0,0,0),
    'bgcolor' => false, //array(255,255,255),
    'text' => true,
    'font' => 'helvetica',
    'fontsize' => 1,
    'stretchtext' => 4
);

// PRINT VARIOUS 1D BARCODES

// CODE 39 - ANSI MH10.8M-1983 - USD-3 - 3 of 9.
//$pdf->Cell(0, 0, 'CODE 39 - ANSI MH10.8M-1983 - USD-3 - 3 of 9', 0, 1);
$pdf->write1DBarcode($certificate_number, 'C39', '30', '288', '50', 8, 0.4, $style, 'N');

$pdf->Ln();


//===============================================================================================================

        
        //header ("Content-Type: application/pdf");

        $pdf->Output('Issued certificates/'.$name.'-'.$certificate_number.'.pdf', 'FI');

        //echo $stringPDF;

        $location='Issued certificates/'.$name.'-'.$certificate_number.'.pdf';
        $current_date =(string)date("jS \ F Y");

        $query = "INSERT INTO certificate_issued (request_id, certificate_number, name, email, contact, type, organization,
        domain, course, start_date, end_date, duration, request_date, issued_date, location) 
        VALUES('$id', '$certificate_number', '$name', '$email', '$contact', '$type', '$organization',
        '$domain', '$course', '$startdate', '$enddate', '$duration', '$requestdate', '$current_date', '$location')";

        $result = mysqli_query($db, $query);

        if($result){

            $delete="DELETE FROM certificate_requests WHERE  request_id = $id";
            $deleted= mysqli_query($db ,$delete);

            // if($result){
            //     $message = "Internship Certificate Issued Successfully with certificate number : $certificate_number";
            //     echo "<script type='text/javascript'>alert('$message');</script>";
    
            //     echo "<script>location.href='./issuenew.php'</script>";

            // }
            // else{
            //     echo 'error';
            // }


        }
        
        else{
            $message = "Certificate not Issued. Please Try Again! Later..";
            echo "<script type='text/javascript'>alert('$message');</script>";
        }
 
    }

///////////////////////////////////// Internship Certificate Ends //////////////////////////////////////




///////////////////////////////  Online Course Certificate Template Starts  //////////////////////////////////////

    
    if(isset($_POST['issue_onlinecoursecertificate'])){
    
        $id = (int)$_POST['request_id'];
        $certificate_number = $_POST['certificate_number'];

        $name = $_POST['name'];
        $organization = $_POST['organization'];
        $course = $_POST['course'];
        $enddate = $_POST['enddate'];
        $duration = $_POST['duration'];

        $query = "SELECT * FROM certificate_requests WHERE request_id = $id";
        $result = mysqli_query($db, $query);
        $result = mysqli_fetch_assoc($result);

        $email = $result['email'];
        $contact = $result['contact'];
        $type = $result['type'];
        $domain = $result['domain'];
        $startdate = $result['start_date'];
        $requestdate = $result['request_date'];


        
        
        function certificate_print_text($pdf, $x, $y, $align, $font='freeserif', $style, $size = 10, $text, $width = 0) {
            $pdf->setFont($font, $style, $size);
            $pdf->SetXY($x, $y);
            $pdf->writeHTMLCell($width, 0, '', '', $text, 0, 0, 0, true, $align);
        }
        
        $pdf = new PDF('L', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
        
        $pdf->SetCreator(PDF_CREATOR);
        $pdf->SetTitle("My Awesome Certificate");
        $pdf->SetProtection(array('modify'));
        $pdf->setPrintHeader(false);
        $pdf->setPrintFooter(false);
        $pdf->SetAutoPageBreak(false, 0);
        $pdf->AddPage();
        
        
            $x = 10;
            $y = 70;
        
            $sealx = 150;
            $sealy =150;
            $seal = realpath("images/seal.png");
        
            $sigx = 50;
            $sigy = 150;
            $sig = realpath("images/sing.png");
        
            $custx = 30;
            $custy = 230;
        
            $wmarkx = 10;
            $wmarky = 10;
            $wmarkw = 277;
            $wmarkh = 190;
            $wmark = realpath("images/watermarkCourse.png");
        
            $brdrx = 0;
            $brdry = 0;
            $brdrw = 210;
            $brdrh = 257;
            $codey = 250;
        
        
        $fontsans = 'helvetica';
        $fontserif = 'times';
        
        // border
         // $pdf->SetLineStyle(array('width' => 1.5, 'color' => array(252, 250, 249)));
         // $pdf->Rect(10, 10, 190, 277);
        // create middle line border
        //$pdf->Rect(13, 13, 184, 271);
        // create inner line border
        // $pdf->SetLineStyle(array('width' => 1.0, 'color' => array(128,128,128)));
        // $pdf->Rect(16, 16, 178, 265);
        
        
        // Set alpha to semi-transparency
        if (file_exists($wmark)) {
            $pdf->SetAlpha(1);
            $pdf->Image($wmark, $wmarkx, $wmarky, $wmarkw, $wmarkh);
        }
        

        // $pdf->SetAlpha(1);
        // if (file_exists($seal)) {
        //     $pdf->Image($seal, $sealx, $sealy, '', '');
        // }
       
        if (file_exists($sig)) {
            $pdf->Image($sig, $sigx, $sigy, '', '');
        }
        
        // Add text
        $pdf->SetTextColor(175, 96, 26);
        certificate_print_text($pdf, $x, $y+10, 'C', $fontsans, '', 30, "This is to certify that ".$name);
        // $pdf->SetTextColor(0, 0, 120);
        // certificate_print_text($pdf, $x, $y + 17, 'C', $fontserif, '', 28, $name.);
        $pdf->SetTextColor(175, 96, 26);

        certificate_print_text($pdf, $x, $y + 25, 'C', $fontsans, '', 25, " has successfully completed");
        certificate_print_text($pdf, $x, $y + 38, 'C', $fontsans, '', 20, "the Online Course of " .$course);
        certificate_print_text($pdf, $x, $y + 50, 'C', $fontsans, '', 15, " in ".$duration." on ");
        //certificate_print_text($pdf, $x, $y + 60, 'C', $fontsans, '', 19,  $duration);
       certificate_print_text($pdf, $x, $y + 60, 'C', $fontserif, '', 13, $enddate);
       // certificate_print_text($pdf, $x, $y + 112, 'C', $fontserif, '', 10, "Earning him a A+");
       // certificate_print_text($pdf, $x, $y + 122, 'C', $fontserif, '', 10, "In only 48 hours.");
       $pdf->SetTextColor(0, 0, 0);
        certificate_print_text($pdf, $x+1, $y + 87, 'C', $fontserif, '', 8, $organization);
        certificate_print_text($pdf, $x+1, $y + 90, 'C', $fontserif, '', 8, $certificate_number);

       // certificate_print_text($pdf, 60, $y + 153, 'L', $fontserif, '', 10, "CEO TechHunt");
     

//=================================Generating bar Code===============================================================
// define barcode style
$style = array(
    'position' => '',
    'align' => 'L',
    'stretch' => false,
    'fitwidth' => true,
    'cellfitalign' => '',
    'border' => true,
    'hpadding' => 'auto',
    'vpadding' => 'auto',
    'fgcolor' => array(0,0,0),
    'bgcolor' => false, //array(255,255,255),
    'text' => true,
    'font' => 'helvetica',
    'fontsize' => 1,
    'stretchtext' => 4
);

// PRINT VARIOUS 1D BARCODES

// CODE 39 - ANSI MH10.8M-1983 - USD-3 - 3 of 9.
//$pdf->Cell(0, 0, 'CODE 39 - ANSI MH10.8M-1983 - USD-3 - 3 of 9', 0, 1);
$pdf->write1DBarcode($certificate_number, 'C39', '190', '153', '50', 10, 0.4, $style, 'N');

$pdf->Ln();


//===============================================================================================================
        



        //header ("Content-Type: application/pdf");
        $pdf->Output('Issued certificates/'.$name.'-'.$certificate_number.'.pdf', 'FI');
        //echo $stringPDF;
            
        $location='Issued certificates/'.$name.'-'.$certificate_number.'.pdf';
        $current_date =(string)date("jS \ F Y");
    
    
        $query = "INSERT INTO certificate_issued (request_id, certificate_number, name, email, contact, type, organization,
        domain, course, start_date, end_date, duration, request_date, issued_date, location) 
        VALUES('$id', '$certificate_number', '$name', '$email', '$contact', '$type', '$organization',
        '$domain', '$course', '$startdate', '$enddate', '$duration', '$requestdate', '$current_date', '$location')";

        $result = mysqli_query($db, $query);

        if($result==true){

            $delete="DELETE FROM certificate_requests WHERE  request_id = $id";
            $deleted= mysqli_query($db ,$delete);

     

//sending confirmation mail
       
require '../PHPMailerAutoload.php';
$mail = new PHPMailer;

         // $mail->SMTPDebug = 4;                                           // Enable verbose debug output

        $mail->isSMTP();                                                // Set mailer to use SMTP
        $mail->Host = 'smtp.gmail.com';                                 // Specify main and backup SMTP servers
        $mail->SMTPAuth = true;                                         // Enable SMTP authentication
        $mail->Username = 'pkbank2020@gmail.com';        // SMTP username
        $mail->Password = 'Safi@2020';                                 // SMTP password
        $mail->SMTPSecure = 'tls';                                      // Enable TLS encryption, `ssl` also accepted
        $mail->Port = 587;                                              // TCP port to connect to

        $mail->setFrom('pkbank2020@gmail.com');
        $mail->addAddress('prabhat2000safi@gmail.com');                               // Add a recipient               
        $mail->addReplyTo('pkbank2020@gmail.com');


        //$mail->addAttachment('/var/tmp/file.tar.gz');                 // Add attachments
        //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');            // Optional name
        
        $mail->isHTML(true);                                            // Set email format to HTML

        $mail->Subject = 'Password Recovery';
        $mail->Body    = "<body>Your certificate has been issued!!!!</body>";
         $mail->send();



        $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';


        









            // if($result){
            //     $message = "Online Course Certificate Issued Successfully with certificate number : $certificate_number";
            //     echo "<script type='text/javascript'>alert('$message');</script>";
            //     echo "<script>location.href='./issuenew.php'</script>";
            // }

            // else{
            //     echo 'error';
            // }
        


        }else{
            $message = "Certificate Not Issued. Please Try Again! Later..";
            echo "<script type='text/javascript'>alert('$message');</script>";
        }   
    }

    
///////////////////////////////  Online Course Certificate Template Ends  //////////////////////////////////////
    

?>