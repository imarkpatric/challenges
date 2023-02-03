<?php
// class for Warehouse management
class Warehouse {
    // store the warehouse shelve information in form of 2D array
    private $array = [];
    // number of shelves in one warehouse
    private $shelf_per_warehouse = 8;
    // store steps of robot to perform the task
    private $steps = "Start at depot <br>";
    // keep track of number of items robot is carrying
    private $capacity = 0;
    // current row of robot
    private $curr_row = -1;
    // current column of robot
    private $curr_col = -1;
    // last row of robot
    private $last_row = -1;
    // last column of robot
    private $last_col = -1;
  
    // constructor to initialize warehouse array
    public function __construct() {
      // loop through 10 characters and 8 shelves to store information in array
      for ($char = ord('A'); $char <= ord('J'); $char++) {
        $warehouse = [];
        for ($j = 1; $j <= $this->shelf_per_warehouse; $j++) {
          array_push($warehouse, chr($char) . $j);
        }
  
        array_push($this->array, $warehouse);
      }
    }
  
    // function to process shelves based on items list
    public function processShelf($items) {
      // sort the items in order
      sort($items);
      // number of rows in warehouse
      $rows = count($this->array);
      // number of columns in warehouse
      $cols = count($this->array[0]);
  
      // loop through each item
      foreach ($items as $item) {
        // loop through rows and columns of warehouse
        for ($i = 0; $i < $rows; $i++) {
          for ($j = 0; $j < $cols; $j++) {
            // find the item position in warehouse
            if ($this->array[$i][$j] == $item) {
              $this->curr_row = $i;
              $this->curr_col = $j;
              $this->capacity += 1;
            }
          }
        }
  
        // find the difference between last and current row
        $row_diff = $this->last_row - $this->curr_row;
        // find the difference between last and current column
        $col_diff = $this->last_col - $this->curr_col;
  
        // if robot is carrying 4 items
        if ($this->capacity == 4) {
          $this->steps .= " drop off items at depot <br>";
          // reset capacity to 0
          $this->capacity = 0;
          // reset last position of robot to -1
          $this->last_row = -1;
          $this->last_col = -1;
        } else {
          // if difference between last and current column is greater than 0
          if ($col_diff >= 0) {
          }
  
          // if difference between last and current column is greater than 0
          if ($col_diff > 0) {
            $this->steps .= " Move down " . $col_diff . " steps ,";
        } elseif ($col_diff < 0) {
            // Move up if the difference between current column and last column is negative
            $this->steps .= " Move up " . abs($col_diff) . " steps , ";
          }
          
          if ($row_diff > 0) {
            // Move right if the difference between current row and last row is positive
            $this->steps .= " Move right " . $row_diff . " steps ,";
          } elseif ($row_diff < -1) {
            // Move left if the difference between current row and last row is negative
            $this->steps .= " Move left " . abs($row_diff) . " steps ";
          }
          
          // Add the item to steps
          $this->steps .= " get item from " . $item . "<br>";
          
          // Update the last row and last column
          $this->last_row = $this->curr_row;
          $this->last_col = $this->curr_col;
        }
      }
    }
  
    public function getSteps() {
        // Return the steps taken to process the items
        return $this->steps;
      }
  }

?>