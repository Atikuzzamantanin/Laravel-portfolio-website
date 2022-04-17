 //Contact Send

  $('#contactSendBtnid').click(function(){

   var name = $('#name').val();
   var number = $('#number').val();
   var email = $('#email').val();
  var message = $('#msid').val();
  sendContact(name,number,email,message);
  });


function sendContact(contact_name,contact_mobile,contact_emil,contact_msg)
{

  if(contact_name.length==0){
    $('#contactSendBtnid').html('আপনার নাম লিখুন !');
    setTimeout(function(){
      $('#contactSendBtnid').html('পাঠিয়ে দিন');
    }, 3000)

  }else if(contact_mobile.length==0){
    $('#contactSendBtnid').html('আপনার মোবাইল নাম্বার লিখুন !');
     setTimeout(function(){
      $('#contactSendBtnid').html('পাঠিয়ে দিন');
    }, 3000)
  }else if(contact_emil.length==0){
    $('#contactSendBtnid').html('আপনার ইমেইল লিখুন !');
     setTimeout(function(){
      $('#contactSendBtnid').html('পাঠিয়ে দিন');
    }, 3000)
  }else if(contact_msg.length==0){
    $('#contactSendBtnid').html('আপনার মেসেজ লিখুন !');
     setTimeout(function(){
      $('#contactSendBtnid').html('পাঠিয়ে দিন');
    }, 3000)
  }
else{
  $('#contactSendBtnid').html('পাঠানো হচ্ছে....');

  axios.post('/contactSend',{
    contact_name: contact_name,
    contact_mobile:contact_mobile,
    contact_emil: contact_emil,
    contact_msg:contact_msg,
  })
  .then(function(response){
      if(response.status==200){
        if(response.data==1){
           $('#contactSendBtnid').html('অনুরোধ সফল হয়েছে');
             setTimeout(function(){
              $('#contactSendBtnid').html('পাঠিয়ে দিন');
            }, 3000)
        }else{
          $('#contactSendBtnid').html('অনুরোধ ব্যার্থ হয়েছে । আবার চেস্টা করুন');
             setTimeout(function(){
              $('#contactSendBtnid').html('পাঠিয়ে দিন');
            }, 3000)
        }
      }else{
         $('#contactSendBtnid').html('অনুরোধ ব্যার্থ হয়েছে । আবার চেস্টা করুন');
             setTimeout(function(){
              $('#contactSendBtnid').html('পাঠিয়ে দিন');
            }, 3000)
      }

  }).catch(function(error){
     $('#contactSendBtnid').html('আবার চেস্টা করুন');
     setTimeout(function(){
      $('#contactSendBtnid').html('পাঠিয়ে দিন');
    }, 3000)
  })
}

  


}