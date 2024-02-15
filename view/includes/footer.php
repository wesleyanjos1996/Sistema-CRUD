<!--JavaScript at end of body for optimized loading-->
<script type="text/javascript" src="../../node_modules/materialize-css/dist/js/materialize.min.js"></script>
<script type="text/javascript">
	M.AutoInit()

	window.onload = function() {
		M.toast({html: '<?php echo $_SESSION['msg']; ?>'})
	}
</script>
</body>
</html>