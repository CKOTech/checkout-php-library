<?php
namespace com\checkout\ApiServices\Charges\RequestModels;
/**
 * Class LocalPaymentCharge
 * @package com\checkout\ApiServives\Charges\RequestModels
 * @note make a magic function that convert in the concept of postedParam
 */
class LocalPaymentCharge extends BaseCharge
{

	private $_baseLocalPayment;

	private  $_paymentToken;

	/**
	 * @return \com\checkout\ApiServices\LocalPayment\RequestModels\BaseLocalPayment
	 */
	public function getBaseLocalPayment ()
	{
		return $this->_baseLocalPayment;
	}

	/**
	 * @param \com\checkout\ApiServices\LocalPayment\RequestModels\BaseLocalPayment $baseLocalPayment
	 */
	public function setBaseLocalPayment (\com\checkout\ApiServices\LocalPayment\RequestModels\BaseLocalPayment $baseLocalPayment )
	{
		$this->_baseLocalPayment = $baseLocalPayment;
	}

	/**
	 * @return mixed
	 */
	public function getPaymentToken ()
	{
		return $this->_paymentToken;
	}

	/**
	 * @param mixed $paymentToken
	 */
	public function setPaymentToken ( $paymentToken )
	{
		$this->_paymentToken = $paymentToken;
	}

}