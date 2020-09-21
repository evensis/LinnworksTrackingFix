<?php

namespace BigHat\Tracking\Observer;

use Magento\Framework\Event\Observer;
use Magento\Framework\Event\ObserverInterface;
use Magento\Shipping\Model\ShipmentNotifier;

/**
 * Class Tracking
 *
 * @package BigHat\Tracking\Observer
 */
class Tracking implements ObserverInterface {

    /**
     * @var \Psr\Log\LoggerInterface
     */
    protected $_logger;
    /**
     * @var \Magento\Shipping\Model\ShipmentNotifier
     */
    protected $_shipmentNotifier;

    /**
     * Tracking constructor.
     *
     * @param \Magento\Shipping\Model\ShipmentNotifier $shipmentNotifier
     */
    public function __construct(
        ShipmentNotifier $shipmentNotifier
    ) {
        $this->_shipmentNotifier = $shipmentNotifier;
    }

    /**
     * @param \Magento\Framework\Event\Observer $observer
     * @return false
     */
    public function execute(Observer $observer)
    {
        $tracking = $observer->getEvent()->getTrack();
        $shipping = $tracking->getShipment();
        try {
            $this->_shipmentNotifier->notify($shipping);
        } catch (\Exception $e) {
            return false;
        }
    }
}
