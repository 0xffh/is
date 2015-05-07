<ul class='pager'>
    <?php
        if($this->Paginator->hasPrev()) echo "<li>".$this->Paginator->prev('<<', array('tag' => false))."</li>";
        if($this->Paginator->hasNext()) echo "<li>".$this->Paginator->next('>>', array('tag' => false))."</li>";        
    ?>
</ul>