<?php
namespace Crossconcept\TeichmannCraneconfigurator\Domain\Model;

/***************************************************************
 *
 *  Copyright notice
 *
 *  (c) 2017 Matej Mericnjak <matej.mericnjak@crossconcept.de>, crossconcept GmbH
 *
 *  All rights reserved
 *
 *  This script is part of the TYPO3 project. The TYPO3 project is
 *  free software; you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation; either version 3 of the License, or
 *  (at your option) any later version.
 *
 *  The GNU General Public License can be found at
 *  http://www.gnu.org/copyleft/gpl.html.
 *
 *  This script is distributed in the hope that it will be useful,
 *  but WITHOUT ANY WARRANTY; without even the implied warranty of
 *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *  GNU General Public License for more details.
 *
 *  This copyright notice MUST APPEAR in all copies of the script!
 ***************************************************************/

/**
 * CraneType
 */
class CraneType extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity {

    /**
     * id
     *
     * @var string
     * @validate NotEmpty
     */
    protected $id = '';

    /**
     * title
     *
     * @var string
     * @validate NotEmpty
     */
    protected $title = '';

    /**
     * salesforcetitle
     *
     * @var string
     * @validate NotEmpty
     */
    protected $salesforcetitle = '';

    /**
     * @var \TYPO3\CMS\Extbase\Domain\Model\FileReference
     */
    protected $image;

    /**
     * @var \TYPO3\CMS\Extbase\Domain\Model\FileReference
     */
    protected $icon;

    /**
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Crossconcept\TeichmannCraneconfigurator\Domain\Model\ConstructionType>
     */
    protected $constructiontype;

    /**
     * __construct
     */
    public function __construct()
    {
        $this->constructiontype = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
    }

    /**
     * @return string
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param string $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * Returns the title
     *
     * @return string $title
     */
    public function getTitle()
    {
      return $this->title;
    }

    /**
     * Sets the title
     *
     * @param string $title
     * @return void
     */
    public function setTitle($title)
    {
      $this->title = $title;
    }

    /**
     * Returns the salesforcetitle
     *
     * @return string $salesforcetitle
     */
    public function getSalesforcetitle()
    {
      return $this->salesforcetitle;
    }

    /**
     * Sets the salesforcetitle
     *
     * @param string $salesforcetitle
     * @return void
     */
    public function setSalesforcetitle($salesforcetitle)
    {
      $this->salesforcetitle = $salesforcetitle;
    }

    /**
     * @return \TYPO3\CMS\Extbase\Domain\Model\FileReference
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * @param \TYPO3\CMS\Extbase\Domain\Model\FileReference $image
     */
    public function setImage($image)
    {
        $this->image = $image;
    }

    /**
     * @return \TYPO3\CMS\Extbase\Domain\Model\FileReference
     */
    public function getIcon()
    {
        return $this->icon;
    }

    /**
     * @param \TYPO3\CMS\Extbase\Domain\Model\FileReference $icon
     */
    public function setIcon($icon)
    {
        $this->icon = $icon;
    }

    /**
     * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage $constructiontype
     * @return void
     */
    public function setConstructiontype($constructiontype)
    {
        $this->constructiontype = $constructiontype;
    }

    /**
     * Adds a constructiontype
     *
     * @param \Crossconcept\TeichmannCraneconfigurator\Domain\Model\ConstructionType $constructiontype
     */
    public function addConstructiontype(\Crossconcept\TeichmannCraneconfigurator\Domain\Model\ConstructionType $constructiontype)
    {
        $this->constructiontype->attach($constructiontype);
    }

    /**
     * Removes a file
     *
     * @param \Crossconcept\TeichmannCraneconfigurator\Domain\Model\ConstructionType $constructiontype
     */
    public function removeConstructiontype(\Crossconcept\TeichmannCraneconfigurator\Domain\Model\ConstructionType $constructiontype)
    {
        $this->constructiontype->detach($constructiontype);
    }

    /**
     * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage $constructiontype
     */
    public function getConstructiontype()
    {
        return $this->constructiontype;
    }

}
