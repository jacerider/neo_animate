<?php

namespace Drupal\neo_animate;

use Drupal\Core\Render\Element;
use Drupal\Core\Render\RendererInterface;
use Drupal\Core\Template\Attribute;
use Twig\Extension\AbstractExtension;
use Twig\TwigFilter;

/**
 * Defines Twig extensions.
 */
class TwigExtension extends AbstractExtension {

  /**
   * The renderer.
   *
   * @var \Drupal\Core\Render\RendererInterface
   */
  protected $renderer;

  /**
   * Constructs \Drupal\Core\Template\TwigExtension.
   *
   * @param \Drupal\Core\Render\RendererInterface $renderer
   *   The renderer.
   */
  public function __construct(RendererInterface $renderer) {
    $this->renderer = $renderer;
  }

  /**
   * {@inheritdoc}
   */
  public function getFilters():array {
    return [
      new TwigFilter('neo_animate_attribute', [$this, 'prepareAttribute']),
      new TwigFilter('neo_animate_children', [$this, 'prepareChildren']),
    ];
  }

  /**
   * Add classes to a renderable array.
   */
  public function prepareAttribute(Attribute $attribute, $animation = '', array $config = []) {
    $animate = new Animate($config);
    if ($animation) {
      $animate->setAnimation($animation);
    }
    $attribute->merge($animate->getAttributes());

    // Use Renderer::render() on a temporary render array to get additional
    // bubbleable metadata on the render stack.
    $template_attached = ['#attached' => $animate->getAttachments()];
    $this->renderer->render($template_attached);

    return $attribute;
  }

  /**
   * Add classes to the children of a renderable.
   */
  public function prepareChildren($build, $animation = '', $delayByDelta = 0, $delay = 200, array $config = []) {
    if (empty($build)) {
      return $build;
    }
    $currentDelta = 0;
    foreach (Element::children($build) as $child) {
      $childConfig = $config;
      if ($delayByDelta) {
        $childConfig['delay'] = $currentDelta * $delay;
        $currentDelta++;
        if ($currentDelta === $delayByDelta) {
          $currentDelta = 0;
        }
      }
      $animate = new Animate($childConfig);
      if ($animation) {
        $animate->setAnimation($animation);
      }
      $animate->applyTo($build[$child]);
    }
    return $build;
  }

}
