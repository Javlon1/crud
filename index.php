<?php session_start(); ?>
<?php include("function.php") ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD</title>

    <!-- icon link -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">


    <!-- css link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>
<style>
    input {
        margin: .5rem;
    }

    .container {
        padding: 140px 0 0 0;
    }
</style>

<body>
    <div class="container">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">№</th>
                    <th scope="col">id</th>
                    <th scope="col">Name</th>
                    <th scope="col">phone</th>
                    <th scope="col"><button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#addModal"><i
                                class="bi bi-plus-lg"></i></button></th>
                </tr>
            </thead>
            <tbody>
                <?php $qount = 0; ?>
                <?php foreach ($result as $res) { ?>
                    <?php $qount++ ?>
                    <tr>
                        <th scope="row">
                            <?php echo $qount; ?>
                        </th>
                        <th scope="row">
                            <?php echo $res['id']; ?>
                        </th>
                        <td>
                            <?php echo $res['name']; ?>
                        </td>
                        <td>
                            <?php echo $res['phone']; ?>
                        </td>
                        <td>
                            <a href="?id=<?php echo $res['id']; ?>" class="btn btn-info" data-bs-toggle="modal"
                                data-bs-target="#editModal<?php echo $res['id']; ?>"><i class="bi bi-pencil"></i></a>
                            <button class="btn btn-danger" data-bs-toggle="modal"
                                data-bs-target="#deleteModal<?php echo $res['id']; ?>"><i class="bi bi-trash3"></i></button>
                        </td>
                    </tr>

                    <!-- PUT -->
                    <div class="modal fade" id="editModal<?php echo $res['id']; ?>" tabindex="-1"
                        aria-labelledby="editModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="editModalLabel">изменить</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <form action="?id=<?php echo $res['id']; ?>" method="post">
                                    <div class="modal-body input-group flex-nowrap">
                                        <input class="form-control" name="name" value="<?php echo $res['name']; ?>"
                                            type="text" required placeholder="enter name">
                                        <input class="form-control" name="phone" value="<?php echo $res['phone']; ?>"
                                            type="number" required placeholder="enter phone">
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-info" data-bs-dismiss="modal"
                                            name="edit">edit</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <!-- DELETE -->
                    <div class="modal fade" id="deleteModal<?php echo $res['id']; ?>" tabindex="-1"
                        aria-labelledby="deleteModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="deleteModalLabel">
                                        удалить №
                                        <?php echo $res['id']; ?>
                                    </h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <form action="?id=<?php echo $res['id']; ?>" method="post">
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-danger" data-bs-dismiss="modal"
                                            name="delete">delete</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                <?php } ?>
            </tbody>
        </table>

        <!-- POST -->
        <div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addModalLabel">добавить</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="function.php" method="post">
                        <div class="modal-body input-group flex-nowrap">
                            <input class="form-control" name="name" type="text" required placeholder="enter name">
                            <input class="form-control" name="phone" type="number" required placeholder="enter phone">
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-success" name="add">add</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- js link -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
</body>

</html>