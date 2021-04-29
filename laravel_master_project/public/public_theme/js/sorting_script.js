

$(document).ready(function(){
    $('#sort').on('change',function(){
        // alert("You entered p1!");
         this.form.submit();
     });
  });

  $(document).ready(function(){
    $('#sort4').on('change',function(){
        // alert("You entered p1!");
         this.form.submit();
     });
  });


  $(document).ready(function(){
    $('#sort2').on('change',function(){
        // alert("You entered p1!");
         this.form.submit();
     });
  });
    
  $(document).ready(function(){
    $('#sort3').on('change',function(){
        // alert("You entered p1!");
         this.form.submit();
     });
  });




 function  deletfunction(id){
    $("#delete_btn").prop("href","delet/"+id);
 }



 function acceptfunction(id){
    $("#accept_btn").prop("href","accept/"+id);
 }


//  $(function(){
//      $('#markasread').click(function() {
// alert('click')
//      })
     
//       })

    //   function markNotificationAsRead(){
    //       $.get('/markAsRead');
    //   }



    function viewPassword()
{
  var passwordInput = document.getElementById('password');
  var passStatus = document.getElementById('pass-status');
 
  if (passwordInput.type == 'password'){
    passwordInput.type='text';
    passStatus.className='fa fa-eye';
    
  }
  else{
    passwordInput.type='password';
    passStatus.className='fa fa-eye-slash';
  }
}


function viewPassword2()
{
  var passwordInput = document.getElementById('password-confirm');
  var passStatus = document.getElementById('pass-status2');
 
  if (passwordInput.type == 'password'){
    passwordInput.type='text';
    passStatus.className='fa fa-eye';
    
  }
  else{
    passwordInput.type='password';
    passStatus.className='fa fa-eye-slash';
  }
}