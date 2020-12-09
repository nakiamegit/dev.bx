<?php
include 'testDirectoryStatus.php';

    function getDirectoryStatus($nameDirectory)
    {
        $readDirectory = opendir($nameDirectory);
        $fileList = [
            'nameDirectory' => [],
            'sizeDirectory' => [],
            'isReadableDirectory' => [],
            'isWritableDirectory' => [],

            'nameFile' => [],
            'sizeFile' => [],
            'isReadableFile' => [],
            'isWritableFile' => [],
        ];

        while ($elements = readdir($readDirectory)) {
            if (is_file($elements)) {
                $fileList['nameFile'][] = $elements;

                $size = filesize($elements);
                $sizeFile = round($size / 1024, 2);
                $fileList['sizeFile'][] = $sizeFile;

                (is_readable($elements) ? $fileList['isReadableFile'][] = 'Файл доступен для чтения'
                    : $fileList['isReadableFile'][] = 'Файл не доступен для чтения');
                (is_writable($elements) ? $fileList['isWritableFile'][] = 'Файл доступен для записи'
                    : $fileList['isWritableFile'][] = 'Файл не доступен для записи');
            } else {
                $fileList['nameDirectory'][] = $elements;

                (is_readable($elements) ? $fileList['isReadableDirectory'][] = 'Директория доступна для чтения'
                    : $fileList['isReadableDirectory'][] = 'Директория не доступна для чтения');
                (is_writable($elements) ? $fileList['isWritableDirectory'][] = 'Директория Доступна для записи'
                    : $fileList['isWritableDirectory'][] = 'Директория не доступна для записи');
            }
        }
        closedir($readDirectory);
        return $fileList;
    }


$result = getDirectoryStatus(".");
    print_r($result);








    function runTest()
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
