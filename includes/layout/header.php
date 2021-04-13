<?php 
//csp (content security policy):
//self: appliocation origion
//header("Content-Security-Policy-Report-Only: default-src 'self';");//allow reports
header("Content-Security-Policy: report-uri http://localhost/master/php;");//send report to here 
header("Content-Security-Policy: script-src 'self' ;");// Allows script or style tag to execute in this origin
header("Content-Security-Policy: font-src 'self' ;");
header("Content-Security-Policy: img-src 'self' ;");//define the origins from which images can be loaded.
//frame-src : Restricts what domains a page can load in an iframe.
//frame-ancestors :  Restricts what domains a page can be loaded in from an iframe .
header("Content-Security-Policy: media-src 'self' ;");//restrict the origins allowed to deliver video and audio.
header("Content-Security-Policy: font-src 'self' ;");
header("Content-Security-Policy: form-action 'self' ;");//restricts the URLs which can be used as the target of a form submissions from a given context.
header("Content-Security-Policy: frame-ancestors 'self' ;");//specifies valid parents that may embed a page using <frame>, <iframe>, <object>, <embed>, or <applet>.
header("Content-Security-Policy: style-src 'self' ;");//stylesheet.
header("Set-Cookie: key=value; path=/; domain=example.org; HttpOnly; SameSite=Lax");
?>


<?php if(!isset($layout_context))
	$layout_context="public";?>
<!doctype html>
<html>
<head>
<title>
Widget Corp<?php if($layout_context=="admin")  echo " Admin";?>
</title>

<link rel="stylesheet" href="stylesheets/public.css">
</head>
<body>
<div id="header">
<h1>Widget Corp<?php if($layout_context=="admin")  {echo " Admin"; }?></h1>
</div>