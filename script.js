const testForm = document.getElementById('testForm');
const questionsDiv = document.getElementById('questions');

testForm.addEventListener('submit', function(event) {
    event.preventDefault();
    
    const question = document.getElementById('question').value;
    const answer1 = document.getElementById('answer1').value;
    const answer2 = document.getElementById('answer2').value;
    const answer3 = document.getElementById('answer3').value;
    const correctAnswer = document.getElementById('correctAnswer').value;
    
    const questionDiv = document.createElement('div');
    questionDiv.innerHTML = `
        <h3>${question}</h3>
        <p>1. ${answer1}</p>
        <p>2. ${answer2}</p>
        <p>3. ${answer3}</p>
        <p>Правильный ответ: ${correctAnswer}</p>
    `;
    
    questionsDiv.appendChild(questionDiv);
    
    testForm.reset();
});