<?php

namespace App\Tests;

use App\Truncater;
use PHPUnit\Framework\TestCase;

class TruncaterTest extends TestCase
{
    static $t1;
    public static function setUpBeforeClass(): void
    {
        self::$t1 = new Truncater();
    }
    public function testTruncating()
    {
        $test_string = 'Кудашкина Юлия Евгеньевна';
        $this->assertSame(
            '',
            self::$t1->truncate('')
        );
        $this->assertSame(
            $test_string,
            self::$t1->truncate($test_string)
        );
        $this->assertSame(
            'Кудашкина ...',
            self::$t1->truncate($test_string, ['length' => 10])
        );
        $this->assertSame(
            $test_string,
            self::$t1->truncate($test_string, ['length' => 50])
        );
        $this->assertSame(
            'Кудашкина Юлия ...',
            self::$t1->truncate($test_string, ['length' => -10])
        );
        $this->assertSame(
            'Кудашкина *',
            self::$t1->truncate(
                $test_string,
                ['length' => 10, 'separator' => '*']
            )
        );
        $this->assertSame(
            $test_string,
            self::$t1->truncate($test_string, ['separator' => '*'])
        );
    }
}
