// ajax.php?action=contact

// les noms des posts : "fullname", "email", "content"

//id du formulaire form_contact//
//id des errors : "fullname" : error_fullname
//                "email" : error_email
//                "content" : error_content

$('#form_contact').on('submit', function(event){
  event.preventDefault();
  var form = $('#form_contact');
  var data = form.serialize();
  data += '&isAjax=true&Envoyer=true';

  $.ajax({
    url: 'ajax.php?action=contact',
    type: 'POST',
    data: data,

    success: function(response){
      if(typeof response != 'undefined'){
        if(response.success === true){
          $('.container').html('<p class="text-align alert-success">Message envoyé</p>');
        }
        else{
          if(typeof response.errors['fullname'] != 'undefined'){
            $('#error_fullname').html(response.errors['fullname']).removeClass('hidden');
          }
          else{
            $('#error_fullname').html('').addClass('hidden');
          }

          if(typeof response.errors['email'] != 'undefined'){
            $('#error_email').html(response.errors['email']).removeClass('hidden');
          }
          else{
            $('#error_email').html('').addClass('hidden');
          }

          if(typeof response.errors['content'] != 'undefined'){
            $('#error_content').html(response.errors['content']).removeClass('hidden');

          }
          else{
            $('#error_content').html('').addClass('hidden');
          }
        }
      }

    }

  })
})
