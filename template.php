<?php
/**
 * @file
 * Template code for the Copenhagen theme.
 */

/* forms */

/**
 * Override from base theme to switch background image
 */
function copenhagen_user_login_block($form) {
  $form['submit']['#type'] = "image_button" ;
  $form['submit']['#src'] = drupal_get_path('theme', 'copenhagen') . "/images/accountlogin.png";
  $form['submit']['#attributes']['class'] = "";


  $name = drupal_render($form['name']);
  $pass = drupal_render($form['pass']);
  $submit = drupal_render($form['submit']);
  $remember = drupal_render($form['remember_me']);

  return $name . $pass . $submit . $remember . drupal_render($form);
}

/**
 * Override from base theme to switch background image and set example text
 */
function copenhagen_ting_search_form($form) {
  $form['submit']['#type'] = "image_button" ;
  $form['submit']['#src'] = drupal_get_path('theme', 'copenhagen') . "/images/searchbutton.png";
  $form['submit']['#attributes']['class'] = "";


  $form['example_text']['#value'] = '<div class="example">' . theme('item_list', array(
      l(t('Feltsøgning'), 'https://biblioteksbase.kk.dk/sites/XWW/pub/search.html?doaction=&data=advanced=true', array('absolute' => TRUE)),
    )) . '</div>';

  return drupal_render($form);
}

/**
 * Collapse groups of loans which are not overdue into one.
 *
 * Overrides the module behavior.
 */
function copenhagen_ding_library_user_loan_list_form($form) {
  // Make sure we have somewhere to place our loans.
  if (!isset($form['loan_data']['#grouped']['due'])) {
    $form['loan_data']['#grouped']['due'] = array();
  }
  foreach ($form['loan_data']['#grouped'] as $date => $group) {
    if (!in_array($date, array('overdue', 'due'))) {
      // Merge date group contents into due group.
      $form['loan_data']['#grouped']['due'] += $group;

      // Remove date group.
      unset($form['loan_data']['#grouped'][$date]);
    }
  }
  return theme_ding_library_user_loan_list_form($form);
}

/**
 * Preprocess variables for the block templates.
 */
function copenhagen_preprocess_block(&$variables) {
  if ($variables['id_block'] == 'block-ding-library-user-account') {
    $variables['classes'] .= ' clear-block';
  }
}

/**
 * Preprocess variables for the node templates.
 */
function copenhagen_preprocess_node(&$variables) {
  if ($variables['type'] == 'profile') {
    $variables['author'] = user_load($variables['uid']);
  }
}
