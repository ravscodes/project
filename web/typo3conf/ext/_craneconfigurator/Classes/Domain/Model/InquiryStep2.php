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
 * InquiryStep2
 */
class InquiryStep2 extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity
{

    /**
     * @var \Crossconcept\TeichmannCraneconfigurator\Domain\Model\Industry
     */
    protected $industry;

    /**
     * @var string
     */
    protected $customindustry;

    /**
     * @var string
     */
    protected $purpose;

    /**
     * @var \Crossconcept\TeichmannCraneconfigurator\Domain\Model\Classification
     */
    protected $classification;

    /**
     * @var string
     */
    protected $containeramount;

    /**
     * @var string
     */
    protected $containerunit;

    /**
     * @return Industry
     */
    public function getIndustry()
    {
        return $this->industry;
    }

    /**
     * @param Industry $industry
     */
    public function setIndustry($industry)
    {
        $this->industry = $industry;
    }

    /**
     * @return string
     */
    public function getCustomindustry()
    {
        return $this->customindustry;
    }

    /**
     * @param string $customindustry
     */
    public function setCustomindustry($customindustry)
    {
        $this->customindustry = $customindustry;
    }

    /**
     * @return string
     */
    public function getPurpose()
    {
        return $this->purpose;
    }

    /**
     * @param string $purpose
     */
    public function setPurpose($purpose)
    {
        $this->purpose = $purpose;
    }

    /**
     * @return Classification
     */
    public function getClassification()
    {
        return $this->classification;
    }

    /**
     * @param Classification $classification
     */
    public function setClassification($classification)
    {
        $this->classification = $classification;
    }

    /**
     * @return string
     */
    public function getContaineramount() {
      return $this->containeramount;
    }

    /**
     * @param string $containeramount
     */
    public function setContaineramount($containeramount) {
      $this->containeramount = $containeramount;
    }

    /**
     * @return string
     */
    public function getContainerunit() {
      return $this->containerunit;
    }

    /**
     * @param string $containerunit
     */
    public function setContainerunit($containerunit) {
      $this->containerunit = $containerunit;
    }
}
