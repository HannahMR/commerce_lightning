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