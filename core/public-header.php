<?php 
require_once 'core/about.php';
use core\about;
?>

<!DOCTYPE html>
<html>
<head>
<title><?php echo about::TITLE ?></title>
<meta charset="UTF-8">
<meta name="keywords"
	content="ChaNil Charity, chanil, چنیل, خیریه چنیل, چرخ نیلوفری" />
<meta name="description" content="Official ChaNil Charity Website" />
<!-- needs attention -->
<meta name="revised" content="Tutorialspoint, 3/7/2014" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="styles/bootstrap.css">
<link rel="stylesheet" href="styles/master.css">
<link rel="stylesheet" href="styles/fonts.css">
<link rel="stylesheet" href="styles/aos.css">
<link rel="stylesheet" href="styles/qtip.css">
<link rel="stylesheet" href="styles/ezdz.css">
</head>
<body>

	<!-- Sidebar (hidden by default) -->
	<nav
		class="w3-sidebar w3-bar-block w3-card w3-top w3-xlarge w3-animate-right"
		style="display: none; z-index: 2; width: 40%; min-width: 300px"
		id="mySidebar">
		<a href="javascript:void(0)" onclick="w3_close()"
			class="w3-bar-item w3-button">☰</a> <a href="./"
			onclick="w3_close()" class="w3-bar-item w3-button">خانه</a> <a
			href="admin.php" onclick="w3_close()" class="w3-bar-item w3-button">ادمین</a>
	</nav>

	<!-- Top menu -->
	<div class="w3-top">
		<div class="w3-white w3-xlarge"
			style="max-width: 1200px; margin: auto">
			<div class="w3-button w3-padding-16 w3-right" onclick="w3_open()">☰</div>
			<!-- <div class="w3-right w3-padding-16" title="test">Mail</div> -->
			<div class="w3-center w3-padding-16"><?php echo about::NAME ?></div>
		</div>
	</div>

	<div data-aos="rexa-blur" class="w3-main w3-content w3-padding"
		style="max-width: 1200px; margin-top: 100px">
		<!-- Social Networks -->
		<div class="w3-container w3-padding-32 w3-center">
			<img class="w3-left w3-padding-small rexa-social"
				title="به صفحه ی ما در فیسبوک بپیوندید" alt="facebook"
				src="icons/facebook.svg" /> <img
				class="w3-left w3-padding-small rexa-social"
				title="ما را به حلقه های خود در گوگل پلاس اضافه کنید"
				alt="google plus" src="icons/google.svg" /> <img
				class="w3-left w3-padding-small rexa-social"
				title="تماشاچی کانال ما در یوتوب باشید" alt="youtube"
				src="icons/youtube.svg" /> <img
				class="w3-left w3-padding-small rexa-social"
				title="اینستاگرام ما را دنبال کنید" alt="instagram"
				src="icons/instagram.svg" />
		</div>

		<!-- Start page content -->