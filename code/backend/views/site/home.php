<div id="home_toptip"></div>
<h2 class="h_a"><?= Yii::t('title', 'system_info');?></h2>
<div class="home_info">
	<ul>
		<li>
			<em>用户总数</em>
			<span><?= User::count() ?> 人</span>
		</li>
	</ul>
</div>
<h2 class="h_a"><?= Yii::t('title', 'support')?></h2>
<div class="home_info">
<a href="mailto:<?= Yii::t('title', 'support_mail')?>"><?= Yii::t('title', 'support_mail')?></a>
</div>
