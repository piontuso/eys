<?php

namespace Drupal\m_learning;

use Drupal\Core\Entity\ContentEntityInterface;
use Drupal\Core\Entity\EntityChangedInterface;
use Drupal\user\EntityOwnerInterface;

/**
 * Provides an interface for defining Product slider entities.
 *
 * @ingroup m_learning
 */
interface ProductSliderInterface extends ContentEntityInterface, EntityChangedInterface, EntityOwnerInterface {

  // Add get/set methods for your configuration properties here.

  /**
   * Gets the Product slider type.
   *
   * @return string
   *   The Product slider type.
   */
  public function getType();

  /**
   * Gets the Product slider name.
   *
   * @return string
   *   Name of the Product slider.
   */
  public function getName();

  /**
   * Sets the Product slider name.
   *
   * @param string $name
   *   The Product slider name.
   *
   * @return \Drupal\m_learning\ProductSliderInterface
   *   The called Product slider entity.
   */
  public function setName($name);

  /**
   * Gets the Product slider creation timestamp.
   *
   * @return int
   *   Creation timestamp of the Product slider.
   */
  public function getCreatedTime();

  /**
   * Sets the Product slider creation timestamp.
   *
   * @param int $timestamp
   *   The Product slider creation timestamp.
   *
   * @return \Drupal\m_learning\ProductSliderInterface
   *   The called Product slider entity.
   */
  public function setCreatedTime($timestamp);

  /**
   * Returns the Product slider published status indicator.
   *
   * Unpublished Product slider are only visible to restricted users.
   *
   * @return bool
   *   TRUE if the Product slider is published.
   */
  public function isPublished();

  /**
   * Sets the published status of a Product slider.
   *
   * @param bool $published
   *   TRUE to set this Product slider to published, FALSE to set it to unpublished.
   *
   * @return \Drupal\m_learning\ProductSliderInterface
   *   The called Product slider entity.
   */
  public function setPublished($published);

}
