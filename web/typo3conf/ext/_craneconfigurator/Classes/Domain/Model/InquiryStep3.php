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
 * InquiryStep3
 */
class InquiryStep3 extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity
{

	  /**
     * @var float
     */
    protected $payloadmin;

    /**
     * @var float
     */
    protected $payloadmax;

    /**
     * @var float
     */
    protected $reachmin;

    /**
     * @var float
     */
    protected $reachmax;

    /**
     * @var float
     */
    protected $payloadandreach1;

    /**
     * @var float
     */
    protected $payloadandreach2;

    /**
     * @var float
     */
    protected $payloadandreach3;

    /**
     * @var float
     */
    protected $payloadandreach4;


    /**
     * @var float
     */
    protected $gaugemin;

    /**
     * @var float
     */
    protected $gaugemax;

    /**
     * @var float
     */
    protected $reachsolidsupportmin;

    /**
     * @var float
     */
    protected $reachsolidsupportmax;

    /**
     * @var float
     */
    protected $reachstabilizermin;

    /**
     * @var float
     */
    protected $reachstabilizermax;

    /**
     * @var int
     */
    protected $reachassembly;

    /**
     * @var float
     */
    protected $liftheight;

    /**
     * @var string
     */
    protected $liftheightabove;

    /**
     * @var float
     */
    protected $liftheightbelow;

    /**
     * @var string
     */
    protected $workingspeed;

    /**
     * @var string
     */
    protected $workingspeedliftinggear;

    /**
     * @var string
     */
    protected $workingspeedcatgear;

    /**
     * @var string
     */
    protected $workingspeedcranegear;

    /**
     * @var float
     */
    protected $buildingheight;

    /**
     * @var string
     */
    protected $wallcomposition;

    /**
     * @var int
     */
    protected $steering;

    /**
     * @var int
     */
    protected $rotatingtrolley;

    /**
     * @var int
     */
    protected $rotatingspreader;

    /**
     * @var int
     */
    protected $loadhandlingdevice;

    /**
     * @var int
     */
    protected $loadhandlingdevicegrab;

    /**
     * @var string
     */
    protected $loadhandlingdeviceinfo;

    /**
     * @var float
     */
    protected $hookpath;

    /**
     * @var float
     */
    protected $installationheight;

    /**
     * @var string
     */
    protected $operationarea;

    /**
     * @var string
     */
    protected $rails;

    /**
     * @var string
     */
    protected $hall;

    /**
     * @var string
     */
    protected $track;

    /**
     * @var string
     */
    protected $tracktype;

    /**
     * @var float
     */
    protected $tracksupportdistance;

    /**
     * @var string
     */
    protected $tracklengthexisting;

    /**
     * @var string
     */
    protected $tracklengthplanned;

    /**
     * @var string
     */
    protected $conductorrail;

    /**
     * @var string
     */
    protected $trackinfo;

    /**
     * @var string
     */
    protected $projectphase;

    /**
     * @var \DateTime
     */
    protected $commissioningdate;

    /**
     * @var string
     */
    protected $projectinformation;

    /**
     * @return float
     */
    public function getPayloadmin()
    {
        return $this->payloadmin;
    }

    /**
     * @param float $payloadmin
     */
    public function setPayloadmin($payloadmin)
    {
        $this->payloadmin = $payloadmin;
    }

    /**
     * @return float
     */
    public function getPayloadmax()
    {
        return $this->payloadmax;
    }

    /**
     * @param float $payloadmax
     */
    public function setPayloadmax($payloadmax)
    {
        $this->payloadmax = $payloadmax;
    }

    /**
     * @return float
     */
    public function getReachmin() {
      return $this->reachmin;
    }

    /**
     * @param float $reachmin
     */
    public function setReachmin($reachmin) {
      $this->reachmin = $reachmin;
    }

    /**
     * @return float
     */
    public function getReachmax() {
      return $this->reachmax;
    }

    /**
     * @param float $reachmax
     */
    public function setReachmax($reachmax) {
      $this->reachmax = $reachmax;
    }

    /**
     * @return float
     */
    public function getPayloadandreach1() {
      return $this->payloadandreach1;
    }

    /**
     * @param float $payloadandreach1
     */
    public function setPayloadandreach1($payloadandreach1) {
      $this->payloadandreach1 = $payloadandreach1;
    }

    /**
     * @return float
     */
    public function getPayloadandreach2() {
      return $this->payloadandreach2;
    }

    /**
     * @param float $payloadandreach2
     */
    public function setPayloadandreach2($payloadandreach2) {
      $this->payloadandreach2 = $payloadandreach2;
    }

    /**
     * @return float
     */
    public function getPayloadandreach3() {
      return $this->payloadandreach3;
    }

    /**
     * @param float $payloadandreach3
     */
    public function setPayloadandreach3($payloadandreach3) {
      $this->payloadandreach3 = $payloadandreach3;
    }

    /**
     * @return float
     */
    public function getPayloadandreach4() {
      return $this->payloadandreach4;
    }

    /**
     * @param float $payloadandreach4
     */
    public function setPayloadandreach4($payloadandreach4) {
      $this->payloadandreach4 = $payloadandreach4;
    }

    /**
     * @return float
     */
    public function getGaugemin()
    {
        return $this->gaugemin;
    }

    /**
     * @param float $gaugemin
     */
    public function setGaugemin($gaugemin)
    {
        $this->gaugemin = $gaugemin;
    }

    /**
     * @return float
     */
    public function getGaugemax()
    {
        return $this->gaugemax;
    }

    /**
     * @param float $gaugemax
     */
    public function setGaugemax($gaugemax)
    {
        $this->gaugemax = $gaugemax;
    }

    /**
     * @return float
     */
    public function getReachsolidsupportmin()
    {
        return $this->reachsolidsupportmin;
    }

    /**
     * @param float $reachsolidsupportmin
     */
    public function setReachsolidsupportmin($reachsolidsupportmin)
    {
        $this->reachsolidsupportmin = $reachsolidsupportmin;
    }

    /**
     * @return float
     */
    public function getReachsolidsupportmax()
    {
        return $this->reachsolidsupportmax;
    }

    /**
     * @param float $reachsolidsupportmax
     */
    public function setReachsolidsupportmax($reachsolidsupportmax)
    {
        $this->reachsolidsupportmax = $reachsolidsupportmax;
    }

    /**
     * @return float
     */
    public function getReachstabilizermin()
    {
        return $this->reachstabilizermin;
    }

    /**
     * @param float $reachstabilizermin
     */
    public function setReachstabilizermin($reachstabilizermin)
    {
        $this->reachstabilizermin = $reachstabilizermin;
    }

    /**
     * @return float
     */
    public function getReachstabilizermax()
    {
        return $this->reachstabilizermax;
    }

    /**
     * @param float $reachstabilizermax
     */
    public function setReachstabilizermax($reachstabilizermax)
    {
        $this->reachstabilizermax = $reachstabilizermax;
    }

    /**
     * @return int
     */
    public function getReachassembly()
    {
        return $this->reachassembly;
    }

    /**
     * @param int $reachassembly
     */
    public function setReachassembly($reachassembly)
    {
        $this->reachassembly = $reachassembly;
    }

    /**
     * @return float
     */
    public function getLiftheight()
    {
        return $this->liftheight;
    }

    /**
     * @param float $liftheight
     */
    public function setLiftheight($liftheight)
    {
        $this->liftheight = $liftheight;
    }

    /**
     * @return string
     */
    public function getLiftheightabove()
    {
        return $this->liftheightabove;
    }

    /**
     * @param string $liftheightabove
     */
    public function setLiftheightabove($liftheightabove)
    {
        $this->liftheightabove = $liftheightabove;
    }

    /**
     * @return float
     */
    public function getLiftheightbelow()
    {
        return $this->liftheightbelow;
    }

    /**
     * @param float $liftheightbelow
     */
    public function setLiftheightbelow($liftheightbelow)
    {
        $this->liftheightbelow = $liftheightbelow;
    }

    /**
     * @return string
     */
    public function getWorkingspeed() {
      return $this->workingspeed;
    }

    /**
     * @param string $workingspeed
     */
    public function setWorkingspeed($workingspeed) {
      $this->workingspeed = $workingspeed;
    }

    /**
     * @return string
     */
    public function getWorkingspeedliftinggear() {
      return $this->workingspeedliftinggear;
    }

    /**
     * @param string $workingspeedliftinggear
     */
    public function setWorkingspeedliftinggear($workingspeedliftinggear) {
      $this->workingspeedliftinggear = $workingspeedliftinggear;
    }

    /**
     * @return string
     */
    public function getWorkingspeedcatgear() {
      return $this->workingspeedcatgear;
    }

    /**
     * @param string $workingspeedcatgear
     */
    public function setWorkingspeedcatgear($workingspeedcatgear) {
      $this->workingspeedcatgear = $workingspeedcatgear;
    }

    /**
     * @return string
     */
    public function getWorkingspeedcranegear() {
      return $this->workingspeedcranegear;
    }

    /**
     * @param string $workingspeedcranegear
     */
    public function setWorkingspeedcranegear($workingspeedcranegear) {
      $this->workingspeedcranegear = $workingspeedcranegear;
    }

    /**
     * @return string
     */
    public function getConductorrail()
    {
        return $this->conductorrail;
    }

    /**
     * @param string $conductorrail
     */
    public function setConductorrail($conductorrail)
    {
        $this->conductorrail = $conductorrail;
    }

    /**
     * @return int
     */
    public function getSteering() {
      return $this->steering;
    }

    /**
     * @param int $steering
     */
    public function setSteering($steering) {
      $this->steering = $steering;
    }

    /**
     * @return float
     */
    public function getBuildingheight()
    {
        return $this->buildingheight;
    }

    /**
     * @param float $buildingheight
     */
    public function setBuildingheight($buildingheight)
    {
        $this->buildingheight = $buildingheight;
    }

    /**
     * @return string
     */
    public function getWallcomposition()
    {
        return $this->wallcomposition;
    }

    /**
     * @param string $wallcomposition
     */
    public function setWallcomposition($wallcomposition)
    {
        $this->wallcomposition = $wallcomposition;
    }

    /**
     * @return int
     */
    public function getRotatingtrolley() {
      return $this->rotatingtrolley;
    }

    /**
     * @param int $rotatingtrolley
     */
    public function setRotatingtrolley($rotatingtrolley) {
      $this->rotatingtrolley = $rotatingtrolley;
    }

    /**
     * @return int
     */
    public function getRotatingspreader() {
      return $this->rotatingspreader;
    }

    /**
     * @param int $rotatingspreader
     */
    public function setRotatingspreader($rotatingspreader) {
      $this->rotatingspreader = $rotatingspreader;
    }

    /**
     * @return int
     */
    public function getLoadhandlingdevice() {
      return $this->loadhandlingdevice;
    }

    /**
     * @param int $loadhandlingdevice
     */
    public function setLoadhandlingdevice($loadhandlingdevice) {
      $this->loadhandlingdevice = $loadhandlingdevice;
    }

    /**
     * @return int
     */
    public function getLoadhandlingdevicegrab() {
      return $this->loadhandlingdevicegrab;
    }

    /**
     * @param int $loadhandlingdevicegrab
     */
    public function setLoadhandlingdevicegrab($loadhandlingdevicegrab) {
      $this->loadhandlingdevicegrab = $loadhandlingdevicegrab;
    }

    /**
     * @return string
     */
    public function getLoadhandlingdeviceinfo() {
      return $this->loadhandlingdeviceinfo;
    }

    /**
     * @param string $loadhandlingdeviceinfo
     */
    public function setLoadhandlingdeviceinfo($loadhandlingdeviceinfo) {
      $this->loadhandlingdeviceinfo = $loadhandlingdeviceinfo;
    }

    /**
     * @return float
     */
    public function getHookpath()
    {
        return $this->hookpath;
    }

    /**
     * @param float $hookpath
     */
    public function setHookpath($hookpath)
    {
        $this->hookpath = $hookpath;
    }

    /**
     * @return float
     */
    public function getInstallationheight()
    {
        return $this->installationheight;
    }

    /**
     * @param float $installationheight
     */
    public function setInstallationheight($installationheight)
    {
        $this->installationheight = $installationheight;
    }

    /**
     * @return string
     */
    public function getOperationarea() {
      return $this->operationarea;
    }

    /**
     * @param string $operationarea
     */
    public function setOperationarea($operationarea) {
      $this->operationarea = $operationarea;
    }

  /**
     * @return string
     */
    public function getRails()
    {
        return $this->rails;
    }

    /**
     * @param string $rails
     */
    public function setRails($rails)
    {
        $this->rails = $rails;
    }

    /**
     * @return string
     */
    public function getHall()
    {
        return $this->hall;
    }

    /**
     * @param string $hall
     */
    public function setHall($hall)
    {
        $this->hall = $hall;
    }

    /**
     * @return string
     */
    public function getTrack()
    {
        return $this->track;
    }

    /**
     * @param string $track
     */
    public function setTrack($track)
    {
        $this->track = $track;
    }

    /**
     * @return string
     */
    public function getTracktype() {
      return $this->tracktype;
    }

    /**
     * @param string $tracktype
     */
    public function setTracktype($tracktype) {
      $this->tracktype = $tracktype;
    }

    /**
     * @return float
     */
    public function getTracksupportdistance() {
      return $this->tracksupportdistance;
    }

    /**
     * @param float $tracksupportdistance
     */
    public function setTracksupportdistance($tracksupportdistance) {
      $this->tracksupportdistance = $tracksupportdistance;
    }

    /**
     * @return string
     */
    public function getTracklengthexisting()
    {
        return $this->tracklengthexisting;
    }

    /**
     * @param string $tracklengthexisting
     */
    public function setTracklengthexisting($tracklengthexisting)
    {
        $this->tracklengthexisting = $tracklengthexisting;
    }

    /**
     * @return string
     */
    public function getTracklengthplanned()
    {
        return $this->tracklengthplanned;
    }

    /**
     * @param string $tracklengthplanned
     */
    public function setTracklengthplanned($tracklengthplanned)
    {
        $this->tracklengthplanned = $tracklengthplanned;
    }

    /**
     * @return string
     */
    public function getTrackinfo()
    {
        return $this->trackinfo;
    }

    /**
     * @param string $trackinfo
     */
    public function setTrackinfo($trackinfo)
    {
        $this->trackinfo = $trackinfo;
    }

    /**
     * @return string
     */
    public function getProjectphase()
    {
        return $this->projectphase;
    }

    /**
     * @param string $projectphase
     */
    public function setProjectphase($projectphase)
    {
        $this->projectphase = $projectphase;
    }

    /**
     * @return \DateTime
     */
    public function getCommissioningdate()
    {
        return $this->commissioningdate;
    }

    /**
     * @param \DateTime $commissioningdate
     */
    public function setCommissioningdate($commissioningdate)
    {
        $this->commissioningdate = $commissioningdate;
    }

    /**
     * @return string
     */
    public function getProjectinformation()
    {
        return $this->projectinformation;
    }

    /**
     * @param string $projectinformation
     */
    public function setProjectinformation($projectinformation)
    {
        $this->projectinformation = $projectinformation;
    }

}
