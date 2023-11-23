const btn = document.getElementById("register");

function registerUser(event) {
  const email = document.getElementById("email").value;
  const password = document.getElementById("pass").value;

  fetch("../controllers/registerController.php", {
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
      console.log(data);
    });
}

btn.addEventListener("click", registerUser);
