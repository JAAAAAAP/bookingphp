        <!DOCTYPE html>
        <html lang="en">

        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Document</title>
        </head>

        <body class="bg-slate-100">
            <div class="flex flex-col items-center justify-center">
                <div class="flex w-11/12">
                    <div class="flex flex-col w-full">

                        <table class="table-fixed justify-center items-center w-full text-center ">
                            <!-- head -->
                            <thead class="border-b-2 border-black h-7 text-xl">
                                <tr>

                                    <th class="text-center w-16">
                                        <div class="dropdown">
                                            <div tabindex="0" role="button" class="flex items-center">
                                                <h1>No.</h1>
                                                <i class='bx bx-chevron-down bx-sm'></i>
                                            </div>
                                            <ul tabindex="0" class="dropdown-content z-[1] menu p-2 shadow bg-base-100 rounded-box w-52">
                                                <li><a href="">มากที่สุด</a></li>
                                                <li><a href="">น้อยที่สุด</a></li>
                                            </ul>
                                        </div>
                                    </th>

                                    <th>ชื่อผู้ยืม</th>
                                    <th class="w-80">ของที่ยืม</th>

                                    <th class="w-20">
                                        <div class="dropdown">
                                            <div tabindex="0" role="button" class="flex items-center">
                                                จำนวน
                                                <i class='bx bx-chevron-down bx-sm'></i>
                                            </div>
                                            <ul tabindex="0" class="dropdown-content z-[1] menu p-2 shadow bg-base-100 rounded-box w-52">
                                                <li><a href="">มากที่สุด</a></li>
                                                <li><a href="">น้อยที่สุด</a></li>
                                            </ul>
                                        </div>
                                    </th>

                                    <th>
                                        <div class="dropdown">
                                            <div tabindex="0" role="button" class="flex items-center">
                                                วันที่ยืม
                                                <i class='bx bx-chevron-down bx-sm'></i>
                                            </div>
                                            <ul tabindex="0" class="dropdown-content z-[1] menu p-2 shadow bg-base-100 rounded-box w-52">
                                                <li><a href="">วันที่ใหม่สุด</a></li>
                                                <li><a href="">วันที่เก่าที่สุด</a></li>
                                            </ul>
                                        </div>
                                    </th>

                                    <th>
                                        <div class="dropdown">
                                            <div tabindex="0" role="button" class="flex items-center">
                                                วันที่คืน
                                                <i class='bx bx-chevron-down bx-sm'></i>
                                            </div>
                                            <ul tabindex="0" class="dropdown-content z-[1] menu p-2 shadow bg-base-100 rounded-box w-52">
                                                <li><a href="">วันที่ใหม่สุด</a></li>
                                                <li><a href="">วันที่เก่าที่สุด</a></li>
                                            </ul>
                                        </div>
                                    </th>

                                    <th>รายละเอียด</th>

                                    <th>
                                        <div class="dropdown dropdown-end">
                                            <div tabindex="0" role="button" class="flex items-center">
                                                สถานะ
                                                <i class='bx bx-chevron-down bx-sm'></i>
                                            </div>
                                            <ul tabindex="0" class="dropdown-content z-[1] menu p-2 shadow bg-base-100 rounded-box w-52">
                                                <li><a href="">ทั้งหมด</a></li>
                                                <li><a href="">รออนุมัติ</a></li>
                                                <li><a href="">กำลังยืม</a></li>
                                                <li><a href="">เลยกำหนด</a></li>
                                            </ul>
                                        </div>
                                    </th>
                                </tr>
                            </thead>

                            <tbody class="h-36">

                                <?php

                                $group_sql = "SELECT DISTINCT group_id FROM oder_product";
                                $group_query = $conn->prepare($group_sql);
                                $group_query->execute();
                                $group_rs = $group_query->fetchAll(PDO::FETCH_ASSOC);

                                // $num_groups = count($group_rs);
                                // $i = $num_groups;
                                $i = 1;

                                foreach ($group_rs as $group_row) :

                                    $group_id = $group_row['group_id'];

                                    $sql = "SELECT o.*, u.user, p.name AS products_name, p.sn_products 
                                            FROM products AS p 
                                            INNER JOIN oder_product AS o ON p.p_id = o.p_id 
                                            INNER JOIN USER AS u ON u.user_id = o.user_id
                                            WHERE o.group_id = :group_id AND o.status != 'รอดำเนินการ' ";

                                    $query = $conn->prepare($sql);
                                    $query->bindParam(":group_id", $group_row['group_id'], PDO::PARAM_INT);
                                    $query->execute();
                                    $rs = $query->fetchAll(PDO::FETCH_ASSOC);
                                    
                                    if (!empty($rs)) {
                                ?>
                                    <tr class="h-20">

                                        <td rowspan="<?= count($rs) ?>" class="font-bold text-xl">
                                            <?= $i++ ?>
                                        </td>
                                        <td rowspan="<?= count($rs) ?>" class="uppercase font-bold text-lg">
                                            <?= $rs[0]['user'] ?>
                                        </td>

                                        <?php foreach ($rs as $key => $row) : ?>
                                            <?php if ($key > 0) : ?>
                                    </tr>
                                    <tr class="h-20 align-middle border-b-2 border-black">
                                    <?php endif; ?>
                                    <td class="text-lg">
                                        ชื่อ : <?= $row['products_name'] ?>
                                        <br>
                                        เลขครุภัณฑ์ : <?= $row['sn_products'] ?>
                                    </td>
                                    <td class="text-xl"><?= $row['amount'] ?></td>
                                    <td class="text-xl"><?= $row['date_start'] ?></td>
                                    <td class="text-xl"><?= $row['date_end'] ?></td>

                                    <td>
                                        <label for="detail<?= $row['o_id'] ?>" class="btn btn-info text-white">
                                            <i class='bx bx-credit-card-front bx-md'></i>
                                        </label>

                                        <input type="checkbox" id="detail<?= $row['o_id'] ?>" class="modal-toggle" />

                                        <div class="modal" role="dialog">
                                            <div class="modal-box">
                                                <h2 class="font-bold text-2xl"><?= $row['products_name'] ?></h2>
                                                <div class="text-start">
                                                    <h3 class="pt-4 font-bold text-xl">ชื่อผู้ยืม :</h3>
                                                    <p class="text-start font-bold text-lg border-2 border-black rounded-lg pl-4 p-2"> <?= $row['user'] ? $row['user'] : "-" ?></p>
                                                    <h3 class="pt-4 font-bold text-xl">เบอร์ติดต่อ :</h3>
                                                    <p class="text-start font-bold text-lg border-2 border-black rounded-lg pl-4 p-2"> <?= $row['tel'] ? "0" . $row['tel'] : "-" ?></p>
                                                    <h3 class="pt-4 font-bold text-xl">หน่วยงาน/สาขา :</h3>
                                                    <p class="text-start font-bold text-lg border-2 border-black rounded-lg pl-4 p-2"> <?= $row['department'] ? $row['department'] : "-" ?></p>
                                                    <h3 class="pt-4 font-bold text-xl">นำไปใช้ที่ :</h3>
                                                    <p class="text-start font-bold text-lg border-2 border-black rounded-lg pl-4 p-2"> <?= $row['address'] ? $row['address'] : "-" ?></p>
                                                    <h3 class="pt-4 font-bold text-xl">อาจาร์ยผู้สอน :</h3>
                                                    <p class="text-start font-bold text-lg border-2 border-black rounded-lg pl-4 p-2"> <?= $row['teacher'] ? $row['teacher'] : "-" ?></p>
                                                </div>

                                                <div class="modal-action">
                                                    <label for="detail<?= $row['o_id'] ?>" class="btn w-20 btn-error text-white">ปิด</label>
                                                </div>
                                            </div>
                                        </div>

                                    </td>

                                    <td>
                                        <div class="dropdown dropdown-end">
                                            <div tabindex="0" role="button" class="btn btn-warning text-white">
                                                <?=$row['status']?>
                                            </div>
                                            <ul tabindex="0" class="dropdown-content z-[1] menu p-2 shadow bg-base-100 rounded-box w-52">
                                                <li><a href="./admin.php?pt=status">อนุมัติ</a></li>
                                                <li><a href="">ไม่อนุมัติ</a></li>
                                            </ul>
                                        </div>
                                    </td>

                                </tr>
                                <?php  endforeach; ?>
                            <?php  } endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </body>

        </html>