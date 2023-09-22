<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Student Information</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    </head>

    <body>
        <header class="container mt-4">
            <div class="d-flex justify-content-between align-items-center">
                <h1 class="text-center">Student Information Form</h1>
                <a href="/students" class="btn btn-outline-secondary btn-circle btn-sm">
                    Reset
                </a>
            </div>
        </header>

        <main class="container mt-4">
            <form action="/save" method="post">
                <div class="col-md-6">
                    <div class="form-group">
                        <!-- <label for="student_id">Student ID</label> -->
                        <input type="text" class="form-control" name="id" hidden value="<?= $records['id'] ?>">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="student_id">Student ID</label>
                            <input type="text" class="form-control" name="StudID" placeholder="e.g. MCC2021-0987"
                                required value="<?= $records['StudID'] ?>">
                        </div>
                    </div>
                    <div class=" col-md-6">
                        <div class="form-group">
                            <label for="full_name">Full Name</label>
                            <input type="text" class="form-control" name="StudName"
                                placeholder="e.g. Jhon Melvin B. Jambalos" required value="<?= $records['StudName'] ?>">
                        </div>
                    </div>
                </div>
                <div class=" row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="gender">Gender</label>
                            <select class="form-control" name="StudGender" required>
                                <option disabled value="" <?= empty($records['StudGender']) ? 'selected' : '' ?>>Choose
                                    Gender
                                </option>
                                <?php foreach ($genders as $gender): ?>
                                    <option value="<?= $gender ?>" <?= ($gender == $records['StudGender']) ? 'selected' : '' ?>>
                                        <?= $gender ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>

                    <div class=" col-md-6">
                        <div class="form-group">
                            <label for="program">Course</label>
                            <input type="text" class="form-control" name="StudCourse" placeholder="e.g. BSIT" required
                                value="<?= $records['StudCourse'] ?>">
                        </div>
                    </div>
                </div>
                <div class=" row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="section">Section</label>
                            <div class="input-group">
                                <select class="form-control" name="StudSection" required>
                                    <option value="" disabled <?= empty($records['StudSection']) ? 'selected' : '' ?>>
                                        Choose Section</option>
                                    <?php foreach ($sections as $section): ?>
                                        <option value="<?= $section['Section'] ?>"
                                            <?= ($section['Section'] == $records['StudSection']) ? 'selected' : '' ?>>
                                            <?= $section['Section'] ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                                <div class="input-group-append">
                                    <button class="btn btn-outline-secondary" type="button" data-toggle="modal"
                                        data-target="#categoryModal">
                                        Manage Categories
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class=" col-md-6">
                        <div class="form-group">
                            <label for="program">Year</label>
                            <input type="number" class="form-control" name="StudYear" placeholder="e.g. 1" required
                                min="1" max="4" value="<?= $records['StudYear'] ?>">
                        </div>
                    </div>
                </div>
                <div class=" text-right">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </main>

        <footer class="container mt-4">
            <h2 class="text-left mb-3">Display</h2>
            <ul class="list-group">
                <li class="list-group-item list-group-item-dark">
                    <div class="row">
                        <div class="col-1 font-weight-bold">ID</div>
                        <div class="col font-weight-bold">Student ID</div>
                        <div class="col font-weight-bold">Name</div>
                        <div class="col font-weight-bold">Gender</div>
                        <div class="col font-weight-bold">Course</div>
                        <div class="col font-weight-bold">Section</div>
                        <div class="col font-weight-bold">Year</div>
                        <div class="col text-right font-weight-bold">Action</div>
                    </div>
                </li>

                <?php foreach ($students as $student): ?>
                    <li class="list-group-item">
                        <div class="row">
                            <div class="col-1">
                                <?= $student['id'] ?>
                            </div>
                            <div class="col">
                                <?= $student['StudID'] ?>
                            </div>
                            <div class="col">
                                <?= $student['StudName'] ?>
                            </div>
                            <div class="col">
                                <?= $student['StudGender'] ?>
                            </div>
                            <div class="col">
                                <?= $student['StudCourse'] ?>
                            </div>
                            <div class="col">
                                <?= $student['StudSection'] ?>
                            </div>
                            <div class="col">
                                <?= $student['StudYear'] ?>
                            </div>
                            <div class="col text-right">
                                <a href="/edit/<?= $student['id'] ?>" class="btn btn-primary btn-sm">Edit</a>
                                <a href="/delete/<?= $student['id'] ?>" class="btn btn-danger btn-sm">Delete</a>
                            </div>
                        </div>
                    </li>
                <?php endforeach; ?>
            </ul>


        </footer>


        <!-- Modal -->
        <div class="modal fade" id="categoryModal" tabindex="-1" role="dialog" aria-labelledby="categoryModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Manage Section</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="/sectionSave" method="post">
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" placeholder="Enter Category" name="section">
                                <div class="input-group-append">
                                    <button class="btn btn-outline-secondary" type="submit"
                                        id="addCategory">Add</button>
                                </div>
                            </div>
                        </form>
                        <ul class="list-group" id="categoryList">
                            <?php foreach ($sections as $section): ?>
                                <li class="list-group-item">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <?php echo $section['Section']; ?>
                                        <a href="/sectionDelete/<?= $section['ID'] ?>" class="btn btn-danger btn-sm">Delete</a>
                                    </div>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>

                </div>
            </div>
        </div>


        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>


    </body>

    </html>


</html>