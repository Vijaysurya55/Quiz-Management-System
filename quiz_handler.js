var QuizHandler = /** @class */ (function () {
    function QuizHandler() {
    }
    QuizHandler.prototype.displayQuizCreatedAlert = function () {
        alert("Quiz created successfully!");
    };
    QuizHandler.prototype.redirectToTakeQuizPage = function () {
        window.location.href = "takequiz.html"; 
    };
    return QuizHandler;
}());
var quizHandler = new QuizHandler();
// quizHandler.displayQuizCreatedAlert();
// quizHandler.redirectToTakeQuizPage();
