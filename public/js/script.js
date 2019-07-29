//Empolyee Orders 
//for assign order
var _orderId;
$(document).on('click', '.assignOrder', function () {
    var orderId = $(this).attr('id').split('_');
    var empId = $('#logdInEmpId').val();
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: webUrl + '/assidnedOrder',
        type: "POST",
        data: {emp_id: empId, order_id: orderId[1]},
        dataType: 'json',
        success: function (data)
        {
            if (data.message == 'success') {
                $('.assignBtn').find('#order_' + data.orderId).prop('disabled', true);
                //$('.orderrDesc').find('a#orderId_' + data.orderId).attr('href', 'javascript:void(0);').css({'textDecoration': 'none', 'color': 'black'}).html('Assigned ..!!');
                $('.assignBtn').find('#order_' + data.orderId).parent().hide();
                $('.rejectOrProBtn').find('#orderSuccesReject_' + data.orderId).parent().show();
            } else {
                alert('Order has been taken');
            }
        }
    });
});

//for reject order
$(document).on('click', '.rejectOrder', function () {
    var ordr_id = $(this).attr('id').split('_');
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: webUrl + '/rejectOrder',
        type: "POST",
        data: {order_id: ordr_id[1]},
        dataType: 'json',
        success: function (data)
        {
            if (data.message == 'success') {
                $('.assignBtn').find('#order_' + data.order_id).prop('disabled', false);
                //$('.orderrDesc').find('a#orderId_' + data.order_id).attr('href', 'http://video-editing.local/employee/viewOrderDetails/' + data.order_id).css({'textDecoration': 'underline', 'color': '#72afd2'}).html('Click to see the complete details of this order');
                $('.assignBtn').find('#order_' + data.order_id).parent().show();
                $('.rejectOrProBtn').find('#orderSuccesReject_' + data.order_id).parent().hide();
            } else {
                alert('Something went wrong!!');
            }
        }
    });
});

//proceed
$(document).on('click', '.proceedOrder', function () {
    var procedOrderId = $(this).attr('id').split('_');
    $(this).parent().parent().parent().hide();
    //$(this).parent().parent().parent().siblings("#countdownForOrder").show();
    //$(this).parent().parent().parent().siblings("#countdownForOrder").find('#proceed_' + procedOrderId[1]).show();
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: webUrl + '/proceedOrder',
        type: "POST",
        data: {procedOrdrId: procedOrderId[1]},
        dataType: 'json',
        success: function (data) {
            if (data.message == 'success') {
                window.location.reload();
            } else {
                alert(data.error);
            }
        }
    });

});
// End Empolyee Orders 

//Customer create videos
$(document).on('click', '.getImgPath', function () {
    var imgId = $(this).attr('id').split('_');
    $('.toGetImgId').find('img').removeClass('selectedImage').css({'border': ' 1px solid rgba(0,0,0,.1)', 'backgroundColor': 'transparent'});
    $(this).addClass('selectedImage').css({'border': '1px solid red', 'backgroundColor': 'red'});
});
//select gender type
$(document).on('click', '.selectType', function () {
    var parentId = $(this).parent().attr('id').split('_');
    if (parentId[1] == 1) {
        $(this).parent().find('.gdr_' + parentId[1]).attr('id', 'male_' + parentId[1]);
        $(this).attr('for', 'male_' + parentId[1]);
    } else if (parentId[1] == 2) {
        $(this).parent().find('.gdr_' + parentId[1]).attr('id', 'female_' + parentId[1]);
        $(this).attr('for', 'female_' + parentId[1]);
    } else if (parentId[1] == 3) {
        $(this).parent().find('.gdr_' + parentId[1]).attr('id', 'both_' + parentId[1]);
        $(this).attr('for', 'both_' + parentId[1]);
    }
});

//select music type
$(document).on('click', '.selectMusicType', function () {
    var selectdType = [];
    var musicId = $(this).parent().attr('id').split('_');
    if (musicId[1] == 1) {
        $(this).parent().find('.music_' + musicId[1]).attr('id', 'chekboxRules_' + musicId[1]);
        $(this).attr('for', 'chekboxRules_' + musicId[1]);
    } else if (musicId[1] == 2) {
        $(this).parent().find('.music_' + musicId[1]).attr('id', 'safeTheInfo_' + musicId[1]);
        $(this).attr('for', 'safeTheInfo_' + musicId[1])
    }
});
//Next
$(document).on('click', '.Next', function () {
    var _imgId;
    var _gendrId;
    var _musicId;
    var custId = $(this).parent().parent().parent().parent().parent().parent().find("#custId").val();
    var custOrderId = $(this).parent().parent().parent().parent().parent().parent().find("#custOrderId").val();
    var product_link = $(this).parent().parent().parent().parent().parent().parent().find('#productLink').find('.inputProductLink').val();

//    orderImg
    $(this).parent().parent().parent().parent().parent().parent().find(".toGetImgId").find('img').each(function () {
        if ($(this).hasClass('selectedImage')) {
            var image_id = $(this).attr('id').split('_');
            _imgId = image_id[1];
        }
    });
//    gender
    $(this).parent().parent().parent().parent().parent().parent().find('.selectedGender').find('input[type="checkbox"]').each(function () {
        if ($(this).prop('checked') == true) {
            var gendrId = $(this).parent().attr('id').split('_');
            _gendrId = gendrId[1];
        }
    });
//    music
    $(this).parent().parent().parent().parent().parent().parent().find('.selectedMusic').find('input[type="checkbox"]').each(function () {
        if ($(this).prop('checked') == true) {
            var musicId = $(this).parent().attr('id').split('_');
            _musicId = musicId[1];
        }
    });
    if (custOrderId == '' && custOrderId == null) {
        custOrderId = '';
    }
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: webUrl + '/storeCustomerData',
        type: "post",
        data: {imgId: _imgId, genderId: _gendrId, musicId: _musicId, productLink: product_link,
            cust_id: custId, custOrderId: custOrderId},
        dataType: 'json',
        success: function (data) {
            if (data.message == 'success') {
                window.location.href = webUrl + '/select-video/' + data.cusOrderId;
            } else {
                alert(data.error);
            }
        }
    });
});
/*  Counter Start */
$(document).ready(function () {
    $('.counter').each(function () {
        var countDownDate = $(this).attr("title");
        var uploadVideo = $(this).attr('uploadVideo');
        var obj = $(this);
        // Update the count down every 1 second
        clock(obj, countDownDate, uploadVideo);

    });
});

function clock(obje, countDownDate, uploadVideo)
{
    var x = setInterval(function () {
        // Get todays date and time
        var now = new Date().getTime();
        // Find the distance between now an the count down date

        var distance = countDownDate - now;

        if (distance < 0)
        {
            // Take action if date overed
            if (uploadVideo != '' && uploadVideo != null) {
                var st = "<div class='tm'><label class='lbld' style='padding-left:8px'>D</label><b class='label-b'>:</b><label class='lblh' style='padding-left:8px'>O</label><b class='label-b'>:</b><label class='lblm' style='padding-left:8px'>N</label><b class='label-b'>:</b><label class='lbls' style='padding-left:8px'>E</label></div>";
                $(obje).html(st);
            } else {
                var st = "<div class='tm'><label class='lbld' style='padding-left:2px'>##</label><b class='label-b'>:</b><label class='lblh'>LA</label><b class='label-b'>:</b><label class='lblm'>TE</label><b class='label-b'>:</b><label class='lbls'>##</label></div>";
                $(obje).html(st);
            }
            clearInterval(x);
        } else
        {
            var days = Math.floor(distance / (1000 * 60 * 60 * 24));
            var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
            var seconds = Math.floor((distance % (1000 * 60)) / 1000);
            // Display the result in the element with id="demo"
            var st = "<div class='tm'><label class='lbld'>" + days + "</label><b class='label-b'>:</b><label class='lblh'>" + hours + "</label><b class='label-b'>:</b><label class='lblm'>" + minutes + "</label><b class='label-b'>:</b><label class='lbls'>" + seconds + "</label></div>";
            $(obje).html(st);
        }
    }, 1000);
}
/*  Counter End */

//customer create video end

//customer select video
//next to video variation
$(document).on('click', '.orderVideoByEmp', function () {
    var videoId = $(this).attr('id').split('_');
    $('.orderVideoByEmp').find('.getVideoId').removeClass('selectedVideo').css({'border': ' 1px solid rgba(0,0,0,.1)', 'backgroundColor': 'transparent'});
    $('.orderVideoByEmp').find('.video-fluid').find('source#link_' + videoId[1]).addClass('selectedVideo');
    $('.orderVideoByEmp').removeAttr('style');
    $(this).css({'border': '6px solid red', 'backgroundColor': 'red'});
});

$(document).on('click', '.saveForm2Data', function () {
    var selectdVideo;
    var music_data = $("#uploadedMusic").prop("files")[0];
    var logo_data = $("#uploadedLogo").prop("files")[0];
    var custOrderIdForMusic = $('#cusOrderId').val();
    var selectVideoByCust = $('.orderVideoByEmp').each(function () {
        if ($(this).find('.getVideoId').hasClass('selectedVideo')) {
            var selectdVideoId = $(this).attr('id').split('_');
            selectdVideo = selectdVideoId[1];
        }
    });
    var form_data = new FormData();
    form_data.append("music", music_data);
    form_data.append("logo", logo_data);
    form_data.append("_orderIdForMusic", custOrderIdForMusic);
    form_data.append("selectedVdeo", selectdVideo);
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        enctype: "multipart/form-data",
        url: webUrl + '/storeSelectVideoData',
        type: "post",
        cache: false,
        contentType: false,
        processData: false,
        dataType: 'json',
        data: form_data,
        success: function (data) {
            if (data.message == 'success') {
                window.location.href = webUrl + '/video-variations/' + data.cus_id;
            } else {
                alert(data.error);
            }
        }
    });

});

//back to create video
$(document).on('click', '#backToCreateVideoPage', function () {
    var cusOrderId = $(this).parent().parent().parent().parent().parent().parent().find("#cusOrderId").val();
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        enctype: 'multipart/form-data',
        url: webUrl + '/bakToCreateVideo',
        type: "post",
        data: {cusOrderId: cusOrderId},
        dataType: 'json',
        success: function (data) {
            if (data.message == 'success') {
                window.location.href = webUrl + '/create-video/' + data.cusSelectdOrder.id;
            } else {
                alert(data.error);
            }
        }
    });
});

// back 
//subscribePlanPrice
$(document).on('click', '.subscribePlanPrice', function () {
    var planPrice = $(this).text();
    var price = planPrice.substring(8, 15).trim();
    var cusOrderId = $(this).attr('orderId');
    var transactionId = $('#transactionId').val();
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: webUrl + '/storeSubscribePlan',
        type: "post",
        data: {sub_planPrice: price, cus_orderId: cusOrderId, transaction_id: transactionId},
        datatype: 'json',
        success: function (data)
        {
            if (data.message == 'success')
            {
                $('#frm_paypal').submit();
            } else
            {
                console.log(data.error);
            }
        }
    });
});
//end subscribePlanPrice

//unsubscribePlanPrice
$(document).on('click', '.unsubscribePlanPrice', function () {
    var planPrice = $(this).text();
    var price = planPrice.substring(8, 15).trim();
    var cusOrderId = $(this).attr('orderId');
    var transactionId = $('#transactionId').val();
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: webUrl + '/storeUnSubscribePlan',
        type: "post",
        data: {unsub_planPrice: price, cus_orderId: cusOrderId, _transId: transactionId},
        datatype: 'json',
        success: function (data)
        {
            if (data.message == 'success')
            {
                $('#frm_paypal_recurring').submit();

            } else
            {
                console.log(data.error);
            }
        }
    });
});
//end unsubscribePlanPrice

//customer select video end

//customer dashboard start
$(document).on('click', '.approveEdit', function ()
{
    var approveEditId = $(this).attr('id').split('_');
    $(this).hide();
    $(this).siblings('#approveShow_' + approveEditId[1]).show();
});

//dispute Modal

$(document).on('click', '.openDisputeModal', function () {
    $('#addComments').modal('show');
    var order_id = $(this).attr('id').split('_');
    $('#orderIdForCommentVideo').val(order_id[1]);

});

$(document).on('click', '#addCommentsForVideo', function () {
    var commentValue = $(this).parents('form').find('#txtAreaValue').val();
    var orderIdForComent = $(this).parents('form').find('input[type="hidden"]').val();
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: webUrl + '/addCusComm',
        type: "post",
        data: {commentValue: commentValue, orderIdCom: orderIdForComent},
        datatype: 'json',
        success: function (data)
        {
            if (data.message == 'success')
            {
                $('#txtAreaValue').val('');
                $('#addComments').modal('hide');
                $('.approveEdit').show();
                $('#approveShow_' + data.orderIdForComment).hide();
                alert('Comment Succesfully Send');

            } else {
                console.log(data.error);
            }
        }
    });
});


$(function () {
    var selectedClass = "";
    $(".filter").click(function () {
        selectedClass = $(this).attr("data-rel");
        $("#gallery").fadeTo(100, 0.1);
        $("#gallery div").not("." + selectedClass).fadeOut().removeClass('animation');
        setTimeout(function () {
            $("." + selectedClass).fadeIn().addClass('animation');
            $("#gallery").fadeTo(300, 1);
        }, 300);
    });
});


