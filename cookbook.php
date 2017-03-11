<?php

/*
 * the cookbook writes and reads from the recipes.php
 * */

//recipes.php: holds our recipe class object, properties and methods
include("classes/recipes.php");
include("classes/render.php");
include("classes/recipecollection.php");
//contains a bunch of recipes
include("inc/recipes.php");

$cookbook = new RecipeCollection("Treehouse Recipes");
$cookbook->addRecipe($lemon_chicken);
$cookbook->addRecipe($granola_muffins);
$cookbook->addRecipe($belgian_waffles);
$cookbook->addRecipe($pepper_casserole);
$cookbook->addRecipe($lasagna);
$cookbook->addRecipe($dried_mushroom_ragout);
$cookbook->addRecipe($rabbit_catalan);
$cookbook->addRecipe($grilled_salmon_with_fennel);
$cookbook->addRecipe($pistachio_duck);
$cookbook->addRecipe($chili_pork);
$cookbook->addRecipe($crab_cakes );
$cookbook->addRecipe($beef_medallions);
$cookbook->addRecipe($silver_dollar_cakes);
$cookbook->addRecipe($french_toast);
$cookbook->addRecipe($corn_beef_hash);
$cookbook->addRecipe($granola);
$cookbook->addRecipe($spicy_omelette);
$cookbook->addRecipe($scones);

$breakfast = new RecipeCollection("Favorite Breakfasts");
foreach($cookbook -> filterByTag("breakfast") as $recipe){
    $breakfast -> addRecipe($recipe);
}


$week1 = new RecipeCollection("Meal Plan: Week 1");
$week1 = addRecipe($cookbook->filterById(2));
$week1 = addRecipe($cookbook->filterById(3));
$week1 = addRecipe($cookbook->filterById(6));
$week1 = addRecipe($cookbook->filterById(16));


echo Render::displayRecipe($week1->getRecipeTitles());

//echo Render::listRecipes($cookbook->getRecipeTitles());

//echo Render::listShopping($breakfast->getCombinedIngredients());

//access the specific recipe by typing its name
//echo Render::displayRecipe($belgian_waffles);

//creating an object
//$bass = new Fish("Largemouth Bass", "Excellent", "22 pounds 5 ounces");