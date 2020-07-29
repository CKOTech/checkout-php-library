<?php
namespace  com\checkout\ApiServices\LocalPayment\RequestModels;

class BaseLocalPayment
{
	protected $_lppId;
	protected $_issuerId;

	/**
	 * @return string Payment provider ID
	 */
	public function getLppId()
	{
		return $this->_lppId;
	}

	/**
	 * @return string Issuer ID
	 */
	public function getIssuerId()
	{
		return $this->_issuerId;
	}

	/**
	 * @param string $lppId Payment provider ID
	 * @return $this
	 */
	public function setLppId($lppId)
	{
		$this->_lppId = $lppId;
		return $this;
	}

	/**
	 * @param string $issuerId Issuer ID
	 * @return $this
	 */
	public function setIssuerId($issuerId)
	{
		$this->_issuerId = $issuerId;
		return $this;
	}

}
