<?php


namespace Tests\Unit;


use DeBandai\Cell;
use DeBandai\Grid;

class TicTacToeTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @test
     */
    public function grid_is_empty()
    {
        $grid = new Grid();
        $this->assertTrue($grid->isEmpty());
    }

    /**
     * @test
     */
    public function grid_not_empty_after_move()
    {
        $grid = new Grid();

        $row = 0;
        $column = 0;

        $grid->fillCell($row, $column, Cell::O);

        $this->assertFalse($grid->isEmpty());
    }

    /**
     * @test
     */
    public function given_a_cell_after_place_them_at_the_board_the_value_is_still_correct()
    {
        $grid = new Grid();

        $row = 0;
        $column = 0;
        $value = Cell::O;

        $expectedCell = Cell::init($row, $column, $value);

        $grid->fillCell($row, $column, $value);

        $cell = $grid->getCell($row,$column);

        $this->assertEquals($expectedCell,$cell);

        $this->assertTrue($cell->isCellType($value));
    }

    /**
     * @test
     */
    public function given_a_cell_try_to_place_them_on_an_invalid_position()
    {
        $grid = new Grid();

        $row = 10;
        $column = 10;
        $value = Cell::X;

        $expectedCell = Cell::init($row, $column, $value);

        $grid->fillCell($row, $column, $value);

        $cell = $grid->getCell($row,$column);

        $this->assertNotEquals($expectedCell, null);

        $this->assertNull($cell);
    }

    // ======================== Helpers =========================
}