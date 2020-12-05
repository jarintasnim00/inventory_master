<div class="row">
    <div class="col-lg-12">
        <div class="box">
            <div class="box-title">
                <div class="caption">
                    <i class="icon-social-dribbble font-blue-sharp"></i>
            <span class="caption-subject font-blue-sharp bold uppercase">Expense | <a href='#myModal-1'
                                                                                        data-toggle='modal'
                                                                                        class='btn btn-info'>
                    Add New <i class="fa fa-plus"></i>
                </a></span>
                </div>
            </div>
            <div class="box-body">
                <table class="table table-striped table-hover table-bordered dataTable" id="example1"
                       aria-describedby="editable-sample_info">
                    <thead>
                    <tr role="row">
                        <th>ID
                        </th>
                        <th>
                         Expense_name 
                        </th>
                        <th>
                           Party_name
                        </th>
                        <th>
                            Total_amount 
                        </th>
                        <th>Paidamount 
                        </th>
                         <th>Dueamount 
                        </th>
                        <th>
                          Expense_date
                        </th>
                         <th>
                         Action
                        </th>
                        <th>
                        Delete
                        </th>
                    </tr>
                    </thead>

                    <tbody role="alert" aria-live="polite" aria-relevant="all">
                  <input type="hidden" value="<?php echo $tt1=0; ?>">
                    <input type="hidden" value="<?php echo $tt2=0; ?>">
                       <input type="hidden" value="<?php echo $tt3=0; ?>">
                 <?php $i=1;

                    foreach ($expense as $results) {

                     ///  $id = $expense->expense_id;
                        ?>
                        <tr class='odd'>

                            <td class='center'><?php echo $i; ?>

                            <td><?php echo $results->expense_name ?>
                            <td><?php echo $results->party_name ?>
                              <td><?php echo $results->total_amount ?>
                                <td><?php echo $results->paidamount ?>
                                  <td><?php echo $results->dueamount ?>
                                    <td><?php echo $results->expense_date ?>
                                    
                        <td>
                            <a href='#myModal<?= $results->expense_id ?>' data-toggle='modal'
                               class='btn btn-warning' <?php echo $My_Controller->editPermission;?>><i class='fa fa-pencil-square-o'></i>
                                Edit
                            </a>

                        </td>
                           <td>
                            <a href='<?= base_url() ?>expense/delete_expense/<?= $results->expense_id ?>'
                               onclick='confirm("Are you sure you want to delete this user?" )' <?php echo $My_Controller->deletePermission ?>
                               class='btn btn-danger'><i class='fa fa-file-text'></i> Delete</a>
                        </td>
                    <input type="hidden" value="<?php echo $tt1=$tt1+$results->total_amount?>">
                         <input type="hidden" value="<?php echo $tt2=$tt2+$results->paidamount?>">
                          <input type="hidden" value="<?php echo $tt3=$tt3+$results->dueamount?>">
                        <?php  $i++; } ?>
                        
                  
                    <tfoot>
                        <tr>
                          
                            <td></td>
                            <td></td>
                            <td>Total</td>
                            <td>= <?php echo $tt1; ?> TK</td>
                            <td>= <?php echo $tt2; ?> TK</td>
                            <td>= <?php echo $tt3; ?> TK</td>
                            <td></td>
                            <td></td>
                          
                        </tr>
                    </tfoot>
                      </tbody>
                </table>
            </div>
        </div>

    </div>
</div>



   <?php foreach ($expense as $rows): ?>
        <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1"
             id="myModal<?php echo $rows->expense_id; ?>"
             class="modal fade" style="display: none;">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                        <h4 class="modal-title">UPDATE RECORD</h4>
                    </div>
                    <div class="modal-body modal-edit">
                        <?php $attributes = array('class' => 'form-horizontal group-border hover-stripped', 'id' => 'commentForm', 'method' => 'post');
                        echo form_open('expense/update_expense', $attributes); ?>
                        <div class='form-group'>
                            <label for='inputEmail1' class='col-lg-3 col-sm-3 control-label'>Name</label>

                            <div class='col-lg-9'>
                                <input type='hidden' name="cid" class='form-control' id='c_id'
                                       value='<?php echo $rows->expense_id; ?>'>
                                <input type='text' name="expense_name" class='form-control' id='c_name'
                                       value='<?php echo $rows->expense_name; ?>'>
                            </div>
                        </div>

                        <div class='form-group'>
                            <label for='inputPassword1' class='col-lg-3 col-sm-3 control-label'>PHONE NO</label>

                            <div class='col-lg-9'>
                                <input type='text' name="party_name" class='form-control'
                                       value="<?php echo $rows->party_name; ?>" id='c_cell'>
                            </div>
                        </div>
                      
                        <div class='form-group'>
                            <label for='inputPassword1'
                                   class='col-lg-3 col-sm-3 control-label'>EMAIL</label>

                            <div class='col-lg-9'>
                                <input type='text' name="total_amount" class='form-control'
                                       value="<?php echo $rows->total_amount; ?>" id='c_oldNo'>
                            </div>
                        </div>
                         <div class='form-group'>
                            <label for='inputPassword1'
                                   class='col-lg-3 col-sm-3 control-label'>Address</label>

                            <div class='col-lg-9'>
                                <input type='text' name="paidamount" class='form-control'
                                       value="<?php echo $rows->paidamount; ?>" id='c_oldNo'>
                            </div>
                              </div>
                              <div class='form-group'>
                            <label for='inputPassword1'
                                   class='col-lg-3 col-sm-3 control-label'>Expense_date </label>

                            <div class='col-lg-9'>
                                <input type='date' name="expense_date" class='form-control'
                                       value="<?php echo $rows->expense_date; ?>" id='c_oldNo'>
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



    <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1"
         id="myModal-1"
         class="modal fade" style="display: none;">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                    <h4 class="modal-title">ADD Expense</h4>
                </div>
               <?php $attributes = array('class' => 'form-horizontal group-border hover-stripped', 'id' => 'myform', 'method' => 'post');
            echo form_open('expense/insert_expense', $attributes); ?>
            <div class="modal-body">


                <div class='form-group'>
                   <div class='form-group'>
                                    <label for='inputPassword1' class='col-lg-3 col-sm-3 control-label'> Expense-Name</label>
                    <div class='col-lg-8'>
                        <input type='hidden' name="expense_id" class='form-control' id='c_' value=''>
                        <input type='text' name="expense_name" required class='form-control' id='c_name'
                               value=''>
                    </div>
                </div>
                <div class='form-group'>
                                    <label for='inputPassword1' class='col-lg-3 col-sm-3 control-label'> Party-Name</label>

                                    <div class='col-lg-8'>
                                        <input type='text' name="party_name" class='form-control'
                                               value="" id=''>
                                    </div>
                                </div>
                                <div class='form-group'>
                                    <label for='inputPassword1' class='col-lg-3 col-sm-3 control-label'>
                                        Total-Amount</label>

                                    <div class='col-lg-8'>
                                        <input type='text' name="total_amount" class='input form-control'
                                               value="" id='total_amount'
                                               placeholder=''>
                                    </div>
                                </div>
                                <div class='form-group'>
                                    <label for='inputPassword1'
                                           class='col-lg-3 col-sm-3 control-label'>Paid-Amount </label>
                                    <div class='col-lg-8'>
                                        <input type='text' name="paidamount" class='input form-control'
                                               value="" id='paidamount'
                                               placeholder=''>
                                    </div>

                                </div>
                                 <div class='form-group'>
                                    <label for='inputPassword1'
                                           class='col-lg-3 col-sm-3 control-label'>Due-Amount </label>
                                    <div class='col-lg-8'>
                                        <input type='text' name="dueamount" class='form-control'
                                              id='dueamount'
                                               placeholder=''>
                                    </div>

                                </div>
                                 <div class='form-group'>
                                    <label for='inputPassword1'
                                           class='col-lg-3 col-sm-3 control-label'>Expense_date </label>
                                    <div class='col-lg-8'>
                                        <input type='date' name="expense_date" class='form-control'
                                                id='expense_date'
                                               placeholder=''>
                                    </div>

                                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn dark btn-outline" data-dismiss="modal">Close</button>
                <?php echo $My_Controller->savePermission; ?>                </div>
            <?php echo form_close(); ?>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
       </div>
    <script type="text/javascript">
 $(document).ready(function() {

    $(".input").on('input',function() {
        var total_amount = document.getElementById("total_amount").value;
        total_amount = parseFloat(total_amount);
        var paidamount = document.getElementById("paidamount").value;
        paidamount = parseFloat(paidamount);
          document.getElementById("dueamount").value= total_amount-paidamount;
     
         });


     });
        </script>

    <!--
        <div class="row">
    <div class="col-lg-12">
        <div class="box">
            <div class="box-title">
                <div class="caption">
                    <i class="icon-social-dribbble font-blue-sharp"></i>
            <span class="caption-subject font-blue-sharp bold uppercase">Expense | <a href='#myModal-1'
                                                                                        data-toggle='modal'
                                                                                        class='btn btn-info'>
                    Add New <i class="fa fa-plus"></i>
                </a></span>
                </div>
            </div>
            <div class="box-body">
                <table class="table table-striped table-hover table-bordered dataTable" id="example1"
                       aria-describedby="editable-sample_info">
                    <thead>
                    <tr role="row">
                        <th>ID
                        </th>
                        <th>
                         Expense_name 
                        </th>
                        <th>
                           Party_name
                        </th>
                        <th>
                            Total_amount 
                        </th>
                        <th>Paidamount 
                        </th>
                         <th>Dueamount 
                        </th>
                        <th>
                          Expense_date
                        </th>
                    </tr>
                    </thead>

                    <tbody role="alert" aria-live="polite" aria-relevant="all">
                  <input type="hidden" value="<?php echo $tt1=0; ?>">
                    <input type="hidden" value="<?php echo $tt2=0; ?>">
                       <input type="hidden" value="<?php echo $tt3=0; ?>">
                 <?php $i=1;

                    foreach ($expense as $results) {

                     ///  $id = $expense->expense_id;
                        ?>
                        <tr class='odd'>

                            <td class='center'><?php echo $i; ?>

                            <td><?php echo $results->expense_name ?>
                            <td><?php echo $results->party_name ?>
                              <td><?php echo $results->total_amount ?>
                                <td><?php echo $results->paidamount ?>
                                  <td><?php echo $results->dueamount ?>
                                    <td><?php echo $results->expense_date ?>
                                    
                        <td>
                            <a href='#myModal<?= $results->expense_id ?>' data-toggle='modal'
                               class='btn btn-warning' <?php echo $My_Controller->editPermission;?>><i class='fa fa-pencil-square-o'></i>
                                Edit
                            </a>

                        </td>
                    <input type="hidden" value="<?php echo $tt1=$tt1+$results->total_amount?>">
                         <input type="hidden" value="<?php echo $tt2=$tt2+$results->paidamount?>">
                          <input type="hidden" value="<?php echo $tt3=$tt3+$results->dueamount?>">
                        <?php  $i++; } ?>
                        <tr>
                          
                            <td></td>
                            <td></td>
                            <td>Total</td>
                            <td>= <?php echo $tt1; ?> TK</td>
                            <td>= <?php echo $tt2; ?> TK</td>
                            <td>= <?php echo $tt3; ?> TK</td>
                            <td></td>
                            <td></td>
                          
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

    </div>
</div>



    <?php foreach ($expense as $rows): ?>
        <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1"
             id="myModal<?php echo $rows->expense_id; ?>"
             class="modal fade" style="display: none;">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                        <h4 class="modal-title">UPDATE RECORD</h4>
                    </div>
                    <div class="modal-body modal-edit">
                        <?php $attributes = array('class' => 'form-horizontal group-border hover-stripped', 'id' => 'commentForm', 'method' => 'post');
                        echo form_open('expense/update_expense', $attributes); ?>
                        <div class='form-group'>
                            <label for='inputEmail1' class='col-lg-3 col-sm-3 control-label'>Expense Name</label>

                            <div class='col-lg-9'>
                                <input type='hidden' name="cid" class='form-control' id='c_id'
                                       value='<?php echo $rows->expense_id; ?>'>
                                <input type='text' name="expense_name" class='form-control' id='c_name'
                                       value='<?php echo $rows->expense_name; ?>'>
                            </div>
                        </div>

                        <div class='form-group'>
                            <label for='inputPassword1' class='col-lg-3 col-sm-3 control-label'>  Party_name</label>

                            <div class='col-lg-9'>
                                <input type='text' name="party_name" class='form-control'
                                       value="<?php echo $rows->party_name; ?>" id='c_cell'>
                            </div>
                        </div>
                        <div class='form-group'>
                            <label for='inputPassword1' class='col-lg-3 col-sm-3 control-label'>  Total_amount </label>

                            <div class='col-lg-9'>
                                <input type='text' name="total_amount" class='form-control'
                                       value="<?php echo $rows->total_amount; ?>" id='c_address'
                                       placeholder=''>
                            </div>
                        </div>
                        <div class='form-group'>
                            <label for='inputPassword1'
                                   class='col-lg-3 col-sm-3 control-label'>Paidamount </label>

                            <div class='col-lg-9'>
                                <input type='text' name="paidamount" class='form-control'
                                       value="<?php echo $rows->paidamount; ?>" id=''>
                            </div>
                        </div>
                         <div class='form-group'>
                            <label for='inputPassword1'
                                   class='col-lg-3 col-sm-3 control-label'>Expense_date </label>

                            <div class='col-lg-9'>
                                <input type='date' name="expense_date" class='form-control'
                                       value="<?php echo $rows->expense_date; ?>" id='c_oldNo'>
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



    <div class="modal fade" id="myModal-1" tabindex="-1" role="basic" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                <h4 class="modal-title">Add EXpense</h4>
            </div>
            <?php $attributes = array('class' => 'form-horizontal group-border hover-stripped', 'id' => 'myform', 'method' => 'post');
            echo form_open('expense/insert_expense', $attributes); ?>
            <div class="modal-body">


                <div class='form-group'>
                    <label for='inputEmail1' class='col-lg-4 col-sm-3 control-label'>Expense NAME</label>
                    <div class='col-lg-8'>
                        <input type='hidden' name="expense_id" class='form-control' id='c_' value=''>
                        <input type='text' name="expense_name" required class='form-control' id='c_name'
                               value=''>
                    </div>
                </div>
                <div class='form-group'>
                                    <label for='inputPassword1' class='col-lg-3 col-sm-3 control-label'> Party_name</label>

                                    <div class='col-lg-9'>
                                        <input type='text' name="party_name" class='form-control'
                                               value="" id=''>
                                    </div>
                                </div>
                                <div class='form-group'>
                                    <label for='inputPassword1' class='col-lg-3 col-sm-3 control-label'>
                                        Totalamount</label>

                                    <div class='col-lg-9'>
                                        <input type='text' name="total_amount" class='input form-control'
                                               value="" id='total_amount'
                                               placeholder=''>
                                    </div>
                                </div>
                                <div class='form-group'>
                                    <label for='inputPassword1'
                                           class='col-lg-3 col-sm-3 control-label'>Paidamount </label>
                                    <div class='col-lg-9'>
                                        <input type='text' name="paidamount" class='input form-control'
                                               value="" id='paidamount'
                                               placeholder=''>
                                    </div>

                                </div>
                                 <div class='form-group'>
                                    <label for='inputPassword1'
                                           class='col-lg-3 col-sm-3 control-label'>Dueamount </label>
                                    <div class='col-lg-9'>
                                        <input type='text' name="dueamount" class='form-control'
                                              id='dueamount'
                                               placeholder=''>
                                    </div>

                                </div>
                                 <div class='form-group'>
                                    <label for='inputPassword1'
                                           class='col-lg-3 col-sm-3 control-label'>Expense_date </label>
                                    <div class='col-lg-9'>
                                        <input type='date' name="expense_date" class='form-control'
                                                id='expense_date'
                                               placeholder=''>
                                    </div>

                                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn dark btn-outline" data-dismiss="modal">Close</button>
                <?php echo $My_Controller->savePermission; ?>                </div>
            <?php echo form_close(); ?>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
       </div>

<script type="text/javascript">
 $(document).ready(function() {

    $(".input").on('input',function() {
        var total_amount = document.getElementById("total_amount").value;
        total_amount = parseFloat(total_amount);
        var paidamount = document.getElementById("paidamount").value;
        paidamount = parseFloat(paidamount);
          document.getElementById("dueamount").value= total_amount-paidamount;
     
         });


     });
        </script>


       
           

