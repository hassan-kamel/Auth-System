<?php require_once "../../db/config.php";?>
<!DOCTYPE html>
<html lang="en">


<?php require_once ROOT_PATH.'pages/inc/header.php'; ?>
<?php require_once ROOT_PATH.'core/functions.php'; ?>





<body class="">

    <!-- start navbar -->
    <?php require_once ROOT_PATH.'pages/inc/nav.php'; ?>
    <!-- end navbar -->



    <?php if(!isset($_SESSION["auth"]))  redirect(URL.'pages/user/login.php');  ?>
    <?php if(!isset($_SESSION["admin"]))  redirect(URL.'index.php');  ?>



    <section class="text-gray-600 body-font mt-5">
        <div class="container mx-auto max-w-screen-xl shadow-md min-h-[80vh] p-1">
            <div class=" flex p-1 lg:flex-row flex-col gap-2">
                <div class="links flex-3">

                    <div class="inline-flex items-stretch rounded-md  bg-white">

                        <div class="w-full lg:h-[80vh]  rounded-md  bg-white  ">
                            <div class="flow-root py-2">
                                <div class="-my-2 divide-y divide-gray-100">
                                    <div class="p-2 flex  flex-row lg:flex-col">
                                        <a class="group relative inline-block overflow-hidden  px-3 py-1 focus:outline-none focus:ring "
                                            href="./allUsers.php">
                                            <span
                                                class="absolute inset-y-0 left-0 w-[2px] bg-indigo-600 transition-all group-hover:w-full group-active:bg-indigo-500"></span>

                                            <span
                                                class="relative text-sm font-medium text-indigo-600 transition-colors group-hover:text-white">
                                                All Users
                                            </span>
                                        </a>
                                        <a class="group mx-4 lg:my-4  lg:mx-[0]  relative inline-block overflow-hidden  px-3 py-1 focus:outline-none focus:ring bg-green-100"
                                            href="./addNewUser.php">
                                            <span
                                                class="absolute inset-y-0 left-0 w-[2px] bg-indigo-600 transition-all group-hover:w-full group-active:bg-indigo-500"></span>

                                            <span
                                                class="relative text-sm font-medium text-indigo-600 transition-colors group-hover:text-white">
                                                Add New User
                                            </span>
                                        </a>




                                    </div>

                                </div>
                            </div>
                        </div>

                    </div>



                </div>
                <div class="actions flex-[9]">







                    <form action="<?php echo URL?>controllers/admin/addNewUser.php" method="POST"
                        enctype="multipart/form-data"
                        class="max-w-screen-sm mx-auto space-y-2 rounded-lg p-8 shadow-xl">
                        <p class="text-lg font-medium">Add New User</p>

                        <?php
                $erorrs = isset($_SESSION['addUserErrors']) ? $_SESSION['addUserErrors'] : [];
                ?>


                        <div>
                            <label for="name" class="text-sm font-medium">Name</label>

                            <div class="relative mt-1">
                                <?php if (isset($_SESSION['addUserErrors']) && isset($erorrs['name'])) : ?>
                                <input type="text" id="name" name="name"
                                    class="w-full rounded-lg ring-red-500 ring-1 rounded-lg border-transparent flex-1 appearance-none border border-gray-300  bg-white text-gray-700 placeholder-gray-400  focus:outline-none focus:ring-1 focus:ring-purple-600 focus:border-transparent p-4 pr-12 text-sm shadow-sm"
                                    placeholder="Enter full name" />
                                <p class="absolute text-sm text-red-500 -bottom-5 right-0">
                                    <?php echo $erorrs['name'] ?>
                                </p>

                                <?php unset($erorrs['name']); ?>
                                <?php else : ?>
                                <input type="text" id="name" name="name"
                                    class="w-full rounded-lg border-gray-200 p-4 pr-12 text-sm shadow-sm"
                                    placeholder="Enter full name" value="<?php if (isset($_SESSION['addUserData']['name'])) {   
                                echo $_SESSION['addUserData']['name'];                       
                                unset($_SESSION['addUserData']['name']);}
                            else { echo '';} ?>" />
                                <?php endif; ?>

                            </div>
                        </div>
                        <div>
                            <label for="email" class="text-sm font-medium">Email</label>

                            <div class="relative mt-1">

                                <?php if (isset($_SESSION['addUserErrors']) && isset($erorrs['email'])) : ?>
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
                                    placeholder="Enter email" value="<?php if (isset($_SESSION['addUserData']['email'])) {   
                                echo $_SESSION['addUserData']['email'];                       
                                unset($_SESSION['addUserData']['email']);}
                            else { echo '';} ?>" />
                                <?php endif; ?>

                            </div>
                        </div>


                        <div>
                            <label for="password" class="text-sm font-medium">Password</label>

                            <div class="relative mt-1">

                                <?php if (isset($_SESSION['addUserErrors']) && isset($erorrs['password'])) : ?>
                                <input type="text" id="password" name="password"
                                    class="w-full rounded-lg ring-red-500 ring-1 rounded-lg border-transparent flex-1 appearance-none border border-gray-300  bg-white text-gray-700 placeholder-gray-400  focus:outline-none focus:ring-1 focus:ring-purple-600 focus:border-transparent p-4 pr-12 text-sm shadow-sm"
                                    placeholder="Enter password" />
                                <p class="absolute text-sm text-red-500 -bottom-5 right-0">
                                    <?php echo $erorrs['password'] ?>
                                </p>
                                <?php unset($erorrs['password']); ?>
                                <?php else : ?>
                                <input type="text" id="password" name="password"
                                    class="w-full rounded-lg border-gray-200 p-4 pr-12 text-sm shadow-sm"
                                    placeholder="Enter password" value="<?php if (isset($_SESSION['addUserData']['password'])) {   
                                echo $_SESSION['addUserData']['password'];                       
                                unset($_SESSION['addUserData']['password']);}
                            else { echo '';} ?>" />
                                <?php endif; ?>

                                <button id="showPass" type="button"
                                    class="absolute inset-y-0 right-4 inline-flex items-center">


                                </button>

                            </div>
                        </div>



                        <div>

                            <label class="block mb-2 text-sm font-medium text-gray-900 " for="file_input">Image</label>
                            <div class="relative mt-1">
                                <input
                                    class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-indigo-50 file:text-indigo-700 hover:file:bg-indigo-100"
                                    id="file_input" type="file" name="file">
                                <p class="absolute text-sm text-red-500 bottom-[25%] right-0">
                                    <?php if(isset($erorrs['file']) ){
                                print_r( $erorrs['file']) ;
                            }
                        else{
                            echo '';
                        } ?>
                                </p>
                            </div>

                        </div>


                        <?php unset($_SESSION['addUserErrors']); ?>

                        <button type="submit "
                            class="block w-full rounded border border-indigo-600 px-12 py-3 text-sm font-medium text-indigo-600 hover:bg-indigo-600 hover:text-white focus:outline-none focus:ring active:bg-indigo-500">
                            Add New User
                        </button>

                    </form>







                </div>
            </div>
        </div>
    </section>



    <!-- start footer -->
    <?php require_once ROOT_PATH.'pages/inc/footer.php'; ?>
    <!-- end footer -->

    <script src="https://cdn.tailwindcss.com"></script>
</body>

</html>