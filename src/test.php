<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/daisyui@4.8.0/dist/full.min.css" rel="stylesheet" type="text/css" />
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<style>
    @import url('https://fonts.googleapis.com/css2?family=Kanit:wght@400;500;600;700;800;900&display=swap');

    * {
        font-family: 'Poppins', sans-serif;
    }
</style>


<body class="bg-slate-100">

    <div class="drawer flex flex-row">
        <input id="my-drawer" type="checkbox" class="drawer-toggle" />
        <div class="drawer-content flex flex-col items-center h-screen w-20 bg-gray-950 text-white">
            <div class="mb-8 mt-4 text-4xl">
                <i class='bx bx-book'></i>
            </div>

            <div class="my-2 text-xl cursor-pointer flex justify-center items-center w-full h-14 transition ease-in-out duration-200 hover:bg-gray-800">
                <i class='bx bx-grid-alt'></i>
            </div>

            <div class="my-2 text-xl cursor-pointer flex justify-center items-center w-full h-14 transition ease-in-out duration-200 hover:bg-gray-800">
                <i class='bx bx-plus'></i>
            </div>

            <div class="my-2 text-xl cursor-pointer flex justify-center items-center w-full h-14 transition ease-in-out duration-200 hover:bg-gray-800">
                <i class='bx bx-history'></i>
            </div>

            <div class="my-2 text-xl cursor-pointer flex justify-center items-center w-full h-14 transition ease-in-out duration-200 hover:bg-gray-800">
                <i class='bx bx-cog'></i>
            </div>
        </div>

        <label for="my-drawer" class="drawer-button h-9">
            <div class="my-5 ml-3">
                <div class="flex justify-start items-start text-4xl">
                    <i class="bx bx-menu cursor-pointer"></i>
                    <span class="font-bold text-2xl ml-3">ระบบยืมคืน</span>
                </div>
            </div>
        </label>


        <div class="drawer-side">
            <label for="my-drawer" aria-label="close sidebar" class="drawer-overlay"></label>
            <ul class="menu justify-between flex-col p-0 w-64 bg-gray-950 text-white min-h-full ">

                <div class="flex flex-col justify-center items-center">

                    <div class="drawer-content flex flex-col items-center justify-center w-full bg-gray-950 text-white">

                        <div class="flex w-full justify-center items-center gap-9 mb-8 mt-4">
                            <i class='bx bx-book text-4xl'></i>
                            <span class="text-xl font-bold">ระบบยืมคืน</span>
                        </div>

                        <div class="my-2 text-xl cursor-pointer flex justify-center items-center w-full h-14 transition ease-in-out duration-200 hover:bg-gray-800">
                            <a href="" class="flex flex-row justify-around items-center gap-8 w-full h-full">
                                    <i class='bx bx-grid-alt w-20'></i>
                                    <span class="">สถานะ</span>
                            </a>
                        </div>

                        <div class="my-2 text-xl cursor-pointer flex justify-center items-center gap-8 w-full h-14 transition ease-in-out duration-200 hover:bg-gray-800">
                            <i class='bx bx-plus'></i>
                            <span>เพิ่ม</span>
                        </div>

                        <div class="my-2 text-xl cursor-pointer flex justify-center items-center gap-8 w-full h-14 transition ease-in-out duration-200 hover:bg-gray-800">
                            <i class='bx bx-history'></i>
                            <span>ประวัติ</span>
                        </div>

                        <div class="my-2 text-xl cursor-pointer flex justify-center items-center gap-8 w-full h-14 transition ease-in-out duration-200 hover:bg-gray-800">
                            <i class='bx bx-cog'></i>
                            <span>ตั้งค่า</span>
                        </div>

                    </div>

                </div>

                <div class="flex justify-center items-center w-full h-20 bg-gray-800">
                    <div class="flex items-center justify-around w-full h-full text-xl">
                        <span>admin</span>
                        <i class='bx bx-home'></i>
                        <i class='bx bx-log-out'></i>
                    </div>
                </div>
            </ul>
        </div>
    </div>

</body>

</html>