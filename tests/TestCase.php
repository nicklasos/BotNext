<?php
/**
 * Helpers for IDE
 */

/** @noinspection PhpMultipleClassesDeclarationsInOneFile */
/**
 * @method ObjectProphecy|mixed prophesize($classOrInterface = null)
 */
class TestCase extends PHPUnit_Framework_TestCase
{
}

/** @noinspection PhpMultipleClassesDeclarationsInOneFile */
/**
 * @method mixed reveal()
 */
class ObjectProphecy extends \Prophecy\Prophecy\ObjectProphecy
{
}
