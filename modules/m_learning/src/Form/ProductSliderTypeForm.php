<?php

namespace Drupal\m_learning\Form;

use Drupal\Core\Entity\EntityForm;
use Drupal\Core\Form\FormStateInterface;

/**
 * Class ProductSliderTypeForm.
 *
 * @package Drupal\m_learning\Form
 */
class ProductSliderTypeForm extends EntityForm {

  /**
   * {@inheritdoc}
   */
  public function form(array $form, FormStateInterface $form_state) {
    $form = parent::form($form, $form_state);

    $d_product_slider_type = $this->entity;
    $form['label'] = array(
      '#type' => 'textfield',
      '#title' => $this->t('Label'),
      '#maxlength' => 255,
      '#default_value' => $d_product_slider_type->label(),
      '#description' => $this->t("Label for the Product slider type."),
      '#required' => TRUE,
    );

    $form['id'] = array(
      '#type' => 'machine_name',
      '#default_value' => $d_product_slider_type->id(),
      '#machine_name' => array(
        'exists' => '\Drupal\m_learning\Entity\ProductSliderType::load',
      ),
      '#disabled' => !$d_product_slider_type->isNew(),
    );

    /* You will need additional form elements for your custom properties. */

    return $form;
  }

  /**
   * {@inheritdoc}
   */
  public function save(array $form, FormStateInterface $form_state) {
    $d_product_slider_type = $this->entity;
    $status = $d_product_slider_type->save();

    switch ($status) {
      case SAVED_NEW:
        drupal_set_message($this->t('Created the %label Product slider type.', [
          '%label' => $d_product_slider_type->label(),
        ]));
        break;

      default:
        drupal_set_message($this->t('Saved the %label Product slider type.', [
          '%label' => $d_product_slider_type->label(),
        ]));
    }
    $form_state->setRedirectUrl($d_product_slider_type->urlInfo('collection'));
  }

}
