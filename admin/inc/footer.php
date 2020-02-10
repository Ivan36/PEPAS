</div>
<footer class="main-footer fixed">
    <div class="pull-right hidden-xs">
        <a target="_blank" href="https://www.facebook.com/empower youth in technology"><i class="fa fa-facebook"></i></a>&nbsp;&nbsp;
        <a target="_blank" href="https://www.twiter.com/@eyitug"><i class="fa fa-twitter-square"></i></a>&nbsp;&nbsp;
        <a target="_blank" href="http://yitug.org/"><i class="fa fa-internet-explorer"></i></a>&nbsp;&nbsp;
        <a target="_blank" href="https://www.instagram.com"><i class="fa fa-instagram"></i></a>&nbsp;&nbsp;
        <b>Version</b> 1.0
    </div>
    <strong>Copyright &copy;
        <!--    <?php
                // $year = date("Y");
                // $py = intval($year-1);
                //echo $year;
        ?> -->
        <?php
        $copyYear = 2018; // Set your website start date
        $curYear = date('Y'); // Keeps the second year updated
        echo $copyYear . (($copyYear != $curYear) ? '-' . $curYear : '');
        ?>
        <a target="_blank" href="https://www.facebook.com/mamunur.roshid.31924"> Ivan, </a>
        <a target="_blank" href="https://www.facebook.com/abuhasan.shadhin">Eyit, </a>
        <a target="_blank" href="https://www.facebook.com/profile.php?id=100009524803869"> </a>.
    </strong> All rights reserved.
</footer>

</div><!-- ./wrapper -->

<!-- jQuery 2.1.3 -->
<script src="http://code.jquery.com/ui/1.11.2/jquery-ui.min.js" type="text/javascript"></script>
<script src="js/jquery-ui.min.js" type="text/javascript"></script>
<script>
    $.widget.bridge('uibutton', $.ui.button);
</script>

<script src="http://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<script src="js/raphael-min.js"></script>
<script src="assets/dist/js/pages/dashboard.js" type="text/javascript"></script>

<!-- jQuery 2.1.3 -->
<script src="assets/assets/js/jquery.js"></script>
<!-- Bootstrap 3.3.2 JS -->
<script src="assets/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>

<!-- DATA TABES SCRIPT -->
<script src="plugins/datatables/jquery.dataTables.js" type="text/javascript"></script>
<script src="plugins/datatables/dataTables.bootstrap.js" type="text/javascript"></script>
<!-- AdminLTE App -->
<script src="assets/dist/js/app.min.js" type="text/javascript"></script>
<script type="text/javascript" src="chart-js/js/loader.js"></script>
<script type="text/javascript" src="chart-js/js/Chart.min.js"></script>
<script type="text/javascript" src="chart-js/js/canvasjs.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="assets/assets/js/jquery-ui.min.js"></script>
<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<script src="vendor/DataTables/jquery.dataTables.min.js" type="text/javascript"></script>
<script src="js/jquery-1.12.4.js"></script>
<script src="js/jquery.dataTables.min.js"></script>
<script src="js/dataTables.bootstrap.min.js"></script>
<!-- <script src="js/bootstrap-datepicker.js"></script> -->
<script type="text/javascript" src="vendor/datatable/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="vendor/datatable/js/dataTables.buttons.min.js"></script>
<script type="text/javascript" src="vendor/datatable/js/buttons.print.min.js"></script>
<script type="text/javascript" src="vendor/datatable/js/buttons.colVis.min.js"></script>
<script type="text/javascript" src="vendor/datatable/js/buttons.flash.min.js"></script>
<script type="text/javascript" src="vendor/datatable/js/buttons.html5.min.js"></script>
<script type="text/javascript" src="vendor/datatable/js/jszip.min.js"></script>
<script type="text/javascript" src="vendor/datatable/js/pdfmake.min.js"></script>
<script type="text/javascript" src="vendor/datatable/js/vfs_fonts.js"></script>
<script type="text/javascript" src="vendor/datatable/js/dataTables.select.min.js"></script>
<script type="text/javascript">
    $(function() {
        $("#example1").dataTable();
        $("#example2").dataTable();
        $('#example3').dataTable({
            "bPaginate": true,
            "bLengthChange": false,
            "bFilter": false,
            "bSort": true,
            "bInfo": true,
            "bAutoWidth": false

        });
    });
</script>
<script type="text/javascript">
    $(document).ready(function() {
        $('#example').DataTable({
            retrieve: true,
            "scrollX": false,
            scrollY: 600,
            "scrollCollapse": true,
            paging: true,
            dom: 'lBfrtip<"actions">',
            "aaSorting": [],
            buttons: [{
                extend: 'csv',
                text: window.csvButtonTrans,
                exportOptions: {
                    columns: ':visible'
                }
            },
            {
                extend: 'excel',
                text: window.excelButtonTrans,
                exportOptions: {
                    columns: ':visible'
                }
            },
            {
                extend: 'pdf',
                text: window.pdfButtonTrans,
                exportOptions: {
                    columns: ':visible'
                }
            },

                // {
                //     extend: 'colvis',
                //     text: window.colvisButtonTrans,
                //     exportOptions: {
                //         columns: ':visible'
                //     }
                // },
                // {
                //     extend: 'print',
                //     text: 'Print selected'
                // },
                // {
                //     extend: 'print',
                //     text: 'Print',
                //     exportOptions: {
                //         modifier: {
                //             selected: null
                //         }
                //     }
                // },
                {
                    extend: 'print',
                    text: 'Print',
                    customize: function(win) {
                        $(win.document.body)
                        .css('font-size', '10pt')
                        .prepend(

                            );

                        $(win.document.body).find('table')
                        .addClass('compact')
                        .css('font-size', 'inherit');
                    }
                },
                ],
                select: false,
                initComplete: function() {



                    this.api().columns().every(function() {
                        var column = this;

                        if (column.index() == -1) {

                            input = $('<input type="text" />').appendTo($(column.header())).on('keyup change', function() {
                                if (column.search() !== this.value) {
                                    column.search(this.value)
                                    .draw();
                                }
                            });
                            return;
                        }

                        var select = $('<select><option value=""> filter</option></select>')
                        .appendTo($("#filters").find("th").eq(column.index()))
                        .on('change', function() {
                            var val = $.fn.dataTable.util.escapeRegex(
                                $(this).val());

                            column.search(val ? '^' + val + '$' : '', true, false)
                            .draw();
                        });

                        console.log(select);

                        column.data().unique().sort().each(function(d, j) {
                            select.append('<option value="' + d + '">' + d + '</option>')
                        });
                    });
                }
            });
        console.log();
    });
</script>
<script>
    //paste this code under head tag or in a seperate js file.
    // Wait for window load
    $(window).load(function() {
        // Animate loader off screen
        $(".se-pre-con").fadeOut("slow");;
    });
</script>

<script>
    // AJAX code to check input field values when onblur event triggerd.
    function validate(field, query) {
        var xmlhttp;
        if (window.XMLHttpRequest) { // for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else { // for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById(field).innerHTML = xmlhttp.responseText;
            }
        }
        xmlhttp.open("GET", "lib/validation.php?field=" + field + "&query=" + query, false);
        xmlhttp.send();
    }
</script>
<script type="text/javascript">
    var chart = new CanvasJS.Chart("chartContainer", {
        animationEnabled: true,
        exportEnabled: true,
        title: {
            text: "Sub County Results division 1 (%)"
        },
        subtitles: [{
            text: ""
        }],
        data: [{
            type: "pie",
            showInLegend: "true",
            legendText: "{label}",
            indexLabelFontSize: 16,
            indexLabel: "{label} - #percent%",
            yValueFormatString: "#,##0",
            dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
        }]
    });

    chart.render();
</script>

<script type="text/javascript">
    $(function () {
        $("#btnPrint").click(function () {
            var contents = $("#dvContents").html();
            var frame1 = $('<iframe />');
            frame1[0].name = "frame1";
            frame1.css({ "position": "absolute", "top": "-1000000px" });
            $("body").append(frame1);
            var frameDoc = frame1[0].contentWindow ? frame1[0].contentWindow : frame1[0].contentDocument.document ? frame1[0].contentDocument.document : frame1[0].contentDocument;
            frameDoc.document.open();
                //Create a new HTML document.
                frameDoc.document.write('<html><head><title>DIV Contents</title>');
                frameDoc.document.write('</head><body>');
                //Append the external CSS file.
                frameDoc.document.write('<link href="style.css" rel="stylesheet" type="text/css" />');
                //Append the DIV contents.
                frameDoc.document.write(contents);
                frameDoc.document.write('</body></html>');
                frameDoc.document.close();
                setTimeout(function () {
                    window.frames["frame1"].focus();
                    window.frames["frame1"].print();
                    frame1.remove();
                }, 500);
            });
    });
</script>

</body>

</html>