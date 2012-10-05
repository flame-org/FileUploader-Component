<?php
/**
 * FileUploaderFormFactory.php
 *
 * @author  Jiří Šifalda <sifalda.jiri@gmail.com>
 * @package
 *
 * @date    18.09.12
 */


namespace Flame\Components\FileUploader;

class FileUploaderFormFactory extends \Flame\Application\FormFactory
{

	const FILEUPLOADER = 'FILEUPLOADER';

	/**
	 * @var \Flame\Utils\FileManager $fileManager
	 */
	private $fileManager;

	/**
	 * @var \Nette\Http\SessionSection $session
	 */
	private $session;

	/**
	 * @param \Nette\Http\Session $session
	 */
	public function injectSession(\Nette\Http\Session $session)
	{
		$this->session = $session->getSection(self::FILEUPLOADER);
	}

	/**
	 * @param \Flame\Utils\FileManager $fileManager
	 */
	public function injectFileManager(\Flame\Utils\FileManager $fileManager)
	{
		$this->fileManager = $fileManager;
	}

	/**
	 * @return FileUploaderForm|\Nette\Application\UI\Form
	 */
	public function createForm()
	{

//		unset($this->session->getSection(self::FILEMANAGER)->uploadedFiles);

		$form = new FileUploaderForm();
		$form->configure();
		$form->onSuccess[] = $this->formSubmitted;
		return $form;
	}

	/**
	 * @param FileUploaderForm $form
	 */
	public function formSubmitted(FileUploaderForm $form)
	{
		$values = $form->getValues();

		$files = array();
		if($values->upload->isOk())
			$files[] = $this->fileManager->saveFile($values->upload);

		if(count($values->multiUpload)){
			foreach($values->multiUpload as $file){
				if($file->isOk()) $files[] = $this->fileManager->saveFile($file);
			}
		}

		$this->session->uploadedFiles = $files;

	}


}
