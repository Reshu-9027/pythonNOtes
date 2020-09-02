``` php

<!DOCTYPE html>
<html dir="ltr" lang="en">
<head>
    <!-- Meta Tags -->
    <meta name="viewport" content="width=device-width,initial-scale=1.0" />
    <meta http-equiv="content-type" content="text/html; charset=UTF-8" />
    <meta name="description" content="Medinova - Health & Medical HTML Template" />
    <meta name="keywords" content="building,business,construction,cleaning,transport,workshop" />
    <meta name="author" content="ThemeMascot" />
    <!-- Page Title -->
    <title>IQI</title>
    <link href="assets/images/logo.png" rel="shortcut icon" type="image/png">
    <link href="assets/images/logo.png" rel="apple-touch-icon">
    <link href="assets/images/logo.png" rel="apple-touch-icon" sizes="72x72">
    <link href="assets/images/logo.png" rel="apple-touch-icon" sizes="114x114">
    <link href="assets/images/logo.png" rel="apple-touch-icon" sizes="144x144">
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="assets/css/jquery-ui.min.css" rel="stylesheet" type="text/css">
    <link href="assets/css/animate.css" rel="stylesheet" type="text/css">
    <link href="assets/css/css-plugin-collections.css" rel="stylesheet" />
    <link id="menuzord-menu-skins" href="assets/css/menuzord-skins/menuzord-boxed.css" rel="stylesheet" />
    <link href="assets/css/style-main.css" rel="stylesheet" type="text/css">
    <link href="assets/css/custom-bootstrap-margin-padding.css" rel="stylesheet" type="text/css">
    <link href="assets/css/responsive.css" rel="stylesheet" type="text/css">
    <link href="assets/css/colors/theme-skin-blue.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="assets/alertifyjs/css/alertify.css">
    <link rel="stylesheet" href="assets/custom.css">
    <style>
        * {
            box-sizing: border-box;
            color: #000;
        }
        
        .section-heading {
            text-transform: uppercase;
            color: #616060;
        }
        
        .btn-primary {
            text-transform: capitalize;
        }
        .swal-button--online ,.swal-button--ofline {
              background-color: #334c58;
        }
    </style>
</head>

<body class="">
    <div id="wrapper">
        <!-- Header -->
        <header id="header" class="header">
            <div class="header-nav">
                <div class="header-nav-wrapper navbar-scrolltofixed bg-lightest">
                    <div class="container">
                        <nav id="menuzord-right" class="menuzord blue bg-lightest">
                            <a class="menuzord-brand pull-left flip" href="user_dashboard_en.html">
                                <img src="assets/images/logo-2.png" alt="">
                            </a>
                            <ul class="menuzord-menu" id="headnav">
                                                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </header>
<div class="main-content">
            <section>
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <h2 class="font-17 section-heading">Select your slot</h2>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <section class="divider parallax layer-overlay overlay-light" data-stellar-background-ratio="0.5" data-bg-img="http://placehold.it/1920x1280">
                                <div class="container">
                                    <div class="section-content text-center">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div id="full-event-calendar"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </section>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
    <!-- external javascripts -->
    <script src="assets/js/jquery-2.2.0.min.js"></script>
    <script src="assets/js/jquery-ui.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/jquery-plugin-collection.js"></script>
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <script type="text/javascript" src="assets/js/f.js"></script>
    <script src="assets/js/custom.js"></script> 
    <script src="assets/alertifyjs/alertify.js"></script>
    <script src="assets/js/usercustom.js"></script>
    <script src="assets/js/logout.js"></script>
    <script src="assets/js/sweetalert.js"></script>
    <script>
        $(document).ready(function() {
            let loginStatus = localStorage.getItem("LoginStatus");
            var prefLang = localStorage.getItem("prefLang");
            console.log(loginStatus);
            if (loginStatus == 1) {
                let userName = localStorage.getItem('UserName');
                $('#profile-link').append(`<a href="#home">${userName}</a>`);
            } else {
                if (prefLang == 'en') {
                    window.location.replace('login_en.html');
                } else {
                    window.location.replace('login_vn.html');
                }
            }
        });
    </script>



    <script type="text/javascript">
  $(document).ready(function() { 
  
        
            var prefLang = localStorage.getItem("prefLang");
$('#calendar').fullCalendar('removeEvents');
     var userid = localStorage.getItem("UserId");
            var docid = localStorage.getItem("docid");
            var atype = "online";
            var arr = { lan :prefLang , id:userid  ,did:docid , type: atype };
        $.ajax({
            type: "POST",
            datatype:"json",
            url: "/healthcare.loc/admin/doctorschedule",
            data:JSON.stringify(arr),
            success: function(result)
            {
    
            var res = $.parseJSON(JSON.stringify(result));
                var obj = JSON.parse(res);
                
                if(obj.status==true)
                {
                  var eventh =[];
                  for (i = 0; i < obj.apdata.length; i++)
                    { 
                        var calendarEvents=  {
                          title: 'Booked',
                          start: obj.apdata[i].appointment_date+"T"+obj.apdata[i].appointment_time,
                          description: 'long description',
                        };
                        eventh.push(calendarEvents);
                    }
                  var bhour =[];
                   for (i = 0; i < obj.whdata.length; i++) { 
                if(obj.whdata[i].working_week_day=='Monday'){ var day = 1;  }
                if(obj.whdata[i].working_week_day=='Tuesday'){ var day = 2; }
                if(obj.whdata[i].working_week_day=='Wednesday'){ var day = 3; }
                if(obj.whdata[i].working_week_day=='Thursday'){ var day = 4; }
                if(obj.whdata[i].working_week_day=='Friday'){ var day = 5; }
                if(obj.whdata[i].working_week_day=='Saturday'){ var day = 6; }
                if(obj.whdata[i].working_week_day=='Sunday'){ var day = 0;}

                  var business = {
                    dow: [day], 
                    start: obj.whdata[i].working_hour_start ,
                    end: obj.whdata[i].working_hour_end
                  };
                   bhour.push(business);

                }   

  $('#full-event-calendar').fullCalendar({
    defaultView: 'agendaWeek',
    selectable: true,
    allDaySlot: false,
    defaultTimedEventDuration: '00:30:00',
    minTime: "07:00:00",
    maxTime: "20:00:00",
    slotDuration: '00:30:00',
    slotLabelInterval: 30,
    slotLabelFormat: 'h(:mm)a',
    
    header: {
      left: 'prev,next today',
      center: 'title',
      right: 'agendaDay,agendaWeek,listDay'
    },
    events: eventh,
    businessHours: bhour,
    selectConstraint: "businessHours",
    select: function(start, end, jsEvent, view) 
    {
        if (start.isAfter(moment())) 
        {
            var ddate = start.format("YYYY-MM-DD");
            var ttime = start.format("HH:mm:ss");
            var doc = localStorage.getItem("docid");
            var arr = { lan :prefLang , da:ddate , ti :ttime , did :doc};
            ajaxcalltimeslot(arr , ddate ,ttime);
        } 
        else 
        {
          alertify.alert('Warning','Cannot book an appointment in the past!');
        }
    },
    eventClick: function(calEvent, jsEvent, view) {
      alertify.alert('Warning','Slot Already Booked');
    }
  });
}
}
});
});
</script>
<script type="text/javascript">
    function ajaxcalltimeslot(arr , date , time)
    {
        $.ajax({
            type: "POST",
            datatype:"json",
            url: "/healthcare.loc/admin/checkslot",
            data:JSON.stringify(arr),
            success: function(result)
            {
                var res = $.parseJSON(JSON.stringify(result));
                var obj = JSON.parse(res);
             if(obj.status == true)
             {
                alert("Slot Already Full");
                return false;
             }else
             {
             
                  swal("Do You Want to book Appointment At "+date+" "+time+" ? Pls Select Mode" , {
  buttons: {
    
    online: {
      text: "Book ONline!",
      value: "online",
    },

    ofline:{
      text: "Book Ofline",
      value: "Ofline"
    },
    cancel: "Cancle!",
  },
})
.then((value) => {
  switch (value) {
  
    case "online":
      swal("Booked!","Online appointment Booked At  "+date+" "+time+"" , "success");
      book_appointment(date , time , value); 
      console.log(value);
      break;
 
    case "Ofline":
      swal("Booked!","Ofline Appointment booked at  "+date+" "+time+"" , "success");
       console.log(value);
       book_appointment(date , time , value);
      break;
 
    default:
      swal("Thanx For Searching!");
  }
});






                /*var mji= alertify.confirm('Pls Confirm', 'Do You Want to book Appointment At '+date+' '+time+'' ,function(){ 
                book_appointment(date , time); 
                alertify.success('Booked') }
                , function(){ alertify.error('Cancel')}
                );*/ 
                       
             }
           }
          });
  }
</script>
<script type="text/javascript">
  function book_appointment(date , time , typ )
  {
    //alert(typ); return false;
      var utype = localStorage.getItem("patient_type");
      if(utype==1){ usertype="user"; userid=localStorage.getItem("patient_Id"); }
      if(utype==0){ usertype="member"; userid=localStorage.getItem("patient_Id"); }
      var doc = localStorage.getItem("docid");
      var mode=typ;
       var logid = localStorage.getItem("UserId");

      var arr = { da:date , ti :time , did :doc , typeuser:usertype , patient:userid , aptype:mode , loginid:logid  ,userkiid:logid};
      

    $.ajax({
            type: "POST",
            datatype:"json",
            url: "/healthcare.loc/admin/bookappointment",
            data:JSON.stringify(arr),
            success: function(result)
            {
                var res = $.parseJSON(JSON.stringify(result));
                var obj = JSON.parse(res);
             if(obj.status == true)
             {
                $("#full-event-calendar").fullCalendar('renderEvent', {
                 title: "MyAppointment",
                  start: date+"T"+time,
                  stick: true,
                  color:"red"
          });

                setTimeout(function(){ window.location ='shop_cart_en.html'; },1000);

             }
             else
             {
              return false;
             }
           }
          }); 
  }
</script>
</body>

</html>

``
