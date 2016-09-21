<?php

/**
 * @file
 * Contains d_product_slider.page.inc.
 *
 * Page callback for Product slider entities.
 */

use Drupal\Core\Render\Element;
use Drupal\Core\Link;
use Drupal\Core\Url;

/**
 * Prepares variables for Product slider templates.
 *
 * Default template: d_product_slider.html.twig.
 *
 * @param array $variables
 *   An associative array containing:
 *   - elements: An associative array containing the user information and any
 *   - attributes: HTML attributes for the containing element.
 */
function template_preprocess_d_product_slider(array &$variables) {
  // Fetch ProductSlider Entity Object.
  $d_product_slider = $variables['elements']['#d_product_slider'];

  // Helpful $content variable for templates.
  foreach (Element::children($variables['elements']) as $key) {
    $variables['content'][$key] = $variables['elements'][$key];
  }
}

/**
* Prepares variables for a custom entity type creation list templates.
*
* Default template: d_product_slider-content-add-list.html.twig.
*
* @param array $variables
*   An associative array containing:
*   - content: An array of d_product_slider-types.
*
* @see block_content_add_page()
*/
function template_preprocess_d_product_slider_content_add_list(&$variables) {
  $variables['types'] = array();
  $query = \Drupal::request()->query->all();
  foreach ($variables['content'] as $type) {
    $variables['types'][$type->id()] = array(
      'link' => Link::fromTextAndUrl($type->label(), new Url('entity.d_product_slider.add_form', array(
        'd_product_slider_type' => $type->id()
      ), array('query' => $query))),
      'description' => array(
      '#markup' => $type->label(),
      ),
      'title' => $type->label(),
      'localized_options' => array(
      'query' => $query,
      ),
    );
  }
}
