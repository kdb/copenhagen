<?php
/* =====================================
  Copenhagen
  template.php
* ------------------------------------- */

/* forms */

/**
 * Override from base theme to switch background image
 */
function copenhagen_user_login_block($form){
	$form['submit']['#type'] 	= "image_button" ;
	$form['submit']['#src'] 	= drupal_get_path('theme','copenhagen')."/images/accountlogin.png";
	$form['submit']['#attributes']['class'] 	= "";


	$name = drupal_render($form['name']); 
	$pass =  	drupal_render($form['pass']); 
	$submit =  	drupal_render($form['submit']); 
	$remember =	drupal_render($form['remember_me']); 
	
	return 	$name . $pass .$submit . $remember . drupal_render($form);
}

/**
 * Override from base theme to switch background image
 */
function copenhagen_ting_search_form($form){
	$form['submit']['#type'] 	= "image_button" ;
	$form['submit']['#src'] 	= drupal_get_path('theme','copenhagen')."/images/searchbutton.png";
	$form['submit']['#attributes']['class'] 	= "";

	return drupal_render($form);	
}
