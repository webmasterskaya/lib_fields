<?php

use Joomla\CMS\Factory;
use Joomla\CMS\Form\Form;
use Joomla\CMS\Form\FormHelper;
use Joomla\CMS\HTML\HTMLHelper;
use Joomla\CMS\Layout\FileLayout;
use Joomla\CMS\Uri\Uri;

defined('JPATH_PLATFORM') or die;

JLoader::register('JFormFieldQuantumupload', JPATH_ROOT . DIRECTORY_SEPARATOR . implode(DIRECTORY_SEPARATOR, [
	'administrator', 'components', 'com_quantummanager', 'fields', 'quantumupload.php'
]));

/**
 * Form Field class for the Joomla Platform.
 * Supports an HTML select list of categories
 *
 * @since  1.6
 */
class JFormFieldQuantumuploadimage extends JFormFieldQuantumupload
{

	/**
	 * @var string
	 */
	public $type = 'QuantumUploadImage';

	/**
	 * @return array
	 */
	protected function getLayoutData()
	{
		$layout = new FileLayout('pickimage', __DIR__ . DIRECTORY_SEPARATOR . 'layouts');
		$parentData = parent::getLayoutData();

		$parentData['cssClass'] .= ' quantumuploadimage-field';
		if(isset($this->dropAreaHidden) && (int)$this->dropAreaHidden)
		{
			$parentData['cssClass'] .= ' quantumuploadimage-field-preview-hidden';
		}

		$other = $layout->render(array_merge($parentData,
			[

			]));

		return array_merge($parentData,
			[
				'other' => $other,
			]
		);
	}

	public function getInput()
	{
		try
		{
			$this->__set('dropAreaHidden', $this->getAttribute('dropAreaHidden', true));
			return parent::getInput();
		}
		catch (Exception $e)
		{
			echo $e->getMessage();
		}
	}

}