<?php

namespace Drupal\m_learning;

use Drupal\Core\Entity\EntityAccessControlHandler;
use Drupal\Core\Entity\EntityInterface;
use Drupal\Core\Session\AccountInterface;
use Drupal\Core\Access\AccessResult;

/**
 * Access controller for the Dealers entity entity.
 *
 * @see \Drupal\m_learning\Entity\DealersEntity.
 */
class DealersEntityAccessControlHandler extends EntityAccessControlHandler {

  /**
   * {@inheritdoc}
   */
  protected function checkAccess(EntityInterface $entity, $operation, AccountInterface $account) {
    /** @var \Drupal\m_learning\DealersEntityInterface $entity */
    switch ($operation) {
      case 'view':
        if (!$entity->isPublished()) {
          return AccessResult::allowedIfHasPermission($account, 'view unpublished dealers entity entities');
        }
        return AccessResult::allowedIfHasPermission($account, 'view published dealers entity entities');

      case 'update':
        return AccessResult::allowedIfHasPermission($account, 'edit dealers entity entities');

      case 'delete':
        return AccessResult::allowedIfHasPermission($account, 'delete dealers entity entities');
    }

    // Unknown operation, no opinion.
    return AccessResult::neutral();
  }

  /**
   * {@inheritdoc}
   */
  protected function checkCreateAccess(AccountInterface $account, array $context, $entity_bundle = NULL) {
    return AccessResult::allowedIfHasPermission($account, 'add dealers entity entities');
  }

}
