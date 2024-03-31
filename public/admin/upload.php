<?php
include_once($_SERVER['DOCUMENT_ROOT'] . '/jaa/bookingphp/config/connectdb.php');

?>
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>upload</title>
    <?php include "../../plugin/plug.php" ?>

</head>

<body class="bg-slate-100">
    <div class="flex row">
        <div class="flex flex-col sticky top-0 h-screen w-auto">
            <?php include "../component/sidebar.php" ?>
        </div>

        <div class="flex flex-col w-screen">
            <div class="h-auto"><?php include "../component/menu.php" ?></div>

            <div class="flex flex-col items-center justify-center">
                <div class="flex w-11/12">

                    <form class="form-control flex-row w-full justify-end items-end gap-4" method="post" action="/jaa/bookingphp/controller/upload.php" enctype="multipart/form-data" required>

                        <input type="file" name="fileupload" accept="image/jpg, image/png ,image/jpeg" class="file-input file-input-bordered border-black w-full max-w-xs" required />

                        <input type="text" name="product_name" placeholder="ชื่อ" class="input input-bordered border-black w-full max-w-xs" required />

                        <input type="number" name="amount" placeholder="จำนวน" min="0" class="input input-bordered border-black w-full max-w-xs" required />

                        <button name="submit" class="btn btn-success text-white">เพิ่มข้อมูล</button>

                    </form>

                </div>

                <div class="flex w-11/12 justify-center items-center mt-4">
                    <div class="overflow-x-auto w-full border-2 rounded-xl border-gray-400 text-gray-600">
                        <table class="table-fixed justify-center items-center w-full ">
                            <!-- head -->
                            <thead class="border-b-2 border-gray-400 h-16 ">
                                <tr class="bg-slate-200">
                                    <th>ลำดับ</th>
                                    <th>ชื่อ</th>
                                    <th>รูป</th>
                                    <th>จำนวนคงเหลือ</th>
                                    <th>แก้ไข</th>
                                    <th>ลบ</th>
                                </tr>
                            </thead>
                            <?php
                            $i = 1;
                            $sql = "SELECT * FROM products";
                            $query = $conn->prepare($sql);
                            $query->execute();
                            $rs = $query->fetchAll(PDO::FETCH_ASSOC);



                            foreach ($rs as $row) {
                                $imgUrl = '../img/' . $row['img'];



                            ?>
                                <tbody class="text-center items-center h-96">
                                    <!-- Table -->
                                    <tr class="border-b-2">
                                        <th><?php echo $i++ ?></th>
                                        <td><?php echo $row['name'] ?></td>
                                        <td>
                                            <figure class="flex w-full justify-center items-center"><img class="h-40 w-40" src="<?php echo $imgUrl ?>" alt=""></figure>
                                        </td>
                                        <td><?php echo $row['amount'] ?></td>

                                        <!-- Edit -->
                                        <td>
                                            
                                            <label for="edit<?php echo $i ?>" type="submit" class="btn btn-info text-white"><i class='bx bxs-edit bx-md'></i></label>
                                            <input type="checkbox" id="edit<?php echo $i ?>" class="modal-toggle" />
                                            <div class="modal" role="dialog">
                                                <div class="modal-box">

                                                    <h3 class="font-bold text-black text-lg">แก้ไขข้อมูล</h3>

                                                    <form action="/jaa/bookingphp/controller/update.php" method="get">

                                                        <div class="flex items-center justify-center mt-6">
                                                            <label class="form-control w-full max-w-xs font-bold text-base text-black">
                                                                <div class="label p-0">
                                                                    <span class="label-text">ชื่อ</span>
                                                                </div>
                                                                <input type="text" placeholder="<?php echo $row['name'] ?>" class="input input-bordered w-full max-w-xs mb-4" />

                                                                <div class="label p-0">
                                                                    <span class="label-text">จำนวน</span>
                                                                </div>
                                                                <input type="number" placeholder="<?php echo $row['amount'] ?>" class="input input-bordered w-full max-w-xs mb-4" />

                                                                <div class="label p-0">
                                                                    <span class="label-text">ไฟล์รูป</span>
                                                                </div>
                                                                <input type="file" class="file-input file-input-bordered w-full max-w-xs" />

                                                                <h2 class="flex items-start mt-4">รูปปัจจุบัน</h2>
                                                                <figure class="flex flex-col items-center justify-center w-full">
                                                                    <img src="<?php echo $imgUrl ?>" class="h-56 w-80 border-2 border-black rounded-md">
                                                                </figure>

                                                            </label>
                                                        </div>

                                                        <!-- <input type="hidden" name="id" value=""> -->
                                                        <div class="modal-action">
                                                            <button type="submit" name="product" value="<?php echo $row['p_id'] ?>" class="btn btn-success text-white">ยืนยันการแก้ไข</button>
                                                            <label for="edit<?php echo $i ?>" class="btn btn-error text-white">ปิด</label>
                                                        </div>

                                                    </form>
                                                </div>
                                            </div>
                                        </td>

                                        <!-- Delete -->
                                        <td>
                                            <label for="deletes" class="btn btn-error text-white"><i class='bx bxs-trash bx-md'></i></label>
                                            <input type="checkbox" id="deletes" class="modal-toggle" />
                                            <div class="modal" role="dialog">
                                                <div class="modal-box">
                                                    <h3 class="font-bold text-lg">Hello!</h3>
                                                    <p class="py-4">This modal works with a hidden checkbox!</p>
                                                    <div class="modal-action">
                                                        <label for="deletes" class="btn">Close!</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>

                                    </tr>
                                </tbody>
                            <?php } ?>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>
</body>

</html>