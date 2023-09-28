const quizWrap = document.querySelector(".quiz__wrap");

let quizInfo = [];

const fetchQuiz = () => {
    fetch("assets/json/gineungsaShort.json")
        .then(res => res.json())
        .then(items => {
            quizInfo = items.map((item, index) => {
                const formattedQuiz = {
                    infoTime: item.time,
                    infoQuestion: item.question,
                    infoQuestion2: item.question_desc,
                    infoAnswer: item.correct_answer,
                }
                return formattedQuiz;
            });
            console.log(quizInfo);
            updateQuiz(quizIndex);
        });
}

let quizIndex = 0;

const updateQuiz = (index) => {
    const quiz = quizInfo[index]
    const quizWrapTag = `
        <div class="quiz__header">
            <div class="quiz__time">${quiz.infoTime}</div>
        </div>

        <div class="quiz__main">
            <div class="quiz__question">${index + 1}. ${quiz.infoQuestion}</div>
            <div class="quiz__question2">${quiz.infoQuestion2}</div>
            <button class="quiz__confirm">정답</button>
            <div class="quiz__answer none">${quiz.infoAnswer}</div>
            <div class="quiz__desc none"></div>
        </div>
        <div class="quiz__footer">
            <div class="btn">
                <button class="quiz__left">이전</button>
                <button class="quiz__right">다음</button>
            </div>
        </div>
    `;

    quizWrap.innerHTML = quizWrapTag;

    const quizNext = quizWrap.querySelector(".quiz__right");
    const quizPrev = quizWrap.querySelector(".quiz__left");
    const quizConfirm = quizWrap.querySelector(".quiz__confirm");
    const quizAnswer = quizWrap.querySelector(".quiz__answer")
    const quizLogo = document.querySelector("h1");

    quizNext.addEventListener("click", () => {
        if (quizIndex < quizInfo.length - 1) {
            quizIndex++;
            updateQuiz(quizIndex);
        } else {
            alert("퀴즈가 종료되었습니다.");
        }
    });


    quizPrev.addEventListener("click", () => {
        if (quizIndex < quizInfo.length - 1) {
            quizIndex--;
            updateQuiz(quizIndex);
        }
    });

    quizConfirm.addEventListener("click", () => {
        quizConfirm.classList.add("active");
        quizAnswer.classList.remove("none");
    });

    quizLogo.addEventListener("mouseover", () => {
        // document.querySelector("h1 > a > img").classList.remove("none");
        document.querySelector("h1 > a > img").style.opacity = "1";
    })
    quizLogo.addEventListener("mouseout", () => {
        // document.querySelector("h1 > a > img").classList.add("none");
        document.querySelector("h1 > a > img").style.opacity = "0";
    })
}

document.addEventListener("DOMContentLoaded", () => {
    fetchQuiz();
});