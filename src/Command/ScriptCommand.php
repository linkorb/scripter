<?php

namespace Scripter\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Scripter\Scripter;

class ScriptCommand extends Command
{
    protected $scripter;
    public function __construct(Scripter $scripter)
    {
        $this->scripter = $scripter;
        parent::__construct();
    }

    public function configure()
    {
        $this->setName('script')
            ->setDescription('List scripts')
            ->addArgument(
                'scriptName',
                InputArgument::OPTIONAL,
                'Name of the script'
            );
    }

    public function execute(InputInterface $input, OutputInterface $output)
    {
        $name = $input->getArgument('scriptName');
        if (!$name) {
            foreach ($this->scripter->getScripts() as $script) {
                $output->writeLn('<info>' . $script->getName() . '</info> ' . $script->getFilename());
            }

            return;
        }
        $scripts = $this->scripter->getScripts();

        $script = $scripts[$name];
        $output->writeLn('<info>' . $script->getDoc() . '</info>');
    }
}
