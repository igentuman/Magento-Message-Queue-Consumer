<?php
/*
 * Author Siarhei Astapchyk
 * igentuman@gmail.com
 */

namespace IGN\MessageQueueConsumer\Command;

use Magento\Framework\Exception\LocalizedException;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Magento\Framework\MessageQueue\PublisherInterface;
use Magento\Framework\File\Csv;

class ImportFromFile extends Command
{
    const NAME = 'file_name';
    /**
     * @var PublisherInterface
     */
    private $publisher;

    public function __construct(
        PublisherInterface $publisher
    )
    {
        parent::__construct('ign:import:file');
        $this->publisher = $publisher;
    }

    protected function configure()
    {
        $this->setName('ign:import:file')
            ->setDescription('Will split import items to queue')
            ->addOption(
                self::NAME,
                null,
                InputOption::VALUE_REQUIRED,
                'File Name'
            );
    }

    //example of data import from file using message queue
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        if ($name = $input->getOption(self::NAME)) {
            $output->writeln('<info>Provided file is `' . $name . '`</info>');
        }

        // Read the CSV file
        $csv = new Csv(new \Magento\Framework\Filesystem\Driver\File());
        $items = $csv->getData($name);
        foreach ($items as $item) {
            $this->publisher->publish('ign.my_custom_db_consumer', \Zend_Json_Encoder::encode($item));
        }
        return 0;
    }

}