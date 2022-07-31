<?php
    include "header.php";

    if(!isset($_SESSION['user_id'])){
        header('Location: indeks.php');
        exit();
    }
?>

<br>
<div class="container">
<div class="row">
        <div class="col-6">
            <h2 class="text-info">Students </h2>
        </div>
        <br>
        <div >
            <a id="btn-add-new" class="btn btn-info form-control text-white"> 
                Add new student
            </a>
        </div>
        <div class="col-12 border p-3">
            <table id="DT_load" class="table table-striped table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Teacher</th>
                        <th>Group</th>
                    </tr>
                </thead>
            </table>
        </div>
</div>


</div>
<div class="container">
        <div id="table-manager" class="modal fade">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h2 class="modal-title"></h2>
                    </div>

                    <div class="modal-body">
                        <form method="post" action="">
                            <div id="edit-content">
                                <input type="text" class="form-control" id="name" name="name" placeholder="Name"><br>
                                <input type="text" class="form-control" id="birth_date" name="birth_date" placeholder="Birth date"><br>
                                <input type="text" class="form-control" id="teacher" name="teacher" placeholder="Teacher"><br>
                                <input type="text" class="form-control" id="start_date" name="start_date" placeholder="Start date"><br>
                                <select class="browser-default custom-select" id="select" name="select" >
                                    <option value="" disabled selected>Choose group</option>
                                    <option value="1">Beginners</option>
                                    <option value="2">Intermediate</option>
                                    <option value="3">Advanced</option>
                                    <option value="4">Proficient</option>
                                </select>
                            </div>
                        </form>

                        <!-- <div id="show-content" style="display:none;">
                            <h3>Year</h3>
                            <div id="year-view"></div>
                            <hr>
                            <h3>Number of pages</h3>
                            <div id="num-pages-view"></div>
                            <hr>
                            <h3>Category</h3>
                            <div id="category-view"></div>
                        </div>
                    </div> -->

                    <div class="modal-footer">
                                <input type="button" class="btn btn-secondary" id="btn-close" data-dismiss="modal" value="Close">
                                <input type="button" class="btn btn-primary" id="btn-manage" onclick="manageData('addNew')" value="Save" >
                    </div>
                </div>
            </div>
        </div>
 </div>

<?php
    include "footer.php";
?>

