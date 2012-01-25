# CodeIgniter Remap
By [@srtfisher](http://twitter.com/srtfisher) - We want to make using CodeIgniter even similar. Sometimes, you can't use a method name because of PHP's own limitations. Or you're updating something via POST and it get's messy code with other GET methods. If this has happened to you, we're here to help.

We support CodeIgniter >= 2.0 and PHP 5.3

## The Solution
Introducing Remap. Remapping has exists in CodeIgniter for a few versions. We take this a few bits furthur.

### Backwards Compatability
We don't want to mess up old code. We do this by being able to use different variations of method names. We have a few methods we try before we throw up a 404:

- `prefix_methodName_requestType`
	- For example, controller/view/123 would be `action_view_get`
- `prefix_methodName`
- `methodName_requestType`
- `prefix_methodName`
- `methodName`

You can view a bunch of different examples in the `application/controller/remap.php` file. 

## Dashes in Methods
You can now have dashes in your methods. If you include `_DASH_` in the method name, we will take that and convert it to a dash. Take this example:

`public function action_view_DASH_transaction_get() { }`

Will be loaded when you go to `/controller/view-transaction` via a HTTP Get. You can still use `_post`, `_put`, etc.

## Automatic Fallback
You can automatically fall back to a certain method for that controller if it doesn't meet another method. Naming it `prefix_four_oh_four_get` will work.

### Adding a Prefix to Controller Methods
We add a prefix to all controller methods. You can set the prefix in your Controller's `__construct` function. The default prefix is `action_`.

	<?php
	class Thecontroller
	{
		function __construct()
		{
			parent::__construct();
			
			// Set the prefix
			$this->prefix = 'myPrefix_';
		}
	}
	?>

### Adding the Request Type
We want to be able to distinguish between different request types. If it's a GET or a POST, we handle it differently. Of course, we will revert back to the default method name too.

### What You Need to Change to Enable it
The only thing you need to change to get your controller to use it is to change the class it extends. Find this line on your controller:

	class Controllername extends CI_Controller

And change it to

	class Controllername extends MY_Controller

That's it!

### Change Logs

#### 0.1
- Initial Release

#### 0.2
- Added support for Dashes and a 404 fallback method.

### Donations
I love making open-source software. If this has helped you out, help me out by sending me a cup of coffee on PayPal (srtfisher@gmail.com).