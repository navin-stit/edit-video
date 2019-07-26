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
                $('.orderrDesc').find('a#orderId_' + data.orderId).attr('href', 'javascript:void(0);').css({'textDecoration': 'none', 'color': 'black'}).html('Assigned ..!!');
                $('.assignBtn').find('#order_' + data.orderId).parent().parent().hide();
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
                $('.orderrDesc').find('a#orderId_' + data.order_id).attr('href', 'http://video-editing.local/employee/viewOrderDetails/'+data.order_id).css({'textDecoration': 'underline','color' : '#72afd2'}).html('Click to see the complete details of this order');
                $('.assignBtn').find('#order_' + data.order_id).parent().parent().show();
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
    $(this).parent().parent().parent().siblings("#countdownForOrder").show();
    $(this).parent().parent().parent().siblings("#countdownForOrder").find('#proceed_' + procedOrderId[1]).show();

    $('.countdown-1_' + procedOrderId[1]).timeTo(259200, function () {
        alert('Countdown finished');
    });
    $('#reset-1').click(function () {
        $('#countdown-1').timeTo('reset');
    });

    /**
     * Hide hours
     */
    $('#countdown-11').timeTo({
        seconds: 100,
        displayHours: false
    });

    $('#clock-w-step-cb').timeTo({
        step: function () {
            console.log('Executing every 3 ticks');
        },
        stepCount: 3
    });

    var date = getRelativeDate(2);

    document.getElementById('date-str').innerHTML = date.toISOString();

    /**
     * Set timer countdown to specyfied date
     */
    $('#countdown-2').timeTo(date);

    var time = '23:59:59';
    document.getElementById('date2-str').innerHTML = time;
    /**
     * Set theme and captions
     */
    $('#countdown-3').timeTo({
        time: time,
        displayDays: 2,
        theme: "black",
        displayCaptions: true,
        fontSize: 48,
        captionSize: 14,
        lang: 'es'
    });

    /**
     * Simple digital clock
     */
    $('#clock-1').timeTo();

    function getRelativeDate(days, hours, minutes) {
        var d = new Date(Date.now() + 60000 /* milisec */ * 60 /* minutes */ * 24 /* hours */ * days /* days */);

        d.setHours(hours || 0);
        d.setMinutes(minutes || 0);
        d.setSeconds(0);

        return d;
    }
});
// End Empolyee Orders 

//Customer create videos
//
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
    var custId = $(this).parent().parent().parent().parent().parent().find("#custId").val();
    var custOrderId = $(this).parent().parent().parent().parent().parent().find("#custOrderId").val();
    var product_link = $(this).parent().parent().parent().parent().siblings('#productLink').find('.inputProductLink').val();
//    orderImag
    $(this).parent().parent().parent().parent().parent().find(".toGetImgId").find('img').each(function () {
        if ($(this).hasClass('selectedImage')) {
            var image_id = $(this).attr('id').split('_');
            _imgId = image_id[1];
        }
    });
//    gender
    $(this).parent().parent().parent().parent().parent().find('.selectedGender').find('input[type="checkbox"]').each(function () {
        if ($(this).prop('checked') == true) {
            var gendrId = $(this).parent().attr('id').split('_');
            _gendrId = gendrId[1];
        }
    });
//    music
    $(this).parent().parent().parent().parent().parent().find('.selectedMusic').find('input[type="checkbox"]').each(function () {
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
//customer create video end

//customer select video

//select video data 
var _selectdMusic = '';
var _selectdLogo = '';
//get logo file name only
$(document).ready(function () {
    $('#uploadedLogo').change(function (e) {
        var filename = e.target.files[0].name;
        _selectdLogo = filename;
    });
});
//get music file name only
$(document).ready(function () {
    $('#uploadMusic').change(function (e) {
        var music_filename = e.target.files[0].name;
        _selectdMusic = music_filename;
    });
});
//next to video variation
$(document).on('click', '.saveForm2Data', function () {
    var selectdVideo = $(this).parent().parent().parent().parent().siblings('#firstSectionContent').find('.carousel-inner').find('.active').attr('id').split('_');
    var custOrderId = $(this).parent().parent().parent().parent().parent().find('#cusOrderId').val();

    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        enctype: "multipart/form-data",
        url: webUrl + '/storeSelectVideoData',
        type: "post",
        data: {selectdVideo: selectdVideo[1], selectdMusic: _selectdMusic, selectdLogo: _selectdLogo, cus_ordId: custOrderId},
        dataType: 'json',
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
    var cusOrderId = $(this).parent().parent().parent().parent().parent().find("#cusOrderId").val();
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
        data: { sub_planPrice: price, cus_orderId: cusOrderId ,transaction_id : transactionId},
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
        data: {unsub_planPrice: price, cus_orderId: cusOrderId, _transId : transactionId},
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
//end unsubscribePlanPrice

//next for video-variation 

$(document).on('click','#nextForVideoVariation', function(){    
    var serviceId = $('.nextAfterSubscribe').children('input[type="hidden"]').val();
    if(serviceId != '' && serviceId != null){
         window.location.href = webUrl + '/paypal/' + serviceId;
     }else{
        alert('Please Select Plan');
     }
});


//customer select video end


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


