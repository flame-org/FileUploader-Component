<?php
/**
 * FileUploaderForm.php
 *
 * @author  Jiří Šifalda <sifalda.jiri@gmail.com>
 * @package
 *
 * @date    18.09.12
 */

namespace Flame\Components\FileUploader;

class FileUploaderForm extends \Flame\Application\UI\Form
{

	public function configure()
	{

		if(class_exists('\Kdyby\Extension\Forms\BootstrapRenderer\BootstrapRenderer'))
			$this->setRenderer(new \Kdyby\Extension\Forms\BootstrapRenderer\BootstrapRenderer());

		$this->addExtension('addMultiUpload', new \Flame\Forms\Controls\MultipleFileUpload());

		$this->getElementPrototype()->target[] = 'upload_target';

		$this->addUpload('upload', 'Upload');

		$this->addMultiUpload('multiUpload', 'MultiUpload');

		$this->addSubmit('send', 'Upload');
	}



}
