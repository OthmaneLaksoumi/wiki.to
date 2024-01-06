let emailRegEx = /^\w+([.-]?\w+)*@(\w+[.-]?)*\.\w{2,3}$/;
let passwordRegEx = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).{8,}$/;

let login_form = document.querySelector('.login-form');

login_form.addEventListener('submit', function(event) {
    let email = document.getElementById('email');
    let password = document.getElementById('password');

    console.log(email.value);

    if (!emailRegEx.test(email.value)) {
        
        event.preventDefault();
        document.querySelector('.email-div').innerHTML = `
        <div class="mb-3 email-div">
            <label for="email" class="form-label">Email address</label>
            <input type="email" class="form-control" name="email" id="email" aria-describedby="emailHelp" value=${email.value} required>
            <label class="form-label text-danger">L'adresse e-mail form est invalid.</label>
        </div>
        `;
    } else {
        document.querySelector('.email-div').innerHTML = `
        <div class="mb-3 email-div">
            <label for="email" class="form-label">Email address</label>
            <input type="email" class="form-control" name="email" id="email" aria-describedby="emailHelp" value=${email.value} required>
        </div>
        `;
    }
});