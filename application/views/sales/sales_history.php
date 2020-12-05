<?php
foreach ($sales as $results) {

    $id = $results->sales_no;
    @$custlistRow .= "<tr>


                <td>" . $results->sales_no . "
                <td>" . $results->customer_name . "
                <td>" . date('d-M-Y',strtotime($results->sales_date)) . "
                 <td>" . $results->customer_name . "
                <td>Tk.".$results->sales_amount_total."</td>
             <td>TK.".$results->balance."</td>
<td>
<a href='show_sales_history/" . $results->sales_no . "' data-toggle='modal' class='btn btn-success'>
<i class='fa fa-pencil-square-o'></i>
                                  Sales History
                              </a> </td>
                ";

}
?>
 <!-- / Table body -->
<!-- page start-->

<section class="panel">
    <header class="panel-heading">
        SALES HISTORY
    </header>
    <div class="panel-body">
        <div class="adv-table editable-table table-responsive">
                <table id="example1" class="table table-striped table-hover table-bordered dataTable"
                       aria-describedby="editable-sample_info">
                    <tr role="row">
                         <tr role="row">
                    <th class="active sorting_asc" tabindex="0" aria-controls="dataTables-example"
                        rowspan="1" colspan="1" style="width: 32px;" aria-sort="ascending"
                        aria-label="Sl: activate to sort column ascending">Sl
                    </th>
                        <th class="sorting_disabled" role="columnheader" rowspan="1" colspan="1" style="width: 184px;"
                            aria-label="Username">Sales Code
                        </th>
                        <th class="sorting" role="columnheader" tabindex="0" aria-controls="editable-sample" rowspan="1"
                            colspan="1" style="width: 269px;" aria-label="Full Name: activate to sort column ascending">
                            Customer
                        </th>
                        <th class="sorting" role="columnheader" tabindex="0" aria-controls="editable-sample" rowspan="1"
                            colspan="1" style="width: 123px;" aria-label="Points: activate to sort column ascending">
                            Date
                        </th>
                         <th class="sorting" role="columnheader" tabindex="0" aria-controls="editable-sample" rowspan="1"
                            colspan="1" style="width: 269px;" aria-label="Description: activate to sort column ascending">
                            Description
                        </th>
                          <th class="active sorting" tabindex="0" aria-controls="dataTables-example" rowspan="1"
                        colspan="1" style="width: 124px;"
                        aria-label="Grand Total: activate to sort column ascending">Sales Status
                    </th>
                        <th class="sorting" role="columnheader" tabindex="0" aria-controls="editable-sample" rowspan="1"
                            colspan="1" style="width: 123px;" aria-label="Points: activate to sort column ascending">
                            total
                        </th>
                         <th class="sorting" role="columnheader" tabindex="0" aria-controls="editable-sample" rowspan="1"
                            colspan="1" style="width: 123px;" aria-label="Points: activate to sort column ascending">
                            Due
                        </th>
                        <th class="sorting" role="columnheader" tabindex="0" aria-controls="editable-sample" rowspan="1"
                            colspan="1" style="width: 127px;" aria-label="Delete: activate to sort column ascending">
                            Action
                        </th>
                         <th class="sorting" role="columnheader" tabindex="0" aria-controls="editable-sample" rowspan="1"
                            colspan="1" style="width: 127px;" aria-label="Delete: activate to sort column ascending">
                            Clear Due
                        </th>
                         <!-- <th class="sorting" role="columnheader" tabindex="0" aria-controls="editable-sample" rowspan="1"
                            colspan="1" style="width: 127px;" aria-label="Delete: activate to sort column ascending">
                            Clear Payment 
                        </th>-->
                    </tr>
                    </thead>
                    <tbody><!-- / Table body -->

                <?php $i = 1; foreach ($sales as $results) {
                     $id = $results->sales_no; ?>
                    <!--get all sub category if not this empty-->
                    <tr class="custom-tr odd">
                        <td class="vertical-td sorting_1">
                            <?php echo $i;?>
                        </td>
                        <td class="vertical-td "><?php echo $results->sales_no; ?></td>
                        <td class="vertical-td "><?php echo $results->customer_name; ?></td>
                        <td class="vertical-td "><?php echo $results->sales_date; ?></td>
                        <td class="vertical-td "><?php echo $results->description; ?></td>
                        <td class="vertical-td "><?php if($results->balance != 0.00){
                                echo "<span class='label label-warning'>Pending</span>";
                            }else{
                                echo "<span class='label label-primary'>Confirmed</span>";
                            } ?></td>
                        <td class="vertical-td "><?php echo $results->sales_amount_total; ?></td>
                       <td class="vertical-td "><?php echo $results->balance; ?></td>

                        <td>
                            <a href='show_sales_history/<?= $results->sales_no ?>' data-toggle='modal'
                               class='btn btn-success'>
                                <i class='fa fa-pencil-square-o'></i>
                                View Sale History
                            </a>

                        </td>
                        <td>
                            <a href='#myModal<?= $results->sales_no ?>' data-toggle='modal'
                               class='btn btn-warning' <?php echo $My_Controller->editPermission;?>><i class='fa fa-pencil-square-o'></i>
                                Payment
                            </a>

                        </td>

                    </tr>
                <?php  $i++; } ?>
                </tbody>

                   <!-- <tbody role="alert" aria-live="polite" aria-relevant="all">
                    <?php if(!empty($custlistRow)){
                        echo $custlistRow;
                    } ?>
                    </tbody>-->
                </table>
            </div>
        </div>


        <?php foreach ($sales as $rows): ?>
        <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1"
             id="myModal<?php echo $rows->sales_no; ?>"
             class="modal fade" style="display: none;">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                        <h4 class="modal-title">UPDATE DUE</h4>
                    </div>
                    <div class="modal-body modal-edit">
                        <?php $attributes = array('class' => 'form-horizontal group-border hover-stripped', 'id' => 'commentForm', 'method' => 'post');
                        echo form_open('sales/update_sales', $attributes); ?>
                        <div class='form-group'>
                            <label for='inputEmail1' class='col-lg-3 col-sm-3 control-label'>Name</label>

                            <div class='col-lg-9'>
                                <input type='hidden' name="cid" class='form-control' id='c_id'
                                       value='<?php echo $rows->sales_no; ?>'>
                                <input type='text' name="cname" class='form-control' id='c_name'
                                       value='<?php echo $rows->customer_name; ?>'>
                            </div>
                        </div>

                        <div class='form-group'>
                            <label for='inputPassword1' class='col-lg-3 col-sm-3 control-label'>SALES DATE</label>

                            <div class='col-lg-9'>
                                <input type='text' name="sales_date" class='form-control'
                                       value="<?php echo $rows->sales_date; ?>" id='c_cell'>
                            </div>
                        </div>
                       
                        <div class='form-group'>
                            <label for='inputPassword1'
                                   class='col-lg-3 col-sm-3 control-label'>DESCRIPTION</label>

                            <div class='col-lg-9'>
                                <input type='text' name="description" class='form-control'
                                       value="<?php echo $rows->description; ?>" id='c_oldNo'>
                            </div>
                        </div>
                        <div class='form-group'>
                            <label for='inputPassword1'
                                   class='col-lg-3 col-sm-3 control-label'>DUE</label>

                            <div class='col-lg-9'>
                                <input type='text' name="balance" class='form-control'
                                       value="<?php echo $rows->balance; ?>" id='c_oldNo'>
                            </div>
                        </div>
                        <div class='form-group'>
                            <div class='col-lg-offset-2 col-lg-10'>
                                <button type='submit' class='btn btn-primary'>Update</button>
                                <button class='btn btn-outline dark' data-dismiss='modal' type='button'>Close</button>
                            </div>
                        </div>
                        <?php echo form_close(); ?>
                    </div>

                </div>
            </div>
        </div>
    <?php endforeach; ?>
</section>