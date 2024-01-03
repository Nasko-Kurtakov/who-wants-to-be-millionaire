function nextQuestionHandeler() {
  var inputs = Array.from(document.getElementsByTagName("input"));

  var checkedInput = inputs.find((el) => el.checked);

  fetch("../controllers/answerController.php", {
    method: "POST",
    headers: {
      "Content-Type": "application/json",
    },
    body: JSON.stringify({
      answeredIndex: checkedInput.value,
    }),
  })
    .then((res) => res.json())
    .then(({ isCorrect }) => {
      if (isCorrect) {
        console.log("good job");
        window.location = "./gamePage.php";
      } else {
        console.log("gg. wp.");
      }
    })
    .catch((e) => console.log(e));
}
