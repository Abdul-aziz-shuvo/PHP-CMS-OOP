<?php



$section = $_GET['section'] ?? 'home';

if($section == 'about-us'){
    include "controller/aboutPage.php";
}else if($section == 'contact-us'){
    include "controller/contactPage.php";
}else{
    include "controller/homePage.php";
}