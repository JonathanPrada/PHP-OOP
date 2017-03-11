<?php

/*
 * the recipes.php file sets our class object properties & methods
 * it also provides the functionality to be able to read/write to private
 * properties using getters and setters.
 * */

//Create a class
class Recipe
{
    //Private: 	Accessed within the class itself. It protects properties and
    //methods from being access from outside the class.
    //$title: A class property, title of the recipe cannot be changed.
    private $title;
    //$ingredients: We plan to store multiple values in an array.
    //Public: Publicly accessible from anywhere, even from outside the scope of the class.
    private $ingredients = array();
    private $instructions = array();
    private $yield;
    private $tag = array();
    private $source = "Jonathan Prada";

    //$measurements: we dont want anyone to change it
    private $measurements = array (
    "tsp",
    "tbsp",
    "cup",
    "oz",
    "lb",
    "fl oz",
    "pint",
    "quart",
    "gallon"
    );

    //__construct: when a new recipe is made, title can be passed in immediately
    //$recipe1 = new Recipe("my first recipe");
    //gets called when an object is instantiated
    public function __construct($title = null)
    {
        $this->setTitle($title);
    }

    //The __toString() method allows a class to decide how
    //it will react when it is treated like a string.
    //For example, what echo $obj; will print.
    //This method must return a string, as otherwise
    //a fatal E_RECOVERABLE_ERROR level error is emitted.
    public function __toString()
    {
        //gives us the name of the class itself
        $output = "You are calling a " . __CLASS__ . " object with the title \"";
        $output .= $this->getTitle() . "\"";
        //this references the file where it stored
        //gets the full path, but with basename just the file name
        //Dir gives us the full path name
        $output .= "\nIt is stored in " . basename(__FILE__) . " at " . __DIR__ . ".";
        //Line tells us the current line number in the fike
        //Method tells us the name of the method we are using
        $output .= "\nThis display is from line " . __LINE__ . " in method " . __METHOD__;
        //Shows a list of the methods in a class
        $output .= "\nThe following methods are available for object of this class: 
        \n";
        $output .= implode("\n", get_class_methods(__CLASS__));
        return $output;
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

    //addIngredient: adds an ingredient, amount and measurement into an associative array.
    public function addIngredient($item, $amount = null, $measure = null)
    {
        //If we haven't passed in an amount and as a float or integer
        if ($amount != null && !is_float($amount) && !is_int($amount))
        {
            //gettype: Which type of amount is it.
            exit("Amount must be a float " . gettype($amount) . " $amount given");
        }

        //If measure is not equal to null and measure is not in the measurements array
        if($measure != null && !in_array(strtolower($measure), $this->measurements)) {
            exit("Please enter a valid measurement: " . implode(", ", $this->measurements));
        }

        //ingredients[]: This adds
        $this->ingredients[] = array(
            "item"=>ucwords($item),
            "amount"=>$amount,
            "measure"=>strtolower($measure)
        );
    }

    //getIngredients: returns the ingredients array and its elements
    public function getIngredients(){
        return $this->ingredients;
    }

    //addInstruction: adds a string one at a time to the instructions array
    public function addInstruction($string) {
        $this->instructions[] = $string;
    }

    //getInstructions: returns the array of instructions when called
    public function getInstructions(){
        return $this->instructions;
    }

    //addInstruction: adds a tag string one at a time to the tags array
    public function addTag($tag) {
        $this->tag[] = strtolower($tag);
    }

    //getTags: returns the tag set
    public function getTags(){
        return $this->tag;
    }

    public function setYield($yield){
        $this->yield = $yield;
    }

    public function getYield(){
        return $this->yield;
    }

    public function setSource($source){
        $this->source = ucwords($source);
    }

    public function getSource(){
        return $this->source;
    }



}
