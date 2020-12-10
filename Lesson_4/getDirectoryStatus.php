<?php
include 'testDirectoryStatus.php';

    function getDirectoryStatus($nameDirectory)
    {
        $fileList = [
            'dirs' => [],
            'files' => [],
        ];
        $currentDir = opendir($nameDirectory);

        while ($element = readdir($currentDir))
        {
            if(in_array($element, ['.', '..']))
                continue;

            if (is_file($element))
            {
                    (is_readable($element) ? $fileList['files'][$element]['is_readable'] = 'true' : $fileList['files'][$element]['is_readable'] = 'false');
                    (is_writable($element) ? $fileList['files'][$element]['is_writable'] = 'true' : $fileList['files'][$element]['is_writable'] = 'false');
                    $size = filesize($element);
                    $fileList['files'][$element]['size'] = $size;
            }
            elseif(is_dir($element))
            {
                (is_readable($element) ? $fileList['dirs'][$element]['is_readable'] = 'true' : $fileList[$element]['is_readable'] = 'false');
                (is_writable($element) ? $fileList['dirs'][$element]['is_writable'] = 'true' : $fileList[$element]['is_writable'] = 'false');
            }
        }
        closedir($currentDir);
        print_r($fileList);
    }
$result = getDirectoryStatus("./test");
//$resultTest = testDirectoryStatus("");