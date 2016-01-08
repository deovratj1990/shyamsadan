<?php

namespace Drupal\gallery\Entity;

use Drupal\gallery\Entity\GalleryInterface;
use Drupal\Core\Entity\ContentEntityBase;

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
}
