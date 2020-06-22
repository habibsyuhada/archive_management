        <footer class="footer text-center">
	        <strong>Copyright &copy; 2020 <a href="#">Pemasaran</a>.</strong>
	      </footer>

	    </div>
	  </div>

	  <script type="text/javascript">
	  	$('.datatables').DataTable();
	  	$('.mydatepicker').datepicker({
        autoclose: true,
        format: 'yyyy-mm-dd',
        endDate: Infinity,
        orientation: 'bottom'
      });

			<?php
				if(isset($_SESSION['danger'])){
					echo "alert('Error: ".$_SESSION['danger']."')";
					unset($_SESSION['danger']);
				}
				elseif(isset($_SESSION['success'])){
					echo "alert('".$_SESSION['success']."')";
					unset($_SESSION['success']);
				}
			?>
	  </script>
	</body>

</html>