<?php

namespace Acme;

use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class ShowCommand extends Command
{
    public function configure ()
    {
        $this->setName('showTasks')
            ->setDescription('Show All Tasks.');
    }

    public function execute (InputInterface $input, OutputInterface $output)
    {
        $this->showTasks($output);
    }


}