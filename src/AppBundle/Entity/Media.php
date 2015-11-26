<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

class Media
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $mediaKey;

    /**
     * @var string
     */
    private $path;

    /**
     * @var string
     */
    private $adapter;

    /**
     * @var string
     */
    private $orignalName;

    /**
     * @var string
     */
    private $hashedId;

    /**
     * @var string
     */
    private $duration;

    /**
     * @var string
     */
    private $fileSize;

    /**
     * @var array
     */
    private $response;


    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     * @return Media
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set mediaKey
     *
     * @param string $mediaKey
     * @return Media
     */
    public function setMediaKey($mediaKey)
    {
        $this->mediaKey = $mediaKey;

        return $this;
    }

    /**
     * Get mediaKey
     *
     * @return string 
     */
    public function getMediaKey()
    {
        return $this->mediaKey;
    }

    /**
     * Set path
     *
     * @param string $path
     * @return Media
     */
    public function setPath($path)
    {
        $this->path = $path;

        return $this;
    }

    /**
     * Get path
     *
     * @return string 
     */
    public function getPath()
    {
        return $this->path;
    }

    /**
     * Set adapter
     *
     * @param string $adapter
     * @return Media
     */
    public function setAdapter($adapter)
    {
        $this->adapter = $adapter;

        return $this;
    }

    /**
     * Get adapter
     *
     * @return string 
     */
    public function getAdapter()
    {
        return $this->adapter;
    }

    /**
     * Set orignalName
     *
     * @param string $orignalName
     * @return Media
     */
    public function setOrignalName($orignalName)
    {
        $this->orignalName = $orignalName;

        return $this;
    }

    /**
     * Get orignalName
     *
     * @return string 
     */
    public function getOrignalName()
    {
        return $this->orignalName;
    }

    /**
     * Set hashedId
     *
     * @param string $hashedId
     * @return Media
     */
    public function setHashedId($hashedId)
    {
        $this->hashedId = $hashedId;

        return $this;
    }

    /**
     * Get hashedId
     *
     * @return string 
     */
    public function getHashedId()
    {
        return $this->hashedId;
    }

    /**
     * Set duration
     *
     * @param string $duration
     * @return Media
     */
    public function setDuration($duration)
    {
        $this->duration = $duration;

        return $this;
    }

    /**
     * Get duration
     *
     * @return string 
     */
    public function getDuration()
    {
        return $this->duration;
    }

    /**
     * Set fileSize
     *
     * @param string $fileSize
     * @return Media
     */
    public function setFileSize($fileSize)
    {
        $this->fileSize = $fileSize;

        return $this;
    }

    /**
     * Get fileSize
     *
     * @return string 
     */
    public function getFileSize()
    {
        return $this->fileSize;
    }

    /**
     * Set response
     *
     * @param array $response
     * @return Media
     */
    public function setResponse($response)
    {
        $this->response = $response;

        return $this;
    }

    /**
     * Get response
     *
     * @return array 
     */
    public function getResponse()
    {
        return $this->response;
    }
}
