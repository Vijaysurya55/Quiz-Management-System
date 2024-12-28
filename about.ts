
document.addEventListener('DOMContentLoaded', () => {
    
    const missionSection = document.getElementById('missionSection');
    const mission = document.getElementById('mission');
    const contactSection = document.getElementById('contactSection');
    const email = document.getElementById('email');
    const phone = document.getElementById('phone');
    const address = document.getElementById('address');

    if (mission && contactSection && email && phone && address) {
        mission.innerHTML = "<span style='color: #EEC511;'>QuizGO!</span> is dedicated to providing a platform that enhances learning through interactive quizzes. Our quizzes are designed to engage users and promote knowledge retention in a fun and entertaining way. We believe in the power of gamification to make learning enjoyable for everyone.";

        email.innerText = "vijaysuryaj.21msc@kongu.edu";
        phone.innerText = "+91-9342326530";
        address.innerText = "123 Old bus stand opp., Perundurai, Erode, Tamilnadu, 638112";
    }
});
