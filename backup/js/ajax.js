//Add Employees
var _active;
$(document).on('click', '#addEmployee', function () {
    var empName = $(this).parent().siblings('.modal-body').find('#employeeName').val();
    var empEmail = $(this).parent().siblings('.modal-body').find('#employeeEmail').val();    
    var empContact = $(this).parent().siblings('.modal-body').find('#employeeContact').val();
    var activeChkId = $(this).parent().siblings('.modal-body').find('#chk_1');
    var deActiveChkId = $(this).parent().siblings('.modal-body').find('#chk_0');
    //    validation
    if(empEmail == "" ){
         $('#errorMessage').css('display','block').html('Email can not be left blank');
        $('#employeeEmail').css('border','1px solid red').focus();
        return false;
     }
     
     
    if ($(activeChkId).prop('checked') == false){
        $('.chekErrorMsg').html('Please Select One').css('color','red');
        return false;
    }
  
    if ($(activeChkId).is(':checked') == true)
    {      
        _active = 1;
       
        
    } else if ($(deActiveChkId).is(':checked') == true)
    {       
        _active = 0;
         
    }

        
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: webUrl + '/addEmployee',
        type: "POST",
        data: {empValue: empName, empEmail: empEmail, empContact: empContact, status: _active},
        dataType: 'json',
        success: function (data)
        {
            if (data.message == 'success') {
                $('#employeeName').val("");
                $('#employeeEmail').val("");
                $('#employeeContact').val("");
                $('#chk_1').prop('checked', false);
                $('#chk_0').prop('checked', false);
                alert('Record Added Successfully');
                $('#addEmployeeModalForm').modal('hide');
                $('.appendData').append('<tr id='+ data.employeeData.id +'><td>' + data.employeeData.id + '</td>\n\
                    <td id="empName">' + data.employeeData.name + '</td><td id="empEmail">' + data.employeeData.email + '</td>\n\
                    <td id="empContact">' + data.employeeData.contact + '</td>\n\
                    <td>' + data.employeeData.last_login + '</td><td id="empStatus">' + data.employeeData.status + '</td>\n\
                    <td><a id="emp_' + data.employeeData.id + '" class="editEmp" style="margin:1rem 1rem"><i class="fa fa-edit"></i></a>\n\
                    <a id="emp_' + data.employeeData.id + '" class="removeEmp"><i class="fa fa-trash"></i></a>\n\
                    </td>\n\
                    </tr>')
                }else if(data.message == 'user_exists'){
                    $('#errorMessage').css('display','block').html('User Already exists');
                    $('#employeeEmail').css('border','1px solid red').focus();
                }
                else {
                    alert(data.error);
                }
        }
    });

});
//end

//Delete Employee
$(document).on('click', '.removeEmp', function () {
    if (!confirm("Are you sure you want to delete.?")) {
        return false;
    }
    var OBJ = $(this);
    var id = $(this).attr('id').split('_');
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: webUrl + '/removeEmployee',
        type: "delete",
        data: {empid: id[1]},
        dataType: 'json',
        success: function (data) {
            if (data.message == 'success') {
                //alert("Data Succesfully Deleted");
                $(OBJ).parent().parent().remove();
            } else {
                alert(data.error);
            }
        }
    });
});

//end

//edit Employee
var _empId;
$(document).on('click', '.editEmp', function () {
    var empId = $(this).attr('id').split('_');
    //alert(empId[1]);return false;
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: webUrl + '/updateEmp',
        type: "post",
        data: {empIds: empId[1]},
        dataType: 'json',
        success: function (data)
        {
            if (data.message == 'success') {
                $("#editEmployeeModalForm").modal('show');
                $("#emp_id").val(data.emp_data.id);
                $("#user_id").val(data.emp_data.user_id);
                $("#emp_name").val(data.emp_data.name);
                $("#emp_email").val(data.emp_data.email);
                $("#emp_contact").val(data.emp_data.contact);
                if (data.emp_data.status == 1) {
                    $("#chek_1").prop('checked', true);
                } else {
                    $("#chek_0").prop('checked', true);
                }
            } else {
                alert(data.error);
            }
        }
    });
    _empId = empId[1];
});
//end

//update
$(document).on('click','#UpdateEmp', function () {
    var id = _empId;
    var active;
    var name = $(this).parents('.modal-content').find('#emp_name').val();
    var userId = $(this).parents('.modal-content').find('#user_id').val();  
    var email = $(this).parents('.modal-content').find('#emp_email').val();
    var contact = $(this).parents('.modal-content').find('#emp_contact').val();
    var activeChkId = $(this).parents('.modal-content').find('#chek_1');
    var deActiveChkId = $(this).parents('.modal-content').find('#chek_0');
    if ($(activeChkId).is(':checked') == true)
    {
        active = 1;
    } else if ($(deActiveChkId).is(':checked') == true)
    {
        active = 0;
    }
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: webUrl + '/updateEmpData',
        type: "POST",
            data: {id: id, user_id : userId, emp_name: name, emp_email: email, emp_cnt: contact, sts: active},
        dataType: 'json',
        success: function (data)
        {           
            if (data.messsage == 'success') {
                 alert('Record Updated Successfully');
                $('#emp_name').val("");
                $('#emp_email').val("");
                $('#emp_contact').val("");
                $('#chek_1').prop('checked', false);
                $('#chek_0').prop('checked', false);               
                $('#editEmployeeModalForm').modal('hide');              
                $('#' + data.emp_data.id).find('#empName').html(data.emp_data.name);
                $('#' + data.emp_data.id).find('#empEmail').html(data.emp_data.email);
                $('#' + data.emp_data.id).find('#empContact').html(data.emp_data.contact);
                $('#' + data.emp_data.id).find('#empStatus').html(data.emp_data.status);
             
            } else {
                alert(data.error);
            }
        }
    });

});
//end