<?php require_once "../../db/config.php";?>
<!DOCTYPE html>
<html lang="en">


<?php require_once ROOT_PATH.'pages/inc/header.php'; ?>
<?php require_once ROOT_PATH.'core/functions.php'; ?>





<body>

    <!-- start navbar -->
    <?php require_once ROOT_PATH.'pages/inc/nav.php'; ?>
    <!-- end navbar -->



    <?php if(!isset($_SESSION["auth"]))  redirect(URL.'pages/user/login.php');  ?>
    <?php if(!isset($_SESSION["admin"]))  redirect(URL.'index.php');  ?>



    <div class="bg-white">
        <div class="text-center w-full mx-auto py-12 px-4 sm:px-6 lg:py-16 lg:px-8 z-20">
            <h2 class="text-3xl font-extrabold text-black  sm:text-4xl">
                <span class="block">
                    Welcome
                </span>
                <span class="block text-indigo-500">
                    It&#x27;s today or never.
                </span>
            </h2>
            <div class="lg:mt-0 lg:flex-shrink-0">
                <div class="mt-12 inline-flex rounded-md shadow">
                    <a href="./addNewUser.php"
                        class="py-4 px-6  inline-block rounded border border-indigo-600  text-sm font-medium text-indigo-600 hover:bg-indigo-600 hover:text-white focus:outline-none focus:ring active:bg-indigo-500 ">
                        Hamada Admin
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