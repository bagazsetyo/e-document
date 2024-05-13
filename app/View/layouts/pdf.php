<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>
        <?= isset($title) ? $title : 'Dashboard' ?>
    </title>

    <style>
        * {
            font-family: Arial, sans-serif;
        }

        .table {
            width: 100%;
            margin-bottom: 1rem;
            color: #212529;
            border-collapse: collapse;
        }

        .table th {
            vertical-align: bottom;
            border-bottom: 2px solid #dee2e6;
            padding: 0.75rem;
            vertical-align: top;
            border: 1px solid #dee2e6;
            text-align: center;
            background-color: #d3d3d3;
        }

        .table td {
            padding: 0.75rem;
            vertical-align: top;
            border: 1px solid #dee2e6;
            text-align: center;
        }
    </style>
    <script src="/assets/modules/jquery.min.js"></script>
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.2/jspdf.debug.js"></script> -->
</head>

<body>
    <div id="content" style="padding: 10px;">
        <head>
            <div style="display: flex; justify-content: center; align-items: center; gap: 20px;">
                <div>
                    <img src="<?= $setting->logo ?>" style="width: 150px; height: auto;" alt="">
                </div>
                <div>
                    <h2>
                        <?= $setting->nama ?>
                    </h2>
                    <p>
                        <?= $setting->alamat ?> <br>
                        <?= $setting->telepon ?>, <?= $setting->email ?>
                    </p>
                </div>
            </div>
        </head>
        <br>
        <?php echo isset($content) ? $content : ''; ?>
    </div>
    <div id="page"></div>
    <!-- <button id="submit">Export to PDF</button> -->

    <script>
        // var doc = new jsPDF();
        // var specialElementHandlers = {
        //     '#editor': function(element, renderer) {
        //         return true;
        //     }
        // };
        // $('#submit').click(function() {
        //     // padding 10 on all side of the page, and width 100%
        //     doc.fromHTML($('#content').html(), 10, 10, {
        //         'width': 100,
        //         'elementHandlers': specialElementHandlers
        //     });
        //     doc.save('sample-file.pdf');
        // });
    </script>
</body>

</html>