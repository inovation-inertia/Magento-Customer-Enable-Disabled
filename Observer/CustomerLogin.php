<?php

namespace Custom\Customer\Observer;

use Magento\Framework\Event\ObserverInterface;

class CustomerLogin implements ObserverInterface
{
    public function execute(\Magento\Framework\Event\Observer $observer)
    {
        $objectManager = \Magento\Framework\App\ObjectManager::getInstance();
        $customerSession = $objectManager->create('Magento\Customer\Model\Session');
        $customer = $observer->getEvent()->getCustomer();
        $message = $objectManager->create('\Magento\Framework\Message\ManagerInterface');
        if(!$customer->getIsApprove()){
        $message->addError("Your Account is Not Approved !");
        return $customerSession->logout();
        }
        exit;

    }
}