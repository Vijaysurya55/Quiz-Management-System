class QuizHandler {
    constructor() {}

    displayQuizCreatedAlert() {
        alert(`Quiz created successfully!`);
    }
    redirectToTakeQuizPage() {
        window.location.href = "takequiz.html"; 
    }
}
const quizHandler = new QuizHandler();
// quizHandler.displayQuizCreatedAlert();
// quizHandler.redirectToTakeQuizPage();