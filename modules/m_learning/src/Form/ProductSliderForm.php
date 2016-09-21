<?php

namespace Drupal\m_learning\Form;

use Drupal\Core\Entity\ContentEntityForm;
use Drupal\Core\Form\FormStateInterface;

/**
 * Form controller for Product slider edit forms.
 *
 * @ingroup m_learning
 */
class ProductSliderForm extends ContentEntityForm {

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {
    /* @var $entity \Drupal\m_learning\Entity\ProductSlider */
    $form = parent::buildForm($form, $form_state);
    $entity = $this->entity;

    return $form;
  }

  /**
   * {@inheritdoc}
   */
  public function save(array $form, FormStateInterface $form_state) {
    $entity = $this->entity;
    $status = parent::save($form, $form_state);

    switch ($status) {
      case SAVED_NEW:
        drupal_set_message($this->t('Created the %label Product slider.', [
          '%label' => $entity->label(),
        ]));
        break;

      default:
        drupal_set_message($this->t('Saved the %label Product slider.', [
          '%label' => $entity->label(),
        ]));
    }
    $form_state->setRedirect('entity.d_product_slider.canonical', ['d_product_slider' => $entity->id()]);
  }

}
