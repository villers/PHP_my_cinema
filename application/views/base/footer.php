	<?php if($environment == 'development'): ?>
		<pre>debug:</pre>
		<pre><?php print_r($this); ?></pre>
	<?php endif; ?>

	<script>$base_url = "<?php echo $base_url ?>";</script>
	<script src="<?php echo $base_url.$assets ?>js/jquery-1.10.2.js"></script>
	<script src="<?php echo $base_url.$assets ?>js/bootstrap.min.js"></script>
	<script src="<?php echo $base_url.$assets ?>js/pace.min.js"></script>
	<script src="<?php echo $base_url.$assets ?>js/main.js"></script>
</body>

</html>
