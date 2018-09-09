<?php 
 ob_start();
session_start();
include 'config-rb.php';



if (isset($_REQUEST['id'])) {
    
    $id = $_REQUEST['id'];
    
    $created_by       = 1;
    $edited_by        = 1;     
    
    $get_data = R::load('project', $id);

    $name             = $get_data->name;
    $client_id        = $get_data->client_id;
    $type_id          = $get_data->type_id;
    $description      = $get_data->description;
    $created_by       = $created_by;
    $edited_by        = $edited_by;
    $status           = $get_data->status;
    
}

if (isset($_POST['edit_project'])){

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
        
        
        $update = R::load('project', $id);
        $update->name            = $name;
        $update->client_id       = $client_id;
        $update->type_id         = $type_id;
        $update->description     = $description;
        $update->edited_by       = $edited_by;
        $update->edited_by       = $edited_by;
        $update->status          = $status;

        
        R::store($update);


        //Creating a message
        $_SESSION['message'] = "Object Created successfully";
        
//        header ("location : project.php");
//        exit();
        echo "<script> location.href='project'; </script>";
        exit;
        
         }
        catch (Exception $e) {
        $_SESSION['err_message'] = $e->getMessage();
        
        //header ("location : project.php");
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
                        <h3 class="box-title"><i class="fa fa-cube"></i> Edit Project</h3>
                    </div>
                    <div class="box-body text-right">
                        <!--
                        <button type="button" class="btn btn-default" data-toggle="modal" data-target="#modal-default">
                        
                Back to Home
              </button>
-->
                       <div class="btn-group">
                           <a href="project" class="btn btn-default">Cancel</a>
                        <a href="home" class="btn btn-primary">Back to Home</a>
                       </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                   <form role="form" method="post" action="">
                    <div class="box-header">
                        
                        <div class="lef">
                            <h3 class="box-title">Edit Project</h3>
                        </div>
                        
                        <div class="right text-right">
                            <input type="submit" class="btn btn-primary" value="Save" name="edit_project" />
                        </div>
                        
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
<!--                        <form role="form" method="post" action="">-->
                            <div class="modal-body">

                                <!-- /.box-header -->
                                <!-- form start -->

                                <div class="box-body">
                                    <div class="form-group">
                                        <label for="exampleInputProjectName">Project Name</label>
                                        <input type="text" class="form-control" name="name" id="exampleInputEmail1" value="<?php echo $name; ?>" placeholder="Project Name">
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
                                        <textarea name="description" class="form-control" rows="3" placeholder="Desc ..." value="" > <?php echo $description; ?></textarea>
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
                               <div class="btn-group">
                                <!--                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>-->
                                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                                <button type="button" class="btn btn-primary">Save &amp; New</button>
                                <input type="submit" class="btn btn-primary" value="Save" name="edit_project" />
                                </div>
                            </div>
                        
                    </div>
                    </form>
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
