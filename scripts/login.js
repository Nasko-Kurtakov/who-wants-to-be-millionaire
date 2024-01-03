const btn = document.getElementById("login");

function login(event) {
  const email = document.getElementById("email").value;
  const password = document.getElementById("pass").value;

  fetch("../controllers/loginController.php", {
    method: "POST",
    headers: {
      "Content-Type": "application/json",
    },
    body: JSON.stringify({
      email: email,
      password: password,
    }),
  })
    .then((response) => {
      return response.json();
    })
    .then((data) => {
      //user was logged in;
      window.location = "./start.php";
    })
    .catch((err) => {
      console.log(err);
    });
}

btn.addEventListener("click", login);
