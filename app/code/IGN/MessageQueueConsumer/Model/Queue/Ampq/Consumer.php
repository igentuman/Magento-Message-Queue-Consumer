<?php
/*
 * Author Siarhei Astapchyk
 * igentuman@gmail.com
 */

namespace IGN\MessageQueueConsumer\Model\Queue\Ampq;

use Psr\Log\LoggerInterface;

class Consumer
{
    /**
     * @var LoggerInterface
     */
    protected $logger;

    public function __construct(
        LoggerInterface $logger
        ///SomeConnectorClassToOtherService         $connector
    )
    {
        $this->logger = $logger;
       // $this->connector = $connector;
    }

    /**
     * @param string $input
     */
    public function process(string $input)
    {
        //$this->connector->doSomethingWithTheInput($input);
        $this->logger->debug('message processed');
    }
}