<?php

namespace Drupal\commerce_lightning\Plugin\Commerce\PaymentGateway;


use Drupal\Component\Datetime\TimeInterface;
use Drupal\commerce_payment\Exception\HardDeclineException;
use Drupal\commerce_price\Price;
use Drupal\commerce_payment\Entity\PaymentInterface;
use Drupal\commerce_payment\Entity\PaymentMethodInterface;
use Drupal\commerce_payment\PaymentMethodTypeManager;
use Drupal\commerce_payment\PaymentTypeManager;
use Drupal\commerce_payment\Plugin\Commerce\PaymentGateway\OnsitePaymentGatewayBase;
use Drupal\Core\Entity\EntityTypeManagerInterface;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Link;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Drupal\Core\Url;

/**
 * Provides the Square payment gateway.
 *
 * @CommercePaymentGateway(
 *   id = "lightning",
 *   label = "Lightning (LND)",
 *   display_label = "Lightning (LND)",
 *   forms = {
 *     "add-payment-method" = "Drupal\commerce_lightning\PluginForm\Lightning\PaymentMethodAddForm",
 *   },
 * )
 */
class Lightning extends OnsitePaymentGatewayBase implements LightningInterface {

  /**
   * {@inheritdoc}
   */
  public function buildConfigurationForm(array $form, FormStateInterface $form_state) {
    $form = parent::buildConfigurationForm($form, $form_state);

    $form['app_name'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Application Name'),
      '#default_value' => $this->configuration['app_name'],
      '#required' => TRUE,
    ];

    $form['app_endpoint'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Application Endpoint'),
      '#default_value' => $this->configuration['app_endpoint'],
      '#required' => TRUE,
    ];

    $form['app_macaroon'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Macaroon Hex'),
      '#default_value' => $this->configuration['app_macaroon'],
      '#required' => TRUE,
    ];

    return $form;
  }

  /**
   * {@inheritdoc}
   */
  public function validateConfigurationForm(array &$form, FormStateInterface $form_state) {
    parent::validateConfigurationForm($form, $form_state);
    $values = $form_state->getValue($form['#parents']);

    //
  }

  /**
   * {@inheritdoc}
   */
  public function submitConfigurationForm(array &$form, FormStateInterface $form_state) {
    parent::submitConfigurationForm($form, $form_state);

    if (!$form_state->getErrors()) {
      $values = $form_state->getValue($form['#parents']);
      $this->configuration['app_name'] = $values['app_name'];
      $this->configuration['app_endpoint'] = $values['app_endpoint'];
      $this->configuration['app_macaroon'] = $values['app_macaroon'];
    }
  }

  /**
   * {@inheritdoc}
   */
  public function createPayment(PaymentInterface $payment, $capture = TRUE) {

  }

  /**
   * {@inheritdoc}
   */
  public function deletePaymentMethod(PaymentMethodInterface $payment_method) {
    $payment_method->delete();
  }

  /**
   * {@inheritdoc}
   */
  public function createPaymentMethod(PaymentMethodInterface $payment_method, array $payment_details) {

  }

}