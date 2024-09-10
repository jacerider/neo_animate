<?php

declare(strict_types=1);

namespace Drupal\neo_animate\Controller;

use Drupal\Core\Controller\ControllerBase;

/**
 * Returns responses for Neo | Animate routes.
 */
final class AnimateDemoController extends ControllerBase {

  /**
   * Builds the response.
   */
  public function __invoke(): array {

    $build['content'] = [
      '#theme' => 'neo_animate_demo',
    ];

    return $build;
  }

}
