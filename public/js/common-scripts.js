/*---LEFT BAR ACCORDION----*/
//var baseUrl = "http://localhost:8080/recruitCRM/public/index.php/";
var baseUrl = "http://manageamazon.com/CRM/index.php/";
$(function() {
    $('#nav-accordion').dcAccordion({
        eventType: 'click',
        autoClose: true,
        saveState: true,
        disableLink: true,
        speed: 'slow',
        showCount: false,
        autoExpand: true,
//        cookie: 'dcjq-accordion-1',
        classExpand: 'dcjq-current-parent'
    });

    // chosen select box
   $(".chosen-industry").chosen({no_results_text: "Oops, nothing found!"});

    $('.choose-client').change(function(e) {
        console.log($(e.target).val());
        if($(e.target).val()>0){
            getClientContacts($(e.target).val());
        }
        
   });


    
});

var Script = function () {

//    sidebar dropdown menu auto scrolling

    jQuery('#sidebar .sub-menu > a').click(function () {
        var o = ($(this).offset());
        diff = 250 - o.top;
        if(diff>0)
            $("#sidebar").scrollTo("-="+Math.abs(diff),500);
        else
            $("#sidebar").scrollTo("+="+Math.abs(diff),500);
    });

//    sidebar toggle

    $(function() {
        function responsiveView() {
            var wSize = $(window).width();
            if (wSize <= 768) {
                $('#container').addClass('sidebar-close');
                $('#sidebar > ul').hide();
            }

            if (wSize > 768) {
                $('#container').removeClass('sidebar-close');
                $('#sidebar > ul').show();
            }
        }
        $(window).on('load', responsiveView);
        $(window).on('resize', responsiveView);
    });

    $('.fa-bars').click(function () {
        if ($('#sidebar > ul').is(":visible") === true) {
            $('#main-content').css({
                'margin-left': '0px'
            });
            $('#sidebar').css({
                'margin-left': '-210px'
            });
            $('#sidebar > ul').hide();
            $("#container").addClass("sidebar-closed");
        } else {
            $('#main-content').css({
                'margin-left': '210px'
            });
            $('#sidebar > ul').show();
            $('#sidebar').css({
                'margin-left': '0'
            });
            $("#container").removeClass("sidebar-closed");
        }
    });

// custom scrollbar
    $("#sidebar").niceScroll({styler:"fb",cursorcolor:"#e8403f", cursorwidth: '3', cursorborderradius: '10px', background: '#404040', spacebarenabled:false, cursorborder: '', zindex: '1000'});

    $("html").niceScroll({styler:"fb",cursorcolor:"#e8403f", cursorwidth: '6', cursorborderradius: '10px', background: '#404040', spacebarenabled:false,  cursorborder: '', zindex: '1000'});

// widget tools

    jQuery('.panel .tools .fa-chevron-down').click(function () {
        var el = jQuery(this).parents(".panel").children(".panel-body");
        if (jQuery(this).hasClass("fa-chevron-down")) {
            jQuery(this).removeClass("fa-chevron-down").addClass("fa-chevron-up");
            el.slideUp(200);
        } else {
            jQuery(this).removeClass("fa-chevron-up").addClass("fa-chevron-down");
            el.slideDown(200);
        }
    });

    jQuery('.panel .tools .fa-times').click(function () {
        jQuery(this).parents(".panel").parent().remove();
    });


//    tool tips

    $('.tooltips').tooltip();

//    popovers

    $('.popovers').popover();



// custom bar chart

    if ($(".custom-bar-chart")) {
        $(".bar").each(function () {
            var i = $(this).find(".value").html();
            $(this).find(".value").html("");
            $(this).find(".value").animate({
                height: i
            }, 2000)
        })
    }


}();
// add new department by user 
function addDepartment(){
    console.log("New Department");
    var dpt_name = document.getElementById("dpt_name").value;
    console.log(dpt_name);
    if(dpt_name==""){
        return false;
    }
$data = {
    'table' : 'client_company_departments',
    'data' : {
        'dpt_name' : dpt_name
    }
}

    $.ajax({
       url: baseUrl+'ajax/add',
       data : $data,
       dataType : 'json',
       type : 'POST',
       success : function(response,status,xhr){
            console.info(response,status,xhr);
            if(response.status){
                var option;
                option = '<option value="'+ response.data.dpt_code + '">' + response.data.dpt_name+ '</option>';
                $(".dpt_select").append(option).val(response.data.dpt_code);
                $('#modal-add-more').modal('toggle');
            }
       }
       
    });
}

// convert to client from selected leads
function convertToClient(){
    console.log($("#leads").find(":input[type=checkbox]"));
    var items = $("#leads").find(":input[type=checkbox]");
    var selected = [];
    $.each(items,function(index,item){
        console.log($(item).prop('checked'));
        if($(item).prop('checked')){
            selected.push($(item).val());
        }
    });
    console.log(selected);
    if(!selected.length){
        alert("please select leads");
        return;
    }

    $data = {        
        'data' : {
            'leads' : selected
        }
    }

    $.ajax({
       url: baseUrl+'ajax/converttoclient',
       data : $data,
       dataType : 'json',
       type : 'POST',
       success : function(response,status,xhr){
            console.info(response,status,xhr);
            if(response.status){
               window.location.reload();
            }
       }
       
    });


}

// add new department by user 
function getClientContacts(client){
    console.log(client,"getClientContacts");
    
$data = {
    'table' : 'contacts',
    'data' : {
        'client' : client
    }
}

    $.ajax({
       url: baseUrl+'ajax/read',
       data : $data,
       dataType : 'json',
       type : 'POST',
       success : function(response,status,xhr){
            console.info(response,status,xhr);
           
            if(response.status){
                var option;
                for(var item in response.data)
                option += '<option value="'+ response.data[item].id + '">' + response.data[item].first_name+ '</option>';
                console.log(option);
                $(".client-contacts").empty().append(option);
                
            }
       }
       
    });
}