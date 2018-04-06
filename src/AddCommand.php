<?php

namespace Acme;

use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class AddCommand extends Command
{
    public function configure ()
    {
        $this->setName('addTask')
            ->setDescription('Add New Task.')
            ->addArgument('title', InputArgument::REQUIRED, 'Title Of The Task.')
            ->addArgument('description', InputArgument::OPTIONAL, 'Description Of The Task.', 'No Description Provided.');
    }

    public function execute (InputInterface $input, OutputInterface $output)
    {
        $title = $input->getArgument('title');
        $description = $input->getArgument('description');

        $this->database->query('INSERT INTO tasks(title, description) VALUES (:title, :description)', compact('title', 'description'));

        $output->writeln('<info>Task Added!</info>');

        $this->showTasks($output);
    }
}