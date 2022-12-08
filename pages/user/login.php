<?php require_once "../../db/config.php";?>
<!DOCTYPE html>
<html lang="en">


<?php require_once ROOT_PATH.'pages/inc/header.php'; ?>
<?php require_once ROOT_PATH.'core/functions.php'; ?>






<body>

    <!-- start navbar -->
    <?php require_once ROOT_PATH.'pages/inc/nav.php'; ?>
    <!-- end navbar -->


    <?php if(isset($_SESSION["auth"])){
            redirect(URL.'index.php');
        }  ?>



    <div class="mx-auto max-w-screen-xl px-4 py-16 sm:px-6 lg:px-8">
        <div class="mx-auto max-w-lg">

            <form action="<?php echo URL?>controllers/user/loginHandler.php" method="POST"
                class="mt-6 mb-0 space-y-4 rounded-lg p-8 shadow-2xl">
                <p class="text-lg font-medium">Log in to your account</p>


                <?php
                $erorrs = isset($_SESSION['loginErrors']) ? $_SESSION['loginErrors'] : [];
                ?>

                <div>
                    <label for="email" class="text-sm font-medium">Email</label>

                    <div class="relative mt-1">
                        <?php if (isset($_SESSION['loginErrors']) && isset($erorrs['email'])) : ?>
                        <input type="text" id="email" name="email"
                            class="w-full rounded-lg ring-red-500 ring-1 rounded-lg border-transparent flex-1 appearance-none border border-gray-300  bg-white text-gray-700 placeholder-gray-400  focus:outline-none focus:ring-1 focus:ring-purple-600 focus:border-transparent p-4 pr-12 text-sm shadow-sm"
                            placeholder="Enter email" />
                        <p class="absolute text-sm text-red-500 -bottom-5 right-0">
                            <?php echo $erorrs['email'] ?>
                        </p>
                        <?php unset($erorrs['email']); ?>
                        <?php else : ?>
                        <input type="email" id="email" name="email"
                            class="w-full rounded-lg border-gray-200 p-4 pr-12 text-sm shadow-sm"
                            placeholder="Enter email" value="<?php if (isset($_SESSION['loginData']['email'])) {   
                                echo $_SESSION['loginData']['email'];                       
                                unset($_SESSION['loginData']['email']);}
                            else { echo '';} ?>" />
                        <?php endif; ?>
                    </div>
                </div>

                <div>
                    <label for="password" class="text-sm font-medium">Password</label>

                    <div class="relative mt-1">
                        <?php if (isset($_SESSION['loginErrors']) && isset($erorrs['password'])) : ?>
                        <input type="password" id="password" name="password"
                            class="w-full rounded-lg ring-red-500 ring-1 rounded-lg border-transparent flex-1 appearance-none border border-gray-300  bg-white text-gray-700 placeholder-gray-400  focus:outline-none focus:ring-1 focus:ring-purple-600 focus:border-transparent p-4 pr-12 text-sm shadow-sm"
                            placeholder="Enter password" />
                        <p class="absolute text-sm text-red-500 -bottom-5 right-0">
                            <?php echo $erorrs['password'] ?>
                        </p>
                        <?php unset($erorrs['password']); ?>
                        <?php else : ?>
                        <input type="password" id="password" name="password"
                            class="w-full rounded-lg border-gray-200 p-4 pr-12 text-sm shadow-sm"
                            placeholder="Enter password" value="<?php if (isset($_SESSION['loginData']['password'])) {   
                                echo $_SESSION['loginData']['password'];                       
                                unset($_SESSION['loginData']['password']);}
                            else { echo '';} ?>" />
                        <?php endif; ?>

                        <button id="showPass" type="button" class="absolute inset-y-0 right-4 inline-flex items-center">

                        </button>

                    </div>
                </div>


                <?php unset($_SESSION['loginErrors']); ?>
                <button type="submit"
                    class="block w-full rounded border border-indigo-600 px-12 py-3 text-sm font-medium text-indigo-600 hover:bg-indigo-600 hover:text-white focus:outline-none focus:ring active:bg-indigo-500">
                    Log in
                </button>

                <p class="text-center text-sm text-gray-500">
                    No account?
                    <a class="underline" href="<?php echo URL ?>pages/user/register.php">Sign up</a>
                </p>
            </form>
        </div>


    </div>



    <!-- start footer -->
    <?php require_once ROOT_PATH.'pages/inc/footer.php'; ?>
    <!-- end footer -->

    <script src="https://cdn.tailwindcss.com"></script>

    <script>
    const showPass = document.getElementById('showPass');
    const pass = document.getElementById('password');
    const eyeOff =
        `<svg width="24" height="24" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" fill="none"
        viewBox="0 0 24 24" stroke="currentColor"  fill-rule="evenodd" clip-rule="evenodd"><path d="M8.137 15.147c-.71-.857-1.146-1.947-1.146-3.147 0-2.76 2.241-5 5-5 1.201 0 2.291.435 3.148 1.145l1.897-1.897c-1.441-.738-3.122-1.248-5.035-1.248-6.115 0-10.025 5.355-10.842 6.584.529.834 2.379 3.527 5.113 5.428l1.865-1.865zm6.294-6.294c-.673-.53-1.515-.853-2.44-.853-2.207 0-4 1.792-4 4 0 .923.324 1.765.854 2.439l5.586-5.586zm7.56-6.146l-19.292 19.293-.708-.707 3.548-3.548c-2.298-1.612-4.234-3.885-5.548-6.169 2.418-4.103 6.943-7.576 12.01-7.576 2.065 0 4.021.566 5.782 1.501l3.501-3.501.707.707zm-2.465 3.879l-.734.734c2.236 1.619 3.628 3.604 4.061 4.274-.739 1.303-4.546 7.406-10.852 7.406-1.425 0-2.749-.368-3.951-.938l-.748.748c1.475.742 3.057 1.19 4.699 1.19 5.274 0 9.758-4.006 11.999-8.436-1.087-1.891-2.63-3.637-4.474-4.978zm-3.535 5.414c0-.554-.113-1.082-.317-1.562l.734-.734c.361.69.583 1.464.583 2.296 0 2.759-2.24 5-5 5-.832 0-1.604-.223-2.295-.583l.734-.735c.48.204 1.007.318 1.561.318 2.208 0 4-1.792 4-4z"/></svg>`;
    const eyeOn =
        `<svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" fill="none"
        viewBox="0 0 24 24" stroke="currentColor">
        <path d="M12.01 20c-5.065 0-9.586-4.211-12.01-8.424 2.418-4.103 6.943-7.576 12.01-7.576 5.135 0 9.635 3.453 11.999 7.564-2.241 4.43-6.726 8.436-11.999 8.436zm-10.842-8.416c.843 1.331 5.018 7.416 10.842 7.416 6.305 0 10.112-6.103 10.851-7.405-.772-1.198-4.606-6.595-10.851-6.595-6.116 0-10.025 5.355-10.842 6.584zm10.832-4.584c2.76 0 5 2.24 5 5s-2.24 5-5 5-5-2.24-5-5 2.24-5 5-5zm0 1c2.208 0 4 1.792 4 4s-1.792 4-4 4-4-1.792-4-4 1.792-4 4-4z"/>`;
    let hidden = true;
    hidden ? showPass.innerHTML = eyeOff :
        showPass.innerHTML = eyeOn;

    showPass.addEventListener('click', () => {
        if (hidden) {
            pass.setAttribute('type', 'text');
            hidden = false;
            showPass.innerHTML = eyeOn
        } else {
            pass.setAttribute('type', 'password');
            hidden = true;
            showPass.innerHTML = eyeOff
        }
    })
    </script>


</body>

</html>