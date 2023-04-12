<?php
/*
 * Author Siarhei Astapchyk
 * igentuman@gmail.com
 */

namespace IGN\MessageQueueConsumer\Observer;

use Magento\Framework\Event\Observer;
use Magento\Framework\MessageQueue\PublisherInterface;

class MyEventObserver
{
    /**
     * @var PublisherInterface
     */
    protected $publisher;

    public function __construct(
        PublisherInterface $publisher
    )
    {
        $this->publisher = $publisher;
    }

    //example of publishing message to queue by getting data from observer
    //by that we are not affecting the performance
    public function execute(Observer $observer)
    {   $data = $observer->getEvent()->getSomeData();
        $json = \Zend_Json_Encoder::encode($data);
        $this->publisher->publish('ign.my_custom_db_consumer', $json);
    }
}