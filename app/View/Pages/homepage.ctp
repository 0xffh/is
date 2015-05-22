<div class='page-header margin-top0'>
	<h2>Новини</h2>
</div>

<div class='pageContent page'>
	<?php
		if(empty($news)) {
			echo $this->element('parts/nothing');
		} else {
			foreach($news as $item) {
                $date = new DateTime($item['News']['created']);
                $date_formatted = $date->format('d-m-Y');
				echo '
					<div class="list-group">
						<a href="/news/view/'.$item['News']['slug'].'" class="list-group-item">
							<p><span class="small text-muted">'.$date_formatted.'</span> '.$item['News']['title'].'</p>
							<p class="list-group-item-text">'.$item['News']['description'].'</p>
						</a>
					</div>
				';
			}
			echo $this->element('parts/pagination');
		}
	?>
</div>