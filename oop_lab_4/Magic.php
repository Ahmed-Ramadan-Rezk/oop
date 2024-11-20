<?php

class Magic
{

    /**
     * --------- Call & Call Static ---------
     * The $name argument is the name of the method being called.
     * The $arguments argument is an enumerated array containing the parameters passed to the $name'ed method.
     */

    // __call() is triggered when invoking inaccessible methods in an object context.
    public function __call($name, $arguments)
    {
        // Note: value of $name is case sensitive.
        echo "Calling object method '$name' "
            . implode(', ', $arguments);
    }

    // __callStatic() is triggered when invoking inaccessible methods in a static context.
    public static function __callStatic($name, $arguments)
    {
        // Note: value of $name is case sensitive.
        echo "Calling static method '$name' "
            . implode(', ', $arguments);
    }


    /**
     * --------- Get & Set ---------
     * The $name argument is the name of the property being interacted with.
     * The __set() method's $value argument specifies the value the $name'ed property should be set to.
     */

    // is utilized for reading data from inaccessible (protected or private) or non-existing properties.
    public function __get($name)
    {
        echo "Getting '$name'";
    }

    // is run when writing data to inaccessible (protected or private) or non-existing properties.
    public function __set($name, $arguments)
    {
        echo "Setting '$name' to '$arguments'";
    }


    /**
     * --------- __invoke ---------
     * The __invoke() method is called when a script tries to call an object as a function.
     */

    public function __invoke($x)
    {
        var_dump($x);
    }

    /**
     * --------- __toString ---------
     * The __toString() method allows a class to decide how it will react when it is treated like a string.
     * For example, what echo $obj; will print.
     */

    public function __toString()
    {
        return "Using the toString method";
    }

    /**
     * --------- __clone ---------
     * Once the cloning is complete, if a __clone() method is defined,
     * then the newly created object's __clone() method will be called,
     * to allow any necessary properties that need to be changed.
     */

    public function __clone()
    {
        echo "Cloning the object";
    }
}
