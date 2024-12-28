document.addEventListener('DOMContentLoaded', function () {
    var missionSection = document.getElementById('missionSection');
    var mission = document.getElementById('mission');
    var contactSection = document.getElementById('contactSection');
    var email = document.getElementById('email');
    var phone = document.getElementById('phone');
    var address = document.getElementById('address');
    if (mission && contactSection && email && phone && address) {
        mission.innerHTML = "<span style='color: #EEC511;'>QuizGO!</span> is dedicated to providing a platform that enhances learning through interactive quizzes. Our quizzes are designed to engage users and promote knowledge retention in a fun and entertaining way. We believe in the power of gamification to make learning enjoyable for everyone.";
        email.innerText = "quizzgo@gmail.com";
        phone.innerText = "+1-123-456-7890";
        address.innerText = "123 Park Avenue, Perundurai, Erode, Tamilnadu, 638112";
    }
});
