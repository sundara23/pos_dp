		</div>
		<!-- /page content -->

	</div>
	<!-- /page container -->


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

			
		
		});
	</script>
 </body>
</html>
