<?php

declare(strict_types=1);

namespace TWOH\WalletDriver\Tests\Unit\Routing;

use PHPUnit\Framework\TestCase;
use TWOH\WalletDriver\Exceptions\RouteNotFoundException;
use TWOH\WalletDriver\Routing\WalletDriver;

final class CliRouterTest extends TestCase
{
    /**
     * @return void
     * @throws RouteNotFoundException
     */
    public function testRegisterAndHandleRoute(): void
    {
        $router = new WalletDriver();
        $router->register('hello-world', function () {
            return 'Hello World';
        });

        $this->expectOutputString('Hello World');
        echo $router->handle('hello-world');
    }

    /**
     * @return void
     * @throws RouteNotFoundException
     */
    public function testHandleRouteNotFound(): void
    {
        $this->expectException(RouteNotFoundException::class);

        $router = new WalletDriver();
        $router->handle('non-existent-route');
    }
}