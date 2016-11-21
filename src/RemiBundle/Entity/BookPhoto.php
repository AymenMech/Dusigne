<?php

namespace RemiBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;
/**
 * BookPhoto
 */
class BookPhoto
{
    /*
     * Life Cycle call back
     */
    public function removeUpload()
    {
        if ($file = $this->getImageFile()) {
            unlink($file);
        }
    }


    private $url;
    private $image;


    private $imageFile;


    private $updateAt;


    public function setImageFile(File $image = null)
    {
        $this->imageFile = $image;

        // VERY IMPORTANT:
        // It is required that at least one field changes if you are using Doctrine,
        // otherwise the event listeners won't be called and the file is lost
        if ($image) {
            // if 'updatedAt' is not defined in your entity, use another property
            $this->updateAt = new \DateTime('now');
        }
    }

    public function getImageFile()
    {
        return $this->imageFile;
    }

    public function setImage($image)
    {
        $this->image = $image;
        $this->url = $image;
    }

    public function getImage()
    {
        return $this->image;
    }



    private $id;




    public function getId()
    {
        return $this->id;
    }



    public function getUrl()
    {
        return $this->url;
    }

    public function getSlug()
    {
        return $this->url;
    }



    /**
     * @var boolean
     */
    private $enabled;



    /**
     * Set enabled
     *
     * @param boolean $enabled
     * @return BookPhoto
     */
    public function setEnabled($enabled)
    {
        $this->enabled = $enabled;

        return $this;
    }

    /**
     * Get enabled
     *
     * @return boolean 
     */
    public function getEnabled()
    {
        return $this->enabled;
    }

    /**
     * Set url
     *
     * @param string $url
     * @return BookPhoto
     */
    public function setUrl($url)
    {
        $this->url = $url;

        return $this;
    }

    /**
     * Set updateAt
     *
     * @param \DateTime $updateAt
     * @return BookPhoto
     */
    public function setUpdateAt($updateAt)
    {
        $this->updateAt = $updateAt;

        return $this;
    }

    /**
     * Get updateAt
     *
     * @return \DateTime 
     */
    public function getUpdateAt()
    {
        return $this->updateAt;
    }
}
