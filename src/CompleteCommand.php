<?php

namespace Acme;

use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class CompleteCommand extends Command
{
    public function configure ()
    {
        $this->setName('complete')
            ->setDescription('Complete A Task By Its Id.')
            ->addArgument('id', InputArgument::REQUIRED, 'Id Of The Task.');
    }

    public function execute (InputInterface $input, OutputInterface $output)
    {
        $id = $input->getArgument('id');

        $this->database->query('DELETE FROM tasks WHERE id = :id', compact('id'));

        $output->writeln('<info>Task Completed!</info>');

        $this->showTasks($output);
    }
}