
<!-- <div class="modal" id="modal_single_del" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">search</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
                   </button>
                    </div>
        
                    <div class="modal-body">
                            
                        What Do Search For?
                    </div>
                    <div class="modal-footer">
                        <form action="search_result.php" method="post">
                           
                            <input type="text" name="search_data" value="search for ..">
                             
                            <div class="not-empty-record">
                                <button type="submit" class="btn btn-primary">Search</button>
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">close</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div> -->
        <?php
//ob_start();

include '../helpers/functions.php';
include '../helpers/db.php';

?>
        <div class="modal fade" id="modalContactForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header text-center">
                <h2 class="modal-title font-weight-bold">Search</h2>
            </div>
            <div class="modal-body mx-3">
            <form action="search_result.php" method="post">
                <div class="md-form mb-5">
                    <i class="fa fa-user prefix grey-text"></i>
					<label data-error="wrong" data-success="right" for="fname">Search:</label>
                    <input type="text" id="fname" name ="search_data"class="form-control validate">
                </div>
            </div>
            <div class="modal-footer d-flex justify-content-center">
                <button id="send" class="btn btn-info">Submit <i class="fa fa-paper-plane-o ml-1"></i></button>
				<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                <a href= "../menu.php">back</a>
            </div>
            </form>
            </div>
        </div>
    </div>
</div>

