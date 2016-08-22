<?php

namespace Drupal\ad_integration;

use Drupal\Core\Config\ConfigFactoryInterface;
use Drupal\Core\Entity\EntityTypeManagerInterface;
use Drupal\Core\Entity\Query\QueryFactory;
use Drupal\Core\Path\PathMatcher;
use Drupal\Core\Routing\CurrentRouteMatch;
use Drupal\Core\Utility\Token;

/**
 * Class AdIntegration.
 *
 * @package Drupal\ad_integration
 */
class AdIntegration implements AdIntegrationInterface {
  /**
   * The config factory.
   *
   * @var ImmutableConfig
   */
  protected $settings;

  /**
   * The token object.
   *
   * @var Token
   */
  protected $token;

  /**
   * Generates Advertising information.
   *
   * @param ConfigFactoryInterface $config_factory
   *   The config factory service.
   * @param Token $token
   *   Token service.
   */
  public function __construct(
    ConfigFactoryInterface $config_factory,
    Token $token
  ) {
    $this->settings = $config_factory->get('ad_integration.settings');
    $this->token = $token;
  }

  /**
   * {@inheritdoc}
   */
  public function getAdUnit1() {
    return $this->token->replace('[advertising:adsc_unit1]', array(), array('sanitize' => FALSE));
  }

  /**
   * {@inheritdoc}
   */
  public function getAdUnit2() {
    return $this->token->replace('[advertising:adsc_unit2]', array(), array('sanitize' => FALSE));
  }

  /**
   * {@inheritdoc}
   */
  public function getAdUnit3() {
    return $this->token->replace('[advertising:adsc_unit3]', array(), array('sanitize' => FALSE));
  }

  /**
   * {@inheritdoc}
   */
  public function getKeyword() {
    return $this->token->replace('[advertising:adsc_keyword]', array(), array('sanitize' => FALSE));
  }

  /**
   * {@inheritdoc}
   */
  public function getAdMode() {
    return $this->token->replace('[advertising:adsc_mode]', array(), array('sanitize' => FALSE));
  }

  /**
   * {@inheritdoc}
   */
  public function getAdProvider() {
    return $this->settings->get('ad_provider');
  }

  /**
   * {@inheritdoc}
   */
  public function getAdEngine() {
    return $this->settings->get('adsc_ad_engine');
  }

  /**
   * {@inheritdoc}
   */
  public function getAdContainerTag() {
    return $this->settings->get('adsc_container_tag');
  }

  /**
   * {@inheritdoc}
   */
  public function getCacheContexts() {
    return ['url.path'];
  }

  /**
   * {@inheritdoc}
   */
  public function getCacheTags() {
    return $this->settings->getCacheTags();
  }

  /**
   * {@inheritdoc}
   */
  public function getCacheMaxAge() {
    return 0;
  }

}
