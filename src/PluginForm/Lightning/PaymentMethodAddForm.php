<?php

namespace Drupal\commerce_lightning\PluginForm\Lightning;

use Drupal\commerce_payment\PluginForm\PaymentMethodAddForm as BasePaymentMethodAddForm;
use Drupal\Core\Form\FormStateInterface;

/**
 * Payment method add form for Lightning (LND).
 */
class PaymentMethodAddForm extends BasePaymentMethodAddForm {


  /**
   * {@inheritdoc}
   */
  public function buildLightningForm(array $element, FormStateInterface $form_state) {

  }

  /**
   * {@inheritdoc}
   */
  protected function validateLightningForm(array &$element, FormStateInterface $form_state) {
    //
  }

  /**
   * {@inheritdoc}
   */
  public function submitLightningForm(array $element, FormStateInterface $form_state) {
    //
  }
}
