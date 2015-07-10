<?php
/**
 * @file
 * Contains \Drupal\distill_example\DistillTestEntityProcessor
 */

namespace Drupal\distill_example;
use Drupal\distill\DistillProcessor;

/**
 * Defines set of formatting rules.
 * @see DistillTestEntityProcessor
 */
class DistillTestEntityProcessor extends DistillProcessor {
  /**
   * Processor for fields of type 'text_formatted'.
   *
   * @param EntityStructureWrapper|EntityValueWrapper $wrapper
   *   Wrapper of field that is being processed.
   * @param int $index
   *   Delta of field being processed.
   * @param array $settings
   *   Processor configuration and context.
   *
   * @return array
   *   Value and summary of field.
   */
  public function processTextWithSummaryType($wrapper, $index, array $settings) {
    $field_value = $wrapper->value();
    return $field_value['value'];
  }

  /**
   * Processor for 'body' field.
   *
   * @param EntityStructureWrapper|EntityValueWrapper $wrapper
   *   Wrapper of field that is being processed.
   * @param int $index
   *   Delta of field being processed.
   * @param array $settings
   *   Processor configuration and context.
   *
   * @return array
   *   Value and summary of field.
   */
  public function processBodyField($wrapper, $index, array $settings) {
    return 'hi i am a body field';
  }
}
