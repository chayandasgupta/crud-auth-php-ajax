<!-- Student add modal -->
<div class="modal fade" id="studentAddModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"><i class="fa fa-plus-circle"></i> Add new student</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            
            <form id="student_form">
                <!-- Show error message -->
                <div id="errorMessage" class="alert alert-danger d-none m-3"></div>

                <!-- modal body -->
                <div class="modal-body">
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" class="form-control" name="stu_name" placeholder="Enter name" required>
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" class="form-control" name="email" placeholder="Enter email" required>
                    </div>
                    <div class="form-group">
                        <label>Phone</label>
                        <input type="text" class="form-control" name="phone" placeholder="Enter phone" required>
                    </div>
                    <div class="form-group">
                        <label>Course</label>
                        <input type="text" class="form-control" name="course" placeholder="Enter course" required> 
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" id="saveStudent">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Student edit modal -->
<div class="modal fade" id="studentEditModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"><i class="fa fa-edit"></i> Edit  student</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            
            <form id="update_student">
                <!-- Show error message -->
                <div id="errorMessageUpdate" class="alert alert-danger d-none m-3"></div>

                <!-- modal body -->
                <div class="modal-body">
                    <input type="hidden" id="student_id" name="student_id">
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" class="form-control" name="stu_name" id="name" placeholder="Enter name" require>
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" class="form-control" name="email" id="email" placeholder="Enter email" require>
                    </div>
                    <div class="form-group">
                        <label>Phone</label>
                        <input type="text" class="form-control" name="phone" id="phone" placeholder="Enter phone" require>
                    </div>
                    <div class="form-group">
                        <label>Course</label>
                        <input type="text" class="form-control" name="course" id="course" placeholder="Enter course">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" id="updateStudent">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>
