<?php

namespace Nikolay\Brand\Api\Data;


interface BrandInterface
{

    /**
     * @return int
     */
    public function getId();

    /**
     * @param int $id
     * @return void
     */
    public function setId($id);

    /**
     * @return string
     */
    public function getName();

    /**
     * @param string $name
     * @return void
     */
    public function setName($name);

    /**
     * @return string[]
     */
    public function getImageUrls();

    /**
     * @param string[] $urls
     * @return void
     */
    public function setImageUrls(array $urls);

    /**
     * @return string
     */
    public function getDescription();

    /**
     * @param string $description
     * @return void
     */
    public function setDescription($description);
}