<?php

namespace Drupal\m_learning\Entity;

use Drupal\views\EntityViewsData;
use Drupal\views\EntityViewsDataInterface;

/**
 * Provides Views data for Product slider entities.
 */
class ProductSliderViewsData extends EntityViewsData implements EntityViewsDataInterface {

  /**
   * {@inheritdoc}
   */
  public function getViewsData() {
    $data = parent::getViewsData();

    $data['d_product_slider']['table']['base'] = array(
      'field' => 'id',
      'title' => $this->t('Product slider'),
      'help' => $this->t('The Product slider ID.'),
    );

    return $data;
  }

}
