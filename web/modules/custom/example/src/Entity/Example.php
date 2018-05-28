<?php

namespace Drupal\example\Entity;

use Drupal\Core\Entity\ContentEntityBase;
use Drupal\Core\Field\BaseFieldDefinition;
use Drupal\Core\Entity\EntityTypeInterface;
use Drupal\Core\Entity\ContentEntityInterface;
use Drupal\Core\Url;

/**
 * Defines the Example entity.
 *
 * @ingroup example
 *
 * @ContentEntityType(
 *   id = "example",
 *   label = @Translation("Example"),
 *   handlers = {
 *     "views_data" = "Drupal\views\EntityViewsData",
 *   },
 *   base_table = "example",
 *   entity_keys = {
 *     "id" = "id",
 *     "uuid" = "uuid",
 *   },
 * )
 */

class Example extends ContentEntityBase implements ContentEntityInterface {

    public static function baseFieldDefinitions(EntityTypeInterface $entity_type) {

        // Standard field, used as unique if primary index.
        $fields['id'] = BaseFieldDefinition::create('integer')
            ->setLabel(t('ID'))
            ->setDescription(t('The ID of the Bonus entity.'))
            ->setReadOnly(TRUE);

        // Standard field, unique outside of the scope of the current project.
        $fields['uuid'] = BaseFieldDefinition::create('uuid')
            ->setLabel(t('UUID'))
            ->setDescription(t('The UUID of the Bonus entity.'))
            ->setReadOnly(TRUE);

        // Int field.
        $fields['fint'] = BaseFieldDefinition::create('integer')
            ->setLabel(t('Int field'))
            ->setDescription(t('Example int field.'));

        // Record creation date.
        $fields['created'] = BaseFieldDefinition::create('created')
            ->setLabel(t('Created'))
            ->setDescription(t('The time that example was created.'));

        // String field.
        $fields['fstring'] = BaseFieldDefinition::create('string')
            ->setLabel(t('String field'))
            ->setDescription(t('Example string field.'))
            ->setSettings(array(
                'default_value' => '',
                'max_length' => 100,
                'text_processing' => 0,
            ));

        // Float field.
        $fields['fdecimal'] = BaseFieldDefinition::create('decimal')
            ->setLabel(t('Float field'))
            ->setDescription(t('Example float field.'))
            ->setSettings(array(
                'precision' => 17,
                'scale' => 2,
            ));

        return $fields;
    }

    public function toUrl($rel = 'canonical', array $options = []) {
        // Return default URI as a base scheme as we do not have routes yet.
        return Url::fromUri('base:entity/example/' . $this->id(), $options);
    }
}