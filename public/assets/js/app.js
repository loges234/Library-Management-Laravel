
var bookID = 0;
var canIssue = 0; 
 $('.tickCorrect').hide();
$('.error').hide();
$('#add').click(function() {
    var book_name = $("input#book_name").val();
    var book_author = $("input#book_author").val();
    var book_category = $("select#book_category").val();    
    var book_category_name = $("select#book_category option:selected").text();
    var stock_qty = $("input#stock_qty").val();
    if (book_name != '' && book_author != '' && book_category != '' && stock_qty != '') {
        $.ajax({
            type: 'POST', 
            url: 'addbook',
            data: {
                '_token': $('input[name=_token]').val(),
                'book_name': book_name,
                'book_author': book_author,
                'book_category': book_category,     
                'stock_qty': stock_qty,
            },
            dataType: 'json',
            success: function(data) { 

                    $('.error').hide();
                    $('tbody#ins').prepend("" +
                        "<tr id='book-"+data.id+"'>" +
                        "<td class='text-center d-none'>" + data.id + "</td>" +
                        "<td>" + data.book_name + "</td>" +
                        "<td>" + data.book_author + "</td>" + 
                        "<td>" + book_category_name + "</td>" + 
                        "<td>" + data.stock_qty + " out of " + data.stock_qty + "</td>" +
                        "<td class='text-center'><button type='button' rel='tooltip' class='label label-success btn btn-xs' data-original-title='Available'>Available</button></td>" +
                        "<td class='text-center'>" +                    
                        " </button>" +
                        " <button type='button' rel='tooltip' title='' class='btn btn-warning btn-simple btn-xs' data-toggle='modal' data-target='#IssueModal' data-book_name='"+data.book_name+"' data-id='"+data.id+"' data-book_author='"+data.book_author+"' id='issue' data-original-title='Issue This Book'>" +
                        " <i class='material-icons'>gavel</i>" +
                        " </button>" +
                        "<button type='button' rel='tooltip' title='' class='btn btn-success btn-simple btn-xs' data-toggle='modal' data-target='#UpdateBook'  id='update' data-id='" +data.id +"' data-original-title='Update Information'>" +
                        " <i class='fa fa-edit'></i>" +
                        "</button>" +
                        "<button type='button' rel='tooltip' title='' class='delete btn btn-danger btn-simple btn-xs' data-toggle='modal' data-target='#DeleteBook' data-id='" + data.id + "' data-book_name='" + data.book_name + "' data-original-title='Delete This Book'>" +
                        "<i class='fa fa-times'></i>" +
                        "<div class='ripple-container'></div></button>" +
                        "</td>" +
                        "</tr>"
                    );

         $.notify(
         {  
            icon: '',
            title: '<strong>' + stock_qty + ' pcs ' + book_name + '</strong>',
            message: 'by ' + book_author + ' Added Successfully',
            url: '#',
            target: ''
        }, {      
            element: 'body',
            position: null,
            type: "info",
            allow_dismiss: true,
            newest_on_top: false,
            showProgressbar: false,
            placement: {
                from: "bottom",
                align: "right"
            },
            offset: 20,
            spacing: 10,
            z_index: 1031,
            delay: 9999,
            timer: 4000,
            url_target: '_blank',
            mouse_over: null,
            animate: {
                enter: 'animated fadeInDown',
                exit: 'animated fadeOutUp'
            },
            onShow: null,
            onShown: null,
            onClose: null,
            onClosed: null,
            icon_type: 'class',
            template: '<div data-notify="container" class="col-xs-11 col-sm-3 alert alert-{0}" role="alert">' +
                '<button type="button" aria-hidden="true" class="close" data-notify="dismiss">×</button>' +
                '<span data-notify="title">{1}</span> ' +
                '<span data-notify="message">{2}</span>' +
                '<div class="progress" data-notify="progressbar">' +
                '<div class="progress-bar progress-bar-{0}" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%;"></div>' +
                '</div>' +
                '<a href="{3}" target="{4}" data-notify="url"></a>' +
                '</div>'
        });
        $('#CreateBook').modal('hide');
        $('#book_name').val('');
        $('#book_author').val('');
        $('#book_category').val('');
        $('#stock_qty').val('');
    },
    error: function(data){
         var errors = data.responseJSON;
         $('.error').removeClass('d-none');
         $('.error').show();
         $('.error').html("");
         $.each(errors, function(index, val){
         $('.error').append("<strong>"+val+"<br></strong>");
         });         
     }
});
} 
    else {
        $('#error-modal').modal('show');
    }
});

$(document).on("click", ".add_book_cancel", function() {
            $('#book_name').val('');
            $('#book_author').val('');
            $('#book_category').val('');
            $('#stock_qty').val('');
            $('#error-modal').modal('hide');
            $('#CreateBook').modal('hide');
});
$(document).on("click", "#CreateCategory button.cancel", function() {
            $('#cat_name').val('');
            $('#CreateCategory').modal('hide');
});

// function for Update Book into Book::Database via AJAX
$('button#update_cancel').click(function() {

    $('#form-update').find('#id').val('');
    $('#form-update').find('#book_name').val('');
    $('#form-update').find('#book_author').val('');
    $('#form-update').find('#book_category').val('');
    $('#form-update').find('#stock_qty').val('');

     $('.error').addClass('hidden');

});
$('button#update_done').click(function() {
    
    var id = $('#form-update').find('#id').val();
    var bname = $('#form-update').find('#book_name').val();
    var bauthor = $('#form-update').find('#book_author').val();
    var bcategory = $('#form-update').find('#book_category').val();
    var stockqty = $('#form-update').find('#stock_qty').val();

    var row_id = "tr#book-"+id;
    if (stockqty != '' && bname != '' && bauthor != '' && bcategory != '') {
        $.ajax({
            type: 'POST',
            url: 'updatebook',
            data: {
                '_token': $('#form-update').find('input[name=_token]').val(),
                'id': id,
                'book_name': bname,
                'book_author': bauthor,
                'book_category': bcategory,     
                'stock_qty': stockqty,
            },
            dataType: 'json',
            success: function(data) { 
                    $('.error').hide();
                    $(row_id+ ' td:eq(0)').html(id);
                    $(row_id+ ' td:eq(1)').html(bname);
                    $(row_id+ ' td:eq(2)').html(bauthor);
                    $(row_id+ ' td:eq(3)').html(data[0].name);    
                    $(row_id+ ' td:eq(4)').html(data[0].stock_qty-data[0].borrow_qty+' out of '+data[0].stock_qty);       
// Notification for Update Done 
         $.notify({    
            icon: '',
            title: '<strong> Book Information Updated </strong>',
            message: '',
            url: '#',
            target: ''
        }, {        
            element: 'body',
            position: null,
            type: "info",
            allow_dismiss: true,
            newest_on_top: false,
            showProgressbar: false,
            placement: {
                from: "bottom",
                align: "right"
            },
            offset: 20,
            spacing: 10,
            z_index: 1031,
            delay: 9999,
            timer: 4000,
            url_target: '_blank',
            mouse_over: null,
            animate: {
                enter: 'animated fadeInDown',
                exit: 'animated fadeOutUp'
            },
            onShow: null,
            onShown: null,
            onClose: null,
            onClosed: null,
            icon_type: 'class',
            template: '<div data-notify="container" class="col-xs-11 col-sm-3 alert alert-{0}" role="alert">' +
                '<button type="button" aria-hidden="true" class="close" data-notify="dismiss">×</button>' +
                '<span data-notify="title">{1}</span> ' +
                '<span data-notify="message">{2}</span>' +
                '<div class="progress" data-notify="progressbar">' +
                '<div class="progress-bar progress-bar-{0}" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%;"></div>' +
                '</div>' +
                '<a href="{3}" target="{4}" data-notify="url"></a>' +
                '</div>'
        });       
        $('#book_name').val('');
        $('#book_author').val('');
        $('#book_category').val('');
        $('#stock_qty').val('');
        $('#UpdateBook').modal('hide');
    },
    error: function(data){
                $('.error').show();
                var errors = data.responseJSON;
                $('.error').removeClass('hidden');
                $('.error').html("");
                $.each(errors, function(index, val){
                        $('.error').append("<strong>"+val+"<br></strong>");
                });
     }
});
}
else {
        $('#error-modal').modal('show');
    } 
});
$('#updateCat button#cat_update_done').click(function() {
    
    var id = $('#form-edit-category').find('#id').val();
    var name = $('#form-edit-category').find('#name').val();

    if (name.length >= '4') {
        $.ajax({
            type: 'POST',
            url: 'updatecat',
            data: {
                '_token': $('#form-edit-category').find('input[name=_token]').val(),
                'id': id,
                'name': name,                
            },
            dataType: 'json',
            success: function(data) { 
                    $('.error').hide();
                       
// Notification for Update Done 
         $.notify({    
            icon: '',
            title: '<strong> Category Name Updated </strong>',
            message: '',
            url: '#',
            target: ''
        }, {        
            element: 'body',
            position: null,
            type: "info",
            allow_dismiss: true,
            newest_on_top: false,
            showProgressbar: false,
            placement: {
                from: "bottom",
                align: "right"
            },
            offset: 20,
            spacing: 10,
            z_index: 1031,
            delay: 9999,
            timer: 4000,
            url_target: '_blank',
            mouse_over: null,
            animate: {
                enter: 'animated fadeInDown',
                exit: 'animated fadeOutUp'
            },
            onShow: null,
            onShown: null,
            onClose: null,
            onClosed: null,
            icon_type: 'class',
            template: '<div data-notify="container" class="col-xs-11 col-sm-3 alert alert-{0}" role="alert">' +
                '<button type="button" aria-hidden="true" class="close" data-notify="dismiss">×</button>' +
                '<span data-notify="title">{1}</span> ' +
                '<span data-notify="message">{2}</span>' +
                '<div class="progress" data-notify="progressbar">' +
                '<div class="progress-bar progress-bar-{0}" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%;"></div>' +
                '</div>' +
                '<a href="{3}" target="{4}" data-notify="url"></a>' +
                '</div>'
        });       
        $('#id').val('');
        $('#name').val('');
        $('#updateCat').modal('hide');
    },
    error: function(data){
                $('.error').show();
                var errors = data.responseJSON;
                $('.error').removeClass('hidden');
                $('.error').html("");
                $.each(errors, function(index, val){
                        $('.error').append("<strong>"+val+"<br></strong>");
                });
     }
});
}
else {
        $('#error-modal').modal('show');
    } 
});
$('body').delegate('button#update','click',function(e){
    var id = $(this).data('id');
    $.get("book/edit", {id:id} ,function(data){
        $('#form-update').find('#id').val(data[0].id);
        $('#form-update').find('#book_name').val(data[0].book_name);
        $('#form-update').find('#book_author').val(data[0].book_author);
        $('#form-update select').val(data[0].category_id);
        $('#form-update').find('#stock_qty').val(data[0].stock_qty);       

    });

});

$('body').delegate('#user_info_show','click',function(e){
    var id = $(this).data('id');
    $.get("member/info", {id:id} ,function(data){
        $('#member_info_modal').find('p strong#member_id').html(data[0].member_id);
        $('#member_info_modal').find('p strong#member_name').html(data[0].member_name);
        $('#member_info_modal').find('p strong#member_blood_group').html(data[0].member_blood_group);
        $('#member_info_modal').find('p strong#member_email').html(data[0].member_email);
        $('#member_info_modal').find('p strong#member_nid_no').html(data[0].member_nid_no);
        $('#member_info_modal').find('p strong#department').html(data[0].member_dept); 
        $('#member_info_modal').find('p strong#member_contact').html(data[0].member_contact);     
      
        $('#member_info_modal .member_photo img').attr("src", data[0].member_photo);       

    });

});
$(document).on("click", "button.delete", function() {
    $('tr').removeClass('deletable');
    $(this).parents("tr").addClass('deletable');
    bookID = $(this).data('id');
    var bookname = $(this).data('book_name');
    $("strong#show_delete_name").html(bookname);
    $("input#show_delete_id").val(bookID);

                
});
            $('button.yesDel').click(function() {
                    $.ajax({
                        type: 'POST',
                        url: 'delete',
                        data: {
                            '_token': $('input[name=_token]').val(),
                            'id': bookID
                        },
                        success: function(data) {
                            if (data===400){
                            $('#CantDeleteBook').modal('show');
                        }
                            else {
                                 $('#CantDeleteBook').modal('hide');
                                $('tr.deletable').remove();                                
                            }
                         
                        }
                    });
                    $('#DeleteBook').modal('hide');
            });
$(function() {
            $("#CreateBook #book_name").autocomplete({
                    source: 'nameSearch'
            });         
            $("#CreateBook #book_author").autocomplete({
                    source: 'authorSearch' 
            });
                    $("#CreateBook #book_name").autocomplete( "option", "appendTo", "#CreateBook" );

                    $("#CreateBook #book_author").autocomplete( "option", "appendTo", "#CreateBook" );
});
$(function() {
            $("#UpdateBook #book_name").autocomplete({
                    source: 'nameSearch'
            });         
            $("#UpdateBook #book_author").autocomplete({
                    source: 'authorSearch' 
            });

                    $("#UpdateBook #book_name").autocomplete( "option", "appendTo", "#UpdateBook" );
                    $("#UpdateBook #book_author").autocomplete( "option", "appendTo", "#UpdateBook" );

             
});

$('body').delegate('input#member_email','click',function(e){
    var member_email = $(this).val();
    $.get("book/issue", {member_email:member_email} , function(data){
        if(data[0]){
        $('h4 span#member_name').html(data[0].member_name);
        $('input#member_id').val(data[0].member_id);
        $('.tickCorrect').show();  
        canIssue = 1;     
    }
    else { 
          $('.tickCorrect').hide(); 
        $('#member_name').html('');
        $('#member_id').html('');
        canIssue = 0;
    }
    }); 
});

$(document).on("click", "button#issue", function() {
   var id = $(this).data('id');
   
    $.get("book/edit", {id:id} ,function(data){
        $('#IssueModal').find('#show_book_id').val(data[0].id); 
        $('#IssueModal span#show_book_name').html(data[0].book_name);
        $('#IssueModal span#show_book_author').html(data[0].book_author);   
        if (data.stock_qty - data.borrow_qty <= 0) {
            $('button#issue_done').hide();
        }
       

    });
});

$('#IssueModal button#modal-issue_cancel').click(function() {
$('#IssueModal .tickCorrect').hide();
$('#IssueModal #member_name').html('');
 $('#IssueModal input#member_email').val('');
 $('#IssueModal input#stock_qty').val('');
 $('#IssueModal input#issue_return_date').val('');


});

 

$('button#issue_done').click(function() {
    
    var member_id = $('#form-issue input#member_id').val(); 
    var book_id =   $('#form-issue input#show_book_id').val();
    var issue_quantity =   $('#form-issue input#issue_quantity').val();
    var return_date =   $('#form-issue input#issue_return_date').val();

    if (canIssue == 1 && issue_quantity != '' && return_date != '') {
        $.ajax({
            type: 'POST',
            url: 'issueBook',
            data: {
                '_token': $('#form-issue').find('input[name=_token]').val(),
                'book_id': book_id,
                'member_id': member_id,
                'issue_qty': issue_quantity,
                'return_date': return_date,
            },
            dataType: 'json',
            success: function(data) { 
                
// Notification for Update Done 
         $.notify({    
            icon: '',
            title: '<strong> Book Issued Successfully </strong>',
            message: '',
            url: '#',
            target: ''
        }, {        
            element: 'body',
            position: null,
            type: "info",
            allow_dismiss: true,
            newest_on_top: false,
            showProgressbar: false,
            placement: {
                from: "bottom",
                align: "right"
            },
            offset: 20,
            spacing: 10,
            z_index: 1031,
            delay: 9999,
            timer: 4000,
            url_target: '_blank',
            mouse_over: null,
            animate: {
                enter: 'animated fadeInDown',
                exit: 'animated fadeOutUp'
            },
            onShow: null,
            onShown: null,
            onClose: null,
            onClosed: null,
            icon_type: 'class',
            template: '<div data-notify="container" class="col-xs-11 col-sm-3 alert alert-{0}" role="alert">' +
                '<button type="button" aria-hidden="true" class="close" data-notify="dismiss">×</button>' +
                '<span data-notify="title">{1}</span> ' +
                '<span data-notify="message">{2}</span>' +
                '<div class="progress" data-notify="progressbar">' +
                '<div class="progress-bar progress-bar-{0}" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%;"></div>' +
                '</div>' +
                '<a href="{3}" target="{4}" data-notify="url"></a>' +
                '</div>'
        });       
        member_id = '' ;
        book_id = '' ;
        issue_quantity = '' ;
        return_date = '' ;
        $('#IssueModal').modal('hide');
    },
    error: function(data){
                $('.error').show();
                var errors = data.responseJSON;
                $('.error').removeClass('hidden');
                $('.error').html("");
                $.each(errors, function(index, val){
                        $('.error').append("<strong>"+val+"<br></strong>");
                });
     }
});
}
else {
        $('#error-modal').modal('show');
    }
});


$(document).on("click", "button.return_book", function() {
    $('tr').removeClass('deletable');
    $(this).parents("tr").addClass('deletable');
    var issueID = $(this).data('id');
    var qty = $(this).data('qty');
    var book_id = $(this).data('book_id');
    var bookName = $(this).data('book_name');
    $("#ReturnBook strong#issued_book_name").html(bookName);
            $('button.yesReturn').click(function() {
                    $.ajax({
                        type: 'POST',
                        url: 'returnBook', 
                        data: {
                            '_token': $('input[name=_token]').val(),
                            'id': issueID,
                            'qty': qty,
                            'book_id':book_id
                        },
                        success: function() {
                            $('tr.deletable').remove();
                        }
                    });
                    $('#ReturnBook').modal('hide');
            });
                
});


$(document).on("click", "button.delete_member", function() {
      $('tr').removeClass('deletable');
    $(this).parents("tr").addClass('deletable');
    var member_id =  $(this).parents("tr").find('input#member_id').val();
            $('button.yesDel').click(function() {
                    $.ajax({
                        type: 'POST',
                        url: 'member/delete',
                        data: {
                            '_token': $('input[name=_token]').val(),
                            'member_id': member_id
                        },
                        success: function() {
                            $('tr.deletable').remove();
                        }
                    });
                    $('#memberDelete').modal('hide');
            });
                
});
$(document).on("click", "button.delete_category", function() {
      $('tr').removeClass('deletable');
    $(this).parents("tr").addClass('deletable');
    var id =   $(this).data('id');
            $('button.yesDel').click(function() {
                    $.ajax({
                        type: 'POST',
                        url: 'category/delete',
                        data: {
                            '_token': $('input[name=_token]').val(),
                            'id': id
                        },
                        success: function() {
                            $('tr.deletable').remove();
                        }
                    });
                    $('#memberDelete').modal('hide');
            });
                
});




// Member Registration AJAX


$('.add-Member').click(function() {
    

    var member_name = $('form#Registration-Form').find('input[name=member_name]').val();
    var member_email = $('form#Registration-Form').find('input[name=member_email]').val();
    var member_contact = $('form#Registration-Form').find('input[name=member_contact]').val();
    var member_nid_no = $('form#Registration-Form').find('input[name=member_nid_no]').val();
    var member_blood_group = $('form#Registration-Form').find('input[name=member_blood_group]').val();
    var member_dept = $('form#Registration-Form').find('input[name=member_dept]').val();
    var member_reg_no = $('form#Registration-Form').find('input[name=member_reg_no]').val();

    if (member_name != '' && member_email != '' && member_contact != '' && member_nid_no != '') {
        $.ajax({
            type: 'POST',
            url: 'member/create',
            data: {
                '_token': $('form#Registration-Form').find('input[name=_token]').val(),                
                'member_name': member_name,
                'member_email': member_email,
                'member_contact': member_contact,
                'member_nid_no': member_nid_no,     
                'member_blood_group': member_blood_group,
                'member_dept': member_dept,
                'member_reg_no': member_reg_no,
            },
            dataType: 'json',
            success: function(data) { 
                    $('.error').hide();
// Notification for Update Done 
         $.notify({    
            icon: '',
            title: '<strong> Member Registered Successfully! <br> Member ID :'+data.id+'</strong>',
            message: '',
            url: '#',
            target: ''
        }, {        
            element: 'body',
            position: null,
            type: "info",
            allow_dismiss: true,
            newest_on_top: false,
            showProgressbar: false,
            placement: {
                from: "bottom",
                align: "right"
            },
            offset: 20,
            spacing: 10,
            z_index: 1031,
            delay: 9999,
            timer: 4000,
            url_target: '_blank',
            mouse_over: null,
            animate: {
                enter: 'animated fadeInDown',
                exit: 'animated fadeOutUp'
            },
            onShow: null,
            onShown: null,
            onClose: null,
            onClosed: null,
            icon_type: 'class',
            template: '<div data-notify="container" class="col-xs-11 col-sm-3 alert alert-{0}" role="alert">' +
                '<button type="button" aria-hidden="true" class="close" data-notify="dismiss">×</button>' +
                '<span data-notify="title">{1}</span> ' +
                '<span data-notify="message">{2}</span>' +
                '<div class="progress" data-notify="progressbar">' +
                '<div class="progress-bar progress-bar-{0}" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%;"></div>' +
                '</div>' +
                '<a href="{3}" target="{4}" data-notify="url"></a>' +
                '</div>'
        });       

        $('input[name=member_name]').val('');
        $('input[name=member_email]').val('');
        $('input[name=member_contact]').val('');
        $('input[name=member_nid_no]').val('');
        $('input[name=member_blood_group]').val('');
        $('input[name=member_dept]').val('');
        $('input[name=member_reg_no]').val('');

    },
    error: function(data){
                $('.error').show();
                var errors = data.responseJSON;
                $('.error').removeClass('hidden');
                $('.error').html("");
                $.each(errors, function(index, val){
                        $('.error').append("<strong>"+val+"<br></strong>");
                });
     }
});
}
else {
        $('#error-modal').modal('show');
    } 
});











$('body').delegate('button#updateMember','click',function(e){
    var id = $(this).data('id');
    $.get("member/getinfo", {id:id} ,function(data){

        $('#form-update_member').find('#member_id').val(data[0].member_id);
        $('#form-update_member').find('#member_name').val(data[0].member_name);
        $('#form-update_member').find('#member_email').val(data[0].member_email);
        $('#form-update_member').find('#member_contact').val('0'+data[0].member_contact);
        $('#form-update_member').find('#member_nid_no').val(data[0].member_nid_no);
        $('#form-update_member').find('#member_blood_group').val(data[0].member_blood_group);       
        $('#form-update_member').find('#member_dept').val(data[0].member_dept);       
        $('#form-update_member').find('#member_reg_no').val(data[0].member_reg_no);       

    });

});

$('button#member_update_done').click(function() {
    
    var member_id = $('#form-update_member').find('#member_id').val();
    var member_name = $('#form-update_member').find('#member_name').val();
    var member_email = $('#form-update_member').find('#member_email').val();
    var member_contact = $('#form-update_member').find('#member_contact').val();
    var member_nid_no = $('#form-update_member').find('#member_nid_no').val();
    var member_blood_group = $('#form-update_member').find('#member_blood_group').val();
    var member_dept = $('#form-update_member').find('#member_dept').val();
    var member_reg_no = $('#form-update_member').find('#member_reg_no').val();

    if (member_name != '' && member_email != '' && member_contact != '' && member_nid_no != '') {
        $.ajax({
            type: 'POST',
            url: '/member/update',
            data: {
                '_token': $('#form-update_member').find('input[name=_token]').val(),
                'member_id': member_id,
                'member_name': member_name,
                'member_email': member_email,
                'member_contact': member_contact,
                'member_nid_no': member_nid_no,     
                'member_blood_group': member_blood_group,
                'member_dept': member_dept,
                'member_reg_no': member_reg_no,
            },
            dataType: 'json',
            success: function(data) { 
                    $('.error').hide();
// Notification for Update Done 
         $.notify({    
            icon: '',
            title: '<strong> Member Information Updated </strong>',
            message: '',
            url: '#',
            target: ''
        }, {        
            element: 'body',
            position: null,
            type: "info",
            allow_dismiss: true,
            newest_on_top: false,
            showProgressbar: false,
            placement: {
                from: "bottom",
                align: "right"
            },
            offset: 20,
            spacing: 10,
            z_index: 1031,
            delay: 9999,
            timer: 4000,
            url_target: '_blank',
            mouse_over: null,
            animate: {
                enter: 'animated fadeInDown',
                exit: 'animated fadeOutUp'
            },
            onShow: null,
            onShown: null,
            onClose: null,
            onClosed: null,
            icon_type: 'class',
            template: '<div data-notify="container" class="col-xs-11 col-sm-3 alert alert-{0}" role="alert">' +
                '<button type="button" aria-hidden="true" class="close" data-notify="dismiss">×</button>' +
                '<span data-notify="title">{1}</span> ' +
                '<span data-notify="message">{2}</span>' +
                '<div class="progress" data-notify="progressbar">' +
                '<div class="progress-bar progress-bar-{0}" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%;"></div>' +
                '</div>' +
                '<a href="{3}" target="{4}" data-notify="url"></a>' +
                '</div>'
        });       
        $('#member_id').val('');
        $('#member_name').val('');
        $('#member_email').val('');
        $('#member_contact').val('');
        $('#member_nid_no').val('');
        $('#member_blood_group').val('');
        $('#member_dept').val('');
        $('#member_reg_no').val('');

        $('#UpdateMember').modal('hide');
    },
    error: function(data){
                $('.error').show();
                var errors = data.responseJSON;
                $('.error').removeClass('hidden');
                $('.error').html("");
                $.each(errors, function(index, val){
                        $('.error').append("<strong>"+val+"<br></strong>");
                });
     }
});
}
else {
        $('#error-modal').modal('show');
    } 
});
$('#addCategory').click(function() {
    var cat_name = $("input#cat_name").val();

    if (cat_name != '') {
        $.ajax({
            type: 'POST', 
            url: 'addCategory',
            data: {
                '_token': $('input[name=_token]').val(),
                'name': $('input[name=cat_name]').val(),
            },
            dataType: 'json',
            success: function(data) { 

                    $('.error').hide();                 

         $.notify(
         {  
            icon: '',
            title: '',
            message: 'Category Added Successfully',
            url: '#',
            target: ''
        }, {      
            element: 'body',
            position: null,
            type: "info",
            allow_dismiss: true,
            newest_on_top: false,
            showProgressbar: false,
            placement: {
                from: "bottom",
                align: "center"
            },
            offset: 20,
            spacing: 10,
            z_index: 1031,
            delay: 9999,
            timer: 4000,
            url_target: '_blank',
            mouse_over: null,
            animate: {
                enter: 'animated fadeInDown',
                exit: 'animated fadeOutUp'
            },
            onShow: null,
            onShown: null,
            onClose: null,
            onClosed: null,
            icon_type: 'class',
            template: '<div data-notify="container" class="col-xs-11 col-sm-3 alert alert-{0}" role="alert">' +
                '<button type="button" aria-hidden="true" class="close" data-notify="dismiss">×</button>' +
                '<span data-notify="title">{1}</span> ' +
                '<span data-notify="message">{2}</span>' +
                '<div class="progress" data-notify="progressbar">' +
                '<div class="progress-bar progress-bar-{0}" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%;"></div>' +
                '</div>' +
                '<a href="{3}" target="{4}" data-notify="url"></a>' +
                '</div>'
        }); 
         $('#cat_name').val('');
        $('#CreateCategory').modal('hide');
       
    },
    error: function(data){
         var errors = data.responseJSON;
         $('.error').show();
         $('.error').html("");
         $.each(errors, function(index, val){
         $('.error').append("<strong>"+val+"<br></strong>");
         });         
     }
});
} 
    else {
        $('#error-modal').modal('show');
    }
});
$('button#UpdateCategory').on('click',function(e){
    var id = $(this).data('id');
    var name = $(this).data('name');

        $('#form-edit-category').find('#id').val(id);
        $('#form-edit-category').find('#name').val(name);
});


$(document).on('click','.card-content.table-responsive .pagination a', function(e){
    e.preventDefault();
    var page = $(this).attr('href').split('page=')[1];
    readPage(page);
});

function readPage(page) {
    $.ajax({
        url : '/books/paginate?page='+page
    }).done(function(data){
        $('.table-responsive').html(data);
    })
}
$(function() {
            $(".books-search input").autocomplete({
                    source: 'bookSearch'
            });  
});
$(function() {
            $(".issuebooks-search input").autocomplete({
                    source: 'issuesearchName'
            });  
});

$(document).on('input','.books-search input',function(){    
    var searchinput = $(this).val();
    ajaxsearch(searchinput);

});
$(document).on('change','.books-search input',function(){    
    var searchinput = $(this).val();
    ajaxsearch(searchinput);

});
function ajaxsearch(searchinput) {
    $.ajax({
        url : '/books/ajaxsearch?term='+searchinput
    }).done(function(data){
        $('.table-responsive').html(data);
    })
}