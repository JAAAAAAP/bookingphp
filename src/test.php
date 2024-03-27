<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/daisyui@4.8.0/dist/full.min.css" rel="stylesheet" type="text/css" />
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<style>
    @import url('https://fonts.googleapis.com/css2?family=Kanit:wght@400;500;600;700;800;900&display=swap');

    * {
        font-family: 'Kanit', sans-serif;
    }
</style>

<body>
    <nav class="navbar justify-between bg-base-200 shadow-lg">
        <div class="flex">
            <a class="btn btn-ghost text-xl">logo</a>
        </div>
        <ul class="flex">
            <li><a class="text-base mx-2 btn btn-ghost" href="">ติดต่อ</a></li>
            <li><a class="text-base mx-2 btn btn-ghost" href="">รายการยืม</a></li>
            <li><a class="text-base mx-2 btn btn-ghost" onclick="login.showModal()" href="#">เข้าสู่ระบบ</a></li>
            <li><a class="text-base mx-2 btn btn-ghost" onclick="profile.showModal()" href="#">pro</a></li>
        </ul>
    </nav>

    <dialog id="login" class="modal">
        <div class="modal-box flex flex-col items-center justify-center">
            <form method="dialog">
                <button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2">✕</button>
            </form>
            <h3 class="mb-2 text-2xl">เข้าสู่ระบบ</h3>
            <input class="input input-sm border-2 border-black my-4" type="text" name="" placeholder="ชื่อผู้ใช้">
            <input class="input input-sm border-2 border-black mb-4" type="password" name="" placeholder="รหัสผ่าน">
            <button class="btn">เข้าสู่ระบบ</button>

        </div>
    </dialog>

    <dialog id="profile" class="modal justify-end items-start top-14 pr-10">
        <div class="modal-box flex flex-col items-center justify-center w-96">
            <form method="dialog">
                <button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2">✕</button>
            </form>
            <h3 class="mb-2 text-2xl">จัดการโปรไฟล์</h3>
            <a class="text-base my-2 btn btn-primary" href="">โปรไฟล์</a>
            <a class="text-base my-2 btn btn-error" href="">ออกจากระบบ</a>
        </div>
    </dialog>

    <div class="grid grid-cols-4 gap-4 my-8 mx-8">
        <div class="card bg-base-200 rounded-xl h-auto shadow-md">
            <div class="card-body items-center justify-center">
                <img class="shadow-lg rounded-lg w-46" src="img/pexels-math-90946.jpg" alt="">
                <div class="card-title">asdw</div>
                <input class="rounded-md border-none px-1 mb-1 h-8" type="number">
                <div class="card-actions justify-center w-full">
                    <button class="btn w-24 text-lg shadow-xl">ยืม</button>
                </div>
            </div>
        </div>
        <div class="card bg-base-200 rounded-xl h-auto shadow-md">
            <div class="card-body items-center justify-center">
                <img class="shadow-lg rounded-lg w-46" src="img/pexels-math-90946.jpg" alt="">
                <div class="card-title">asdw</div>
                <input class="rounded-md border-none px-1 mb-1 h-8" type="number">
                <div class="card-actions justify-center w-full">
                    <button class="btn w-24 text-lg shadow-xl">ยืม</button>
                </div>
            </div>
        </div>
        <div class="card bg-base-200 rounded-xl h-auto shadow-md">
            <div class="card-body items-center justify-center">
                <img class="shadow-lg rounded-lg w-46" src="img/pexels-math-90946.jpg" alt="">
                <div class="card-title">asdw</div>
                <input class="rounded-md border-none px-1 mb-1 h-8" type="number">
                <div class="card-actions justify-center w-full">
                    <button class="btn w-24 text-lg shadow-xl">ยืม</button>
                </div>
            </div>
        </div>
        <div class="card bg-base-200 rounded-xl h-auto shadow-md">
            <div class="card-body items-center justify-center">
                <img class="shadow-lg rounded-lg w-46" src="img/pexels-math-90946.jpg" alt="">
                <div class="card-title">asdw</div>
                <input class="rounded-md border-none px-1 mb-1 h-8" type="number">
                <div class="card-actions justify-center w-full">
                    <button class="btn w-24 text-lg shadow-xl">ยืม</button>
                </div>
            </div>
        </div>
        <div class="card bg-base-200 rounded-xl h-auto shadow-md">
            <div class="card-body items-center justify-center">
                <img class="shadow-lg rounded-lg w-46" src="img/pexels-math-90946.jpg" alt="">
                <div class="card-title">asdw</div>
                <input class="rounded-md border-none px-1 mb-1 h-8" type="number">
                <div class="card-actions justify-center w-full">
                    <button class="btn w-24 text-lg shadow-xl">ยืม</button>
                </div>
            </div>
        </div>
           

    </div>

    </div>
</body>

</html>