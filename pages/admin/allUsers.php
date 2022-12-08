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



    <section class="text-gray-600 body-font mt-5">
        <div class="container mx-auto max-w-screen-xl shadow-md min-h-[80vh] p-1">
            <div class=" flex p-1 lg:flex-row flex-col gap-2">
                <div class="links flex-3">

                    <div class="inline-flex items-stretch rounded-md  bg-white">

                        <div class="w-full lg:h-[80vh]  rounded-md  bg-white  ">
                            <div class="flow-root py-2">
                                <div class="-my-2 divide-y divide-gray-100">
                                    <div class="p-2 flex  flex-row lg:flex-col">
                                        <a class="group relative inline-block overflow-hidden  px-3 py-1 focus:outline-none focus:ring bg-green-100"
                                            href="./allUsers.php">
                                            <span
                                                class="absolute inset-y-0 left-0 w-[2px] bg-indigo-600 transition-all group-hover:w-full group-active:bg-indigo-500"></span>

                                            <span
                                                class="relative text-sm font-medium text-indigo-600 transition-colors group-hover:text-white">
                                                All Users
                                            </span>
                                        </a>
                                        <a class="group mx-4 lg:my-4  lg:mx-[0] relative inline-block overflow-hidden  px-3 py-1 focus:outline-none focus:ring"
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



                    <div class="rounded-lg border border-gray-200">
                        <table class="min-w-full divide-y divide-gray-200 text-sm">
                            <thead class="bg-gray-100">
                                <tr>
                                    <th class="whitespace-nowrap px-4 py-2 text-left font-medium text-gray-900">
                                        Name
                                    </th>
                                    <th class="whitespace-nowrap px-4 py-2 text-left font-medium text-gray-900">
                                        Email
                                    </th>
                                    <th class="whitespace-nowrap px-4 py-2 text-left font-medium text-gray-900">
                                        Photo
                                    </th>
                                    <th class="whitespace-nowrap px-4 py-2 text-left font-medium text-gray-900">
                                        Actions
                                    </th>
                                </tr>
                            </thead>

                            <tbody class="divide-y divide-gray-200">

                                <?php
                                $users = getAll('users');
                                foreach($users as $key=>$value) : 
                                    if($value['role']==1) continue;
                                ?>

                                <tr>
                                    <td class="whitespace-nowrap px-4 py-2 text-gray-700"><?php echo $value['name'];?>
                                    </td>
                                    <td class="whitespace-nowrap px-4 py-2 text-gray-700"><?php echo $value['email'];?>
                                    </td>
                                    <td class="whitespace-nowrap px-4 py-2 text-gray-700">
                                        <img class="w-20 h-20 object-cover rounded-md"
                                            src="<?php echo URL.'uploads/'.$value['image'];?>" alt="">
                                    </td>
                                    <td class="whitespace-nowrap px-4 py-2 flex gap-1">
                                        <form class="group/delete"
                                            action="<?php echo URL?>controllers/admin/delete.php?email=<?php echo $value['email'] ?>"
                                            method="POST">
                                            <button
                                                class="px-2 py-2 cursor-pointer  group-hover/delete:bg-red-500 rounded-full">
                                                <svg class="w-6 fill-red-500 group-hover/delete:fill-white"
                                                    clip-rule="evenodd" fill-rule="evenodd" stroke-linejoin="round"
                                                    stroke-miterlimit="2" viewBox="0 0 24 24"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="m4.015 5.494h-.253c-.413 0-.747-.335-.747-.747s.334-.747.747-.747h5.253v-1c0-.535.474-1 1-1h4c.526 0 1 .465 1 1v1h5.254c.412 0 .746.335.746.747s-.334.747-.746.747h-.254v15.435c0 .591-.448 1.071-1 1.071-2.873 0-11.127 0-14 0-.552 0-1-.48-1-1.071zm14.5 0h-13v15.006h13zm-4.25 2.506c-.414 0-.75.336-.75.75v8.5c0 .414.336.75.75.75s.75-.336.75-.75v-8.5c0-.414-.336-.75-.75-.75zm-4.5 0c-.414 0-.75.336-.75.75v8.5c0 .414.336.75.75.75s.75-.336.75-.75v-8.5c0-.414-.336-.75-.75-.75zm3.75-4v-.5h-3v.5z"
                                                        fill-rule="nonzero" />
                                                </svg>
                                            </button>

                                        </form>

                                        <form class="group/edit"
                                            action="<?php echo URL?>pages/admin/edit.php?email=<?php echo $value['email'] ?>"
                                            method="POST">
                                            <button
                                                class="px-2 py-2 cursor-pointer  group-hover/edit:bg-yellow-500 rounded-full">
                                                <svg class="w-6 fill-yellow-500 group-hover/edit:fill-white"
                                                    clip-rule="evenodd" fill-rule="evenodd" stroke-linejoin="round"
                                                    stroke-miterlimit="2" viewBox="0 0 24 24"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="m9.134 19.319 11.587-11.588c.171-.171.279-.423.279-.684 0-.229-.083-.466-.28-.662l-3.115-3.104c-.185-.185-.429-.277-.672-.277s-.486.092-.672.277l-11.606 11.566c-.569 1.763-1.555 4.823-1.626 5.081-.02.075-.029.15-.029.224 0 .461.349.848.765.848.511 0 .991-.189 5.369-1.681zm-3.27-3.342 2.137 2.137-3.168 1.046zm.955-1.166 10.114-10.079 2.335 2.327-10.099 10.101z"
                                                        fill-rule="nonzero" />
                                                </svg>
                                            </button>

                                        </form>


                                    </td>
                                </tr>
                                <?php endforeach;?>
                            </tbody>
                        </table>
                    </div>


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