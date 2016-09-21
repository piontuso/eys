<?php

namespace Drupal\m_learning;

use Drupal\Core\Entity\EntityAccessControlHandler;
use Drupal\Core\Entity\EntityInterface;
use Drupal\Core\Session\AccountInterface;
use Drupal\Core\Access\AccessResult;

/**
 * Access controller for the Product slider entity.
 *
 * @see \Drupal\m_learning\Entity\ProductSlider.
 */
class ProductSliderAccessControlHandler extends EntityAccessControlHandler {

  /**
   * {@inheritdoc}
   */
  protected function checkAccess(EntityInterface $entity, $operation, AccountInterface $account) {
    /** @var \Drupal\m_learning\ProductSliderInterface $entity */
    switch ($operation) {
      case 'view':
        if (!$entity->isPublished()) {
          return AccessResult::allowedIfHasPermission($account, 'view unpublished product slider entities');
        }
        return AccessResult::allowedIfHasPermission($account, 'view published product slider entities');

      case 'update':
        return AccessResult::allowedIfHasPermission($account, 'edit product slider entities');

      case 'delete':
        return AccessResult::allowedIfHasPermission($account, 'delete product slider entities');
    }

    // Unknown operation, no opinion.
    return AccessResult::neutral();
  }

  /**
   * {@inheritdoc}
   */
  protected function checkCreateAccess(AccountInterface $account, array $context, $entity_bundle = NULL) {
    return AccessResult::allowedIfHasPermission($account, 'add product slider entities');
  }

}
