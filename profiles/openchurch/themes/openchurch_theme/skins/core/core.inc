<?php

/**
 * Implementation of hook_fusion_apply_skin_core_info
 */
function openchurch_theme_fusion_apply_skin_core_info() {
  $skins = array();
  
  $skins['oc_skins_block_title_background_styles'] = array(
    'title' => t('Block Title Background Styles'),
    'type' => 'select',
    'description' => t(''),
    'group' => 'box',
    'theme hooks' => array('block'),
    'default status' => TRUE,
    'options' => array(
      'block-title-med-green' => array(
        'title' => 'Medium green background',
        'class' => array('block-title-med-green'),
      ),
      'block-title-med-blue' => array(
        'title' => 'Medium blue background',
        'class' => array('block-title-med-blue'),
      ),
      'block-title-med-gray' => array(
        'title' => 'Medium gray background',
        'class' => array('block-title-med-gray'),
      ),
      'block-title-lt-green' => array(
        'title' => 'Light green background',
        'class' => array('block-title-lt-green'),
      ),      
    ),
  );
  
  $skins['oc_skins_block_background_styles'] = array(
    'title' => t('Block Background Styles'),
    'type' => 'select',
    'description' => t(''),
    'group' => 'box',
    'theme hooks' => array('block'),
    'default status' => TRUE,
    'options' => array(
      'block-background-lt-green' => array(
        'title' => 'Light green background',
        'class' => array('block-background-lt-green'),
      ),
      'block-background-lt-blue' => array(
        'title' => 'Light blue background',
        'class' => array('block-background-lt-blue'),
      ),
      'block-background-dark-blue' => array(
        'title' => 'Dark blue background',
        'class' => array('block-background-dark-blue'),
      ),
      'block-background-lt-gray' => array(
        'title' => 'Light gray background',
        'class' => array('block-background-lt-gray'),
      ),
    ),
  );
  
  $skins['oc_skins_block_effects'] = array(
    'title' => t('Block Effects'),
    'type' => 'checkboxes',
    'description' => t('Add effects to blocks such as rounded corners'),
    'group' => 'box',
    'theme hooks' => array('block'),
    'default status' => TRUE,
    'options' => array(
      'rounded-corners' => array(
        'title' => 'Rounded Corners',
        'class' => array('rounded-corners'),
      ),
      'margin-top-1em' => array(
        'title' => 'Margin Top 1em',
        'class' => array('margin-top-1em'),
      ),
      'margin-top-2em' => array(
        'title' => 'Margin Top 2em',
        'class' => array('margin-top-2em'),
      ),
      'margin-bottom-1em' => array(
        'title' => 'Margin Bottom 1em',
        'class' => array('margin-bottom-1em'),
      ),
      'margin-bottom-2em' => array(
        'title' => 'Margin Bottom 2em',
        'class' => array('margin-bottom-2em'),
      ),
      'padding-top-1em' => array(
        'title' => 'Padding Top 1em',
        'class' => array('padding-top-1em'),
      ),
      'padding-top-2em' => array(
        'title' => 'Padding Top 2em',
        'class' => array('padding-top-2em'),
      ),
      'padding-bottom-1em' => array(
        'title' => 'Padding Bottom 1em',
        'class' => array('padding-bottom-1em'),
      ),
      'padding-bottom-2em' => array(
        'title' => 'Padding Bottom 2em',
        'class' => array('padding-bottom-2em'),
      ),
    ),
  );

  return $skins;
}