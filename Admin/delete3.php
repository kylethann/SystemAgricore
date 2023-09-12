                            <form action="crud.php" method="POST">
                                <div class="modal fade" id="misdelete" tabindex="-1" role="dialog"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel" style="color:black;">Delete Information :</h5>
                                                <button class="close" type="button" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">×</span>
                                                </button>
                                            </div>
                                            <div class="modal-body" style="color:black;">Are You Sure to Delete This MIS Account?</div>
                                                <input type="hidden" name="misdelete_id" id="misdelete_id">
                                            <div class="modal-footer">
                                                <button type="submit" name="mis_delete"
                                                    class="btn btn-danger">Delete
                                                </button>
                                                <button class="btn btn-secondary" type="button"
                                                    data-dismiss="modal">Cancel
                                                </button>
                                            </div>
                                        </form>
                                        </div>
                                    </div>
                                </div>