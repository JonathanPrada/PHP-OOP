<?php

class RecipeCollection
{
    private $title;
    private $recipes = array();


    //__construct: when a new recipe is made, title can be passed in immediately
    //$recipe1 = new Recipe("my first recipe");
    //gets called when an object is instantiated
    public function __construct($title = null)
{
    $this->setTitle($title);
}

    //setTitle: Formats an argument passed in as a title.
    public function setTitle($title)
    {
    //ucwords: Uppercases the letter of each word i.e Eggs And Ham
    if(empty($title)) {
        $this->title = null;
    } else {
        $this->title = ucwords($title);
    }
}

    public function getTitle(){
    return $this->title;
}

    public function addRecipe($recipe)
    {
        $this->recipes[] = $recipe;
    }

    public function getRecipes(){
        return $this->recipes;
    }

    public function getRecipeTitles()
    {
        $title = array ();
        foreach ($this->recipes as $recipe) {
            $titles[] = $recipe->getTitle();
        }
        return $titles;
    }
    public function filterByTag($tag)
    {
        $taggedRecipes = array();
        foreach($this->recipes as $recipe){
            if (in_array(strtolower($tag), $recipe->getTags())){
                $taggedRecipes[] = $recipe;
            }
        }
        return $taggedRecipes;
    }

    //Create a master list of ingredients
    public function getCombinedIngredients()
    {
        //Create ingredients array
        $ingredients = array();
        //loop through each recipe in the collection
        //then loop through each ingredient in the recipes
        foreach ($this->recipes as $recipe)
        {
            foreach($recipe->getIngredients() as $ing) {
                //add the item as the key in our array
                $ingredients[$ing["item"]] = array(
                    //add inner array element to that ingredient
                    $ing["amount"],
                    $ing["measure"]
                );
            }
        }
        //Master array of ingredients
        return $ingredients;

    }
    //pulls recipe by id
    public function filterById($id){
        return $this->recipes[$id];
    }
}