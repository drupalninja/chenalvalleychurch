<?php
/**
 * @file
 * Provide AWSSDK config file that allows for Drupal variable overrides.
 *
 * @author Jimmy Berry ("boombatower", http://drupal.org/user/214218)
 */

// Load the configuration and define all configuration constants.
foreach (awssdk_config_load() as $key => $value) {
  define(strtoupper($key), $value);
}
