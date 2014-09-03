<?php

/**
 * @file
 * Contains \Drupal\file_extract\Plugin\Field\FieldType\TextExtractedItem.
 */

namespace Drupal\file_extract\Plugin\Field\FieldType;

use Drupal\Core\Field\FieldStorageDefinitionInterface;
use Drupal\Core\TypedData\DataDefinition;
use Drupal\text\Plugin\Field\FieldType\TextItemBase;

/**
 * Defines the 'text_extracted' entity field type.
 *
 * @FieldType(
 *   id = "text_extracted",
 *   label = @Translation("Extracted text"),
 *   description = @Translation("An entity field containing text."),
 *   no_ui = TRUE
 * )
 */
class TextExtractedItem extends TextItemBase {

  /**
   * {@inheritdoc}
   */
  public static function propertyDefinitions(FieldStorageDefinitionInterface $field_definition) {
    $properties['value'] = DataDefinition::create('string')
      ->setLabel(t('Extracted text'))
      ->setDescription(t('The text value with the text format applied.'))
      ->setComputed(TRUE)
      ->setClass('\Drupal\file_extract\TextExtracted');

    return $properties;
  }

  public static function schema(FieldStorageDefinitionInterface $field_definition) {

  }

}
