<?php require APPROOT . '/views/include/navbar.php'; ?>

<section class="bg-gray-50 dark:bg-gray-900">
    <div class="flex flex-col items-center justify-center px-6 py-8 mx-auto md:h-screen lg:py-0">
        <div class="w-full bg-white rounded-lg shadow dark:border md:mt-0 sm:max-w-md xl:p-0 dark:bg-gray-800 dark:border-gray-700">
            <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
                <h1 class="text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl dark:text-white">
                    Create and account
                </h1>
                <form id="form" class="space-y-4 md:space-y-6" action="<?= URLROOT; ?>/usersController/register" method="post">
                    <div>
                        <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your Name</label>
                        <input type="text" name="name" id="name" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="name@company.com">
                        <small class="text-red-700"><? echo (!empty($data['name_err']) ? 'border-red-500' : '') ?></small>
                    </div>
                    <div>
                        <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your email</label>
                        <input type="text" name="email" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="name@company.com">
                        <small class="text-red-700"><? echo (!empty($data['email_err']) ? 'border-red-500' : '') ?></small>
                    </div>
                    <div>
                        <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Password</label>
                        <input type="password" name="password" id="password" placeholder="••••••••" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <small class="text-red-700"><? echo (!empty($data['password_err']) ? 'border-red-500' : '') ?></small>
                    </div>
                    <div>
                        <label for="confirm-password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Confirm password</label>
                        <input type="confirm-password" name="confirm-password" id="confirm" placeholder="••••••••" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <small class="text-red-700"><? echo (!empty($data['confirm-password_err']) ? 'border-red-500' : '') ?></small>
                    </div>
                    <button type="submit" class="w-full text-white hover:bg-blue-700 bg-primary-600 hover:bg-primary-700 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">Create an account</button>
                    <p class="text-sm font-light text-gray-500 dark:text-gray-400">
                        Already have an account? <a href="<?= URLROOT; ?>pages/login" class="font-medium text-primary-600 hover:underline dark:text-primary-500">Login here</a>
                    </p>
                </form>
            </div>
        </div>
    </div>
</section>

<script>
    var count = 0;
    const form = document.getElementById('form');
    const email = document.getElementById('email');
    const password = document.getElementById('password');
    const name = document.getElementById('name');
    const confirm = document.getElementById('confirm');

    form.addEventListener('submit', (e) => {
        e.preventDefault();
        login();
    });

    function login() {
        const emailValue = email.value.trim();
        const passwordValue = password.value.trim();
        const nameCheck = name.value.trim();
        const confirm_pass = confirm.value.trim();
        const emailcheck = emailValue.split();
        const check = ['@','.'];

        if (emailValue === '') {
            setErrorFor(email, 'Email cannot be blank');
            email.addEventListener('keydown', () => {
                unsetError(email)
            })
        }
        if (check.includes(emailcheck)== false) {
            setErrorFor(email, 'enter an email');
            email.addEventListener('keydown', () => {
                unsetError(email)
            })
        }

        if (nameCheck === '') {
            setErrorFor(name, 'Name cannot be blank');
            name.addEventListener('keydown', () => {
                unsetError(name)
            })
        }
        if (confirm_pass != passwordValue) {
            setErrorFor(confirm, 'Its Not The Same');
            confirm.addEventListener('keydown', () => {
                unsetError(confirm)
            })
        }
        if (confirm_pass === '' ) {
            setErrorFor(confirm, 'confirm cannot be blank');
            confirm.addEventListener('keydown', () => {
                unsetError(confirm)
            })
        }

        if (passwordValue === '') {
            setErrorFor(password, 'Password cannot be blank');
            password.addEventListener('keydown', () => {
                unsetError(password)
            })

        } else if (passwordValue.length < 4) {
            setErrorFor(password, 'Enter a longer password');
            password.addEventListener('keydown', () => {
                unsetError(password)
            })


        } else {
            form.submit();
        }
    }


    function unsetError(input) {
        const formInput = input.parentElement;
        const small = formInput.querySelector('small');
        small.innerText = '';
    }

    function setErrorFor(input, message) {
        const formInput = input.parentElement;
        const small = formInput.querySelector('small');
        small.innerText = message;
    }
</script>