$('table.data-table').DataTable({
  paging: false,
  columnDefs: [{
    targets: 'no-sort',
    orderable: false
  }],
  dom: '<"row"<"col-sm-6"Bl><"col-sm-6"f>>' +
    '<"row"<"col-sm-12"<"table-responsive"tr>>>' +
    '<"row"<"col-sm-5"i><"col-sm-7"p>>',
  fixedHeader: {
    header: true
  },
  buttons: {
    buttons: [{
      extend: 'print',
      text: '<i class="fa fa-print"></i> Print',
      title: $('h1').text(),
      exportOptions: {
        columns: ':not(.no-print)'
      },
      footer: true,
      autoPrint: false
    }, {
      extend: 'pdf',
      text: '<i class="fa fa-file-pdf-o"></i> PDF',
      title: $('h1').text(),
      exportOptions: {
        columns: ':not(.no-print)'
      },
      footer: true
    }],
    dom: {
      container: {
        className: 'dt-buttons'
      },
      button: {
        className: 'btn btn-default'
      }
    }
  }
});
