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
 * InquiryStep1
 */
class InquiryStep1 extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity
{

    /**
     * @var \Crossconcept\TeichmannCraneconfigurator\Domain\Model\CraneType
     */
    protected $cranetype = null;

    /**
     * @var \Crossconcept\TeichmannCraneconfigurator\Domain\Model\ConstructionType
     */
    protected $constructiontype = null;

    /**
     * @return CraneType
     */
    public function getCranetype()
    {
        return $this->cranetype;
    }

    /**
     * @param CraneType $cranetype
     */
    public function setCranetype($cranetype)
    {
        $this->cranetype = $cranetype;
    }

    /**
     * @return ConstructionType
     */
    public function getConstructiontype()
    {
        return $this->constructiontype;
    }

    /**
     * @param ConstructionType $constructiontype
     */
    public function setConstructiontype($constructiontype)
    {
        $this->constructiontype = $constructiontype;
    }
}
