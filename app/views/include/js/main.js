
// var count = 0;

// const form = document.getElementById('form');
// const email = document.getElementById('email');
// const password = document.getElementById('password');

// form.addEventListener('submit', (e) => {
//     e.preventDefault();
//     login();
// });

// function login() {
//     const emailValue = email.value.trim();
//     const passwordValue = password.value.trim();

//     if (emailValue === '') {
//         setErrorFor(email, 'Email cannot be blank');
//         email.addEventListener('keydown', () => { unsetError(email) })
//     }

//     if (passwordValue === '') {
//         setErrorFor(password, 'Password cannot be blank');
//         password.addEventListener('keydown', () => { unsetError(password) })

//     } else if (passwordValue.length < 4) {
//         setErrorFor(password, 'Enter a longer password');
//         password.addEventListener('keydown', () => { unsetError(password) })


//     } else {
//         form.submit();
//     }
// }


// function unsetError(input) {
//     const formInput = input.parentElement;
//     const small = formInput.querySelector('small');
//     small.innerText = '';
// }
// function setErrorFor(input, message) {
//     const formInput = input.parentElement;
//     const small = formInput.querySelector('small');
//     small.innerText = message;
// }