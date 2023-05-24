
document.addEventListener('DOMContentLoaded', function() {
  var deleteButtons = document.querySelectorAll('.fa-trash-can');
  
  deleteButtons.forEach(function(button) {
    button.addEventListener('click', function() {
      var questionId = button.getAttribute('data-question-id');
      var questionLabel = button.getAttribute('data-question-label'); 
      var popup = document.getElementById('popup1');
      var close = document.querySelector('.close1');
      
      popup.setAttribute('data-question-id', questionId);
      popup.style.display = 'block';
      
    // Afficher le libellé dans la popup           
      popup.querySelector('.question-label').innerHTML = questionLabel;               
      
      close.addEventListener('click', function() {
        popup.style.display = 'none';


      // SUPPRESSION POPUP ?  
      popup.querySelector('.button-delete').addEventListener('click', function() {
        var questionId = popup.getAttribute('data-question-id');
        
        window.location.href = '/delete-question.php?id=' + questionId;
      });

        
      });
    });
  });  
});