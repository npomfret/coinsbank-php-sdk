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
     * @return \Coinsbank\Transport\CoinsbankResponse
     */
    public function deleteFile($fileKey, $fileName)
    {
        return $this->delete(self::URL, array('key' => $fileKey, 'filename' => $fileName));
    }

    /**
     * Get file content before using in any method.
     *
     * @param string $fileKey File key, in response after uploading file, param "key".
     * @param string $fileName File name, in response after uploading file, param "filename".
     * @return \Coinsbank\Transport\CoinsbankResponse
     */
    public function getFile($fileKey, $fileName)
    {
        return $this->get(self::URL, array('key' => $fileKey, 'filename' => $fileName));
    }

    /**
     * Uploads file to the API-server.
     *
     * @param string $fileName
     * @param string $fileContent
     * @return \Coinsbank\Transport\CoinsbankResponse
     */
    public function uploadFile($fileName, $fileContent)
    {
        return $this->post(self::URL, array(array('name' => 'FileModel[picture]', 'filename' => $fileName, 'contents' => $fileContent)), array(), true);
    }

}