$(function () {
	// alert('fg')

	// $('#vehicle_table').DataTable({
	// 	processing: true,
	// 	serverSide: true,
	// 	ajax: '/company/vehicles/json',
	// 	columns: [
	// 		{ data: 'id', name: 'id' },
	// 		{ data: 'type', name: 'type' },
	// 		// { data: 'email', name: 'email' }
	// 	]
	// });




	// var datatable = new DataTable("#vehicle_table", {
	// 	processing: true,
	// 	serverSide: true,
	// 	ajax: {
	// 		url: '/company/vehicles/json',
	// 		type: 'json'
	// 	},
	// 	columns: [
	// 		{ data: 'model', name: 'model' },
	// 		{ data: 'registration_number', name: 'registration_number' },
	// 	],

	// plugins: {
	// 	editable: {
	// 		enabled: true,
	// 		contextMenu: true,
	// 		hiddenColumns: true,
	// 	}
	// },
	// });
});

// $(function () {
// 	$('#vehicle_table').DataTable({
// 		processing: true,
// 		serverSide: true,
// 		ajax: {
// 			url: '/company/vehicles/json',
// 			type: 'json'
// 		},

// 	})

// });

// document.querySelector('#vehicle_table tbody').addEventListener('blur', async function (e) {
// 	// alert('herh')
// 	const cell = e.target.closest('td');
// 	if (!cell || !cell.isContentEditable) return;

// 	cell.contentEditable = false;
// 	const newValue = cell.textContent.trim();
// 	const row = cell.closest('tr');
// 	const rowData = table.data[row.rowIndex - 1]; // Adjust for header row
// 	const columnName = table.columns[cell.cellIndex].data;

// 	// // Update row data
// 	// rowData[columnName] = newValue;

// 	// // Send update to backend
// 	// try {
// 	//     const response = await fetch(`/api/vehicles/${rowData.id}`, {
// 	//         method: 'PUT',
// 	//         headers: { 'Content-Type': 'application/json' },
// 	//         body: JSON.stringify({ [columnName]: newValue })
// 	//     });

// 	//     if (response.ok) {
// 	//         // Fire custom event
// 	//         const editEvent = new CustomEvent('vehicleRowEdited', {
// 	//             detail: {
// 	//                 id: rowData.id,
// 	//                 column: columnName,
// 	//                 newValue: newValue,
// 	//                 rowData: rowData
// 	//             }
// 	//         });
// 	//         document.dispatchEvent(editEvent);
// 	//         console.log(`Vehicle ${rowData.id} edited: ${columnName} = ${newValue}`);
// 	//     } else {
// 	//         console.error('Failed to update vehicle');
// 	//         cell.textContent = rowData[columnName]; // Revert on failure
// 	//     }
// 	// } catch (error) {
// 	//     console.error('Error:', error);
// 	//     cell.textContent = rowData[columnName]; // Revert on error
// 	// }
// }, true)

