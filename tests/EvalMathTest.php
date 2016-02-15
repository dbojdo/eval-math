<?php
/**
 * EvalMathTest.php
 *
 * @author dbojdo - Daniel Bojdo <daniel.bojdo@8x8.com>
 * Created on 02 12, 2016, 17:17
 * Copyright (C) 8x8
 */

namespace Webit\Util\EvalMath\Tests;

use Webit\Util\EvalMath\EvalMath;

class EvalMathTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var EvalMath
     */
    private $evalMath;

    protected function setUp()
    {
        $this->evalMath = new EvalMath();
    }

    /**
     * @test
     * @dataProvider moduloOperatorData
     */
    public function shouldSupportModuloOperator($formula, $values, $expectedResult)
    {
        foreach ($values as $k => $v) {
            $this->evalMath->v[$k] = $v;
        }

        $this->assertEquals($expectedResult, $this->evalMath->evaluate($formula));
    }

    public function moduloOperatorData()
    {
        return array(
            array(
                'a%b', // 9%3 => 0
                array('a' => 9, 'b' => 3),
                0
            ),
            array(
                'a%b', // 10%3 => 1
                array('a' => 10, 'b' => 3),
                1
            ),
            array(
                '10-a%(b+c*d)', // 10-10%(7-2*2) => 9
                array('a' => '10', 'b' => 7, 'c'=> -2, 'd' => 2),
                9
            )
        );
    }
}
