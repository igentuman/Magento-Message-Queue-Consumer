<?php
/*
 * Author Siarhei Astapchyk
 * igentuman@gmail.com
 */

namespace IGN\MessageQueueConsumer\Controller\Index;


use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Magento\Framework\MessageQueue\PublisherInterface;

class Index extends Action
{
    /**
     * @var PublisherInterface
     */
    private $publisher;

    public function __construct(
        Context $context,
        PublisherInterface $publisher

    ) {
        parent::__construct($context);
        $this->publisher = $publisher;
    }
    //example of publishing message to queue by getting data from request
    public function execute()
    {
        $someData  = $this->getRequest()->getParam('input');
        $this->publisher->publish('ign.my_custom_ampq_consumer', $someData);
        //$this->publisher->publish('ign.my_custom_db_consumer', $someData);
    }
}