

	/**
	 * Walks down the given path in an object and returns the value it finds at the end of the path.
	 *
	 * @param $obj - An object to traverse.
	 * @param $path - The path to walk down.
	 * @return value|null - The value of the property at the path's end if it was found or null if an error occured.
	 */
	public function getDescendant($obj, $path) {
		// Separate the path into an array of components
		$path_parts = explode('/', $path);

		// Start by pointing at the current object
		$var = $obj;

		// Loop over the parts of the path specified
		foreach($path_parts as $property)
		{
			// Check that it's a valid access
			if ( is_object($var) && isset($var->$property) )
			{
				// Traverse to the specified property,
				// overwriting the same variable
				$var = $var->$property;
			}
			else
			{
				return null;
			}
		}

		// Our variable has now traversed the specified path
		return $var;
	}

	/**
	 * Walks down the given path in an object and sets the property at the end of it to the given value.
	 *
	 * @param $obj - An object to traverse down and set the value.
	 * @param $path - The path to walk down and set the value to.
	 * @param $value - The value to set the property at the end of the path to.
	 */
	public function setDescendant($obj, $path, $value) {
		// Separate the path into an array of components
		$path_parts = explode('/', $path);

		// Start by pointing at the current object
		$var =& $obj;

		// Loop over the parts of the path specified
		foreach($path_parts as $property)
		{
			// Traverse to the specified property,
			// overwriting the same variable with a *reference*
			$var =& $var->$property;
		}

		// Our variable has now traversed the specified path,
		// and is a reference to the variable we want to overwrite
		$var = $value;
	}
