const actualBtn = document.getElementById('actual-btn');

const fileChosen = document.getElementById('file-chosen');

const submitBtn = document.getElementById('submit-btn');

if(actualBtn){
  actualBtn.addEventListener('change', function(){
    fileChosen.textContent = this.files[0].name;
    fileChosen.setAttribute('style', 'color: #ffdc4e');
    submitBtn.removeAttribute("disabled");
    submitBtn.type = 'submit';
  });
}