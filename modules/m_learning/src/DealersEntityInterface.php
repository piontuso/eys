<?php

namespace Drupal\m_learning;

use Drupal\Core\Entity\ContentEntityInterface;
use Drupal\Core\Entity\EntityChangedInterface;
use Drupal\user\EntityOwnerInterface;

/**
 * Provides an interface for defining Dealers entity entities.
 *
 * @ingroup m_learning
 */
interface DealersEntityInterface extends ContentEntityInterface, EntityChangedInterface, EntityOwnerInterface {

  // Add get/set methods for your configuration properties here.

  /**
   * Gets the Dealers entity name.
   *
   * @return string
   *   Name of the Dealers entity.
   */
  public function getName();

  /**
   * Sets the Dealers entity name.
   *
   * @param string $name
   *   The Dealers entity name.
   *
   * @return \Drupal\m_learning\DealersEntityInterface
   *   The called Dealers entity entity.
   */
  public function setName($name);

  /**
   * Gets the Dealers entity creation timestamp.
   *
   * @return int
   *   Creation timestamp of the Dealers entity.
   */
  public function getCreatedTime();

  /**
   * Sets the Dealers entity creation timestamp.
   *
   * @param int $timestamp
   *   The Dealers entity creation timestamp.
   *
   * @return \Drupal\m_learning\DealersEntityInterface
   *   The called Dealers entity entity.
   */
  public function setCreatedTime($timestamp);

  /**
   * Returns the Dealers entity published status indicator.
   *
   * Unpublished Dealers entity are only visible to restricted users.
   *
   * @return bool
   *   TRUE if the Dealers entity is published.
   */
  public function isPublished();

  /**
   * Sets the published status of a Dealers entity.
   *
   * @param bool $published
   *   TRUE to set this Dealers entity to published, FALSE to set it to unpublished.
   *
   * @return \Drupal\m_learning\DealersEntityInterface
   *   The called Dealers entity entity.
   */
  public function setPublished($published);

}
