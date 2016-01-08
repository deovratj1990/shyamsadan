<?php

namespace Drupal\gallery\Entity\Form;

use Symfony\Component\DependencyInjection\ContainerInterface;
use Drupal\Core\Entity\EntityManagerInterface;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Entity\ContentEntityForm;

class GalleryForm extends ContentEntityForm
{
	public function __construct(EntityManagerInterface $entity_manager)
	{
		parent::__construct($entity_manager);
	}

	public function create(ContainerInterface $container)
	{
		return new static($container->get('entity.manager'));
	}

	public function form(array $form, FormStateInterface $form_state)
	{
		$form = parent::form($form, $form_state);
	}
}
