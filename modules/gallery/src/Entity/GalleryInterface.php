<?php

namespace Drupal\gallery\Entity;

use Drupal\Core\Entity\ContentEntityInterface;

interface GalleryInterface extends ContentEntityInterface
{
	public function getTitle();
	public function setTitle($title);

	public function getDescription();
	public function setDescription($description);
}
