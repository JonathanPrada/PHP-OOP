<?php

class Render{

    //The __toString() method allows a class to decide how
    //it will react when it is treated like a string.
    //For example, what echo $obj; will print.
    //This method must return a string, as otherwise
    //a fatal E_RECOVERABLE_ERROR level error is emitted.
    public function __toString()
    {

        $output = "The following methods are available for " . __CLASS__ . " objects: ";
        $output .= implode("\n", get_class_methods(__CLASS__));
        return $output;
    }

    //set up the display on ingredient list
    public static function listShopping($ingredient_list)
    {
        ksort($ingredient_list);
        return implode("\n", array_keys($ingredient_list));
    }

    public static function listRecipes($titles)
    {
        asort($titles);
        $output = "";
        foreach ($titles as $key=> $title){
            if($output != "") {
                $output .= "\n";
            }
            $output .= "[$key] $title";
        }
        return $output;
    }

    //listIngredients: previously embedded in displayRecipe, now moved here.
    public static function listIngredients($ingredients)
    {
        $output = "";
        $output .= "\n\n";
        foreach ($ingredients as $ing) {
            $output .= $ing["amount"] . " " . $ing["measure"] . " " . $ing["item"];
            $output .= "\n";
        }
        return $output;
    }

    //displayRecipe: method that does an action
    //makes them accessible without needing an instantiation
    //of the class. A property declared as static cannot be
    // accessed with an instantiated class object
    // (though a static method can).
    public static function displayRecipe($recipe)
    {
        $output = "";
        $output .= $recipe->getTitle() . " by " . $recipe->getSource();
        $output .= "\n";
        $output .= implode(", ",$recipe->getTags());
        $output .= "\n";
        //self: used instead of this to call another static function.
        //calls a method which returns the ingredients of a recipe
        //the sends that to the listIngredients function above.
        $output .=  self::listIngredients($recipe->getIngredients);
        $output .= implode("\n", $recipe->getInstructions());
        $output .= "\n";
        $output .= $recipe->getYield();
        return $output;
    }

}