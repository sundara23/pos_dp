		</div>
		<!-- /page content -->

	</div>
	<!-- /page container -->

	<script src="http://code.jquery.com/ui/1.11.0/jquery-ui.js"></script>
	<script type="text/javascript">
		$(document).ready(function(){


			$('body').on("click",".btn-hide-alert",function(){						
				var alert = $(this).parent();
				$(alert).slideUp();	
			});

			$('body').on("click",".btn-delete",function(){
				var link = $(this).attr('id');
				$('.modal-delete').modal();
				$('.btn-delete-oke').click(function(){
					location.replace(link);
				});
			});


			$('.table-datatable').dataTable({
				// "bSort": false
			});	
			
			$('input[type="text"]').attr("autocomplete","off");

			$(".tanggal").datepicker({ dateFormat: 'yy-mm-dd'});
			
		});
	</script>
</body>
</html>
