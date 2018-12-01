<?php echo $header; ?>
<div class="container">
<div>
	<!-- Featured posts by users or administrators.-->
	<?php if(isset($boardlinks)&& !empty($boardlinks)):?>
	<ul>
		<?php foreach($boardlinks as $theboard): ?>
			<li><a href="<?= site_url(array('board/view',$theboard['id']))?>"><?= $theboard["boardname"]?></a></li>
		<?php endforeach; ?>
	</ul>
	<?php else: ?>
		<div>No Featured Posts.</div>
	<?php endif; ?>
</div>
<div>
	<!-- Featured posts by users or administrators.-->
	<?php if(isset($featuredposts)&& !empty($featuredposts)):?>
		<?php foreach($featuredposts as $thepost): ?>
			<div class='span-4'><a href="<?= site_url(array('topic/view',$thepost['id']))?>"><h3><?= $thepost["title"]?> </h3></a><p><?= $thepost["slug"] ?></p></div>
		<?php endforeach; ?>
	<?php else: ?>
		<div>No Featured Posts.</div>
	<?php endif; ?>
</div>
<div>
	<!--Adverts created by forum members -->
	<?php if(isset($bannerads)&& !empty($bannerads)):?>
		<?php foreach($bannerads as $advert): ?>
			<div class='span-4'><a href="<?= $advert['advertimagelink']?>"><img src="<?= $advert['advertimageloc']?>" alt="ad image"/> <?= $thepost["title"]?> </a></div>			</div>
		<?php endforeach; ?>
	<?php else: ?>
		<div>Book this space.</div>
	<?php endif; ?>
</div>
</div>
<?php echo $footer; ?>