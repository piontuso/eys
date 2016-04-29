<?php

namespace Drupal\m_learning\Form;

use Drupal\Core\Entity\EntityForm;
use Drupal\Core\Form\FormStateInterface;

/**
 * Class WelcomeEntityForm.
 *
 * @package Drupal\m_learning\Form
 */
class WelcomeEntityForm extends EntityForm {

  /**
   * {@inheritdoc}
   */
  public function form(array $form, FormStateInterface $form_state) {
    $form = parent::form($form, $form_state);

    $welcome_entity = $this->entity;
    $form['label'] = array(
      '#type' => 'textfield',
      '#title' => $this->t('Label'),
      '#maxlength' => 255,
      '#default_value' => $welcome_entity->label(),
      '#description' => $this->t("Label for the Welcome entity."),
      '#required' => TRUE,
    );

    $form['id'] = array(
      '#type' => 'machine_name',
      '#default_value' => $welcome_entity->id(),
      '#machine_name' => array(
        'exists' => '\Drupal\m_learning\Entity\WelcomeEntity::load',
      ),
      '#disabled' => !$welcome_entity->isNew(),
    );

    /* You will need additional form elements for your custom properties. */

    return $form;
  }

  /**
   * {@inheritdoc}
   */
  public function save(array $form, FormStateInterface $form_state) {
    $welcome_entity = $this->entity;
    $status = $welcome_entity->save();

    switch ($status) {
      case SAVED_NEW:
        drupal_set_message($this->t('Created the %label Welcome entity.', [
          '%label' => $welcome_entity->label(),
        ]));
        break;

      default:
        drupal_set_message($this->t('Saved the %label Welcome entity.', [
          '%label' => $welcome_entity->label(),
        ]));
    }
    $form_state->setRedirectUrl($welcome_entity->urlInfo('collection'));
  }

}
