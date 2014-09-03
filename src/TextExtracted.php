<?php

/**
 * @file
 * Contains \Drupal\file_extract\TextExtracted.
 */

namespace Drupal\file_extract;

use Drupal\Core\TypedData\TypedData;
use Drupal\file\FileInterface;

class TextExtracted extends TypedData {

  /**
   * Cached processed text.
   *
   * @var string|null
   */
  protected $processed = NULL;

  public function getValue() {
    if ($this->processed !== NULL) {
      return $this->processed;
    }

    $item = $this->getParent();
    $source = $item->getEntity();

    if ($source instanceof FileInterface) {
      /**
       * @var $item FileInterface
       */
      $filepath = drupal_realpath($source->getFileUri());
      if ($filepath) {
        $wrapper = new \TikaWrapper(drupal_realpath($source->getFileUri()));
        $this->processed = $wrapper->getText();
      }
    }

    if ($this->processed == NULL) {
      $this->processed = '';
    }

    return $this->processed;
  }

}
