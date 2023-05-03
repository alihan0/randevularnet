import axios from 'axios';
import $ from 'jquery';
import toastr from 'toastr';

toastr.options.progressBar = true;
toastr.options.timeOut = 1500;

$("#BtnLogin").on("click", function(){
    let email = $("#email").val();
    let password = $("#password").val();

    axios.post('/auth/login', {
        email : email,
        password : password
    }).then((res)=>{
        toastr[res.data.type](res.data.message);
        if(res.data.status){
            setInterval(() => {
                window.location.assign('/');
            }, 1500);
        }
    })
});