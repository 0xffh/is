<div class='row margin-top30'>
    <div class='col-md-12'>
        <div class="dropdown">
            <?= $this->element('parts/language-select'); ?>
        </div>
    </div>
</div>

<div class='row'>
    <div class='col-md-8'>
        <h2>Добавить новый пункт меню</h2>
        <?php
            echo $this->Form->create('MenuItem', array('class' => 'form'));
            echo $this->Form->input('name', array('label' => 'Текст пунтка', 'div' => 'form-group', 'class' => 'form-control'));
            echo $this->Form->input('url', array('label' => 'URL', 'div' => 'form-group', 'class' => 'form-control'));            
            echo $this->Form->input('position', array('label' => 'Позиция', 'div' => 'form-group', 'class' => 'form-control', 'value' => 1));
            echo $this->Form->submit('Добавить', array('class' => 'btn btn-primary'));
            echo $this->Session->flash();
            echo $this->Form->end();
        ?>
    </div>
    <div class='col-md-4'>
        <h4 class='text-right'>Другие пункты</h4>
        <?php
            if(!empty($other_items)) {
                echo "<ul>";
                foreach($other_items as $index => $item) {                    
                    echo "<li>".$this->Html->link($item['MenuItem']['name'], '/admin/menu_items/edit/'.$item['MenuItem']['id']);
                    
                    if(!empty($item['SubItem'])) {
                        echo '
                            <button class="btn btn-default btn-xs dropdown-toggle" type="button" id="dropdown-menu-'.$index.'" data-toggle="dropdown">    
                                <span class="caret"></span>
                            </button>
                        ';
                        echo '<ul class="dropdown-menu" role="menu" aria-labelledby="dropdown-menu-'.$index.'">';
                        foreach($item['SubItem'] as $si) {
                            echo "<li>".$this->Html->link($si['name'], '/admin/menu_items/edit/'.$si['id'])."</li>";
                        }
                        echo "</ul>";
                    }
                    
                    echo "</li>";
                }
                echo "</ul>";
            }
        ?>
    </div>
</div>