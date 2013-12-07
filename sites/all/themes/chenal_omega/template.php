<?php

/**
 * @file
 * Template overrides as well as (pre-)process and alter hooks for the
 * chenal_omega theme.
 */

/**
 * Override theme_breadcrumb().
 */
function chenal_omega_breadcrumb($variables) {
  $breadcrumb = $variables['breadcrumb'];

  if (!empty($breadcrumb)) {
    // Provide a navigational heading to give context for breadcrumb links to
    // screen-reader users. Make the heading invisible with .element-invisible.
    $output = '<h2 class="element-invisible">' . t('You are here') . '</h2>';

    $output .= '<div class="breadcrumb">' . implode(' » ', $breadcrumb) . '</div>';
    return $output;
  }
}

/**
 * Override theme_menu_link().
 */
function chenal_omega_menu_link(array $variables) {
  $element = $variables['element'];
  $sub_menu = '';

  if ($element['#below']) {
    $sub_menu = drupal_render($element['#below']);
  }
  $output = l($element['#title'], $element['#href'], $element['#localized_options']);

  if ($element['#title'] == 'Google +') {
    $output .= '<span class="fa fa-google-plus"></span>';
  }
  elseif ($element['#title'] == 'Facebook') {
    $output .= '<span class="fa fa-facebook"></span>';
  }
  elseif ($element['#title'] == 'Twitter') {
    $output .= '<span class="fa fa-twitter"></span>';
  }
  elseif ($element['#title'] == 'Youtube') {
    $output .= '<span class="fa fa-youtube"></span>';
  }
  elseif ($element['#title'] == 'Google Calendar') {
    $output .= '<span class="fa fa-calendar"></span>';
  }

  return '<li' . drupal_attributes($element['#attributes']) . '>' . $output . $sub_menu . "</li>\n";
}