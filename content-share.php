<?php
  $share_url   = get_permalink();
  $share_title = get_the_title();
?>
<div class="share">
	<h2 class="">Share Post</h2>
	<ul class="sns-share menu">
		
		<!--Shareボタン1--> 
		<li class="Facebook">
			<div class="shareaholic-canvas" data-app="share_buttons" data-app-id="28985675"></div>
		</li>
		
		<!--Twitter-->
		<li class="Twitter">
			<a href="http://twitcount.com/btn" class="twitcount-button" data-count="vertical" data-size="" data-url="" data-text="" data-related="" data-hashtag="" data-via="maetoato_web">TwitCount Button</a><script type="text/javascript" src="https://static1.twitcount.com/js/button.js"></script>
		</li>
		
		<!-- はてな -->
		<li class="hatena">
			<a href="//b.hatena.ne.jp/add?mode=confirm&url=<?=$share_url?>" onclick="javascript:window.open(this.href, '_blank', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=1000');return false;" title="はてなブックマークに登録"></a>
		</li>
	</ul>
</div>
	