<?php
/**
 * Template Name: Print Resume
 */
 
    //$profileid = 296;
	$profileid = $_REQUEST['resume'];
    $technologies = getRawTechnologiesTree();
	$upload_dir = wp_upload_dir();
	$upload_path = $upload_dir['baseurl'].'/thumbs/'.$profileid.'/';
	$userphoto_thumb_file = get_user_meta( $profileid, 'userphoto_thumb_file', true );
	$experience = get_user_meta( $profileid, 'experience', true ); 
	$expertise = get_user_meta( $profileid, 'expertise', true );
	$position = get_user_meta( $profileid, 'position', true );
	$domains = get_user_meta( $profileid, 'domain', true );
	$city = get_user_meta( $profileid, 'city', true );
	$state = get_user_meta( $profileid, 'state', true );
	$countryid = get_user_meta( $profileid, 'country', true );
	$country = getCountryByID($countryid);
	$user_info=get_userdata( $profileid);
	$user_email = $user_info->user_email;
	$current_user_email = $current_user->user_email;
	
	$domain_knowledge = domain_knowledge_Tree();
	$domain_li = '';
	if(is_array($domains)){
	    
		$i=1;
		foreach($domains as $domain){
		     if(count($domains) == $i){
			 $domain_li .= ''.str_replace(' - ', '', $domain).'';
			 }else{
			 $domain_li .= ''.str_replace(' - ', '', $domain).', ';
			 }
			 $i++;
		}
	}

	$skills = '';
	if(is_array($expertise)){
		foreach($expertise as $expert){
			if(!empty($technologies[$expert]))
				$skills .= '
	<li><span>'.str_replace(' - ', '', $technologies[$expert]).'</span></li>
	';
			else
				$skills .= '
	<li><span>'.str_replace(' - ', '', $expert).'</span></li>
	';
		}
	}

	$cflag = '';
	if(!empty($country)){
		$flag = strtolower($country->Iso2);
		$cflag = '<img style="width:25px;" src="'.get_stylesheet_directory_uri().'/images/flag/'.$flag.'.png" alt="" title="'.$country->name.'" />';
	}
	
	           if(!empty($userphoto_thumb_file)){            
               $profile_img ='<img src="'.$upload_path.$userphoto_thumb_file.'" alt="my profile"/>';
                }else{ 
               $profile_img ='<img src="'.get_stylesheet_directory_uri().'/images/techie.jpg"/>';
			   }
                $home_logo = get_option( 'findmetechie_home_logo' ); 
				if($home_logo)
				{
				 $logo_img ='<img src="'.$home_logo.'" alt="logo"/>';
				}else
				{
				 $logo_img ='';
				}	 





include 'tcpdf/tcpdf.php';

class MyPDF extends TCPDF {
    public function Footer() {
        $this->SetY(-15);
        $this->SetFont('helvetica', 'I', 8);
		
		$this->writeHTML('
		<div class="footer-border" style="border-top:solid 1px #c6c6c6; padding-top:15px;"></div>
		', false, false, false, false, '');
		
		/*$this->writeHTMLCell(
        $width = 0, // width of the cell, not the input
        $height = 0, // height of the cell..
        $x,
        $y,
        $html = '
		<div class="footer-border" style="border-top:solid 1px grey; padding-top:15px;">
  <div style="float:left;">Date:'.date("F j, Y").'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.$this->getAliasNumPage().' of total '.$this->getAliasNbPages().'</div>
</div>
		', // your input.
        $border = 0,
        $ln = 0,
        $fill = false,
        $reseth = true,
        $align = 'L',
        $autopadding = true 
    );*/
	
     /*   $this->Cell(0, 5,
                    'Date:'.date("F j, Y").'                                                                       Page ' . $this->getAliasNumPage() . ' of total ' .
                    $this->getAliasNbPages(), 0, false, 'L', 0, '',
                    0, false, 'T', 'M');*/
					
	  $this->Cell(0, 5,
                    'Date:'.date("F j, Y"), 0, false, 'L', 0, '',
                    0, false, 'T', 'M');				
					
	   $this->Cell(0, 5,'Page ' . $this->getAliasNumPage() . ' of total ' .$this->getAliasNbPages(), 0, false, 'R', 0, '',0, false, 'T', 'M');				
    }
    public function Header() {
        // add custom header stuff here
    }
}
// create new PDF document
$pdf = new MyPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
//$pdf->SetCreator(PDF_CREATOR);
//$pdf->SetAuthor('Nicola Asuni');
//$pdf->SetTitle('TCPDF Example 002');
//$pdf->SetSubject('TCPDF Tutorial');
//$pdf->SetKeywords('TCPDF, PDF, example, test, guide');

// remove default header/footer
$pdf->setPrintHeader(false);
$pdf->setPrintFooter(true);

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
$pdf->SetMargins(PDF_MARGIN_LEFT, 0, PDF_MARGIN_RIGHT);

$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);



// set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);


$pdf->AddPage('P', 'A4');
$html = '
<html>
<head>
<style>
h1 {
	color: navy;
	font-family: times;
	font-size: 24pt;
	text-decoration: underline;
}
h2 {
	margin:0px;
	padding:0px;
}
h3 {
	margin:0px;
	padding:0px;
}
div.test {
	margin-left:-20pt !important;
	margin-right:-20pt !important;
}
ul {
	margin:0;
	padding:0;
	list-style: none;
}
ul li {
	margin:0;
	padding:0;
	list-style-type:none !important;
}
.profilePic img {
	width:120px;
}
.techie_details p {
	margin:0px;
	padding:0px;
	line-height:8px;
}
.bold {
	font-weight:bold;
}
.devider {
	border-bottom:solid 1px #c6c6c6;
	posotion:absolute;
	bottom: -100px;
	left:0;
}
.workexpriace ul li {
	list-style: none;
	display: block;
}
aside#sidebar, header[role="banner"], footer, #comments, #respond, .fix-btn-get-quote, .query-fix-btn, .show_intest, .btn-block {
	display: none;
}
.container {
	width: 90%;
	margin: 0px;
	padding: 0px;
}
* {
	background-color: #fff;
	border-color: #fff;
	@include box-shadow(none);
	@include text-shadow(none);
}
a:after {
	content: "( "attr(href)" )";
}
.page-template #content {
	margin-top: 0px;
}
.panel-body {
	padding: 0px;
}
.techie_details {
	width: 100%;
	margin: 0;
	padding: 0;
}
.avatar-pic {
	margin: 0;
}
body {
	margin: 0;
	padding: 0;
	padding-top: 20px;
}
.avatar-pic {
	width: 150px !important;
	text-align: center;
	height: 150px;
	overflow: hidden;
	float: left!important;
}
.techie_details {
	text-align: left;
	margin: 0;
	max-width: 400px !important;
	float: left;
	width: 400px !important;
	padding-left: 20px;
}
.back-btn, .scrollup, .profile-header h2 {
	display: none !important;
}
.techie_details h2 {
	display: block!important;
	margin: 0;
	color: #105fa4 !important;
}
.workexpriace h3 {
	font-size: 20px;
	color: #105fa4 !important;
	margin-bottom: 20px;
}
.logo_print {
	display: block!important;
	margin: 0;
	text-align: center;
	width: 100%;
}
.logo_print img {
	width: 120px;
	display: inline-block;
}
.workexpriace ul li {
	font-size: 13px;
	font-family: Arial, Helvetica, sans-serif;
	line-height: 25px;
}

.workexpriace h3 {
	color: red !important;
}
.tech p {
	display: inline-flex;
	max-width: 814px;
}
.tech p li span {
	border: 1px solid #c8c8c8;
	font-size: 13px;
	margin: 4px;
	padding: 1px 9px;
	display: inline-block;
	border-radius: 14px;
}
</style>
</head>
<body>
<div class="logo_print"> <img src="https://www.findmetechie.com/wp-content/uploads/2017/03/logo.png" alt="logo"/> </div>
<table class="first" cellpadding="0" cellspacing="0">
  <tr>
    <td style="width: 150px;"><div class="avatar-pic">
        <div class="profilePic">'.$profile_img.'</div>
      </div></td>
    <td><div class="techie_details">
        <h2>FMT ID:'.$profileid.'&nbsp;'.$cflag.'</h2>
        <p><span class="bold">Role: </span>'.$position.'</p>
        <p><span class="bold">Experience: </span>'.$experience.' years</p>
        <p><span class="bold">Domain: </span>'.$domain_li.'</p>
      </div></td>
  </tr>
</table>
<div class="workexpriace tech">
  <h3>Expertise</h3>
  <p>'.$skills.'</p>
</div>
<div class="workexpriace">
  <h3>Work Experience</h3>
  <p>'.nl2br(get_the_author_meta('description', $profileid)).'</p>
</div>
<div class="workexpriace">
  <h3>Educational Details</h3>
  <p>'.nl2br(get_the_author_meta('educational', $profileid)).'</p>
</div>
</body>
</html>
';

$pdf->writeHTML($html, true, false, true, false, '');

$pdf->Output('print-resume.pdf', 'I');