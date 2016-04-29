<?php

namespace Drupal\m_learning\Entity;

use Drupal\Core\Config\Entity\ConfigEntityBase;
use Drupal\m_learning\WelcomeEntityInterface;

/**
 * Defines the Welcome entity entity.
 *
 * @ConfigEntityType(
 *   id = "welcome_entity",
 *   label = @Translation("Welcome entity"),
 *   handlers = {
 *     "list_builder" = "Drupal\m_learning\WelcomeEntityListBuilder",
 *     "form" = {
 *       "add" = "Drupal\m_learning\Form\WelcomeEntityForm",
 *       "edit" = "Drupal\m_learning\Form\WelcomeEntityForm",
 *       "delete" = "Drupal\m_learning\Form\WelcomeEntityDeleteForm"
 *     },
 *     "route_provider" = {
 *       "html" = "Drupal\m_learning\WelcomeEntityHtmlRouteProvider",
 *     },
 *   },
 *   config_prefix = "welcome_entity",
 *   admin_permission = "administer site configuration",
 *   entity_keys = {
 *     "id" = "id",
 *     "label" = "label",
 *     "uuid" = "uuid"
 *   },
 *   links = {
 *     "canonical" = "/admin/structure/welcome_entity/{welcome_entity}",
 *     "add-form" = "/admin/structure/welcome_entity/add",
 *     "edit-form" = "/admin/structure/welcome_entity/{welcome_entity}/edit",
 *     "delete-form" = "/admin/structure/welcome_entity/{welcome_entity}/delete",
 *     "collection" = "/admin/structure/welcome_entity"
 *   }
 * )
 */
class WelcomeEntity extends ConfigEntityBase implements WelcomeEntityInterface {

  /**
   * The Welcome entity ID.
   *
   * @var string
   */
  protected $id;

  /**
   * The Welcome entity label.
   *
   * @var string
   */
  protected $label;

}
