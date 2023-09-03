<?php 
include_once('./Models/Student.php');

$students = student::index();

if(isset($_POST['submit'])) {
    $response = Student::create([
        'name' => $_POST['name'],
        'nis' => $_POST['nis'],
    ]);

    setcookie('message',$response,time()+10);
    header("location: index.php");
}

if(isset($_POST['delete'])){
    $response = Student::delete($_POST['id']);
    setcookie('message',$response,time()+10);
    header("location: index.php");
}
?>
    <!-- alert -->
 <?php include('./layouts/alert.php');?> 

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>home ranks</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
    <div class="">
        <!-- header -->
        <div class="bg-gray-800 text-center p-1 text-xl text-white">DATA RANKS</div>
        <!-- main -->
        <div class="flex">
            <!-- sidebar -->
            <div class="basis-1/4 p-2">
                <div class="bg-gray-500 m-3 p-3 rounded-lg">
                <form action="" method="POST">FORM INPUT
                    <!-- nama -->
                    <div class="mb-3 m-2">
                        <label for="">nama</label>
                        <input type="text" name="name" id="name" placeholder="ketik disini" class="rounded-lg text-center block" >
                    </div>
                    <!-- nis -->
                    <div class="mb-3 m-2">
                        <label for="" >nis</label>
                        <input type="number" name="nis" id="nis" placeholder="ketik disini" class="rounded-lg text-center block">
                    </div>
                    <!-- button -->
                    <div class="grid gap-2">
                        <button type="submit" name="submit" class="bg-blue-900 rounded-lg hover:bg-blue-400 p-1 text-white">KIRIM</button>
                    </div>
                    
                </form>
            </div>
            </div>
            <!-- content -->
            <div class="basis-3/4 p-2">
                <div class="bg-gray-500 p-3 m-3 rounded-lg">DATA RANKS
                    <div class="">
                        <table class="w-full">
                            <thead class="text-center border border-gray-800 bg-gray-800 text-white">
                                <tr>
                                    <th class="px-6 py-3">no.</th>
                                    <th class="px-6 py-3">nama</th>
                                    <th class="px-6 py-3">nis</th>
                                    <th class="px-6 py-3">confirm</th>
                                </tr>
                            </thead>

                            <tbody class="text-center border border-gray-800 ">
                                <?php foreach($students as $key => $student) : ?>
                                <tr class="border border-gray-800">
                                    <td class="px-6 py-3"><?= $key + 1 ?></td>
                                    <td class="px-6 py-3"><?= $student['name'] ?></td>
                                    <td class="px-6 py-3"><?= $student['nis'] ?></td>
                                    <td>
                                        <!-- detail -->
                                   <a href="detail.php?id=<?=$student['id'] ?>" class="text-white hover:bg-blue-800 pt-2 pb-2 pl-3 pr-3 rounded-xl  bg-blue-500">detail</a>
                                        <!-- edit -->
                                   <a href="edit.php?id=<?=$student['id'] ?>" class="text-white hover:bg-green-800 pt-2 pb-2 pl-3 pr-3 rounded-xl  bg-green-500">edit</a>
                                   <!-- hapus -->
                                        <form action="" method="POST" class="inline">
                                            <input type="hidden" name="id" value="<?= $student['id'] ?>">
                                            <button class="bg-red-500 hover:bg-red-800 pt-2 pb-2 pl-3 pr-3 rounded-xl  text-white" name="delete" type="submit">hapus</button>
                                        </form>
                                    </td>
                                </tr>
                                <?php endforeach ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- footer -->
        <div class="bg-gray-800">footer hehehe</div>
    </div>
</body>
</html>
