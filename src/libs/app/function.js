window.onload = function(){ 

    $("#resimInput").on("change", function(){
        $(this).parent("div").removeClass("col-12");
        $(this).parent("div").addClass("col-8");
        $("#uploadBtn").removeClass("d-none");
    });
    $("#uploadBtn").on("click", function(){
        var file_data = $('#resimInput').prop('files')[0];   
        var form_data = new FormData();                  
        form_data.append('file', file_data);                         
        $.ajax({
            url: '/app/core/upload.php', // <-- point to server-side PHP script 
            dataType: 'text',  // <-- what to expect back from the PHP script, if anything
            cache: false,
            contentType: false,
            processData: false,
            data: form_data,                         
            type: 'POST',
            dataType: 'JSON',
            success: function(res){
                toastr[res.type](res.msg);
                $("#resim_path").val(res.img);
                $("#showImage").css("display","block");
                $("#showImage").html('<img style="size:background" width="50" src="https://queen.metatige.com/src/uploads/'+res.img+'"/>')
                
            }
         });
    })




    // LOGIN

    $("#btnLogin").on("click", function(e){
        e.preventDefault();
        let username = $("#inputUsername").val();
        let password = $("#inputPassword").val();

        $.ajax({
            type : 'POST',
            url  : '/app/core/account.php',
            dataType : 'JSON',
            data: {
                "req":"login",
                username:username,
                password:password
            },
            success: function(r){
                toastr[r.type](r.msg);
                if(r.ok){
                    setTimeout(() => {
                        window.location.assign("/");
                    }, 1500);
                }
            }
        })
    });

    // ADD ADMİN

    $("#btnAddAdmin").on("click", function(e){
        e.preventDefault();
        let formData = $("#formAddAdmin").serializeArray();

        $.ajax({
            type : 'POST',
            url  : '/app/core/account.php',
            dataType : 'JSON',
            data : {"req":"addAdmin",data:formData},
            success:function(r){
                toastr[r.type](r.msg);
                if(r.ok){
                    setInterval(() => {
                        window.location.assign("/home/admin/all");
                    }, 1000);
                }
            }
        })
    });

    // ADD STAFF

    $("#btnAddStaff").on("click", function(e){
        e.preventDefault();
        let formData = $("#formAddStaff").serializeArray();

        $.ajax({
            type : 'POST',
            url  : '/app/core/account.php',
            dataType : 'JSON',
            data : {"req":"addStaff",data:formData},
            success:function(r){
                toastr[r.type](r.msg);
                if(r.ok){
                    setInterval(() => {
                        window.location.assign("/home/staff/all");
                    }, 1000);
                }
            }
        })
    });
 // ADD CUSTOMER

 $("#btnAddCustomer").on("click", function(e){
    e.preventDefault();
    let formData = $("#formAddCustomer").serializeArray();

    $.ajax({
        type : 'POST',
        url  : '/app/core/account.php',
        dataType : 'JSON',
        data : {"req":"addCustomer",data:formData},
        success:function(r){
            toastr[r.type](r.msg);
            if(r.ok){
                setInterval(() => {
                    window.location.assign("/home/customer/all");
                }, 1000);
            }
        }
    })
});

//ADD SERVİCE
$("#btnAddService").on("click", function(e){
    e.preventDefault();
    let formData = $("#formAddService").serializeArray();

    $.ajax({
        type : 'POST',
        url  : '/app/core/service.php',
        dataType : 'JSON',
        data : {"req":"addService",data:formData},
        success:function(r){
            toastr[r.type](r.msg);
            if(r.ok){
                setInterval(() => {
                    window.location.assign("/home/service/all");
                }, 1000);
            }
        }
    })
});

//ADD AREAS 
$("#btnAddServiceAreas").on("click", function(e){
    e.preventDefault();
    let formData = $("#formAddServiceAreas").serializeArray();

    $.ajax({
        type : 'POST',
        url  : '/app/core/service.php',
        dataType : 'JSON',
        data : {"req":"addServiceAreas",data:formData},
        success:function(r){
            toastr[r.type](r.msg);
            if(r.ok){
                setInterval(() => {
                    window.location.assign("/home/service/areas");
                }, 1000);
            }
        }
    })
});

//ADD PACKAGES
$("#btnAddServicePackages").on("click", function(e){
    e.preventDefault();
    let package_name = $("#inputPackagename").val();
    let service = $("#inputService").val();
    let areas = $("#inputAreas").val();
    let session = $("#inputSession").val();
    let price = $("#inputPrice").val();

    $.ajax({
        type : 'POST',
        url  : '/app/core/service.php',
        dataType : 'JSON',
        data : {
            "req":"addServicePackages",
            package_name:package_name,
            service:service,
            areas:areas,
            session:session,
            price:price
        },
        success:function(r){
            toastr[r.type](r.msg);
            if(r.ok){
                setInterval(() => {
                    window.location.assign("/home/service/packages");
                }, 1000);
            }
        }
    })
});

$(".thisdaysession").on("click", function(e){
    let id = $(this).attr("id"); 
   
    
    $("#eventModal"+id).modal("show");

    
});
$(".addSession").on("click", function(){
    let date = $("#thisdate").val();
    let time = $(this).attr("id");
    
        $("#addEventModal").modal("show");  

        $("#selectCustomer").on("change", function(){
            let customer = $(this).val();

            $('#selectPackage')
            .find('option')
            .remove()
            .end()
            
            $.ajax({
                type : 'POST',
                url : '/app/connect/sales.php',
                dataType : 'JSON',
                data: {"req":"show_sales","cid":customer},
                success: function(r){
                    if(r.type == "warning"){
                        $("#selectPackage").css("border","1px solid red");
                        $("#selectPackage").append(new Option(r.msg, 0));
                    }else{
                        
                        let say = r.options.length;
                        $("#selectPackage").append(new Option("Seçin", 0));
                        for(let i = 0; i<say;i++){
                            
                           
                            $("#selectPackage").append(new Option(r.options[i].name, r.options[i].id));
                        }
                        //
                    }
                }
            })
        });

   
        $("#btnAddEvent").on("click", function(){
            let customer = $("#selectCustomer").val();
            let package = $("#selectPackage").val();

                $.ajax({
                    type  : 'POST',
                    url  : '/app/core/events.php',
                    dataType : 'JSON',
                    data: {
                        "req": "addEvent",
                        customer:customer,
                        package:package,
                        date:date,
                        time:time
                    },
                    success: function(r){
                        toastr[r.type](r.msg);
                        if(r.ok){
                            $("#addEventModal").modal("hide");
                            setInterval(() => {
                                window.location.reload();
                            }, 1000);
                        }
                    }
                })
        })
});

$(".complate_session").on("click", function(){
    let id = $(this).attr("id");

    $.ajax({
        type : 'POST',
        url  : '/app/core/events.php',
        dataType : 'JSON',
        data : {
            "req":"complate_session",
            id:id
        },
        success: function(r){
            toastr[r.type](r.msg);
            if(r.ok){
                setInterval(() => {
                    window.location.reload();
                }, 1000);
            }
        }
    })
});
$(".cancelled_session").on("click", function(){
    let id = $(this).attr("id");

    $.ajax({
        type : 'POST',
        url  : '/app/core/events.php',
        dataType : 'JSON',
        data : {
            "req":"cancelled_session",
            id:id
        },
        success: function(r){
            toastr[r.type](r.msg);
            if(r.ok){
                setInterval(() => {
                    window.location.reload();
                }, 1000);
            }
        }
    })
});

$(".add_note").on("click", function(){
    let id = $(this).attr("id");

    $("#addNoteModal").modal("show");

        $("#btnAddNote").on("click", function(){
            let note = $("#inputNote").val();
            let user = $("#user").val();

            $.ajax({
                type : 'POST',
                url  : '/app/core/events.php',
                dataType : 'JSON',
                data:{
                    "req":"add_note",
                    id:id,
                    user:user,
                    note:note
                },
                success: function(r){
                    toastr[r.type](r.msg);
                    if(r.ok){
                        $("#addNoteModal").modal("hide");
                    }
                }
            })
        })
});

$(".btnNotes").on("click", function(){
    $(".notes").toggle("slow");
});
$(".postpone_session").on("click", function(){
    let id = $(this).attr("id");
  
        $("#postponeModal").modal("show");
});



$(".btnAddPayment").on("click", function(){
    let cid = $(this).attr("id");

    $("#addPaymentModal").modal("show");
    $("#btnAddPayment").on("click", function(){
        let type = $("#selectPaymentType").val();
        let amount = $("#inputPaymentAmount").val();

        $.ajax({
            type : 'POST',
            url  : '/app/core/actions.php',
            dataType : 'JSON',
            data: {
                "req":"addPayment",
                cid:cid,
                type:type,
                amount:amount
            },
            success:function(r){
                toastr[r.type](r.msg);
                if(r.ok){
                    setInterval(() => {
                        window.location.reload();
                    }, 1000);
                }
            }
        })
    })
});

$(".btnAddPackage").on("click", function(){
    let cid = $(this).attr("id");
    let pid;
    $("#addPackageModal").modal("show");

    $("#selectSalesPackage").on("change", function(){
        pid = $(this).val();
        $("#inputSalesSession").val('');
        $("#inputSalesPrice").val('');
        $.ajax({
            type : 'POST',
            url  : '/app/connect/sales.php',
            dataType : 'JSON',
            data:{
                "req":"show_values",
                pid:pid
            },
            success:function(r){
                $("#packageDetail").show();

                    //$("#inputSalesSession").val(r.session);
                    $("#inputSalesPrice").val(r.price);
            }
        });
    });

    $("#btnAddSalesPackage").on("click", function(){
       // let session = $("#inputSalesSession").val();
        let price = $("#inputSalesPrice").val();

        $.ajax({
            type  : 'POST',
            url  : '/app/core/actions.php',
            dataType : 'JSON',
            data:{
                "req":"addSalesPackage",
                cid:cid,
                pid:pid,
                price:price
            },
            success: function(r){
                toastr[r.type](r.msg);
                if(r.ok){
                    setInterval(() => {
                        window.location.reload();
                    }, 1000);
                }
            }
        })
    });


});


$(".btnAddNoteCustomer").on("click", function(){
    let cid = $(this).attr("id");

    $("#addNoteModal").modal("show");

        $("#btnAddNote").on("click", function(){
            let note = $("#inputNote").val();
            let user = $("#user").val();

            $.ajax({
                type : 'POST',
                url  : '/app/core/actions.php',
                dataType : 'JSON',
                data:{
                    "req":"add_note",
                    cid:cid,
                    user:user,
                    note:note
                },
                success: function(r){
                    toastr[r.type](r.msg);
                    if(r.ok){
                        setInterval(() => {
                            window.location.reload();
                        }, 1000);
                    }
                }
            })
        })
});

$(".btnAddFile").on("click", function(){
    let cid = $(this).attr("id");
    
        $("#addFilesModal").modal("show");

        $("#btnAddFile").on("click", function(){
            let file = $("#resim_path").val();
            let type = $("#inputFileType").val();

            $.ajax({
                type : 'POST',
                url  : '/app/core/actions.php',
                dataType  :'JSON',
                data: {
                    "req":"add_file",
                    type:type,
                    cid:cid,
                    file:file
                },
                success: function(r){
                    toastr[r.type](r.msg);
                    if(r.ok){
                        setInterval(() => {
                            window.location.reload();
                        }, 1000);
                    }
                }
            })
        })
});



$("#btnUpdateCustomer").on("click", function(e){
    e.preventDefault();

    let id;
    let fname;
    let lname;
    let email;
    let phone;
    let tckn;
    let birthdate;
    let adress;

    id    = $("#customerID").val();
    fname = $("#putFirstName").val();
    lname = $("#putLastName").val();
    email = $("#putEmail").val();
    phone = $("#putPhone").val();
    tckn  = $("#putTc").val();
    birthdate = $("#putBirthdate").val();
    adress = $("#putAddress").val();

    $.ajax({
        type : 'POST',
        url  : '/app/core/account.php',
        dataType : 'JSON',
        data: {
            "req" : "updateCustomer",
            id:id,
            fname:fname,
            lname:lname,
            email:email,
            phone:phone,
            tckn:tckn,
            birthdate:birthdate,
            adress:adress
        },
        success: function(r){
            toastr[r.type](r.msg);
            if(r.ok){
                setInterval(() => {
                    window.location.assign("/home/customer/show/"+id);
                }, 1000);
            }
        }
    })
});

$(".redirectCustomerEdit").on("click", function(){
    let id = $(this).attr("id");

    window.location.assign("/home/customer/edit/"+id);
});


}