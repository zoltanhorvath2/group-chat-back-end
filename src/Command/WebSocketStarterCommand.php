<?php

declare(strict_types=1);

namespace App\Command;

use App\MessageHandler;
use Ratchet\Http\HttpServer;
use Ratchet\Server\IoServer;
use Ratchet\WebSocket\WsServer;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

#[AsCommand(
    name: 'app:websocket-starter',
    description: 'Starts websocket server',
)]
class WebSocketStarterCommand extends Command
{
    public function __construct()
    {
        parent::__construct();
    }

    protected function configure(): void
    {
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        try {
            $server = IoServer::factory(
                new HttpServer(
                    new WsServer(
                        new MessageHandler(new \SplObjectStorage)
                    )
                ),
                8082
            );

            $output->writeln('WebSocket server started on port 8082');
            $server->run();

            return Command::SUCCESS;

        } catch (\Exception $e) {
            $output->writeln($e->getMessage());

            return Command::FAILURE;
        }
    }
}
