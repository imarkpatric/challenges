        <?php
            class Warehouse {
                // Number of warehouses
                private $warehouse_count = 1;
                // Number of shelves per warehouse
                private $shelf_per_warehouse = 8;
                // Total number of shelves
                private $all_shelf_count = 0;
                // Collection of shelves
                private $shelf_collection = array();
                // Sign of the number
                private $num = 'positive';

                public function display() {
                    for ($char = ord('A'); $char <= ord('J'); $char++):
                        $warehouse_name = chr($char);
                        $this->warehouse_count++;
                        ?>
                        <div class="col <?php $char % 2 == 0 ? '' : print('mr') ?>">
                            <?php
                                for ($j = $this->shelf_per_warehouse; $j >= 1; $j--):
                                    $this->all_shelf_count++ ?>
                                    <?php $this->shelf_collection[] = '<div class="col-1"><button class="shelf">' . $warehouse_name . $j . '</button></div>'; ?>
                                <?php endfor ?>
                                <?php if ($char % 2 > 0) {
                                    // $this->shelf_collection = array_reverse($this->shelf_collection);
                                }
                                foreach ($this->shelf_collection as $key => $value) {
                                    echo $value;
                                }
                                $this->shelf_collection = [];
                                ?>
                        </div>
                    <?php endfor ?>
              <?php  
              }
            }
?>