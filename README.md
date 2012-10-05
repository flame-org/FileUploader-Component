FileUploader-Component
======================

Simple Nette component for uploading files via AJAX

###Requires
- [Flame framework](https://github.com/flame-org/Framework)
- Twitter Bootstrap (recommend [submodule](https://github.com/jsifalda/twitter-bootstrap))

###Usage
**config.neon**

	services:
		FileUploaderForm: \Flame\Components\FileUploader\FileUploaderFormFactory
		FileUploaderControl: \Flame\Components\FileUploader\FileUploaderControlFactory

**Presenter**

	...
	/**
	 * @var \Flame\Components\FileUploader\FileUploaderControlFactory $fileUploader
	 */
	private $fileUploader;

	/**
	 * @param \Flame\Components\FileUploader\FileUploaderControlFactory $fileUploader
	 */
	public function injectFileUploader(\Flame\Components\FileUploader\FileUploaderControlFactory $fileUploader)
	{
		$this->fileUploader = $fileUploader;
	}

	...

	/**
	 * @return \Flame\Components\FileUploader\FileUploaderControl
	 */
	protected function createComponentFileUploader()
	{
		return $this->fileUploader->create();
	}

**Template**

	{control fileUploader}