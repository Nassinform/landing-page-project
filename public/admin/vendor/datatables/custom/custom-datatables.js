// Basic DataTable
$(function () {
	$("#basicExample").DataTable({
		lengthMenu: [
			[5, 10, 25, 50],
			[5, 10, 25, 50, "All"],
		],
		language: {
			lengthMenu: "Display _MENU_ Records Per Page",
			info: "Showing Page _PAGE_ of _PAGES_",
		},
	});
});


// Basic DataTable 2
$(function () {
	$("#basicExample2").DataTable({
		lengthMenu: [
			[5, 10, 25, 50],
			[5, 10, 25, 50, "All"],
		],
		language: {
			lengthMenu: "Display _MENU_ Records Per Page",
			info: "Showing Page _PAGE_ of _PAGES_",
		},
	});
});

// Vertical Scroll
$(function () {
	$("#scrollVertical").DataTable({
		scrollY: "207px",
		scrollCollapse: true,
		paging: false,
		bInfo: false,
	});
});

// Highlighting rows and columns
$(function () {
	$("#highlightRowColumn").DataTable({
		lengthMenu: [
			[5, 10, 25, 50],
			[5, 10, 25, 50, "All"],
		],
		language: {
			lengthMenu: "Display _MENU_ Records Per Page",
		},
	});
	var table = $("#highlightRowColumn").DataTable();
	$("#highlightRowColumn tbody").on("mouseenter", "td", function () {
		var colIdx = table.cell(this).index().column;
		$(table.cells().nodes()).removeClass("highlight");
		$(table.column(colIdx).nodes()).addClass("highlight");
	});
});

// Using API in callbacks
$(function () {
	$("#apiCallbacks").DataTable({
		lengthMenu: [
			[5, 10, 25, 50],
			[5, 10, 25, 50, "All"],
		],
		language: {
			lengthMenu: "Display _MENU_ Records Per Page",
		},
		initComplete: function () {
			var api = this.api();
			api.$("td").on("click", function () {
				api.search(this.innerHTML).draw();
			});
		},
	});
});

// Hiding Search and Show entries
$(function () {
	$("#hideSearchExample").DataTable({
		lengthMenu: [
			[5, 10, 25, 50],
			[5, 10, 25, 50, "All"],
		],
		searching: false,
		language: {
			lengthMenu: "Display _MENU_ Records Per Page",
			info: "Showing Page _PAGE_ of _PAGES_",
		},
	});
});

// Print Export Copy PDF Buttons
$(function () {
	$("#customButtons").DataTable({
		lengthMenu: [
			[5, 10, 25, 50],
			[5, 10, 25, 50, "All"],
		],
		dom: "Bfrtip",
		buttons: ["copy", "excel", "print"],
		language: {
			lengthMenu: "Afficher _MENU_ éléments",
			search: "Rechecher:",
			info: "Affichage de l'élement _PAGE_ à _PAGES_",
			paginate: {
				"first": "First",
				"last": "Last",
				"next": ">",
				"previous": "<"
			},
			zeroRecords: "Rien trouvé - désolé",
			infoEmpty: "Aucun enregistrement disponible",
			infoFiltered: "(filtré à partir de _MAX_ total des enregistrements)",
		},
		order: [[0, 'desc']],
		pdfMake: {
            defaultStyles: {
                font: "Arial Unicode MS" // Spécifiez la police arabe à utiliser
            }
        }
	});
});

// Toggle Buttons
$(function () {
	$("#toggleButtons").DataTable({
		lengthMenu: [
			[5, 10, 25, 50],
			[5, 10, 25, 50, "All"],
		],
		dom: "Bfrtip",
		buttons: ["columnsToggle"],
	});
});

// Space between buttons
$(function () {
	$("#spaceButtons").DataTable({
		lengthMenu: [
			[5, 10, 25, 50],
			[5, 10, 25, 50, "All"],
		],
		dom: "Bfrtip",
		buttons: [
			"copy",
			"print",
			{
				extend: "spacer",
				style: "bar",
				text: "Export Files",
			},
			"csv",
			"excel",
			"spacer",
			"pdf",
		],
	});
});
