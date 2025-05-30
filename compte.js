let currentForm = null;
let currentButton = null;

function showForm(role) {

  hideAllForms();

  resetButtons();

  const formId = 'form-' + role;
  const buttonId = 'btn-' + role;

  document.getElementById(formId).classList.add('active');
  document.getElementById(buttonId).classList.add('active');

  currentForm = role;
  currentButton = buttonId;
}

function showInscription() {
  hideAllForms();
  document.getElementById('form-inscription').classList.add('active');
  currentForm = 'inscription';
}

function hideAllForms() {
  const forms = document.querySelectorAll('.form-container');
  forms.forEach(form => {
    form.classList.remove('active');
  });
}

function resetButtons() {
  const buttons = document.querySelectorAll('.btn-role');
  buttons.forEach(button => {
    button.classList.remove('active');
  });
}

/*document.addEventListener('DOMContentLoaded', function() {
  const forms = document.querySelectorAll('form');
  forms.forEach(form => {
    form.addEventListener('submit', function(e) {
      alert('Formulaire soumis ! (Fonctionnalité à implémenter côté serveur)');
    });
  });

  document.querySelector('.btn-deconnexion').addEventListener('click', function() {
    if(confirm('Êtes-vous sûr de vouloir vous déconnecter ?')) {
      hideAllForms();
      resetButtons();
      currentForm = null;
      currentButton = null;
      alert('Déconnexion réussie !');
    }
  });
 })*/;