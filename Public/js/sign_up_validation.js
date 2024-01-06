let emailRegEx = /^\w+([.-]?\w+)*@(\w+[.-]?)*\.\w{2,3}$/;
let passwordRegEx = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).{8,}$/;
let full_nameRegEx = /[a-zA-Z]{3,} [a-zA-Z]{3,}/;



/* Validation du formulaire Sign Up */
let sign_up_form = document.querySelector('.sign-up-form');

sign_up_form.addEventListener('submit', function (event) {
    let email = document.getElementById('email');
    let full_name = document.getElementById('name');
    let password = document.getElementById('password');
    
    // console.log(full_name.value);

    if (!emailRegEx.test(email.value)) {
        event.preventDefault();
        document.querySelector('.email-div').innerHTML = `
        <div class="mb-3 email-div">
            <label for="email" class="form-label">Email address</label>
            <input type="email" class="form-control" name="email" id="email" aria-describedby="emailHelp" value=${email.value} required>
            <label class="form-label text-danger">L'adresse e-mail est invalid.</label>
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
    
    if (!full_nameRegEx.test(full_name.value)) {
        event.preventDefault();
        document.querySelector('.name-div').innerHTML = `
        <div class="mb-3 name-div">
            <label for="name" class="form-label">Nom et prénom</label>
            <input type="text" class="form-control" name="name" id="name" value="${full_name.value}" required>
            <label class="form-label text-danger">Veuillez saisir également le nom et le prénom correct.</label>
        </div>
        `;
    } else  {
        document.querySelector('.name-div').innerHTML = `
        <div class="mb-3 name-div">
            <label for="name" class="form-label">Nom et prénom</label>
            <input type="text" class="form-control" name="name" id="name" value="${full_name.value}" required>
        </div>
        `;
    }
    
    
    if (!passwordRegEx.test(password.value)) {
        event.preventDefault();
        document.querySelector('.password-div').innerHTML = `
        <div class="mb-3 password-div">
            <label for="password" class="form-label">Mot de passe</label>
            <input type="password" class="form-control" name="password" value="${password.value}" id="password" required>
            <label class="form-label text-danger">
                Le mot de passe doit contenir au moins 8 caractères : une lettre minuscule, une lettre majuscule, un chiffre
            </label>
        </div>
        `;
    } else {
        document.querySelector('.password-div').innerHTML = `
        <div class="mb-3 password-div">
            <label for="password" class="form-label">Mot de passe</label>
            <input type="password" class="form-control" name="password"  value="${password.value}" id="password" required>
        </div>
        `;
    }
});

/* End Validation du formulaire Sign Up */