<?php
/**
 * @file
 * Contains \Drupal\distill_example\Controller\DistillExampleController.
 */

namespace Drupal\distill_example\Controller;
use Drupal\Core\Controller\ControllerBase;
use Symfony\Component\HttpFoundation\JsonResponse;
use Drupal\distill\Distill;
use Drupal\distill\DistillProcessor;
use Drupal\distill_example\DistillTestEntityProcessor;

/**
 * Controller routines for distill_example routes.
 */
class DistillExampleController extends ControllerBase {

  /**
   * Returns a blob of bad json.
   */
  public function badExample() {
    $entity = \Drupal::entityManager()->getStorage('node')->load(2);
    return new JsonResponse((array)$entity);
  }

  /**
   * Returns a blob of yummy json.
   */
  public function goodExample() {
    // Update this function so that it loads an entity that you would like to test against.
    $entity = \Drupal::entityManager()->getStorage('node')->load(2);

    // Create instance of processor.
    //$processor = new DistillTestEntityProcessor();
    $processor = new DistillProcessor();

    // Create instance of Distill.
    $distiller = new Distill('node', $entity, $processor);

    // Specify which fields should be returned.
    $distiller->setField('nid', '_id');
    $distiller->setField('title');
    $distiller->setField('body', 'post');
    $distiller->setField('field_image', 'image');

    // This is an entity reference field. We pass a settings array
    // that has an 'include_fields' key. This key contains an array of fields
    // from the referenced entity that should be returned.
    $distiller->setField('field_author', 'user', array(
      'include_fields' => array(
        'name',
        'mail'
      )
    ));

    // See above comment about entity reference fields.
    $distiller->setField('field_tags', 'topic', array(
      'include_fields' => array(
        'name',
        'tid'
      )
    ));

    // Output the returned array as JSON.
    return new JsonResponse($distiller->getFieldValues());
  }
}
