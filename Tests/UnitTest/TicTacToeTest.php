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

        $grid->doMove($row, $column, Cell::O);

        $this->assertFalse($grid->isEmpty());
    }

    /**
     * @test
     */
    public function cell_filled_with_given_value()
    {
        $grid = new Grid();

        $row = 0;
        $column = 0;
        $value = Cell::O;

        $expectedCell = $this->getValuedCell($row, $column, $value);

        $grid->doMove($row, $column, $value);

        $cell = $grid->getCell($row,$column);

        $this->assertEquals($expectedCell,$cell);

        $this->assertTrue($cell->isCellType($value));
    }

    // ======================== Helpers =========================

    /**
     * @param $row
     * @param $column
     * @param $value
     *
     * @return Cell
     */
    private function getValuedCell($row, $column, $value): Cell
    {
        $expectedCell = new Cell($row, $column);
        $expectedCell->setValue($value);

        return $expectedCell;
    }
}