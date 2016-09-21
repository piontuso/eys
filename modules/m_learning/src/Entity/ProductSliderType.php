<?php

namespace Drupal\m_learning\Entity;

use Drupal\Core\Config\Entity\ConfigEntityBundleBase;
use Drupal\m_learning\ProductSliderTypeInterface;

/**
 * Defines the Product slider type entity.
 *
 * @ConfigEntityType(
 *   id = "d_product_slider_type",
 *   label = @Translation("Product slider type"),
 *   handlers = {
 *     "list_builder" = "Drupal\m_learning\ProductSliderTypeListBuilder",
 *     "form" = {
 *       "add" = "Drupal\m_learning\Form\ProductSliderTypeForm",
 *       "edit" = "Drupal\m_learning\Form\ProductSliderTypeForm",
 *       "delete" = "Drupal\m_learning\Form\ProductSliderTypeDeleteForm"
 *     },
 *     "route_provider" = {
 *       "html" = "Drupal\m_learning\ProductSliderTypeHtmlRouteProvider",
 *     },
 *   },
 *   config_prefix = "d_product_slider_type",
 *   admin_permission = "administer site configuration",
 *   bundle_of = "d_product_slider",
 *   entity_keys = {
 *     "id" = "id",
 *     "label" = "label",
 *     "uuid" = "uuid"
 *   },
 *   links = {
 *     "canonical" = "/admin/structure/d_product_slider_type/{d_product_slider_type}",
 *     "add-form" = "/admin/structure/d_product_slider_type/add",
 *     "edit-form" = "/admin/structure/d_product_slider_type/{d_product_slider_type}/edit",
 *     "delete-form" = "/admin/structure/d_product_slider_type/{d_product_slider_type}/delete",
 *     "collection" = "/admin/structure/d_product_slider_type"
 *   }
 * )
 */
class ProductSliderType extends ConfigEntityBundleBase implements ProductSliderTypeInterface {

  /**
   * The Product slider type ID.
   *
   * @var string
   */
  protected $id;

  /**
   * The Product slider type label.
   *
   * @var string
   */
  protected $label;

}
