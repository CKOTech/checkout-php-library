<?php
namespace test\ChargeService;
use test\TestHelper;

include '../../autoload.php';

class ChargeServiceTest extends \PHPUnit_Framework_TestCase
{
    private $_apiClient ;
    private $_customerId;
    private $_cardId;
    
    public function setup()
    {
        // replace by a valid key with alternative payments enabled
        $this->_apiClient = new \com\checkout\ApiClient('sk_test_a2dba067-bfe8-425c-88e9-6685820aa16e');

    }

    public function testChargeWithLocalPayment()
    {

		$paymentTokenCreate = new \com\checkout\ApiServices\Tokens\RequestModels\PaymentTokenCreate();
		$paymentTokenCreate->setValue(100);
		$paymentTokenCreate->setCurrency('EUR');
		$paymentTokenCreate->setChargeMode('3');
		$paymentTokenCreate->setSuccessUrl('http://mycustomerurl.com/order?result=pass');
		$paymentTokenCreate->setFailUrl('http://mycustomerurl.com/order?result=fail');

		$tokenService = $this->_apiClient->tokenService();
		$paymentToken = $tokenService->createPaymentToken($paymentTokenCreate);
        
        $this->baseLocalPayment = new \com\checkout\ApiServices\LocalPayment\RequestModels\BaseLocalPayment();
        // iDEAL
        $this->baseLocalPayment->setLppId('lpp_9');
        $this->baseLocalPayment->setIssuerId('RABONL2U');

		$charge = new \com\checkout\ApiServices\Charges\RequestModels\LocalPaymentCharge();
		$charge->setBaseLocalPayment($this->baseLocalPayment);
		$charge->setPaymentToken($paymentToken->getId());
		$charge->setEmail('test@example.org');

		$chargeService = $this->_apiClient->chargeService();
		$chargeResponse = $chargeService->chargeWithLocalPayment($charge);

        $this->assertFalse( $chargeResponse->hasError());
        $this->assertEquals(200, $chargeResponse->getHttpStatus());
        $this->assertNotNull($chargeResponse->getId());
        $this->assertStringStartsWith('https://sandbox.checkout.com', $chargeResponse->getLocalPayment()->getPaymentUrl());

    }


}
 