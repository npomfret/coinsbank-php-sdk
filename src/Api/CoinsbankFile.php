<?php

namespace Coinsbank\Api;

use Coinsbank\CoinsbankSapi;

/**
 * Class CoinsbankFile
 *
 * @package Coinsbank\Api
 */
class CoinsbankFile extends CoinsbankSapi
{
    const URL = '/file';

    /**
     * Deletes file before using in any method.
     *
     * @param string $fileKey File key, in response after uploading file, param "key".
     * @param string $fileName File name, in response after uploading file, param "filename".
     */
    public function deleteFile($fileKey, $fileName)
    {
        $this->delete(self::URL, array('key' => $fileKey, 'filename' => $fileName));
    }

    /**
     * Get file content before using in any method.
     *
     * @param string $fileKey File key, in response after uploading file, param "key".
     * @param string $fileName File name, in response after uploading file, param "filename".
     */
    public function getFile($fileKey, $fileName)
    {
        $this->get(self::URL, array('key' => $fileKey, 'filename' => $fileName));
    }

    /**
     * Uploads file to the API-server.
     *
     * @param string $fileName
     * @param string $fileContent
     */
    public function uploadFile($fileName, $fileContent)
    {
        $this->post(self::URL, array(array('name' => 'FileModel[picture]', 'filename' => $fileName, 'contents' => $fileContent)), array('Content-Type' => 'application/octet-stream'), true);
    }

}