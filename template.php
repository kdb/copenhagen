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
 * Override from base theme to switch background image and set example text
 */
function copenhagen_ting_search_form($form){
	$form['submit']['#type'] 	= "image_button" ;
	$form['submit']['#src'] 	= drupal_get_path('theme','copenhagen')."/images/searchbutton.png";
	$form['submit']['#attributes']['class'] 	= "";
	
	
	$form['example_text']['#value'] = '<div class="example">'. theme('item_list', array(
      l(t('Feltsøgning'), 'https://biblioteksbase.kk.dk/sites/XWW/pub/search.html?doaction=&data=advanced=true', array('absolute' => true)),
      l(t('Sådan bruger du hjemmesiden'), 'vejledning'),
    )).'</div>';
 
	return drupal_render($form);	
}

/**
 * Override from module to collapse groups of loans which are not overdue into one.
 */
function copenhagen_alma_user_forms_loan_details($form) {
  //Make sure we have somewhere to place our loans
	if (!isset($form['loan_data']['#grouped']['due'])) {
    $form['loan_data']['#grouped']['due'] = array();
  }
	foreach ($form['loan_data']['#grouped'] as $date => $group) {
		if (!in_array($date, array('overdue', 'due'))) {
			//Merge date group contents into due groupe
			$form['loan_data']['#grouped']['due'] += $group;
			
			//Remove date group
			unset($form['loan_data']['#grouped'][$date]);
		}
  }
  
  return theme_alma_user_forms_loan_details($form);
}