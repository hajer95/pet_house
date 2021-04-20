<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Pets Management</title>
  <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.0/font/bootstrap-icons.css">


  <link rel="stylesheet" type="text/css" media="screen" href="./assets/styles/global.css" />
  <link rel="stylesheet" type="text/css" media="screen" href="./assets/styles/petsm.css" />
</head>

<body>
  <header>
    <div id="main-items-div">
      <img id="logo" src="./assets/images/Logo.svg" />
      <div id="list-items-div">
        <h3 style="color:white;">Pets Management</h3>
      </div>
      <div>
        <img class="user-profile" src="assets/images/user-profile.png" />
      </div>
    </div>
  </header>

  <section id="sec1" class="common-for-sections">

    <div class="div-align-common">
      <div class="container-fluid">
        <div class="row mt-1">
          <div class="col-8">
            <div class="row justify-content-between" id="filteration-div">
              <div class="col-1">
                <button type="button" class="btn btn-primary">New</button>
              </div>
              <div class="col-4">
                <input id="pets-search-input" type="text" class="input" placeholder="Search" />
              </div>
            </div>
          </div>
        </div>
        <div class="row mt-5 table-container-1 justify-content-between min-max">
          <!-- col-8 for table, width == 8 cols, height = 80% -->
          <div class="col-8 table-container min-max">

            <table class="table-responsive table table-bordered table-sm table-pets min-max">
              <thead class="theader">
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Name</th>
                  <th scope="col">Cetegory</th>
                  <th scope="col">Age</th>
                  <th scope="col">Price $</th>
                  <th scope="col">Picture</th>
                  <th scope="col">Edit</th>
                  <th scope="col">Delete</th>
                </tr>
              </thead>
              <tbody>

                <?php
                require_once "./php-scripts/dbCon.php";
                $query = "SELECT * from pets order by published_at DESC";
                $results = mysqli_query($con, $query);
                $list = $results->fetch_all(MYSQLI_ASSOC);
                if ($list) {
                  for ($i = 0; $i < count($list); $i++) {
                    echo '
                               <tr>
                              <th scope="row">' . ($i + 1) . '</th>
                              <td>' . $list[$i]['pet_name'] . '</td>
                              <td>' . $list[$i]['category'] . '</td>
                              <td>' . $list[$i]['age'] . '</td>
                              <td>' . $list[$i]['price'] . '</td>
                              <td><i  class="bi bi-image-fill"></i>                              </td>
                              <td><i style="color:green;" class="bi bi-pencil"></i>
                              </td>
                              <td><i style="color:red;" class="bi bi-x-square-fill"></i>
                              </td>
                             
                            </tr>';
                  }
                }
                ?>

              </tbody>
            </table>
          </div>
          <div class="col-3 table-container create-div">
            <form action="./php-scripts/vendors/create.php" method="post" enctype="multipart/form-data" id="create-div-conteint">
              <h4>Add New Pet</h4>
              <div class="info-fields">
                <div class="input-fields">
                  <span>name:</span> <span class="required-input">*</span>
                  <input minlength="4" maxlength="255" type="text" name="pet-name" class="form-control" id="pet-name" placeholder="pet-name" required>
                </div>
                <div class="form-group">
                  <label style="margin-top:15px" for="categories">category:<span class="required-input">*</span></label>
                  <select class="form-control" name="categories" id="categories">
                    <option value="dogs">dogs</option>
                    <option value="cats">cats</option>
                    <option value="birds">birds</option>
                    <option value="monkys">monkys</option>

                  </select>
                </div>
                <div class="input-fields">
                  <span>age:</span> <span class="requiredin-put">*</span>
                  <input minlength="4" maxlength="255" type="text" name="pet-age" class="form-control" id="pet-age" placeholder="pet-name" required>
                </div>
                <div class="input-fields">
                  <span>price($):</span>
                  <input min="1" type="number" name="pet-price" class="form-control" id="pet-price" placeholder="pet-price">
                </div>
                <div class="">
                  <span>image:</span>


                  <input type="file" name="pet-image" class="form-control" id="pet-image" placeholder="pet-image" required accept="image/*">

                </div>
              </div>
              <div id="div-btn">
                <button type="submit" value="create" name="create" class="btn btn-outline-success">create</button>
              </div>





            </form>

          </div>
        </div>
      </div>
    </div>
  </section>

  <script src="./scripts/common.js"></script>

  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
</body>

</html>