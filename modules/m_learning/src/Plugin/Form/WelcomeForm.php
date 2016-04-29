<?php

namespace Drupal\m_learning\Plugin\Form;
use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;


class WelcomeForm extends FormBase
{

  /**
   * Returns a unique string identifying the form.
   *
   * @return string
   *   The unique string identifying the form.
   */
  public function getFormId()
  {
    return 'm_learning_welcome_form';
  }

  /**
   * Form constructor.
   *
   * @param array $form
   *   An associative array containing the structure of the form.
   * @param \Drupal\Core\Form\FormStateInterface $form_state
   *   The current state of the form.
   *
   * @return array
   *   The form structure.
   */
  public function buildForm(array $form, FormStateInterface $form_state)
  {
    $form['title'] = array(
      '#type' => 'textfield',
      '#title' => t('Your name'),
      '#required' => TRUE,
    );
    $form['message'] = array(
      '#type' => 'textfield',
      '#title' => t('Your message'),
    );
    $form['publish'] = array(
      '#type' => 'checkbox',
      '#title' => t('Publish on welcome block'),
    );
    $form['submit'] = array(
      '#type' => 'submit',
      '#value' => t('Submit'),
    );
    return $form;
  }

  /**
   * Form submission handler.
   *
   * @param array $form
   *   An associative array containing the structure of the form.
   * @param \Drupal\Core\Form\FormStateInterface $form_state
   *   The current state of the form.
   */
  public function submitForm(array &$form, FormStateInterface $form_state)
  {
    // TODO: Implement submitForm() method.
  }
}