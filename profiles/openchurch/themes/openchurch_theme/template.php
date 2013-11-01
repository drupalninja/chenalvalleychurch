<?php

/**
 * Page preprocessing
 */
function openchurch_theme_preprocess_page(&$vars) {

  /**
   * Embed superfish menu
   */
  $block = block_load('superfish',1);
  $block->title = '<none>';
  
  $renderable_block = _block_get_renderable_array(_block_render_blocks(array($block)));
  
  $vars['page']['main_menu'][] = $renderable_block;
  
  /**
   * Get menu block delta (usually 1 for new installs) 
   */
  $block = block_load('menu_block', variable_get('openchurch_menu_block_delta', 1));
  $block->title = '<none>';
  
  $renderable_block = _block_get_renderable_array(_block_render_blocks(array($block)));
  
  $vars['page']['main_menu'][] = $renderable_block;
}

/**
 * HTML preprocessing
 */
function openchurch_theme_preprocess_html(&$vars) {
  
  global $theme_key;
  
  // Add body classes for custom design options
  $vars['classes_array'][] = theme_get_setting('openchurch_theme_header_style');

  /**
   *  The following is an IE work-around for mobile responsive stylesheets. IE breaks when responsive is enabled
   *  so this forces IE to use the non responsive stylesheets.
   */
  
  $themes = fusion_core_theme_paths($theme_key);
  
  //Grid file
  $file = theme_get_setting('theme_grid') . '.css';
  
  //Grid path
  $path = $themes['fusion_core'];
  
  /**
   * We are forcing the normal grid CSS to load via an IE conditional, even if repsonsive is enabled, this fixes an IE problem
   */
  drupal_add_css($path . '/css/' . $file, array('basename' => 'fusion_core' . '-' . $file, 'group' => CSS_THEME, 'preprocess' => TRUE, 'browsers' => array('IE' => TRUE, '!IE' => FALSE)));
  
  /**
   * Add ie7 stylesheet 
   */
  drupal_add_css(path_to_theme().'/css/openchurch-ie7.css', array('browsers' => array('IE' => 'IE 7', '!IE' => FALSE)));
  
  /**
   * Add gt-ie7 stylesheet
   */
  drupal_add_css(path_to_theme().'/css/openchurch-gt-ie7.css', array('browsers' => array('IE' => 'gt IE 7', '!IE' => FALSE)));
}