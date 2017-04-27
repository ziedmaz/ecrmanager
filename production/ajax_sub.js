$(document).ready(function() {
  function valider_form()
  {
    //alert("haha");
    v = $("#numEcr").val();
    if(v.length < 2)
    {
      alert("numEcr invalide");
      return false;
    }

    var form_data = {
      numEcr: v,
      username: username,
      is_ajax: 1
    };

    var jqxhr = $.ajax({
    type: "POST",
    url: "save_project.php",
    /*dataType : "text",*/
    data: form_data,
    success: function(response)
    {
      $('#form_container').waitMe('hide');
      //response = $.trim(response);
      try{
        response = jQuery.parseJSON(response);
      }catch(err){
        show_alert("Erreur", response, 350, 400);
        return;
      }
      if(response.Result.indexOf('OK') > -1){
        //show_alert("SuccÃ¨s", response.Message, 400, 100);
        
      }
      else{
        //show_alert("Erreur", response.Message, 350, 200);
        alert(response.Message);
      }
    },
    error: function(request, type, errorThrown)
    {
     
      var message = "There was an error with the AJAX request.\n";
      switch (type) {
        case 'timeout':
          message += "The request timed out.";
          break;
        case 'notmodified':
          message += "The request was not modified but was not retrieved from the cache.";
          break;
        case 'parsererror':
          message += "XML/Json format is bad.";
          break;
        default:
          message += "HTTP Error (" + request.status + " " + request.statusText + ").";
      }
      message += "\n";
      alert(message);
      
    }
  }).fail(function() { alert("error: "+jqxhr.status+" : "+jqxhr.statusText+" : "+jqxhr.statusCode()+" : "+jqxhr.getAllResponseHeaders()); });
  return false;
  }
  }
  $("#valider_btn").bind("click", valider_form);
});

