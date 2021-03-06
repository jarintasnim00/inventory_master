<script type="text/javascript">
    function PrintDivold() {
        var divToPrint = document.getElementById('printableArea');
        var popupWin = window.open('', '_blank', 'width=300,height=300');
        popupWin.document.open();
        popupWin.document.write('<html><body onload="window.print()">' + divToPrint.innerHTML + '</html>');
        popupWin.document.close();
    }

    function PrintDivold(printableArea) {


        //$('#dataTables-example').attr('id','none');
        var printContents = document.getElementById('printableArea').innerHTML;
        var originalContents = document.body.innerHTML;
        document.body.innerHTML = printContents;
        window.print();
        //$('table').attr('id','dataTables-example');
        location.reload(document.body.innerHTML = originalContents);
        //document.body.innerHTML = originalContents;
    }


    function PrintDiv() {
        var divToPrint = document.getElementById('printableArea');

        var popupWin = window.open('', '_blank', 'width=750,height=600');
        popupWin.document.open();
        popupWin.document.write('<html><head>');
        popupWin.document.write('<html><style type="text/css" media="print">@page { size:4.5in 11in; margin: 2cm; width: 25mm;height: 97mm;  #invoice h1 {font-size: 6.0em; color: red;} }</style><body onload="window.print()">' + divToPrint.innerHTML + '</body></html>');
        popupWin.document.close();
    }
</script>


    <section class="invoice">


                <!-- title row -->
                <div class="row">
                    <div class="col-xs-12">
                        <h2 class="page-header">
                            <i class="fa fa-globe"></i> Brothers Enterprise
                            <small class="pull-right">Chunkutia(West Para) Bow Bazar, Shubaddya South Keranigonj, Dhaka-1310</small>
                        </h2>
                    </div>
                    <!-- /.col -->
                </div>
                <!-- info row -->
                <div class="row invoice-info">
                    <div class="col-sm-4 invoice-col">
                        Customer
                        <address>
                            Name:<strong><?=$amount->customer_name;?></strong><br>
                            Address:<?=$amount->address;?><br>
                            Phone: <?=$amount->phone_no;?><br>
                            Email: <?=$amount->email;?>
                        </address>
                        
                      
                    </div>
                    <!-- /.col -->
                    <div class="col-sm-4 invoice-col">
                         <!--From
                        <address>
                            <strong><?=$amount->company_name;?></strong><br>
                           <?=$amount->address;?><br>
                            Phone: <?=$amount->phone_no;?><br>
                            Email: <?=$amount->email;?>
                              </address>-->
                    </div>
                    <!-- /.col -->
                    <div class="col-sm-4 invoice-col">
                        <b>Invoice code:<?=$amount->invoice_no;?></b><br>
                       
                         <div class="date">Date of
                                    Sales: <?php echo date('M d,Y',strtotime($amount->sales_date)); ?></div>
                       <div class="date">Invoice Status <?php if ($amount->balance != 0.00) { ?>
                                        <span
                                            class="badge bg-important"><?= $amount->balance; ?></span><?php } ?> <?php if ($amount->balance == 0.00) {
                                        echo "<span class='label label-primary'>PAID</span>";
                                    } else {
                                        echo "<span class='label label-warning'>NOT PAID</span>";
                                    }
                                    ?></div>
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->

                <!-- Table row -->
                <div class="row">
                    <div class="col-xs-12 table-responsive">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th>Serial #</th>
                                <th>Product</th>
                                <th>Qty</th>
                                <th>Price</th>
                                <th>Subtotal</th>
                             
                            </tr>
                            </thead>
                            <tbody>
                            <?php $i=1;foreach ($salesHist as $item) : ?>
                                <tr>
                                    <td><?=$i;?></td>
                                    <td><?=$item->item_name;?></td>
                                    <td><?=$item->sales_qty;?></td>
                                    <td><?=$item->sales_rate;?></td>
                                    <td><?=$item->sales_amount;?></td>

                                </tr>
                                <?php $i++; endforeach;?>
                            </tbody>
                        </table>
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->

                <div class="row">
                    <!-- accepted payments column -->
                    <div class="col-xs-6">
                    </div>
                    <!-- /.col -->
                    <div class="col-xs-6">
                        <div class="table-responsive">
                            <table class="table">
                                <tr>
                                    <th style="width:50%">Subtotal:</th>
                                    <td><?=$amount->sales_amount_total?></td>
                                </tr>
                                <tr>
                                    <th>Paid:</th>
                                    <td><?=$amount->paid;?></td>
                                </tr>
                                <tr>
                                    <th>Due:</th>
                                    <td><?=$amount->balance;?></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->

                <!-- this row will not appear when printing -->
                <div class="row no-print">
                    <div class="col-xs-12">
                        <a href="<?=base_url('sales/invoice_print')?>/<?=$this->uri->segment(3);?>" target="_blank" class="btn btn-default"><i class="fa fa-print"></i> Print</a>

                    </div>
                </div>


    </section>




