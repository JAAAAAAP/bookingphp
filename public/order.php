<?php

$currentDate = date("Y-m-d");

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php include_once "../plugin/plug.php" ?>

</head>

<style>
    @import url('https://fonts.googleapis.com/css2?family=Kanit:wght@400;500;600;700;800;900&display=swap');

    * {
        font-family: 'Kanit', sans-serif;
    }
</style>

<body>
    <div class="flex justify-center text-center w-full">
        <div class="w-11/12">
            <div class="divider divider-neutral font-bold text-xl">แบบฟอร์มรายการสำหรับยืม</div>

            <div class="overflow-x-auto border-2 border-black rounded-lg ">
                <table class="table text-center ">
                    <!-- head -->
                    <thead class="">
                        <tr class="text-slate-700 text-sm border-b-2 border-black bg-slate-200 md:text-base">
                            <th class="w-12 border-r-2 border-black">No.</th>
                            <th class=" ">รายการยืม</th>
                            <th class="w-10 border-x-2 border-black md:w-28">จำนวน</th>
                            <th class="w-6 hidden md:table-cell">แก้ไขจำนวน</th>
                            <th class="w-10 border-l-2 border-black hidden md:table-cell">นำออก</th>
                            <th class="w-12 p-0 md:hidden">แก้ไข</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- row 1 -->
                        <tr class="text-black text-base border-b-2 border-black">
                            <td class="border-r-2 border-black text-2xl">1.</td>
                            <td class="">Malcolm Lockyer</td>
                            <td class="border-x-2 border-black">1961</td>
                            
                            <td class="w-10 hidden md:table-cell">
                                <label for="" type="submit" class="btn btn-info btn-md text-white text-center"><i class='bx bxs-edit bx-sm'></i></label>
                            </td>

                            <td class="border-l-2 border-black hidden md:table-cell">
                                <label for="" class="btn btn-error btn-md text-white text-center"><i class='bx bxs-trash bx-sm'></i></label>

                            </td>
                            
                            <td class="border-l-2 border-black w-12 p-0 md:hidden">
                            <label for="" class="btn btn-info btn-xs text-white text-center"><i class='bx bxs-edit bx-xs'></i></label>
                            </td>

                        </tr>
                        



                    </tbody>
                </table>
            </div>

            <div class="divider divider-neutral my-8"></div>

            <div class="flex w-full justify-center">

                <div class="flex flex-col w-3/4 text-start bg-gray-100 rounded-xl p-4">
                    <h1 class="font-bold text-center text-xl md:text-2xl">แบบฟอร์มกรอกข้อมูล</h1>

                    <form action="">

                        <h3 class=" font-bold mt-4 ">ชื่อผู้ยืม :</h3>
                        <h3 class=" text-lg bg-white rounded-md mt-2 pl-4 p-2">user</h3>

                        <h3 class=" font-bold my-2 ">เบอร์โทร :</h3>
                        <label class="input input-bordered flex items-center gap-2">
                            <i class='bx bxs-phone bx-sm'></i>
                            <input type="text" class="grow" placeholder="เบอร์โทรศัพท์" />
                        </label>

                        <h3 class=" font-bold my-2 ">นำไปใช้ที่ :</h3>
                        <input type="text" class="input input-bordered w-full" />

                        <h3 class=" font-bold my-2 ">อาจารย์ผู้สอน</h3>
                        <input type="text" class="input input-bordered w-full" />

                        <h3 class=" font-bold my-2 ">หน่วยงานสาขา :</h3>
                        <select class="select select-bordered w-full max-w-xs">
                            <option disabled selected>หน่วยงานสาขา</option>
                            <option>ทดสอบ 1</option>
                            <option>ทดสอบ 2</option>
                        </select>

                        <h3 class=" font-bold my-2 ">วันที่ยืม</h3>
                        <input type="date" min="<?php echo $currentDate; ?>" class="input w-full max-w-xs">

                        <h3 class=" font-bold my-2 ">วันที่คืน</h3>
                        <input type="date" min="<?php echo $currentDate; ?>" class="input w-full max-w-xs">

                        <div class="font-bold my-2 text-error">
                            <h1>*หมายเหตุ</h1>
                            <p class="ml-8">1. Lorem ipsum dolor, sit amet consectetur adipisicing elit. Harum quis neque laudantium odit, distinctio reprehenderit explicabo consequatur tempora ea officiis molestias! Ipsum doloribus ut repellendus modi repellat accusamus amet aliquid.</p>
                            <br>
                            <p class="ml-8">2. Lorem ipsum dolor sit amet consectetur adipisicing elit. Corporis sint eveniet, eligendi laudantium minus hic? Iste at magnam quia optio nam consectetur cum autem, laudantium unde aliquam perferendis provident ratione.</p>
                            <br>
                            <p class="ml-8">3. Lorem ipsum dolor, sit amet consectetur adipisicing elit. Corrupti exercitationem unde consequatur eveniet. Illo id et consequatur soluta enim hic ratione temporibus similique molestias, nemo alias possimus dolorem, velit eveniet.</p>

                            <input type="checkbox" class="checkbox checkbox-sm ml-8 mt-2 text-center" required />
                            <span class="relative ml-1 bottom-1">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Ad eligendi iusto, velit et commodi totam hic culpa recusandae tempore explicabo fugit delectus impedit ratione, similique officiis consectetur repudiandae pariatur deserunt?</span>
                            <br>
                            <input type="checkbox" class="checkbox checkbox-sm ml-8 mt-2 text-center" required />
                            <span class="relative ml-1 bottom-1">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Tempora excepturi eos quis? Harum repellendus natus ab totam laborum excepturi corrupti, culpa, perferendis cum dolorum quis numquam quod nulla delectus doloremque.</span>

                        </div>

                        <h3 class=" font-bold my-2 ">ลงชื่อ :</h3>
                        <input type="text" class="input input-bordered w-full" />
                        <div class="text-end">
                            <button class="btn btn-success text-white mt-4 w-28" type="submit">ยืนยันการยืม</button>

                        </div>
                    </form>
                </div>
            </div>


        </div>
    </div>


    <?php include_once "../plugin/tailwind.php" ?>
</body>

</html>