<div class="col-md-10">
	<article>
		<h1><?=$topic->title?></h1>
		<div>
			<div>
				<!-- <?=date('o년 n월 j일, G시 i분 s초', $topic->created)?> -->
				<?=kdate($topic->created)?>
			</div>
			<?=$topic->description?>
		</div>
	</article>
	<div>

		<form action="/topic/delete" method="post">
			<input type="hidden" class="btn btn-default" name="topic_id" value="<?=$topic->id?>" />
			<a class="btn btn-default" href="/topic/add" role="button">추가</a>
			<input type="submit" class="btn btn-default" value="삭제" />
		</form>

	</div>
</div>