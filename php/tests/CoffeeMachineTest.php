<?php declare(strict_types=1);

namespace KataTests;

use Generator;
use Kata\CoffeeMachine;
use Kata\Drink;
use Kata\Order;
use Kata\vendor\DrinkMaker;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;

class CoffeeMachineTest extends TestCase
{
    private DrinkMaker $drinkMaker;
    private CoffeeMachine $coffeeMachine;

    /**
     * @dataProvider orderProvider
     */
    public static function orderProvider(): Generator
    {
        yield "chocolate" => [Drink::Chocolate,"H::"];
        yield "coffee" => [Drink::Coffee,"C::"];
        yield "tea" => [Drink::Tea,"T::"];
    }

    protected function setUp(): void
    {
        $this->drinkMaker = self::createMock(DrinkMaker::class);

        $this->coffeeMachine = new CoffeeMachine($this->drinkMaker);
    }

    #[Test]
    #[DataProvider('orderProvider')]
    public function given_a_drink_order_then_the_machine_prepare_the_order(Drink $drink, string $expected): void
    {
        $order = new Order($drink);

        $this->drinkMaker->expects(self::once())->method('prepare')->with($expected);

        $this->coffeeMachine->prepare($order);
    }
}
