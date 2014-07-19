<?php

class JapaneseTest extends PHPUnit_Framework_TestCase
{
    private function _getSourcePath()
    {
        return realpath(__DIR__ . '/../vendor/CodeIgniter/system/language/english');
    }
    private function _getDestPath()
    {
        return realpath(__DIR__ . '/../../language/japanese');
    }

    private $_fileLists = array();

    private function _getFileList($type)
    {
        $type = strtolower($type);
        if (! array_key_exists($type, $this->_fileLists)) {
            switch($type) {
            case 'dest':
                $this->_fileLists[$type] = scandir($this->_getDestPath());
                break;
            case 'source':
                $this->_fileLists[$type] = scandir($this->_getSourcePath());
                break;
            default:
                throw new InvalidArgumentException('not found type');
            }
        }

        return $this->_fileLists[$type];
    }

    /**
     * @group languages
     * @group japanese
     */
    public function testSameFileList()
    {
        $source_files = $this->_getFileList('source');
        $dest_files = $this->_getFileList('dest');;

        $this->assertEquals($source_files, $dest_files);
    }

    public function dpSameLangKeys()
    {
        $source_files = $this->_getFileList('source');
        $dest_files = $this->_getFileList('dest');;
        $filenames = array_intersect($source_files, $dest_files);

        $result = array();
        foreach ($filenames as $filename) {
            if ($filename === '.' || $filename === '..' )
                continue;

            $result[] = array($this->_getSourcePath() . '/' . $filename,
                              $this->_getDestPath() . '/' . $filename
                              );
        }

        return $result;
    }    

    /**
     * @dataProvider dpSameLangKeys
     * @group languages
     * @group japanese
     */
    public function testSameLangKeys($source_path, $dest_path)
    {
        $source = array();
        $dest = array();

        if (strpos($source_path, 'index.html') !== false)
            return;

        require $source_path;
        $source = $lang;
        unset($lang);

        require $dest_path;
        $dest = $lang;
        unset($lang);

        $this->assertEquals(array_keys($source), array_keys($dest));
    }
}