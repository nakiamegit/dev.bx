<?php
include 'testDirectoryStatus.php';

class DirectoryStatus implements ITestable
{
	public string $nameDirectory = '.';

	public function __construct(string $nameDirectory = '')
	{
		if($nameDirectory)
		{
			$this->nameDirectory = $nameDirectory;
		}
	}

	public function getDirectory()
	{
		$nameDirectory = $this->nameDirectory;

		$readDirectory = opendir($nameDirectory);
		$fileList = [
			'nameDirectory' => [],
			'sizeDirectory' => [],
			'timeDirectory' => [],
			'isReadableDirectory' => [],
			'isWritableDirectory' => [],

			'nameFile' => [],
			'sizeFile' => [],
			'timeFile' => [],
			'isReadableFile' => [],
			'isWritableFile' => [],
		];

		while ($elements = readdir($readDirectory))
		{
			if (is_file($elements))
			{
				$fileList['nameFile'][] = $elements;

				$size = filesize($elements);
				$sizeFile = round($size / 1024, 2);
				$fileList['sizeFile'][] = $sizeFile;

				$time = filectime($elements);
				$timeFile = date('d.m.Y H:m', $time);
				$fileList['timeFile'][] = $timeFile;

				(is_readable($elements) ? $fileList['isReadableFile'][] = 'Файл доступен для чтения'
					: $fileList['isReadableFile'][] = 'Файл не доступен для чтения');
				(is_writable($elements) ? $fileList['isWritableFile'][] = 'Файл доступен для записи'
					: $fileList['isWritableFile'][] = 'Файл не доступен для записи');
			}
			else
			{
				$fileList['nameDirectory'][] = $elements;

				//$sizeDirectory = directorySize($elements);
				$fileList['sizeDirectory'][] = 'В разработке';

				$time = filectime($elements);
				$timeDirectory = date('d.m.Y H:m', $time);
				$fileList['timeDirectory'][] = $timeDirectory;

				(is_readable($elements) ? $fileList['isReadableDirectory'][] = 'Директория доступна для чтения'
					: $fileList['isReadableDirectory'][] = 'Директория не доступна для чтения');
				(is_writable($elements) ? $fileList['isWritableDirectory'][] = 'Директория Доступна для записи'
					: $fileList['isWritableDirectory'][] = 'Директория не доступна для записи');
			}
		}
		closedir($readDirectory);
		return $fileList;
	}

	public function actionDirectory($nameDirectory, $action)
	{
		if($action == 'delete'){
			rmdir($nameDirectory);
			echo 'Директория успешно удалена!';
		} elseif ($action == 'create'){
			mkdir($nameDirectory);
			echo 'Директория успешно создана!';
		} else{
			echo 'Проверьте правильность написания команды!';
		}
	}

		public function runTest()
	{
		$nameDirectory = $this->nameDirectory;
		if($nameDirectory === '.'){
			echo 'Вы указали текущую директорию!';
		}elseif ($nameDirectory === '..'){
			echo 'Вы указали родительскую директорию!';
		}elseif (file_exists($nameDirectory)){
			echo 'Директория "' . $nameDirectory . '" существует!';
		}else {
			echo 'Директория не существует!';
		}
	}
}

$directory = new DirectoryStatus();

$method = $directory->getDirectory();
print_r($method);

//$method = $directory->actionDirectory('test','create');

//Tests::run($directory);






/*
 *
 *
function directorySize($nameDirectory)
{
	$readDirectory = opendir($nameDirectory);
	$size = 0;

	while ($elements = readdir($readDirectory))
	{
		if(is_file($elements))
		{
			$sizeFile = filesize($elements);
			$size += $sizeFile;
		}
		else
		{
			directorySize($elements);
		}

	}
	$size = round($size, 2);
	//return $size;
	echo $size;
}
directorySize('../..');
*
*
*/