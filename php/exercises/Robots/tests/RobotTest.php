<?php
declare(strict_types=1); 

use PHPUnit\Framework\TestCase;
use App\Robot;

final class RobotTest extends TestCase
{
    public function testValidType(): void
    {
        $robot = new Robot('walking');
        $this->assertEquals(
            'WL',
            $robot->type
        );
    }

  public function testInvalidType(): void
    {
        $this->expectException(InvalidArgumentException::class);

        $robot = new Robot('invalid');
    }

    public function testCanFly(): void
    {
        $robot = new Robot('flying');
        $this->assertEquals(
            'robot fly',
            $robot ->fly()
        );
    }
    public function testCantFly(): void
    {
        $robot = new Robot('walking');
        $this->assertNotEquals(
            'robot fly',
            $robot ->fly()
        );
    }
    public function testCanWalking(): void
    {
        $robot = new Robot('walking');
        $this->assertEquals(
            'robot walking',
            $robot ->walk()
        );
    }
    public function testCantWalking(): void
    {
        $robot = new Robot('flying');
        $this->assertNotEquals(
            'robot walking',
            $robot ->fly()
        );
    }
    
}
