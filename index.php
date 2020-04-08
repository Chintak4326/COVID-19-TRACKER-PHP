<?php
    include("logic.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">

    <!-- Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>  

    <!-- Font Awesome -->
    <script src="https://kit.fontawesome.com/996973c893.js" crossorigin="anonymous"></script>

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Baloo+Thambi+2:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <!-- My Stylesheet -->
    <link rel="stylesheet" href="style.css">

    <title>Covid-19 Tracker</title>
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <img alt="Responsive image" class="img-fluid w-100" src="https://media.istockphoto.com/photos/corona-virus-in-red-background-microbiology-and-virology-concept-3d-picture-id1203426591?k=6&amp;m=1203426591&amp;s=612x612&amp;w=0&amp;h=JxRZ9b0qvMLjp7v2gERd5_e6yI20p9R5VLV_PvnfaTQ=" data-noaft="1" jsname="HiaYvf" jsaction="load:XAeZkd;" style="width: 586px; height: 240.569px; margin: 2.01569px 0px;">
        </div>
    </div>
    <div class="container-fluid bg-light p-5 text-center">
        <h1 class="" style="font-weight: bolder";>Covid-19 Tracker</h1>
        <h5 class="text-muted" style="font-weight: 600;">Keep track of all the COVID-19 cases around the world.</h5>
    </div>

    <div class="container my-5">
        <div class="row text-center">
            <div class="col-4 w-auto p-3">
                <button type="button" class="btn btn-warning w-auto p-3 ">Confirmed<div><?php echo $total_confirmed;?></div></button>
            </div>
            <div class="col-4 w-auto p-3">
                <button type="button" class="btn btn-success w-auto p-3">Recovered <div><?php echo $total_recovered;?></div></button>
            </div>
            <div class="col-4 w-auto p-3">
                <button type="button" class="btn btn-danger w-auto p-3">Deceased<div><?php echo $total_deaths;?></div></button>  
            </div>  
        </div>
    </div>

    <div class="container bg-light p-3 my-5 text-center border">
            <h4 class="text-info">"Prevention is the Cure."</h4>
            <h6 class="text-muted">Stay Indoors Stay Safe.</h6>
    </div>
    <div class="container-fluid center">
        <div class="center">  
            <input type="text" name="search" id="search" placeholder="Search Country Name"class="form-control"style="margin-bottom:15px";>  
        </div> 
    </div>
    <div class="container-fluid">
        <div class="table-responsive">
            <table class="table" id="corona_country">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">Countries</th>
                        <th scope="col">Confirmed</th>
                        <th scope="col">Recovered</th>
                        <th scope="col">Deceased</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        foreach($data as $key => $value){
                            $increase = $value[$days_count]['confirmed'] - $value[$days_count_prev]['confirmed'];
                    ?>
                        <tr>
                            <th scope="row"><?php echo $key?></th>
                            <td>
                                <?php echo $value[$days_count]['confirmed'];?>
                                <?php if($increase != 0){ ?>
                                    <small class="text-danger pl-3"><i class="fas fa-arrow-up"></i><?php echo $increase;?></small>  
                                <?php } ?>    
                            </td>
                            <td><?php echo $value[$days_count]['recovered'];?></td>
                            <td><?php echo $value[$days_count]['deaths'];?></td>
                        </tr>
                    <?php }?>
                </tbody>
            </table>
        </div>
    </div>

    <footer class="footer mt-auto py-3 bg-light">
        <div class="container text-center">
            <span class="text-muted" style="font-weight:600";>Created by Chintak Doshi</span>
        </div>
    </footer>

</body>
</html>
<script>  
      $(document).ready(function(){  
           $('#search').keyup(function(){  
                search_table($(this).val());  
           });  
           function search_table(value){  
                $('#corona_country tr').each(function(){  
                     var found = 'false';  
                     $(this).each(function(){  
                          if($(this).text().toLowerCase().indexOf(value.toLowerCase()) >= 0)  
                          {  
                               found = 'true';  
                          }  
                     });  
                     if(found == 'true')  
                     {  
                          $(this).show();  
                     }  
                     else  
                     {  
                          $(this).hide();  
                     }  
                });  
           }  
      });  
 </script>  