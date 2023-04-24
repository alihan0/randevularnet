import axios from 'axios';
import $ from 'jquery';

$("#BtnLogin").on("click", function(){
    let email = $("#email").val();
    let password = $("#password").val();

    axios.post('/auth/login', {
        email : email,
        password : password
    }).then((res)=>{
        alert(res.data.message);
    })
});