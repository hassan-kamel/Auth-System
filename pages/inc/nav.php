<header aria-label="Site Header" class="shadow bg-white">
    <div class="container max-w-screen-lg mx-auto overflow-hidden">
        <div class=" flex h-16 max-w-screen-xl items-center justify-between px-4">
            <div class="flex w-0 flex-1 gap-4 md:gap-20 items-center">

                <?php if(isset($_SESSION["auth"])): ?>
                <a class="inline-block overflow-hidden" href="<?php echo URL;?>index.php">
                    <img class="w-[50%]" src="<?php echo URL;?>pages/images/hamada.png" alt="LOGO">
                </a>
                <a class="relative font-medium text-indigo-600 before:absolute before:-bottom-1 before:h-0.5 before:w-full before:origin-left before:scale-x-0 before:bg-indigo-600 before:transition hover:before:scale-100"
                    href="<?php echo URL."pages/user/";?>profile.php">
                    Profile
                </a>
                <?php if(isset($_SESSION["admin"])): ?>
                <a class="relative font-medium text-indigo-600 before:absolute before:-bottom-1 before:h-0.5 before:w-full before:origin-left before:scale-x-0 before:bg-indigo-600 before:transition hover:before:scale-100"
                    href="<?php echo URL."pages/admin/";?>admin.php">
                    Admin Panel
                </a>
                <?php endif; ?>
                <?php else: ?>
                <a class="relative font-medium text-indigo-600 before:absolute before:-bottom-1 before:h-0.5 before:w-full before:origin-left before:scale-x-0 before:bg-indigo-600 before:transition hover:before:scale-100"
                    href="<?php echo URL."pages/user/";?>login.php">
                    Log in
                </a>

                <a class="relative font-medium text-indigo-600 before:absolute before:-bottom-1 before:h-0.5 before:w-full before:origin-left before:scale-x-0 before:bg-indigo-600 before:transition hover:before:scale-100"
                    href="<?php echo URL."pages/user/";?>register.php">
                    Sign up
                </a>
                <?php endif; ?>
            </div>

            <div class="flex items-center ">
                <?php if(isset($_SESSION["auth"])): ?>

                <a class="inline-block rounded border border-red-600 px-3 py-1 text-sm font-medium text-red-600 hover:bg-red-600 hover:text-white focus:outline-none focus:ring active:bg-red-500"
                    href="<?php echo URL;?>pages/user/logout.php">
                    Log out
                </a>
                <?php else: ?>
                <a class="inline-block overflow-hidden" href="<?php echo URL;?>index.php">
                    <img class="w-[50%]" src="<?php echo URL;?>pages/images/hamada.png" alt="LOGO">
                </a>
                <?php endif; ?>
            </div>
        </div>

    </div>
    </div>
</header>