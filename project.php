<?php 
 ob_start();
session_start();
include 'config-rb.php';

//echo "<pre>";
//print_r($_SERVER);
//echo "</pre>";


if (isset($_POST['add_project'])) {

    $created_by       = 1;
    $edited_by        = 1;


    $name             = $_POST['name'];
    $client_id        = $_POST['client_id'];
    $type_id          = $_POST['type_id'];
    $description      = $_POST['description'];
    $created_by       = $created_by;
    $edited_by        = $edited_by;
    $status           = $_POST['status'];
    
    

    try {

        if (empty($_POST['name'])) {
            
            $_SESSION['message'] = 'Name cannot be empty.....';
        }
        
        
        $insert = R::dispense('project');
        $insert->name            = $name;
        $insert->client_id       = $client_id;
        $insert->type_id         = $type_id;
        $insert->description     = $description;
        $insert->edited_by       = $edited_by;
        $insert->edited_by       = $edited_by;
        $insert->status          = $status;

        
        R::store($insert);


        //Creating a message
        $_SESSION['message'] = "Object Created successfully";
         }
        catch (Exception $e) {
        $_SESSION['err_message'] = $e->getMessage();
    }
}

    include 'header-lms-admin.php'; 
    include 'left-sidebar-lms.php'; 
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <!--
    <section class="content-header">
      <h1>
        General Form Elements
        <small>Preview</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Forms</a></li>
        <li class="active">General Elements</li>
      </ol>
    </section>
-->

    <!-- Main content -->
    <section class="content">
        <!--
      <div class="callout callout-info">
        <h4>Reminder!</h4>
        Instructions for how to use modals are available on the
        <a href="http://getbootstrap.com/javascript/#modals">Bootstrap documentation</a>
      </div>
-->

        <div class="row">
            <div class="col-xs-12">
                <div class="box box-default">
                    <div class="box-header with-border">
                        <h3 class="box-title"><i class="fa fa-cube"></i> New Project</h3>
                    </div>
                    <div class="box-body text-right">
                        <button type="button" class="btn btn-default" data-toggle="modal" data-target="#modal-default">
                        
                New
              </button>


                    </div>
                </div>
            </div>
        </div>

    

        <div class="modal fade" id="modal-default">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header text-center">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>

                        <h4 class="modal-title">New Project</h4>
                    </div>
                    <form role="form" method="post" action="">
                        <div class="modal-body">

                            <!-- /.box-header -->
                            <!-- form start -->

                            <div class="box-body">
                                <div class="form-group">
                                    <label for="exampleInputProjectName">Project Name</label>
                                    <input type="text" class="form-control" name="name" id="exampleInputEmail1" placeholder="Project Name">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputProjectName">Client Name</label>
                                    <select name="client_id" class="form-control select2" style="width: 100%;">
                                      <option selected="selected" value="0">Select a client</option>                                      
                                      <?php 
                                          
                                        $client = R::findAll('client', 'Order BY id');
                                        
                                        foreach($client as $row)
                                            {
                                            ?>
                                              <option value="<?php echo $row->id; ?>"><?php echo $row->name; ?></option>
                                            <?php
                                            }
                                                
                                      ?>
                                      
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label>Description</label>
                                    <textarea name="description" class="form-control" rows="3" placeholder="Desc ..."></textarea>
                                </div>

                                <div class="form-group">
                                    <label>Project Type</label>
                                    <select name="type_id" class="form-control select2" style="width: 100%;">
                                      <option selected="selected" value="1">General Product</option>                                      
                                      <option value="2">Car Sale</option>
                                      <option value="3">Realestae</option>
                                      <option value="4">Electric Product</option>
                                    </select>
                                </div>

                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="status" value="1" checked> Active
                                      </label>
                                </div>
                            </div>
                            <!-- /.box-body -->

                            <!--
              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
-->


                        </div>
                        <div class="modal-footer">
                            <!--                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>-->
                            <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                            <button type="button" class="btn btn-primary">Save &amp; New</button>
                            <input type="submit" class="btn btn-primary" value="Save" name="add_project" />
                        </div>
                    </form>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->



        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">All Projects</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Project Name</th>
                                    <th>Owner Name</th>
                                    <th>Project Type</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $findall = R::findAll('project', 'Order BY id');

                                    $i = "";
                                    foreach($findall as $row)
                                    {
                                        $i++
                                    ?>
                                    <tr>

                                        <td><a href=""><?php echo $row->name; ?></a></td>
                                        <td>
                                            <?php 
                                                $client_id = $row->client_id; 
                                                $client_name = R::load('client', $client_id);
                                                echo $client_name->name;
                                            ?>
                                        </td>
                                        <td>
                                            <?php echo $row->type_id; ?>
                                        </td>
                                        <td>
                                            <?php 
                                        $status = $row->status; 
                                        
                                        if($status == 1){
                                            echo "Active";
                                        }else{
                                            echo "Inactive";
                                        }
                                        
                                        ?>


                                        </td>
                                        <td class="text-center">
                                            <a href="edit-project?id=<?php echo $row->id; ?>"><i class="fa fa-edit"></i></a> &nbsp; | &nbsp;
                                            <a href=""><i class="fa fa-trash"></i></a>
                                        </td>
                                    </tr>
                                    <?php } ?>

                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>Project Name</th>
                                    <th>Owner Name</th>
                                    <th>Project Type</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->

</div>
<!-- /.content-wrapper -->
<footer class="main-footer">
    <div class="pull-right hidden-xs">
        <b>Version</b> 1.0
    </div>
    <strong>Copyright &copy; 2017-2018 <a href="https://s-connect.org">Super Connect</a>.</strong> All rights reserved.
</footer>

<?php 
    include 'control-sidebar.php'; 
    include 'footer-form.php'; 
?>
