class Example3
{
   protected $obj;

   function __construct()
   {
      // some PHP code...
   }

   function __toString()
   {
      if (isset($this->obj)) return $this->obj->getValue();
   }
}

// some PHP code...

$user_data = unserialize($_POST['data']);

// some PHP code...
