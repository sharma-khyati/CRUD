$(document).ready(function(){

    $.ajax({
        type: "GET",
        url: "http://localhost/student/Controller/StudentController.php",
        success: function(result) {
            if(result != -1){

                json = JSON.parse(result);

                var tb = $('.table');
                $.each(json, function(i, value){
                    $('td').addClass('data');
                    tb.append("<tr id="+value.id+"><td>"+ value.name +"</td><td>"+ value.password + "</td><td>" + value.city + "</td><td>" + value.dob + "</td><td><button class='edit'>Edit</button><button class='save'>Save</button><button class='delete'>Delete</button</td></tr>");
                    $('.save').hide();
                });
                $('td').addClass('data');
                $('button').addClass('btn btn-primary');

            }else{
                alert("No User Found ");
            }

        },
        error: function(result) {
            alert(JSON.stringify(result));
            alert('error');
        }
    });

});


$(document).on('click', '.edit', function() {
    $(this).parent().siblings('td.data').each(function() {
        var content = $(this).html();
        $(this).html('<input value="'+content+'"/>');
    });
    $(this).siblings('.save').show();
    $(this).hide();
});





$(document).on('click','.save',function(){
    $(this).parent()
      $.ajax({
        type: "POST",
        url: "http://localhost/student/Controller/StudentController.php",
        data: {
            id: $(this).parent().parent()[0].id,
            name: $('input')[0].value,
            password: $('input')[1].value,
            city: $('input')[2].value,
            dob: $('input')[3].value,
            requestType:'update'
        },
        success: function(result) {
            alert('User updated successfully');
        },
        error: function(result) {
            alert(JSON.stringify(result));
            alert('error');
        }
    });
    $('input').each(function() {
        var content = $(this).val();
        $(this).html(content);
        $(this).contents().unwrap();
      });
    $(this).siblings('.edit').show();
    $(this).hide();
});


$(document).on('click','.create',function(){
    $(this).parent()
      $.ajax({
        type: "POST",
        url: "http://localhost/student/Controller/StudentController.php",
        data: {
            name: $('input')[0].value,
            password: $('input')[1].value,
            city: $('input')[2].value,
            dob: $('input')[3].value,
            requestType:'create'
        },
        success: function(result) {
            alert('User Added successfully !! You will be redirected to detail page ');
            window.location.replace(window.location.origin+"/student");

        },
        error: function(result) {
            alert(JSON.stringify(result));
            alert('error');
        }
    });
});


$(document).on('click','.delete',function(){
    $(this).parent()
      $.ajax({
        type: "POST",
        url: "http://localhost/student/Controller/StudentController.php",
        data: {
            id: $(this).parent().parent()[0].id,
            requestType:'delete'
        },
        success: function(result) {
            alert('User deleted successfully');
            location.reload();
        },
        error: function(result) {
            alert(JSON.stringify(result));
            alert('error');
        }
    });
});
