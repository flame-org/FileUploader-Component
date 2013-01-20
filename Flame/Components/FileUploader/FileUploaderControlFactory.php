<?php
/**
 * FileUploaderControlFactory.php
 *
 * @author  Jiří Šifalda <sifalda.jiri@gmail.com>
 * @package
 *
 * @date    18.09.12
 */

namespace Flame\Components\FileUploader;

class FileUploaderControlFactory extends \Nette\Object
{

	/**
	 * @var \Flame\Utils\FileManager $fileManager
	 */
	private $fileManager;

	/**
	 * @var FileUploaderFormFactory $fileUploaderFormFactory
	 */
	private $fileUploaderFormFactory;

	/**
	 * @var \Nette\Http\SessionSection $session
	 */
	private $session;

	/**
	 * @param \Nette\Http\Session $session
	 */
	public function injectSession(\Nette\Http\Session $session)
	{
		$this->session = $session->getSection('FILEUPLOADER');
	}

	/**
	 * @param FileUploaderFormFactory $fileUploaderFormFactory
	 */
	public function injectFileUploaderFormFactory(FileUploaderFormFactory $fileUploaderFormFactory)
	{
		$this->fileUploaderFormFactory = $fileUploaderFormFactory;
	}

	/**
	 * @param \Flame\Utils\FileManager $fileManager
	 */
	public function injectFileManager(\Flame\Utils\FileManager $fileManager)
	{
		$this->fileManager = $fileManager;
	}

	/**
	 * @param null $data
	 * @return FileUploaderControl
	 */
	public function create($data = null)
	{
		$control = new FileUploaderControl();
		$control->setFileUploaderFormFactory($this->fileUploaderFormFactory);
		$uploadedFiles = $this->session->uploadedFiles;
		$control->setUploadedFiles($uploadedFiles);
		return $control;
	}

}
