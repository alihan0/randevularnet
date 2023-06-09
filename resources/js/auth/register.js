import axios from 'axios';
import $ from 'jquery';
import toastr from 'toastr';

toastr.options.progressBar = true;
toastr.options.timeOut = 1500;
toastr.options.escapeHtml = true;

$("#BtnRegister").on("click", function(){
    let firstname = $("#firstname").val();
    let lastname = $("#lastname").val();
    let email = $("#email").val();
    let password = $("#password").val();
    let company = $("#company").val();

    axios.post('/auth/register', {
        firstname : firstname,
        lastname : lastname,
        email : email,
        password : password,
        company:company
    }).then((res)=>{
        toastr[res.data.type](res.data.message);
        if(res.data.status){
            setInterval(() => {
                window.location.assign('/');
            }, 1500);
        }
    })
});