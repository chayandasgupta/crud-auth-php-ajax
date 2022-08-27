// Insert student 
$('#saveStudent').click(function(e) {
    e.preventDefault()

    var formData = $("#student_form").serialize();
    formData += "&add_student=" + true;

    $.ajax({
        type: 'POST',
        url : 'insert.php',
        data: formData,
        success: function(data) {
            
            var response = jQuery.parseJSON(data);

            if(response.status == 422) {

                $('#errorMessage').removeClass('d-none');
                $('#errorMessage').text(response.message);

            } else if(response.status == 200){

                $('#errorMessage').addClass('d-none');

                $('#successMessage').removeClass('d-none');
                $('#successMessage').text(response.message);

                setTimeout(function() {
                    $('#successMessage').addClass('d-none');
                }, 1500);

                $('#studentAddModal').modal('hide');
                $('#student_form')[0].reset();

                $('#myTable').load(location.href + " #myTable");

            } else if(response.status == 500) {
                alert(response.message);
            } else {
                alert(response.message);
            }
        },
    });
})

// Edit Student
$(document).on('click', '#editStudent', function(e) {
    e.preventDefault();

    let studentId = $(this).val();
    
    $.ajax({
        type: "GET",
        url: "edit.php?student_id=" + studentId,
        success: function (data) {

            let response = jQuery.parseJSON(data);
            if(response.status == 404) {

                alert(response.message);

            } else if(response.status == 200){
                $('#student_id').val(response.data.id);
                $('#name').val(response.data.stu_name);
                $('#email').val(response.data.email);
                $('#phone').val(response.data.phone);
                $('#course').val(response.data.course);

                $('#studentEditModal').modal('show');
            }

        }
    });
})

// Update student
$(document).on('submit', '#update_student', function (e) {
    e.preventDefault();

    var formData = $(this).serialize();
    formData += "&update_student=" + true;
    
    $.ajax({
        type: "POST",
        url: "update.php",
        data: formData,
        success: function (data) {

            var response = jQuery.parseJSON(data);

            if(response.status == 422) {
                $('#errorMessageUpdate').removeClass('d-none');
                $('#errorMessageUpdate').text(response.message);

            } else if(response.status == 200){

                // hide error message 
                $('#errorMessageUpdate').addClass('d-none');

                $('#successMessage').removeClass('d-none');
                $('#successMessage').text(response.message);

                setTimeout(function() {
                    $('#successMessage').addClass('d-none');
                }, 1500);
                
                $('#studentEditModal').modal('hide');
                $('#update_student')[0].reset();

                $('#myTable').load(location.href + " #myTable");

            } else if(response.status == 500) {
                alert(response.message);
            } else {
                alert(response.message);
            }
        }
    });

});

// Delete student
$(document).on('click', '#deleteStudent', function (e) {
    e.preventDefault();

    if(confirm('Are you sure you want to delete this data?'))
    {
        var student_id = $(this).val();
        $.ajax({
            type: "POST",
            url: "delete.php",
            data: {
                'delete_student': true,
                'student_id': student_id
            },
            success: function (data) {

                var response = jQuery.parseJSON(data);
                if(response.status == 500) {

                    alert(response.message);

                } else if (response.status == 200){
                    
                    $('#successMessage').removeClass('d-none');
                    $('#successMessage').text(response.message);

                    setTimeout(function() {
                        $('#successMessage').addClass('d-none');
                    }, 1500);

                    $('#myTable').load(location.href + " #myTable");

                } else {
                    alert(response.message)
                }
            }
        });
    }
});