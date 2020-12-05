<?php
foreach ($purchase as $results) {

    $id = $results->purchase_no;
    @$custlistRow .= "<tr>


                <td>" . $results->purchase_no . "
                <td>" . $results->vendor_name . "
                <td>" . date('d-m-Y', strtotime($results->purchase_date)) . "
<td>
<a href='show_purchase_history/" . $results->purchase_no . "' data-toggle='modal' class='btn btn-success'>
<i class='fa fa-pencil-square-o'></i>
                                  View Purchase History
                              </a>
                  </td>
                ";

}
?>
<!-- page start-->
<style>
    .box-header.with-border {
        border-bottom: 1px solid #f4f4f4;
    }
    .box-header-background {
        background-color: #6c7a89;
        color: #fff;
    }
</style>

<section class="panel">
    <header class="panel-heading box-header-background">
        PURCHASE HISTORY
    </header>
    <div class="panel-body">
        <div class="adv-table editable-table table-responsive">
            <table id="dynamic-table" class="table table-bordered table-striped dataTable no-footer"
                   aria-describedby="dataTables-example_info">
                <thead><!-- Table head -->
                <tr role="row">
                    <th class="active sorting_asc" tabindex="0" aria-controls="dataTables-example"
                        rowspan="1" colspan="1" style="width: 32px;" aria-sort="ascending"
                        aria-label="Sl: activate to sort column ascending">Sl
                    </th>
                    <th class="active sorting" tabindex="0" aria-controls="dataTables-example" rowspan="1"
                        colspan="1" style="width: 154px;"
                        aria-label="Purchase No.: activate to sort column ascending">Purchase No.
                    </th>
                    <th class="active sorting" tabindex="0" aria-controls="dataTables-example" rowspan="1"
                        colspan="1" style="width: 211px;"
                        aria-label="Supplier Name: activate to sort column ascending">Supplier Name
                    </th>
                     <th class="active sorting" tabindex="0" aria-controls="dataTables-example" rowspan="1"
                        colspan="1" style="width: 211px;"
                        aria-label="Supplier Name: activate to sort column ascending">Company Name
                    </th>
                    <th class="active sorting" tabindex="0" aria-controls="dataTables-example" rowspan="1"
                        colspan="1" style="width: 211px;"
                        aria-label="Supplier Name: activate to sort column ascending">Description
                    </th>
                    <th class="active sorting" tabindex="0" aria-controls="dataTables-example" rowspan="1"
                        colspan="1" style="width: 150px;"
                        aria-label="Purchase Date: activate to sort column ascending">Purchase Date
                    </th>
                    <th class="active sorting" tabindex="0" aria-controls="dataTables-example" rowspan="1"
                        colspan="1" style="width: 124px;"
                        aria-label="Grand Total: activate to sort column ascending">Purchase Status
                    </th>
                    <th class="active sorting" tabindex="0" aria-controls="dataTables-example" rowspan="1"
                        colspan="1" style="width: 124px;"
                        aria-label="Grand Total: activate to sort column ascending">Due
                    </th>
                     <th class="active sorting" tabindex="0" aria-controls="dataTables-example" rowspan="1"
                        colspan="1" style="width: 124px;"
                        aria-label="Grand Total: activate to sort column ascending">Grand Total
                    </th>
                   <!-- <th class="active sorting" tabindex="0" aria-controls="dataTables-example" rowspan="1"
                        colspan="1" style="width: 178px;"
                        aria-label="Purchase By: activate to sort column ascending">Purchase By
                    </th>-->
                    <th class="active sorting" tabindex="0" aria-controls="dataTables-example" rowspan="1"
                        colspan="1" style="width: 72px;"
                        aria-label="Action: activate to sort column ascending">Action
                    </th>
                     <th class="active sorting" tabindex="0" aria-controls="dataTables-example" rowspan="1"
                        colspan="1" style="width: 72px;"
                        aria-label="Action: activate to sort column ascending">Clear Due
                    </th>
                </tr>
                </thead><!-- / Table head -->
                <tbody><!-- / Table body -->

                <?php $i = 1; foreach ($purchase as $results) {
                    $id = $results->purchase_no; ?>
                    <!--get all sub category if not this empty-->
                    <tr class="custom-tr odd">
                        <td class="vertical-td sorting_1">
                            <?php echo $i;?>
                        </td>
                        <td class="vertical-td "><?php echo $results->purchase_no; ?></td>
                        <td class="vertical-td "><?php echo $results->vendor_name; ?></td>
                          <td class="vertical-td "><?php echo $results->com_name; ?></td>
                         <td class="vertical-td "><?php echo $results->description; ?></td>
                        <td class="vertical-td "><?php echo $results->purchase_date; ?></td>
                        <td class="vertical-td "><?php if($results->due_amount != 0.00){
                                echo "<span class='label label-warning'>Pending</span>";
                            }else{
                                echo "<span class='label label-primary'>Confirmed</span>";
                            } ?></td>
                        <td class="vertical-td "><?php echo $results->grand_total; ?></td>
                        <td class="vertical-td "><?php echo $results->due_amount; ?></td>
                       <!-- <td class="vertical-td "><?= $results->USER_NAME;?></td>-->

                        <td>
                            <a href='show_purchase_history/<?= $results->purchase_no ?>' data-toggle='modal'
                               class='btn btn-success'>
                                <i class='fa fa-pencil-square-o'></i>
                                View Purchase History
                            </a>
                        </td>
                        <td>
                            <a href='#myModal<?= $results->purchase_no ?>' data-toggle='modal'
                               class='btn btn-warning' <?php echo $My_Controller->editPermission;?>><i class='fa fa-pencil-square-o'></i>
                                Payment
                            </a>

                        </td>

                    </tr>
                <?php  $i++; } ?>
                </tbody><!-- / Table body -->
            </table>

            <!--<div class="row-fluid">
                <div class="span6">
                    <!--  <div class="dataTables_info" id="hidden-table-info_info">Showing 1 to 10 of 57 entries</div>-->
            <!--</div>
            <div class="span6">
                <div class="dataTables_paginate paging_bootstrap pagination">
                    <ul>
                        <!--<li class="prev disabled"><a href="#">← Previous</a></li>-->
            <!--<li class="active"><a href="#"><?php //echo $this->pagination->create_links(); ?>
                                </a></li>

                        </ul>
                    </div>
                </div>
            </div>-->
        </div>
    </div>
     <?php foreach ($purchase as $rows): ?>
        <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1"
             id="myModal<?php echo $rows->purchase_no; ?>"
             class="modal fade" style="display: none;">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                        <h4 class="modal-title">UPDATE DUE</h4>
                    </div>
                    <div class="modal-body modal-edit">
                     <?php $attributes = array('class' => 'form-horizontal group-border hover-stripped', 'id' => 'commentForm', 'method' => 'post');
                        echo form_open('purchase/update_purchase', $attributes); ?>
                        <div class='form-group'>
                            <label for='inputEmail1' class='col-lg-3 col-sm-3 control-label'> Vendor Name</label>

                            <div class='col-lg-9'>
                                <input type='hidden' name="cid" class='form-control' id='c_id'
                                       value='<?php echo $rows->purchase_no; ?>'>
                                <input type='text' name="cname" class='form-control' id='c_name'
                                       value='<?php echo $rows->vendor_name; ?>'>
                            </div>
                        </div>
                         <div class='form-group'>
                            <label for='inputEmail1' class='col-lg-3 col-sm-3 control-label'>Company Name</label>

                            <div class='col-lg-9'>
                                <input type='text' name="com_name" class='form-control' id='c_name'
                                       value='<?php echo $rows->com_name; ?>'>
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
                            <label for='inputPassword1' class='col-lg-3 col-sm-3 control-label'>PURCHASE DATE</label>

                            <div class='col-lg-9'>
                                <input type='text' name="purchase_date" class='form-control'
                                       value="<?php echo $rows->purchase_date; ?>" id='c_cell'>
                            </div>
                        </div>
                       
                       
                        <div class='form-group'>
                            <label for='inputPassword1'
                                   class='col-lg-3 col-sm-3 control-label'>DUE</label>

                            <div class='col-lg-9'>
                                <input type='text' name="due_amount" class='form-control'
                                       value="<?php echo $rows->due_amount; ?>" id='c_oldNo'>
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