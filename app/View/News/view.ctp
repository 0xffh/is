<div class="page-header">
	<h1><?= $page_title; ?></h1>
    <?php
        $date = new DateTime($news['News']['created']);
        $date_formatted = $date->format('d-m-Y');
    ?>
    <h5 class="text-muted"><?= $date_formatted; ?></h5>
</div>

<div class='pageContent page'>
    <?= $news['News']['content']; ?>
</div>