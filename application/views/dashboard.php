 <h1><i class="fas fa-spider"></i>&nbsp;Welcome to bug report</h1>

 <button data-toggle="modal" data-target="#modalLoginForm" class="btn btn-outline-primary waves-effect btn-sm">Add Bugs</button> &nbsp;

 <?php $todoList = base_url() . "TodoList" ?>
 <a href="<?= $todoList ?>"><button class="btn btn-outline-success waves-effect btn-sm">To Do List</button></a>

 <table class="table table-responsive w-auto text-wrap text-white" id="dashboardTable">
     <thead>
         <tr>
             <th>#</th>
             <th>Url</th>
             <th>Description</th>
             <th>Options</th>
         </tr>
     </thead>
     <tbody id="bugsTbody">
         <?php $counter = 0; ?>
         <?php foreach ($bugTable->result() as $row) { ?>
             <?php $counter++ ?>
             <tr>
                 <td><?= $counter ?></td>
                 <td><a href="<?= $row->url ?>" target="_blank" class="text-white"><?= $row->url ?></a></td>
                 <td><?= $row->description ?></td>
                 <td style="display:flex">
                     <?php
                        // $update = base_url() . "Bugs/update/$row->id";
                        // $delete = base_url() . "Bugs/delete/$row->id";
                        ?>

                     <button class="btn btn-primary btn-sm">Update</button>
                     <button value="<?= $row->id ?>" class="deleteBug btn btn-danger btn-sm btn-delete">Delete</button>
                 </td>
             </tr>
         <?php } ?>
     </tbody>
 </table>

 <!-- Modal -->
 <div class="modal fade" id="modalLoginForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
     <div class="modal-dialog" role="document">
         <div class="modal-content">
             <div class="modal-header text-center">
                 <h4 class="modal-title text-dark w-100 font-weight-bold">Report a bug!</h4>
                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                 </button>
             </div>
             <form id="reportBugForm" action="">
                 <div class="modal-body mx-3">
                     <div class="md-form mb-5">
                         <i class="fas fa-bug prefix grey-text"></i>
                         <input type="text" id="insertDescription" class="form-control validate">
                         <label data-error="wrong" data-success="right" for="defaultForm-email">bug description</label>
                     </div>

                     <div class="md-form mb-4">
                         <i class="fas fa-crosshairs prefix grey-text"></i>
                         <input type="text" id="insertBugUrl" class="form-control validate">
                         <label data-error="wrong" data-success="right" for="defaultForm-pass">Bug Url</label>
                     </div>

                 </div>
                 <div class="modal-footer d-flex justify-content-center">
                     <button type="submit" class="btn btn-primary col-md-12">Report bug</button>
                 </div>
             </form>
         </div>
     </div>
 </div>

 <!-- Modal -->