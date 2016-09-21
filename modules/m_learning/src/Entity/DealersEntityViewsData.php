<?php

namespace Drupal\m_learning\Entity;

use Drupal\views\EntityViewsData;
use Drupal\views\EntityViewsDataInterface;

/**
 * Provides Views data for Dealers entity entities.
 */
class DealersEntityViewsData extends EntityViewsData implements EntityViewsDataInterface {

  /**
   * {@inheritdoc}
   */
  public function getViewsData() {
    $data = parent::getViewsData();

    $data['dealers_entity']['table']['base'] = array(
      'field' => 'id',
      'title' => $this->t('Dealers entity'),
      'help' => $this->t('The Dealers entity ID.'),
    );

    return $data;
  }

}
