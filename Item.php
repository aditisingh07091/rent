<?php
include 'dbconn.php';
include('header.php');
?>

<!DOCTYPE php>
<php lang="en">

	<head>
		<style>
			#tabedit {
				overflow-y: scroll;
				height: 420px;
				margin-top: 15px;
				overflow-x: scroll;
			}


			.tbhead {
				width: 80px;
				font-size: 18px;

			}

			#main {


				padding-top: 50px;
				padding-right: 20px;

			}

			.btnedit {
				color: white;
				background-color: #07103eee;
				margin-left: 410px;
			}
		</style>

	</head>

	<body>


		
			

			<div class="page-wrapper">
				<div class="container-fluid">
					<div class="row" id="main">
						<div class="col-md-6 col-sm-6 col-xs-6 coledit">
							<h3>Items List</h3>
						</div>

					</div>

					<!-- <div class="row">
						<div class="col-md-6 col-sm-6 col-xs-6 coledit">
							<div class="form-group">
								<div class="input-group">
									<input type="text" class="form-control" id="searchInput" placeholder="Search...">
									<span class="input-group-addon"><i class="glyphicon glyphicon-search"></i></span>
								</div>
							</div>
						</div>
					</div> -->

					<div class="row">
						<div class="col-md-6 col-sm-6 col-xs-6 coledit">
							<div class="form-group">
								<div class="input-group">

									<select type="search" class="form-control select-table-filter"
										data-table="order-table">
										<option value="">Item Type</option>
										<?php
										// Populate dropdown with unique item types from database
										$sql = "SELECT DISTINCT item_type FROM items";
										$result = mysqli_query($mysqli, $sql);
										while ($row = mysqli_fetch_assoc($result)) {
											echo "<option value='" . $row['item_type'] . "'>" . $row['item_type'] . "</option>";
										}
										?>

										<select>





								</div>

							</div>
						</div>

						<div class="col-md-6 col-sm-6 col-xs-6 coledit">

							<input type="search" class="form-control light-table-filter" data-table="order-table"
								placeholder="Search" />
								

						</div>
					</div>


					<div id="tabedit" class="table-responsive">
						<table class="table table-bordered table-striped order-table" id="details-table">
							<!-- Add the 'table-bordered' and 'table-striped' classes for styling -->
							<thead style="position:sticky;top: 0;background-color:#283866; color:white;">
								<tr>
									<th>S.No.</th>
									<th>Item Id</th>
									<th>Item Type</th>
									<th>Item Name</th>

									<th>Actions</th>
								</tr>
							</thead>

							<tbody>
								<?php
								$sql = "SELECT * FROM items";
								$result = mysqli_query($mysqli, $sql);
								$serial = 0;
								while ($row = mysqli_fetch_assoc($result)) {
									$serial++;
									$per = $row['permission'];
									if ($per = '1') {
										$permission = "Allowed";
									} else {
										$permission = "Declined";
									}
									?>
									<tr>
										<td>
											<?php echo $serial; ?>
										</td>
										<td>
											<?php echo $row['item_id']; ?>
										</td>
										<td>
											<?php echo $row['item_type']; ?>
										</td>
										<td>
											<?php echo $row['Item_name']; ?>
										</td>





										<td>
											<a href="EditItem.php?id=<?php echo $row['item_id']; ?>" class="text-info">
												<i class="glyphicon glyphicon-edit"></i>
											</a>&nbsp;
											<a href="#" class="text-info delete-row" data-toggle="modal"
												data-target="#deleteModal">
												<i class="glyphicon glyphicon-trash"></i>
											</a>&nbsp;
											<a href="view_item.php?id=<?php echo $row['user_id'] ?>" class="text-info"><i
													class="glyphicon glyphicon-eye-open"></i></a>
										</td>

									</tr>


								<?php } ?>
							</tbody>

						</table>

						<!-- Delete Modal -->
						<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog"
							aria-labelledby="deleteModalLabel">
							<div class="modal-dialog" role="document">
								<div class="modal-content">
									<div class="modal-header">
										<h4 class="modal-title" id="deleteModalLabel">Delete Item</h4>
										<button type="button" class="close" data-dismiss="modal"
											aria-label="Close"><span aria-hidden="true">&times;</span></button>
									</div>
									<div class="modal-body">
										<p>Are you sure you want to delete this item?</p>
									</div>
									<div class="modal-footer">
										<button type="button" class="btn btn-default btnedit" data-dismiss="modal"></i>
											No</button>
										<button type="button" class="btn btn-default btnedit">
											Yes</button>
									</div>
								</div>
							</div>
						</div>

					</div>
				</div>
			</div>

		</div>


		<!-- <script>
			$(document).ready(function () {
				$('#searchInput').keyup(function () {
					var searchText = $(this).val().toLowerCase();
					// Loop through all table rows
					$('tbody tr').each(function () {
						var rowData = $(this).text().toLowerCase();
						if (rowData.indexOf(searchText) == -1) {
							$(this).hide();
						} else {
							$(this).show();
						}
					});
				});
			});
		</script> -->



		<!-- <script>
			$(document).ready(function () {
				const itemTypeDropdown = $('#item-type-dropdown');
				const detailsTable = $('#details-table');

				itemTypeDropdown.on('change', function () {
					const selectedType = itemTypeDropdown.val();
					// show/hide table rows based on selected type
					detailsTable.find('tbody tr').each(function () {
						const rowType = $(this).find('td:eq(2)').text();
						if (selectedType === '' || selectedType === rowType) {
							$(this).show();
						} else {
							$(this).hide();
						}
					});
				});
			});

		</script> -->

		<script>
			(function (document) {
				'use strict';

				var LightTableFilter = (function (Arr) {

					var _input;
					var _select;

					function _onInputEvent(e) {
						_input = e.target;
						var tables = document.getElementsByClassName(_input.getAttribute('data-table'));
						Arr.forEach.call(tables, function (table) {
							Arr.forEach.call(table.tBodies, function (tbody) {
								Arr.forEach.call(tbody.rows, _filter);
							});
						});
					}

					function _onSelectEvent(e) {
						_select = e.target;
						var tables = document.getElementsByClassName(_select.getAttribute('data-table'));
						Arr.forEach.call(tables, function (table) {
							Arr.forEach.call(table.tBodies, function (tbody) {
								Arr.forEach.call(tbody.rows, _filterSelect);
							});
						});
					}

					function _filter(row) {

						var text = row.textContent.toLowerCase(), val = _input.value.toLowerCase();
						row.style.display = text.indexOf(val) === -1 ? 'none' : 'table-row';

					}

					function _filterSelect(row) {

						var text_select = row.textContent.toLowerCase(), val_select = _select.options[_select.selectedIndex].value.toLowerCase();
						row.style.display = text_select.indexOf(val_select) === -1 ? 'none' : 'table-row';

					}

					return {
						init: function () {
							var inputs = document.getElementsByClassName('light-table-filter');
							var selects = document.getElementsByClassName('select-table-filter');
							Arr.forEach.call(inputs, function (input) {
								input.oninput = _onInputEvent;
							});
							Arr.forEach.call(selects, function (select) {
								select.onchange = _onSelectEvent;
							});
						}
					};
				})(Array.prototype);

				document.addEventListener('readystatechange', function () {
					if (document.readyState === 'complete') {
						LightTableFilter.init();
					}
				});

			})(document);
		</script>




		<!-- jQuery -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
		<!-- Bootstrap JavaScript -->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	</body>
</php>