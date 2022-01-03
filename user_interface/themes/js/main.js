
    $(window).scroll(function(){
        var scroll = $(window).scrollTop();
        if(scroll == 0){
            $('#mainColor').css('background', 'transparent');
        } else{
            $('#mainColor').css('background', 'rgba(0, 0, 0)');
        }
    });

function get_value_username(){
    let username = document.getElementById('inputname').value;
    return username;
}

function get_value_pass(){
    let pass  = document.getElementById('pass');
    if(pass.value ===""){
        return;
       }else if(CheckPassword(pass.value)){
          pass.classList.add('is-valid');
          valid_pass.classList.add('valid-feedback');
          valid_pass.innerHTML = "Correct, try another...";
          return pass.value;
       }else{
          pass.classList.add('is-invalid');
          valid_pass.classList.add('invalid-feedback');
          valid_pass.innerHTML = "Not Correct, try another...";
       }
}


function get_value_email(){
    let email = document.getElementById('email');
    let Valid_email = document.getElementById('valid_email');
    let valid_pass = document.getElementById('valid_pass');
    if(ValidateEmail(email.value)){
        email.classList.add('is-valid');
        Valid_email.classList.add('valid-feedback');
        Valid_email.innerHTML ="Valid email address!";
        return email.value;
        

    }else{
        email.classList.add('is-invalid');
        Valid_email.classList.add('invalid-feedback');
        Valid_email.innerHTML ="You have entered an invalid email address!";
     
        
    }
   
    
    
}
function ValidateEmail(inputText)
{
var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
if(inputText.match(mailformat))
{

   return true;
}
else
{

   return false;
}
}

function CheckPassword(inputtxt) 
{ 
 
var passw=/^(?=.*\d)(?=.*[!@#$%^&*])(?=.*[a-z])(?=.*[A-Z]).{8,}$/;
if(inputtxt.match(passw)) 
{ 
return true;

}
else
{ 
return false;
}
}

// function get_image(){
//     // document.getElementById('pic_profile').click();
//     document.getElementById('pic_profile').onchange = function () {
//         files = document.getElementById('pic_profile').files; 
//         console.log(files);
//        get_Data(files) ;
      
    
//     }
    
   
   
// }
function get_Data(image){
    let user_name = get_value_username();
    let pass  = get_value_pass();
    let email = get_value_email();
    // let image = get_image();
    // console.log(image);
    ajax_upload(email,pass,user_name);

}

function ajax_upload(email,pass,username) {
    // if (file_obj != undefined) {
        var form_data = new FormData();
        form_data.append('email', email);
        form_data.append('New_pass', pass);
        form_data.append('username',username);
        //  for (i = 0; i < file_obj.length; i++) {
        //     form_data.append('file[]', file_obj[i]);
        // }
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                 $('#selectedFile').val('');  
                alert(this.responseText)
               
            }
        };
        xhttp.open("POST", "editprofile.php", true);
        xhttp.send(form_data)
    // }

}