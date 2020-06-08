<?php
  $share_url   = get_permalink();
  $share_title = get_the_title();
?>
<div class="share">

	<h2 class="">Share Post</h2>
	<ul class="sns-share menu">
	
	<!--Facebookボタン--> 
	<li class="facebook">
	  <a href="//www.facebook.com/sharer.php?src=bm&u=<?=$share_url?>&t=<?=$share_title?>" title="Facebookでシェア" onclick="javascript:window.open(this.href, '_blank', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=800,width=600');return false;"></a>
	</li>
	
	<!-- Twitter -->
	<li class="twitter">
	  <a href="//twitter.com/share?text=<?=$share_title?>&url=<?=$share_url?>&via=wemo_blog" title="Twitterでシェア" onclick="javascript:window.open(this.href, '_blank', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=400,width=600');return false;"></a>
	</li>
	
	<!-- はてな -->
	<li class="hatena">
	  <a href="//b.hatena.ne.jp/add?mode=confirm&url=<?=$share_url?>" onclick="javascript:window.open(this.href, '_blank', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=1000');return false;" title="はてなブックマークに登録"></a>
	</li>
	
	<!-- ポケット -->
	<li class="pocket">
	  <a href="//getpocket.com/edit?url=<?=$share_url?>&title=<?=$share_title?>" target="_blank" title="Pocketに保存する"></a>
	</li>
	
	</ul>

</div>
