<?php
class Car
{
  private $make_model;
  private $price;
  private $miles;
  private $image_path;





  function __construct($car_type, $car_price, $car_miles,$car_image)
  {
      $this->make_model = $car_type;
      $this->price = $car_price;
      $this->miles = $car_miles;
      $this->image_path = $car_image;

  }



  function getPrice()
  {
      return $this->price;
  }

  function getModel()
  {
      return $this->make_model;
  }

  function getMiles()
  {
      return $this->miles;
  }
  function getImage()
  {
      return $this->image_path;
  }

  function save()
  {
    array_push($_SESSION['list_of_cars'], $this);
  }

  static function getAll()
  {
      return $_SESSION['list_of_cars'];
  }

}
?>
