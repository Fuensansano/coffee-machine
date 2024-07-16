<?php declare(strict_types=1);

namespace KataTests;

use Kata\CoffeeMachine;
use Kata\Drink;
use Kata\Order;
use Kata\vendor\DrinkMaker;
use PHPUnit\Framework\TestCase;

class CoffeeMachineTest extends TestCase
{
    private DrinkMaker $drinkMaker;
    private CoffeeMachine $coffeeMachine;

    protected function setUp(): void
    {
        $this->drinkMaker = self::createMock(DrinkMaker::class);

        $this->coffeeMachine = new CoffeeMachine($this->drinkMaker);
    }

    /** @test */
    public function given_a_chocolate_order_then_the_machine_prepare_the_order(): void
    {

        $order = new Order(Drink::Chocolate);

        $this->drinkMaker->expects(self::once())->method('prepare')->with("H::");

        $this->coffeeMachine->prepare($order);
    }

    /** @test */
    public function given_a_coffee_order_then_the_machine_prepare_the_order(): void
    {
        $order = new Order(Drink::Coffee);


        $this->drinkMaker->expects(self::once())->method('prepare')->with("C::");

        $this->coffeeMachine->prepare($order);
    }

    /** @test */
    public function given_a_tea_order_then_the_machine_prepare_the_order(): void
    {
        $order = new Order(Drink::Tea);


        $this->drinkMaker->expects(self::once())->method('prepare')->with("T::");
        $this->coffeeMachine->prepare($order);
    }
}
