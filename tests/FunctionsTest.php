<?php

class FunctionsTest extends TestCase
{
    public function testArrayDotFlatten()
    {
        $data = [
            'bar' => 'foo',
            'stats' => [
                'boo' => [
                    'zoo' => false
                ],
                'lol' => true
            ]
        ];
        $this->assertEquals(
            [
                'bar' => 'foo',
                'stats.boo.zoo' => false,
                'stats.lol' => true
            ],
            array_dot_flatten($data)
        );
    }
}
