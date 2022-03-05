<?php

namespace Drupal\field_labels;

use Drupal\Core\Entity\EntityInterface;
use Drupal\field_ui\FieldConfigListBuilder;

/**
 * Provides lists of field config entities.
 */
class FieldLabelsFieldConfigListBuilder extends FieldConfigListBuilder {

  /**
   * {@inheritdoc}
   */
  public function buildRow(EntityInterface $field_config) {
    /** @var \Drupal\field\FieldConfigInterface $field_config */
    $row = parent::buildRow($field_config);
    $definition = $field_config->getThirdPartySettings('field_labels');
    $row['data']['label'] = [
      'data' => [
        'name' => [
          '#markup' => '<strong> ' . $row['data']['label'] . '</strong>',
        ],
      ],
    ];
    if (!empty($definition)) {
      if (!empty($definition['form_label'])) {
        $row['data']['label']['data']['form_label']['#markup'] = '<br><small>Form Label: <em>' . $definition['form_label'] . '</em></small>';
      }
      if (!empty($definition['display_label'])) {
        $row['data']['label']['data']['display_label']['#markup'] = '<br><small>Display Label: <em>' . $definition['display_label'] . '</em></small>';
      }
    }
    return $row;
  }

}
