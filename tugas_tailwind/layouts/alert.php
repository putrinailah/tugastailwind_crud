<div class="bg-slate-900">
    <?php 
    if(isset($_COOKIE['message'])) :?>

    <div class="p-3 bg-gray-600 m-3 rounded-xl text-white">
        <?=$_COOKIE ['message']?>
    </div>
    <?php endif ?>
</div>
