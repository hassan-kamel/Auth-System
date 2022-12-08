<?php require_once "../../db/config.php";?>
<!DOCTYPE html>
<html lang="en">


<?php require_once ROOT_PATH.'pages/inc/header.php'; ?>
<?php require_once ROOT_PATH.'core/functions.php'; ?>



<body>

    <!-- start navbar -->
    <?php require_once ROOT_PATH.'pages/inc/nav.php'; ?>
    <!-- end navbar -->

    <?php if(!isset($_SESSION["auth"])){
            redirect(URL.'pages/user/login.php');
    }else{
        $profile = $_SESSION["auth"];
        // print_r($profile);
    }   ?>




    <div class="container max-w-screen-lg mx-auto">
        <h1 class="text-3xl lg:text-4xl font-semibold text-gray-800 opacity-0 text-center ">
            Profile
        </h1>

        <div class=" inline-block text-left flex items-center">


            <div class="relative mt-2 w-[50%] mx-auto  rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5">
                <a href="#" class="block absolute top-[0] left-[50%] translate-x-[-50%] translate-y-[-50%]">
                    <img alt="profile" src="<?php echo URL."uploads/".$profile['image'] ?>"
                        class="mx-auto object-cover rounded-full h-20 w-20 " />
                </a>
                <div class="py-1 mt-10 " role="menu" aria-orientation="vertical" aria-labelledby="options-menu">
                    <a href="#"
                        class="flex items-center gap-4 block px-4 py-2 text-md text-gray-700 hover:bg-gray-100 hover:text-gray-900 "
                        role="menuitem">
                        <svg width="24" height="24" xmlns="http://www.w3.org/2000/svg" fill-rule="evenodd"
                            clip-rule="evenodd">
                            <path
                                d="M12 0c6.623 0 12 5.377 12 12s-5.377 12-12 12-12-5.377-12-12 5.377-12 12-12zm0 1c6.071 0 11 4.929 11 11s-4.929 11-11 11-11-4.929-11-11 4.929-11 11-11zm.5 17h-1v-9h1v9zm-.5-12c.466 0 .845.378.845.845 0 .466-.379.844-.845.844-.466 0-.845-.378-.845-.844 0-.467.379-.845.845-.845z" />
                        </svg>
                        <span class="flex flex-col">
                            <span class="capitalize">
                                <?php echo $profile['name']; ?>
                            </span>
                        </span>
                    </a>
                    <a href="#"
                        class="flex items-center gap-4 block px-4 py-2 text-md text-gray-700 hover:bg-gray-100 hover:text-gray-900 "
                        role="menuitem">
                        <svg width="24" height="24" xmlns="http://www.w3.org/2000/svg" fill-rule="evenodd"
                            clip-rule="evenodd">
                            <path
                                d="M24 21h-24v-18h24v18zm-23-16.477v15.477h22v-15.477l-10.999 10-11.001-10zm21.089-.523h-20.176l10.088 9.171 10.088-9.171z" />
                        </svg>
                        <span class="flex flex-col">
                            <span>
                                <?php echo $profile['email']; ?>
                            </span>
                        </span>
                    </a>

                </div>
            </div>
        </div>


    </div>



    <!-- start footer -->
    <?php require_once ROOT_PATH.'pages/inc/footer.php'; ?>
    <!-- end footer -->

    <script src="https://cdn.tailwindcss.com"></script>
</body>

</html>