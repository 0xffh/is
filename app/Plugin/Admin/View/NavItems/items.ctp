<div class='col-md-12'>
    <h3>Елементи меню</h3>
    <?php
        echo "<p>Меню: <strong>".$nav['Nav']['name']."</strong></p>";
    
        if(empty($items)) {
            echo "<p class='text-muted'>Поки нічого немає</p>";
        } else {
            echo "<ul>";
            foreach($items as $item) {
                $is_dropdown = !empty($item['SubItem']);                    
                
                echo "<li>".$this->Html->link($item['NavItem']['name'], '/admin/nav_items/edit/'.$item['NavItem']['id']);
                
                if($is_dropdown) {
                    echo "<ul>";
                    foreach($item['SubItem'] as $sub_item) {
                        $is_dropdown = !empty($sub_item['SubSubItem']);                            
                        
                        echo "<li>".$this->Html->link($sub_item['name'], '/admin/nav_items/edit/'.$sub_item['id']);
                        
                        if($is_dropdown) {
                            echo "<ul>";
                            foreach($sub_item['SubSubItem'] as $i) {
                                echo "<li>".$this->Html->link($i['name'], '/admin/nav_items/edit/'.$i['id']);
                            }
                            echo "</ul>";
                        }
                        
                        echo "</li>";
                    }
                    echo "</ul>";
                }
                
                echo "</li>";
            }
            echo "</ul>";
        }
    ?>
</div>