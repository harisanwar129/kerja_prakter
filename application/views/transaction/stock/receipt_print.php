<!DOCTYPE html>
<html>

<head>
    <strong>
        <p style="margin-bottom: 15px;font-size:30px;text-align:center;"> Toko Bangunan Satria Jaya</p>
    </strong>
    <p style="text-align: center;">Jln. Aria Wiratanudatar Kampung Sindanglaka Kabupaten Cianjur</p>

    <hr>
    <p style="margin-left:65%">Cianjur <?php echo format_indo(date('Y-m-d')); ?>
    </p>
    <p style="margin-left:55px;font-size:20px">Laporan Persediaan Barang</p>


    <style type="text/css">
        #outtable {
            padding: 20px;
            border: 1px solid #e3e3e3;
            width: 600px;
            border-radius: 5px;
            margin-left: 50px;
            font-size: 15px;
            padding: 5px;
        }

        .short {
            width: 50px;
        }

        .normal {
            width: 150px;
        }

        table {
            border-collapse: collapse;
            font-family: arial;
            color: #5E5B5C;
            text-align: center;

        }

        thead th {
            text-align: left;
            padding: 10px;
        }

        tbody td {
            border-top: 1px solid #e3e3e3;
            padding: 10px;

        }

        tbody tr:nth-child(even) {
            background: #F6F5FA;
        }

        tbody tr:hover {
            background: #EAE9F5
        }
    </style>
</head>

<body onload="window.print()">
    <div id="outtable">
        <table>
            <thead>
                <tr>
                    <th class="short">No</th>
                    <th class="normal">Nama Barang</th>
                    <th class="normal">Satuan</th>
                    <th class="normal">Kategori</th>
                    <th class="normal">Harga</th>
                    <th class="normal">Stock</th>
                </tr>
            </thead>
            <tbody>



                <?php
                $no = 1;
                foreach ($stock as $s) : ?>
                    <tr>
                        <td><?= $no++ ?></td>
                        <td><?= $s->name ?></td>
                        <td><?= $s->uname ?></td>
                        <td><?= $s->cname ?></td>
                        <td><?= $s->price ?></td>
                        <td><?= $s->stock ?></td>


                    </tr>
                    <?php  ?>
                <?php endforeach; ?>



            </tbody>

        </table>

    </div>
</body>

</html>