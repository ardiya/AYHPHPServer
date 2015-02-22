<?php
   //abcde.aws.af.cm/ay_ios.php
    $response["result"] = array();
 
    $recipe = array();
    $recipe["name"] = "Egg Benedict";
    $recipe["prepTime"] = "30 min";
    $recipe["imageFile"] = "egg_benedict.jpg";
    $recipe["ingredients"] = array();
    array_push($recipe["ingredients"], "2 fresh English muffins");
    array_push($recipe["ingredients"], "4 eggs");
    array_push($recipe["ingredients"], "4 rashers of back bacon");
    array_push($recipe["ingredients"], "21 tbsp of lemon juice");
    array_push($recipe["ingredients"], "125 g of butter");
    array_push($recipe["ingredients"], "salt and pepper");
    array_push($response["result"], $recipe); 
 
    $recipe = array();
    $recipe["name"] = "Mushroom Risotto";
    $recipe["prepTime"] = "30 min";
    $recipe["imageFile"] = "mushroom_risotto.jpg";
    $recipe["ingredients"] = array();
    array_push($recipe["ingredients"], "1 tbsp dried porcini mushrooms");
    array_push($recipe["ingredients"], "2 tbsp olive oil");
    array_push($recipe["ingredients"], "1 onion, chopped");
    array_push($recipe["ingredients"], "2 garlic cloves");
    array_push($recipe["ingredients"], "350g/12oz arborio rice");
    array_push($recipe["ingredients"], "1.2 litres/2 pints hot vegetable stock");
    array_push($recipe["ingredients"], "salt and pepper");
    array_push($recipe["ingredients"], "25g/1oz butter");
    array_push($response["result"], $recipe); 
 
   
    // echoing JSON response
    echo json_encode($response);
    
?>
