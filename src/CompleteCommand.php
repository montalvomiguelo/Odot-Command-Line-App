<?php

namespace Acme;

use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputArgument;

class CompleteCommand extends Command {

    public function configure() {
        $this->setName('complete')
             ->setDescription('Complete a task by its id')
             ->addArgument('id', InputArgument::REQUIRED);
    }

    public function execute(InputInterface $input, OutputInterface $output)
    {
        $id = $input->getArgument('id');

        $this->database->query('DELETE FROM tasks WHERE ID = :id', compact('id'));

        $output->writeln('<info>Task Completed!</info>');

        $this->showTasks($output);
    }

}
