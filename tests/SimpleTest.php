<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;

class SimpleTest extends TestCase
{
  public function test_it_should_assert_true(): void
  {
    self::assertEquals(1, 1);
  }
}