function hideAll() {
    const q = document.getElementsByClassName("questions");
    for (var i = 0; i < q.length; i++) {
        q[i].classList.remove("question")
        q[i].style.display = "none";
    }
    const a = document.getElementsByClassName("inputs");
    for (var i = 0; i < a.length; i++) {
        a[i].classList.remove("input")
        a[i].style.display = "none";
    }
}

const questions = document.getElementsByClassName("questions");
const inputs = document.getElementsByClassName("inputs");

let currentQuestion = "root";
let lastQuestion = "";

document.getElementById("control-submit").addEventListener("click", () => {
    hideAll();
    if (currentQuestion == "root") {
        const currentVal = document.getElementById("input-" + currentQuestion).value;
        const nextQuestion = document.getElementById("question-" + currentVal);
        nextQuestion.classList.add("question");
        nextQuestion.style.display = "block";
        const nextInput = document.getElementById("input-" + currentVal);
        nextInput.classList.add("input");
        nextInput.style.display = "block";
        currentQuestion = currentVal;
    } else if (currentQuestion != "description") {
        const currentVal = document.getElementById("input-" + currentQuestion).value;
        const textInput = document.getElementById("input-last-text");
        textInput.classList.add("input");
        textInput.style.display = "block";
        const textQuestion = document.getElementById("question-last-text");
        textQuestion.classList.add("question");
        textQuestion.style.display = "block";
        lastQuestion = currentVal;
        currentQuestion = "description";
        document.getElementById("control-submit").innerHTML = '<i class="fa-solid fa-envelope"></i>';
    } else {
        $.ajax({
            type: "POST",
            url: "submit.php",
            data: {
                "path": lastQuestion,
                "description": document.getElementById("input-last-text").value
            },
            success: function (data) {
                location.assign("success");
            }
        });
    }
});

hideAll();
document.getElementById("question-root").classList.add("question");
document.getElementById("question-root").style.display = "block";
document.getElementById("input-root").classList.add("input");
document.getElementById("input-root").style.display = "block";

// Back
document.getElementById("control-back").addEventListener("click", () => {
    hideAll();
    document.getElementById("question-root").classList.add("question");
    document.getElementById("question-root").style.display = "block";
    document.getElementById("input-root").classList.add("input");
    document.getElementById("input-root").style.display = "block";
    currentQuestion = "root";
    document.getElementById("control-submit").innerHTML = '<i class="fa-solid fa-forward-step"></i>';
});