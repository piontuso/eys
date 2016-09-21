<?php

/**
 * @file
 * Contains dealers_entity.page.inc.
 *
 * Page callback for Dealers entity entities.
 */

use Drupal\Core\Render\Element;
use Drupal\Core\Link;
use Drupal\Core\Url;

/**
 * Prepares variables for Dealers entity templates.
 *
 * Default template: dealers_entity.html.twig.
 *
 * @param array $variables
 *   An associative array containing:
 *   - elements: An associative array containing the user information and any
 *   - attributes: HTML attributes for the containing element.
 */
function template_preprocess_dealers_entity(array &$variables) {
  // Fetch DealersEntity Entity Object.
  $dealers_entity = $variables['elements']['#dealers_entity'];

  // Helpful $content variable for templates.
  foreach (Element::children($variables['elements']) as $key) {
    $variables['content'][$key] = $variables['elements'][$key];
  }
}
