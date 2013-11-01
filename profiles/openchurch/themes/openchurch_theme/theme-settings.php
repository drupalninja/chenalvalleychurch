<?php

/**
 * Allow themes to alter the theme-specific settings form.
 *
 * With this hook, themes can alter the theme-specific settings form in any way
 * allowable by Drupal's Forms API, such as adding form elements, changing
 * default values and removing form elements. See the Forms API documentation on
 * api.drupal.org for detailed information.
 *
 * Note that the base theme's form alterations will be run before any sub-theme
 * alterations.
 *
 * @param $form
 *   Nested array of form elements that comprise the form.
 * @param $form_state
 *   A keyed array containing the current state of the form.
 */
function openchurch_theme_form_system_theme_settings_alter(&$form, $form_state) {

  $form['openchurch_theme_styles'] = array(
    '#type' => 'fieldset',
    '#weight' => -11,
    '#title' => t('OpenChurch custom styles'),
    '#description' => t('Select styling options & adjustments for the OpenChurch theme.'),
    '#collapsible' => TRUE,
    '#collapsed' => FALSE,
  );
  
  $form['openchurch_theme_styles']['openchurch_theme_header_style'] = array(
    '#type'          => 'select',
    '#title'         => t('OpenChurch Header Style'),
    '#options'       => array(
      'oc-header-classic' => t('Classic Header Style'),
      'oc-header-gray-bar' => t('Streamlined Header Style with Gray Background'),
     ),
    '#default_value' => theme_get_setting('openchurch_theme_header_style'),
  );
}

