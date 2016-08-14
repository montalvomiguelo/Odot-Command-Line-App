<?php

namespace Acme;

use Symfony\Component\Console\Command\Command as SymfonyCommand;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Helper\Table;

class Command extends SymfonyCommand {

    protected $database;

    public function __construct(DatabaseAdapter $database)
    {
        $this->database = $database;

        parent::__construct();
    }

    public function showTasks(OutputInterface $output)
    {
        if (!$tasks = $this->database->fetchAll('tasks') )
        {
            return $output->writeln('<comment>No tasks at the moment!</comment>');
        }

        $table = new Table($output);

        $table->setHeaders(['Id', 'Description'])
              ->setRows($tasks)
              ->render();

    }

}
