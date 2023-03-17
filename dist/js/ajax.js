$(document).ready(function(){

    $("#historyBtn").click(function (e) {
        e.preventDefault();

        let co = $("#co").val();
        let id = $("#historyId").val();
        let doctorid = $("#doctorid").val();
        let service = $("#serviceId").val();
        let dateCreated = $("#dateCreated").val();

        if (co === "") {
            alert('رجاء قم بكتابة تاريخ المرض');
        } else {
        $.ajax({

            url: "control/patientHistory/saveHistory.php",
            method: "POST",
            data: {id:id ,serviceId: service,doctorid : doctorid,history: co,dateCreated:dateCreated},
            dataType: "text",
            success: function (data) {
                var da = jQuery.parseJSON(data);

                if(da.success === true) {
                    $("#coSuccess").css('display', 'block').addClass('alert-success').html('تم حفظ تاريخ المرض بنجاج');
                    location.reload(true);
                }else {
                    $("#coSuccess").css('display', 'block').addClass('alert-danger').html('حصل خطاء حاول مرة اخري');
                }
                // location.reload(true);
            }
        });
       }
    });



    $("#examBtn").click(function (e) {
        e.preventDefault();

        let exam = $("#exam").val();
        let id = $("#historyId").val();
        let doctorid = $("#doctorid").val();
        let service = $("#serviceId").val();
        let dateCreated = $("#dateCreated").val();
        if (exam === "") {
            alert('رجاء قم بكتابة الكشف السريري');
        } else {
            $.ajax({
                url: "control/patientExamination/saveExamination.php",
                method: "POST",
                data: {id: id,serviceId : service  ,doctorid : doctorid,examination : exam , dateCreated : dateCreated },
                dataType: "text",
                success: function (data) {
                    var da = jQuery.parseJSON(data);
                    if(da.success === true) {
                        $("#examSuccess").css('display', 'block').addClass('alert-success').html('تم حفظ الكشف السريري بنجاج');
                        location.reload(true);
                    }else {
                        $("#examSuccess").css('display', 'block').addClass('alert-danger').html('حصل خطاء حاول مرة اخري');
                    }
                    // location.reload(true);
                }
            });
        }
    });



    $("#piBtn").click(function (e) {
        e.preventDefault();

        let pi = $("#pi").val();
        let id = $("#piId").val();
        let doctorid = $("#doctorid").val();
        let service = $("#serviceId").val();
        let dateCreated = $("#dateCreated").val();
        if (pi === "") {
            alert('رجاء قم بكتابة الفحص الاولي');
        } else {
            $.ajax({
                url: "control/patientPi/savePi.php",
                method: "POST",
                data: {id: id , serviceId : service ,doctorid : doctorid, pi : pi , dateCreated : dateCreated},
                dataType: "text",
                success: function (data) {
                    var da = jQuery.parseJSON(data);

                    if(da.success === true) {
                        $("#piSuccess").css('display', 'block').addClass('alert-success').html('تم حفظ الكشف الاولي بنجاج');
                        location.reload(true);
                    }else {
                        $("#piSuccess").css('display', 'block').addClass('alert-danger').html('حصل خطاء حاول مرة اخري');
                    }
                    // location.reload(true);
                }
            });
        }
    });



    $("#finalBtn").click(function (e) {
        e.preventDefault();

        let note = $("#note").val();
        let id = $("#fId").val();
        let doctorid = $("#doctorid").val();
        let service = $("#serviceId").val();
        let diseaseid = $("#diseaseid").val();
        let dateCreated = $("#dateCreated").val();

            $.ajax({
                url: "control/patientFinal/saveFinal.php",
                method: "POST",
                data: {id: id , serviceId : service ,doctorid : doctorid, diseaseid : diseaseid , note : note , dateCreated : dateCreated},
                dataType: "text",
                success: function (data) {
                    var da = jQuery.parseJSON(data);

                    if(da.success === true) {
                        $("#finalSuccess").css('display', 'block').addClass('alert-success').html('تم حفظ الكشف النهائي بنجاج');
                        location.reload(true);
                    }else {
                        $("#finalSuccess").css('display', 'block').addClass('alert-danger').html('حصل خطاء حاول مرة اخري');
                    }
                    // location.reload(true);
                }
            });

    });




    $("#tranBtn").click(function (e) {
        e.preventDefault();


        let docName = $("#doctername").val();
        let id = $("#tranId").val();
        let service = $("#tranServiceId").val();
        let transferPlace = $("#transferPlace").val();
        let reasonForTransfer = $("#reasonForTransfer").val();
        let dateCreated = $("#dateCreated").val();

        $.ajax({
            url: "control/services/saveTran.php",
            method: "POST",
            data: {id: id , serviceid : service ,doctername : docName, transferPlace : transferPlace , reasonForTransfer : reasonForTransfer , dateCreated : dateCreated},
            dataType: "text",
            success: function (data) {
                var da = jQuery.parseJSON(data);

                if(da.success === true) {
                    $("#tranSuccess").css('display', 'block').addClass('alert-success').html('تم  اتمام التحويل بنجاح');
                }else {
                    $("#tranSuccess").css('display', 'block').addClass('alert-danger').html('حصل خطاء حاول مرة اخري');
                }
                // location.reload(true);
            }
        });

    });


    $("#type_id").change(function(){
        let type_id = $(this).val();
        $.ajax({
            url:"api/fetchCheckup.php",
            method:"POST",
            data:{type_id:type_id},
            dataType:"text",
            success:function(data)
            {
                $("#checkupid").html(data);
            }
        });
    });









})