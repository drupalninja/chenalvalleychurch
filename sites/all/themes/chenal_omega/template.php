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

  if ($element['#theme'] == 'menu_link__menu_social_links') {

    if ($element['#title'] == 'Google +') {
      $element['#title'] .= '</span><span class="fa fa-google-plus"></span><span class="link">';
    }
    elseif ($element['#title'] == 'Facebook') {
      $element['#title'] .= '</span><span class="fa fa-facebook"></span><span class="link">';
    }
    elseif ($element['#title'] == 'Twitter') {
      $element['#title'] .= '</span><span class="fa fa-twitter"></span><span class="link">';
    }
    elseif ($element['#title'] == 'Youtube') {
      $element['#title'] .= '</span><span class="fa fa-youtube"></span><span class="link">';
    }
    elseif ($element['#title'] == 'Google Calendar') {
      $element['#title'] .= '</span><span class="fa fa-calendar"></span><span class="link">';
    }

    $element['#localized_options']['html'] = TRUE;

    $output = l('<span class="link">'.$element['#title'], $element['#href'], $element['#localized_options']);
  }
  else {
    $output = l($element['#title'], $element['#href'], $element['#localized_options']);
  }

  return '<li' . drupal_attributes($element['#attributes']) . '>' . $output . $sub_menu . "</li>\n";
}