<?php
/*
 * Author Siarhei Astapchyk
 * igentuman@gmail.com
 */

namespace IGN\MessageQueueConsumer\Model\Queue\Db;

use Psr\Log\LoggerInterface;

class Consumer
{
    /**
     * @var LoggerInterface
     */
    protected $logger;

    public function __construct(
        LoggerInterface $logger
    )
    {
        $this->logger = $logger;
    }

    /**
     * @param string $stringJSOM
     */
    public function process(string $stringJSOM)
    {
        $data = \Zend_Json_Decoder::decode($stringJSOM);
        //do something with the data here
        $this->logger->debug('done processing data');
        echo "DONE processing data}".PHP_EOL;
    }
}