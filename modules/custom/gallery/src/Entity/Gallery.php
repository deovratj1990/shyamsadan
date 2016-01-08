<?php

namespace Drupal\gallery\Entity;

use Drupal\Core\Entity\EntityTypeInterface;
use Drupal\Core\Entity\ContentEntityBase;
use Drupal\Core\Field\BaseFieldDefinition;

use Drupal\gallery\Entity\GalleryInterface;

/**
 * @ContentEntityType(
 *   id = "gallery",
 *   label = @Translation("Gallery"),
 *   handlers = {
 *     "form" = {
 *       "default" = "Drupal\gallery\Entity\Form\GalleryForm",
 *       "delete" = "Drupal\gallery\Entity\Form\GalleryDeleteForm"
 *     }
 *   },
 *   entity_keys = {
 *     "id" = "gid",
 *     "label" = "title",
 *     "description" = "description"
 *   },
 *   base_table = "gallery",
 *   data_table = "gallery_data"
 * )
 */
class Gallery extends ContentEntityBase implements GalleryInterface
{
	public function getTitle()
	{
		return $this->get('title')->value;
	}

	public function setTitle($title)
	{
		$this->set('title', $title);
	}

	public function getDescription()
	{
		return $this->get('description')->value;
	}

	public function setDescription($description)
	{
		$this->set('description', $description);
	}

	public static function baseFieldDefinitions(EntityTypeInterface $entity_type)
	{
		$fields['gid'] = BaseFieldDefinition::create('integer')
	      ->setLabel(t('Gallery ID'))
	      ->setDescription(t('The gallery ID.'))
	      ->setReadOnly(TRUE)
	      ->setSetting('unsigned', TRUE);

	    $fields['title'] = BaseFieldDefinition::create('string')
	      ->setLabel(t('Title'))
	      ->setRequired(TRUE)
	      ->setSetting('max_length', 255)
	      ->setDisplayOptions('view', array(
	        'label' => 'hidden',
	        'type' => 'string',
	        'weight' => -5,
	      ))
	      ->setDisplayOptions('form', array(
	        'type' => 'string_textfield',
	        'weight' => -5,
	      ))
	      ->setDisplayConfigurable('form', TRUE);

	    $fields['description'] = BaseFieldDefinition::create('text')
	      ->setLabel(t('Description'))
	      ->setRequired(TRUE)
	      ->setDisplayOptions('view', array(
	        'label' => 'hidden',
	        'type' => 'text',
	        'weight' => 2,
	      ))
	      ->setDisplayOptions('form', array(
	        'type' => 'text_textfield',
	        'weight' => 2,
	      ))
	      ->setDisplayConfigurable('form', TRUE);

	    return $fields;
	}
}
