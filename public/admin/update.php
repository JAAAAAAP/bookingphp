<?php




?>





<form method="post">
    <button name="a" value="6" class="btn btn-warning" onclick="my_modal_3.showModal()">แก้ไข</button>
</form>
<dialog id="my_modal_3" class="modal">
    <div class="modal-box">
        <form method="dialog">
            <button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2">✕</button>
        </form>
        <h3 class="font-bold text-lg">a!</h3>
        <p class="py-4">Press ESC key or click on ✕ button to close</p>
    </div>
</dialog>