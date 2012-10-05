<?php
/**
 * FileUploaderControl.php
 *
 * @author  Jiří Šifalda <sifalda.jiri@gmail.com>
 * @package
 *
 * @date    18.09.12
 */

namespace Flame\Components\FileUploader;

class FileUploaderControl extends \Flame\Application\UI\Control
{

	/**
	 * @var null|array
	 */
	private $uploadedFiles;

	/**
	 * @var FileUploaderFormFactory
	 */
	private $fileUploaderFormFactory;

	/**
	 * @param $files
	 */
	public function setUploadedFiles($files)
	{
		$this->uploadedFiles = $files;
	}

	/**
	 * @param FileUploaderFormFactory $factory
	 */
	public function setFileUploaderFormFactory(FileUploaderFormFactory $factory)
	{
		$this->fileUploaderFormFactory = $factory;
	}

	public function handleRefresh()
	{
		if($this->presenter->isAjax()){
			$this->invalidateControl('fileUploader');
		}else{
			$this->redirect('this');
		}
	}

	/**
	 * @return FileUploaderFormFactory
	 */
	protected function createComponentFileUploaderForm()
	{
		return $this->fileUploaderFormFactory->createForm();
	}

	public function render()
	{
		$this->template->setFile(__DIR__ . '/FileUploaderControl.latte');
		$this->template->uploadedFiles = $this->uploadedFiles;
		$this->template->render();
	}

}
